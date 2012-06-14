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
<h1>Bienvenue Anonyme</h1>

<div id="ns_banner-wrapper">
 <div id="ns_banner">

  <h1>neoFreelance.com c'est quoi ?</h1>
  <br>
  <ul>
  
  <li>Une platteforme de télétravail</li>
  <li>Un réseau de Freelances. <a href="/membres/inscription.php">Rejoidre le réseau !</a></li>
  <li>Postez vos projets et recevez des devis gratuitement !</li>
  </ul>
  <br>
  <ul>
  <li>
  <img src="images/Logo-neoFreelance/Logo-neoF.png" width="90">
  
  <a href="https://www.facebook.com/pages/neoFreelance/153022051480674?sk=wall"><img src="images/logos/logo-facebook.png" width="90"></a>

  <a href="https://github.com/boudeffa/neoFreelance/wiki"><img src="images/logos/logo-github.png"></a>
  </li>
  </ul>
 </div>



</div>

<?
// Pour afficher le nombre de projets et le nombre de membres

include('../db.php');

//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================

// requête SQL qui ne prend que le nombre 

// d'enregistrement necessaire à l'affichage.

//=========================================

  $select = "SELECT COUNT(*) FROM MEMBRES";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $membres = mysql_fetch_row($result);
  
  $select = "SELECT COUNT(*) FROM PROJETS";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $projets = mysql_fetch_row($result); 
  
?>

<div id="quoi">
<div class="row">

<div class="span-one-half">
<h1 >Quoi de neuf ?</h1>

<div style="font-size:20px ">

<ul>
<li><? echo $projets[0]; ?> projets en télétravail</li>
<li><? echo $membres[0]; ?> membres dans le réseau</li> 
</ul>
</div>

</div>

<div class="span-one-half">
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
</div>

<br>

</div>


<br>



<div id="footer" style="background-image:url(images/tente-berbere-sahara.jpg); background-position:bottom; background-repeat:no-repeat;">
<div class="row">

<div class="span-one-third">
<strong>Informations ></strong><br />

<a href="/infos/termes.html">Termes &amp; Conditions</a><br />
<a href="/infos/reglement.html">Réglement du site</a><br />
<a href="/infos/infos.html">Infos investisseurs</a> <br />&nbsp;

</div>

<div class="span-one-third">
<strong>A propos ></strong><br />

<a href="http://www.aldaffah.biz">Qui sommes nous ?</a><br />
<a href="https://www.facebook.com/pages/neoFreelance/153022051480674?sk=wall">Suivez nous sur Facebook</a><br />
<a href="https://github.com/boudeffa/neoFreelance ">Code source GitHub</a><br />&nbsp;

</div>

<div class="span-one-third">
<strong>Actions ></strong><br />

<a href="http://neofreelance.com/clients/creer.php">Poster un projet</a><br />
<a href="http://neofreelance.com/membres/inscription.php">Ouvrir un bureau</a><br />
<a href="mailto:support@neofreelance.com">Contacter le support</a><br />&nbsp;

</div>


</div>

</div><!-- footer -->

<br>

<div id="footer2">
<a href="/infos/copyrights.html" style="text-decoration:none; color:#fff">Copyrights 2012, Al Daffah Creative Commons</a>
</div> <!-- Fin de la marge -->


</body>
</html>
