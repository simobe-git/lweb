<?php 

session_start();
if(isset($_SESSION['tot'])){
    $totale = $_SESSION['tot'];
}

$pr = 0;
$art = "";
$accesso = 0;  //variabile che servirà in basso per impostare un cookie

//assegnamento variabili
if(isset($_SESSION['prezzo'])){   //rappresenta il costo del biglietto (se acquistato, nella sezione dedicata)
    $pr = $_SESSION['prezzo'];
}
if(isset($_SESSION['item'])){
    $art = $_SESSION['item'];
}


//eliminazione variabili di sessione non più necessarie
unset($_SESSION['giorno']);
unset($_SESSION['pilota']);
unset($_SESSION['tot']);
unset($_SESSION['prezzo']);
unset($_SESSION['item']);
unset($_SESSION['biglietto']);

?>

<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">

<head>
    <title>Zona post carrello</title>

    <style>
        body{
            background-color: green;
        }
        h1{
            text-align: center;
            color: red;
            font-size: 240%;
        }
        h2{
            text-align: center;
            color: yellow;
            font-size: 180%;
            text-decoration: none;
        }
    </style>
</head>

<body>

<?php
//inserisco un semplice controllo dei soldi partendo da un portafoglio virtuale contenente 220 euro. Se non si hanno abbastanza soldi 
//viene stampato sullo schermo. Non ho però fatto tutti i casi possibili, mi sono limitato ad una manciata
    if(!empty($_COOKIE['pagamento'])){  
    $soldiPortafogli = 220;             //supponiamo di avere 220 euro in una carta/conto corrente
    if($totale > $soldiPortafogli){
        echo "<p style=\"font-size: 140%; color: white; text-align: center;\">Non hai abbastanza soldi per acquistare tutti gli articoli!</p>";
        if(isset($pr) && isset($_SESSION['pass']) ){  //vuol dire che abbiamo sia acquistato un biglietto, che acquistato un pass
            if($_SESSION['pass'] == 2 && $pr != 34.99){     //significa che è stato acquistato il vip pass dal costo di 150 euro e un biglietto
                                                            //o da 84.99, o da 109.99 (e quindi abbiamo superato i 220 euro di portafogli)

                if(($totale - $pr - 150) > $soldiPortafogli){//se "soldi totali spesi" - i "soldi del biglietto" - i 150 euro di vip pass superano 
                                                             //il totale a disposizione significa che non possiamo acquistare nè il biglietto, nè il vip pass
                    echo "<p style=\"font-size: 140%; text-align: center;\">In particolare non puoi acquistare n&egrave; biglietto <strong style=\"color: blue;\"> " . $art . " n&egrave; il vip pass</p>";
                    exit();
                }
                elseif(($totale - $pr) > $soldiPortafogli){  //se "soldi totali spesi" - i "soldi del biglietto" superano il totale a disposizione 
                                                        //significa che non possiamo acquistare il biglietto
                    echo "<p style=\"font-size: 140%; text-align: center;\">In particolare non puoi acquistare il biglietto <strong style=\"color: blue;\"> " . $art . "</p>";
                }
                elseif(($totale - 150) > $soldiPortafogli ){  //se "soldi totali spesi" - i 150 di vip pass superano il toale a disposizione
                                                               //significhe che non possiamo acquistare il vip pass
                    echo "<p style=\"font-size: 140%; text-align: center;\">In particolare non puoi acquistare il vip pass.";
                }else{
                    echo "<p style=\"font-size: 140%; text-align: center;\">In particolare non puoi acquistare il biglietto del tipo '<strong style=\"color: blue;\"> " . $art . "'</p>";
                }
            }   
        }   
    }else{ ?>
        <h1 style="margin-top: 10%; color: white;">Hai effettuato il pagamento!</h1>
    <?php }
    
    }elseif(!empty($_COOKIE['areaR'])){ ?>
    <h1>Hai deciso di annullare le tue scelte</h1>
<?php } ?>

<h2>Scegli la prossima pagina da navigare, altrimenti fai <a href="logout.php" style="text-decoration: none; color: red;" alt="non trovata">logout</a> </h2>

<?php 
require("menu2.php");

setcookie('pagamento', '', time()-2);  // eliminazione cookie
setcookie('areaR', '', time()-2);  
unset($_SESSION['pass']);
?>


</body>
</html>
