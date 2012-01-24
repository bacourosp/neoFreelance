<?
session_start();
include('menu.php');
echo '<center>';
echo '<p>Bienveue '.$_SESSION['prenom'].'.';
echo '</center>';
?>