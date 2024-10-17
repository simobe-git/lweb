<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$catalogo = simplexml_load_file("../xml/catalogo.xml");

// Controllo del criterio di ordinamento selezionato dall'utente
$ordina_per = isset($_GET['ordina_per']) ? $_GET['ordina_per'] : 'nome';
$ordine = isset($_GET['ordine']) ? $_GET['ordine'] : 'asc'; // 'asc' per crescente, 'desc' per decrescente

$videogiochi = [];
foreach ($catalogo->gioco as $gioco) {
    $videogiochi[] = $gioco;
}

// Funzione di ordinamento personalizzata
usort($videogiochi, function($a, $b) use ($ordina_per, $ordine) {
    $val1 = (string)$a->$ordina_per;
    $val2 = (string)$b->$ordina_per;
    
    // Se si ordina per prezzo o anno, converte in numeri per un corretto ordinamento
    if ($ordina_per == 'prezzo' || $ordina_per == 'anno' || $ordina_per == 'sconto') {
        $val1 = floatval($val1);
        $val2 = floatval($val2);
    }
    
    // Esegue l'ordinamento in base all'ordine (ascendente o discendente)
    if ($ordine == 'asc') {
        return $val1 <=> $val2;
    } else {
        return $val2 <=> $val1;
    }
});
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo Videogiochi</title>
    <link rel="stylesheet" href="../css/catalogo.css">
</head>
<body>
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="offerte.php">Offerte</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="contatti.php">Contatti</a></li>
            <?php if(isset($_SESSION['statoLogin'])) : ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <h1 style="margin-top: 6em; text-align: center; font-size: 190%;">Catalogo dei Giochi</h1>

    <!-- Form per selezionare il criterio di ordinamento -->
    <form method="GET" action="catalogo.php" style=" width:fit-content; justify-content: center; margin: auto; ">
        <label for="ordina_per" style="font-size: 110%;">Ordina per:</label>
        <select name="ordina_per" id="ordina_per" style="border-radius: 10px; font-size: 110%;">
            <option value="nome" <?php if ($ordina_per == 'nome') echo 'selected'; ?>>Nome</option>
            <option value="prezzo" <?php if ($ordina_per == 'prezzo') echo 'selected'; ?>>Prezzo</option>
            <option value="anno" <?php if ($ordina_per == 'anno') echo 'selected'; ?>>Anno di uscita</option>
            <option value="sconto" <?php if ($ordina_per == 'sconto') echo 'selected'; ?>>Sconto</option>
        </select>

        <label for="ordine" style="font-size: 110%; margin-left: 2em;">Ordine:</label>
        <select name="ordine" id="ordine" style="border-radius: 10px; font-size: 110%;">
            <option value="asc" <?php if ($ordine == 'asc') echo 'selected'; ?>>Crescente</option>
            <option value="desc" <?php if ($ordine == 'desc') echo 'selected'; ?>>Decrescente</option>
        </select>

        <button type="submit">Ordina</button>
    </form>

    <main>
        <div class="catalogo">
            <?php foreach ($videogiochi as $gioco): 
                $prezzoOriginale = floatval($gioco->prezzo);
                $sconto = floatval($gioco->sconto);
                $prezzoScontato = $prezzoOriginale - ($prezzoOriginale * ($sconto / 100));
                $bonus = intval($gioco->bonus);
            ?>
                <div class="card">
                    <img src="<?php echo $gioco->immagine; ?>" alt="<?php echo $gioco->nome; ?>">
                    <h3><?php echo $gioco->nome; ?></h3>
                    <p><?php echo $gioco->descrizione; ?></p>
                    <p>Anno di uscita: <?php echo $gioco->anno; ?></p>
                    <p>Prezzo originale: €<?php echo number_format($prezzoOriginale, 2); ?></p>
                    <?php if ($sconto > 0): ?>
                        <p>Sconto: <?php echo $sconto; ?>%</p>
                        <p>Prezzo scontato: €<?php echo number_format($prezzoScontato, 2); ?></p>
                    <?php else: ?>
                        <p>Prezzo: €<?php echo number_format($prezzoOriginale, 2); ?></p>
                    <?php endif; ?>
                    <?php if ($bonus > 0): ?>
                        <p>Bonus crediti: <?php echo $bonus; ?></p>
                    <?php endif; ?>
                    <form method="POST" action="carrello.php">
                        <input type="hidden" name="gioco" value="<?php echo $gioco->nome; ?>">
                        <input type="hidden" name="prezzo" value="<?php echo $prezzoScontato; ?>">
                        <input type="hidden" name="bonus" value="<?php echo $bonus; ?>">
                        <button type="submit">Aggiungi al Carrello</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>Contattaci: info@videogamestore.com</footer>
</body>
</html>
