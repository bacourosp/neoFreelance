<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Bienvenue au site de Coworking de Roanne</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
include('menu.php');
?>

<?

echo '<form method = "POST" action ="projet.php">';

echo '<center>';
echo '<table width="800">';

echo '<tr><td>SOCIETE *:</td> <td><input type="text" value = "" name ="SOCIETE"></td><tr>';
echo '<tr><td>INTITULE *: </td> <td><input type="text" value = "" name ="INTITULE"></td><tr>';
echo '<tr><td>DATE *: </td> <td><input type="text" value = "" name ="DATE"></td><tr>';
echo '<tr><td>MONTANT (BUDGET ESTIMATIF) *: </td> <td><input type="text" value = "" name ="MONTANT"></td><tr>';
echo '<tr><td>EMAIL *: </td> <td><input type="text" value = "" name ="EMAIL"></td><tr>';
echo '<tr><td>TELEPHONE *: </td> <td><input type="text" value = "" name ="TELEPHONE"></td><tr>';
echo '<tr><td> DESCRIPTION *:</td> <td></td><tr>';
echo '</table>';

echo '<textarea name="DESCRIPTION" COLS=95 ROWS=10></textarea>';

echo '<p><input type="submit" value="envoyer" name ="envoyer">';

echo '</center>';
echo '</form>';


$SOCIETEE = $_POST['SOCIETE'];
$TELEPHONE = $_POST['TELEPHONE'];
$EMAIL = $_POST['EMAIL'];
$INTITULE = $_POST['INTITULE'];
$DESCRIPTION = $_POST['DESCRIPTION'];
$MONTANT = $_POST['MONTANT'];
$DATE = $_POST['DATE'];  

// information pour la connection à le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

if (!$SOCIETE == '' and !$TELEPHONE == '' and !$EMAIL =='' and !$INTITULE == '' and !$DESCRIPTION == '' and !$MONTANT == '' and !$DATE == '') {

$requete = "insert into PROJETS values('', '".$SOCIETE."', '".$TELEPHONE."', '".$EMAIL."', '".$INTITULE."','".$DESCRIPTION."', '".$MONTANT."', '".$DATE."');" ;
mysql_query($requete);

}

?>


</body>
</html>
