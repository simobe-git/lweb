INFO PRELIMINARI:

Questo documento di testo è il README relativo al primo 'homework' del corso Linguaggi per il Web, che comprende un codice HTML e un uso abbastanza frequente di CSS.

L'esercizio da me svolto vuole creare una pagina web sul mondo della Formula 1: l'idea iniziale era quella di emulare il più possibile la pagina ufficiale della F1, ma in realtà ho scelto di inserire cose che non sono sicuramente il top da un punto di vista estetico, ma che sono la prova che ho assimilato i concetti visti a lezione e provati nelle esercitazioni antecedenti alla stesura di questo homework. 

---------------------------------------------------------------------------------------------------
USO DI CSS:

L'uso di CSS fatto nel codice HTML riguarda: titoli stilizzati in un certo modo, stile di base del body, del tag 'nav' usato per contenere dei link alle voci 'Contatti', 'Regolamento' e 'Login' e con sotto-specializzazioni per gli elementi <ul> e <li> usati all'interno del 'nav' stesso. Ci sono poi delle classi create da me per separare delle aree nella pagina risultante, e queste classi hanno ciascuna un nome auto-esplicativo. Infine, ci sono delle classi che permettono di fare 'hover' con determinati stili.

Alcuni stili sono stati da me (ri)scritti all'interno del codice HTML stesso per cambiare alcuni stili già esistenti, ma di base questi stili già esistenti sono all'interno di un file chiamato externalStylesheet.css, il quale ovviamente viene richiamato all'interno del codice HTML.

Inoltre, ci sono vari box (tag 'div') al cui interno ho inserito immagini, testi e delle form. L'uso di questi 'div' mi è stato reso necessario quando ho deciso di voler mettere delle aree separate tra loro all'interno della pagina risultante, e queste aree le ho divise inserendo colori di sfondo diversi.

---------------------------------------------------------------------------------------------------
USO DI FORM:

Per quanto riguarda le form, ne ho create più d'una. In particolare ce ne sono due in cui si chiede di immettere rispettivamente un pilota ed un Team di Formula 1: una volta fatto ciò l'intento era (e sarà, nel corso del secondo 'homework' con l'uso di PHP) di reindirizzare l'utente a pagine che danno informazioni relative a quel pilota o a quel Team selezionato (solo uno).
Ci sono poi altre form, anche se non appaiono nella pagina principale: in una ci si accede premendo su 'login', e come dice la parola si reindirizza ad una pagina in cui si chiede a chi la visita di autenticarsi inserendo le credenziali. Se il visitatore non ha un account, si chiede di registrarsi e ci si reca in un'altra pagina dedicata alla registrazione. Sia nel caso del login che nel caso di registrazione l'utente verrà reindirizzato nella pagina principale. Qui l'intento era quello di 'salutare' l'utente loggato e contemporaneamente reindirizzarlo nella pagina principale nel caso di login, e di fare un recap dei dati immessi da chi si registra nel caso di registrazione. Tutto ciò con molta probabilità verrà fatto per il secondo 'homework'.
