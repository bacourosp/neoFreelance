<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>neoFreelance, télétravail et coworking</title>
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

  <h1 style="padding:0px 0px 0px 20px;">neoFreelance.com c'est quoi ?</h1>
  <br>
  <ul>
  
  <li>Une place de marché pour trouver les meilleurs prestataires frealances</li>
  <li>Une plateforme gratuite de télétravail et de coworking, rejoignez le réseau</li>
  <li>Un coût minimal pour vos projets ! Postez vos projets et recevez des devis</li>
  </ul>
  <br>
  <ul>
  <li>
  <a href="https://www.facebook.com/pages/neoFreelance/153022051480674?sk=wall"><img src="images/logos/logo-facebook.png" width="90"></a>

  <a href="https://github.com/boudeffa/neoFreelance/wiki"><img src="images/logos/logo-github.png"></a>
  </li>
  </ul>
 </div>
</div>

<br>


<h1 style="padding:0px 0px 0px 20px; ">Quoi de neuf sur neoFreelance.com ?</h1>


<p style="margin-left:20px; font-size:16px">Il ya actuellement # Projets en télétravail. Le réseau comporte # membres. Les Freelances ont généré # € de chiffre d'affaire.</p>


</div>

<br>

<div id="footer">
<div class="row">

<div class="span-un-quart">
<strong>Informations ></strong><br />

<a href="/infos/termes.html">Termes &amp; Conditions</a><br />
<a href="/infos/reglement.html">Réglement du site</a><br />
<a href="/infos/infos.html">Infos investisseurs</a> <br />&nbsp;

</div>

<div class="span-un-quart">
<strong>A propos ></strong><br />

<a href="http://www.aldaffah.biz">Qui sommes nous ?</a><br />
<a href="https://www.facebook.com/pages/neoFreelance/153022051480674?sk=wall">Suivez nous sur Facebook</a><br />
<a href="https://github.com/boudeffa/neoFreelance ">Code source GitHub</a><br />&nbsp;

</div>

<div class="span-un-quart">
<strong>Actions ></strong><br />

<a href="http://neofreelance.com/clients/creer.php">Poster un projet</a><br />
<a href="http://neofreelance.com/membres/inscription.php">Ouvrir un bureau</a><br />
<a href="mailto:support@neofreelance.com">Contacter le support</a><br />&nbsp;

</div>

<div class="span-un-quart">
<?
include('chat/connectes.php');
?>
<a name="chat"></a>
<strong>Chat > Il y a <? echo $connectes; if ($connectes ==1) { echo ' connecté'; } else {echo ' connectés';} ?></strong><br />
<?
include('chat/chat.php');
?>
</div>

</div>

</div><!-- footer -->

<br>

<div id="footer2">
<a href="/infos/copyrights.html" style="text-decoration:none; color:#fff">Copyrights 2012, Al Daffah Creative Commons</a>
</div> <!-- Fin de la marge -->


</body>
</html>
