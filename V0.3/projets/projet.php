<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>Déscription du Projet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
include('../scriptes.php');
?>

<script type="text/javascript">

$(document).ready(function(){
$('#faire-offre').click(function(e) {

    e.preventDefault();

    $('#monOffre').reveal;

});
});

</script>

</head>

<body id="sky">

<?
include('../menu.php');
include('../php/fonctions.php');
?>

<?

//=========================================

// information pour la connection ï¿œ le DB

//=========================================

include('../../db.php');

//=========================================    

// connection ï¿œ la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());


//=========================================

// requï¿œte SQL qui ne prend que le nombre 

// d'enregistrement necessaire ï¿œ l'affichage.

//=========================================

  $select = 'SELECT * FROM PROJETS WHERE ID='.$_GET["ID"].';';   
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

 

if($total) {
 $row = mysql_fetch_array($result);
 echo '<div class="content">';

 $select22 = 'SELECT * FROM MEMBRES WHERE PSEUDO="'.$row["PROPRIETAIRE"].'";';
 $result22 = mysql_query($select22,$link) or die ('Erreur : '.mysql_error() );
 $total22 = mysql_num_rows($result22);
 $row22 = mysql_fetch_array($result22);

 $ID_PROJET=$row["ID"];

// echo '<span id="IDProjet"><b>ID : </b>'.$row["ID"].'</span>';
 echo '<div style="width:700px; ">';
 echo '<h1>'.$row["DESIGNATION"].'</h1>';
 echo '</div>';
 
echo '<div class="well silver padding-0 margin-b10 margin-t5 span12 margin-l10">';

 $select2 = 'SELECT * FROM SOUMISSIONS WHERE ID_PROJET='.$_GET["ID"];
 $result2 = mysql_query($select2,$link) or die ('Erreur : '.mysql_error() );
 $total2 = mysql_num_rows($result2);
	
 $selectmoy = 'SELECT AVG(MONTANT) FROM SOUMISSIONS WHERE ID_PROJET='.$_GET["ID"];
 $resultmoy = mysql_query($selectmoy,$link) or die ('Erreur : '.mysql_error() );
 $totalmoy = mysql_num_rows($resultmoy);
 $moyenne = mysql_result($resultmoy,0);
 $valeur_moyenne=(int)($moyenne); 

if($total2>0) {
 echo '<div class="well white silver align-c span margin-l10 margin-t10 margin-b10 padding-5" >'; 
   echo '<div class="align-c border-r span padding-r10 padding-l5" style="display:inline-block;"><div class="margin-b5">Nombre d'."'".'offres</div><div class="text-blue larger bold">'.$total2.'</div></div>';
   echo '<div class="align-c border-r span padding-110 padding-r10" style="display:inline-block;"><div class="margin-b5">Montant Moyen (EUR)</div><div class="text-blue larger bold">'.$valeur_moyenne.'</div></div>';
   echo '<div class="align-c span padding-110 padding-r10" style="display:inline-block;"><div class="margin-b5">Budget (EUR)</div><div class="text-blue larger bold">'.$row["MIN"].' - '.$row["MAX"].'</div></div>';
 echo '</div>';
 echo '<br>';
 echo '<br>';
} else {
 echo '<div class="well white silver align-c span margin-l10 margin-t10 margin-b10 padding-5" >'; 
   echo '<div class="align-c border-r span padding-r10 padding-l5" style="display:inline-block;"><div class="margin-b5">Nombre d'."'".'offres</div><div class="text-blue larger bold">0</div></div>';
   echo '<div class="align-c border-r span padding-110 padding-r10" style="display:inline-block;"><div class="margin-b5">Montant Moyen (EUR)</div><div class="text-blue larger bold">N/A</div></div>';
   echo '<div class="align-c span padding-110 padding-r10" style="display:inline-block;"><div class="margin-b5">Budget (EUR)</div><div class="text-blue larger bold">'.$row["MIN"].' - '.$row["MAX"].'</div></div>';
 echo '</div>';
 echo '<br>';
 echo '<br>';
};

$competenceprojet=explode(",",$row["COMPETENCES"]); //Pour afficher les competences sous forme de carrés

echo '</div>';

 echo '<div style="width:700px;">';
 echo '<span><b>Porteur du projet : </b></span><span><a href="/membres/profil.php?ID='.$row22["ID"].'">'.$row["PROPRIETAIRE"].'</a></span>';
 echo '<br>';
 echo '<br>';
 echo '<span><b>Compétences recherchées : </b></span>';afficherCompetencesProjet($competenceprojet);
 echo '<br>';
 echo '<br>';
 echo '<span><b>Déscription du projet : </b></span><br><p>'.$row["DESCRIPTION"].'</p>';
 echo '</div>';
 echo '<div style="border: 2px solid #EEE;"></div>';
 echo '<br>';
 echo '<br>';
};

if ($_SESSION['connected']==TRUE) {

 $select3 = 'SELECT * FROM SOUMISSIONS WHERE ID_PROJET='.$_GET["ID"].' AND ID_FREELANCE='.$_SESSION["ID_UTILISATEUR"];
 $result3 = mysql_query($select3,$link) or die ('Erreur : '.mysql_error() );
 $total3 = mysql_num_rows($result3);
 if ($total3>0){
  echo '<div><a id="modifier-offre" href="#" class="btn green" data-reveal-id="monOffre" data-animation="fade" style="text-decoration:none;float:right;">Modifier votre offre</a></div>';
  } else {
  echo '<div><a id="faire-offre" href="#" class="btn green" data-reveal-id="monOffre" data-animation="fade" style="text-decoration:none;float:right;">Faire une offre</a></div>';
  include('offre.php');
  }
 }else{
 echo '<div ><a id="faire_offre" class="btn green" style="text-decoration:none;float:right;" href="../membres/connexion.php">Faire une offre</a></div>'; 
 }
?>
<br>
<br>
<?
//=========================================

// requête SQL qui ne prend que le nombre 

// d'enregistrement necessaire à l'affichage.

//=========================================

  $select = 'SELECT * FROM SOUMISSIONS WHERE ID_PROJET ='.$_GET["ID"].' ORDER BY MONTANT DESC';
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

if($total) {
    // debut du tableau
	echo '<center>';

    echo '<table id="projets-recents" class="dataTable" width="920">'."\n";
        // premiï¿œre ligne on affiche les titres prï¿œnom et surnom dans 2 colonnes
        echo '<thead><tr>';
        
        echo '<th width="200"><b><u>Freelance</u></b></th>';
        echo '<th width="200"><b><u>Montant</u></b></th>';
		echo '<th width="200"><b><u>Durée réalisation</u></b></th>';
        echo '<th width="200"><b><u>Description</u></b></th>';
        echo '</tr></thead>'."\n";
		
    // lecture et affichage des rï¿œsultats sur 2 colonnes, 1 rï¿œsultat par ligne.    
    $var=0; 
	while($row = mysql_fetch_array($result)) {
    
	$selectfreelance = 'SELECT * FROM MEMBRES WHERE ID ='.$row["ID_FREELANCE"].'';
    $resultfreelance = mysql_query($selectfreelance,$link) or die ('Erreur : '.mysql_error() );
    $totalfreelance = mysql_num_rows($resultfreelance);
	if ($totalfreelance)  {$rowfreelance = mysql_fetch_array($resultfreelance); $FREELANCE=$rowfreelance["PSEUDO"];};
	
    if ($var==0){ //Affiche le projet numï¿œro .$row["ID"].
        echo '<tr bgcolor="#FFFFFF">';	
        
		echo '<td><a href="/membres/profil.php?ID='.$row["ID_FREELANCE"].'">'.$FREELANCE.'</a></td>';
        echo '<td>'.$row["MONTANT"].'</td>';
        echo '<td>'.$row["DUREE"].'</td>';
		echo '<td><a href="detail.php?OFFRE='.$row["ID"].'">'.coupe($row["DESCRIPTION"],50).'</a></td>';
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
  else echo '<p>Il n'."'".'y a actuellement pas d'."'".'offres enregistrées pour ce projet</p>';
  // on libï¿œre le rï¿œsultat
  mysql_free_result($result);
  
  echo '</div>';
?>
<? 
include('../footer.php');
?>
</body>
</html>
