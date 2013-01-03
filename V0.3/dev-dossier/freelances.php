<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Freelances</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/freelance.css" rel="stylesheet" type="text/css">
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

<? 
include('competences.php'); 
include('../php/member.php');
?>

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
if (isset($_GET['competence'])){

  $select_c = "SELECT * FROM CATEGORIES WHERE ID = ".$_GET['competence'].";";
  $result_c = mysql_query($select_c,$link) or die ('Erreur : '.mysql_error() );
  $total_c = mysql_num_rows($result_c);
  if (total_c){
  $row_c = mysql_fetch_array($result_c);
  $select = "SELECT * FROM MEMBRES WHERE COMPETENCES LIKE '%".$row_c["NOM"]."%'";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);  
  };


  } else {
  $select = "SELECT * FROM MEMBRES";
  $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
  $total = mysql_num_rows($result);  
  }
echo '<ul id="freelancer-list" class="ns_freelancer-list">';
while($row = mysql_fetch_array($result)) {

$member= new Member();
$member->email=$row["EMAIL"];
$member->id=$row["ID"];
$member->pseudo=$row["PSEUDO"];
$member->competences=$row["COMPETENCES"];

echo '<li>';

$member->display_mini_profil_gravatar();

echo '</li>';
}
echo '</ul>';

echo '</div>';
?>
<div class="spacer"> </div>
</div>
</div>
<? 
include('../footer.php');
?>
</body>
</html>
