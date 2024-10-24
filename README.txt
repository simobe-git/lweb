INFO PRELIMINARI:

Studenti:
- Simone Belli, matricola 2024391
- Samuele Di Mario, matricola 2009541

Questo documento di testo è il README relativo al terzo homework di Linguaggi per il Web, che 
comprende frammenti di codice PHP accompagnato da alcuni collegamenti al Database.
Per fare ciò abbiamo usato PhPMyAmdin.

E' possibile consultare tutti i file (contenuti nelle relative cartelle) di questo terzo homework su GitHub, seguendo i seguenti link:
- https://github.com/simobe-git/lweb/tree/3rdHomework
- https://github.com/ICON39/xml-dom
oppure basta cercare gli utenti:
- 'simobe-git' e accedere alla branch denominata '3rdHomework' 
- 'ICON39' git di Samuele e la repository 'samuele.dimario.XML-DOM'
e successivamente ci si trova di fronte tutti i file necessari.


L'esercizio svolto vuole creare una pagina web sul mondo della Formula 1: l'idea iniziale era quella di emulare il più possibile la pagina ufficiale della F1, ma in realtà ho scelto di inserire cose che non sono sicuramente il top da un punto di vista estetico, ma che sono la prova che ho assimilato i concetti visti a lezione e provati nelle esercitazioni antecedenti alla stesura di questo homework. 
---------------------------------------------------------------------------------------------------
All'interno della macro-cartella contenente l'homework ci sono altre sottocartelle. In particolare ci sono quelle dedicate ai codici HTML, ai codici PHP e ai codici XML con le relative grammatiche.
Nella sottocartella 'php', all'interno della cartella 'media' e della sottocartella 'collegamenti', ci sono tutti i file php utili allo sviluppo di questo homework. 
Sono infatti presenti file che gestiscono il login, la registrazione, l'accesso all'area riservata dopo aver completato una delle due fasi appena citate, l'inserimento al database dei dati immessi dall'utente e altro ancora. 
Una volta dentro l'area riservata si possono "prenotare" alcuni servizi, e questi sono  gestiti dai file contenuti in un'altra sottocartella, chiamata 'prenotazioni'. Poiché si possono effettuare 3 prenotazioni diverse, in essa ci sono 3 file diversi.
Per creare la BD c'è un file apposito chiamato 'install.php', e per gestire la connessione al database in alcuni script viene richiamato più volte il file 'connessione.php'.
I dati richiesti per instaurare la connessione al DBMS e creare il DB sono contenuti nel file 'datiDiConnessione.php'.
Il fatto di rendere modulare il codice lo si trova anche nei due file 'menu.php' e menu2.php', dato che essi vengono richiamati all'interno di alcuni script per far vedere a video il menù. Ne ho creati due perché essi sono stati richiamati in pagine diverse, che richiedono percorsi diversi per accedere ai collegamenti (link) all'interno di essi.
--------------------------------------------------------------------------------------------------
I dati che vengono inseriti all'interno della tabella 'Utenti' per effettuare il login sono i seguenti, nel formato 'USERNAME', 'EMAIL', 'PASSWORD':
    		('AAA','a@a.it','AAAA1?'),
		('Simone','simone@simone.com','Pass2!'),
		('abc123','abc@123.it','Pass3!'),
		('lweb!','l@web.com','Pass4!'),
		('2homework','2@hmw.com','Pass5!')";	
--------------------------------------------------------------------------------------------------
Questo terzo homework presenta differenze dagli altri due solamente nell'utilizzo e nella gestione di file XML. Abbiamo creato 3 diversi file XMl:
- 'monoposto.xml', che è semplicemente un file XML contenente vari record e che ci permette di visualizzare a schermo le informazioni scritte nel file stesso in modo semplice ed intuitivo. Il file è collegato ad un codice CSS che crea un'interfaccia grafica personalizzata, e fa riferimento ad una grammatica (DTD) presente nell'apposita cartella all'interno della cartella 'media'->'collegamenti'->'xml'.
- 'prenotaPosto.xml' è un file che ci permetterà, dalla homepage dell'applicazione, di prenotare un posto in tribuna per assistere ad una gara di Formula 1. Accedendo infatti alla sezione 'Prenota il posto' nel box in verde della homepage si entrerà in una pagina in cui sono mostrate le tribune del circuito e i posti totali. In basso si può compilare una form in cui si va a prenotare un posto nella tribuna desiderata, e si può scegliere il numero di posto. Se questo è stato già prenotato, la prenotazione non verrà effettuata e bisognerà cambiare posto. Se invece il numero di posto immesso è fuori dai limiti della tribuna (perchè la tribuna può ospitare meno persone) verrà detto all'utente che il numero di posto non è disponibile. 
La grammatica di 'prenotaPosto.xml' è contenuta in un file DTD chiamato 'prenotaPosto.dtd'.
Se la prenotazione è andata a buon fine verrà stampata in una tabella nella pagina collegata alla form, ovvero 'prenotazioniPosto.php'.
- 'prenotazioni.xml' (che si riferisce al file php 'prenotazioniPosto.php') che permette di visualizzare le prenotazioni effettuate e di aggiungerne altre, rimuoverle oppure tornare alla homepage. Se l'utente sceglie di aggiungere o eliminare una prenotazione verrà conseguentemente modificato il file XML corrispondente, che quindi si aggiornerà con i dati aggiunti o eliminati. 
La grammatica di questo file XML è contenuta in un file XSD, situtato anch'esso nell'apposta cartella.
