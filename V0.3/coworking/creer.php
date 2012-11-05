<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name='sortie' enctype="multipart/form-data" action='sortie_action_create.php' method='post'>

<input type="hidden" name="Modele" id="Modele" value="">
<input type="hidden" name="Brouillon" id="Brouillon" value="0">
<input type="hidden" name="VideoModele" id="VideoModele" value="">
<input type="hidden" name="AgeOrga" id="AgeOrga" value="1975">

<div class=Pad1Color2>
<table width=100% border=0 cellpadding="2" cellspacing="3">
	<tr class=Pad2Color1>
		<td width=50%><B>Photo ou vidéo de la sortie (facultatif)</td>
		<td width=50%><B>Organisateur</B></td>		
	</tr>
	<tr>
		<TD ROWSPAN=3 VALIGN="top">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			<INPUT TYPE="radio" NAME="PhotoVideo" id="Photo" value="Photo" >
			<input  type="file" name="file_name" onclick="document.getElementById('Photo').checked=true;" size="15"><BR>
			<BR>
			<INPUT TYPE="radio" NAME="PhotoVideo" id="Video" value="Video" > Code vidéo <a onmouseover="Tip('<B>Comment insérer une vidéo ?</B><BR><BR>1) Rends toi sur le site <B>dailymotion.fr</B> ou <B>youtube.fr</B><BR> 2) Ouvre la page de la vidéo qui t\'intéresse<BR>3) Sur cette page, trouve la case <B><font class=ColorRed>INTEGRER</font></B> ou <B><font class=ColorRed>CODE EMBED</font></B><BR>4) Copie le contenu de cette case (Ctrl+C)<BR>5) Colle-le (Ctrl+V) dans notre case <B>Lien vidéo</B><BR><BR>');"><img border=0 src='help.gif'></a> :			
			<INPUT NAME="Dailymotion" SIZE=15 onclick="document.getElementById('Video').checked=true;">
		</td>
		<td>
		<span class=><a onmouseover="Tip('<table width=170><tr><td align=center><img border=0 src=\'http://photos.onvasortir.com/roanne/photos/Nazim_resize.jpg\'><BR><B><font color=#0056C0>Naze</font></B> <img border=0 src=\'etoile_bronze.gif\' > <BR><B>Actuellement en ligne</B><BR>36 ans<BR>Intramuros</td></tr></table>')" href='profil_read.php?Nazim'><B><font color=#0056C0>Nazim</font></B></a></span>		</td>	
	</tr>
	<tr class=Pad2Color1>
		<td width=50%><B>Téléphone portable</B></td>		
	</tr>
	<tr>
		<td>
			<INPUT NAME="Tel" CLASS="boites_input" SIZE=20 MAXLENGTH=20>		
			&nbsp;<a onmouseover="Tip('<table width=300><tr><td align=justify>Ton numéro de téléphone sera <B>automatiquement</B> supprimé de la sortie 5 jours après que celle-ci ait eu lieu.</td></tr></table>');"><img border=0 src='help.gif'></a>				
		</td>		
	</tr>	

	<tr class=Pad2Color1>	
		<td colspan=2><B>Cette sortie est ouverte :</B></td>
	</tr>
	<tr>
		<TD colspan=2>

			<table class=nomarge width=100% cellpadding=0 cellspacing=0>
				<tr>
					<TD WIDTH="50%" VALIGN="top">
						<INPUT TYPE="radio" ID="OuverteTous" NAME="Ouverte" VALUE="tous" onclick="if (document.getElementById('Invitations').checked==true) document.getElementById('InvitationsQui').disabled=false;" CHECKED><B>À tous</B>
					</td>
					<TD VALIGN="top">
						<INPUT TYPE="radio" NAME="Ouverte" VALUE="amis" ONCLICK="document.getElementById('InvitationsQui').disabled=true;document.getElementById('InvitationsQui').value='amis_actifs';">À ma liste d'amis					</td>
				</tr>
				<tr>
					<TD VALIGN="bottom">
						( sauf à ma liste d'indésirables )					</td>
					<td>
						( sauf les amis que j'ai mis 'en veille' )						&nbsp;<a onmouseover="Tip('<table width=300><tr><td align=justify>Tu as la possibilité de placer certains de tes amis \'en veille\' afin qu\'ils ne voient pas les sorties que tu organises. Ceci se gère dans ta liste d\'amis.</td></tr></table>');"><img border=0 src='help.gif'></a>
					</td>
				</tr>
							</table>

		</td>
	</tr>
	
	<tr class=Pad2Color1>	
		<td colspan=2><B>Intitulé et type d'activité de la sortie</B></td>
	</tr>
	<tr>
		<td colspan=2>
			<SELECT NAME="TypeSortie">
  				<OPTION  SELECTED  VALUE="">
  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_boire.gif) no-repeat;padding-left:20px;"  VALUE="Boire">Boire un verre  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_repas.gif) no-repeat;padding-left:20px;"  VALUE="Repas">Repas  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_danser.gif) no-repeat;padding-left:20px;"  VALUE="Danser">Danser					
  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_sport.gif) no-repeat;padding-left:20px;"  VALUE="Sport">Sport  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_jouer.gif) no-repeat;padding-left:20px;"  VALUE="Jouer">Jouer  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_spectacle.gif) no-repeat;padding-left:20px;"  VALUE="Spectacle">Spectacle vivant  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_film.gif) no-repeat;padding-left:20px;"  VALUE="Film">Film  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_culture.gif) no-repeat;padding-left:20px;"  VALUE="Culture">Culture  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_detente.gif) no-repeat;padding-left:20px;"  VALUE="Detente">Détente  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_musique.gif) no-repeat;padding-left:20px;"  VALUE="Musique">Musique  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_dehors.gif) no-repeat;padding-left:20px;" VALUE="Dehors">Plein air  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_decouverte.gif) no-repeat;padding-left:20px;" VALUE="Decouverte">Découverte  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_entraide.gif) no-repeat;padding-left:20px;" VALUE="Entraide">Entraide  				<OPTION style="margin-left:2px;height:18px; background:url(sortie_sejour.gif) no-repeat;padding-left:20px;" VALUE="Sejour">Séjour			</select>
			&nbsp;&nbsp;
			<INPUT NAME="Intitule" CLASS="boites_input" value="" SIZE=60 MAXLENGTH=35>
		</td>
	</tr>	
	
	<tr class=Pad2Color1>	
		<td colspan=2><B>Thématiques de la sortie</B></td>
	</tr>
	<tr>
		<td>
			<SELECT class="boites_input" NAME="SortieTheme1">
				<OPTGROUP><OPTION VALUE=''></OPTGROUP>
				<OPTGROUP LABEL="Vie / Quotidien"><OPTION VALUE="3">Etudiant<OPTION VALUE="4">Gay-friendly<OPTION VALUE="12">J'ai des rondeurs<OPTION VALUE="13">Allergie - Handicap<OPTION VALUE="14">Générosité - Altruisme<OPTION VALUE="11">Famille - Enfants</OPTGROUP><OPTGROUP LABEL="Profession"><OPTION VALUE="15">Informatique<OPTION VALUE="5">Enseignement<OPTION VALUE="6">Milieu du droit<OPTION VALUE="201">Milieu de la santé<OPTION VALUE="16">Milieu artistique<OPTION VALUE="231">Milieu financier<OPTION VALUE="17">Je suis mon patron<OPTION VALUE="18">Je ne travaille pas</OPTGROUP><OPTGROUP LABEL="Mode de vie / Idéologie"><OPTION VALUE="21">Végétarien<OPTION VALUE="8">Ecologie - Bio<OPTION VALUE="221">Luxe<OPTION VALUE="22">Gothique<OPTION VALUE="23">Moto<OPTION VALUE="132">Collectionneur</OPTGROUP><OPTGROUP LABEL="Animaux"><OPTION VALUE="10">J'ai un chat<OPTION VALUE="19">J'ai un chien<OPTION VALUE="20">Passion cheval<OPTION VALUE="131">Aquariophilie</OPTGROUP><OPTGROUP LABEL="Langue"><OPTION VALUE="134">Je parle français<OPTION VALUE="25">Je parle anglais<OPTION VALUE="27">Je parle espagnol<OPTION VALUE="26">Je parle allemand<OPTION VALUE="191">Je parle portugais<OPTION VALUE="130">Je parle italien</OPTGROUP><OPTGROUP LABEL="Technologie"><OPTION VALUE="211">J'ai un iPhone<OPTION VALUE="29">Je suis Mac<OPTION VALUE="141">J'ai un Blog<OPTION VALUE="30">Linux - Open source</OPTGROUP><OPTGROUP LABEL="Activités physiques"><OPTION VALUE="83">Nager<OPTION VALUE="84">Marche - Balade<OPTION VALUE="85">Roller<OPTION VALUE="86">Danses latino<OPTION VALUE="87">Danser le rock</OPTGROUP><OPTGROUP LABEL="Activités artistiques"><OPTION VALUE="77">Chanter<OPTION VALUE="123">Ecriture - Poésie - Slam<OPTION VALUE="79">Peinture - Dessin<OPTION VALUE="78">Photo<OPTION VALUE="125">Je joue d'un instrument<OPTION VALUE="81">Arts créatifs<OPTION VALUE="80">Couture - Broderie</OPTGROUP><OPTGROUP LABEL="Activités culinaires"><OPTION VALUE="96">Je cuisine<OPTION VALUE="97">Pique-nique<OPTION VALUE="98">Brunchs<OPTION VALUE="135">Amateur de café<OPTION VALUE="99">Amateur de thé<OPTION VALUE="100">Amateur de vin<OPTION VALUE="101">Amateur de bière</OPTGROUP><OPTGROUP LABEL="Culture"><OPTION VALUE="70">Littérature<OPTION VALUE="71">Art moderne<OPTION VALUE="69">Cinéma d'art & essai<OPTION VALUE="72">Ballet - Opéra<OPTION VALUE="74">Musique classique<OPTION VALUE="73">Jazz<OPTION VALUE="75">Musées - Expositions</OPTGROUP><OPTGROUP LABEL="Réflexion"><OPTION VALUE="151">Sciences<OPTION VALUE="89">Philo - Psycho - Socio<OPTION VALUE="92">Politique<OPTION VALUE="91">Religion<OPTION VALUE="241">Histoire - Archéologie<OPTION VALUE="93">Paranormal - Magie<OPTION VALUE="94">Enigmes - Quizz - Rally</OPTGROUP><OPTGROUP LABEL="Divertissement / infos"><OPTION VALUE="113">Radio - Journaux<OPTION VALUE="112">Télévision<OPTION VALUE="114">Séries TV - Manga<OPTION VALUE="115">Shopping</OPTGROUP><OPTGROUP LABEL="J'aime la culture/cuisine"><OPTION VALUE="32">Française<OPTION VALUE="35">Arabe<OPTION VALUE="37">Juive<OPTION VALUE="124">Anglo-saxonne<OPTION VALUE="40">Asiatique<OPTION VALUE="39">Turque - Arménienne<OPTION VALUE="43">Africaine<OPTION VALUE="41">Sud-américaine<OPTION VALUE="42">Belge<OPTION VALUE="36">Portugaise<OPTION VALUE="45">Italienne<OPTION VALUE="127">Russe</OPTGROUP><OPTGROUP LABEL="Sport"><OPTION VALUE="63">Randonnées<OPTION VALUE="59">Courir<OPTION VALUE="64">Vélo - VTT<OPTION VALUE="60">Escalade<OPTION VALUE="56">Ping-pong<OPTION VALUE="58">Tennis<OPTION VALUE="57">Badminton - Squash<OPTION VALUE="62">Pétanque<OPTION VALUE="67">Arts martiaux<OPTION VALUE="66">Plongée<OPTION VALUE="61">Football<OPTION VALUE="65">Rugby - Touch rugby<OPTION VALUE="129">Volley - Basket<OPTION VALUE="128">Sports nautiques<OPTION VALUE="133">Golf<OPTION VALUE="171">Sports de glisse</OPTGROUP><OPTGROUP LABEL="Jeux"><OPTION VALUE="50">Jeux de cartes - Poker<OPTION VALUE="51">Jeux de rôles<OPTION VALUE="49">Jeux de société<OPTION VALUE="47">WII - Consoles de jeux<OPTION VALUE="52">Billard<OPTION VALUE="48">Bowling<OPTION VALUE="53">Jeux d'échecs - Dames</OPTGROUP><OPTGROUP LABEL="Nature"><OPTION VALUE="107">Jardinage - Plantes<OPTION VALUE="108">Zoo - Parcs animaliers<OPTION VALUE="109">Mer - Plage<OPTION VALUE="110">Montagne - Ski</OPTGROUP><OPTGROUP LABEL="Séjours"><OPTION VALUE="103">Partir en week-end<OPTION VALUE="104">Camping<OPTION VALUE="105">Partir à l'aventure</OPTGROUP><OPTGROUP LABEL="Evénements"><OPTION VALUE="121">Happening - Anniv'<OPTION VALUE="161">Concert<OPTION VALUE="117">Parcs d'attractions<OPTION VALUE="118">Châteaux - Monuments<OPTION VALUE="119">Foire - Salon<OPTION VALUE="120">Brocante - Vide-greniers</OPTGROUP>			</select>
		</td>

			<td>
			<SELECT class="boites_input" NAME="SortieTheme2">
				<OPTGROUP><OPTION VALUE=''></OPTGROUP>
				<OPTGROUP LABEL="Vie / Quotidien"><OPTION VALUE="3">Etudiant<OPTION VALUE="4">Gay-friendly<OPTION VALUE="12">J'ai des rondeurs<OPTION VALUE="13">Allergie - Handicap<OPTION VALUE="14">Générosité - Altruisme<OPTION VALUE="11">Famille - Enfants</OPTGROUP><OPTGROUP LABEL="Profession"><OPTION VALUE="15">Informatique<OPTION VALUE="5">Enseignement<OPTION VALUE="6">Milieu du droit<OPTION VALUE="201">Milieu de la santé<OPTION VALUE="16">Milieu artistique<OPTION VALUE="231">Milieu financier<OPTION VALUE="17">Je suis mon patron<OPTION VALUE="18">Je ne travaille pas</OPTGROUP><OPTGROUP LABEL="Mode de vie / Idéologie"><OPTION VALUE="21">Végétarien<OPTION VALUE="8">Ecologie - Bio<OPTION VALUE="221">Luxe<OPTION VALUE="22">Gothique<OPTION VALUE="23">Moto<OPTION VALUE="132">Collectionneur</OPTGROUP><OPTGROUP LABEL="Animaux"><OPTION VALUE="10">J'ai un chat<OPTION VALUE="19">J'ai un chien<OPTION VALUE="20">Passion cheval<OPTION VALUE="131">Aquariophilie</OPTGROUP><OPTGROUP LABEL="Langue"><OPTION VALUE="134">Je parle français<OPTION VALUE="25">Je parle anglais<OPTION VALUE="27">Je parle espagnol<OPTION VALUE="26">Je parle allemand<OPTION VALUE="191">Je parle portugais<OPTION VALUE="130">Je parle italien</OPTGROUP><OPTGROUP LABEL="Technologie"><OPTION VALUE="211">J'ai un iPhone<OPTION VALUE="29">Je suis Mac<OPTION VALUE="141">J'ai un Blog<OPTION VALUE="30">Linux - Open source</OPTGROUP><OPTGROUP LABEL="Activités physiques"><OPTION VALUE="83">Nager<OPTION VALUE="84">Marche - Balade<OPTION VALUE="85">Roller<OPTION VALUE="86">Danses latino<OPTION VALUE="87">Danser le rock</OPTGROUP><OPTGROUP LABEL="Activités artistiques"><OPTION VALUE="77">Chanter<OPTION VALUE="123">Ecriture - Poésie - Slam<OPTION VALUE="79">Peinture - Dessin<OPTION VALUE="78">Photo<OPTION VALUE="125">Je joue d'un instrument<OPTION VALUE="81">Arts créatifs<OPTION VALUE="80">Couture - Broderie</OPTGROUP><OPTGROUP LABEL="Activités culinaires"><OPTION VALUE="96">Je cuisine<OPTION VALUE="97">Pique-nique<OPTION VALUE="98">Brunchs<OPTION VALUE="135">Amateur de café<OPTION VALUE="99">Amateur de thé<OPTION VALUE="100">Amateur de vin<OPTION VALUE="101">Amateur de bière</OPTGROUP><OPTGROUP LABEL="Culture"><OPTION VALUE="70">Littérature<OPTION VALUE="71">Art moderne<OPTION VALUE="69">Cinéma d'art & essai<OPTION VALUE="72">Ballet - Opéra<OPTION VALUE="74">Musique classique<OPTION VALUE="73">Jazz<OPTION VALUE="75">Musées - Expositions</OPTGROUP><OPTGROUP LABEL="Réflexion"><OPTION VALUE="151">Sciences<OPTION VALUE="89">Philo - Psycho - Socio<OPTION VALUE="92">Politique<OPTION VALUE="91">Religion<OPTION VALUE="241">Histoire - Archéologie<OPTION VALUE="93">Paranormal - Magie<OPTION VALUE="94">Enigmes - Quizz - Rally</OPTGROUP><OPTGROUP LABEL="Divertissement / infos"><OPTION VALUE="113">Radio - Journaux<OPTION VALUE="112">Télévision<OPTION VALUE="114">Séries TV - Manga<OPTION VALUE="115">Shopping</OPTGROUP><OPTGROUP LABEL="J'aime la culture/cuisine"><OPTION VALUE="32">Française<OPTION VALUE="35">Arabe<OPTION VALUE="37">Juive<OPTION VALUE="124">Anglo-saxonne<OPTION VALUE="40">Asiatique<OPTION VALUE="39">Turque - Arménienne<OPTION VALUE="43">Africaine<OPTION VALUE="41">Sud-américaine<OPTION VALUE="42">Belge<OPTION VALUE="36">Portugaise<OPTION VALUE="45">Italienne<OPTION VALUE="127">Russe</OPTGROUP><OPTGROUP LABEL="Sport"><OPTION VALUE="63">Randonnées<OPTION VALUE="59">Courir<OPTION VALUE="64">Vélo - VTT<OPTION VALUE="60">Escalade<OPTION VALUE="56">Ping-pong<OPTION VALUE="58">Tennis<OPTION VALUE="57">Badminton - Squash<OPTION VALUE="62">Pétanque<OPTION VALUE="67">Arts martiaux<OPTION VALUE="66">Plongée<OPTION VALUE="61">Football<OPTION VALUE="65">Rugby - Touch rugby<OPTION VALUE="129">Volley - Basket<OPTION VALUE="128">Sports nautiques<OPTION VALUE="133">Golf<OPTION VALUE="171">Sports de glisse</OPTGROUP><OPTGROUP LABEL="Jeux"><OPTION VALUE="50">Jeux de cartes - Poker<OPTION VALUE="51">Jeux de rôles<OPTION VALUE="49">Jeux de société<OPTION VALUE="47">WII - Consoles de jeux<OPTION VALUE="52">Billard<OPTION VALUE="48">Bowling<OPTION VALUE="53">Jeux d'échecs - Dames</OPTGROUP><OPTGROUP LABEL="Nature"><OPTION VALUE="107">Jardinage - Plantes<OPTION VALUE="108">Zoo - Parcs animaliers<OPTION VALUE="109">Mer - Plage<OPTION VALUE="110">Montagne - Ski</OPTGROUP><OPTGROUP LABEL="Séjours"><OPTION VALUE="103">Partir en week-end<OPTION VALUE="104">Camping<OPTION VALUE="105">Partir à l'aventure</OPTGROUP><OPTGROUP LABEL="Evénements"><OPTION VALUE="121">Happening - Anniv'<OPTION VALUE="161">Concert<OPTION VALUE="117">Parcs d'attractions<OPTION VALUE="118">Châteaux - Monuments<OPTION VALUE="119">Foire - Salon<OPTION VALUE="120">Brocante - Vide-greniers</OPTGROUP>			</select>
		</td>
	</tr>	
	
	<tr class=Pad2Color1>	
		<td><B>Date de la sortie</B></td>
		<td><B>Heure de début</B></td>		
	</tr>
	<tr>
		<td rowspan=3 valign=top>
		<INPUT CLASS="boites_input" NAME="DateCal" ID="DateCal" SIZE=10 READONLY=0><BR><BR>
		<img id="f_trigger_c" border=0 src="_calendar/_calendar.png">&nbsp;<small><- Clique sur l'image</small>
	<script type="text/javascript">
    Calendar.setup({
        inputField     :    "DateCal",      // id of the input field
        ifFormat       :    "%d-%m-%Y",       // format of the input field
		daFormat       :    "%d-%m-%Y", 
        showsTime      :    false,            // will display a time selector
        button         :    "f_trigger_c",   // trigger for the calendar (button ID)
        singleClick    :    true,           // double-click mode
        step           :    1,                // show all years in drop-down boxes (instead of every other year as default)
		showOthers	   :	false
    });
	</script>
		</td>

		<td>
			<SELECT class="boites_input" NAME="Heure">
  				<OPTION VALUE="" SELECTED>
				<OPTION  VALUE=0>0<OPTION  VALUE=1>1<OPTION  VALUE=2>2<OPTION  VALUE=3>3<OPTION  VALUE=4>4<OPTION  VALUE=5>5<OPTION  VALUE=6>6<OPTION  VALUE=7>7<OPTION  VALUE=8>8<OPTION  VALUE=9>9<OPTION  VALUE=10>10<OPTION  VALUE=11>11<OPTION  VALUE=12>12<OPTION  VALUE=13>13<OPTION  VALUE=14>14<OPTION  VALUE=15>15<OPTION  VALUE=16>16<OPTION  VALUE=17>17<OPTION  VALUE=18>18<OPTION  VALUE=19>19<OPTION  VALUE=20>20<OPTION  VALUE=21>21<OPTION  VALUE=22>22<OPTION  VALUE=23>23		  	</SELECT>
			:
			<SELECT class="boites_input" NAME="Minute">
  				<OPTION  VALUE="00">00
  				<OPTION  VALUE="10">10				
  				<OPTION  VALUE="15">15
  				<OPTION  VALUE="20">20				
  				<OPTION  VALUE="30">30
  				<OPTION  VALUE="40">40				
  				<OPTION  VALUE="45">45
  				<OPTION  VALUE="50">50				
		  	</SELECT>
		td>
				
	</tr>

	<tr class=Pad2Color1>	
		<td><B>Inscriptions & désinscriptions jusqu'à :</B></td>		
	</tr>	
	<tr>
		<td>
			<SELECT class="boites_input" NAME="Delai">
  				<OPTION VALUE="0" SELECTED>L'heure de la sortie  				<OPTION VALUE="1">Heure - 1
  				<OPTION VALUE="2">Heure - 2
  				<OPTION VALUE="3">Heure - 3
  				<OPTION VALUE="4">Heure - 4				
  				<OPTION VALUE="6">Heure - 6				
  				<OPTION VALUE="12">Heure - 12				
  				<OPTION VALUE="24">Heure - 24
		  	</SELECT>		
			&nbsp;<a onmouseover="Tip('<table width=300><tr><td align=justify><B>Attention :</B> utilise cette option à bon escient.<BR><BR>Ne bloque pas une sortie à H-24 si cela n\'a aucune utilité réelle : un membre qui ne peut/veut plus venir ne <B>viendra pas</B> à ta sortie <B>même</B> si tu l\'as bloquée. Ceci est d\'autant plus dommage pour toi qu\'il ne pourra pas être remplacé par un membre de la liste d\'attente à cause du blocage.</td></tr></table>');"><img border=0 src='help.gif'></a>				
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	
	<tr class=Pad2Color1>
		<td colspan=2><B>Descriptif de la sortie <font color=#FFC0B0>(PAS de copier/coller de Word ou du web !)</font></B></td>
	</tr>
	<tr><td colspan=2><table class=nomarge><tr>
		<td style="padding-right:30px;">
			<input class=nomarge name="SortieGratuite" id="SortieGratuite" type="checkbox" > Sortie gratuite		
			<a onmouseover="Tip('<table width=300><tr><td align=justify>Par \'Sortie gratuite\', nous entendons <B>sortie ne nécessitant pas de débourser d\'argent une fois sur place</B>. Exemple: balade, pique-nique. Contre-exemple: cinéma, restaurant.</td></tr></table>');"><img border=0 src='help.gif'></a>
		</td>
		<td style="padding-right:30px;">
			<input class=nomarge name="SortieEnfants" id="SortieEnfants" type="checkbox" > Sortie avec enfants		
			<a onmouseover="Tip('<table width=300><tr><td align=justify>Par \'Sortie avec enfants\', nous entendons <B>sortie lancée dans le but de réunir parents et enfants</B> (il reste bien sûr possible de venir à cette sortie même sans enfant).</td></tr></table>');"><img border=0 src='help.gif'></a>
		</td>
		<td>
			<input class=nomarge name="SortieCouples" id="SortieCouples" type="checkbox" > Couples prioritaires		
			<a onmouseover="Tip('<table width=300><tr><td align=justify>Par \'Couples prioritaires\', nous entendons que ces sorties ont principalement pour but <B>de permettre aux couples de rencontrer d\'autres couples</B>.</td></tr></table>');"><img border=0 src='help.gif'></a>
		</td>
	</tr></table></td></tr>
	<tr>
		<td colspan=2>
			<center><TEXTAREA id="Descriptif" name="Descriptif" ROWS=27 COLS=85></TEXTAREA></center>
		</td>
	</tr>

	<tr class=Pad2Color1>
		<td width=50%><B>Nombre de places maximum</B></td>
		<td width=50%><B>Inscription pour plusieurs possible?</B></td>
	</tr>
	<tr>
		<td>
			<SELECT class="boites_input" NAME="NbMaxi">
				<OPTION  VALUE=3>3<OPTION  VALUE=4>4<OPTION  VALUE=5>5<OPTION  VALUE=6>6<OPTION  VALUE=7>7<OPTION  VALUE=8>8<OPTION  VALUE=9>9<OPTION SELECTED VALUE=10>10<OPTION  VALUE=11>11<OPTION  VALUE=12>12<OPTION  VALUE=13>13<OPTION  VALUE=14>14<OPTION  VALUE=15>15<OPTION  VALUE=16>16<OPTION  VALUE=17>17<OPTION  VALUE=18>18<OPTION  VALUE=19>19<OPTION  VALUE=20>20			
		  	</SELECT>
<!--				<a onmouseover="Tip('<table width=300><tr><td align=justify>Si tu souhaites proposer un nombre de places supérieur à 20 pour une sortie :<BR><BR>- ce doit être exceptionnel<BR>- la sortie doit être gratuite<BR>- aucun objectif publicitaire ne doit se cacher derrière<BR><BR>Dans ce cas, après avoir enregistré ta sortie, visualise-la, clique sur le bouton \'Alerte Modérateurs\' et motive ta demande.<BR><B>Si aucune suite n\'est donnée dans les 48 heures, merci de ne pas insister.</B></td></tr></table>');"><img border=0 src='help.gif'></a>-->
		</td>
		<td>
			<B>Ex:</B> Pierre (+2)</I>			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<INPUT class="boites_input" TYPE="radio" NAME="Invites" VALUE="oui" CHECKED> Oui		  	<INPUT class="boites_input" TYPE="radio" NAME="Invites" VALUE="non"> Non		</td>
	</tr>

	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	
	<tr class=Pad2Color1>	
		<td colspan=2><B>Adresse exacte</B></td>
	</tr>
	<tr>
		<TD>
			<textarea style="width: 220px; height: 56px; min-height: 56px;" class="expanding" NAME="Adresse"></TEXTAREA>
		</td>
		<TD width=50% valign=top>
			<SELECT class="boites_input" NAME="Departement">
				<OPTGROUP><OPTION  VALUE=0></OPTGROUP><OPTGROUP LABEL='Roanne'><OPTION SELECTED VALUE=1>Intramuros<OPTION  VALUE=2>Proche Roanne</OPTGROUP><OPTGROUP LABEL='AUTRES LIEUX'><OPTION  VALUE=10>Le Coteau<OPTION  VALUE=11>Mably<OPTION  VALUE=12>Villerest<OPTION  VALUE=98>Loire<OPTION  VALUE=99>Hors	Loire</OPTGROUP>		  	</SELECT>
			<BR><BR>
			<I>(Ce champ permet de classer ta sortie)</I>
		</td>
		
	</tr>

	<tr class=Pad2Color1>	
		<td colspan=2><B>Lieu de rendez-vous précis pour se retrouver</B></td>
	</tr>
	<tr>
		<TD COLSPAN=2 align=center>
				<textarea style="width: 450px; height: 40px; min-height: 40px;" class="expanding" NAME="RDV"></textarea>
		</td>
	</tr>
	
</table>
</div>
<BR>

<div class=Pad1Color2>
<table width=100% border=0 cellpadding=0 cellspacing=0>
	<tr><td>
		<input value="" name="MailInscriptions" type="checkbox" CHECKED> M'avertir immédiatement par mail si quelqu'un <B>s'inscrit ou se désinscrit</B> de cette sortie.	</td></tr>
	<tr><td>
		<input value="" name="MailCommentaires" type="checkbox" CHECKED> M'avertir immédiatement par mail si quelqu'un <B>ajoute un commentaire</B> à cette sortie.	</td></tr>
</table>
</div>
<BR>
<SCRIPT LANGUAGE="JavaScript">
function isDateOK(j,m,a) 
{
	if (a%4 == 0 && a%100 !=0 || a%400 == 0) 
		fev = 29;
	else 
		fev = 28;

	nbJours = new Array(31,fev,31,30,31,30,31,31,30,31,30,31);

	if (j <= nbJours[m-1])
  		return true;
	else
  		return false;
}

navvers = navigator.appVersion.substring(0,1);
if (navvers > 3)
    navok = true;
else
    navok = false;

today = new Date;
jour = today.getDay();
numero = today.getDate();
if (numero<10)
    numero = "0"+numero;
mois = today.getMonth();
mois+=1;
if (mois<10)
    mois = "0"+mois;
if (navok)
    annee = today.getFullYear();
else
    annee = today.getYear();
if (annee<100)
    annee = "20"+annee;
Datenow = annee + "" + mois + "" + numero;
</SCRIPT>
<center>
<table width=100% border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td align="center" class=Pad1Color2>
			<input name="monbouton" type="button" value="Enregistrer et publier sur le site" onclick="
			if (document.forms.sortie.MailInscriptions.checked==true)
				document.forms.sortie.MailInscriptions.value='ok';
			else
				document.forms.sortie.MailInscriptions.value='';
			if (document.forms.sortie.MailCommentaires.checked==true)
				document.forms.sortie.MailCommentaires.value='ok';
			else
				document.forms.sortie.MailCommentaires.value='';
			var reg=new RegExp('(prend la liste)|(attente sera accep)|(attente peuvent)|(attente aussi)|(attente bien)|(attente est accep)|(attente accep)|(attente est la bien)|(attente attendu)|(attente est attendu)|(attente sont accep)|(attente sont attend)|(attente sont les bien)|(LA est la bien)|(L\.A\. est la)|(L\.A\. bienve)','gi');
if (screen.width>450){
			chaine1=tinyMCE.get('Descriptif').getContent();
			if (reg.test(chaine1)) {alert('Les sorties sont limitées en nombre d\'inscrits.\nIl est INTERDIT d\'outrepasser cette limite en demandant aux membres de la liste d\'attente de venir quand même !\nToute récidive sera sanctionnée.');return false;}
};
			var progtmp='progmois'+document.forms.sortie.DateCal.value.substr(3,2);
			DateCal2=document.forms.sortie.DateCal.value;
			document.forms.sortie.DateCal.value=DateCal2.substr(0,2)+'-'+DateCal2.substr(3,2)+'-'+DateCal2.substr(6,4);
			DateCal2=document.forms.sortie.DateCal.value; //normal qu'il faille le répéter!
			DateCal3=DateCal2.substr(6,4);
			DateCal3+=DateCal2.substr(3,2);
			DateCal3+=DateCal2.substr(0,2);
			if ( !isDateOK( DateCal2.substr(0,2), DateCal2.substr(3,2), DateCal2.substr(6,4) ) )
				alert('Merci de renseigner correctement la date de ta sortie !');
			else
			if (DateCal3<Datenow)
				alert('Attention, la date de ta sortie est dépassée !');
			else
			if (document.forms.sortie.Intitule.value=='') alert('Tu dois entrer l\'intitulé de ta sortie.\nExemple: Resto chinois, Matrix à l\'UGC, Pique-nique dans le parc untel, ...');
			else
			if (document.forms.sortie.TypeSortie.value=='') alert('Merci de renseigner le type d\'activité de ta sortie (Jouer, Danser, ...) !');
			else
			if (document.forms.sortie.DateCal.value=='') alert('Merci de renseigner correctement la date de ta sortie !');
			else
			if (document.forms.sortie.Heure.value=='') alert('Merci de renseigner l\'heure de ta sortie !');
			else
			if (document.forms.sortie.Adresse.value=='') alert('Merci d\'entrer l\'adresse où se situe la sortie !');
			else
			if (document.forms.sortie.Departement.value=='0') alert('Merci de choisir, dans le champ de classement de l\'adresse, le lieu où se situe la sortie !');
			else
			if (document.forms.sortie.RDV.value=='') alert('Merci d\'entrer le lieu de rendez-vous précis que tu fixes aux inscrits pour cette sortie.');
			else
			{
				document.forms.sortie.monbouton.disabled=true;
				document.getElementById('monboutonbrouillon').disabled=true;
				document.forms.sortie.monbouton.value='Merci de patienter...';	
				submit();
			};">
		</td>
		<td rowspan=2 valign=top align="center" width=50%>
			<input class="ColorRed" name="monboutonbrouillon" id="monboutonbrouillon" type="button" value="Enregistrer en brouillon" onclick="
			if (document.forms.sortie.MailInscriptions.checked==true)
				document.forms.sortie.MailInscriptions.value='ok';
			else
				document.forms.sortie.MailInscriptions.value='';
			if (document.forms.sortie.MailCommentaires.checked==true)
				document.forms.sortie.MailCommentaires.value='ok';
			else
				document.forms.sortie.MailCommentaires.value='';
			document.forms.sortie.monbouton.disabled=true;
			document.getElementById('monboutonbrouillon').disabled=true;
			document.getElementById('monboutonbrouillon').value='Merci de patienter...';
			document.getElementById('Brouillon').value='1';
			submit();
			"> <a onmouseover="Tip('<table width=300><tr><td align=justify>Enregistrer une sortie en brouillon permet de la sauvegarder rapidement sans devoir remplir ses champs obligatoires.<br><br>La sortie n\'est alors visible que par son créateur, et tu peux la retrouver dans l\'onglet <b>J\'organise</b>.</td></tr></table>');"><img border=0 src='help.gif'></a>
		</td>
	</tr>
	<tr>
		<td align="center" class=Pad1Color2>
		<br><input  class="nomarge" name="Invitations" id="Invitations" type="checkbox" onclick="
		if (document.getElementById('Invitations').checked==true)
			{
			document.getElementById('InvitationsMsg').disabled=false;
			if (document.getElementById('OuverteTous').checked==true)
				document.getElementById('InvitationsQui').disabled=false;
			}
		else
			{
			document.getElementById('InvitationsMsg').disabled=true;
			document.getElementById('InvitationsQui').disabled=true;
			}	
		"> A l'enregistrement, envoyer une invitation à :<br><br>
		<select class="nomarge" name="InvitationsQui" id="InvitationsQui" disabled>
			<option value="amis_all">Tous mes amis  		<option value="amis_actifs">Tous mes amis (sauf ceux que j'ai mis 'en veille')					</select><br><br>
		Message :<br>
		<textarea style="width:220px;height:50px;min-height:50px;" class="expanding" id="InvitationsMsg" name="InvitationsMsg" disabled>Bonjour,

Je lance cette nouvelle sortie et cela me ferait plaisir de t'y voir.

A bientôt !</textarea>
		</td>
	</tr>
</table>
</center>
</form>

</body>
</html>
