<?php 
session_start();
unset($_SESSION);
session_destroy();

setcookie('accesso', '');
?>

<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">

<head>
    <title>Logout</title>
</head>

<body style="background-color: darksalmon; font-family:Verdana, Geneva, Tahoma, sans-serif" >

<h2 style="text-align: center;">Hai fatto il logout dalla pagina.</h2>
<p style="font-size: 130%; text-align: center;">Se lo hai fatto per errore e vuoi tornare nella pagina fai di nuovo il <a href="loginn.php">login</a>.</p>
<p style="font-size: 130%; text-align: center;">Altrimenti torna alla il <a href="../../../terzoHomework.php">Home</a>.</p>

<h1 style="margin-top: 10%; font-size: 350%; text-align: center;">Grazie della visita. A presto!</h1>


</body>
</html>