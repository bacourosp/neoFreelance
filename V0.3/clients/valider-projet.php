<?
     // V�rifie que de bonnes valeurs sont pass�es en param�tres
     if(!ereg("^[0-9]+$", $_GET["id"]) || !ereg("^[a-f0-9]{8}$", strtolower($_GET["clef"])))
     {
          header("Location: creer.php");
     }
     else
     {

  include('../../db.php');          
          // Connexion � la base de donn�es
          // Valeurs � modifier selon vos param�tres configuration
          $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
                    mysql_select_db($db) or die ('Erreur :'.mysql_error());
          
          // S�lection de l'utilisateur concern�
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
               
               // Si aucun enregistrement n'est trouv�
               if(mysql_num_rows($result) == 0)
               {
                    header("Location: creer.php");
               }
               else
               {
                    
                    // R�cup�ration du tableau de donn�es retourn�
                    $row = mysql_fetch_array($result);
                    
                    // V�rification que le compte ne soit pas d�j� activ�
                    if($row["ACTIF"] != 0)
                    {
                         $message = "Votre Projet a d�j� �t� activ�";
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
                              $message = "Votre Projet a correctement �t� activ�";
                         }
                         
                    }
                    
               }
               
          }
          
          // Fermeture de la connexion � la base de donn�es
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
