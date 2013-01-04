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
<a style="position:relative; float:right;" href="http://boudeffa.me/spip.php?article41"><img src="images/buttonedited.jpg" alt="Developpement, Design, Prospections ... " height="60"></a>

<h1>Bienvenue Anonyme</h1>

  <h2 style="margin-left: 15px; ">neoFreelance.com c'est quoi ?</h2>
  <br>

  <div style="font-size:20px ">

  <ul>
  
  <li>Une platteforme et une place de marché pour les projets en télétravail</li>
  <li>Un réseau de Freelances souhaitant prospecter collectivement, vous souhaitez nous rejoindre ? <a style="color:#FF6600 " href="/membres/inscription.php">ICI</a></li>
  <li>Vous pouvez postez vos projets et recevoir des devis ! Pour plus d'infos retrouvez nous sur facebook ...</li>
  </ul>
  <br>
  <ul>
  <li>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=198916933513139";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
Parlez en autour de vous : 
<div class="fb-like" data-href="https://www.facebook.com/pages/neoFreelance/153022051480674" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial" data-action="recommend"></div>
  
  </li>
  <li>Bientôt vous pourrez vous inscrire directement par votre compte facebook</li>
  </ul>
 </div>


</div>

<div class="content" style="margin-top:20px;">
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
  
  $select = "SELECT COUNT(*) FROM PROJETS WHERE ACTIF ='1'";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $projets = mysql_fetch_row($result); 
  
?>

<div id="quoi">
<div class="row">

<div class="span-one-half">
<h2 >Quoi de neuf ?</h2>

<div style="font-size:20px ">

<ul>

<li><? echo $projets[0]; ?> projets en télétravail</li>
<li><? echo $membres[0]; ?> membres dans le réseau</li> 

<?
include('chat/connectes.php');
?>

<li><? echo $connectes; if ($connectes ==1) { echo ' freelance connecté'; } else {echo ' freelances connectés';} ?></li>

</ul>
</div>
<br>
<h2>La presse en parle !</h2>
<div style="font-size:20px ">
<ul>
<li>Le quotidien d'oran, <a href="medias/21112012.pdf">lire en page 13</a>.</li>
<li>Maghreb emergent, <a href="http://www.maghrebemergent.info/high-tech/75-entreprise/18140-nazim-boudeffa-neofreelance-dhussein-dey-a-rennes-qchercher-le-travail-meme-au-bout-du-monde-q.html">lire en ligne</a>.</li>
</ul>
</div>
</div>

<div class="span-one-half">

<?
/*
include('chat/chat.php');
*/
?>

<div>
<a class="twitter-timeline"  href="https://twitter.com/neoFreelance" data-widget-id="277769458364334080" height="350">Tweets de @neoFreelance</a>
</div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
if(!d.getElementById(id)){js=d.createElement(s);
js.id=id;js.src="//platform.twitter.com/widgets.js";
fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>

</div>
</div>

</div>
<div class="spacer"></div>

<br>

</div>
</div>
</div>


<? 
include('footer.php');
?>

</body>
</html>
