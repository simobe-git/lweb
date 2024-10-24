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
