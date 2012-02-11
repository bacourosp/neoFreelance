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

<script type="text/javascript" src="http://www.libertyland.tv/wz_tooltip.js"></script>

<?
include('../menu.php');
?>
<div class="content">
</br>
<div id="freelancesContainer">

<h1>Freelances dans le réseau</h1>

</div>

<div id="left">

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

  $select = 'SELECT PSEUDO, EMAIL, COMPETENCES FROM MEMBRES';
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);
echo '<ul id="freelancer-list" class="ns_freelancer-list">';
while($row = mysql_fetch_array($result)) {
echo '<li>';

$email = $row["EMAIL"];
$default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
$size = 40;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

echo '<div>';
echo '<img src="'.$grav_url.'" alt="" />';
echo $row["PSEUDO"];
echo '<p>Compétences : '.$row["COMPETENCES"].'</p>';
echo '</div>';

echo '</li>';
}
echo '</ul>';

echo '</div>';
?>
</div>
</div>
</body>
</html>
