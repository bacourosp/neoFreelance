<?
include('../php/fonctions.php');
?>

<script>
function selectCompetences(cat_id){

}
</script>

<?
//=========================================

// information pour la connection à le DB

//=========================================

include('../../db.php');

//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

// Get top level categories

$select_1 = 'SELECT * FROM CATEGORIES WHERE PARENTID = 0;';

$res_top = mysql_query($select_1,$link) or die('Erreur : '.mysql_error());

echo '<form method = "post" action = "freelances.php">';
echo '<select name="choix" id="category_select">';
                
while($cat_top = mysql_fetch_array($res_top)) {

echo '<option value="'.$cat_top["ID"].'" onchange="if (this.selectedIndex) selectCompetences(this.selectIndex);">'.$cat_top["NOM"].'</option>';
// Get current cat's sub level categories

};

echo '</select>';

  $res_sub = mysql_query("SELECT * FROM CATEGORIES WHERE PARENTID = ".$cat_top["ID"]);

  echo '<select name="choix_competence" id="competence_select" size="10">';
  while($cat_sub = mysql_fetch_array($res_sub)) {

  // Handle each occurrence of a sub level category
  echo '<option value="'.$cat_sub["ID"].'" onchange="if (this.selectedIndex) selectCompetences(this.selectIndex);">'.$cat_sub["NOM"].'</option>';
  };
  echo '</select>';

echo '</form>';
?>