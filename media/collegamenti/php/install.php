<?php

include("connessione.php");	

//funzione che verifica la presenza di una tabella nel database
function if_table_exists ($conn, $tablename){
	//controllo se il nome della tabella passato esiste nel db
	$result = mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'");
	//conto il numero di righe risultanti
	$row=mysqli_num_rows($result);
	if($row>0){          //se $row è maggiore di 0
		return true;
	}else{	
		return false;
	}
}


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


if(if_table_exists($conn,"utenti"))
{
	//se la tabella esista non bisogra nè crearla nè popolarla
	//potrei anche mettere una stampa del tipo echo 'La tabella esiste!';
}
else{
	mysqli_query($conn, $tabellaUtenti);
		echo 'Tabella creata';
   	mysqli_query($conn,$aggiungiUtenti);
}


if(if_table_exists($conn,"biglietti")){ /*idem */ }
else{
	mysqli_query($conn,$tabellaBiglietti);
		echo 'Tabella creata';
   	mysqli_query($conn,$aggiungiBiglietti);
}

mysqli_close($conn);
?>
