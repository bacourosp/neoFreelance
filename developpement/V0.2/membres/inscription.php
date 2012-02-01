<?
session_start();
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
<h1>Formulaire d'inscription</h1> <p>Aucune inscription n'est possible pour l'instant, merci de votre compréhension</p>
<br>
<form method="post" action="surinscription.php" id="signup-form">
<a name="sec1"></a>
<div class="half_column" style="position:relative; height:90px">
	<label for="username"><b>Nouveau Pseudo :</b></label><br>
	<span id="check_username_exist"></span><span id="tbx_username_err" class="err-msg"></span>
	<input type="text" class="gaf_textbox" name="newusername" id="tbx_username" value="" onMouseOver="showHint('tbx_username_hint');" onMouseOut="hideHint('tbx_username_hint');" onBlur="showError10('tbx_username','tbx_username_err')">&nbsp;
	<span id="tbx_username_hint" class="hint">Entrez s'il vous plait 3-16 caractères alphanumeric [a-z 0-9] commençant par une lettre<span class="hint-pointer">&nbsp;</span></span><br>
	
</div>
<div class="half_column" style="position:relative; height:90px">
	<label for="gafEmail"><b>Adresse Email :</b></label><br>
	<input type="text" name="email" id="tbx_email" value="" class="gaf_textbox" onMouseOver="showHint('tbx_email_hint');" onMouseOut="hideHint('tbx_email_hint');" onBlur="showError10('tbx_email','tbx_email_err')">&nbsp;
	<span id="tbx_email_hint" class="hint">Un email vous sera envoyé à cette adresse pour vérification et ainsi compléter le processus de connexion.<span class="hint-pointer">&nbsp;</span></span><br>
	<span id="tbx_email_err" class="err-mess">Assurez-vous d'avoir entré une adresse email valide</span>
</div>
<div class="clear"></div>
<div class="half_column" style="height:90px">
	<label for="passwd"><b>Mot de passe :</b></label>&nbsp;<span id="pwd-err-lhs" class="err-mess"></span><br>
	<input type="password" class="gaf_textbox" name="newuserpasswd" id="passwd1" value="">&nbsp;<br>
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
	<label for="passwd1"><b>Repeter mot de Passe :</b></label>&nbsp;<span id="pwd-err-rhs" style="display:none;color:red;"></span><br>
	<input type="password" class="gaf_textbox" name="newuserpasswd1" id="passwd2" value="" onChange="verifPasswd();"><br>
	<span id='passwd_match_msg' class="ok-mess">Les mots de passes sont semblables&nbsp;<img src="../images/icones/icon_check.png"></span>
</div>
<table width="100%" border="0" height="40px">
	<tr>
		<td width="3%"><input type="checkbox" name="chkbox_notifications_email_notify" checked></td>
		<td width="97%" id="notify_msg">Je veux recevoir des notifications par email sur des projets en rapport avec mes compétences.</td>
	</tr>
</table>
<div style="padding-left:5px;">
	En cliquant sur rejoindre, vous indiquez que vous avez lu et agréer les 
	<a href='javascript: void()' onclick='window.open("../infos/termes.html","","width=500, height=450, left=100,top=100,menu=no, toolbar=no,scrollbars=yes,resizable=yes");return false;'>Termes &amp; Conditions</a> et le  
	<a href='javascript: void()' onclick='window.open("../infos/reglement.html","","width=700, height=550, left=0,top=0,menu=no, toolbar=no,scrollbars=yes,resizable=yes");return false;'>Réglement</a>
</div>
<br>
<center>
<button class="ns_btn ns_blue" type="submit" value="post">Rejoindre le réseau</button>
</center>
</form>
</div>
</div>

</body>
</html>