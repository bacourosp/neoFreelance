<?
session_start();
?>
<?
if (!isset($_POST['notification'])) {

$message ='Modification de votre compte<br />';

} else {


include('../../db.php');
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
                    mysql_select_db($db) or die ('Erreur :'.mysql_error());

                    $result = mysql_query("
                              UPDATE MEMBRES
                              SET NOTIFICATION ='".$_POST["notification"]."'
                              WHERE ID ='".$_SESSION["ID_UTILISATEUR"]."'
                              ");
			        if(!$result)
                    {
                    $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
                    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Profil</title>
<?
include('../scriptes.php');
?>
</head>
<body id="sky">

<?php
include('../menu.php');
?>
<div class="content">
<div class="container">
<br>
<h1>Notifications</h1>
<p>Paramètre non encore disponible</p>
<br>
<?
include('mini-profil.php');

echo '<div class="dashboard">';

echo '<div class="module mini-profile">';
echo '<div class"account-group"><img src="'.$grav_url.'" alt="" /></div>';

echo '<div class="spacer"> </div>';
echo '</div>';

echo '<div class="module">';
echo '<ul>';
echo '<li><a class="list-link" href="compte.php">Compte</a></li>';
echo '<li><a class="list-link" href="pass.php">Mot de passe</a></li>';
echo '<li><a class="list-link actif" href="notifications.php">Notifications</a></li>';
echo '<li><a class="list-link" href="mescompetences.php">Compètences</a></li>';
echo '<li><a class="list-link" href="profil.php">Profil</a></li>';
echo '</ul>';
echo '</div>';

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '
<form name="notifs" method="post" action="notifications.php">
';
               
			   include('../../db.php');
               $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
               mysql_select_db($db) or die ('Erreur :'.mysql_error());
               $select = 'SELECT * FROM MEMBRES WHERE ID ='.$_SESSION["ID_UTILISATEUR"] ;
                   
			   $result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
               $total = mysql_num_rows($result);

if ($total) {

$row = mysql_fetch_array($result);

if ($row["NOTIFICATION"]==1)
{
echo'<INPUT type="checkbox" name="notification" value="1" checked="checked"> Je souhaite être informé des projets en rapport avec mes compétences';
}
else
{
echo'<INPUT type="checkbox" name="notification" value="0"> Je souhaite être informé des projets en rapport avec mes compétences';
};

};

echo '</div>';//content-main

echo '<div class="clear"></div>';
echo '<div style="border: 2px solid #EEE;"></div>';

echo '
</br>

<button class="ns_btn ns_blue" type="submit" value="post" style="float:right;">Modifier</button>

</form>
';

?>
<div class="spacer"> </div>
</div>
</div>
</body>
</html>