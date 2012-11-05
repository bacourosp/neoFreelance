<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Karma</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
include('../scriptes.php');
?>

</head>

<body>

<?
include('../menu.php');
include('verifcompetences.php');
?>

<?
//=========================================

// information pour la connection à le DB

//=========================================

include('../../db.php');

//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================    

// requête SQL qui compte le nombre total 

// d'enregistrements dans la table.

//=========================================

$select = 'SELECT KARMA FROM MEMBRES WHERE EMAIL ='.$_SESSION["email"];

$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);

if ($total) {
$row = mysql_fetch_array($result);
echo $row["KARMA"];
}
?>
</body>
</html>
