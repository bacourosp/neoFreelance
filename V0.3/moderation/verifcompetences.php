<?
session_start();
?>

<form method="post" action="verifcompetences.php">
<div id="Categorie" style="position:relative">
	<b>Categorie :</b></label>&nbsp;<span id="categorie-name-err" class="err-msg">Entrez une categorie de competeces (max 50 caractères)</span>
	</br>
	<input type="text" value="" size="45" maxlength="60" name="project-name" id="category-name" class="projectFormTextField big-textbox" onMouseOver="showHint('category-name-hint');" onMouseOut="hideHint('category-name-hint');" onBlur="showError10('category-name','category-name-err');">&nbsp;
	<span id="category-name-hint">Ceci vous permettra de cumuler du Karma<span class="hint-pointer">&nbsp;</span></span>
</div>
<div id="CompetenceName" style="position:relative">
	<label for="CompetenceName"><b>Nom de la Competence :</b></label>&nbsp;<span id="competence-name-err" class="err-msg">Entrez une competence (max 50 caractères)</span>
	</br>
	<input type="text" value="" size="45" maxlength="60" name="project-name" id="project-name" class="projectFormTextField big-textbox" onMouseOver="showHint('competence-name-hint');" onMouseOut="hideHint('competence-name-hint');" onBlur="showError10('competence-name','competence-name-err');">&nbsp;
	<span id="competence-name-hint">Ceci vous permettra de cumuler du Karma<span class="hint-pointer">&nbsp;</span></span>
</div>
<button class="ns_btn ns_blue" type="submit" value="post">AJOUTER</button>
</form>