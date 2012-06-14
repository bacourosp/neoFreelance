<?
session_start();
?>
<?
if (!isset($_POST["dureereal"]) or !isset($_POST["montantreal"]) or !isset($_POST["description"])) {

}
else {
$IDPROJET=$_POST["idprojet"];
$IDFREELANCE=$_POST["idfreelance"];
$DUREEREAL=$_POST["dureereal"];
$MONTANTREAL=$_POST["montantreal"];
$DESCRIPTION=$_POST["description"];


			// information pour la connection à le DB
			include('../../db.php');

			// connection à la DB
			$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
			mysql_select_db($db) or die ('Erreur :'.mysql_error());
			
            $requete = "insert into SOUMISSIONS values('','".$IDPROJET."', '".$IDFREELANCE."', '".$DESCRIPTION."', '".$DUREEREAL."', '".$MONTANTREAL."');" ;
			mysql_query($requete);
			

echo '
<script language="Javascript">
hideOffre();
document.location.href="/projets/projet.php?ID='.$IDPROJET.'";
</script>
';

}
?>