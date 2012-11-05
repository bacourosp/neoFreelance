<div id="popup_name" class="popup_block">
<form method="post" action="soumission.php">
<div id="bidPeriodDiv"  style="position:relative; display:none" >
        <label for="subCategory"><b>ID Projet</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="idprojet" id="idprojet" value="<? echo $ID_PROJET ?>" style="vertical-align:middle;" onMouseOver="showHint('idprojet-hint');" onMouseOut="hideHint('idprojet-hint');" onBlur="showError('idprojet','idprojet-err');">
        <span id="idprojet-hint" class="hint">Donnez vous 1-99 jours pour r�aliser le projet<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 99 jours) &nbsp;<span id="idprojet-err" class="err-msg">Entrez une dur�e de r�alisation s'il vous plait.</span>
</div>
<div id="bidPeriodDiv"  style="position:relative; display:none" >
        <label for="subCategory"><b>ID Freelance</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="idfreelance" id="idfreelance" value="<? echo $_SESSION["ID_UTILISATEUR"] ?>" style="vertical-align:middle;" onMouseOver="showHint('idfreelance-hint');" onMouseOut="hideHint('idfreelance-hint');" onBlur="showError('idfreelance','idfreelance-err');">
        <span id="idfreelance-hint" class="hint">Donnez vous 1-99 jours pour r�aliser le projet<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 99 jours) &nbsp;<span id="idfreelance-err" class="err-msg">Entrez une dur�e de r�alisation s'il vous plait.</span>
</div>
<div id="bidPeriodDiv"  style="position:relative" >
        <label for="subCategory"><b>Dur�e de r�alisation</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="dureereal" id="dureereal" maxlength="2" size="3" value="1" style="vertical-align:middle;" onMouseOver="showHint('dureereal-hint');" onMouseOut="hideHint('dureereal-hint');" onBlur="showError('dureereal','dureereal-err');">
        <span id="dureereal-hint" class="hint">Donnez vous 1-99 jours pour r�aliser le projet<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (maximum 99 jours) &nbsp;<span id="dureereal-err" class="err-msg">Entrez une dur�e de r�alisation s'il vous plait.</span>
</div>
<div id="bidPeriodDiv"  style="position:relative" >
        <label for="subCategory"><b>Devis �stim� � :</b></label><br>
        <input type="text" class="projectFormTextField small-textbox" name="montantreal" id="montantreal" maxlength="4" size="3" value="0" style="vertical-align:middle;" onMouseOver="showHint('montantreal-hint');" onMouseOut="hideHint('montantreal-hint');" onBlur="showError('montantrealm','montantreal-err');">
        <span id="montantreal-hint" class="hint">Donnez un montant<span class="hint-pointer">&nbsp;</span></span>
        <label>Jours</label> (0 pour un projet FREE, et > 5000 �) &nbsp;<span id="montantreal-err" class="err-msg">Montant de la r�alisation s'il vous plait.</span>
</div>
<div id="divProjectDescription" >
	<table width="400" border="0">
		<tr>
			<td width="600"><label for="projectDetails"><b>D�crire votre Offre en d�tail :</b></label>
			
			<span id="project-description-err" class="err-msg">Entrez un minimum de dix carct�res s'il vous plait</span></td>
			
			<td> </td>
		</tr>
		<tr>
			<td colspan="2">
			<div style="width:400px; margin-bottom:15px; position:relative;">
			<textarea style="width:400px;" name="description" rows="13" maxlength="4000" id="project-description" class="projectFormTextField" onMouseOver="showHint('project-description-hint');" onMouseOut="hideHint('project-description-hint');" onBlur="showError10('project-description','project-description-err');" onkeypress="compter(this.form);"></textarea>&nbsp;
			<span id="project-description-hint" class="hint">Plus vous d�taillez votre offre, plus vous aurez de chance d'�tre choisis pour ce projet.<span class="hint-pointer">&nbsp;</span></span>
			</div>
			</td>
		</tr>
		<tr>
			<td class="projectDescriptionWarning"></td>
			<td class="divProjectCharLeft">
			<img src="../images/icones/crayon.jpg" width="20" height="20" alt="character left">&nbsp;<span id="proj-descr-char-count">4000</span> Restants<span id="proj-descr-char-s"></span>
			</td>
		</tr>
	</table>
</div>
<center>
<button class="ns_btn ns_blue" type="submit" value="post">Faire une offre</button>
</center>
</form>
</div>