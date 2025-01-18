<?php
session_start();
// carichiamo il file XML contenente le prenotazioni
$xmlFile = '../xml/prenotazioni.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
}else{
    echo "Nessuna prenotazione trovata.";
    exit;
}

// verifichiamo che l'utente sia loggato
if (!isset($_SESSION['username'])) {
    header("Location: err.php");
    exit();
}

$currentUser = $_SESSION['username'];

// gestiamo il caso in cui l'utente ha eliminato una (o più) prenotazione (prenotazioni)
if (isset($_POST['elimina'])) {
    $indiceDaRimuovere = (int) $_POST['indice'];    
    
    // verifichiamo che la prenotazione appartenga all'utente corrente
    if ($xml->singolaPrenotazione[$indiceDaRimuovere]->username == $currentUser) {
        $dom = dom_import_simplexml($xml->singolaPrenotazione[$indiceDaRimuovere]);
        $dom->parentNode->removeChild($dom);
        $xml->asXML($xmlFile);
    }
    
    header('Location: prenotazioniPosto.php');
    exit;
}
?>

<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en"></html>
<head>
    <title>Prenotazioni Effettuate</title>

    <style>
         body{
            background-color: silver;
        }
        td {
            text-align: center;
        }
        form {
            display: inline;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center; font-size: 160%; color: red;">Visualizza prenotazioni</h1>

    <table border="1" cellspacing="3" style="justify-content: center; margin: auto; margin-top: 3%;">
        <tbody>
            <tr style="background-color: yellow; font-size: 120%;">
                <td style="color: red;">Data Prenotazione</td>
                <td style="color: red;">Username</td>
                <td style="color: red;">Tribuna</td>
                <td style="color: red;">Numero Posto</td>
                <td style="color: red;">Costo Posto</td>
                <td style="color: red;">Azioni</td>
            </tr>

            <?php
            // mostra solo le prenotazioni dell'utente corrente (quello loggato)
            $indice = 0;
            $userIndex = 0; // indice specifico per le prenotazioni dell'utente
            foreach ($xml->singolaPrenotazione as $prenotazione) {
                if ($prenotazione->username == $currentUser) {
                    echo "<tr style=\"background-color: pink\";>";
                    echo "<td style=\"color: blue;  font-size: 120%;\">" . $prenotazione->dataPrenotazione . "</td>";
                    echo "<td style=\"font-size: 120%;\">" . $prenotazione->username . "</td>";
                    echo "<td style=\"font-size: 120%;\">" . $prenotazione->tribuna->nome . "</td>";
                    echo "<td style=\"font-size: 120%;\">" . $prenotazione->tribuna->numeroPosto . "</td>";
                    echo "<td style=\"font-size: 120%;\">" . $prenotazione->tribuna->costoPosto . "</td>";
                    echo "<td>
                            <form method='post' action=''>
                                <input type='hidden' name='indice' value='$indice'>
                                <button type='submit' name='elimina' style='color: red;'>Elimina</button>
                            </form>
                          </td>";
                    echo "</tr>";
                    $userIndex++;
                }
                $indice++;
            }
            
            if ($userIndex == 0) {  // l'utente loggato non ha ancora effettuato prenotazioni di posti
                echo "<tr><td colspan='6' style='text-align: center; padding: 20px;'>Non hai ancora effettuato prenotazioni</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <h1 style="text-align: center; margin-top: 7%;"><a href="prenotaPosto.php" style="text-decoration: none; color: orangee; font-size: 130%;">Aggiungi un'altra prenotazione</a></h1>
    <h1 style="font-size: 120%; text-align: center;">oppure</h1>
    <h1 style="text-align: center;"><a href="paginaPersonale.php" style="text-align: center; text-decoration: none; color: green;">Torna nella tua area riservata</a></h1>
</body>
</html>
