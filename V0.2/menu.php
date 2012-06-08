<!-- Header -->
<div id="header">

<div id="menu-wrap" class="wrap">
					
			<ul class="menu gauche">
			<li>
			<?
            if ($_SESSION['connected']==TRUE) {
            echo '<a class="logo" href="/accueil"><span>Accueil</span></a>';
            } else {
            echo '<a class="logo" href="/index.php"><span>Accueil</span></a>';
            };
            ?>
			</li>
            </ul>
			
			<ul class="menu">
			<li>
			 <a href="/projets/projets.php?nombre=50"><span>Projets</span></a>
			 <ul><li><a href="/clients/creer.php"><span>Créer</span></a></li></ul>		
			</li>
			     
			<li>
			 <a href="/dossier/freelances.php"><span>Freelances</span></a>					
			</li>
			
			</ul>
			
			<ul class="menu droite">
			<li>
			<!--
			<a style="position:absolute; top:0; right:0;" onClick="showhideLoginArea('profil');"><img src="../images/icones/icon_close1.png"></a>
            -->
			<?
            
            if ($_SESSION['connected']==TRUE) {
            echo '
			<!-- Profil et Compte -->
            
			
			    
			<a href="/membres/profil.php"><span>Profil et Compte <img src="images/icones/toggle.png" width="7px" height="7px"></span></a> 
			    	
			
			<ul>
			
			<li><a href="/parametres/compte.php">Paramètres</a></li>                                 
            <li><a href="/membres/deconnexion.php">Déconnexion</a></li>
            
			
			</ul>
			
            
			';
			/*
			echo '<a id="profil" onClick="showhideLoginArea(this.id);"><span>Profil</span></a>';
            */
			} else {
            echo '<a id="login" href="/membres/connecter.php"><span>Login</span></a>';
            };
			
            ?>
            </li>
					     
            
				
			
			</ul>
			
    
			            
			
</div>

   
</div><!-- Header -->

<br>
			   
<!-- Menu Principal -->	
<div class="menu-content">
</div>