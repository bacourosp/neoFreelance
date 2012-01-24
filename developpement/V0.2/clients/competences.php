<div id="box-skills">Compétences disponibles : <a style="position:absolute; top:0; right:0;" onClick="hideBoxSkills();"><img src="../images/icones/icon_close1.png"></a>

<?
//=========================================

// information pour la connection à le DB

//=========================================

$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================    

// requête SQL qui compte le nombre total 

// d'enregistrements dans la table.

//=========================================

$selectCategorie = 'SELECT DISTINCT CATEGORIE FROM COMPETENCES;';
$resultCategorie = mysql_query($selectCategorie,$link) or die ('Erreur : '.mysql_error() );
$totalCategorie = mysql_num_rows($resultCategorie);


echo '<div>';

if ($totalCategorie) {

while($rowCategorie = mysql_fetch_array($resultCategorie)) {
     
	 echo '<div>'.$rowCategorie["CATEGORIE"];

     $Categorie = $rowCategorie["CATEGORIE"];
     $selectCompetence = 'SELECT DISTINCT ID,COMPETENCE FROM COMPETENCES WHERE CATEGORIE ="'.$Categorie.'";';
     $resultCompetence = mysql_query($selectCompetence,$link) or die ('Erreur : '.mysql_error() );
     $totalCompetence = mysql_num_rows($resultCompetence);

     if ($totalCompetence) {

     while($rowCompetence = mysql_fetch_array($resultCompetence)) {
    
     echo '<li class="skill" id="'.$rowCompetence["ID"].'" onClick="ajouterCompetence(this.id);">';
     echo ''.$rowCompetence["COMPETENCE"].'';
     echo '</li>';
     }
     }
echo '</div>';
}
};
echo '</div>';
?>
</div>