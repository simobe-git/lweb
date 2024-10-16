<?php 

session_start();
$_SESSION['accessoPermesso'] = 100;

require_once("../connessione.php");

$table_name = "biglietti";

if(isset($_POST["invioB"])){ 

    $sql = "SELECT *
            FROM $table_name
            ";
            
    if (!$resultQ = mysqli_query($connection, $sql)) {
    printf("<p><strong>Attenzione:</strong> la query non ha risultato!\n</p>");
    exit();
    }

    $sel = mysqli_fetch_array($resultQ);

    if ($sel) {

    switch ($_POST["biglietto"]) {

        case "Biglietto completo":     //andiamo a prendere il prezzo del biglietto completo (venerdi, sabato e domenica)
            $prezzo = "SELECT prezzo
                       FROM $table_name
                       WHERE tipo = 'completo'
                       ";
            if ($resultQ = mysqli_query($connection, $prezzo)){   //se la query ha avuto risultato
                $sol = mysqli_fetch_array($resultQ);              //prendo la colonna corrispondente alla query 
            }else{           //errore
                printf("<p><strong>Attenzione:</strong> la query non ha risultato!\n</p>");
                exit();
            }

            $_SESSION['item'] =  "completo";   //tipo di biglietto selezionato
            $_SESSION['prezzo'] = $sol['prezzo'];     //prezzo del biglietto selezionato

            $_SESSION['biglietto'] = 1;

            echo "<p style=\"font-size: 130%; color: white; font-family: cursive;\">Hai selezionato il biglietto completo (che comprende venerdi, sabato e domenica).<br />Il prezzo 
            del biglietto &egrave;:<strong> " . $sol['prezzo'] . "</strong>. Per acquistare il biglietto completo, clicca il bottone.</p>
            <br /><form style=\"margin: auto; justify-content: center;\" action=\"../carrello.php\" method=\"post\"><input style=\"border-radius: 10px; height: 12%;\" type=\"submit\" name=\"inv\"></input></form>
            <p style=\"text-align: center; font-size: 130%;\"> Per cambiare opzione ricompilare il modulo.</p><hr /><hr />";
            break;

        case "Sabato e domenica":  //andiamo a prendere il prezzo del biglietto riguardante sabato e domenica
            $prezzo = "SELECT prezzo
                       FROM $table_name
                       WHERE tipo = 'sabdom'
                       ";
            
            if ($resultQ = mysqli_query($connection, $prezzo)){
                $sol = mysqli_fetch_array($resultQ);
            }else{
                printf("<p><strong>Attenzione:</strong> la query non ha risultato!\n</p>");
                exit();
            }

            $_SESSION['item'] = "sabato e domenica";
            $_SESSION['prezzo'] = $sol['prezzo'];
            $_SESSION['accessoPermesso'] = 1;

            $_SESSION['biglietto'] = 1;
            $cookieSent = 1;

            echo "<p style=\"font-size: 130%; color: white; font-family: cursive;\">Hai selezionato il biglietto per il sabato e la domenica.<br />Il prezzo 
            del biglietto &egrave;:<strong> " . $sol['prezzo'] . "</strong>. Per acquistare il biglietto, clicca il bottone.</p>
            <br /><form style=\"margin: auto; justify-content: center;\" action=\"../carrello.php\" method=\"post\"><input style=\"border-radius: 10px; height: 12%;\" type=\"submit\" name=\"inv\"></input></form>
            <p style=\"text-align: center; font-size: 130%;\"> Per cambiare opzione ricompilare il modulo.</p><hr /><hr />";
            break;

        case "Solo venerdi":     //andiamo a prendere il prezzo del biglietto riguardante il venerdi
            $prezzo = "SELECT prezzo
                       FROM $table_name
                       WHERE tipo = 'venerdi' 
                       ";
            if ($resultQ = mysqli_query($connection, $prezzo)){
                $sol = mysqli_fetch_array($resultQ);
            }else{
                printf("<p><strong>Attenzione:</strong> la query non ha risultato!\n</p>");
                exit();
            }

            $_SESSION['item'] = "solo venerdi";
            $_SESSION['prezzo'] = $sol['prezzo'];
            $_SESSION['accessoPermesso'] = 1;

            $_SESSION['biglietto'] = 1;

            echo "<p style=\"font-size: 130%; color: white; font-family: cursive;\">Hai selezionato il biglietto per il venerdi.<br />Il prezzo 
            del biglietto &egrave;:<strong> " . $sol['prezzo'] . "</strong>. Per proseguire con l'acquisto del biglietto, clicca il bottone.</p>
            <br /><form style=\"margin: auto; justify-content: center;\" action=\"../carrello.php\" method=\"post\"><input style=\"border-radius: 10px; height: 12%;\" type=\"submit\" name=\"inv\"></input></form>
            <p style=\"text-align: center; font-size: 130%;\"> Per cambiare opzione ricompilare il modulo.</p><hr /><hr />";
            break;
    }

    }
}
    


?>


<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">

<head>
    <title>Acquista biglietto</title>
    <style>

        body{
            background-color: orange;
        }
        h1{
            color: red;
            font-size: 180%;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
        }

        p{
            text-align: center;
            font-size: 150%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        ul, li{
            font-size: 120%;
        }

        form{
            font-size: 140%;
            height: fit-content;
            width: fit-content;
        }

        select{
            border-radius: 10px;
            background-color: white;
            font-size: 90%;
            padding: 10px;
        }

        option{
            margin-top: 0.5%;
        }

        option:hover{
            background-color:lightpink;
            border-radius: 10px;
        }

        .seleziona{
            width: fit-content;
            height: fit-content;
            padding: 50px;
            margin: auto;
            justify-content: center;
            background-color: aqua;
            border-radius: 30px;
        }


    
    </style>

</head>

<body>

<h1>Acquista biglietto</h1>
<p>Le tre modalit&agrave; di acquisto sono:
    <ul>
        <li><strong>Biglietto completo</strong> (prove libere, qualifica e gara)</li>
        <li><strong>Solo venerdi</strong> (prove libere)</li>
        <li><strong>Sabato e domenica</strong> (qualifica e gara)</li>
    </ul>
</p>

<div class="seleziona">
    <h1>Scegli il tipo di biglietto: </h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" style="margin: auto; justify-content: center;">
        <select name="biglietto" size="3">
            <option>Biglietto completo</option>
            <option>Sabato e domenica</option>
            <option>Solo venerdi</option>
        </select><br />
        <input type="submit" name="invioB" value="Procedi" style="margin-top: 5%; border-radius: 5px;">
    </form>
</div>


</body>
</html>