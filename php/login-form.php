<?php
session_start();

require_once("connessione.php");

function carica_utenti() {
    return simplexml_load_file('../xml/utenti.xml');
}

//controlla se il pulsante è stato premuto e controllo utilizzo metodo post 
if(isset($_POST['login']) && $_SERVER["REQUEST_METHOD"] === "POST"){ 

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_utente = "SELECT email,password,username FROM utenti WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connessione,$query_utente);

    if(mysqli_num_rows($result)===1){        //significa che è stata trovata quella riga nel db

        //se dovesse servire qui va aggiunta associazione della riga ottenuta dalla query
        //con un array che conterrà gli elementi della riga

        $select_userName = "SELECT username
                                    FROM utenti
                                    WHERE email = \"{$_POST['email']}\" 
                                    AND password =\"{$_POST['password']}\"
                                    ";
        
        $resultQ = mysqli_query($connessione, $select_userName);

        $row = mysqli_fetch_array($resultQ);

        if ($row) { 
                $username = $row['username'];
                $_SESSION['username'] = $username;
                print_r($username);

                $utenti = carica_utenti();

                foreach ($utenti->utente as $utente) {
                    if ($utente->username == $username) {  //controlliamo che lo username dell'utente (che si trova nella base di dati) 
                                                    //coincida con quello del file xml, per impostarne il ruolo
                    // Credenziali corrette, imposta la sessione
                    $_SESSION['ruolo'] = (string)$utente->ruolo; // Salva il ruolo nella sessione
                    
                    // Reindirizza in base al ruolo
                    if ($_SESSION['ruolo'] == 'admin') {
                        $_SESSION['statoLogin'] = true;         //siamo loggati
                        header("Location: admin_dashboard.php");
                    } elseif($_SESSION['ruolo'] == 'cliente') {       //semplice cliente
                        $_SESSION['statoLogin'] = true;         //siamo loggati
                        header("Location: home.php");
                        exit;
                    }else{
                        header("Location: home.php");
                    }
                    exit();
                }
            }
        }
        
        exit();
    }
}else{
    echo"Errore";
}

?>