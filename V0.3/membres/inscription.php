<?
session_start();
?>
<?

if(isset($_COOKIE["ID_UTILISATEUR"]))
{
     header("Location: /accueil/index.php");
}

else if (!isset($_POST["newusername"]) or !isset($_POST['email']) or !isset($_POST['newuserpasswd']) or !isset($_POST["newuserpasswd1"])) {
$masquer_formulaire = false;
$message ='Veuillez remplir tout les champs, merci<br />';
} 

else {

 // Formulaire visible par défaut
     $masquer_formulaire = false;

     $PSEUDO = $_POST['newusername'];
     $EMAIL = $_POST['email'];
     $MDP = $_POST['newuserpasswd'];  

     include('../../db.php');

     
          
          // Vérification de la validité des champs
          if(!ereg("^[A-Za-z0-9_]{4,20}$", $_POST["newusername"]))
          {
               $message = "Votre nom d'utilisateur doit comporter entre 4 et 20 caractères<br />\n";
               $message .= "L'utilisation de l'underscore est autorisée";
          }
          elseif(!ereg("^[A-Za-z0-9]{6,16}$", $_POST["newuserpasswd"]))
          {
               $message = "Votre mot de passe doit comporter entre 6 et 16 caractères";
          }
          elseif($_POST["newuserpasswd"] != $_POST["newuserpasswd1"])
          {
               $message = "Votre mot de passe n'a pas été correctement confirmé";
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
               // Vérification de l'unicité du nom d'utilisateur et de l'adresse e-mail
               $result = mysql_query("
                    SELECT PSEUDO
                         , EMAIL
                    FROM MEMBRES
                    WHERE PSEUDO = '" . $_POST["newusername"] . "'
                    OR EMAIL = '" . $_POST["email"] . "'
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
                    


                    else { 
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

                    $requete = "INSERT INTO MEMBRES (ID, PSEUDO, EMAIL, MDP, DEPUIS, CLEF_ACTIVATION) VALUES('', '".$PSEUDO."', '".$EMAIL."','".$MDP."','".date('c')."','".$clef_activation."');" ;
                    mysql_query($requete);

                                              
                   // Envoi du mail d'activation
                   $sujet = "Activation de votre compte utilisateur";
                              
                   $message = "Pour valider votre inscription, merci de cliquer sur le lien suivant :\n";
                   $message .= "http://" . $_SERVER["SERVER_NAME"];
                   $message .= "/membres/activer-compte-utilisateur.php?id=" . mysql_insert_id();
                   $message .= "&clef=" . $clef_activation."\n";
				   $message .= "Pseudo :".$PSEUDO."\n";
				   $message .= "Mot de passe :".$MDP."\n";
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
                     $message = "Votre compte utilisateur a correctement été créer<br />\n";
                     $message .= "Un email vient de vous être envoyer afin de l'activer";
                                   
                     // On masque le formulaire
                     $masquer_formulaire = true;
                                   
                }
                      
          }
		  }
		  }
};
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Formulaire d'Inscription</title>
<?
include('../scriptes.php');
?>
<script src="/javascript/password.js" type="text/javascript"></script>
</head>
<body id="sky">
<?
include('../menu.php');
?>
<div class="content">

<div id="inscriptionContainer">

<br>
<h1>Formulaire d'inscription</h1> 
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
<? if($masquer_formulaire != true) { ?>

<form method="post" action="inscription.php" id="signup-form">
<a name="sec1"></a>
<div class="half_column" style="position:relative; height:90px">
	<label for="username"><b>Nouveau Pseudo :</b></label><br>
	<span id="check_username_exist"></span><span id="tbx_username_err" class="err-msg"></span>
	<input type="text" class="gaf_textbox" name="newusername" maxlength="20" id="tbx_username" value="<? echo $_POST["newusername"] ?>" onMouseOver="showHint('tbx_username_hint');" onMouseOut="hideHint('tbx_username_hint');" onBlur="showError10('tbx_username','tbx_username_err')">&nbsp;
	<span id="tbx_username_hint" class="hint">Entrez s'il vous plait 4-20 caractères alphanumeric [a-z 0-9] commençant par une lettre<span class="hint-pointer">&nbsp;</span></span><br>
	
</div>
<div class="half_column" style="position:relative; height:90px">
	<label for="gafEmail"><b>Adresse Email :</b></label><br>
	<input type="text" name="email" id="tbx_email" value="<? echo $_POST["email"] ?>" class="gaf_textbox" onMouseOver="showHint('tbx_email_hint');" onMouseOut="hideHint('tbx_email_hint');" onBlur="showError10('tbx_email','tbx_email_err')">&nbsp;
	<span id="tbx_email_hint" class="hint">Un email vous sera envoyé à cette adresse pour vérification et ainsi compléter le processus de connexion.<span class="hint-pointer">&nbsp;</span></span><br>
	<span id="tbx_email_err" class="err-mess">Assurez-vous d'avoir entré une adresse email valide</span>
</div>
<div class="clear"></div>
<div class="half_column" style="height:90px">
	<label for="passwd"><b>Mot de passe :</b></label>&nbsp;<span id="pwd-err-lhs" class="err-mess"></span><br>
	<input type="password" class="gaf_textbox" name="newuserpasswd" maxlength="16" id="passwd1" value="<? echo $_POST["newuserpasswd"] ?>">&nbsp;<br>
	<span id='passwd_hint_id'></span>
<style>
.password_strength {
padding: 0 3px;
display: inline-block;
}
.password_strength_1 {
	background-color: #fcb6b1;
}
.password_strength_2 {
	background-color: #fccab1;
}
.password_strength_3 {
	background-color: #fcfbb1;
}
.password_strength_4 {
	background-color: #dafcb1;
}
.password_strength_5 {
	background-color: #bcfcb1;
}
</style>

<script src="../javascript/password.js?1" type="text/javascript"></script>

<script type="text/javascript">
	jq= jQuery.noConflict();
	jq('#passwd1').password_strength({
			'container':jq('#passwd_hint_id'), 
			'invalidMessage': 'Password can only be 6-16 letters (a-z A-Z) and numbers (0-9).',
			'checkValidation': function () {
				if (jq('#passwd1').val().length > 6 && !isValidPassword()) {
					return false;
				}
				else {
					return true;
				}
			}
		});

	function isValidPassword() {
		var hint_msg = /^[a-z0-9]{6,16}$/i; 
		if (hint_msg.test(jq('#passwd1').val())) {
			return true;
		}
		return false;
	}

	function isPasswordStrongEnough() {
		var hint_msg = /weak/i;
		if (hint_msg.test(jq('#passwd_hint_id').html())) {
			return false;
		}
		return true;
	}

	function validate() {
		var msg = null;
		var res = true;

		if (!isValidPassword()){
			msg=((msg==null)?'':msg+"\n")+'Password can only be 6-16 letters (a-z A-Z) and numbers (0-9).';
			res=false;
		}

		if (document.getElementById('passwd1').value!='' && !isPasswordStrongEnough()) {
			msg=((msg==null)?'':msg+"\n")+'Please make sure you enter a stronger password (at least Average level)';
			document.getElementById('passwd1').focus();
			res=false;
		}

		if (msg!=null)
			alert(msg);

		return res;
	}
</script>

</div>
<div class="half_column" style="height:90px">
	<label for="passwd1"><b>Confirmer le mot de Passe :</b></label>&nbsp;<span id="pwd-err-rhs" style="display:none;color:red;"></span><br>
	<input type="password" class="gaf_textbox" name="newuserpasswd1" maxlength="16" id="passwd2" value="<? echo $_POST["newuserpasswd1"] ?>" onKeyUp="verifPasswd(this.form);"><br>
	<span id='passwd_match_msg' class="ok-mess">Les mots de passes sont semblables&nbsp;<img src="../images/icones/icon_check.png"></span>
</div>

<div style="padding-left:5px;">
	En cliquant sur rejoindre, vous indiquez avoir lu et accepté les 
	<a href='javascript: void()' onclick='window.open("../infos/termes.html","","width=500, height=450, left=100,top=100,menu=no, toolbar=no,scrollbars=yes,resizable=yes");return false;'>Termes &amp; Conditions</a> et le  
	<a href='javascript: void()' onclick='window.open("../infos/reglement.html","","width=700, height=550, left=0,top=0,menu=no, toolbar=no,scrollbars=yes,resizable=yes");return false;'>Réglement</a>
</div>
<br>
<center>
<button class="ns_btn ns_blue" type="submit" value="post">Rejoindre le réseau</button>
</center>
</form>

<? } ?>
</div>
</div>
</body>
</html>