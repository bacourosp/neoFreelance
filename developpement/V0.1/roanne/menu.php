<?
session_start();
?>
<?

echo '<center>';
echo '<table width="800" border="0">';
echo '  <tr>';
echo '   <td></td>';
   if ($_SESSION['connected']==1){
   echo '<td align="right"><a href="profil.php">'.$_SESSION['login'].'</a> | <a href="index.php?page=deconnexion">Déonnexion</a></td>';
   }
   else {
   echo '<td align="right"><a href="index.php?page=connexion">Connexion</a></td>';
   }
     
echo '  </tr>';
echo '  <tr>';
echo '    <th width="170" scope="col"><img src="../images/AL-Daffah-Logo.gif" width="149" height="58"></th>';
echo '    <th width="630" scope="col"></th>';
echo '  </tr>';
echo '</table>';
echo '<table width="800" border="1">';
echo '  <tr>';
echo '    <th scope="col"><a href="index.php?page=accueil">Accueil</a></th>';
echo '    <th scope="col"><a href="index.php?page=projets">Projets</a></th>';
echo '    <th scope="col">Aide</th>';
echo '  </tr>';
echo '</table>';
echo '</center>';
?>