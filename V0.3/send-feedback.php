<?
session_start();
?>
<?
$emailreceiver='support@neofreelance.com';
$emailsender=$_POST["email"];
//$pseudo='<a href="http://neofreelance.com/profil.php?ID='.$_SESSION["ID_UTILISATEUR"].'">'.$_POST["pseudo"].'</a>';

$sujet=$_POST["sujet"];

$message=$_POST["message"];

@mail($emailreceiver, $sujet, $message, 'From: '.$emailsender."\r\n");

if ($_SESSION['connected'])
{
echo '
<SCRIPT LANGUAGE="JavaScript">
     document.location.href="/accueil/index.php"
</SCRIPT>
';
}
else 
{
echo '
<SCRIPT LANGUAGE="JavaScript">
     document.location.href="index.php"
</SCRIPT>
';
};

?>
