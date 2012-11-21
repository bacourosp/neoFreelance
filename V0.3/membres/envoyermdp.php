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
<h1>Mot de passe oublié</h1>
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

  $email=$_POST["email"];
  
  $select = "SELECT MDP FROM MEMBRES WHERE EMAIL='".$email."';";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);


$row = mysql_fetch_array($result);

$sujet = 'Récupération de votre mot de passe sur neoFreelance';
$message = 'Votre mot de passe est :'.$row["MDP"];

@mail($_POST["email"], $sujet, $message, 'From: noreply@neofreelance.com'."\r\n");
?>
<p>Un email vient de vous être envoyé contenant votre mot de passe</p>
</div>
</div>
</body>
</html>