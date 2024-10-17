<?php /*
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  //??????????
    $recensione = $_POST['recensione'];
    $gioco = $_POST['gioco'];

    $recensioni = simplexml_load_file("../xml/recensioni.xml");
    $nuova_recensione = $recensioni->addChild('recensione');
    $nuova_recensione->addChild('utente', $_SESSION['username']);
    $nuova_recensione->addChild('gioco', $gioco);
    $nuova_recensione->addChild('testo', $recensione);
    $recensioni->asXML("../xml/recensioni.xml");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Lascia una recensione</h1>
    </header>

    <main>
        <form method="POST">
            <label for="gioco">Gioco:</label>
            <input type="text" id="gioco" name="gioco" required>
            
            <label for="recensione">Recensione:</label>
            <textarea id="recensione" name="recensione" required></textarea>

            <button type="submit">Invia</button>
        </form>
    </main>
</body>
</html>
