<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Profil</title>
<?
include('../scriptes.php');
?>
</head>
<body id="sky">

<?
include('../menu.php');
include('../php/fonctions.php');
?>
<div class="content">

<div id="profilContainer">
<br>
<h1>Accueil</h1>
<br>

</div>

<?
//=========================================

// information pour la connection ￜ le DB

//=========================================

include('../../db.php');

//=========================================    

// connection ￜ la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());


//=========================================

// requￜte SQL qui ne prend que le nombre 

// d'enregistrement necessaire ￜ l'affichage.

//=========================================

$select = 'SELECT * FROM SOUMISSIONS WHERE ID_FREELANCE='.$_SESSION["ID_UTILISATEUR"].'';
$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
if ($total){
echo '<p>Voici les projets auquels vous avez fait une offre</p>';
echo '<center>';

    echo '<table id="projets-recents" class="dataTable" width="920">'."\n";
        // premiￜre ligne on affiche les titres prￜnom et surnom dans 2 colonnes
        echo '<thead><tr>';
        
        echo '<th width="200"><b><u>Projet</u></b></th>';
        echo '<th width="200"><b><u>Montant</u></b></th>';
		echo '<th width="200"><b><u>Dur�e r�alisation</u></b></th>';
        echo '<th width="200"><b><u>Votre offre</u></b></th>';
        echo '</tr></thead>'."\n";

    // lecture et affichage des rￜsultats sur 2 colonnes, 1 rￜsultat par ligne.    
$var=0;
while($row = mysql_fetch_array($result)) {

    $selectprojet = 'SELECT * FROM PROJETS WHERE ID ='.$row["ID_PROJET"].'';
    $resultprojet = mysql_query($selectprojet,$link) or die ('Erreur : '.mysql_error() );
    $totalprojet = mysql_num_rows($resultprojet);		
	if ($totalprojet)  {$rowprojet = mysql_fetch_array($resultprojet); $nom_projet=$rowprojet["DESIGNATION"];};
    $DescriptionOffre = coupe($row["DESCRIPTION"],50);
    if ($var==0){ //Affiche le projet numￜro .$row["ID"].
        echo '<tr bgcolor="#FFFFFF">';	        
		echo '<td><a href="../projets/projet.php?ID='.$row["ID_PROJET"].'">'.$nom_projet.'</a></td>';
        echo '<td>'.$row["MONTANT"].'</td>';
        echo '<td>'.$row["DUREE"].'</td>';
		echo '<td><a href="../projets/detail.php?OFFRE='.$row["ID"].'">'.$DescriptionOffre.'</a></td>';
        echo '</tr>'."\n";
		$var=1;
		}
		else{
		echo '<tr  bgcolor="#EEEEEE">';
		echo '<td><a href="../projets/projet.php?ID='.$row["ID_PROJET"].'">'.$nom_projet.'</a></td>';
        echo '<td>'.$row["MONTANT"].'</td>';
        echo '<td>'.$row["DUREE"].'</td>';
		echo '<td><a href="../projets/detail.php?OFFRE='.$row["ID"].'">'.$DescriptionOffre.'</a></td>';
        echo '</tr>'."\n";
		$var=0;
		}
    }
echo '</center>';
} else {
echo '<p>Cette page va vous afficher les diff�rents projets auquels vous avez soumissionn�s</p>';
echo '<p>Il y aura toutes les application disonibles, la cr�ation de groupes de travail, pour suivre la vie du site</p>';
echo '<p>D'."'".'autres options comme pour la cr�ation de r�unions de coworking pourrons �tre d�velopp�es</p>';
}

?>


</div>

</body>
</html>