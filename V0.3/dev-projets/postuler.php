<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<title>Profil</title>
<?
include('../scriptes.php');
?>

<script type="text/javascript">
$(document).ready(function(){

$('#faire-offre').click(function(e) {
    e.preventDefault();
    $('#monOffre').reveal;
});

});
</script>
</head>
<body id="sky">

<?


include('offre.php');
echo '<div><a id="faire-offre" href="#" class="btn green" data-reveal-id="monOffre" data-animation="fade" style="text-decoration:none;float:right;">Faire une offre</a></div>';



?>


</body>
</html>