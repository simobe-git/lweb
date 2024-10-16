<?php 

if(isset($_POST['username'])){
    $username = $_POST['username'];    //$username = "";
}
session_start();

if(isset($_POST['accesso'])){     //se succede significa che arriviamo dalla form di scelta username (in fase di registrazione)
    $_SESSION['accessoPermesso'] = $_POST['accesso'];
    $_SESSION['username'] = $_POST['username'];
    $username = $_POST['username'];
}

if(isset($_COOKIE['accesso'])){    //cookie impostato nella pagina 'menu2.php', ed ha lo scopo di far capire che stiamo tornando nell'area riservata dopo aver effettuato il pagamento
    if($_COOKIE['accesso'] == 1){
        $_SESSION['accessoPermesso'] = 100;
        if(!(empty($_SESSION['username']))){
            $username = $_SESSION['username'];
        }
        $_SESSION['ora'] = time();
    }
}
if(isset($_SESSION['accessoPermesso'])){
    if($_SESSION['accessoPermesso'] == 100){  //se $_SESSION['accessoPermesso] == 100 significa che ho fatto la registrazione
        $_SESSION['ora'] = time();
        $username = $_SESSION['username'];
    }elseif($_SESSION['accessoPermesso'] == 1000){  //in tal caso provengo dalla pagina di login
        $_SESSION['ora'] = time();
        $username = $_SESSION['username'];
    }elseif($_SESSION['accessoPermesso'] == 1){
        $username = $_SESSION['username'];
    }
}
else{
    header("Location: err.php");
    exit();
}

if(isset($_POST['reinserisci'])){       //$_POST['reinserisci'] arriva dallo script'reinserisciUsername.php'
                                        //ovvero quando, dopo aver fatto la registrazione si inserisce uno
                                        //username già presente nella BD
    $_SESSION['username'] = $_POST['nuovoUsername'];
    $username = $_POST['nuovoUsername'];
}

if(  ($_SESSION['accessoPermesso'] == 100 ) || ( isset($_POST['reinserisci']) ) ){    
    if(isset($_POST['username'])){

        $_SESSION['username'] = $_POST['username'];
        $pass = $_SESSION['password'];
        $email = $_SESSION['email'];

        require("connessione.php");
        $sql = "SELECT username
                FROM $table_name
                WHERE username = \"{$_SESSION['username']}\"    /* {$_POST['username']}\ non funziona in tutti i casi (tipo se va reinserito lo username perchè già esistente nel DB */
                ";

        if (!$resultQ = mysqli_query($connection, $sql)) {
            printf("<p><strong>Errore:</strong> la query non ha prodotto alcun risultato!\n</p>");
            exit();
        }

        $row = mysqli_fetch_array($resultQ);

        if ($row){   //  se quello username esiste già nella tabella del database
            header('Location: reinserisciUsername.php');    // si torna ad immettere lo username
            exit();
        }

        else{
            //l'utente non esiste in tabella quindi inserimento nel database
            $sql = "INSERT INTO $table_name (username, email, password)
                    VALUES ('{$_POST['username']}', '$email', '$pass' )
            ";

            // il risultato della query va in $resultQ
            if (!$resultQ = mysqli_query($connection, $sql)) {
                printf("Errore nell'esecuzione della query\n");
                exit();
            }
        }

        // chiudiamo la connessione poichè il DB non serve piu' in questo script
        $connection->close();
    }
}

//unset($_SESSION['accessoPermesso']);  //necessario perchè se provengo da altri script con un 'accessoPermesso' diverso
                                      //da quello desiderato questo script eseguirà istruzioni che non vorremmo eseguisse

?>

<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">

<head>
    <title>Pagina riservata</title>

    <link rel="stylesheet" href="style.css" type="text/css" /> 

    <style>

        select{
            border-radius: 10px;
            height: 5%;
            background-color: white;
            width: fit-content;
        }

        input{
            margin-top: 5px;
            height: 4%;
            background-color: steelblue;
            border-radius: 10px;
            width: fit-content;
        }
        
        .stagioneAttuale{
            background-color: green;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            position: relative;
            margin-top: 2%;
            margin-left: 0;
            width: 100%;
            height: fit-content;
        }

        .prenotazioni{
            background-color: beige;
            width: 80%;
            margin: auto;
            justify-content: center;
            height: fit-content;
        }

        a:hover{
            background-color:olivedrab;
        }

    </style>

</head>

<body>

<h2>Accesso eseguito con successo</h2>
 

<?php if(!isset($_SESSION['accessoPermesso'])) echo "NO"; ?>
<h2>Benvenuto nella tua area riservata, <?php echo "<strong style=\"color: blue;\">" . $username . "</strong>!"; ?></h2>
<p style="text-align: center;">Accesso effettuato alle <?php echo date('g:i a', $_SESSION['ora']); ?></p>

<div class="logout">
    <a href = "logout.php" alt="errore">Logout</a>
</div>

<h2 style="text-align: center; color: yellow;">Se vuoi accedere ad una stagione passata compila il seguente campo</h2>

<form action="stagioni/stagioni.php" method="post" style="width: fit-content; justify-content: center; margin: auto;">
    <select name="season" style="font-size: 100%;">
        <option value="2020">Stagione 2020</option>
        <option value="2021">Stagione 2021</option>
        <option value="2022">Stagione 2022</option>
        <option value="2023">Stagione 2023</option>
    </select><br />
    <input type="submit" value="Seleziona" name="send">
</form>

<div class="stagioneAttuale">
    <?php require("menu2.php"); ?>
    <h1 style="color: white;">Stagione 2024</h1>

    <h1 style="color: red; font-size: 190%">Effettua la tua prenotazione</h1>
    <div class="prenotazioni">
        <table border="1" cellpadding="10" cellspacing="1" style="display: box; width: 100%;">
            

            <body>
                <tr style="color: blue; font-family: cursive; font-size: 160%; background-color: slategray;">
                    <th>
                        <a href="prenotazioni/acquistaBiglietto.php" style="text-decoration: none;">Acquista biglietto</a>
                    </th>
                    <th>
                        <a href="prenotazioni/accessoPaddock.php" style="text-decoration: none;">Accesso al paddock</a>
                    </th>
                    <th>
                        <a href="prenotazioni/autografi.php" style="text-decoration: none;">Autografi dai piloti</a>
                    </th>
                </tr>
                <tr style="background-color:darkkhaki;">
                    <th>
                        <img src="../../img/prenotazioni/acquista.jpeg"
                        width="90%"
                        alt="non trovata">
                    </th>
                    <th>
                        <img src="../../img/prenotazioni/paddock.jpg"
                        width="80%"
                        alt="non trovata">
                    </th>
                    <th>
                        <img src="../../img/prenotazioni/autografiPiloti.jpg"
                        width="100%"
                        height="130%"
                        alt="non trovata">
                    </th>
                </tr>
            </body>

        </table>



    </div>

    <p style="font-size: 150%; text-align: center; color: red;">Visualizza le <a href = "../../../prenotazioniPosto.php" style="text-decoration: none; color: blue;" alt="errore">prenotazioni.</a></p>

</div>


</body>
</html>
