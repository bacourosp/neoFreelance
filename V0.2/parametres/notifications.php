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
<h1>Notifications</h1>

<?
include('mini-profil.php');

echo '<div class="dashboard">';

echo '<div class="module mini-profile">';
echo '<div class"account-group"><img src="'.$grav_url.'" alt="" /></div>';

echo '<div class="spacer"> </div>';
echo '</div>';

include('menu-gauche.php');

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '
<form name="notifs" method="post" action="notifications.php">

<INPUT type="checkbox" name="choix1" value="1"> Je suohaite être informé des nouveaux projets
<br>
<INPUT type="checkbox" name="choix2" value="2"> Je suohaite être informé des projets en rapport avec mes compétences
';
echo '<div class="clear"></div>';
echo '
</br>
<center>
<button class="ns_btn ns_blue" type="submit" value="post">Modifier</button>
</center>
</form>
';

echo '</div>';//content-main

?>
<div class="spacer"> </div>
</div>
</div>
</body>
</html>