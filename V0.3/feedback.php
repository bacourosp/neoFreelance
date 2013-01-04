<div id="support" class="reveal-modal offre">
<h1>Envoyer un feedback</h1>
<a class="close-reveal-modal"><img src="../images/icones/icon_close1.png"></a>

<form method="post" action="/send-feedback.php">
<!--
Partie permettant de garder un lien avec les information sur le projet et le Freelance
-->

<div id="email"  style="position:relative;" >
        <label for="subCategory"><b>Email</b></label><br>
        <input type="text" class="projectFormTextField textbox" name="email" id="idprojet2" style="vertical-align:middle;" onMouseOver="showHint('idprojet-hint');" onMouseOut="hideHint('idprojet-hint');" onBlur="showError('idprojet','idprojet-err');">
        <span id="idprojet-hint" class="hint">Entrez votre eMail<span class="hint-pointer">&nbsp;</span></span>
        <label>(Optionnel)</label> &nbsp;<span id="idprojet-err" class="err-msg"></span>
</div>

<!--
Fin de cette partie
-->
<div id="Sujet"  style="position:relative; display:none;" >
        <label for="subCategory"><b>Sujet :</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="sujet" id="montantreal" value="Feddback" maxlength="50" size="50" style="width:200px; " value="neoFreelance > " style="vertical-align:middle;" onMouseOver="showHint('montantreal-hint');" onMouseOut="hideHint('montantreal-hint');" onBlur="showError('montantrealm','montantreal-err');">
        <span id="montantreal-hint" class="hint">Quel est le sujet ?<span class="hint-pointer">&nbsp;</span></span>
        <label></label> &nbsp;<span id="montantreal-err" class="err-msg">Sujet de votre message.</span>
</div>

<div id="divProjectDescription" >
	<table width="400" border="0">
		<tr>
			<td width="600"><label for="projectDetails"><b>Message :</b></label>
			
			<span id="project-description-err" class="err-msg">Entrez un minimum de dix caract&egrave;res s'il vous plait</span></td>
			
			<td> </td>
		</tr>
		<tr>
			<td colspan="2">
			<div style="width:400px; margin-bottom:15px; position:relative;">
			<textarea style="width:300px;" name="message" rows="13" maxlength="400" id="project-description" class="projectFormTextField" onMouseOver="showHint('project-description-hint');" onMouseOut="hideHint('project-description-hint');" onBlur="showError10('project-description','project-description-err');" onkeypress="compteroffre(this.form);"></textarea>&nbsp;
			<span id="project-description-hint" class="hint">Veuillez d&eacute;tailler votre message.<span class="hint-pointer">&nbsp;</span></span>
			</div>
			</td>
		</tr>
		<tr>
			<td class="projectDescriptionWarning"></td>
			<td class="divProjectCharLeft" style="display:none;">
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