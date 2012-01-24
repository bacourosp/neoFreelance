// JavaScript Document

jq = jQuery.noConflict();
var job_ids = [];

function removeByValue(myarray, val) {
	
	for(var i=0; i < myarray.length; i++) {
		if(myarray[i] == val) {
			myarray.splice(i, 1);
			break;
		}
	}
}

function supprimerCompetence(ide) {
removeByValue(job_ids, ide);
}

function get_selected_jobs(job_id) {

    job_ids.push(job_id);

    return job_ids;
}

function updateCountOfAddedSkills(ide) {

var selected_jobs = get_selected_jobs(ide);
var selected_job_count = selected_jobs.length;

}

function ajouterCompetence(id) {
	if ($('.chosen-skill').length >= 5) {
		window.alert('Vous pouvez ajouter un maximum de 5 Compétences')
	};
    
	if($('#'+id+'-chosen-skill').length != 0) {
		window.alert('Vous avez déjà choisi cette compétence') }
	else {
        $('<span class="chosen-skill" id="'+id+'-chosen-skill" onClick="javascript:$(this).remove();supprimerCompetence('+id+');">'+document.getElementById(id).innerHTML+'<a><img class="btn-remove-skill" src="../images/icones/close_8x8.gif"></a></span>').appendTo($('#skill-container'));
        updateCountOfAddedSkills(id);
    };
}

function showBoxSkills(){

//$(document).ready(function() {
//  $('#box-skills').draggable();
//});	

document.getElementById('box-skills').style.display = 'block';	

}

function hideBoxSkills(){
	
	document.getElementById('box-skills').style.display = 'none';	
}

function showProject() {
}

function hilightProject () {
	
}

function getIdByTxtJSON(txt) {
	for(i=0; i<get_jobs().length; i++) {
		if(txt == get_jobs()[i].name) {
			return get_jobs()[i].id;
		}
	}
	return false;
}

//function addSkill(label_txt, ignoreWarning) {
function addSkill(id, ignoreWarning) {
if(jq('.chosen-skill-container').length >= 5) {
		if (!ignoreWarning) {
			alert('You can only add 5 skills. Please delete some before trying again.');
		}

		return false;
	}

//	label_txt = label_txt.replace(/<b>/ig, '').replace(/<\/b>/ig, '').replace(/ <i>\(click to add\)<\/i>/ig, '');
//	var id = getIdByTxtJSON(label_txt);
    
//    _gaq.push(['_trackEvent', 'Post Project', 'Add Skill', label_txt]);
	var obj = jq('<div></div>').hide()
				.addClass('chosen-skill-container')
				.attr('id', id+'-chosen-skill-container')
				.append(jq('<span></span>')
					.addClass('chosen-skill')
					.html(label_txt)
					.append(
						jq('<img>')
						.addClass('btn-remove-skill')
						.attr("src", "/img/icons/close_8x8.gif")
					)
				);
	if(jq('#'+id+'-chosen-skill-container').length != 0) {
		if (!ignoreWarning) {
			alert('You have already add this skill. Please choose another one.');
		}
	} else {
		// update label
		//obj.insertAfter("#chosen-skills-pool span.selected_skills_label");
		//jq('#chosen-skills-pool span:first').show().css('display', 'block');
		//obj.fadeIn('slow');
		// update popup
		//jq('#'+id+'-data-item').addClass('active');
		//updateCountOfAddedSkill();
		obj.appendTo('#chosen-skill-container');
	}
}

function clearSkills() {
	jq('#chosen-skills-pool > div.chosen-skill-container').remove();
	updateCountOfAddedSkill(loading_finished != 'ready');
}

function removeSkill(id) {
	jq('#'+id+'-data-item').removeClass('active');
	jq('#'+id+'-chosen-skill-container').fadeOut('fast');
	//setTimeout(function(){jq('#'+id+'-chosen-skill-container').remove(); updateCountOfAddedSkill(); }, 1000);
	jq('#'+id+'-chosen-skill-container').remove();
	updateCountOfAddedSkill();
}

function updateCountOfAddedSkill(ignore) {
	if (!ignore) {
		needShowSkillRequiredErrMsg();
	};

	var selected_jobs = get_selected_jobs().sort();
	if (selected_jobs.length == 0) {
		jobPrediction.hideJobPrediction();
	}
	else {
		jobPrediction.predictJobs(selected_jobs);
	}

	//var selected_job_count = jq('.chosen-skill-container').size();
	var selected_job_count = selected_jobs.length;

	jq('#count-added-skill').parent().html('you can add <span id="count-added-skill"></span>');

	jq('#count-added-skill').html((5 - selected_job_count) + ' more skill' + (selected_job_count >= 4 ? '' : 's'));

	if (selected_job_count == 5) {
		jq('#count-added-skill').parent().html('you can not add more skills<span id="count-added-skill"></span>');
	}

	if (get_selected_jobs().length == 0) {
		jq('span.selected_skills_label').hide();
	}
}