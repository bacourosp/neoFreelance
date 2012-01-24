<?
$PSEUDO = $_POST['newusername'];
$EMAIL = $_POST['email'];
$MDP = $_POST['newuserpasswd'];  

// information pour la connection à le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

 $requete = "insert into MEMBRES values('', '".$PSEUDO."', '".$EMAIL."','".$MDP."');" ;
 mysql_query($requete);

 
?>