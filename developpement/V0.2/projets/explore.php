<?
//=========================================

// information pour la connection � le DB

//=========================================

$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

//=========================================

// initialisation des variables 

//=========================================

// on va afficher $_GET[nombre]] r�sultats par page.

echo '<a name="navig-table"></a>';
echo "\n";
?>
<span>
<select size="1" name="project_table_length" onChange="window.location='derniers.php?nombre='+this.value">
<option value="10" <? if ($_GET[nombre]==10) { echo 'selected';}; ?> >10</option>
<option value="50" <? if ($_GET[nombre]==50) { echo 'selected';}; ?> >50</option>
<option value="100" <? if ($_GET[nombre]==100) { echo 'selected';}; ?>>100</option>
</select>
</span>
<?

// si limite n'existe pas on l'initialise � z�ro

//if (!$limite) $limite = 0; 

// on cherche le nom de la page.    

$path_parts = pathinfo($_SERVER['PHP_SELF']);

$page = $path_parts["basename"];



//=========================================    

// connection � la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================    

// requ�te SQL qui compte le nombre total 

// d'enregistrements dans la table.

//=========================================

$select = 'SELECT count(id) FROM PROJETS';

$result = mysql_query($select,$link)  or die ('Erreur : '.mysql_error() );

$row = mysql_fetch_row($result);

$totalEnregistrements = $row[0];

    

//=========================================

// v�rifier la validit� de notre variable 

// $limite;

//=========================================

$verifLimite= verifLimite($limite,$totalEnregistrements,$nombre);

// si la limite pass�e n'est pas valide on la remet � z�ro

if(!$verifLimite)  {

    $limite = 0;

}

//=========================================

// requ�te SQL qui ne prend que le nombre 

// d'enregistrement necessaire � l'affichage.

//=========================================

  $select = 'SELECT ID,NOMPROJET,COMPETENCES,DATE,DUREESOUMISSION FROM PROJETS ORDER BY DATE DESC limit '.$limite.','.$nombre;
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

//=========================================    

// si le nombre d'enregistrement � afficher 

// est plus grand que $nombre 

//=========================================

if($totalEnregistrements > $nombre) {

    // affichage des liens vers les pages

    affichePages($nombre,$page,$totalEnregistrements);

    // affichage des boutons

    //displayNextPreviousButtons($limite,$totalEnregistrements,$nombre,$page);

}

//=========================================    

// si on a r�cup�r� un resultat on l'affiche.

//=========================================

  if($total) {
    // debut du tableau
	echo '<center>';

    echo '<table id="projets-recents" class="dataTable" width="920">'."\n";
        // premi�re ligne on affiche les titres pr�nom et surnom dans 2 colonnes
        echo '<thead><tr>';
        echo '<th width=""><b><u>Nom du projet</u></b></th>';
        echo '<th width="200"><b><u>Comp�tences</u></b></th>';
        echo '<th width="200"><b><u>Date</u></b></th>';
		echo '<th width="200"><b><u>Dur�e Soumission</u></b></th>';
        
        echo '</tr></thead>'."\n";
		
    // lecture et affichage des r�sultats sur 2 colonnes, 1 r�sultat par ligne.    
    $var=0; 
	while($row = mysql_fetch_array($result)) {
    if ($row["DATE"]==date('c')) { 
	   $date='Aujourdhui'; 
	} else { 
	   $date = date("d/m/Y", strtotime($row["DATE"]));
	};
	if ($row["DUREESOUMISSION"]==0) {
	   $duree ='Ind�fini';
	} else 
	if ($row["DUREESOUMISSION"]==1) {
	   $duree ='Urgent';
	} else {
	   $duree =$row["DUREESOUMISSION"];
	};
    if ($var==0){ //Affiche le projet num�ro .$row["ID"].
        echo '<tr bgcolor="#FFFFFF">';
        echo '<td><a href="/projets/projet.php?ID='.$row["ID"].'">'.$row["NOMPROJET"].'</a></td>';
		echo '<td>'.$row["COMPETENCES"].'</td>';
        echo '<td>'.$date.'</td>';
        echo '<td>'.$duree.'</td>';
        echo '</tr>'."\n";
		$var=1;
		}
		else{
		echo '<tr  bgcolor="#EEEEEE">';
        echo '<td><a href="/projets/projet.php?ID='.$row["ID"].'">'.$row["NOMPROJET"].'</a></td>';
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
  // on lib�re le r�sultat
  mysql_free_result($result);


?>