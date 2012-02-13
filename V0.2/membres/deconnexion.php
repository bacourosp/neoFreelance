<?
session_start();
unset($_SESSION['connected']);
unset($_SESSION['pseudo']);
echo '<script language="Javascript">
<!--
document.location.replace("../index.php");
// -->
</script>';
?>
