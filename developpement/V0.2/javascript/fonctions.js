// JavaScript Document

function permute1(val)
{
	
	if(document.getElementById('c'+val).style.display=='none'){
	document.getElementById('c'+val).style.display='block';
	document.getElementById('s'+val).innerHTML='-';perm=1;
	}
	else if(document.getElementById('c'+val).style.display=='block'){
	document.getElementById('c'+val).style.display='none';
	document.getElementById('s'+val).innerHTML='+';perm=0;
	}

}

var perm=0;
	
function permute2(val)
{
	
	if(perm==0){
	document.getElementById("c"+val).style.display='block';
	document.getElementById('s'+val).innerHTML='-';perm=1;
	}
	else if(perm==1){
	document.getElementById("c"+val).style.display='none';
	document.getElementById('s'+val).innerHTML='+';perm=0;
	}

}

function showLoginArea(){
	
	document.getElementById('box-login').style.display = 'block';
	
}

function hideLoginArea(){
	
	document.getElementById('box-login').style.display = 'none';
	
}

// JavaScript Document
function showProfilArea(){
	
	document.getElementById('box-profil').style.display = 'block';
	
}

function hideProfilArea(){
	
	document.getElementById('box-profil').style.display = 'none';
	
}

function showHideLoginArea(){
 if (document.getElementById('box-login').style.display == 'none')
 document.getElementById('box-login').style.display = 'block'
 else
 document.getElementById('box-login').style.display = 'none';

}

function showHint(elementId){
	
	    document.getElementById(elementId).style.display = 'block';
		
}

function hideHint(elementId){
	
	    document.getElementById(elementId).style.display = 'none';	
}

function showError10(Box,elementId){
	
	if (document.getElementById(Box).value == "") 
	    document.getElementById(elementId).style.display = 'inline'
    else document.getElementById(elementId).style.display = 'none';
//else if (document.getElementById(Box).value.lenght > 0 and document.getElementById(Box).value.lenght < 11) 
//	         document.getElementById(elementId).style.display = 'inline'
//		     else document.getElementById(elementId).style.display = 'none';

}

function showError(Box,elementId){
	
	if (document.getElementById(Box).value == "") 
	    document.getElementById(elementId).style.display = 'inline'
    else document.getElementById(elementId).style.display = 'none';
}

function insertAfter(parent, node, referenceNode) {
  parent.insertBefore(node, referenceNode.nextSibling);
}