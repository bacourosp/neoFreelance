<?
session_start();
?>
<?
if (!isset($_POST["userpasswd"]) or !isset($_POST["newuserpasswd1"]) or !isset($_POST['newuserpasswd2'])) {
$masquer_formulaire = false;
$message ='Modification de votre mot de passe<br />';
} else {
    // Formulaire visible par d�faut
     $masquer_formulaire = false;

     include('../../db.php');
     if(!ereg("^[A-Za-z0-9]{6,16}$", $_POST["newuserpasswd1"]))
     {
               $message = "Votre mot de passe doit comporter entre 6 et 16 caract�res";
     }
     elseif($_POST["newuserpasswd1"] != $_POST["newuserpasswd2"])
     {
               $message = "Votre mot de passe n'a pas �t� correctement confirm�";
     }
	 else 
	 {
	 
               // Connexion � la base de donn�es
               // Valeurs � modifier selon vos param�tres configuration
               $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
               mysql_select_db($db) or die ('Erreur :'.mysql_error());               
               // V�rification de l'unicit� du nom d'utilisateur et de l'adresse e-mail
               $result = mysql_query("
                    SELECT MDP
                    FROM MEMBRES
                    WHERE ID = '" . $_SESSION["ID_UTILISATEUR"] . "'
               ");
               
               // Si une erreur survient
               if(!$result)
               {
                    $message = "Erreur d'acc�s � la base de donn�es lors de la v�rification d'unicit�";
               }
               else
			   {
			    // Si un enregistrement est trouv�
                    if(mysql_num_rows($result) > 0)
                    {
                         
                         $row = mysql_fetch_array($result);
                         
                              
                              if($_POST["userpasswd"] != $row["MDP"])
                              {
							  $message="Le mot de passe actuel est faux\n";
							  } else
							  {
							   // Activation du compte utilisateur
                              $result = mysql_query("
                              UPDATE MEMBRES
                              SET MDP = '".$_POST["newuserpasswd1"]."'
                              WHERE ID = '".$_SESSION["ID_UTILISATEUR"]."'
                              ");
                         
                               // Si une erreur survient
                               if(!$result){
							     $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
                               }
                               else
                               {
                                 $message = "Votre mot de passe a bien �t� chang�";
                               }  
							  
							  }
						//fetch
					 }//mysql_num_row

			   }
	 }  

}//else premier
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mot de passe</title>
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
<h1>Mot de passe</h1>
<?
if(isset($message)) {
      echo '<p>';
      echo $message;
      echo '</p>';
	  } else {
	  echo '<p>';
	  echo 'Un message vous a �t� envoy�';
	  echo '</p>';
}; 
?>
<br>
<?
if($masquer_formulaire != true) {

include('mini-profil.php');

echo '<div class="dashboard">';

echo '<div class="module mini-profile">';
echo '<div class"account-group"><img src="'.$grav_url.'" alt="" /></div>';
echo $pseudo;
echo $competences;
echo '<div class="spacer"> </div>';
echo '</div>';

echo '<div class="module">';
echo '<ul>';
echo '<li><a class="list-link" href="compte.php">Compte</a></li>';
echo '<li><a class="list-link actif" href="pass.php">Mot de passe</a></li>';
echo '<li><a class="list-link" href="notifications.php">Notifications</a></li>';
echo '<li><a class="list-link" href="mescompetences.php">Comp�tences</a></li>';
echo '<li><a class="list-link" href="profil.php">Profil</a></li>';
echo '</ul>';
echo '</div>';

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '
<form name="pass" method="post" action="pass.php">

<div class="half_column" style="position:relative; height:90px">
	<label for="passwd"><b>Ancien Mot de passe :</b></label><br>
	<input type="password" class="gaf_textbox" name="userpasswd" id="passwd" value="">&nbsp;<br>
</div>';
echo '<div class="clear"></div>';
echo'
<div class="half_column" style="position:relative; height:90px">
	<label for="passwd"><b>Nouveau Mot de passe :</b></label><br>
	<input type="password" class="gaf_textbox" name="newuserpasswd1" id="passwd1" value="">&nbsp;<br>
</div>'; 
echo '<div class="clear"></div>';
echo'
<div class="half_column" style="position:relative; height:90px">
	<label for="passwd"><b>Confirmer Mot de passe :</b></label><br>
	<input type="password" class="gaf_textbox" name="newuserpasswd2" id="passwd2" value="">&nbsp;<br>
</div>';


echo '</div>';//content-main
echo '<div class="clear"></div>';
echo '<div style="border: 2px solid #EEE;"></div>';

echo '
</br>

<button class="ns_btn ns_blue" type="submit" value="post" style="float:right;">Modifier</button>

</form>
';
}
?>
<div class="spacer"> </div>
</div>
</div>
</body>
</html>