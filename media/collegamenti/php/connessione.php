<?php

// richiediamo i dati per la connessione al database
require_once("datiDiConnessione.php");

$connection = new mysqli($host, $user, $password, $db);

if( mysqli_connect_errno() ){
    printf("errore di connessione con il DB: %s\n", mysqli_connect_error());
    exit();
}