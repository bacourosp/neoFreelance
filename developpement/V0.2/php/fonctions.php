<?
/*
Voici une fonction en PHP qui peut être assez pratique, surtout quand on fait de l'URL Rewriting. 

Cette fonction permet de transformer les caractères de n'importe quelle chaîne de caractères en chaîne non accentuée, 
en enlevant les caractères spéciaux et en remplaçant les espaces par des tirets. 
Par exemple : "Café noir" donnera "cafe-noir". 
*/
function string2url($chaine) {
	$chaine = trim($chaine);
	$chaine = strtr($chaine,
"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
	$chaine = strtr($chaine,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz");
	$chaine = preg_replace('#([^.a-z0-9]+)#i', '-', $chaine);
        $chaine = preg_replace('#-{2,}#','-',$chaine);
        $chaine = preg_replace('#-$#','',$chaine);
        $chaine = preg_replace('#^-#','',$chaine);
	return $chaine;
}

//récupération de $limite

    if(isset($_GET['limite']))
        $limite=$_GET['limite'];
    else   
	    $limite=0;


function verifLimite($limite,$total,$nombre) {

    // je verifie si limite est un nombre.

    if(is_numeric($limite)) {

        
// si $limite est entre 0 et $total, $limite est ok

        // sinon $limite n'est pas valide.

        if(($limite >=0) && ($limite <= $total) && (($limite%$nombre)==0)) {

            // j'assigne 1 à $valide si $limite est entre 0 et $max

            $valide = 1;

        }    

        else {

            // sinon j'assigne 0 à $valide

            $valide = 0;

        }

    }

    else {

            // si $limite n'est pas numérique j'assigne 0 à $valide

            $valide = 0;

    }

// je renvois $valide

return $valide;

}
/* Fonction qui affiche suivant et precedent
function displayNextPreviousButtons($limite,$total,$nb,$page) {
$limiteSuivante = $limite + $nb;
$limitePrecedente = $limite - $nb;
echo  '<table><tr>'."\n";
if($limite != 0) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="'.$page.'" method="post">'."\n";
        echo  '<input type="submit" value="précédents">'."\n";
        echo  '<input type="hidden" value="'.$limitePrecedente.'" name="limite">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";
}
if($limiteSuivante < $total) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="'.$page.'" method="post">'."\n";
        echo  '<input type="submit" value="suivants">'."\n";
        echo  '<input type="hidden" value="'.$limiteSuivante.'" name="limite">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";
            
}
echo  '</tr></table>'."\n";
}

*/

function affichePages($nb,$page,$total) {
        $nbpages=ceil($total/$nb);
        $numeroPages = 1;
        $compteurPages = 1;
        $limite  = 0;
		echo '<a name="navig-table"></a>';
        echo '<table border = "0" ><tr>'."\n";
		echo '<td>Page :</td>';
        if ($_GET['limite'] != 0){
		$Precedent = $_GET['limite'] - $nb;
		echo '<td ><span class="paginate_button"><a style="text-decoration:none;" href = "'.$page.'?limite='.$Precedent.'#navig-table">'.'Précédent'.'</a></span></td>'."\n";
        };
        //Anciennement while($numeroPages <= $nbpages) ensuite pour n'avoir que 5 pages pas index.php
		while($numeroPages <= $nbpages) {
        if ($limite == $_GET['limite']){
        echo '<td ><span class="paginate_button paginate_active"><a style="text-decoration:none;" href = "'.$page.'?limite='.$limite.'#navig-table">'.$numeroPages.'</a></span></td>'."\n";
		} else {
		echo '<td ><span class="paginate_button"><a style="text-decoration:none;" href = "'.$page.'?limite='.$limite.'#navig-table">'.$numeroPages.'</a></span></td>'."\n";
        };
		$limite = $limite + $nb;
        $numeroPages = $numeroPages + 1;
        $compteurPages = $compteurPages + 1;
            if($compteurPages == 10) {
            $compteurPages = 1;
            echo '<br>'."\n";
            }
        }
		$Suivant = $_GET['limite'] + $nb;
		echo '<td ><span class="paginate_button"><a style="text-decoration:none;" href = "'.$page.'?limite='.$Suivant.'#navig-table">'.'Suivant'.'</a></span></td>'."\n";
        echo '</tr></table>'."\n";
}
?>