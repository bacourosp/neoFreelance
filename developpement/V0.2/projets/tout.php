<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<title>Tout les projets contenant une compètence particulière</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?
include('../scriptes.php');
?>

</head>

<body id="sky">
<?
include('../menu.php');
?>
<div class="content">
</br>
<div id="consultprojectContainer">

<?
include('competences.php');
?>

</br>

<h1>Tout les Projets</h1>

</div>
<?
include('explore-tout.php');
?>
</div>
</body>
</html>