<?

//=========================================

// information pour la connection à le DB

//=========================================

include('../../db.php');

//=========================================

// initialisation des variables 

//=========================================

// on va afficher $_GET[5] résultats par page.

echo '<a name="navig-table"></a>';
echo "\n";
?>
<span>
<select size="1" name="project_table_length" class="selectP" onChange="window.location='tout.php?competence=<? $competence ?>&nombre='+this.value">
<option value="10" <? if ($_GET[nombre]==10) { echo 'selected';}; ?> >10</option>
<option value="50" <? if ($_GET[nombre]==50) { echo 'selected';}; ?> >50</option>
<option value="100" <? if ($_GET[nombre]==100) { echo 'selected';}; ?>>100</option>
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

  $select = "SELECT ID,NOM, DESCRIPTION, COMPETENCES,DATE,TEMPS FROM PROJETS WHERE COMPETENCES LIKE '%".$_GET['competence']."%' ORDER BY DATE DESC limit ".$limite.",".$nombre;
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

//=========================================    

// si le nombre d'enregistrement à afficher 

// est plus grand que $nombre 

//=========================================

if($totalEnregistrements > $nombre) {

    // affichage des liens vers les pages

    affichePages($nombre,$page,$totalEnregistrements);

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
        echo '<th width=""><b><u>Nom du projet</u></b></th>';
        echo '<th width="200"><b><u>Compétences</u></b></th>';
        echo '<th width="200"><b><u>Date</u></b></th>';
		echo '<th width="200"><b><u>Durée Soumission</u></b></th>';
        
        echo '</tr></thead>'."\n";
		
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.    
    $var=0; 
	while($row = mysql_fetch_array($result)) {
    if ($row["DATE"]==date('c')) { 
	   $date='Aujourdhui'; 
	} else { 
	   $date = date("d/m/Y", strtotime($row["DATE"]));
	};
	if ($row["TEMPS"]==0) {
	   $duree ='Indéfini';
	} else 
	if ($row["TEMPS"]==1) {
	   $duree ='Urgent';
	} else {
	   $duree =$row["TEMPS"];
	};
    $IDClassProjet = "'"."Project-".$row["ID"]."'";
    if ($var==0){ //Affiche le projet numéro .$row["ID"].
        echo '<tr bgcolor="#FFFFFF">';	
        echo '<td><a href="/projets/projet.php?ID='.$row["ID"].'" onMouseOver="showHint('.$IDClassProjet.');" onMouseOut="hideHint('.$IDClassProjet.');">'.$row["NOM"].'</a>';
		echo '<span id="Project-'.$row["ID"].'" class="hint">'.$row["DESCRIPTION"].'<span class="hint-pointer">&nbsp;</span></span>';
		echo '</td>';
		echo '<td>'.$row["COMPETENCES"].'</td>';
        echo '<td>'.$date.'</td>';
        echo '<td>'.$duree.'</td>';
        echo '</tr>'."\n";
		$var=1;
		}
		else{
		echo '<tr  bgcolor="#EEEEEE">';
        echo '<td><a href="/projets/projet.php?ID='.$row["ID"].'" onMouseOver="showHint('.$IDClassProjet.');" onMouseOut="hideHint('.$IDClassProjet.');">'.$row["NOM"].'</a>';
		echo '<span id="Project-'.$row["ID"].'" class="hint">'.$row["DESCRIPTION"].'<span class="hint-pointer">&nbsp;</span></span>';
		echo '</td>';
        echo '<td>'.$row["COMPETENCES"].'</td>';
		echo '<td>'.$date.'</td>';
        echo '<td>'.$duree.'</td>';
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