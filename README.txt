INFO:

Studenti:
- Simone Belli, matricola 2024391
- Samuele Di Mario, matricola 2009541

E' possibile consultare tutti i file (contenuti nelle relative cartelle) di questo terzo homework su GitHub, seguendo i seguenti link:
- https://github.com/simobe-git/lweb/tree/3rdHomework
- https://github.com/ICON39/samuele.dimario.XML-DOM (a causa di una svista sono state effettuate modifiche con due account diversi perciò si noti il numero di collaboratori è 2)
oppure basta cercare gli utenti:
- 'simobe-git' e accedere alla branch denominata '3rdHomework' 
- 'ICON39' e accedere alla repository 'samuele.dimario.XML-DOM'
e successivamente ci si trova di fronte tutti i file necessari.

SCOPO:

L'esercizio svolto vuole creare una pagina web sul mondo della Formula 1: l'idea iniziale era quella di emulare il più possibile 
la pagina ufficiale della F1 ma ciò non è avvenuto come si può notare, poiché abbiamo cercato di applicare 
quanto più possibile gli argomenti affrontati durante le lezioni/esercitazioni antecedenti alla stesura di questo homework. 
---------------------------------------------------------------------------------------------------

DESCRIZIONE: 

Il progetto possiede una strutturata suddivisione in sottocartelle, in particolare vi sono altre sottocartelle che si occupano della completa implementazione del progetto come la cartella dedicata ai codici HTML per la visualizzazione del sito, quella PHP per l'implementazione degli script e quella relativa ai codici XML contenente informazioni e le relative grammatiche.

Come operazione preliminare per poter testare l'applicativo sarà importante eseguire lo script 'install.php' il quale crea e popola il database necessario, mentre i dati contenuti nel file 'datiDiConnessione.php' e 'connessione.php' servono per instaurare la connessione al DBMS.

Gli script PHP contenuti in 'media/collegamenti/php' servono, oltre che all'identificazione/registrazione dell'utente, a definire le operazioni che questo può eseguire nella propria area personale. In particolare in tale area si possono "prenotare" alcuni servizi gestiti dai file contenuti nel percorso 'media/collegamenti/php/prenotazioni' che permettono di gestire una diversa prenotazione a seconda del servizio di cui l'utente vuole usufruire.

Abbiamo cercato di rendere il codice modulare, come si può notare dai file 'menu.php' e menu2.php', richiamati all'interno di alcuni script per mostrare il menù. Tale distinzione avviene poiché i file vengono richiamati in pagine diverse che richiedono percorsi diversi per accedere ai collegamenti (link) all'interno di essi.
--------------------------------------------------------------------------------------------------

Dati di esempio:

I dati che vengono inseriti all'interno della tabella 'utenti' per effettuare il login sono i seguenti, nel formato 'USERNAME', 'EMAIL', 'PASSWORD':
    		('AAA','a@a.it','AAAA1?'),
		('Simone','simone@simone.com','Pass2!'),
		('abc123','abc@123.it','Pass3!'),
		('lweb!','l@web.com','Pass4!'),
		('2homework','2@hmw.com','Pass5!')";	

--------------------------------------------------------------------------------------------------

All'interno della propria area riservata possono essere acquistati uno o più servizi come l'acquisto di un biglietto, l'acquisto di un pass per accedere al paddock e un biglietto per ricevere un autografo da un pilota. 
Questi 3 servizi non vengono gestiti da file XML e sono anonimi, e quindi se si desidera acquistare (in modo fittizio) uno di questi 3 servizi il tutto verrà gestito senza tenerne traccia. In particolare, si può acquistare uno di questi 3 servizi e procedere al pagamento (che avviene in qualche modo che qui non abbiamo gestito).
Per quanto riguarda invece la prenotazione di un posto in tribuna per la gara di Monza, abbiamo gestito la/le prenotazione/prenotazioni in appositi file XML scritti qui di seguito. Ogni prenotazione effettuata viene tracciata nel file XML corrispondente, con l'informazione di chi l'ha acquistata (solo lo username) e poi mostrata a schermo, con la possibilità di eliminarla, modificarla o di aggiungerne di nuove.

Per quanto detto, gli sviluppi principali di questo terzo homework avvengono nell'utilizzo e nella gestione dei file XML suddivisi in tre tipologie:

- 'monoposto.xml', i cui record sono le informazioni che mostriamo agli utenti. All'interno notiamo la presenza di un collegamento con un file CSS per la creazione un'interfaccia grafica personalizzata che facilita la visualizzazione dei record. Inoltre abbiamo un collegamento con un file DTD il quale descrive la grammatica utilizzata

- 'prenotaPosto.xml' il quale contiene i dati utili a far prenotare un posto in tribuna per assistere ad una gara di Formula 1. I dati contenuti in questo file sono presenti nella tabella che mostra i nomi delle tribune e i posti che possono ospitare, insieme all'informazione su quale curva del tracciato ospita quella tribuna. 
Accedendo alla sezione 'Prenota ora il posto' nella propria area riservata si entrerà in una pagina in cui sono mostrate le tribune del circuito e i posti totali. 
In basso si può compilare una form in cui si va a prenotare un posto nella tribuna desiderata, 
e si può scegliere il numero di posto. Se questo è stato già prenotato, la prenotazione non verrà effettuata e bisognerà cambiare posto. 
Se invece il numero di posto immesso è fuori dai limiti della tribuna (perchè la tribuna può ospitare meno persone) verrà detto all'utente che il numero di posto non è disponibile. 
Se invece la prenotazione è andata a buon fine questa verrà stampata in una tabella situata nella pagina collegata alla form, ovvero in 'prenotazioniPosto.php' accessibile mediante link premendo su 'visualizza le tue prenotazioni'.
N.B. In questa tabella vengono ovviamente mostrate solo le prenotazioni effettuate dall'utente che in quel preciso momento è loggato.
Per descrivere la grammatica del file XML fare riferimento al file 'prenotaPosto.dtd'

- 'prenotazioni.xml' (si riferisce al file php 'prenotazioniPosto.php') permette di effettuare alcune operazioni all'utente con conseguente modifica di questo file.
Se ad esempio l'utente desidera eliminare, modificare o aggiungere prenotazioni i campi di questo file verranno appositamente modificati. Tramite questo file è inoltre possibile stampare le prenotazioni effettuate dall'utente nella pagina delle prenotazioni dei posti.
La grammatica associata al file XML è contenuta in un file XSD.

