<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Formulaire d'Inscription</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
include('menu.php');
?>

<?
echo '<form method = "POST" action ="inscription.php">';

echo '<center>';
echo '<table width="800">';
echo '<tr>';
echo '<td>';


echo '<tr><td>PRENOM *: </td> <td><input type="text" value = "" name ="PRENOM"></td><tr>';
echo '<tr><td>NOM *: </td> <td><input type="text" value = "" name ="NOM"></td><tr>';
echo '<tr><td>PSEUDO *: </td> <td><input type="text" value = "" name ="PSEUDO"></td><tr>';
echo '<tr><td>EMAIL *: </td> <td><input type="text" value = "" name ="EMAIL"></td><tr>';
echo '<tr><td>MOT DE PASSE *: </td> <td><input type="password" value = "" name ="MDP"></td><tr>';
echo '<tr><td>CONFIRMER MDP *: </td> <td><input type="password" value = "" name ="CMDP"></td><tr>';
echo '<tr><td><input type="submit" value="envoyer" name ="envoyer"></td></td> <td><tr>';

echo '</table>';
echo '</center>';

echo '</form>';


$PRENOM = $_POST['PRENOM'];
$NOM = $_POST['NOM'];
$PSEUDO = $_POST['PSEUDO'];
$EMAIL = $_POST['EMAIL'];
$MDP = $_POST['MDP'];  
$CMDP = $_POST['CMDP'];

// information pour la connection à le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

if (!$PRENOM == '' and !$NOM == '' and !$PSEUDO =='' and !$EMAIL == '' and !$MDP == '' and !$CMDP == '') 
{
 if ($MDP == $CMDP){
 $requete = "insert into MEMBRES values('', '".$PRENOM."','".$NOM."', '".$PSEUDO."', '".$EMAIL."','".$MDP."');" ;
 mysql_query($requete);
 } else {
 echo 'Les mots de passes ne sont pas identiques';
 }
}


?>

</body>
</html>