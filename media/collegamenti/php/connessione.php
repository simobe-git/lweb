<?php

$user = "root";
$password = "";
$db = "lweb";
$table_name = "utenti";

$connection = new mysqli("localhost", $user, $password, $db);

if( $connection == false){
    die("errore durante la connessione: " . $connection->connect_error);
}