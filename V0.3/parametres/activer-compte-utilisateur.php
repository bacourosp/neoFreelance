<?
session_start();
?>
<?



// Redirige l'utilisateur s'il est déjà identifié
if(isset($_COOKIE["ID_UTILISATEUR"]))
{
     header("Location: ../accueil/index.php");
}
else
{
     
     // Vérifie que de bonnes valeurs sont passées en paramètres
     if(!ereg("^[0-9]+$", $_GET["id"]) || !ereg("^[a-f0-9]{8}$", strtolower($_GET["clef"])))
     {
          header("Location: profil.php");
     }
     else
     {

  include('../../db.php');          
          // Connexion à la base de données
          // Valeurs à modifier selon vos paramètres configuration
          $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
                    mysql_select_db($db) or die ('Erreur :'.mysql_error());
          
          // Sélection de l'utilisateur concerné
          $result = mysql_query("
               SELECT ID
                    , ACTIF
                    , CLEF_ACTIVATION
               FROM MEMBRES
               WHERE ID = '".$_GET["id"]."'
               AND CLEF_ACTIVATION = '".strtolower($_GET["clef"])."'
          ");
          
          // Si une erreur survient
          if(!$result)
          {
               $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
          }
          else
          {
               
               // Si aucun enregistrement n'est trouvé
               if(mysql_num_rows($result) == 0)
               {
                    header("Location: compte.php");
               }
               else
               {
                    
                    // Récupération du tableau de données retourné
                    $row = mysql_fetch_array($result);
                    
                    // Vérification que le compte ne soit pas déjà activé
                    if($row["ACTIF"] != 0)
                    {
                         $message = "Votre compte utilisateur a déjà été activé";
                    }
                    else
                    {
                         
                         // Activation du compte utilisateur
                         $result = mysql_query("
                              UPDATE MEMBRES
                              SET ACTIF = '1'
                              WHERE ID = '".$_GET["id"]."'
                              AND CLEF_ACTIVATION = '".strtolower($_GET["clef"])."'
                         ");
                         
                         // Si une erreur survient
                         if(!$result)
                         {
                              $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
                         }
                         else
                         {
                              $message = "Votre compte utilisateur a correctement été activé";
                         }
                         
                    }
                    
               }
               
          }
          
          // Fermeture de la connexion à la base de données
          mysql_close();
          
     }
     
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Activation</title>
<?
include('../scriptes.php');
?>
</head>
<body id="sky">
<?
include('../menu.php');
?>
<div class="content">

<div id="inscriptionContainer">

<br>
<h1>Activation de votre compte</h1>
<p><?php echo $message; ?></p>

</div>
</div>
</body>
</html>