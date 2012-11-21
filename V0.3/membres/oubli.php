<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mot de passe oublié</title>
<?
include('../scriptes.php');
?>
</head>
<body id="sky">

<?php
include('../menu.php');
?>
<div class="content">
<div id="profilContainer">

<form method="post" action="./envoyermdp.php" id="parameters-form">
<br>
<h1>Oubli ?</h1>

<div id="miss" style="position: relative ">
	<label for="oubli"><b>Entrez votre Email :</b></label>&nbsp;
	<span id="miss-err" class="err-msg">Entrez un Email valide s'il vous plait.</span>
	<br>
	<input type="text" value="" size="45" maxlength="60" name="email" id="oubli-name" class="oubliFormTextField big-textbox" onMouseOver="showHint('miss-hint');" onMouseOut="hideHint('miss-hint');" onBlur="showError10('miss','miss-err');">&nbsp;
	<span id="miss-hint" class="hint" style="display:none;">L'Email que vous entrez doit être celui que vous avez utilisé pour vous inscrire.<span class="hint-pointer">&nbsp;</span></span>
</div>
<br>
<center>
<button class="ns_btn ns_blue" type="submit" value="post">Envoyer</button>
</center>
</form>

</div>
</div>
</body>
</html>