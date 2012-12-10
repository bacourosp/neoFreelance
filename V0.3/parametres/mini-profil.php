<?
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
$ID = $_SESSION["ID_UTILISATEUR"];

  $select = "SELECT EMAIL,PSEUDO FROM MEMBRES WHERE ID='".$ID."';";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);


$row = mysql_fetch_array($result);

$default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
$size = 80;
$email=$row["EMAIL"];
$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
?>