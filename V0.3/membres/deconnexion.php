<?
session_start();
unset($_SESSION['connected']);
unset($_SESSION['pseudo']);
unset($_SESSION['ID_UTILISATEUR']);
echo '<script language="Javascript">
<!--
document.location.replace("../index.php");
// -->
</script>';
?>
