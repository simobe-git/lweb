<?php
$cf = $_POST["cf"];
$password = $_POST["password"];
$riprova = 0;  //se 0 non ci sono stati errori nell'inserimento dei 
                //dati, altrimenti l'utente deve cambiare qualcosa.
$phoneNumber = $_POST["numTel"];
$err = "";
$msg="";

if(isset($_POST["invio"])){
    
    if (!preg_match("/^[a-zA-Z\s]+$/", $_POST["nome"])) {
        $riprova = 1;
        $err .= "- Il nome può contenere solo lettere e spazi\n";
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $_POST["cognome"])) {
        $riprova = 1;
        $err .= "- Il cognome può contenere solo lettere e spazi\n";
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $riprova = 1;
        $err .= "- L'indirizzo email non è valido\n";
    }

    if (!preg_match("/^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$/", $cf)) {
        $err .= "- Il codice fiscale non è nel formato corretto (AAAAAA00A00A000A)\n";
        $riprova = 1;
    }

    // la città di nascita accetta solo lettere, spazi e apostrofi
    if (!preg_match("/^[a-zA-Z\s']+$/", $_POST["cittaNascita"])) {
        $riprova = 1;
        $err .= "- La città può contenere solo lettere, spazi e apostrofi\n";
    }

    // il numero inserito accetta esattamente 10 cifre
    if (!preg_match("/^[0-9]{10}$/", preg_replace("/[-\s]/", "", $phoneNumber))) {
        $err .= "- Il numero di telefono deve contenere esattamente 10 cifre\n";
        $riprova = 1;
    }

    // lunghezza minima password: 6 caratteri
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])[A-Za-z\d@#\-_$%^&+=§!\?]{6,20}$/', $password)) {
        $err .= "- La password non rispetta i requisiti.\n";
        $riprova = 1;
        
        if (strlen($password) < 6 || strlen($password) > 20) {
            $msg .= "- La password deve essere tra 6 e 20 caratteri\n";
        }
        if (!preg_match('/[a-z]/', $password)) {
            $msg .= "- deve contenere almeno una lettera minuscola\n";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $msg .= "- deve contenere almeno una lettera maiuscola\n";
        }
        if (!preg_match('/\d/', $password)) {
            $msg .= "- deve contenere almeno un numero\n";
        }
        if (!preg_match('/[@#\-_$%^&+=§!\?]/', $password)) {
            $msg .= "- deve contenere almeno un carattere speciale (@#-_$%^&+=§!?)\n";
        }
    }

    // controllo conferma password
    if ($_POST["password"] !== $_POST["cpassword"]) {
        $err .= "- Le password non coincidono\n";
        $riprova = 1;
    }
}

?>


<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">

<head>
    <title>Pagina di registrazione</title>

    <style>

        body{
            background-color: salmon;
            font-size: 140%;
        }

        h1{
            font-size: 300%;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            color: red;
        }


        fieldset{
            margin: 10px;
            border-style: solid;
            border-color: black;
            border-radius: 8px;
            margin-left: 35%; 
            width: 30%;
            font-size: 130%;
        }

        .form{
            display: flex;
            margin-right: 50%;
            flex-direction: column;
            align-items: left;
            margin: 10%;
            margin-top: 4%;
        }

        .radio{
            display: flex;
            justify-content: left;
            align-items: left;
            margin-top: 5%;
        }

        .submit{
            display: flex;
            margin-top: 3%;
        }

        .submit input{
            width: 40%;
        }

        .submit input:hover{
            background-color: grey;
        }

        input{
            width: fit-content;
            margin-bottom: 3%;
            height: 45px;
            border-radius: 15px;
            border-style: double;
        }

        li{
            color: yellow;
            margin-top: .5%;
        }

    </style> 

</head>

<body>

<?php if($riprova == 1){ ?>
<p style="font-size: 120%; font-family: cursive;">Ops! La compilazione dei dati ha portato ai seguenti errori: </p>
<p style="color: white; font-size: 120%;"> <?php echo $err ?> </p>

<h2 style="font-size: 200%; text-align: center;";>Reinserisci i dati</h2>

<fieldset>
    <legend>Reinserisci Dati</legend>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <div class="form">
            <label for="nome">Nome </label>
            <span style="color: white; font-size:60%;">No numeri e/o caratteri speciali</span>
            <input type="text" name="nome" size="20" placeholder="Nome" required>

            <label for="cognome">Cognome</label>
            <span style="color: white; font-size:60%;">No numeri e/o caratteri speciali</span>
            <input type="text" name="cognome" size="20" placeholder="Cognome" required>

            <label for="cf">Codisce fiscale</label>
            <span style="color: white; font-size:60%;">No caratteri speciali e minuscoli</span>
            <input type="text" size="20" name="cf" maxlength="16" placeholder="Inserisci codice fiscale" required>

            <label for="nascita">Data di nascita</label>
            <input type="date" name="dataNascita" placeholder="gg/mm/aaaa" required>

            <label for="cittaNascita">Citt&aacute; di nascita</label>
            <span style="color: white; font-size:60%;">No numeri e/o caratteri speciali</span>
            <input type="text" size="25" name="cittaNascita" required>

                <div class="radio">
                    <label style="margin-top: -4%;" for="sesso">Sesso:</label>

                    <label style="margin-top: 3%;" for="maschio">Maschio</label>
                    <input type="radio" name="sesso">

                    <label style="margin-top: 3%; margin-left: 5%;" for="femmina">Femmina</label>
                    <input type="radio" name="sesso">
                </div>

            <label for="numTel">Recapito telefonico</label>
            <span style="color: white; font-size:60%;">No Prefisso</span>
            <input type="tel" name="numTel" size="20" placeholder="123-456-7890" required>
            
            <label for="email">Email</label>
            <input type="email" size="25" name="email" placeholder="esempio@dominio" required>

            <label for="password">Password</label>
            <span style="color: white; font-size:60%;">Deve contenere almeno un numero, un carattere maiuscolo, un carattere minuscolo ed uno speciale. 6-20 caratteri</span>
            <input type="password" size="20" name="password" placeholder="Inserisci password" required>
            <span style="color: red; font-size:80%;"><?php echo $msg ?></span>
                
            <label for="password">Conferma password</label>
            <input type="password" size="20" name="cpassword" placeholder="Reinserisci password" required>

                <div class="submit">
                    <input type="reset" value="Reset">
                    <input type="submit" name="invio" value="Registrati">
                </div>
        </div>
    </form>
</fieldset>
<?php }elseif($riprova == 0){ 
    session_start();
    $_SESSION['dataLogin'] = time();
    $_SESSION['accessoPermesso'] = 100;
    
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
?>


<h2 style="text-align:left;">Registrazione andata a buon fine. Qui trovi il riepilogo dei dati immessi</h2>
<p>Hai inserito i seguenti dati:</p>
<ul style="font-family: Arial, Helvetica, sans-serif;">
    <li>
        <strong>Nome: </strong></strong><?php echo $_POST["nome"] ?>
    </li>
    <li>
        <strong>Cognome: </strong><?php echo $_POST["cognome"] ?>
    </li>
    <li>
        <strong>Codice fiscale: </strong><?php echo $_POST["cf"] ?>
    </li>
    <li>
        <strong>Data di nascita: </strong><?php echo $_POST["dataNascita"] ?>
    </li>
    <li>
        <strong>Citt&agrave; di nascita: </strong><?php echo $_POST["cittaNascita"] ?>
    </li>
    <li>
        <strong>Sesso: </strong>
        <?php if(isset($_POST["sessoM"])){ 
                echo "maschio"; 
              } 
              elseif(isset($_POST["sessoF"])){
                echo "femmina";
              } 
              else echo "non selezionato. Puoi modificarlo quando vuoi nelle impostazioni."; ?>
    </li>
    <li>
        <strong>Numero di telefono: </strong><?php echo $_POST["numTel"] ?>
    </li>
    <li>
        <strong>Email: </strong><?php echo $_POST["email"] ?>
    </li>
    <li>
        <strong>Password: </strong><?php echo $_POST["password"] ?>
    </li>
</ul>

<p><strong>Attenzione: </strong>ti ricordiamo di tenere al sicuro la tua password e di non condividerla con altre persone.<br ></p>

<p>Prima di continuare, scegli uno username:</p>
<form action="paginaPersonale.php" method="post">
    <input type="text" name="username" placeholder="UserName">
    <input type="submit" value="procedi" name="invia">
    <input type="hidden" name="accesso" value="100">
</form>

<p>Clicca sul pulsante <em>procedi</em> qui sopra per iniziare la tua esperienza sul sito della Formula 1: verrai 
reindirizzato nella tua area riservata.</p>


<?php } ?>

</body>
</html>