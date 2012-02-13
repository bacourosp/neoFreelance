<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Prendre un abonnement</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?

switch($_GET['plan']){ 

case 'private' : print ("<script language = \"JavaScript\">"); 
                 print ("location.href = 'don.php';"); 
                 print ("</script>");
case 'micro' : print ("<script language = \"JavaScript\">"); 
                 print ("location.href = 'don.php';"); 
                 print ("</script>");
case 'compact' : print ("<script language = \"JavaScript\">"); 
                 print ("location.href = 'don.php';"); 
                 print ("</script>");
case 'corporate' : print ("<script language = \"JavaScript\">"); 
                 print ("location.href = 'don.php';"); 
                 print ("</script>");
case 'entreprise' : print ("<script language = \"JavaScript\">"); 
                 print ("location.href = 'don.php';"); 
                 print ("</script>");

}

?>
</body>
</html>
