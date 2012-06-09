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

<br>

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
</div>
</div>

</body>
</html>