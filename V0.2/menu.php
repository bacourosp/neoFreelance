<!-- Header -->
<div id="header">

<div id="menu-wrap" class="wrap">
					
			<ul class="menu">
			
			<?
            echo '<li>';
            if ($_SESSION['connected']==TRUE) {
            echo '<a class="logo" href="/accueil"><span>Accueil</span></a>';
            } else {
            echo '<a class="logo" href="/index.php"><span>Accueil</span></a>';
            };
			echo '</li>';
            ?>

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
			
			<ul class="menu droite">
			<li>
			
			<?
            
            if ($_SESSION['connected']==TRUE) {
            echo '<a id="profil" onClick="showhideLoginArea(this.id);"><span>Profil</span></a>';
            } else {
            echo '<a id="login" onClick="showhideLoginArea(this.id);"><span>Mon bureau virtuel</span></a>';
            };
			
            ?>
            </li>
			
				
            <!-- Profil et Compte box -->

            <div id="box-profil" style="display:none"> <a style="position:absolute; top:0; right:0;" onClick="showhideLoginArea('profil');"><img src="../images/icones/icon_close1.png"></a>
            <a href="/membres/profil.php">Profil</a>
            <br>
            <a href="/parametres/compte.php">Paramètres</a>
            <br>
            <a href="/membres/deconnexion.php">Déconnexion</a>
            </div>

            <!-- Login box -->

            <div id="box-login" style="display:none"> <a style="position:absolute; top:0; right:0;" onClick="showhideLoginArea('login');"><img src="../images/icones/icon_close1.png"></a>

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
            <span class="remember">
            <input type="checkbox" tabindex="3" name="savelogin" id="loginpermanent"> <label for="loginpermanent" class="inline">Retenir mes informations ?</label>
            </span>
            <button class="ns_btn-small ns_blue" style="float:right" "type="submit" value="Login">Entrer</button>       
			</div>
			<br>
			<div class="field">       
            <p>Rejoindre le réseau ? <a href="/membres/inscription.php">Créez un compte !</a></p>
            </div>
            
     
            </form>
            </div>
				
			
			</ul>
			
    
			            
			
</div>

   
</div><!-- Header -->

<br>
			   
<!-- Menu Principal -->	
<div class="menu-content">
</div>