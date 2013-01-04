<script type="text/javascript">

$(document).ready(function(){
$('#feedback').click(function(e) {

    e.preventDefault();

    $('#support').reveal;

});
});

</script>
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
			 <ul>
			 <li><a href="/clients/creer.php"><span>Poster un projet</span></a></li>
			 <li><a href="/projets/categories.php"><span>Voir les catégories</span></a></li>
			 </ul>		
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
            
			
			    
			<a href="/membres/profil.php?ID='.$_SESSION[ID_UTILISATEUR].'"><span>Profil</span></a> 
			    	
			
			<ul>
			
			<li><a href="/parametres/compte.php">Paramètres</a></li>                                 
            <li><a href="/membres/deconnexion.php">Déconnexion</a></li>
            
			
			</ul>
			
            
			';
			/*
			echo '<a id="profil" onClick="showhideLoginArea(this.id);"><span>Profil</span></a>';
            */
			} else {
            echo '<a id="login" href="/membres/connexion.php"><span>Login</span></a>';
            };
			
            ?>
            </li>
					     
            
				
			
			</ul>
			
    
			            
			
</div>

   
</div><!-- Header -->

<br>

<?
include('feedback.php');
?>

<div id="feedback_tab">

<div class="text">

<a id="feedback" href="#" data-reveal-id="support" data-animation="fade" style="text-decoration:none;color:white;">Feedback</a>  

</div>
</div>

</div>