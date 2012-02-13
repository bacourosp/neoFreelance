<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<title>Bienvenue au site des freelances</title>
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

<div id="postprojectContainer">

<br>
<h1>Nouveau Projet</h1>

<form name="neoprojet" method="post" action="creer.php">
<div id="divProjectName" style="position: relative ">
	<label for="projectName"><b>Nom du Projet :</b></label>&nbsp;
	<span id="project-name-err" class="err-msg">Entrez un nom à votre projet (minimum 10 caractères)</span>
	<br>
	<input type="text" value="" size="45" maxlength="60" name="NOMPROJET" id="project-name" class="projectFormTextField big-textbox" onMouseOver="showHint('project-name-hint');" onMouseOut="hideHint('project-name-hint');" onBlur="showError10('project-name','project-name-err');">&nbsp;
	<span id="project-name-hint" class="hint" style="display:none;">Le nom de votre projet est important car c'est ce qui va attirer les freelances à soumissionner. Vous devez clairement décrire vos besoins en aussi peu de mots que possible.<span class="hint-pointer">&nbsp;</span></span>
</div>
<div class="clear"></div>
<br />
<br />


<div>
<span><b>Compétences requises : <a style="color:#008BCB; text-decoration:underline; cursor:pointer" onClick="showBoxSkills();">Explorer <img src="../images/icones/loupe.png" width="20"></a></b></span>
<br>
<input type="text" value="Fonction non encore disponible, Explorez !" size="45" maxlength="60" id="skill-input" class="projectFormTextField big-textbox" style="vertical-align: text-bottom" onMouseOver="showHint('skill-input-hint');" onMouseOut="hideHint('skill-input-hint');" disabled/>
<span id="skill-input-hint" class="hint">Selon ce que demande votre projet, les freelances du réseau sauront postuler à votre projet.<span class="hint-pointer">&nbsp;</span></span>
</div>
</br>
<!------Affichage dune compétence------>
<div id="box-skills"><b>Compétences : </b><a style="position:absolute; top:0; right:0;" onClick="hideBoxSkills();"><img src="../images/icones/icon_close1.png"></a>

<? include('competences.php'); ?>

</div>

<div id="skill-container">

</div>
<script language="Javascript"> 
function ajouterSkills() {
var skills = job_ids.join(",");
document.neoprojet.SKILLS.value=skills;
}
document.write('<input type="hidden" value="" size="45" maxlength="60" name="SKILLS" id="project-skills">'); 
</script>
<!------Fin Affichage dune compétence------>
<br />
<br />

<div id="divProjectDescription" >
	<table width="767" border="0">
		<tr>
			<td width="600"><label for="projectDetails"><b>Décrire votre projet en détail :</b></label>
			
			<span id="project-description-err" class="err-msg">Entrez un minimum de dix carctères s'il vous plait</span></td>
			
			<td> </td>
		</tr>
		<tr>
			<td colspan="2">
			<div style="width:790px; margin-bottom:15px; position:relative;">
			<textarea style="width:764px;" name="description" rows="13" id="project-description" class="projectFormTextField" onMouseOver="showHint('project-description-hint');" onMouseOut="hideHint('project-description-hint');" onBlur="showError10('project-description','project-description-err');" onkeypress="compter(this.form);"></textarea>&nbsp;
			<span id="project-description-hint" class="hint">Plus vous détaillez votre projet, plus vous aurez de chance d'avoir exactement ce que vous cherchez après un minimum de temps.<span class="hint-pointer">&nbsp;</span></span>
			</div>
			</td>
		</tr>
		<tr>
			<td class="projectDescriptionWarning"></td>
			<td class="divProjectCharLeft">
			<img src="../images/icones/crayon.jpg" width="20" height="20" alt="character left">&nbsp;<span id="proj-descr-char-count">4000</span> Restants<span id="proj-descr-char-s"></span>
			</td>
		</tr>
	</table>
</div>
</br>
</br>

<div id="budgetDiv" class="ns_pad-t">
		<label for="budget"><b>Budget du projet :</b></label><br/>
		<select name=budget id="budget" class="selectT">
						
			<option value='0' >
				Projet simple
			    (30-250 EUR)
			</option>
			
			<option value='1' selected>
				Très petit projet
			    (250-750 EUR)
			</option>
			
			<option value='2' >
				Petit projet
			    (750-1500 EUR)
			</option>
			
			<option value='3' >
				Moyen projet
			    (1500-3000 EUR)
			</option>
			
			<option value='4' >
				Grand projet
			    (3000-5000 EUR)
			</option>
			
			<option value='5' >
				Très grand projet
			    (>5000 EUR)
			</option>
			
		</select>
</div>
</br>
</br>

<div id="bidPeriodDiv"  style="position:relative" >
        <label for="subCategory"><b>Temps de soumission ?</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="DUREESOUMISSION" id="bidperiod" maxlength="3" size="3" value="0" style="vertical-align:middle;" onMouseOver="showHint('bidperiod-hint');" onMouseOut="hideHint('bidperiod-hint');" onBlur="showError('bidperiod','bidperiod-err');">
        <span id="bidperiod-hint" class="hint">Donnez vous 1-60 jours pour recevoir des soumissions et choisir un freelance si vous séléctionnez 1 votre projet sera marqué URGENT!<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 60 jours, 0 pour une période indéfinie) &nbsp;<span id="bidperiod-err" class="err-msg">Entrez une période de soumission s'il vous plait.</span>
</div>

</br>
</br>
<center>
<button class="ns_btn ns_blue" type="submit" value="post" onClick="ajouterSkills();">Créer</button>
</center>
</form>
</br>
</br>
<?

$NOMPROJET = $_POST['NOMPROJET'];
$DESCRIPTION = $_POST['DESCRIPTION'];
$BUDGET = $_POST['BUDGET'];
$DUREESOUMISSION = $_POST['DUREESOUMISSION'];  

if (isset($_SESSION['EMAIL'])) 
   {$PROPRIETAIREPROJET =$_SESSION['EMAIL'];}
else 
   {$PROPRIETAIREPROJET = 'ANONYME' ;}

switch ($BUDGET) {
case 0 :  $MONTANTMIN= 30; 
          $MONTANTMAX= 250;
		  break;
case 1 :  $MONTANTMIN= 250; 
          $MONTANTMAX= 750;
		  break;
case 2 :  $MONTANTMIN= 750; 
          $MONTANTMAX= 1500;
		  break;
case 3 :  $MONTANTMIN= 1500; 
          $MONTANTMAX= 3000;
		  break;
case 4 :  $MONTANTMIN= 3000; 
          $MONTANTMAX= 5000;
		  break;
case 5 :  $MONTANTMIN= 5000; 
          $MONTANTMAX= 100000;
		  break;
}

$DATE= date('c');


// information pour la connection à le DB
include('../../db.php');

// connection à la DB
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//TRAITEMENT DU TABLEAU DE COMPETENCES
$COMPETENCES = explode(",",$_POST['SKILLS']);
$TABcompetences = array();
foreach ($COMPETENCES as $IDcompetence){

  $selectcomp = 'SELECT COMPETENCE FROM COMPETENCES WHERE ID="'.$IDcompetence.'";';
  $resultcomp = mysql_query($selectcomp,$link) or die ('Erreur : '.mysql_error() );
  $totalcomp = mysql_num_rows($resultcomp);
  
  if ($totalcomp){
  $rowcomp = mysql_fetch_row($resultcomp);
  $TABcompetences[]=$rowcomp[0];
  };
};
$comp=implode(",",$TABcompetences);
//FIN TRAITEMENT



if (!$NOMPROJET == '' and !$DESCRIPTION == '') {

$requete = "insert into PROJETS values('', '".$NOMPROJET."', '".$comp."', '".$DESCRIPTION."', '".$MONTANTMIN."','".$MONTANTMAX."', '".$DATE."', '".$DUREESOUMISSION."');" ;
mysql_query($requete);

}

?>
</div>
</div>

</body>
</html>