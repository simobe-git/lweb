<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en"></html>

<head>
    <title>Prenota un posto</title>

    <style>
        body{
            background-color: olivedrab;
        }

        td, tr{
            text-align: center;
        }

        table{
            margin: auto;
            justify-content: center;
        }

        .divForm{
            justify-content: center;
            margin: auto;
            width: fit-content;
        }
    </style>
</head>

<?php
session_start();

if(isset($_POST['prenota'])){
    
    if (!(isset($_POST['tribuna']))){         //impostiamo un messaggio di errore (da usare dopo nel caso)
        $msgErrore = "ERRORE, DEVI SELEZIONARE UNA TRIBUNA! RIPROVA.";
    }else{
        //salviamo in apposite variabili i dati inviati dalla form
        $tribuna = $_POST['tribuna'];
        $numeroPosto = $_POST['numeroPosto'];
        $username = $_SESSION['username']; //prendiamo il nome utente dalla sessione

        //carichiamo il file XML delle tribune (ovvero 'prenotaPosto.xml' dentro l'apposita cartella) per controllare il numero massimo di posti
        $xmlTribuneFile = '../xml/prenotaPosto.xml';

        if (file_exists($xmlTribuneFile)) {
            $xmlTribune = simplexml_load_file($xmlTribuneFile);

            //andiamo a cercare la tribuna selezionata e ne otteniamo il numero massimo di posti
            $numPostiMassimi = 0;
            foreach ($xmlTribune->tribuna as $tribunaItem) {
                if ($tribunaItem->nome == $tribuna) {       //all'interno del file XML cerchiamo la tribuna che abbiamo inserito nella form (salvata dentro $tribuna) 
                    $numPostiMassimi = (int)$tribunaItem->numPosti;
                    break;
                }
            }

            //controlliamo se il posto inserito dall'utente è nei limiti del numero di posti totali di quella tribuna
            if ($numeroPosto > $numPostiMassimi) {       //errore, il posto immesso non è un posto esistente di quella tribuna
                echo "<p style=\"color: white; text-align: center; font-size: 140%;\">Il numero di posto <strong style=\"color:blue;\">" . $numeroPosto . "</strong> supera la capienza massima della tribuna <strong style=\"color:blue;\">" . $tribuna . "</strong>, che è di <strong style=\"color:blue;\">" . $numPostiMassimi . "</strong> posti. Scegli un posto valido.</p>";
            }else{
                //in caso contrario procediamo con il controllo della prenotazione per vedere se il posto inserito è già stato prenotato
                $xmlFile = '../xml/prenotazioni.xml';

                if (file_exists($xmlFile)) {
                    $xml = simplexml_load_file($xmlFile);

                    //facciamo un check: vediamo se il numero di posto selezionato è già stato prenotato usando una variabile booleana
                    $postoOccupato = false;
                    $tribunaOccupata = '';
                    foreach ($xml->singolaPrenotazione as $prenotazione) {
                        if ($prenotazione->tribuna->numeroPosto == $numeroPosto && $prenotazione->tribuna->nome == $tribuna) {
                            $postoOccupato = true;     //il posto è occupato
                            $tribunaOccupata = $prenotazione->tribuna->nome;             
                            break;
                        }
                    }

                    if ($postoOccupato) {
                        //se il posto è occupato, mostriamo un messaggio di errore e la relativa tribuna
                        echo "<p style=\"color: white; text-align: center; font-size: 140%;\">Il posto numero <strong style=\"color: blue;\">" . $numeroPosto . "</strong> è già stato prenotato nella tribuna <strong style=\"color: blue;\">" . $tribunaOccupata . "</strong>. Scegli un altro posto.</p>";
                    } else {
                        //in questo caso il posto è disponibile, quindi procediamo con l'inserimento della prenotazione
                        //facciamo uno switch sulla tribuna per impostarne il costo (deciso da noi)
                        switch($tribuna){
                            case "Tribuna 1":
                                $costoPosto = 45.49;
                                break;
                            case "Tribuna 2": 
                                $costoPosto = 49.99;
                                break;
                            case "Ascari 1": 
                                $costoPosto = 65.49;
                                break;
                            case "Ascari 2": 
                                $costoPosto = 59.99;
                                break;
                            case "Tribuna 21": 
                                $costoPosto = 29.99;
                                break;
                            case "Piscina": 
                                $costoPosto = 84.99;
                                break;
                            case "Roggio": 
                                $costoPosto = 69.99;
                                break;
                            case "Vedano": 
                                $costoPosto = 35.99;
                                break;
                            case "Tr": 
                                $costoPosto = 27.99;
                                break;
                            case "Trib": 
                                $costoPosto = 29.99;
                                break;
                        }

                        $dataPrenotazione = date('Y-m-d');   //nella prima colonna della tabella inseriremo la data attuale come data di prenotazione

                        //creiamo una nuova prenotazione
                        $nuovaPrenotazione = $xml->addChild('singolaPrenotazione');
                        $nuovaPrenotazione->addAttribute('pagamentoEffettuato', 'N'); //aggiungiamo l'attributo 'pagamentoEffettuato'
                            //per rispettare la struttura della grammatica XSD. Per sempplicità, settiamo questo attributo a N (cioè NO) per ogni prenotazione
                            //anche perchè dopo la prenotazione non c'è modo di pagare (l'utente non paga mai), e quindi possiamo settarlo sempre su NO
                        
                        $nuovaPrenotazione->addChild('dataPrenotazione', $dataPrenotazione);

                        $tribunaElem = $nuovaPrenotazione->addChild('tribuna');      //tribuna ha 3 figli (nome, numeroPosto e costoPosto) che procediamo ad inserire
                        $tribunaElem->addChild('nome', $tribuna);
                        $tribunaElem->addChild('numeroPosto', $numeroPosto);
                        $tribunaElem->addChild('costoPosto', $costoPosto);

                        $nuovaPrenotazione->addChild('username', $username);  //inseriamo il nome utente

                        //salviamo il file XML formattato con DOMDocument (per avere l'indentazione corretta)
                        //altrimenti il file XML che si aggiorna di volta in volta non sarebbe formattato bene
                        //e tutte i dati verrebbero messi su un'unica riga
                        $dom = new DOMDocument('1.0', 'UTF-8');
                        $dom->preserveWhiteSpace = false;
                        $dom->formatOutput = true;
                        $dom->loadXML($xml->asXML());

                        $dom->save($xmlFile);   //per salvare il file

                        //reindirizziamo alla pagina di visualizzazione delle prenotazioni
                        header('Location: prenotazioniPosto.php');
                        exit;
                    }
                }else{
                    //se il file XML non esiste, stampiamo un messaggiore di errore
                    echo "<p style='color: red; text-align: center;'>Errore: il file XML non è stato trovato.</p>";
                }
            }
        }else{
            echo "<p style='color: red; text-align: center;'>Errore: il file non è stato trovato.</p>";
        }
    }
}
?>


<body>

<h1 style="font-size: 180%; text-align: center;">Posti disponibili circuito di Monza</h1>

<table border="1" cellspacing="3">
    <tbody>
    <tr style="background-color: yellow;">
        <td style="color: red; font-size: 130%;"><strong>Nome tribuna</strong></td>
        <td style="color: red; font-size: 130%;"><strong>Posti totali</strong></td>
        <td style="color: red; font-size: 130%;"><strong>Curva corrispondente</strong></td>
    </tr>

<?php 
    $xmlString = "";

    //apertura del file contenente i posti totali nelle varie tribune del circuito
    foreach ( file("../xml/prenotaPosto.xml") as $nodoPosti ) 
    {
        $xmlString .= trim($nodoPosti);      //"tagliamo" gli spazi nel file xml e prendiamo solo i dati che ci servono
    }
    

    $doc = new DOMDocument();
    $doc->loadXML($xmlString);      //carichiamo l'XML
    $root = $doc->documentElement;          //prendiamo l'elemento root (radice) del docmento XML
    $posti = $root->childNodes;             //posti contiene i nodi figli dell'elemento radice

    $postiTotali=0;        //variabile che ci servirà in seguito per stampare il numero totale di posti

    for ($i=0; $i<$posti->length; $i++) {
        $posto = $posti->item($i);           //i-esimo elemento di 'posti', cioè i-esimo figlio della radice
            
        $tribuna = $posto->firstChild;              //tribuna è il primo figlio del singolo 'posto'
        $nomeTribuna = $tribuna->textContent;       //assegniamo il contenuto testuale di tribuna a 'nomeTribuna'

        $nPosti = $tribuna->nextSibling;            //il prossimo fratello di 'tribuna' viene assegnato con la variabile 'nPosti'...
        $numeroPosti = $nPosti->textContent;        //...e ne prendiamo il contenuto testuale in una variabile 'numeroPosti'

        $curva = $posto->lastChild;                 //l'ultimo figlio di 'posto' viene assegnato con la variabile 'curva'...
        $nomeCurva = $curva->textContent;           //...e ne prendiamo il contenuto testuale

        //stampiamo in una tabella i dati che vogliamo mostrare a schermo
        print "<tr style=\"background-color: pink;\"><td style=\"color: blue;  font-size: 120%;\">$nomeTribuna</td>  
        <td style=\"font-size: 120%\">$numeroPosti</td>
        <td style=\"font-size: 120%\">$nomeCurva</td></tr>\n";

        //aggiornamento del numero totali di posti
        $postiTotali += $numeroPosti;
    }
    echo "</tbody>\n</table>";

    //ora, molto comodamente, se si vogliono inserire altri dati in questa tabella basta inserire altri record nel file 'prenotaPosto.xml'

?>

    <p style="color: red; font-size: 180%; text-align: center; margin-top: 1%;">Posti totali: <?php echo $postiTotali ?></p>

    <div style="text-align: center; margin-top: 20px; font-size: 150%;">
        <a href="prenotazioniPosto.php" style="color: yellow; text-decoration: none; font-size: 150%;">Visualizza le tue prenotazioni</a>
    </div>

    <h1 style="font-size: 160%; color: white; text-align: center;">oppure</h1>

    <h1 style="font-size: 180%; color: blue; text-align: center;">Prenota un posto</h1>

    <?php 
        if(isset($_POST['prenota'])){
            if (!(isset($_POST['tribuna']))){ ?>
            <h1 style="text-align: center; font-size: 140%; color: yellow;"><?php echo $msgErrore ?></h1>
    <?php   } 
        }
    ?>

    <div class="divForm">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <select name="tribuna" size="7" style="font-size: 115%; justify-content: center; margin-left: 38%;">
                <option value="Tribuna 1">Tribuna 1</option>
                <option value="Tribuna 2">Tribuna 2</option>
                <option value="Ascari 1">Ascari 1</option>
                <option value="Ascari 2">Ascari 2</option>
                <option value="Tribuna 21">Tribuna 21</option>
                <option value="Piscina">Piscina</option>
                <option value="Roggio">Roggio</option>
                <option value="Vedano">Vedano</option>
                <option value="Tr">Tr</option>
                <option value="Trib">Trib</option>
            </select><br />

            <label for="numeroPosto" style="font-size: 140%; color: red; margin-left: 5%;">Numero Posto:</label>
            <input type="number" size="3" style="margin-top: 3%; margin-left: 3%; margin-bottom: 3%; border-radius: 10px; height: 4%; width: 20%; font-size: 140%;" name="numeroPosto" required><br>

            <button type="submit" style="border-radius: 30px; width: fit-content; height: 4%; background-color: gray; margin-left: 43%; border-style: solid;" name="prenota">Prenota</button>
        </form>
    </div>

</body>
</html>
