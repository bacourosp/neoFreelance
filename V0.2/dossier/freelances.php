<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Freelances</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
include('../scriptes.php');
?>
</head>

<body id="sky">

<?
include('../menu.php');
?>
<div class="content">
</br>
<div id="freelancesContainer">

<h1>Freelances dans le réseau</h1>

<div id="left" class="module">

<? include('competences.php'); ?>

</div>

<?
echo '<div id="center">';

include('../../db.php');

//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================

// requête SQL qui ne prend que le nombre 

// d'enregistrement necessaire à l'affichage.

//=========================================

  $select = "SELECT * FROM MEMBRES WHERE COMPETENCES LIKE '%".$_GET['competence']."%'";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);
echo '<ul id="freelancer-list" class="ns_freelancer-list">';
while($row = mysql_fetch_array($result)) {
echo '<li>';



$email = $row["EMAIL"];
$default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
$size = 80;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

echo '<div class="module mini-profil">';
echo '<img src="'.$grav_url.'" alt="" />';
echo '<div>';
echo '<a href="/membres/profil.php?ID='.$row["ID"].'" style="color:blue;">'.$row["PSEUDO"].'</a>';
echo '<p>'.$row["COMPETENCES"].'</p>';
echo '</div>';
echo '<div class="spacer"></div>';
echo '</div>';

echo '</li>';
}
echo '</ul>';

echo '</div>';
?>
<div class="spacer"> </div>
</div>
</div>
</body>
</html>
