<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>neoFreelance, coworking et t�l�travail</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?
include('scriptes.php');
?>
</head>

<body id="sky">
<?
include('menu.php');
?>

<div class="content">

<br>
<h1 style="padding:0px 0px 0px 20px;">Bienvenue Anonyme</h1>

<div id="ns_banner-wrapper">
 <div id="ns_banner">

  <h1>Qu'est-ce que neoFreelance ?</h1>
  <ul>
  <li>Un r�seau social de freelances t�l�travailleurs</li>
  <li>Une place de march� pour trouver les meilleurs prestataires frealances</li>
  <li>Une plateforme gratuite de t�l�travail et de coworking</li>
  <li>Une utilisation simple pour r�ussir vos projets</li>
  <li>Un co�t minimal pour vos projets, pas d'abonnement !</li>
  </ul>

  <ul>
  <li>
  <a href="https://www.facebook.com/pages/neoFreelance/153022051480674?sk=wall"><img src="images/logos/logo-facebook.png" width="90"></a>

  <a href="https://github.com/boudeffa/neoFreelance"><img src="images/logos/logo-github.png"></a>
  </li>
  </ul>
 </div>
</div>




<br>
<h1 style="padding:0px 0px 0px 20px; ">Quoi de neuf sur neofreelance ?</h1>

<div class="row show-grid">

<div class="span-one-third">
<strong>Informations ></strong><br />

<a href="/infos/termes.html">Termes &amp; Conditions</a><br />
<a href="/infos/reglement.html">R�glement du site</a><br />
<a href="/infos/infos.html">Infos investisseurs</a> <br />&nbsp;

</div>

<div class="span-one-third">
<strong>A propos ></strong><br />

<a href="http://www.aldaffah.biz">Qui sommes nous ?</a><br />
<a href="https://www.facebook.com/pages/neoFreelance/153022051480674?sk=wall">Suivez nou sur Facebook</a><br />
<a href="https://github.com/boudeffa/neoFreelance ">Code source GitHub</a><br />&nbsp;

</div>

<div class="span-one-third">
<strong>Actions ></strong><br />

<a href="http://neofreelance.com/clients/creer.php">Poster un projet</a><br />
<a href="http://neofreelance.com/membres/inscription.php">Ouvrir un bureau</a><br />
<a href="support@neofreelance.com">Nous contacter</a><br />&nbsp;

</div>

<div class="span-one-third">
<?
include('chat/connectes.php');
?>
<strong>Chat > Il y a <? echo $connectes; if ($connectes ==1) { echo ' connect�'; } else {echo ' connect�s';} ?></strong><br />
<?
include('chat/chat.php');
?>

</div>
</div>

</div> <!-- Fin de la marge -->

</body>
</html>
