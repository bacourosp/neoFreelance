<?php
//=========================================

// information pour la connection � le DB

//=========================================

$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

//=========================================    

// connection � la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

try
{
    $message = $_GET["message"];
	$date = date('c');
    // Insertion du message � l'aide d'une requ�te pr�par�e
    $requete = "INSERT INTO CHAT VALUES('','".$date."','".$message."');";
    mysql_query($requete);
    // Redirection du visiteur vers la page du minichat
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>