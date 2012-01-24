<?
session_start();
// information pour la connection à le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

if (isset($_POST['passwd']) AND isset($_POST['login'])) // Si les variables existent
{
        $login=$_POST['login'];//On récupère les données envoyées par la méthode POST du formulaire d'identification
        $passwd=$_POST['passwd'];
 
 $sql = "SELECT MDP,PSEUDO FROM MEMBRES WHERE EMAIL='".$login."';";
 $result = mysql_query($sql,$link) or die('Erreur SQL : <br />'.$sql);
 $total = mysql_num_rows($result);

if($total) {
 $row = mysql_fetch_array($result); 

 if ($row["MDP"] == $passwd)
 // Si le mot de passe et le login sont bons (valable pour 1 utilisateur ou plus). J'ai mis plusieurs identifiants et mots de passe.
 
 {
        $_SESSION['connected']=1;  
        $_SESSION['pseudo']=$row["PSEUDO"];// Permet de récupérer le pseudo afin de personnaliser la navigation
		$_SESSION['email']=$row["EMAIL"];
		echo '<script language="Javascript">
        <!--
        document.location.replace("../index.php");
        // -->
        </script>';
  }
 }

}
?>