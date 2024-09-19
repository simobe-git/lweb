<?php   

if(isset($_POST['invio'])){
    session_start();

    if(isset($_POST['giorno'])){
        if($_POST['giorno'] == "17 maggio"){
            $_SESSION['giorno'] = "17 maggio";
            }elseif($_POST["giorno"] == "18 maggio"){
                $_SESSION['giorno'] = "18 maggio";
            }elseif($_POST['giorno'] == "19 maggio"){
                $_SESSION['giorno'] = "19 maggio";
        }
    }
    echo "<p style=\"text-align: center;\">Hai selezionato il giorno <strong style=\"color: blue;\">" . $_POST['giorno'] . "</strong>
    . Se vuoi cambiare la tua scelta, ricompila il modulo pi&ugrave; in basso</p>
    <h1>Scegli il pilota da cui ricevere l'autografo.<br /> 
    <strong>N.B. In caso di pi&ugrave; piloti compila questa form pi&ugrave; volte.</strong></h1>

    <form action=\"../carrello.php\" method=\"post\" style=\"margin: auto; justify-content: center;\">
        <input type=\"radio\" name=\"lec\">Charles Leclerc<br />
        <input type=\"radio\" name=\"ver\">Max Verstappen<br />
        <input type=\"radio\" name=\"nor\">Lando Norris<br />
        <input type=\"radio\" name=\"ham\">Lewis Hamilton<br />
        <input type=\"radio\" name=\"alo\">Fernando Alonso<br />
        <input type=\"submit\" name=\"invioP\" value=\"Procedi\" style=\"margin-top: 5%; border-radius: 5px;\">
    </form>";
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
            background-color: papayawhip;
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

        input{
            margin-top: .5%;
        }

        .gg{
            width: fit-content;
            height: fit-content;
            padding: 50px;
            margin: auto;
            justify-content: center;
            background-color:goldenrod;
            border-radius: 30px;
        }


    
    </style>

</head>

<body>

<h1>Ricevi un autografo da uno o pi&ugrave; piloti</h1>
<p>
    Scegli un giorno ed un pilota (o di pi&ugrave;, in modo separato) per entrare in lista per ricevere un autografo.<br />
    Il costo per accedere alla zona autografi &egrave; di 50$.
</p>

<div class="gg">
    <h1>Scegli un giorno tra quelli disponibili: </h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" style="margin: auto; justify-content: center;">
        <select name="giorno" size="1" style="font-size: 80%; border-radius: 10px; height: 4ex;">
                <option value="17 maggio">Venerdi 17 maggio</option>
                <option value="18 maggio">Sabato 18 maggio</option>
                <option value="19 maggio">Domenica 19 maggio</option>
        </select><br />
        
        <input type="submit" name="invio" value="Continua" style="border-radius: 10px; height: 4ex;">
    </form>

</div>


</body>
</html>