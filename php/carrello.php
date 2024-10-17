<?php
session_start();                //SCRIPT DA METTERE A POSTO (ORA NON FUNZIONA)

// Controllo se l'utente è loggato
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Carica il file XML dei giochi
$giochi = simplexml_load_file("../xml/giochi.xml");

$carrello = isset($_SESSION['carrello']) ? $_SESSION['carrello'] : [];

// Calcolo del prezzo totale del carrello
$totale = 0;
foreach ($carrello as $nomeGioco) {
    foreach ($giochi->gioco as $gioco) {
        if ((string)$gioco->nome == $nomeGioco) {
            $prezzoOriginale = floatval($gioco->prezzo);
            $sconto = floatval($gioco->sconto);
            $prezzoScontato = $prezzoOriginale - ($prezzoOriginale * ($sconto / 100));
            $totale += $prezzoScontato;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo Carrello</title>
    <link rel="stylesheet" href="carrello.css">
</head>
<body>
    <header>
        <h1>Il tuo Carrello</h1>
        <nav>
            <a href="catalogo.php">Torna al catalogo</a>
            <a href="logout.php">Logout</a>
        </nav>

        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            header {
                background-color: #333;
                color: white;
                padding: 10px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            header h1 {
                margin: 0;
            }

            nav a {
                color: white;
                margin-left: 20px;
                text-decoration: none;
            }

            main {
                padding: 20px;
            }

            .carrello-container {
                display: flex;
                flex-wrap: wrap;
            }

            .carrello-item {
                background-color: white;
                border: 1px solid #ccc;
                margin: 10px;
                padding: 20px;
                width: 300px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .carrello-item img {
                max-width: 100%;
                height: auto;
            }

            .carrello-item .dettagli {
                margin-top: 10px;
            }

            .totale {
                text-align: right;
                font-size: 1.5em;
                margin-top: 20px;
            }

            footer {
                background-color: #333;
                color: white;
                text-align: center;
                padding: 10px;
                position: fixed;
                bottom: 0;
                width: 100%;
            }

        </style>
    </header>

    <main>
        <?php if (empty($carrello)): ?>
            <p>Il tuo carrello è vuoto.</p>
        <?php else: ?>
            <div class="carrello-container">
                <?php if(isset($_POST['gioco'])){
                 foreach ($carrello as $nomeGioco): ?>
                    <?php foreach ($giochi->gioco as $gioco): ?>
                        <?php if ((string)$gioco->nome == $nomeGioco): ?>
                            <?php
                            $prezzoOriginale = floatval($gioco->prezzo);
                            $sconto = floatval($gioco->sconto);
                            $prezzoScontato = $prezzoOriginale - ($prezzoOriginale * ($sconto / 100));
                            ?>
                            <div class="carrello-item">
                                <img src="img/<?php echo $gioco->immagine; ?>" alt="<?php echo $gioco->nome; ?>">
                                <div class="dettagli">
                                    <h3><?php echo $gioco->nome; ?></h3>
                                    <p><?php echo $gioco->descrizione; ?></p>
                                    <p>Prezzo originale: €<?php echo number_format($prezzoOriginale, 2); ?></p>
                                    <p>Prezzo scontato: €<?php echo number_format($prezzoScontato, 2); ?></p>
                                    <p>Anno: <?php echo $gioco->anno; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; }?>
            </div>
            <div class="totale">
                <h2>Totale: €<?php echo number_format($totale, 2); ?></h2>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        <p>© 2024 GameShop</p>
    </footer>
</body>
</html>
