<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>neoFreelance, t�l�travail et coworking</title>
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
<a style="position:relative; float:right;" href="http://boudeffa.me/spip.php?article41"><img src="images/buttonedited.jpg" alt="Developpement, Design, Prospections ... " height="60"></a>

<h1>Bienvenue Anonyme</h1>

<div id="ns_banner-wrapper">
 <div id="ns_banner">

  <h1 style="margin-left: 15px; ">neoFreelance.com c'est quoi ?</h1>
  <br>
  <ul>
  
  <li>Une platteforme et une place de march� pour les projets en t�l�travail</li>
  <li>Un r�seau de Freelances souhaitant prospecter collectivement, vous souhaitez nous rejoindre ? <a style="color:#FF6600 " href="/membres/inscription.php">ICI</a></li>
  <li>Vous pouvez postez vos projets et recevoir des devis ! Pour plus d'infos retrouvez nous sur facebook ...</li>
  </ul>
  <br>
  <ul>
  <li>
  
  <a href="https://www.facebook.com/pages/neoFreelance/153022051480674?sk=wall"><img src="images/logos/logo-facebook.png" width="90"></a>

  </li>
  </ul>
 </div>



</div>

<?
// Pour afficher le nombre de projets et le nombre de membres

include('../db.php');

//=========================================    

// connection � la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================

// requ�te SQL qui ne prend que le nombre 

// d'enregistrement necessaire � l'affichage.

//=========================================

  $select = "SELECT COUNT(*) FROM MEMBRES";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $membres = mysql_fetch_row($result);
  
  $select = "SELECT COUNT(*) FROM PROJETS WHERE ACTIF ='1'";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $projets = mysql_fetch_row($result); 
  
?>

<div id="quoi">
<div class="row">

<div class="span-one-half">
<h1 >Quoi de neuf ?</h1>

<div style="font-size:20px ">

<ul>
<li><? echo $projets[0]; ?> projets en t�l�travail</li>
<li><? echo $membres[0]; ?> membres dans le r�seau</li> 
</ul>
</div>

</div>

<div class="span-one-half">
<?
include('chat/connectes.php');
?>
<a name="chat"></a>
<strong>Chat > Il y a <? echo $connectes; if ($connectes ==1) { echo ' connect�'; } else {echo ' connect�s';} ?></strong><br />
<?
include('chat/chat.php');
?>
</div>

</div>
</div>

<br>

</div>

<? 
include('footer.php');
?>
</div>

</body>
</html>
