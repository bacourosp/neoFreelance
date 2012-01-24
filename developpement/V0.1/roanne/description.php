<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Description</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?
// information pour la connection à le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = "SELECT DESCRIPTION FROM PROJETS WHERE INTITULE='".$_GET['projet']."';" ;
$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);


// si on a récupéré un résultat on l'affiche.
if($total) {
$row = mysql_fetch_array($result);
echo '<p> Voici la description du projet : </p>';
echo '<p>';
echo $row["DESCRIPTION"];
echo '</p>'; 
}
else echo 'Pas de projet correspondant';

// on libère le résultat
mysql_free_result($result);
?>
</body>
</html>
