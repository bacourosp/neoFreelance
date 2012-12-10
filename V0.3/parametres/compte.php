<?
session_start();
?>
<?

if (!isset($_POST["newusername"]) or !isset($_POST['email'])) {
$masquer_formulaire = false;
$message ='Modification de votre compte<br />';
} else {

 // Formulaire visible par défaut
     $masquer_formulaire = false;

     $PSEUDO = $_POST['newusername'];
     $EMAIL = $_POST['email'];
     include('../../db.php');

     
          
          // Vérification de la validité des champs
          if(!ereg("^[A-Za-z0-9_]{4,20}$", $_POST["newusername"]))
          {
               $message = "Votre nom d'utilisateur doit comporter entre 4 et 20 caractères<br />\n";
               $message .= "L'utilisation de l'underscore est autorisée";
          }
          elseif(!ereg("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$",
               $_POST["email"]))
          {
               $message = "Votre adresse e-mail n'est pas valide";
          }
          else
          {
               
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
               $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
               mysql_select_db($db) or die ('Erreur :'.mysql_error());               

               $result = mysql_query("
                    SELECT PSEUDO
                         , EMAIL
                    FROM MEMBRES
                    WHERE ID = '" . $_SESSION["ID_UTILISATEUR"] . "'
                    
               ");
               
               // Si une erreur survient
               if(!$result)
               {
                    $message = "Erreur d'accès à la base de données lors de la vérification d'unicité";
               }
               else
               {
                    
                    // Si un enregistrement est trouvé
                    if(mysql_num_rows($result) > 0)
                    {
                         
                         while($row = mysql_fetch_array($result))
                         {
                              
                              if($_POST["newusername"] == $row["PSEUDO"])
                              {
                                   $message = "Le nom d'utilisateur " . $_POST["newusername"];
                                   $message .= " est déjà utilisé";
                              }
                              elseif($_POST["email"] == $row["EMAIL"])
                              {
                                   $message = "L'adresse e-mail " . $_POST["email"];
                                   $message .= " est déjà utilisée";
                              }
                              
                         }
                         
                    }
                    


                    else 
				   { 
                   // Génération de la clef d'activation
                   $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                   $caracteres_aleatoires = array_rand($caracteres, 8);
                   $clef_activation = "";
                         
                   foreach($caracteres_aleatoires as $i)
                    {
                    $clef_activation .= $caracteres[$i];
                    }


                    // connection à la DB
                    $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
                    mysql_select_db($db) or die ('Erreur :'.mysql_error());

                    $result = mysql_query("
                              UPDATE MEMBRES
                              SET EMAIL = '".$EMAIL."', PSEUDO = '".$PSEUDO."', ACTIF='0', CLEF_ACTIVATION = '".$clef_activation."'
                              WHERE ID = '".$_SESSION["ID_UTILISATEUR"]."'
                              ");
			        if(!$result)
                    {
                    $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
                    }
		            else
                    {
					// Envoi du mail d'activation
                    $sujet = "Activation de votre compte utilisateur";
                              
                    $message = "Pour valider votre inscription, merci de cliquer sur le lien suivant :\n";
                    $message .= "http://" . $_SERVER["SERVER_NAME"];
                    $message .= "/parametres/activer-compte-utilisateur.php?id=" . mysql_insert_id();
                    $message .= "&clef=" . $clef_activation."\n";
				    $message .= "Pseudo :".$PSEUDO."\n";
				    $message .= "Votre mot de passe n'a pas changé"."\n";
				    $message .= "\n";
				    $message .= "Merci d'avoir choisi neoFreelance.";
                              
                    // Si une erreur survient
                    if(!@mail($_POST["email"], $sujet, $message, 'From: noreply@neofreelance.com'."\r\n"))
                      {
                      $message = "Une erreur est survenue lors de l'envoi du mail d'activation<br />\n";
                      $message .= "Veuillez contacter l'administrateur afin d'activer votre compte";
                      }
                      else
                      {
                                   
                      // Message de confirmation
                      $message = "Votre compte utilisateur a correctement été modifié<br />\n";
                      $message .= "Un email vient de vous être envoyer afin de l'activer";
                                   
                      // On masque le formulaire
                      $masquer_formulaire = true;
                                   
                      }
			 
	               }
			    }
		     }
			 }
}         
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Compte</title>
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
<h1>Compte</h1>
<? 
if(isset($message)) {
      echo '<p>';
      echo $message;
      echo '</p>';
	  } else {
	  echo '<p>';
	  echo 'Un message vous a été envoyé';
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
echo '<li><a class="list-link actif" href="compte.php">Compte</a></li>';
echo '<li><a class="list-link" href="pass.php">Mot de passe</a></li>';
echo '<li><a class="list-link" href="notifications.php">Notifications</a></li>';
echo '<li><a class="list-link" href="mescompetences.php">Compètences</a></li>';
echo '<li><a class="list-link" href="profil.php">Profil</a></li>';
echo '</ul>';
echo '</div>';

echo '</div>';//dashboard

echo '<div class="content-main">';

echo '
<form name="compte" method="post" action="compte.php">

<div class="half_column" style="position:relative; height:90px">
	<label for="username"><b>Pseudo :</b></label><br>
	<input type="text" name="newusername" id="tbx_username" value="'.$row["PSEUDO"].'"  class="gaf_textbox">&nbsp;<br>
</div>
';
echo '<div class="clear"></div>';
echo '
<div class="half_column" style="position:relative; height:90px">
	<label for="gafEmail"><b>Adresse Email :</b></label><br>
	<input type="text" name="email" id="tbx_email" value="'.$email.'" class="gaf_textbox">&nbsp;<br>	
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