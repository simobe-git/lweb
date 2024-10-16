<?php
//carichiamo il file XML contenente le prenotazioni
$xmlFile = '../xml/prenotazioni.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
}else{
    echo "Nessuna prenotazione trovata.";
    exit;
}

//gestiamo il caso in cui l'utente ha eliminato una (o più) prenotazione (prenotazioni)
if (isset($_POST['elimina'])) {
    $indiceDaRimuovere = (int) $_POST['indice'];    //ottieniamo l'indice della prenotazione da eliminare

    //procediamo con l'eliminazione della prenotazione dall'XML
    $dom = dom_import_simplexml($xml->singolaPrenotazione[$indiceDaRimuovere]);
    $dom->parentNode->removeChild($dom);

    //salviamo l'XML aggiornato dalle prenotazioni eliminate
    $xml->asXML($xmlFile);

    //aggiorniamo la pagina
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
                <td style="color: red;">Tribuna</td>
                <td style="color: red;">Numero Posto</td>
                <td style="color: red;">Costo Posto</td>
                <td style="color: red;">Azioni</td>
            </tr>

            <?php
            //mostra ogni prenotazione in una riga della tabella
            $indice = 0;
            foreach ($xml->singolaPrenotazione as $prenotazione) {        //stampiamo in tabella i dati
                echo "<tr style=\"background-color: pink\";>";
                echo "<td style=\"color: blue;  font-size: 120%;\">" . $prenotazione->dataPrenotazione . "</td>";
                echo "<td style=\"font-size: 120%;\">" . $prenotazione->tribuna->nome . "</td>";
                echo "<td style=\"font-size: 120%;\">" . $prenotazione->tribuna->numeroPosto . "</td>";
                echo "<td style=\"font-size: 120%;\">" . $prenotazione->tribuna->costoPosto . "</td>";
                //creazione del pulsante per eliminare la prenotazione
                echo "<td>
                        <form method='post' action=''>
                            <input type='hidden' name='indice' value='$indice'>
                            <button type='submit' name='elimina' style='color: red;'>Elimina</button>
                        </form>
                      </td>";
                echo "</tr>";
                $indice++;      //indice progressivo che si aggiorna per ogni record presente, che stiamo stampando in questo foreach
            }
            ?>
        </tbody>
    </table>

    <br>
    <h1 style="text-align: center; margin-top: 7%;"><a href="prenotaPosto.php" style="text-decoration: none; color: orangee; font-size: 130%;">Aggiungi un'altra prenotazione</a></h1>
    <h1 style="font-size: 120%; text-align: center;">oppure</h1>
    <h1 style="font-size: 180%; text-align: center;"><a href="../../../terzoHomework.php" style="text-align: center; text-decoration: none; color: green;">Torna alla home</a></h1>
</body>
</html>
