<?
session_start();
?>
<?

if (!isset($_POST['SKILLS'])) {

$message ='Modification de votre compte<br />';

} else {

			// information pour la connection à le DB
			include('../../db.php');

			// connection à la DB
			$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
			mysql_select_db($db) or die ('Erreur :'.mysql_error());

			//TRAITEMENT DU TABLEAU DE COMPETENCES
			$COMPETENCES = explode(",",$_POST['SKILLS']);
			$TABcompetences = array();
			foreach ($COMPETENCES as $IDcompetence){

  			$selectcomp = 'SELECT NOM FROM CATEGORIES WHERE ID="'.$IDcompetence.'";';
  			$resultcomp = mysql_query($selectcomp,$link) or die ('Erreur : '.mysql_error() );
  			$totalcomp = mysql_num_rows($resultcomp);
  
  			if ($totalcomp){
  			$rowcomp = mysql_fetch_row($resultcomp);
  			$TABcompetences[]=$rowcomp[0];
  				};
			};
			$competences_text=implode(", ",$TABcompetences);
			//FIN TRAITEMENT

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

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<title>Profil</title>
<?
include('../scriptes.php');
?>
  <script>
  $(document).ready(function() {
    $("#box-skills").draggable();
  });
  </script>
</head>
<body id="sky">

<?
include('../menu.php');

?>
<div class="content">
<div class="container">
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

include('../parametres/mini-profil.php');

echo '<div class="dashboard">';

echo '<div class="module mini-profile">';
echo '<div class"account-group"><img src="'.$grav_url.'" alt="" /></div>';

echo '<div class="spacer"> </div>';
echo '</div>';

echo '<div class="module">';
echo '<ul>';
echo '<li><a class="list-link" href="compte.php">Compte</a></li>';
echo '<li><a class="list-link" href="pass.php">Mot de passe</a></li>';
echo '<li><a class="list-link" href="notifications.php">Notifications</a></li>';
echo '<li><a class="list-link actif" href="mescompetences.php">Compètences</a></li>';
echo '<li><a class="list-link" href="profil.php">Profil</a></li>';
echo '</ul>';
echo '</div>';

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '
<form name="competences" method="post" action="mescompetences.php" >
';
?>

<div>
<span><b>Choisissez vos compétences : <a style="color:#008BCB; text-decoration:underline; cursor:pointer" onClick="showBoxSkills();">Explorer <img src="../images/icones/loupe.png" width="20"></a></b></span>
<br>
<input type="text" value="Fonction non encore disponible, Explorez !" size="45" maxlength="45" id="skill-input" class="projectFormTextField big-textbox" style="vertical-align: text-bottom" onMouseOver="showHint('skill-input-hint');" onMouseOut="hideHint('skill-input-hint');" disabled/>
<span id="skill-input-hint" class="hint">Selon ce que demande votre projet, les freelances du réseau sauront postuler à votre projet.<span class="hint-pointer">&nbsp;</span></span>
</div>
</br>
<!------Affichage dune compétence------>
<div id="box-skills"><b>Compétences : </b><a style="position:absolute; top:0; right:0;" onClick="hideBoxSkills();"><img src="../images/icones/icon_close1.png"></a>

<? include('competences.php'); ?>

</div>

<div id="skill-container" style=" min-height:200px; ">

<?

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
 $competencefreelance=explode(", ",$row["COMPETENCES"]);
afficherMesCompetences($competencefreelance);


};


?>
<div class="spacer"></div>
</div>
<script language="Javascript"> 
function ajouterSkills() {
var skills = job_ids.join(",");
document.competences.SKILLS.value=skills;
}
document.write('<input type="hidden" value="" size="45" maxlength="60" name="SKILLS" id="project-skills">'); 
</script>
<!------Fin Affichage dune compétence------>

<?

echo '</div>';//content-main

echo '<div class="clear"></div>';
echo '<div style="border: 2px solid #EEE;"></div>';

echo '
</br>

<button class="ns_btn ns_blue" type="submit" value="post" onClick="ajouterSkills();" style="float:right;">Modifier</button>

</form>
';

?>
<div class="spacer"> </div>
</div>
</div>

</body>
</html>