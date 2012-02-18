<?
session_start();

// Redirige l'utilisateur s'il est déjà identifié
if(isset($_COOKIE["ID_UTILISATEUR"]))
  {
  header("Location: /accueil/index.php");
  }
  else
  {
  // Formulaire visible par défaut
  $masquer_formulaire = false;
  
  // information pour la connection à le DB
  include('../../db.php');
  // connection à la DB
  $link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
  mysql_select_db($db) or die ('Erreur :'.mysql_error());

  $login=$_POST['login'];//On récupère les données envoyées par la méthode POST du formulaire d'identification
  $passwd=$_POST['passwd'];
 
  $sql = "SELECT * FROM MEMBRES WHERE EMAIL='".$login."' OR PSEUDO='".$login."';";
  $result = mysql_query($sql,$link) or die('Erreur SQL : <br />'.$sql);
  $total = mysql_num_rows($result);

  if(!$total)
    {
    $message = "Une erreur est survenue lors de la tentative de connexion";
    }
   else
   {
   if(mysql_num_rows($result) == 0)
     {
     $message = "L'Email" . $_POST["login"] . " n'existe pas";
     }
     else
     {
     // Récupération des données
     $row = mysql_fetch_array($result);
                         
     // Si le compte n'a pas été activé
     if($row["ACTIF"] == 0)
       {
       $message = "Votre compte utilisateur n'a pas été activé";
       }
       else
       {
       if ($row["MDP"] != $passwd)
	      {
          // Si le mot de passe et le login sont bons (valable pour 1 utilisateur ou plus). J'ai mis plusieurs identifiants et mots de passe.
          $message = "Votre mot de passe est incorrect";
	      }
	 	  else
          {
	      $expiration =(empty($_POST["savelogin"]) ? 0 : time() + 90 * 24 * 60 * 60);
                                    
          // Création des cookies
          setcookie("ID_UTILISATEUR", $row["ID_Utilisateur"], $expiration, "/");
          setcookie("NOM_UTILISATEUR", $row["Nom_Utilisateur"], $expiration, "/");
                                    
          // Fermeture de la connexion à la base de données
          mysql_close();
                                    
          // Redirection de l'utilisateur
                             
          $_SESSION["connected"]=TRUE;  
          $_SESSION["pseudo"]=$row["PSEUDO"];// Permet de récupérer le pseudo afin de personnaliser la navigation
	      $_SESSION["ID_UTILISATEUR"]=$row["ID"];
		  $_SESSION["email"]=$_POST["EMAIL"];
		  echo '<script language="Javascript">
          <!--
          document.location.replace("../accueil/index.php");
          // -->
          </script>';
          }//MDP
      }//ACTIF
	}
   }//$total
    
};//Cookie
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Connexion</title>
<?
include('../scriptes.php');
?>
</head>
<body id="sky">
<?
include('../menu.php');
?>

<div class="content">

<div id="inscriptionContainer">

<br>
<h1>Connexion</h1> 

<? if(isset($message)){
      echo '<p>';
      echo $message;
      echo '</p>';
   }; 
?>
<br>
<? if($masquer_formulaire != true) { ?>
<form class="form" action="/membres/connecter.php" method="post" >
					<div class="field">
            <label for="email" class="hide">Email ou Pseudo</label>
            <input class="projectFormTextField" type="text" value="Email ou Pseudo" name="login" maxlength="150" id="username"  onFocus="javascript:this.value=''" onBlur="if (this.value == '') {this.value='Email ou Pseudo'};">	
            </div>
            <div class="field">
            <label for="passwd" class="hide">Password</label>				
            <input class="projectFormTextField"  type="password" value="password" name="passwd" maxlength="150" id="passwd" onFocus="javascript:this.value=''" onBlur="if (this.value == '') {this.value='password'};">
            <a class="forgot" href="/membres/oubli.php">Oublié ?</a>
            </div>
            <div class="field">
            <span class="remember">
            <input type="checkbox" tabindex="3" name="savelogin" id="loginpermanent"> <label for="loginpermanent" class="inline">Retenir mes informations ?</label>
            </span>
            <button class="ns_btn-small ns_blue" "type="submit" value="Login">Entrer</button>       
			</div>
			
					 
               
			   </form>
<? } ?>
</div>
</div>

</body>
</html>