<?php 
// pagina dedicata al pagamento di una delle seguenti cose:
// - acquisto del biglietto per andare a vedere un Gran Premio
// - acquisto del Pass per entrare nel Paddock
// - acquisto del biglietto per farsi firmare un autografo da un pilota a propria scelta

$pr = 0;
$art = "";
$giorno = "";
$pilota = "";
$setPass = 0;  //conterrà il valore (1 o 2) del pass selezionato dall'utente nella pagina 'accessoPaddock'

$totale = 0;  //soldi totali spesi con i contenuti aggiunti al carrello
session_start();

//qui proveniamo da 'acquistaBiglietto.php'
if(isset($_SESSION['biglietto'])){
    if($_SESSION['biglietto'] == 1){   //arrivo dallo script 'acquistaBiglietto.php'
        $pr = $_SESSION['prezzo'];
        $art = $_SESSION['item'];
    }
}

//qui proveniamo da 'accessoPaddock.php'
if(isset($_SESSION['pass'])){      //settato nello script 'accessoPaddock.php'
    if($_SESSION['pass'] == 1){
        $setPass = 1;  
    }else $setPass = 2; 
}


//qui invece proveniamo dallo script 'autografi.php'
if(isset($_SESSION['giorno'])){     //proviene dello script autografi.php
    $giorno = $_SESSION['giorno'];
}

if(isset($_POST["invioP"])){      //assegnamento di $pilota alla scelta effettuata nella form dei piloti
    if(isset($_POST['lec'])){
        $pilota = "Charles Leclerc";
    }elseif(isset($_POST['ver'])){
        $pilota = "Max Verstappen";
    }elseif(isset($_POST['nor'])){
        $pilota = "Lando Norris";
    }elseif(isset($_POST['ham'])){
        $pilota = "Lewis Hamilton";
    }elseif(isset($_POST['alo'])){
        $pilota = "Fernando Alonso";
    }
    $_SESSION['pilota'] = $pilota;
}

//proveniamo dalla form presente in questo stesso script (in basso)
if(isset($_POST['paga'])){  // vogliamo procedere con il pagamento
    setcookie('pagamento', $_POST['paga']);
    $cookieSent = 1;  //se si procede con il pagamento
    header("Location: pagEffettuato.php");
}elseif(isset($_POST["areaR"])){  // vogliamo tornare all'area riservata
    setcookie('annulla', $_POST['areaR']);
    $cookieSent = 1;  //se si decide di tornare nell'area riservata
    header("Location: pagEffettuato.php");
}

?>

<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">

<head>
    <title>Zona pagamenti</title>

    <style>

        body{
            font-size: 140%;
            font-family: 'Times New Roman', Times, serif;
            background-color: grey;
        }

        input{
            border-radius: 10px;
            height: 5%;
        }

        a{
            text-decoration: none;
        }

        #uno:hover{
            background-color:goldenrod;
        }

        #due:hover{
            background-color:lightcoral;
        }

        #tre:hover{
            background-color:chocolate;
        }

        .menu{
            height: fit-content;
            background-color: lawngreen; 
            font-size: 130%;
        }

        .menu:hover{
            background-color:coral;
        }

        #table{
            font-size: 90%;
        }

        #table:hover{
            background-color: yellow;
        }

    </style>
</head>

<body>

<div class="menu">
        <table border="0" cellpadding="10" cellspacing="25" id="table" style="margin: auto; justify-content: center; height: 10ex; ">
            <tr>
                <th id="uno">
                    <a href="prenotazioni/acquistaBiglietto.php" id="uno" alt="non trovato">Acquista biglietto</a>
                </th>
                <th id="due">
                    <a href="prenotazioni/accessoPaddock.php" id="due" alt="non trovato">Pass per accesso paddock</a>
                </th>
                <th id="tre">
                    <a href="prenotazioni/autografi.php" id="tre" alt="non trovato">Prenota autografo</a>
                </th>
            </tr>
        </table>
</div>

<h1 style="color: black; font-size: 150%; text-align: center;">Procedi con il pagamento</h1>


<p>
    Gentile <em style="color: red;"><?php echo $_SESSION['username'] ?></em>, hai inserito i seguenti elementi nel carrello.<br />

    <ul>
        <?php 
        if(isset($_SESSION['biglietto'])){
                if($_SESSION['biglietto'] == 1){
                    echo "<li>Biglietto del tipo '<strong>" . $art . "'</strong>, dal costo di <strong>"
                    . $pr . "\$</strong>.</li>"; 
                    $totale += $pr;
                } 
              }   
        if($giorno){    //se è stato scelto un giorno dallo script 'autografi.php'
            echo "<li>Autografo firmato da <strong>" . $pilota . "</strong> in data <em> " . $giorno . "</em>. Prezzo: <strong>50$</strong>.</li>";
            $totale += 50;
        } 
        if($setPass == 1){  //significa che ho premuto il primo bottone nello script 'accessoPaddock.php
            echo "<li>Acquisto del <strong>FREE PASS</strong>. Prezzo: <strong>75$</strong> per ogni giorno trascorso nel paddock.</li>";
            $totale += 75;
        }elseif($setPass == 2){   //significa che ho premuto il secondo bottone nello script 'accessoPaddock.php
           echo "<li>Acquisto del <strong>VIP PASS</strong>. Prezzo: <strong>150$</strong> per ogni giorno trascorso nel paddock.</li>";
           $totale += 150;
        } 
        $_SESSION['tot'] = $totale;
        ?>
    </ul>
</p>


<p>
    Il totale speso &egrave; <?php echo "<strong style=\"color: red;\">" . $totale . "$</strong>." ?> <br />
    Se non ci sono errori e vuoi procedere al pagamento clicca il pulsante apposito qui sotto. Altrimenti puoi annullare le tue scelte e 
    scegliere cosa fare nella prossima pagina.

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="paga" value="Procedi al pagamento">
    <input type="submit" name="areaR" value="Annulla scelte">
</form>
</p>

</body>
</html>