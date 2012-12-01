<?
session_start();
?>
<?

if (!isset($_POST['competences'])) {

$message ='Modification de votre compte<br />';

} else {

$competences_text = implode(', ',$competences);

 include('../../db.php');
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
                    mysql_select_db($db) or die ('Erreur :'.mysql_error());

                    $result = mysql_query("
                              UPDATE MEMBRES
                              SET COMPETENCES = '".$competences_text."'
                              WHERE ID = '".$_SESSION["ID_UTILISATEUR"]."'
                              ");
			        if(!$result)
                    {
                    $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
                    }
}
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

<?php
include('../menu.php');
?>
<div class="content">
<div id="profilContainer">
<br>
<h1>Compétences</h1>
<? 
if(isset($message)) {
      echo '<p>';
      echo $message;
      echo '</p>';

}; 
?>
<br>
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
<form name="competences" method="post" action="competences.php" >
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
     
	 $selReq='SELECT count(*) AS NBCOMP FROM MEMBRES WHERE COMPETENCES LIKE "%'.$rowCompetence["COMPETENCE"].'%"';
	 $reqCompetence = mysql_query($selReq,$link) or die ('Erreur : '.mysql_error() );
     $data = mysql_fetch_assoc($reqCompetence);
	 
	 if ($data["NBCOMP"] > 0) {
	 $Competence= $rowCompetence["COMPETENCE"];
	 echo '<INPUT type="checkbox" name="competences[]" value="'.$Competence.'" checked="checked"> '.$rowCompetence["COMPETENCE"];
     echo '<br>';
	 }
	 else {
	 $Competence= $rowCompetence["COMPETENCE"];
	 echo '<INPUT type="checkbox" name="competences[]" value="'.$Competence.'"> '.$rowCompetence["COMPETENCE"];
     echo '<br>';
	 
     }//else cheked !
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