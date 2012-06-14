<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Description du Projet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
include('../scriptes.php');
?>
</head>

<body id="sky">
<?
include('../menu.php');

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

// requête SQL qui ne prend que le nombre 

// d'enregistrement necessaire à l'affichage.

//=========================================

  $select = 'SELECT * FROM PROJETS WHERE ID='.$_GET["ID"].';';   
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

if($total) {
 $row = mysql_fetch_array($result);
 echo '<div class="content">';

 $ID_PROJET=$row["ID"];

 echo '</br>';
 echo '<div>';
 echo '<span style="width:700px; float:left;"><h1>'.$row["DESIGNATION"].'</h1></span>';
 
 echo '</div>';
 
 echo '<br>';
 echo '<div style="width:700px;">';
 echo '<span><b>Propriètaire : </b></span><span>'.$row["PROPRIETAIRE"].'</span>';
 echo '<br>';
 echo '<span><b>ID : </b></span><span>'.$row["ID"].'</span>';
 echo '<br>';
 echo '<span><b>Compétences recherchées: </b></span><span>'.$row["COMPETENCES"].'</span>';
 echo '<br>';
 echo '<span><b>Déscription du projet : </b></span><br><p>'.$row["DESCRIPTION"].'</p>';
 echo '</div>';

};
if ($_SESSION['connected']==TRUE) {
echo '<div ><a id="FaireOffre" onClick="showOffre();">Faire une offre</a></div>';
echo '<div id="Offre" ><a style="position:absolute; top:0; right:0;" onClick="hideOffre();"><img src="../images/icones/icon_close1.png"></a>';

include('offre.php');

echo '</div>';
} else
{
echo '<p>Pour faire une offre vous devez être connecté !</p>';
}
?>

<?
//=========================================

// requête SQL qui ne prend que le nombre 

// d'enregistrement necessaire à l'affichage.

//=========================================

  $select = 'SELECT * FROM SOUMISSIONS WHERE ID_PROJET ='.$row["ID"].' ORDER BY MONTANT DESC';
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

if($total) {
    // debut du tableau
	echo '<center>';

    echo '<table id="projets-recents" class="dataTable" width="920">'."\n";
        // première ligne on affiche les titres prénom et surnom dans 2 colonnes
        echo '<thead><tr>';
        
        echo '<th width="200"><b><u>Freelance</u></b></th>';
        echo '<th width="200"><b><u>Montant</u></b></th>';
		echo '<th width="200"><b><u>Durée de réalisation</u></b></th>';
        echo '<th width="200"><b><u>Description</u></b></th>';
        echo '</tr></thead>'."\n";
		
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.    
    $var=0; 
	while($row = mysql_fetch_array($result)) {
    
	$selectfreelance = 'SELECT * FROM MEMBRES WHERE ID ='.$row["ID_FREELANCE"].'';
    $resultfreelance = mysql_query($selectfreelance,$link) or die ('Erreur : '.mysql_error() );
    $totalfreelance = mysql_num_rows($resultfreelance);
	if (totalfreelance)  {$rowfreelance = mysql_fetch_array($resultfreelance); $FREELANCE=$rowfreelance["PSEUDO"];};
	
    if ($var==0){ //Affiche le projet numéro .$row["ID"].
        echo '<tr bgcolor="#FFFFFF">';	
        
		echo '<td><a href="/membres/profil.php?ID='.$row["ID_FREELANCE"].'">'.$FREELANCE.'</a></td>';
        echo '<td>'.$row["MONTANT"].'</td>';
        echo '<td>'.$row["DUREE"].'</td>';
		echo '<td><a href="detail.php?OFFRE='.$row["ID"].'">En savoir +</a></td>';
        echo '</tr>'."\n";
		$var=1;
		}
		else{
		echo '<tr  bgcolor="#EEEEEE">';
        echo '<td><a href="/membres/profil.php?ID='.$row["ID_FREELANCE"].'">'.$FREELANCE.'</a></td>';
        echo '<td>'.$row["MONTANT"].'</td>';
        echo '<td>'.$row["DUREE"].'</td>';
		echo '<td><a href="detail.php?OFFRE='.$row["ID"].'">En savoir +</a></td>';
        echo '</tr>'."\n";
		$var=0;
		}
    }
    echo '</table>'."\n";
    // fin du tableau.
	echo '</center>';
  }
  else echo 'Pas d\'enregistrements dans cette table...';
  // on libère le résultat
  mysql_free_result($result);
  
?>
</body>
</html>
