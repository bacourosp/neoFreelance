<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Bienvenue au site des freelances</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?
include('scriptes.php');
?>
</head>

<body id="sky">
<?
include('menu.php');
?>
<div class="c9d-tabcnt">
</br>
</br>
<div id="ns_banner-wrapper">
 <div id="ns_banner">
  <h1>Qu'est ce que neofreelance ?</h1>
  <ul>
  <li>Une place de marché pour les freelances</li>
  <li>Une platteforme simple de télétravail et de coworking</li>
  <li>Une utilisation simple pour réussir vos projets</li>
  <li>Un coût minimal pour vos projets, aucun abonnement requis !</li>
  
  
  </ul>
  <h1>Comment fonctionne neofreelance ?</h1>
  <p>Postez votre projet et trouvez la meilleur offre parmis nos prestataires inscrits</p>
  <p>Nouveau prestataire ou porteur de projet LANCEZ VOUS ! le site est entièrement gratuit, seul 4% de commission sur le coût du projet</p>
 </div>
</div>
<div id="consultprojectContainer">

<h1>Derniers Projets</h1>

</div>
<?
include('projets.php');
?>

<br>
<h1>Quoi de neuf sur neofreelance ?</h1>
<br>

<div class="row show-grid">

<div class="span-one-third">
<strong>Informations ></strong><br />

<a href="/infos/mentions-legales">Mentions légales</a><br />
<a href="/infos/reglement">Conditions Générales</a><br />
<a href="/infos/infos.txt">developpement du site</a> <br />&nbsp;

</div>

<div class="span-one-third">
<strong>A propos ></strong><br />

<a href="http://www.aldaffah.biz">Qui sommes nous</a><br />
<a href="http://www.facebook/neoFreelance">Facebook</a><br />
<a href="http://www.twitter/neoFreelance">Twitter</a><br />&nbsp;

</div>

<div class="span-one-third">
<strong>Actions ></strong><br />

<a href="/project/nouveau">Poster un projet</a><br />
<a href="/membres/inscription.php">Ouvrir un bureau</a><br />
<a href="/infos">Nous contacter</a><br />&nbsp;

</div>

</div>

</div> <!-- Fin de la marge -->



</body>
</html>
