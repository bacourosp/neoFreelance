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

<div id="ns_banner-wrapper">
 <div id="ns_banner">
  <h1>Quoi de neuf sur neofreelance ?</h1>
  <p>Etat du <a href="/infos/infos.txt">developpement</a> du site</p>
  <table width="920">
  <tr>
  <td><a href="http://www.aldaffah.biz">Qui sommes nous</a></td>
  </tr>
</table>

 </div>
</div>

</div> <!-- Fin de la marge -->



</body>
</html>
