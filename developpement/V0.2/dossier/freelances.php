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
<div class="c9d-tabcnt">
<?

//=========================================

// information pour la connection � le DB

//=========================================

$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

//=========================================    

// connection � la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

//=========================================

// requ�te SQL qui ne prend que le nombre 

// d'enregistrement necessaire � l'affichage.

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
echo '<p>Comp�tences : '.$row["COMPETENCES"].'</p>';
echo '</div>';

echo '</li>';
}
echo '</ul>';
?>
</div>
</body>
</html>
