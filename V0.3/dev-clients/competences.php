<?

include('../php/fonctions.php');

?>

<?

//=========================================



// information pour la connection � le DB



//=========================================



include('../../db.php');



//=========================================    



// connection � la DB



//=========================================



$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );

mysql_select_db($db) or die ('Erreur :'.mysql_error());



//=========================================    



// requ�te SQL qui compte le nombre total 



// d'enregistrements dans la table.



//=========================================



// Get top level categories

$select_1 = 'SELECT * FROM CATEGORIES WHERE PARENTID = 0';

$res_top = mysql_query($select_1,$link) or die('Erreur : '.mysql_error());



while($cat_top = mysql_fetch_object($res_top)) {

//echo '<div>'.$cat_top->COMPETENCE.'</div>';

echo '<ul class="navigation"><div id="cat'.$cat_top->ID.'" onclick="javascript:permute1(this.id);" class="plus">[<span id="scat'.$cat_top->ID.'">+</span>] '.$cat_top->NOM.'</div>';

echo '<div class="left_c" id="ccat'.$cat_top->ID.'" style="display:none">';

// Get current cat's sub level categories

$res_sub = mysql_query("SELECT * FROM CATEGORIES WHERE PARENTID = ".$cat_top->ID);

while($cat_sub = mysql_fetch_object($res_sub)) {

// Handle each occurrence of a sub level category



echo '<li class="skill" id="'.$cat_sub->ID.'" onClick="ajouterCompetence(this.id);">';

echo ''.$cat_sub->NOM.'';

echo '</li>';



}

echo '</div>';

echo '</ul>';

} 

?>