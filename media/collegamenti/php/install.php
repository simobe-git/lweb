<?php

//dati per la connessione al db provenienti da un altro script
require_once("datiDiConnessione.php");

//funzione che verifica la presenza di una tabella nel database
function if_table_exists ($connection, $tablename){
	//controllo se il nome della tabella passato esiste nel db
	$result = mysqli_query($connection,"SHOW TABLES LIKE '".$tablename."'");
	//conto il numero di righe risultanti
	$row=mysqli_num_rows($result);
	if($row>0){          
		return true;
	}else{	
		return false;
	}
}

//collegamento al dbms e creazione del database
$connection = new mysqli($host, $user, $password);

mysqli_query($connection, "DROP DATABASE IF EXISTS belli");          //eliminiamolo se esiste già
mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS belli");    //creiamo il DB
mysqli_query($connection, "USE belli");      //usiamo il DB

//creazione delle tabelle e loro popolamento (con dati scelti da me)
$tabellaUtenti=	"CREATE TABLE if NOT EXISTS utenti(
			username VARCHAR(30) NOT NULL ,
			email VARCHAR(20) NOT NULL ,
			password VARCHAR(30) NOT NULL ,
			PRIMARY KEY (username))";

$aggiungiUtenti = "INSERT INTO utenti (username,email,password) VALUES  
		('AAA','a@a.it','AAAA1?'),
		('Simone','simone@simone.com','Pass2!'),
		('abc123','abc@123.it','Pass3!'),
		('lweb!','l@web.com','Pass4!'),
		('2homework','2@hmw.com','Pass5!')";

$tabellaBiglietti =	"CREATE TABLE if NOT EXISTS biglietti(
    tipo VARCHAR(30) NOT NULL ,
    prezzo FLOAT(10) NOT NULL ,
    PRIMARY KEY (tipo))";

$aggiungiBiglietti = "INSERT INTO biglietti (tipo,prezzo) VALUES  
('completo', 109.99),
('sabdom', 84.99),
('venerdi', 34.99)";


if(if_table_exists($connection,"utenti"))
{
	//se la tabella esiste non bisogna nè crearla nè popolarla
	//potrei anche mettere una stampa del tipo "echo 'La tabella esiste!'";
}
else{
	mysqli_query($connection, $tabellaUtenti);
		echo 'Tabella creata';
   	mysqli_query($connection,$aggiungiUtenti);
}


if(if_table_exists($connection,"biglietti")){ /*idem */ }
else{
	mysqli_query($connection,$tabellaBiglietti);
		echo 'Tabella creata';
   	mysqli_query($connection,$aggiungiBiglietti);
}

mysqli_close($connection);
header("../../../terzoHomework.php");
?>
