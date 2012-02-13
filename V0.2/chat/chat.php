<form name="poster"
   onSubmit="AddText('',document.poster.mess.value,'');" method="post" action="/chat/envoyer.php">

<script language="JavaScript" type="text/javascript">
/*function storeCaret(text)
{ // voided
}
*/
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
            //gère les espace de fin de sélection. Un double-click sélectionne le mot
            //+ un espace qu'on ne souhaite pas forcément...
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
<?
//=========================================

// information pour la connection à le DB

//=========================================
include('../db.php');
?>
<span>
<input type="text" name="message" id="mess" value="Tapez un message, puis Enter !" onFocus="javascript:this.value=''" class="projectFormTextField" style="width: 100%">
</span>
<textarea
   rows="5"
   style="width: 100%"
   name="stream"
   wrap="virtual" readonly class="projectFormTextField"
   onmouseover="this.focus();">
Mini Stream :
<?
//=========================================    

// connection à la DB

//=========================================

$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());

try
{
     // Récupération des 10 derniers messages
    $select='SELECT DATE, MESSAGE FROM CHAT ORDER BY ID DESC LIMIT 0, 10';
    
	$result = mysql_query($select,$link) or die ('Erreur : '.mysql_error() );
    $total = mysql_num_rows($result);
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
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
<input type="submit" name="soumettre" value="Envoyer" style=" display:none;">
</span>
</div>
</form>