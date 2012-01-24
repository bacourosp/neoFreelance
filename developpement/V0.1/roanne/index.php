<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Accueil</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?
include('menu.php');
//session_start(); À placer obligatoirement avant tout code html 

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else
{
    $page='accueil';
}
// information pour la connection à le DB
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

if ($page=='deconnexion') {
unset($_SESSION['connected']);
echo '<script language="Javascript">
<!--
document.location.replace("index.php");
// -->
</script>';
}

if ($page=='accueil') {
echo '<center>';
echo '<table>';
echo '<tr>';
echo '<td>';
echo '<p> Bienvenue sur notre site de coworking de Roanne </p>';
echo '</td>';
echo '</tr>';
echo '</table>';
echo '</center>';
}

if ($page=='connexion') {

echo '<form method="post" action="connexion.php" class="connexion">';
echo '<center>';
echo '<table width="800" border="0">';
echo '  <tr>';
echo '<td>';

//echo '<label for="identifiant">';
echo '  Identifiant :';
echo ' </td> ';
echo ' <td>';
echo '	<input type="text" name="login" id="login" /> ';
echo '</td>';
echo '</tr>';
//echo '</label>';

echo '  <tr>';
echo '<td>';

//echo '<label for="mot_de_passe">';
echo ' Mot de passe : ';

echo ' </td> ';
echo ' <td>';

echo '<input type="password" name="mot_de_passe" id="mot_de_passe" />';
//echo '</label>';

echo '</td>';
echo '</tr>';

echo '  <tr>';
echo '<td>';


echo '<a href="inscription.php">Inscription</a>';

echo '</td>';

echo '<td>';
echo '<input type="submit" name="valider" value="Valider" /></p>';
echo '</td>';
echo '</tr>';
echo '</table>';

echo '</center>';

echo '</form>';


} 

if ($page=='projets') {
  echo '<center>';
  echo '<table>';
  echo '<tr>';
  echo '<td>';
  echo '<a href="projet.php">Ajouter un projet</a>';
  echo '</td>';
  echo '<td></td>';
  echo '<td></td>';
  echo '</tr>';
  echo '</table>';
  echo '</center>';
  
  // requête SQL qui compte le nombre total d'enregistrement dans la table et qui
  //récupère tous les enregistrements
  $select = 'SELECT INTITULE,DATE,MONTANT FROM PROJETS';
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);


  // si on a récupéré un résultat on l'affiche.
  if($total) {
    // debut du tableau
	echo '<center>';
    echo '<table bgcolor="#FFFFFF">'."\n";
        // première ligne on affiche les titres prénom et surnom dans 2 colonnes
        echo '<tr>';
        echo '<td bgcolor="#669999" width="400"><b><u>INTITULE</u></b></td>';
        echo '<td bgcolor="#669999" width="200"><b><u>DATE</u></b></td>';
        echo '<td bgcolor="#669999" width="200"><b><u>MONTANT</u></b></td>';
      
        echo '</tr>'."\n";
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.    
    while($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td bgcolor="#CCCCCC"><a href="http://boudeffa.me/coworking/roanne/description.php?projet='.$row["INTITULE"].'">'.$row["INTITULE"].'</a></td>';
        echo '<td bgcolor="#CCCCCC">'.$row["DATE"].'</td>';
        echo '<td bgcolor="#CCCCCC">'.$row["MONTANT"].'</td>';
        
      echo '</tr>'."\n";
    }
    echo '</table>'."\n";
    // fin du tableau.
	echo '</center>';
  }
  else echo 'Pas d\'enregistrements dans cette table...';
  // on libère le résultat
  mysql_free_result($result);
}
?>

</body>
</html>
