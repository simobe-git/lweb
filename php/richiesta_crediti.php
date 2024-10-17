<?php       //cliente
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'cliente') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crediti = $_POST['crediti'];

    $richiesteFile = simplexml_load_file("../xml/richieste_crediti.xml");
    $nuovaRichiesta = $richiesteFile->addChild('richiesta');
    $nuovaRichiesta->addChild('username', $_SESSION['username']);
    $nuovaRichiesta->addChild('crediti', $crediti);
    $nuovaRichiesta->addChild('status', 'in attesa');
    $richiesteFile->asXML("../xml/richieste_crediti.xml");

    echo "Richiesta inviata!";
}
?>

<form method="POST">
    <label for="crediti">Numero di crediti richiesti:</label>
    <input type="number" id="crediti" name="crediti" required><br>
    <button type="submit">Invia Richiesta</button>
</form>
