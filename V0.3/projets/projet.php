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
<script type="text/javascript">
$(function() {
    //Lorsque vous cliquez sur un lien de la classe poplight et que le href commence par #
$('.poplight').click(function() {
    var popID = $(this).attr('rel'); //Trouver la pop-up correspondante
    var popURL = $(this).attr('href'); //Retrouver la largeur dans le href

alert("coucou");

	//RÃ©cupÃ©rer les variables depuis le lien
	var query= popURL.split('?');
	var dim= query[1].split('&');
	var popWidth = dim[0].split('=')[1]; //La premiÃ¨re valeur du lien

	//Faire apparaitre la pop-up et ajouter le bouton de fermeture
	$('#' + popID).fadeIn().css({
		'width': Number(popWidth)
	})
	.prepend('');

	//RÃ©cupÃ©ration du margin, qui permettra de centrer la fenÃªtre - on ajuste de 80px en conformitÃ© avec le CSS
	var popMargTop = ($('#' + popID).height() + 80) / 2;
	var popMargLeft = ($('#' + popID).width() + 80) / 2;

	//On affecte le margin
	$('#' + popID).css({
		'margin-top' : -popMargTop,
		'margin-left' : -popMargLeft
	});

	//Effet fade-in du fond opaque
	$('body').append(''); //Ajout du fond opaque noir
	//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues de IE
	$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

	return false;
});

//Fermeture de la pop-up et du fond
$('a.close, #fade').live('click', function() { //Au clic sur le bouton ou sur le calque...
	$('#fade , .popup_block').fadeOut(function() {
		$('#fade, a.close').remove();  //...ils disparaissent ensemble
	});
	return false;
});
});
</script>

</head>

<body id="sky">

<?
include('../menu.php');

?>

<?

//=========================================

// information pour la connection ï¿½ le DB

//=========================================

include('../../db.php');

//=========================================    

// connection ï¿½ la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());


//=========================================

// requï¿½te SQL qui ne prend que le nombre 

// d'enregistrement necessaire ï¿½ l'affichage.

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
 echo '<span><b>Propriétaire : </b></span><span>'.$row["PROPRIETAIRE"].'</span>';
 echo '<br>';
 echo '<span><b>ID : </b></span><span>'.$row["ID"].'</span>';
 echo '<br>';
 echo '<span><b>Compétences recherchées : </b></span><span>'.$row["COMPETENCES"].'</span>';
 echo '<br>';
 echo '<span><b>Déscription du projet : </b></span><br><p>'.$row["DESCRIPTION"].'</p>';
 echo '</div>';

};
if ($_SESSION['connected']==TRUE) {
echo '<div ><a id="FaireOffre" href="#" rel="popup_name" class="poplight">Faire une offre</a></div>';

//echo '<div id="Offre" ><a style="position:absolute; top:0; right:0;"><img src="../images/icones/icon_close1.png"></a>';

include('offre.php');

//echo '</div>';
} else
{
echo '<div ><a id="FaireOffre" href="../membres/connexion.php" rel="popup_name" class="poplight">Faire une offre</a></div>';
}
?>

<?
//=========================================

// requï¿½te SQL qui ne prend que le nombre 

// d'enregistrement necessaire ï¿½ l'affichage.

//=========================================

  $select = 'SELECT * FROM SOUMISSIONS WHERE ID_PROJET ='.$row["ID"].' ORDER BY MONTANT DESC';
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

if($total) {
    // debut du tableau
	echo '<center>';

    echo '<table id="projets-recents" class="dataTable" width="920">'."\n";
        // premiï¿½re ligne on affiche les titres prï¿½nom et surnom dans 2 colonnes
        echo '<thead><tr>';
        
        echo '<th width="200"><b><u>Freelance</u></b></th>';
        echo '<th width="200"><b><u>Montant</u></b></th>';
		echo '<th width="200"><b><u>Durï¿½e de rï¿½alisation</u></b></th>';
        echo '<th width="200"><b><u>Description</u></b></th>';
        echo '</tr></thead>'."\n";
		
    // lecture et affichage des rï¿½sultats sur 2 colonnes, 1 rï¿½sultat par ligne.    
    $var=0; 
	while($row = mysql_fetch_array($result)) {
    
	$selectfreelance = 'SELECT * FROM MEMBRES WHERE ID ='.$row["ID_FREELANCE"].'';
    $resultfreelance = mysql_query($selectfreelance,$link) or die ('Erreur : '.mysql_error() );
    $totalfreelance = mysql_num_rows($resultfreelance);
	if (totalfreelance)  {$rowfreelance = mysql_fetch_array($resultfreelance); $FREELANCE=$rowfreelance["PSEUDO"];};
	
    if ($var==0){ //Affiche le projet numï¿½ro .$row["ID"].
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
  // on libï¿½re le rï¿½sultat
  mysql_free_result($result);
  
  echo '</div>';
?>
<? 
include('../footer.php');
?>
</body>
</html>
