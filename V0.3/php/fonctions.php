<?
 /*
exemple : 
$dateDo = ("2009-09-07");
$nbrJours = 3 ;
datePlus($dateDo,$nbrJours) = "2009-09-10"
*/
 
function datePlus($dateDo,$nbrJours)
{
$timeStamp = strtotime($dateDo); 
$timeStamp += 24 * 60 * 60 * $nbrJours;
$newDate = date("d-m-Y", $timeStamp);
return  $newDate;
}
/******************************************************************************/
/*                                                                            */
/*                       __        ____                                       */
/*                 ___  / /  ___  / __/__  __ _____________ ___               */
/*                / _ \/ _ \/ _ \_\ \/ _ \/ // / __/ __/ -_|_-<               */
/*               / .__/_//_/ .__/___/\___/\_,_/_/  \__/\__/___/               */
/*              /_/       /_/                                                 */
/*                                                                            */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Titre          : Couper une chaine au n caractere et...                    */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts104-PHP.htm              */
/* Auteur         : Matt                                                      */
/* Date édition   : 28 Déc 2004                                               */
/* Website auteur : http://www.france-relations.com                           */
/*                                                                            */
/******************************************************************************/
 
function coupe($chaine){
  // Nombre de caractère
  $max=100;
  if(strlen($chaine)>=$max)
  {
  // Met la portion de chaine dans $chaine
  $chaine=substr($chaine,0,$max); 
  // position du dernier espace
  $espace=strrpos($chaine," "); 
  // test si il ya un espace
  if($espace)
  // si ya 1 espace, coupe de nouveau la chaine
  $chaine=substr($chaine,0,$espace);
  // Ajoute ... à la chaine
  $chaine .= '...';
  }
return $chaine;
}

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

   if(isset($_GET['nombre']))
        $nombre=$_GET['nombre'];
    else   
	    $nombre=50;
		
	if(isset($_GET['PageAffichee']))
        $pagesaffichees=$_GET['PageAffichee'];
    else   
	    $pagesaffichees=0;


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


/*
$nb est le nombre d'enregistrements par page
$total est le nombre total d'enregistrements

*/
function affichePages($nb,$page,$total,$nbpagesAffichees) {
        
		$nbpages=ceil($total/$nb);
        $numeroPages = 1;
        $compteurPages = 1;
        $limite  = 0;

		if ($_GET['limite'] != 0){
		$Precedent = $_GET['limite'] - $nb;
		echo '<span><a style="text-decoration:none;" class="paginate_button" href = "'.$page.'?limite='.$Precedent.'& nombre='.$nb.'#navig-table">'.'Précédent'.'</a></span>'."\n";
        };
		//Affin de pouvoir afficher l derniere page correctement et afficher les .. avant elle
		
		$nbpagesAffichees--;
		
        //Anciennement while($numeroPages <= $nbpages) ensuite pour n'avoir que 5 pages pas index.php
		while ($numeroPages < ($_GET['limite'] / $nb)+$nbpagesAffichees && $numeroPages < $nbpages ) {
        if ($limite == $_GET['limite']){
        echo '<span><a style="text-decoration:none;"  class="paginate_button paginate_active" href = "'.$page.'?limite='.$limite.'& nombre='.$nb.'#navig-table">'.$numeroPages.'</a></span>'."\n";
		} else {
		echo '<span><a style="text-decoration:none;" class="paginate_button" href = "'.$page.'?limite='.$limite.'& nombre='.$nb.'#navig-table">'.$numeroPages.'</a></span>'."\n";
        };
		$limite = $limite + $nb;
        $numeroPages = $numeroPages + 1;
        };
		
		$Suivant = $_GET['limite'] + $nb;
		
		if (($_GET['limite']*$nbpages) < ceil($total/$nb)){
		
		echo '<span>.</span></td>'."\n";
        echo '<span>.</span></td>'."\n";
        
		echo '<span><a style="text-decoration:none;" class="paginate_button" href = "'.$page.'?limite='.$limite.'& nombre='.$nb.'#navig-table">'.$nbpages.'</a></span></td>'."\n";

		echo '<span><a style="text-decoration:none;" class="paginate_button" href = "'.$page.'?limite='.$Suivant.'& nombre='.$nb.'#navig-table">'.'Suivant'.'</a></span></td>'."\n";
        
		}else{
		echo '<span><a style="text-decoration:none;" class="paginate_button" href = "'.$page.'?limite='.$limite.'& nombre='.$nb.'#navig-table">'.$nbpages.'</a></span></td>'."\n";
        };
		
}
?>