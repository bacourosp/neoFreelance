<!-- Header -->
<div id="header" class="wrap">

	<a class="logo" href="/index.php"><span>Place de marché</span></a>

<div class="login">
<?
if ($_SESSION['connected']==1) {
echo '<a id="login" onClick="showProfilArea();"><span>Profil et Compte</span></a>';
} else {
echo '<a id="login" onClick="showLoginArea();"><span>Mon bureau virtuel</span></a>';
}
?>
<!-- Profil et Compte box -->

<div id="box-profil"> <a style="position:absolute; top:0; right:0;" onClick="hideProfilArea();"><img src="../images/icones/icon_close1.png"></a>
<a href="/membres/profil.php">Profil</a>
<br>
<a href="/membres/parametres.php">Paramètres</a>
<br>
<a href="/membres/deconnexion.php">Déconnexion</a>
</div>


<!-- Login box -->

			<div id="box-login"> <a style="position:absolute; top:0; right:0;" onClick="hideLoginArea();"><img src="../images/icones/icon_close1.png"></a>

				<form class="form" action="/membres/procederconnexion.php" method="post" >
					<div class="field">
					  <label for="email" class="hide">Email</label>
					  <input class="projectFormTextField" type="text" value="Email" name="login" maxlength="150" id="username"  onFocus="javascript:this.value=''" onBlur="if (this.value == '') {this.value='Email'};">	
					</div>
					<div class="field">
					  <label for="passwd" class="hide">Password</label>				
					  <input class="projectFormTextField"  type="password" value="password" name="passwd" maxlength="150" id="passwd" onFocus="javascript:this.value=''" onBlur="if (this.value == '') {this.value='password'};">
					  <a class="forgot" href="/membres/oubli.php">Oublié ?</a>
					</div>
					<div class="field">
					  <div class="remember">
					  <input type="checkbox" tabindex="3" name="savelogin" id="loginpermanent"> <label for="loginpermanent" class="inline">Retenir mes informations ?</label>
				      </div>
					  <button class="ns_btn-small ns_blue" style="margin-left: 25px;" type="submit" value="Login">Entrer</button>
					<div class="field">
					<br>
					  <p>Rejoindre le réseau ? <a href="/membres/inscription.php">Créez un compte !</a></p>
					</div>
					</div>
					
               
			   </form>
			   </div>

</div>

   
</div>

			   
<!-- Menu Principal -->	
<div class="menu-content">
<div id="nav-main-wrap" class="grid_12">
					
			<ul id="nav-main">
            	<li>
                	<a href="/clients/creer.php"><span><b>Nouveau Projet</b></span></a>
                </li>
                <li>
					<a href="/dossier/freelances.php"><span>Trouver un Freelance</span></a>					
				</li>
				<li>
					<a href="/projets/derniers.php?nombre=50"><span>Explorer les Projets</span></a>					
				</li>
				
			</ul>
</div>
</div>
<!-- A revoir
<?
if (isset($_SESSION['pseudo'])) {
echo '<div class="grid_12">';
echo '<a href="/moderation/karma.php"> Karma </a>';
echo ' | ';
echo '<a href="/membres/profil.php">'.htmlentities(trim($_SESSION['pseudo'])).'</a>';
echo '</div>';
}
?>			

-->