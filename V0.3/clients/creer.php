<?
session_start();
?>
<?

if (!isset($_POST["projectname"]) or !isset($_POST["description"]) or !isset($_POST["duree"]) or !isset($_POST["email"]) or !isset($_POST["budget"])) {
$masquer_formulaire = false;
$message = "Veuillez renseigner tout les champs, merci <br>";
} else {
//Si le membre est connecté et qu'on connait son identité on recherches son pseudo
		if (!isset($_SESSION["ID_UTILISATEUR"])){

       // information pour la connection à le DB
		include('../../db.php');

		// connection à la DB
		$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
		mysql_select_db($db) or die ('Erreur :'.mysql_error());

		$select = 'SELECT PSEUDO FROM MEMBRES WHERE ID="'.$_POST['email'].'";';

		$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  		$total = mysql_num_rows($result);
//Si on trouve son EMAIL pour savoir si il est membre sinon il sera anonyme
  			if ($total){
			$row = mysql_fetch_array($result);
            $PROPRIETAIREPROJET = $row["PSEUDO"];			
			}else {$PROPRIETAIREPROJET = 'Anonyme' ;};
	   	} else {

        // information pour la connection à le DB
		include('../../db.php');

		// connection à la DB
		$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
		mysql_select_db($db) or die ('Erreur :'.mysql_error());

		$select = 'SELECT PSEUDO FROM MEMBRES WHERE ID="'.$_SESSION['ID_UTILISATEUR'].'";';

		$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  		$total = mysql_num_rows($result);
  
  			if ($total){
			$row = mysql_fetch_array($result);
			  if ($_POST["anonyme"] == TRUE) 
			  {
		      $PROPRIETAIREPROJET = 'Anonyme';
			  }
			  else
			  { 
			  $PROPRIETAIREPROJET = $row["PSEUDO"];
			  };
			};
	    };
		
		$EMAIL = $_POST["email"];
		$NOMPROJET = $_POST['projectname'];
		$DESCRIPTION = $_POST['description'];
		$BUDGET = $_POST['budget'];
		$DUREESOUMISSION = $_POST['duree'];  

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

		$DATE= date("c");


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
			$comp=implode(", ",$TABcompetences);
			//FIN TRAITEMENT


//Ceci découle de mon souhait d'avoir des client Anonymes
// Génération de la clef d'activation
                   $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                   $caracteres_aleatoires = array_rand($caracteres, 8);
                   $CLEF_ACTIVATION = "";
                         
                   foreach($caracteres_aleatoires as $i)
                    {
                    $CLEF_ACTIVATION .= $caracteres[$i];
                    }

		
			$requete = "insert into PROJETS values('','".$PROPRIETAIREPROJET."','".$EMAIL."','0','".$CLEF_ACTIVATION."','".$NOMPROJET."', '".$comp."', '".$DESCRIPTION."', '".$MONTANTMIN."','".$MONTANTMAX."', '".$DATE."', '".$DUREESOUMISSION."');" ;
			mysql_query($requete);

// Envoi du mail d'activation
                   $sujet = "Validation de votre Projet";
                              
                   $message = "Pour valider votre Projet, merci de cliquer sur le lien suivant :\n";
                   $message .= "http://" . $_SERVER["SERVER_NAME"];
                   $message .= "/clients/valider-projet.php?id=" . mysql_insert_id();
                   $message .= "&clef=" . $CLEF_ACTIVATION."\n";
				   $message .= "Merci d'avoir choisi neoFreelance.";
                              
                   // Si une erreur survient
                   if(!@mail($_POST["email"], $sujet, $message, 'From: noreply@neofreelance.com'."\r\n"))
                     {
                     $message = "Une erreur est survenue lors de l'envoi du mail d'activation<br />\n";
                     $message .= "Veuillez contacter l'administrateur afin d'activer votre compte";
                     }
                     else
                     {
                                   
                     // Message de confirmation
                     $message = "Votre projet a correctement été créer<br />\n";
                     $message .= "Un email vient de vous être envoyer afin de l'activer";
                                   
                     // On masque le formulaire
                     $masquer_formulaire = true;
                                   
                }
	  
}

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
<? 
if(isset($message)) {
      echo '<p>';
      echo $message;
      echo '</p>';
	  } else {
	  echo '<p>';
	  echo 'Votre projet a été créé';
	  echo '</p>';
}; 
?>
<br>
<? if($masquer_formulaire != true) { ?>


<form name="neoprojet" method="post" action="creer.php">
<div id="divProjectName" style="position: relative ">
	<label for="projectName"><b>Nom du Projet :</b></label>&nbsp;
	<span id="project-name-err" class="err-msg">Entrez un nom à votre projet (minimum 10 caractères)</span>
	<br>
	<input type="text" value="" size="45" maxlength="45" name="projectname" id="project-name" class="projectFormTextField big-textbox" onMouseOver="showHint('project-name-hint');" onMouseOut="hideHint('project-name-hint');" onBlur="showError10('project-name','project-name-err');">&nbsp;
	<span id="project-name-hint" class="hint" style="display:none;">Le nom de votre projet est important car c'est ce qui va attirer les freelances à soumissionner. Vous devez clairement décrire vos besoins en aussi peu de mots que possible.<span class="hint-pointer">&nbsp;</span></span>
</div>
<div class="clear"></div>
<br />
<br />


<div>
<span><b>Compétences requises : <a style="color:#008BCB; text-decoration:underline; cursor:pointer" onClick="showBoxSkills();">Explorer <img src="../images/icones/loupe.png" width="20"></a></b></span>
<br>
<input type="text" value="Fonction non encore disponible, Explorez !" size="45" maxlength="45" id="skill-input" class="projectFormTextField big-textbox" style="vertical-align: text-bottom" onMouseOver="showHint('skill-input-hint');" onMouseOut="hideHint('skill-input-hint');" disabled/>
<span id="skill-input-hint" class="hint">Selon ce que demande votre projet, les freelances du réseau sauront postuler à votre projet.<span class="hint-pointer">&nbsp;</span></span>
</div>
</br>
<!------Affichage dune compétence------>
<div id="box-skills"><b>Compétences : </b><a style="position:absolute; top:0; right:0;" onClick="hideBoxSkills();"><img src="../images/icones/icon_close1.png"></a>

<? include('competences.php'); ?>

</div>

<div id="skill-container" style="min-height:60px;">

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
			<textarea style="width:764px;" name="description" rows="13" maxlength="4000" id="project-description" class="projectFormTextField" onMouseOver="showHint('project-description-hint');" onMouseOut="hideHint('project-description-hint');" onBlur="showError10('project-description','project-description-err');" onkeypress="compter(this.form);"></textarea>&nbsp;
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
						
			<option value='0' selected>
				Projet simple
			    (30-250 EUR)
			</option>
			
			<option value='1' >
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
        <input type="text" class="projectFormTextField small-textbox" name="duree" id="bidperiod" maxlength="2" size="3" value="0" style="vertical-align:middle;" onMouseOver="showHint('bidperiod-hint');" onMouseOut="hideHint('bidperiod-hint');" onBlur="showError('bidperiod','bidperiod-err');">
        <span id="bidperiod-hint" class="hint">Donnez vous 1-99 jours pour recevoir des soumissions et choisir un freelance si vous séléctionnez 1 votre projet sera marqué URGENT!<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 99 jours, 0 pour une période indéfinie) &nbsp;<span id="bidperiod-err" class="err-msg">Entrez une période de soumission s'il vous plait.</span>
</div>


<?
if (isset($_SESSION["ID_UTILISATEUR"]) and $_SESSION['connected']==TRUE) {
echo '</br>';
echo '</br>';
// information pour la connection à le DB
		include('../../db.php');

		// connection à la DB
		$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
		mysql_select_db($db) or die ('Erreur :'.mysql_error());

		$select = 'SELECT EMAIL FROM MEMBRES WHERE ID="'.$_SESSION['ID_UTILISATEUR'].'";';

		$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  		$total = mysql_num_rows($result);
  
  			if ($total){
			$row = mysql_fetch_array($result);
		    $email = $row["EMAIL"];
			};
?>
<div id="emaildDiv"  style="position:relative; display:none;" >
        <label for="subCategory"><b>Email de contact :</b></label>
		<span id="email-err" class="err-msg">Entrez un Email SVP</span>
		<br>
        <input type="text" class="projectFormTextField big-textbox" name="email" id="email" maxlength="45" size="45" value="<? echo $email; ?>" style="vertical-align:middle;" onMouseOver="showHint('email-hint');" onMouseOut="hideHint('email-hint');" onBlur="showError('email','email-err');">
        <span id="email-hint" class="hint">Cet Email servira pour recevoir des notifications quand un Freelance soumissionne<span class="hint-pointer">&nbsp;</span></span>
        &nbsp;
</div>
<label for="subCategory"><b>Projet Anonyme :</b></label>
<br>
<input type="checkbox" name="anonyme"> Cocher cette case pour rester Anonyme ! <br>
<?
} else {
echo '</br>';
echo '</br>';
?>
<div id="emaildDiv"  style="position:relative" >
        <label for="subCategory"><b>Email de contact :</b></label>
		<span id="email-err" class="err-msg">Entrez un Email SVP</span>
		<br>
        <input type="text" class="projectFormTextField big-textbox" name="email" id="email" maxlength="45" size="45" value="" style="vertical-align:middle;" onMouseOver="showHint('email-hint');" onMouseOut="hideHint('email-hint');" onBlur="showError('email','email-err');">
        <span id="email-hint" class="hint">Cet Email servira pour recevoir des notifications quand un Freelance soumissionne<span class="hint-pointer">&nbsp;</span></span>
        &nbsp;
</div>
<?
};
?>

</br>
</br>
<center>
<button class="ns_btn ns_blue" type="submit" value="post" onClick="ajouterSkills();">Créer</button>
</center>
</form>

<? } ?>
</br>
</br>

</div>
</div>
<? 
include('../footer.php');
?>
</body>
</html>