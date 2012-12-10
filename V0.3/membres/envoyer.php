<?
session_start();
?>
<?
if ($_SESSION["connected"] and isset($_SESSION["ID_UTILISATEUR"])){

  include('../../db.php');          
          // Connexion à la base de données
          // Valeurs à modifier selon vos paramètres configuration
          $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
                    mysql_select_db($db) or die ('Erreur :'.mysql_error());

$ID = $_SESSION["ID_UTILISATEUR"];

  $select2 = "SELECT EMAIL,PSEUDO FROM MEMBRES WHERE ID='".$ID."';";
  $result2 = mysql_query($select2,$link) or die ('Erreur : '.mysql_error() );
  $total2 = mysql_num_rows($result2);


$row2 = mysql_fetch_array($result2);

//if (!isset($_POST["idutilisateur"]) or !isset($_POST["email"]) or !isset($_POST["pseudo"]) or !isset($_POST["sujet"]) or !isset($_POST["message"])) {
$idutilisateur=$_POST["idutilisateur"];
$emailreceiver=$_POST["email"];

//$pseudo='<a href="http://neofreelance.com/profil.php?ID='.$_SESSION["ID_UTILISATEUR"].'">'.$_POST["pseudo"].'</a>';

$pseudo=$_POST["pseudo"];
$sujet=$_POST["sujet"];


$message='Vous avez reçus un message de mise en relation de neoFreelance de la part de '.$pseudo."\n";

$message=$message.$_POST["message"];

@mail($emailreceiver, $sujet, $message, 'From: '.$row2["EMAIL"]."\r\n");

//@mail($email-receiver, $sujet, $message, 'From: noreply@neofreelance.com'."\r\n");

//};
echo '
<SCRIPT LANGUAGE="JavaScript">
     document.location.href="profil.php?ID='.$idutilisateur.'"
</SCRIPT>
';
}
else
{
echo '
<SCRIPT LANGUAGE="JavaScript">
     alert("Vous devez être connecté pour envoyer un message !");
</SCRIPT>
';
};
?>
