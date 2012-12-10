<div id="contact" class="reveal-modal offre">
<a class="close-reveal-modal"><img src="../images/icones/icon_close1.png"></a>
<?
  $select2 = "SELECT PSEUDO FROM MEMBRES WHERE ID='".$_SESSION["ID_UTILISATEUR"]."';";
  $result2 = mysql_query($select2,$link) or die ('Erreur : '.mysql_error() );
  $total2 = mysql_num_rows($result2);

$row2 = mysql_fetch_array($result2);

$PSEUDO=$row2["PSEUDO"];
?>
<form method="post" action="envoyer.php">
<!--
Partie permettant de garder un lien avec les information sur le projet et le Freelance
-->
<div id="bidPeriodDiv"  style="position:relative; display:none;" >
        <label for="subCategory"><b>IDUTILISATEUR</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="idutilisateur" id="idprojet" value="<? echo $ID_MEMBRE ?>" style="vertical-align:middle;" onMouseOver="showHint('idprojet-hint');" onMouseOut="hideHint('idprojet-hint');" onBlur="showError('idprojet','idprojet-err');">
        <span id="idprojet-hint" class="hint">Donnez vous 1-99 jours pour réaliser le projet<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 99 jours) &nbsp;<span id="idprojet-err" class="err-msg">Entrez une dur�e de r�alisation s'il vous plait.</span>
</div>
<div id="bidPeriodDiv"  style="position:relative; display:none;" >
        <label for="subCategory"><b>EMAIL</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="email" id="idprojet2" value="<? echo $EMAIL ?>" style="vertical-align:middle;" onMouseOver="showHint('idprojet-hint');" onMouseOut="hideHint('idprojet-hint');" onBlur="showError('idprojet','idprojet-err');">
        <span id="idprojet-hint" class="hint">Donnez vous 1-99 jours pour réaliser le projet<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 99 jours) &nbsp;<span id="idprojet-err" class="err-msg">Entrez une dur�e de r�alisation s'il vous plait.</span>
</div>
<div id="bidPeriodDiv"  style="position:relative; display:none;" >
        <label for="subCategory"><b>PSEUDO</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="pseudo" id="idfreelance" value="<? echo $PSEUDO ?>" style="vertical-align:middle;" onMouseOver="showHint('idfreelance-hint');" onMouseOut="hideHint('idfreelance-hint');" onBlur="showError('idfreelance','idfreelance-err');">
        <span id="idfreelance-hint" class="hint">Donnez vous 1-99 jours pour r�aliser le projet<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 99 jours) &nbsp;<span id="idfreelance-err" class="err-msg">Entrez une dur�e de r�alisation s'il vous plait.</span>
</div>
<!--
Fin de cette partie
-->
<div id="Sujet"  style="position:relative" >
        <label for="subCategory"><b>Sujet� :</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="sujet" id="montantreal" maxlength="50" size="50" style="width:200px; " value="Sujet : " style="vertical-align:middle;" onMouseOver="showHint('montantreal-hint');" onMouseOut="hideHint('montantreal-hint');" onBlur="showError('montantrealm','montantreal-err');">
        <span id="montantreal-hint" class="hint">Quel est le sujet ?<span class="hint-pointer">&nbsp;</span></span>
        <label></label> Saisissez un sujet &nbsp;<span id="montantreal-err" class="err-msg">Sujet de votre message.</span>
</div>
<div id="divProjectDescription" >
	<table width="400" border="0">
		<tr>
			<td width="600"><label for="projectDetails"><b>Message :</b></label>
			
			<span id="project-description-err" class="err-msg">Entrez un minimum de dix carctè�res s'il vous plait</span></td>
			
			<td> </td>
		</tr>
		<tr>
			<td colspan="2">
			<div style="width:400px; margin-bottom:15px; position:relative;">
			<textarea style="width:400px;" name="message" rows="13" maxlength="400" id="project-description" class="projectFormTextField" onMouseOver="showHint('project-description-hint');" onMouseOut="hideHint('project-description-hint');" onBlur="showError10('project-description','project-description-err');" onkeypress="compteroffre(this.form);"></textarea>&nbsp;
			<span id="project-description-hint" class="hint">Plus vous dé�taillez votre message, plus vous aurez de chance d'ê�tre contactéet.<span class="hint-pointer">&nbsp;</span></span>
			</div>
			</td>
		</tr>
		<tr>
			<td class="projectDescriptionWarning"></td>
			<td class="divProjectCharLeft">
			<img src="../images/icones/crayon.jpg" width="20" height="20" alt="character left">&nbsp;<span id="proj-descr-char-count">400</span> Restants<span id="proj-descr-char-s"></span>
			</td>
		</tr>
	</table>
</div>
<center>
<button class="ns_btn ns_blue" type="submit" value="post">Envoyer</button>
</center>
</form>
</div>