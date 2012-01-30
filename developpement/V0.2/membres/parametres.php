<?
session_start();
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
<div class="c9d-tabcnt">
<div id="profilContainer">

<form method="post" action="./parametres.php" id="parameters-form">

<h1>Paramètres</h1>

      <input name="profil" type="radio" value="neoFreelance" checked> 
      neoFreelance
      <br>
      <input name="profil" type="radio" value="Facebook">
      <img src="../images/logos/logo-facebook-profil.png" width="100">
      <br>
      <input name="profil" type="radio" value="Gravatare">
      <img src="../images/logos/logo-gravatar.png" width="180">
      <br>
<button class="ns_btn ns_blue" type="submit" value="post">MODIFIER</button>
</form>

</div>
</div>
</body>
</html>