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


echo '<div class="dashboard">';

echo '<div class="module mini-profile">';
echo '<div class"account-group"><img src="'.$grav_url.'" alt="" /></div>';
echo 'aaaa';
echo '<div class="spacer"> </div>';
echo '</div>';

echo '<div class="module">';
echo '<ul>';
echo '<li><a class="list-link" href="compte.php">Compte</a></li>';
echo '<li><a class="list-link" href="pass.php">Mot de passe</a></li>';
echo '<li><a class="list-link" href="notifications.php">Notifications</a></li>';
echo '<li class="active"><a class="list-link" href="profil.php">Profil</a></li>';
echo '</ul>';
echo '</div>';

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '<div>Compétences : '.$row["COMPETENCES"]; echo '</div>';

echo '</div>';//content-main

?>
<div class="spacer"> </div>
</div>
</div>
</body>
</html>