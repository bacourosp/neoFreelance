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
<h1>Accueil</h1>
<?
echo '<div class="dashboard">';

echo '<div class="module">';
echo '<ul>';
echo '<li class="active"><a class="list-link" href="encours.php">Projets en cours</a></li>';
echo '<li><a class="list-link" href="soumis.php">Projets soumissionés</a></li>';
echo '<li><a class="list-link" href="coworking.php">Réunions de coworking</a></li>';
echo '</ul>';
echo '</div>';

echo '</div>';
?>
</div>
</div>
</body>
</html>