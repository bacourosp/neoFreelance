<html>
<head>
<title>Ajouter du texte au milieu d'un textarea</title>
</head>
<body>
<script language="JavaScript" type="text/javascript">
/*function storeCaret(text)
{ // voided
}
*/
function AddText2(message){
if (str=="")
  {
  document.getElementById("stream").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("stream").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","envoyer.php?message="+message,true);
xmlhttp.send();
}

function AddText(startTag,defaultText,endTag) 
{
   with(document.poster)
   {
      if (stream.createTextRange) 
      {
         var text;
         mstream.focus(stream.caretPos);
         stream.caretPos = document.selection.createRange().duplicate();
         if(stream.caretPos.text.length>0)
         {
            //g�re les espace de fin de s�lection. Un double-click s�lectionne le mot
            //+ un espace qu'on ne souhaite pas forc�ment...
            var sel = stream.caretPos.text;
            var fin = '';
            while(sel.substring(sel.length-1, sel.length)==' ')
            {
               sel = sel.substring(0, sel.length-1)
               fin += ' ';
            }
            stream.caretPos.text = startTag + sel + endTag + fin;
         }
         else
            stream.caretPos.text = startTag+defaultText+endTag;
      }
      else stream.value += startTag+defaultText+endTag;
   }
}
</script>

<textarea
   rows="5"
   style="width: 100%"
   name="stream"
   wrap="virtual" readonly class="projectFormTextField"
   onmouseover="this.focus();">
Mini Stream :
<?
//=========================================

// information pour la connection � le DB

//=========================================

$host = 'mysql51-46.perso';
$user = 'boudeffacowo';
$pass = 'zoOPwOb8';
$db = 'boudeffacowo';

//=========================================    

// connection � la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

try
{
     // R�cup�ration des 10 derniers messages
    $select='SELECT DATE, MESSAGE FROM CHAT ORDER BY ID DESC LIMIT 0, 10';
    
	$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
    $total = mysql_num_rows($result);
    // Affichage de chaque message (toutes les donn�es sont prot�g�es par htmlspecialchars)
    while ($row = mysql_fetch_array($result))
    {   
	$date = $row["DATE"];
	$message = $row["MESSAGE"];
	
        echo date("d/m/Y",strtotime($date)); echo '> '; echo $message; echo "\n";
		
    }
    
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

</textarea><br>
<div>
<span>
<input type="text" name="message" id="mess" value="Tapez un message, puis Enter !" onFocus="javascript:this.value=''" class="projectFormTextField" style="width: 100%">
</span>
<span>
<input type="submit" name="soumettre" value="Envoyer" style="display:none;" onClick="AddText2(document.getElementById.value('mess'))">
</span>
</div>



</body>
</html>