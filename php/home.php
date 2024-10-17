
<?php
session_start();
$numCrediti = 0;
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negozio di Videogiochi</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">GameShop</a>
        </div>
        <ul class="nav-links">         <!-- mostriamo catalogo, offerte e FAQ a tutti i tipi di utente  -->
            <li><a href="catalogo.php">Catalogo</a></li>
            <li><a href="offerte.php">Offerte</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <?php if(isset($_SESSION['statoLogin'])) : //qualcuno, qualunque ruole abbia, si è loggato ?>
                <li><a href="logout.php">Logout</a></li>  <!-- in tal caso gli mettiamo una voce 'logout' nella barra di navigazione  -->
            <?php else: ?>
                <li><a href="login.php">Login</a></li>    <!-- se invece l'utente non è loggato gli mettiamo la voce login  -->
            <?php endif; ?>
            <?php if(isset($_SESSION['ruolo'])){ 
                if($_SESSION['ruolo'] === 'cliente'):   ?>    <!-- se è un cliente ad essersi loggato gli mettiamo le voci 'carrello' e 'profilo'  -->
                <li><a href="carrello.php">Carrello</a></li>
                <li><a href="profilo.php">Profilo</a></li>
            <?php elseif ($_SESSION['ruolo'] === 'admin'):  ?>
                <li><a href="admin_dashboard.php">Dashboard</a></li>   <!-- se invece è un admin esso avrà una sua interfaccia ADMIN DASHBOARD -->
            <?php endif; } 
                if(isset($_SESSION['ruolo'])){
                    if($_SESSION['ruolo'] != 'admin'){ ?>      <!-- se l'utente è un admin è inutile fargli vedere la sezione 'contatti' -->
                    <li><a href="contatti.php">Contatti</a></li> 
            <?php   }
                }
                if(!isset($_SESSION['statoLogin'])){ ?>
                    <li><a href="contatti.php">Contatti</a></li> 
                <?php } ?>
        </ul>
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <section class="hero-section">
    <div class="crediti-virtuali">
        <img src="..\isset\crediti.jpeg" style="margin-left: 1.5em; width: 40%; height: 40%;" alt="immagine dei crediti">
        <div style="position: absolute; margin-left: 65%; margin-top: -32%; width: fit-content; font-size: 500%; color: white;">
            <?php echo $numCrediti ?></div>       <!-- numCrediti da sistemare -->
        </div>
      <div class="hero-content">
        <?php if(!isset($_SESSION['username'])){ ?>
          <h1>Benvenuti su GameShop</h1>
          <?php }else{ ?>
          <h1>Bentornato su GameShop, <strong style="color: yellow; font-size: 120%;"><?php echo $_SESSION['username']; }?></strong></h1>
          <p>Il miglior negozio di videogiochi online</p>
          <a href="#" class="cta-button">Scopri di più</a>
      </div>
      <img src="../isset/banner-image.jpg" alt="Immagine di Videogioco" class="additional-image">
    </section>

    <section class="featured-games">
      <h2>Solo il meglio per i nostri utenti</h2>
      
      <div class="games-grid">
          <div class="game-card">
              <img src="https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/1790600/header.jpg?t=1728899148" alt="Gioco 1">
              <h3>DRAGON BALL: Sparking! ZERO</h3>
              <p> Stringi nelle mani la potenza distruttiva dei guerrieri più potenti dell'universo di DRAGON BALL</p>
              <a href="#" class="cta-button">Acquista ora</a>
          </div>
          <div class="game-card">
            <img src="https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/2669320/header.jpg?t=1728642725" alt="Gioco 1">
            <h3>FC 25</h3>
            <p> Fai squadra con gli amici nelle tue modalità preferite</p>
            <a href="#" class="cta-button">Acquista ora</a>
        </div>
        <div class="game-card">
          <img src="https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/2429640/header.jpg?t=1728522618" alt="Gioco 1">
          <h3>THRONE AND LIBERTY</h3>
          <p>PvPvE su vasta scala e la possibilità di trasformarsi in creature per combattere sulla terra, in mare e in aria.</p>
          <a href="#" class="cta-button">Acquista ora</a>
      </div>
      </div>
  </section>
  
  
  <footer class="footer">
      <div class="footer-content">
          <div class="footer-section">
              <h4>Contattaci</h4>
              <p>Email: info@gameshop.com</p>
              <p>Telefono: +39 123 456 789</p>
          </div>
          <div class="footer-section">
              <h4>Seguici</h4>
              <p>
                  <a href="#">Facebook</a> | 
                  <a href="#">Twitter</a> | 
                  <a href="#">Instagram</a>
              </p>
          </div>
          <div class="footer-section">
              <h4>Copyright</h4>
              <p>&copy; 2024 GameShop. Tutti i diritti riservati.</p>
          </div>
      </div>
  </footer>
  
    <script>
        // Script per il menu mobile
        const hamburgerMenu = document.querySelector('.hamburger-menu');
        const navLinks = document.querySelector('.nav-links');

        hamburgerMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>
