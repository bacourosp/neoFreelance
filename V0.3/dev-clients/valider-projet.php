<?
     // Vérifie que de bonnes valeurs sont passées en paramètres
     if(!ereg("^[0-9]+$", $_GET["id"]) || !ereg("^[a-f0-9]{8}$", strtolower($_GET["clef"])))
     {
          header("Location: creer.php");
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
               FROM PROJETS
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
                    header("Location: creer.php");
               }
               else
               {
                    
                    // Récupération du tableau de données retourné
                    $row = mysql_fetch_array($result);
                    
                    // Vérification que le compte ne soit pas déjà activé
                    if($row["ACTIF"] != 0)
                    {
                         $message = "Votre Projet a déjà été activé";
                    }
                    else
                    {
                         
                         // Activation du compte utilisateur
                         $result = mysql_query("
                              UPDATE PROJETS
                              SET ACTIF = '1'
                              WHERE ID = '".$_GET["id"]."'
                              AND CLEF_ACTIVATION = '".strtolower($_GET["clef"])."'
                         ");
                         
                         // Si une erreur survient
                         if(!$result)
                         {
                              $message = "Une erreur est survenue lors de l'activation de votre projets";
                         }
                         else
                         {
                              $message = "Votre Projet a correctement été activé";
                         }
                         
                    }
                    
               }
               
          }
          
          // Fermeture de la connexion à la base de données
          mysql_close();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Validation de votre Projet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<h1>Validation de votre projet</h1>
<p><? echo $message; ?></p>

</div>
</div>
</body>
</html>
