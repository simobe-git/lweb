<?php

$user = 'root';
$password = 'homework2';  
$db = 'belli';     //nuovo nome al DB
$table_name = 'utenti';

$connection = new mysqli("localhost", $user, $password, $db);

if( mysqli_connect_errno() ){
    printf("errore di connessione con il DB: %s\n", mysqli_connect_error());
    exit();
}