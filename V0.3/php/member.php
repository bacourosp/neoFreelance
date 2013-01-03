<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Classe Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?

class Member {

var $id;
var $prenom;
var $nom;
var $pseudo;
var $email;
var $mdp;
var $competences;
var $description;
var $notification;
var $profil;
var $depuis;
var $clef_activation;
var $actif;

function display_mini_profil_gravatar(){
 
 $email = $this->email;
 $default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
 $size = 80;

 $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

 echo '<div class="freelance">';
 echo '<img src="'.$grav_url.'" alt="" class="img"/></img>';
 echo '<div>';
 echo '<a href="/membres/profil.php?ID='.$this->id.'" class="username">'.$this->pseudo.'</a>';
 echo '<p class="competences">'.$this->competences.'</p>';
 echo '<p class="description">'.$this->description.'</p>';
 echo '</div>';
 echo '<div class="spacer"></div>';
 echo '</div>';
 }
}


?>
</body>
</html>
