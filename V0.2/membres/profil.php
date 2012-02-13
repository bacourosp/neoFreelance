<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Profil</title>
<?
include('../scriptes.php');
?>
</head>
<body id="sky">

<?php
include('../menu.php');
?>
<div class="content">
<div id="profilContainer">
<br>
<h1>Profil</h1>

<?

include('../../db.php');
//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================

// requête SQL qui ne prend que le nombre 

// d'enregistrement necessaire à l'affichage.

//=========================================
$email = $_SESSION["email"];

  $select = "SELECT PSEUDO,EMAIL,PROFIL,COMPETENCES FROM MEMBRES WHERE EMAIL='".$email."';";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);


$row = mysql_fetch_array($result);

$default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
$size = 80;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

echo '<div>';
echo '<img src="'.$grav_url.'" alt="" />';

echo '<div> PSEUDO : '; echo $row["PSEUDO"]; echo '</div>'; 
echo '<div>Login ou Email : '; echo $email; echo '</div>';
echo '<div>Compétences : '.$row["COMPETENCES"]; echo '</div>';

echo '</div>';

?>
      
</div>
</div>
</body>
</html>