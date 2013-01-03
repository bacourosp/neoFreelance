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

echo '<form method = "get" action = "freelances.php">';

	if(isset($_GET['categorie'])){
		$categorie = $_GET['categorie'];
	}
	if(isset($_GET['competence'])){ 
		$competence = $_GET['competence'];
	}


echo '<select name="categorie" id="category_select" onChange="this.form.submit();">';

//Selection de la marque de l'imprimante
	if(!isset($categorie))
	{
		echo "<OPTION> Selectionner une catégorie";
	}
    else
	{
              
while($cat_top = mysql_fetch_array($res_top)) {

if ($cat_top["ID"]==$categorie){
echo '<OPTION value="'.$cat_top["ID"].'"';
echo ' selected="selected"';
echo "> ".$cat_top["NOM"];
}else
echo '<option value="'.$cat_top["ID"].'">'.$cat_top["NOM"].'</option>';
// Get current cat's sub level categories
};
};

echo '</select>';


if(isset($categorie)){
		
  $select_2 = 'SELECT * FROM CATEGORIES WHERE PARENTID = '.$categorie.';';

  $res_sub = mysql_query($select_2,$link) or die('Erreur : '.mysql_error());


  echo '<select name="competence" id="categorie_select" onchange="this.form.submit();">';
  while($cat_sub = mysql_fetch_array($res_sub)) {

  // Handle each occurrence of a sub level category
  echo '<option value="'.$cat_sub["ID"].'">'.$cat_sub["NOM"].'</option>';
  };
  echo '</select>';
}
echo '</form>';


?>