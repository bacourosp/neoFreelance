<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Description du Projet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
include('../scriptes.php');
?>
</head>

<body id="sky">
<?
include('../menu.php');

?>

<?

//=========================================

// information pour la connection � le DB

//=========================================

include('../../db.php');

//=========================================    

// connection � la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());


//=========================================

// requ�te SQL qui ne prend que le nombre 

// d'enregistrement necessaire � l'affichage.

//=========================================

  $select = 'SELECT * FROM SOUMISSIONS WHERE ID='.$_GET["OFFRE"].';';   
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

if($total) {
 $row = mysql_fetch_array($result);
 echo '<div class="content">';

 echo '</br>';
 echo '<div>';
 echo '<span style="width:700px; float:left;"><h1>D�tail de l offre</h1></span>';
 
 echo '</div>';
 
 echo '<br>';
 echo '<div style="width:700px;">';
 echo '<span><b>Propri�taire : </b></span><span>ANONYME A DEFINIR</span>';
 echo '<br>';
 echo '<span><b>Montant de la r�alisation : </b></span><span>'.$row["MONTANT"].'</span>';
 echo '<br>';
 echo '<span><b>Dur�e de la r�alisation: </b></span><span>'.$row["DUREE"].'</span>';
 echo '<br>';
 echo '<span><b>D�scription de l offre : </b></span><br><p>'.$row["DESCRIPTION"].'</p>';
 echo '</div>';

};
?>
</body>
</html>
