<!-- Header -->
<div id="header" class="wrap">

	<a class="logo" href="/index.php"><span>Place de march�</span></a>

<div class="login">
<?
if ($_SESSION['connected']==1) {
echo '<a id="login" href="/membres/deconnexion.php"><span>D�connexion</span></a>';
} else {
echo '<a id="login" onClick="showLoginArea();"><span>Mon bureau virtuel</span></a>';
}
?>
<!-- Login box -->

			<div id="box-login"> <a style="position:absolute; top:0; right:0;" onClick="hideLoginArea();"><img src="../images/icones/icon_close1.png"></a>

				<form class="form" action="/membres/procederconnexion.php" method="post" >
					<div class="field">
						<label for="email" class="hide">Email:</label>
						<input class="projectFormTextField" type="text" value="email" name="login" maxlength="150" id="username"  onFocus="javascript:this.value=''">	
					</div>
					<div class="field">
						<label for="passwd" class="hide">Password:</label>				
						<input class="projectFormTextField"  type="password" value="mot de passe" name="passwd" maxlength="150" id="passwd" onFocus="javascript:this.value=''">
						<a class="forgot" href="/membres/oubli.php">Oubli� ?</a>
					</div>
					<div class="field">
						<button class="ns_btn-small ns_blue ns_right ns_margin-none" type="submit" value="Login">OK</button>
						<div class="remember">
							<input type="checkbox" tabindex="3" name="savelogin" id="loginpermanent"> <label for="loginpermanent" class="inline">Retenir mes informations ?</label>
						</div>
					</div>
					</br>
               <p>Rejoindre le r�seau ? <a href="/membres/inscription.php">Cr�ez un compte !</a></p>
			   </form>
			   </div>

</div>

   
</div>

			   
<!-- Menu Principal -->	
<div id="nav-main-wrap" class="grid_12">
					
			<ul id="nav-main">
            	<li>
                	<a href="/clients/creer.php"><span><b>Nouveau Projet</b></span></a>
                </li>
                <li>
					<a href="/dossier/freelances.php"><span>Trouver un Freelance</span></a>					
				</li>
			</ul>
</div>
<?
if (isset($_SESSION['pseudo'])) {
echo '<div class="grid_12">';
echo '<a href="/moderation/karma.php"> Karma </a>';
echo ' | ';
echo '<a href="/membres/profil.php">'.htmlentities(trim($_SESSION['pseudo'])).'</a>';
echo '</div>';
}
?>			