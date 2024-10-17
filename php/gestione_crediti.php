<?php
session_start();

// Verifica se l'utente è admin
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    header("Location: login.php");
    exit();
}

// Carica il file XML delle richieste di crediti
$xml_file = "../xml/richieste_crediti.xml";
$richieste_xml = simplexml_load_file($xml_file);

// Funzione per aggiornare lo stato della richiesta
function aggiorna_stato_richiesta($username, $nuovo_stato) {
    global $richieste_xml, $xml_file;
    
    // Cerca la richiesta corrispondente all'utente
    foreach ($richieste_xml->richiesta as $richiesta) {
        if ($richiesta->username == $username && $richiesta->status == 'in attesa') {
            $richiesta->status = $nuovo_stato;
            // Salva l'aggiornamento nel file XML
            $richieste_xml->asXML($xml_file);
            return true;
        }
    }
    return false;
}

// Controlla se l'admin ha approvato o rifiutato una richiesta
if (isset($_POST['azione']) && isset($_POST['username'])) {
    $azione = $_POST['azione'];
    $username = $_POST['username'];

    if ($azione == 'approva') {
        aggiorna_stato_richiesta($username, 'approvata');
    } elseif ($azione == 'rifiuta') {
        aggiorna_stato_richiesta($username, 'rifiutata');
    }
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Richieste Crediti</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Gestione Richieste di Crediti</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Username</th>
                <th>Crediti Richiesti</th>
                <th>Data Richiesta</th>
                <th>Status</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($richieste_xml->richiesta as $richiesta): ?>
                <?php if ($richiesta->status == 'in attesa'): // Mostra solo richieste in attesa ?>
                    <tr>
                        <td><?php echo $richiesta->username; ?></td>
                        <td><?php echo $richiesta->crediti; ?></td>
                        <td><?php echo $richiesta->data; ?></td>
                        <td><?php echo $richiesta->status; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="username" value="<?php echo $richiesta->username; ?>">
                                <button type="submit" name="azione" value="approva">Approva</button>
                                <button type="submit" name="azione" value="rifiuta">Rifiuta</button>
                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="admin_dashboard.php">Torna alla Dashboard</a>
</body>
</html>
