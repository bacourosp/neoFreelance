<?php
/*
	Atom Extractor and Displayer
	(c) 2007  Scriptol.com - Licence Mozilla 1.1.
	atomlib.php
	
	Requirements:
	- PHP 5.
	- A RSS feed.
	
	Using the library:
	Insert this code into the page that displays the RSS feed:
	
	<?php
	require_once("atomlib.php");
	echo Atom_Display("http://www.xul.fr/atom.xml", 25);
	?>
	
*/

$Atom_Content = array();

function Atom_Tags($item, $type)
{
		$y = array();
		$tnl = $item->getElementsByTagName("title");
		$tnl = $tnl->item(0);
		$title = $tnl->firstChild->textContent;

		$tnl = $item->getElementsByTagName("link");
		$tnl = $tnl->item(0);		
		$link = $tnl->getAttribute("href");

		$tnl = $item->getElementsByTagName("summary");
		$tnl = $tnl->item(0);
		$description = $tnl->firstChild->textContent;

		$y["title"] = $title;
		$y["link"] = $link;
		$y["description"] = $description;
		$y["type"] = $type;
		
		return $y;
}


function Atom_Feed($doc)
{
	global $Atom_Content;

	$entries = $doc->getElementsByTagName("entry");
	
	// Processing feed
	
	$y = array();
	$tnl = $doc->getElementsByTagName("title");
	$tnl = $tnl->item(0);
	$title = $tnl->firstChild->textContent;

	$tnl = $doc->getElementsByTagName("link");
	$tnl = $tnl->item(0);	
	$link = $tnl->getAttribute("href");

	$tnl = $doc->getElementsByTagName("subtitle");
	$tnl = $tnl->item(0);
	$description = $tnl->firstChild->textContent;

	$y["title"] = $title;
	$y["link"] = $link;
	$y["description"] = $description;
	$y["type"] = 0;

	array_push($Atom_Content, $y);
	
	// Processing articles
	
	foreach($entries as $entry)
	{
		$y = Atom_Tags($entry, 1);		// get description of article, type 1
		array_push($Atom_Content, $y);
	}
}


function Atom_Retrieve($url)
{
	global $Atom_Content;

	$doc  = new DOMDocument();
	$doc->load($url);

	$Atom_Content = array();
	
	Atom_Feed($doc);
	
}


function Atom_RetrieveLinks($url)
{
	global $Atom_Content;

	$doc  = new DOMDocument();
	$doc->load($url);

	$entries = $doc->getElementsByTagName("entry");
	
	$Atom_Content = array();
	
	foreach($entries as $entry)
	{
		$y = Atom_Tags($entry, 1);	// get description of article, type 1
		array_push($Atom_Content, $y);
	}

}


function Atom_Links($url, $size = 15, $site = 0)
{
	global $Atom_Content;

	$page = "";
	$site = (intval($site) == 0) ? 1 : 0;

	Atom_RetrieveLinks($url);
	if($size > 0)
		$recents = array_slice($Atom_Content, $site, $size);

	foreach($recents as $article)
	{
		$type = $article["type"];
		if($type == 0) continue;
		$title = $article["title"];
		$link = $article["link"];
		$page .= "<li><a href=\"$link\">$title</a></li>\n";			
	}

	$page .="</ul>\n";

	return $page;
	
}



function Atom_Display($url, $size = 15, $site = 0)
{
	global $Atom_Content;

	$opened = false;
	$page = "";
	$site = (intval($site) == 0) ? 1 : 0;

	Atom_Retrieve($url);
	if($size > 0)
		$recents = array_slice($Atom_Content, $site, $size);

	foreach($recents as $article)
	{
		$type = $article["type"];
		if($type == 0)
		{
			if($opened == true)
			{
				$page .="</ul>\n";
				$opened = false;
			}
			$page .="<b>";
		}
		else
		{
			if($opened == false) 
			{
				$page .= "<ul>\n";
				$opened = true;
			}
		}
		$title = $article["title"];
		$link = $article["link"];
		$description = $article["description"];
		$page .= "<li><a href=\"$link\">$title</a>";
		if($description != false)
		{
			$page .= "<br>$description";
		}
		$page .= "</li>\n";			
		
		if($type==0)
		{
			$page .="</b><br />";
		}

	}

	if($opened == true)
	{	
		$page .="</ul>\n";
	}

	return $page."\n";
	
}


?>