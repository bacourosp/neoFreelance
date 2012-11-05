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
<p>Paramètre non encore disponible</p>
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

<INPUT type=radio name="profil" value="Anonymous"> Rester Anonyme sur neoFreelance
	<br>
<INPUT type=radio name="profil" value="Gravatar"> Utiliser <a href="http://fr.gravatar.com/">Gravatar</a>

</form>';



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