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
// information pour la connection � le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection � la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
//r�cup�re tous les enregistrements
$select = "SELECT DESCRIPTION FROM PROJETS WHERE INTITULE='".$_GET['projet']."';" ;
$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);


// si on a r�cup�r� un r�sultat on l'affiche.
if($total) {
$row = mysql_fetch_array($result);
echo '<p> Voici la description du projet : </p>';
echo '<p>';
echo $row["DESCRIPTION"];
echo '</p>'; 
}
else echo 'Pas de projet correspondant';

// on lib�re le r�sultat
mysql_free_result($result);
?>
</body>
</html>
