<?php
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

// -------
// �TAPE 1 : on v�rifie si l'IP se trouve d�j� dans la table.
// Pour faire �a, on n'a qu'� compter le nombre d'entr�es dont le champ "ip" est l'adresse IP du visiteur.
$retour = mysql_query('SELECT COUNT(*) AS nbre_entrees FROM CONNECTES WHERE IP=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
$donnees = mysql_fetch_array($retour);

if ($donnees['nbre_entrees'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
{
    mysql_query('INSERT INTO CONNECTES VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
}
else // L'IP se trouve d�j� dans la table, on met juste � jour le timestamp.
{
    mysql_query('UPDATE CONNECTES SET TIMESTAMP=' . time() . ' WHERE IP=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
}

// -------
// �TAPE 2 : on supprime toutes les entr�es dont le timestamp est plus vieux que 5 minutes.

// On stocke dans une variable le timestamp qu'il �tait il y a 5 minutes :
$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes �coul�es en 5 minutes
mysql_query('DELETE FROM CONNECTES WHERE TIMESTAMP < ' . $timestamp_5min);

// -------
// �TAPE 3 : on compte le nombre d'IP stock�es dans la table. C'est le nombre de visiteurs connect�s.
$retour = mysql_query('SELECT COUNT(*) AS nbre_entrees FROM CONNECTES');
$donnees = mysql_fetch_array($retour);

$connectes = $donnees['nbre_entrees'];
// Ouf ! On n'a plus qu'� afficher le nombre de connect�s !
// echo '<p>Il y a actuellement ' . $donnees['nbre_entrees'] . ' visiteurs connect�s sur mon site !</p>';
?>