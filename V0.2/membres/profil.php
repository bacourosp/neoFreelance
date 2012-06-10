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

  $ID_MEMBRE=$_GET["ID"];
  
  $select = "SELECT * FROM MEMBRES WHERE ID='".$ID_MEMBRE."';";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);


$row = mysql_fetch_array($result);

$EMAIL=$row["EMAIL"];

$default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
$size = 80;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $EMAIL ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;


echo '<div class="dashboard">';

echo '<div class="module mini-profile">';
echo '<div class"account-group"><img src="'.$grav_url.'" alt="" /></div>';

echo '<div class="spacer"> </div>';
echo '</div>';

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '<div> Pseudo : '; echo $row["PSEUDO"]; echo '</div>'; 

echo '<div>Compétences : '.$row["COMPETENCES"]; echo '</div>';

echo '<div>Date Inscription : '; echo date("d/m/Y", strtotime($row["DEPUIS"])); echo '</div>';

echo '<div>Description : '.$row["DESCRIPTION"]; echo '</div>';

echo '</div>';//content-main

?>
<div class="spacer"> </div>
</div>
</div>
</body>
</html>