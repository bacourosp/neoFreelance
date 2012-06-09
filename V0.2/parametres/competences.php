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
<script language="Javascript"> 
function ajouterSkills() {
var skills = job_ids.join(",");
document.neoprojet.SKILLS.value=skills;
}
document.write('<input type="hidden" value="" size="45" maxlength="60" name="SKILLS" id="project-skills">'); 
</script>

</head>
<body id="sky">

<?php
include('../menu.php');
?>
<div class="content">
<div id="profilContainer">
<br>
<h1>Profil</h1>

<?

include('mini-profil.php');

echo '<div class="dashboard">';

echo '<div class="module mini-profile">';
echo '<div class"account-group"><img src="'.$grav_url.'" alt="" /></div>';

echo '<div class="spacer"> </div>';
echo '</div>';

include('menu-gauche.php');

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '
<form name="profil" method="post" action="profil.php">
';

//=========================================

// information pour la connection à le DB

//=========================================

include('../../db.php');

//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

  $select = 'SELECT COMPETENCES FROM MEMBRES WHERE ID='.$_SESSION["ID_UTILISATEUR"].';';   
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);

if($total) {
 $row = mysql_fetch_array($result);
};



include('../php/fonctions.php');


//=========================================    

// Affichange des compétences

// requête SQL qui compte le nombre total 

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
     
	 $Competence= string2url($rowCompetence["ID"]);
	 echo '<INPUT type="checkbox" name="'.$Competence.'" value="'.$Competence.'"> '.$rowCompetence["COMPETENCE"];
     echo '<br>';
	 //echo '<li class="skill" id="'.$Competence.'" onClick="ajouterCompetence(this.id);">';
     //echo ''.$rowCompetence["COMPETENCE"].'';
     //echo '</li>';
     }
     }
  echo '</div>';
  echo '</div>';
}

};
//echo '</div>';


//Fin affichage compétences



echo '<div class="clear"></div>';
echo '
</br>
<center>
<button class="ns_btn ns_blue" type="submit" value="post">Modifier</button>
</center>
</form>
';

echo '</div>';//content-main

?>
<div class="spacer"> </div>
</div>
</div>
</body>
</html>