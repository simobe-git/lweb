<?php

$emailError ="";
$passwordError="";

if(isset($_POST["invio"])) {
    if(isset($_POST["accept"])) {   
        if(empty($_POST["email"]) || empty($_POST["password"])) {
            echo "<p style=\"font-size: 130%; text-align: center; color: white;\">Attenzione: accesso negato! Dati mancanti.</p><hr style=\"border: solid 3px white;\"/>";
            if(empty($_POST["email"])) {
                $emailError = "Attenzione: email non immessa!<br />";
            }   
            elseif(empty($_POST["password"])){
                $passwordError = "Attenzione: passsword non immessa!<br />";
            }
        }
        else{
            
            require_once("connessione.php");
            // controllo dati dalla tabella
            $sql = "SELECT *
            FROM $table_name
            WHERE email = \"{$_POST['email']}\" 
                AND password =\"{$_POST['password']}\"
            ";
            
            if (!$resultQ = mysqli_query($connection, $sql)) {
                printf("<p><strong>Errore:</strong> la query non ha prodotto alcun risultato!\n</p>");
                exit();
            }

            $row = mysqli_fetch_array($resultQ);

            if ($row) { 
                session_start();
                $_SESSION['dataLogin'] = time();  
                $_SESSION['accessoPermesso'] = 1000;

                $select_userName = "SELECT username
                                    FROM $table_name
                                    WHERE email = \"{$_POST['email']}\" 
                                    AND password =\"{$_POST['password']}\"
                                    ";

                $_SESSION['username'] = $row['username'];

                header('Location: paginaPersonale.php');    // accesso alla pagina iniziale
                exit();
            }
            else
            echo "<p style=\"color: blue; font-size: 130%; text-align: center;\">Accesso negato! Non sei autorizzato ad entrare.</p>";
        }
    }
    else{
        echo "<p style=\"color: white; font-size: 120%;\">&Egrave; necessario fornire l'autorizzazione ai dati per poter proseguire! Riprova.</p><hr style=\"border: solid 3px white;\"/>";
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
    <title>Pagina di Login</title>

    <style>

        h1{
            text-align: center;
            font-size: 150%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        body{
            font-size: 120%;
            font-family: cursive;
            background-color: rgb(34, 160, 82);
        }

        fieldset{
            border-radius: 20px;
            background-color: rgb(197, 197, 107);
            width: 38%;
            margin-left: 31%;
            display: flex;
            align-items: left;
            margin-right: 31%;
        }

        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: left;
            width: 100%;
        }

        .emailpassword{
            display: flex;
            margin-bottom: 1%;
            margin-right: 50%;
            flex-direction: column;
            align-items: left;
        }

        .radio{
            display: flex;
            justify-content: left;
            align-items: left;
        }

        .submit{
            display: flex;
            margin-top: 2%;
        }

        .submit input{
            width: 15%;
            border-style: groove;
        }

        .submit input:hover{
            background-color: grey;
        }

        input{
            height: 30px;
            border-style: solid;
            border-radius: 10px;
            border-style: hidden;
        }

    </style>
</head>

<body>
    
    <h1>Pagina di login</h1>

    <p>
        Non sei ancora registrato? Clicca <a href="../html/registrazione.html">
            qui</a> per registrarti ed entrare nella pagina ufficiale della Formula 1. 
    </p>

    <fieldset>
        <legend>Immetti dati</legend> 

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <div class="emailpassword">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Inserisci email">
                <span style="color: red; font-size: 90%;"><?php echo $emailError ?></span>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Inserisci password">
                <span style="color: red; font-size: 90%"><?php echo $passwordError; ?></span>

            </div>

            <div class="radio">
                <input type="radio" name="accept">
                <label for="accept">Accetto e sottoscrivo i <a href="terminiUso.php">Termini e condizioni d'uso</a></label>  
            </div>

            <div class="submit">
                <input type="reset">
                <input type="submit" name="invio">
            </div>

        </form>


    </fieldset>

</body>