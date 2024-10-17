<?php

session_start();
// non viene eseguito il controllo sullo stato login poiché un utente 
// può accedere al catalogo in modo anonimo ma per effettuare acquisti 
// dovrà necessariamente identificarsi

require_once"connessione.php";

$sql = "SELECT * FROM videogiochi";
$result = mysqli_query($connessione,$sql);

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutti gli Articoli del Negozio</title>
    <link rel="stylesheet" href="../css/giochi.css">
</head>
<body>
    <!-- Barra di navigazione -->
    <nav class="navbar">
        <div class="logo">
            <a href="#">GameShop</a>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="catalogo.php">Giochi</a></li>
            <?php if(isset($_SESSION['statoLogin'])) : ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            <li><a href="contatti.php">Contatti</a></li>
        </ul>
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    
    <!-- Titolo della pagina -->
    <header class="shop-header">
        <h1>Tutti gli Articoli</h1>
    </header>

    <div class="product-grid">
        <?php
            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){
                    
                    //stampo solo giochi che hanno uno sconto
                    if($row['prezzo_attuale'] != $row['prezzo_originale']){

                        echo '<div class="product-item">';
                        
                        // Mostra l'immagine richiamando il link nel database
                        echo '<img src="' . $row['immagine'] . '" alt="' . $row['nome'] . '">'; 
                        echo '<h3>' . $row['nome'] . '</h3>';
                        echo '<p class="price">';
                        echo '<span class="current-price">€ ' . $row['prezzo_attuale'] . '</span>';
                        echo ' <span class="original-price">€ ' . $row['prezzo_originale'] . '</span>';
                        echo '</p>';
                        echo '<a href="#" class="btn-acquista">Acquista</a>';
                        echo '</div>';
                    }
                }
            }else{
                echo '<p>Nessun prodotto trovato</p>';
            }
        ?>
    </div>
    
</body>
</html>
