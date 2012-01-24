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
<div class="c9d-tabcnt">

<div id="postprojectContainer">

<br>
<h1>Nouveau Projet</h1>

<form name="neoprojet" method="post" action="creer.php">
<div id="divProjectName" style="position:relative">
	<label for="projectName"><b>Nom du Projet :</b></label>&nbsp;<span id="project-name-err" class="err-msg">Entrez un nom à votre projet (minimum 10 caractères)</span>
	</br>
	<input type="text" value="" size="45" maxlength="60" name="NOMPROJET" id="project-name" class="projectFormTextField big-textbox" onMouseOver="showHint('project-name-hint');" onMouseOut="hideHint('project-name-hint');" onBlur="showError10('project-name','project-name-err');">&nbsp;
	<span id="project-name-hint">Le nom de votre projet est important car c'est ce qui va attirer les freelances à soumissionner. Vous devez clairement décrire vos besoins en aussi peu de mots que possible.<span class="hint-pointer">&nbsp;</span></span>
</div>
<div class="clear"></div>
<br />
<br />


<div>
<span><b>Compétences requises : </b><a style="color:#00CC33; text-decoration:underline; cursor:pointer" onClick="showBoxSkills();">Compétences disponibles</a></span>
</div>
</br>
</br>
<!------Affichage dune compétence------>

<? include('competences.php'); ?>

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
			<textarea style="width:764px;" name="DESCRIPTION" rows="13" id="project-description" class="projectFormTextField" onMouseOver="showHint('project-description-hint');" onMouseOut="hideHint('project-description-hint');" onBlur="showError10('project-description','project-description-err');"></textarea>&nbsp;
			<span id="project-description-hint">Plus vous détaillez votre projet, plus vous aurez de chance d'avoir exactement ce que vous cherchez après un minimum de temps.<span class="hint-pointerRC">&nbsp;</span></span>
			</div>
			</td>
		</tr>
		<tr>
			<td height="20" class="projectDescriptionWarning"><strong>IMPORTANT!</strong> Pour l'instant vous pouvez mettre vos informations de contact.</td>
			<td class="divProjectCharLeft">
			<img src="../img/icons/icon_charleftpencil.png" width="8" height="8" alt="character left">&nbsp;<span id="proj-descr-char-count">4000</span> Caractères<span id="proj-descr-char-s"></span> Maximum</td>
		</tr>
	</table>
</div>
</br>
</br>

<div id="budgetDiv" class="ns_pad-t">
		<label for="budget"><b>Budget du projet :</b></label><br/>
		<select name=budget id="budget" style="font-family: Helvetica,Arial,sans-serif; font-size: 14px; width: 300px; margin-top: 4px; margin-left: 4px; padding: 4px; -moz-border-radius: 5px 5px 5px 5px; border: 2px solid rgb(217, 217, 217);">
						
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
        <span id="bidperiod-hint">Donnez vous 1-60 jours pour recevoir des soumissions et choisir un freelance si vous séléctionnez 1 votre projet sera marqué URGENT!<span class="hint-pointerRC">&nbsp;</span></span>
        <label>Jours</label> (maximum 60 jours, 0 pour une période indéfinie) &nbsp;<span id="bidperiod-err" class="err-msg">Entrez une période de soumission s'il vous plait.</span>
</div>

</br>
</br>

<button class="ns_btn ns_blue" type="submit" value="post" onClick="ajouterSkills();">CREER VOTRE PROJECT</button>
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
$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

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