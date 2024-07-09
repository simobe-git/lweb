<?php 

session_start();
 if( (isset($_POST['free'])) || (isset($_POST['vip'])) ){
    if(isset($_POST['free'])){
        $_SESSION['pass'] = 1;
    }elseif(isset($_POST['vip'])){
        $_SESSION['pass'] = 2;
    }
    header("Location: ../carrello.php");
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
            background-color: yellow;
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
            font-size: 130%;
        }
    
        form{
            border-radius: 20px;
            background-color: red;
            height: fit-content;
            width: fit-content;
            font-size: 150%;
            margin: auto;
            justify-content: center;
            padding: 20px;
        }

        input{
            border-radius: 10px;
            height: 5ex;
            width: auto;
        }

    </style>

</head>

<body>

<h1>Accesso al Paddock di Formula 1</h1>
<p>Ci sono 2 tipi di pass per accedere al paddock di F1:
    <ul>
        <li>
            <em style="color: red;">VIP PASS:</em> puoi incontrare tutti i piloti, ingegneri e meccanici presenti nella pit-lane ed osservare da molto vicino
            le monoposto di F1. In alcune fasce orarie &egrave; anche possibile chiedere autografi.<br />
            <strong>Prezzo:</strong>150$ al giorno.
        </li>
        <li>
        <em style="color: red;">FREE PASS:</em>: puoi accedere all'hospitality di una scuderia a tua scelta ed incontrare tutto il personale del Team scelto.  <br />
            <strong>Prezzo: </strong>75$ al giorno. 
        </li>
    </ul>
</p>

<h1>Scegli quale PASS acquistare:</h1>
<h1>Verra reindirizzato al carrello per effettuare il pagamento</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" name="vip" value="VIP PASS">
    <input type="submit" name="free" value="FREE PASS">
</form>


</body>
</html>