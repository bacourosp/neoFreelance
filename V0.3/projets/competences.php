<?
include('../php/fonctions.php');
?>
<?
//=========================================

// information pour la connection � le DB

//=========================================

include('../../db.php');

//=========================================    

// connection � la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================    

// requ�te SQL qui compte le nombre total 

// d'enregistrements dans la table.

//=========================================

$selectCategorie = 'SELECT DISTINCT CATEGORIE FROM COMPETENCES;';
$resultCategorie = mysql_query($selectCategorie,$link) or die ('Erreur : '.mysql_error() );
$totalCategorie = mysql_num_rows($resultCategorie);


//echo '<div>';

if ($totalCategorie) {

while($rowCategorie = mysql_fetch_array($resultCategorie)) {
     
	 $Categorie = string2url($rowCategorie["CATEGORIE"]);
	 
  echo '<div><div id="'.$Categorie.'" onclick="javascript:permute1(this.id);" class="plus">[<span id="s'.$Categorie.'">+</span>] '.$rowCategorie["CATEGORIE"].'</div>';
  echo '<div class="left_c" id="c'.$Categorie.'" style="display:none">';
     
     $selectCompetence = 'SELECT DISTINCT ID,COMPETENCE FROM COMPETENCES WHERE CATEGORIE ="'.$Categorie.'";';
     $resultCompetence = mysql_query($selectCompetence,$link) or die ('Erreur : '.mysql_error() );
     $totalCompetence = mysql_num_rows($resultCompetence);



     if ($totalCompetence) {

     while($rowCompetence = mysql_fetch_array($resultCompetence)) {
     
	 $selReq='SELECT count(*) AS NBCOMP FROM PROJETS WHERE COMPETENCES LIKE "%'.$rowCompetence["COMPETENCE"].'%"';
	 $reqCompetence = mysql_query($selReq,$link) or die ('Erreur : '.mysql_error() );
     $data = mysql_fetch_assoc($reqCompetence);
	 
	 
	 $Competence= string2url($rowCompetence["ID"]);
	 $nbpages=50;
     echo '<span class="skill" id="'.$Competence.'">';
	 echo '<a';
     echo ' href="./projets.php?competence='.$rowCompetence["COMPETENCE"].'&nombre='.$nbpages.'"';
     echo '>'.$rowCompetence["COMPETENCE"].'</a>';
	 echo '</span>';
	 echo '<span>('.$data["NBCOMP"].')</span>';
	 echo ' | ';
     }
     }
  echo '</div>';
  echo '</div>';
}

};
//echo '</div>';
?>