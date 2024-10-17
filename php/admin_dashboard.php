<?php
session_start();

// Verifica se l'utente è loggato e se è un admin
if (!isset($_SESSION['username']) || $_SESSION['ruolo'] !== 'admin') {
    // Se non è un admin, reindirizza al login
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Benvenuto nella Dashboard Admin</h1>
    <p>Qui puoi gestire le richieste di crediti, le FAQ, ecc.</p>
</body>
</html>