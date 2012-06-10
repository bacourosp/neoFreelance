<?
//=========================================

// information pour la connection à le DB

//=========================================

include ('../../db.php');

//=========================================

// initialisation des variables 

//=========================================

// on va afficher $_GET[nombre]] résultats par page.

echo '<a name="navig-table"></a>';
echo "\n";
?>
<span>
<select size="1" name="project_table_length" class="selectP" onChange="window.location='projets.php?nombre='+this.value">
<option value="10" <? if ($_GET['nombre']==10) { echo 'selected'; }; ?> >10</option>
<option value="50" <? if ($_GET['nombre']==50) { echo 'selected';}; ?> >50</option>
<option value="100" <? if ($_GET['nombre']==100) { echo 'selected';}; ?>>100</option>
</select>
</span>
<?

// si limite n'existe pas on l'initialise à zéro

//if (!$limite) $limite = 0; 

// on cherche le nom de la page.    

$path_parts = pathinfo($_SERVER['PHP_SELF']);

$page = $path_parts["basename"];



//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================    

// requête SQL qui compte le nombre total 

// d'enregistrements dans la table.

//=========================================

$select = 'SELECT count(id) FROM PROJETS';

$result = mysql_query($select,$link)  or die ('Erreur : '.mysql_error() );

$row = mysql_fetch_row($result);

$totalEnregistrements = $row[0];

    

//=========================================

// vérifier la validité de notre variable 

// $limite;

//=========================================

$verifLimite= verifLimite($limite,$totalEnregistrements,$nombre);

// si la limite passée n'est pas valide on la remet à zéro

if(!$verifLimite)  {

    $limite = 0;

}

//=========================================

// requête SQL qui ne prend que le nombre 

// d'enregistrement necessaire à l'affichage.

//=========================================

  $select = 'SELECT ID, DESIGNATION, COMPETENCES, DESCRIPTION, DATE_LANCEMENT, DUREE_SOUMISSION FROM PROJETS WHERE COMPETENCES LIKE "%'.$_GET["competence"].'%" ORDER BY DATE_LANCEMENT DESC limit '.$limite.','.$nombre;
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

//=========================================    

// si le nombre d'enregistrement à afficher 

// est plus grand que $nombre 

//=========================================

if($totalEnregistrements > $nombre) {

    // affichage des liens vers les pages
    $nbpagesaffichees=10;
    affichePages($nombre,$page,$totalEnregistrements,$nbpagesaffichees);

    // affichage des boutons

    //displayNextPreviousButtons($limite,$totalEnregistrements,$nombre,$page);

}

//=========================================    

// si on a récupéré un resultat on l'affiche.

//=========================================

  if($total) {
    // debut du tableau
	echo '<center>';

    echo '<table id="projets-recents" class="dataTable" width="920">'."\n";
        // première ligne on affiche les titres prénom et surnom dans 2 colonnes
        echo '<thead><tr>';
        echo '<th width=""><b><u>Projet</u></b></th>';
        echo '<th width="200"><b><u>Montant Moyen</u></b></th>';
        echo '<th width="200"><b><u>Date de début</u></b></th>';
		echo '<th width="200"><b><u>Date limite</u></b></th>';
        
        echo '</tr></thead>'."\n";
		
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.    
    $var=0; 
	while($row = mysql_fetch_array($result)) {
    if (date("d-m-Y",strtotime($row["DATE_LANCEMENT"]))==date("d-m-Y")) { 
	   $date='Aujourdhui'; 
	} else { 
	   $date = date("d/m/Y", strtotime($row["DATE_LANCEMENT"]));
	};
	if ($row["DUREE_SOUMISSION"]==0) {
	   $date_limite ='Open';
	} else 
	if ($row["DUREE_SOUMISSION"]==1) {
	   $date_limite ='Urgent';
	} else {
	   $date_l = datePlus($row["DATE_LANCEMENT"],$row["DUREE_SOUMISSION"]);
	   $date_limite = date("d/m/Y",strtotime($date_l));
	};
	
	$selectmoy = 'SELECT AVG(MONTANT) FROM SOUMISSIONS WHERE ID_PROJET='.$row["ID"];
    $resultmoy = mysql_query($selectmoy,$link) or die ('Erreur : '.mysql_error() );
    $totalmoy = mysql_num_rows($resultmoy);
	$moyenne = mysql_result($resultmoy,0);
    $valeur_moyenne=(int)($moyenne); 

	
	$IDClassProjet = "'"."Project-".$row["ID"]."'";
	$Description = coupe($row["DESCRIPTION"]);
    if ($var==0){ //Affiche le projet numéro .$row["ID"].
        echo '<tr bgcolor="#FFFFFF">';	
        echo '<td><a href="/projets/projet.php?ID='.$row["ID"].'" onMouseOver="showHint('.$IDClassProjet.');" onMouseOut="hideHint('.$IDClassProjet.');">'.$row["DESIGNATION"].'</a>';
		echo '<br>';
		echo $row["COMPETENCES"];
		echo '<span id="Project-'.$row["ID"].'" class="hint2">'.$Description.'<span class="hint-pointer2">&nbsp;</span></span>';
		echo '</td>';
		echo '<td>'.$valeur_moyenne.'</td>';
        echo '<td>'.$date.'</td>';
        echo '<td>'.$date_limite.'</td>';
        echo '</tr>'."\n";
		$var=1;
		}
		else{
		echo '<tr  bgcolor="#EEEEEE">';
        echo '<td><a href="/projets/projet.php?ID='.$row["ID"].'" onMouseOver="showHint('.$IDClassProjet.');" onMouseOut="hideHint('.$IDClassProjet.');" >'.$row["DESIGNATION"].'</a>';
		echo '<span id="Project-'.$row["ID"].'" class="hint2">'.$Description.'<span class="hint-pointer2">&nbsp;</span></span>';
		echo '<br>';
		echo $row["COMPETENCES"];
		echo '</td>';
        echo '<td>'.$valeur_moyenne.'</td>';
		echo '<td>'.$date.'</td>';
        echo '<td>'.$date_limite.'</td>';
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