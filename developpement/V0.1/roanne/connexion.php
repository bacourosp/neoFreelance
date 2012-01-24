<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Accueil</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php
include('menu.php');
// information pour la connection à le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

if (isset($_POST['mot_de_passe']) AND isset($_POST['login'])) // Si les variables existent
{
        $login=$_POST['login'];//On récupère les données envoyées par la méthode POST du formulaire d'identification
        $mot_de_passe=$_POST['mot_de_passe'];

}
 
 
 $sql = "SELECT MDP,PSEUDO,PRENOM FROM MEMBRES WHERE EMAIL='".$login."';";
 $result = mysql_query($sql,$link) or die('Erreur SQL : <br />'.$sql);
 $total = mysql_num_rows($result);

if($total) {
 $row = mysql_fetch_array($result); 

 if ($row["MDP"] == $mot_de_passe)
 // Si le mot de passe et le login sont bons (valable pour 1 utilisateur ou plus). J'ai mis plusieurs identifiants et mots de passe.
 
 {
        
        $_SESSION['connected']=1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y eu identification.
        $_SESSION['login']=$row['PSEUDO'];// Permet de récupérer le login afin de personnaliser la navigation
        $_SESSION['prenom']=$row['PRENOM'];
		
		echo '<script language="Javascript">
        <!--
        document.location.replace("profil.php");
        // -->
        </script>';
 }
}

?>
</center>
</body>
</html>