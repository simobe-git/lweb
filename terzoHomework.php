<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">


<head>
    <title>Terzo homework</title>

    <link rel="stylesheet" href="externalStylesheet.css" type="text/css" />
                                                                        
</head>

<?php 
session_start();



setcookie('accesso', '');
?>

<body>

    <div class="c">
       <?php require("media/collegamenti/php/menu.php"); ?>

        <button type="button" onclick="alert('Goditi la tua esperienza su questa pagina!')" id="hoverable" class="button"
        title="Cliccami">Benvenuto!</button>

    </div>

    <div class="container" style="border-width: 8px; border-style: solid; color: red;"> 
        
        <h2 style="font-size: 140%; text-align: center;">Formula 1</h2>

        <h3 style="color: white; text-align: center;">
            <marquee style="text-align: center; justify-content: center;" behavior="scroll" width="70%" direction="up" scrollamount="2">
                Pagina ufficiale della competizione</marquee>
        </h3>


        <div class="smallRightArea">
            <a class="noUnderlined blackHover" style="color: rgb(182, 162, 162);" href="media/collegamenti/html/contatti.html"
                >Contatti&nbsp;</a>
            <a class="noUnderlined blackHover" style="color: rgb(182, 162, 162);" href="media/collegamenti/html/regolamento.html"
                >Regolamento&nbsp;</a>
            <a class="noUnderlined blackHover" style="color: rgb(182, 162, 162);" href="#"
                >Licenza</a>
        </div>

    </div>

    <div class="mainArea" style="background-color: rgb(161, 151, 151);">
        <article>
            <h3>
               <a style="text-decoration: none; color: blue;" href="media/collegamenti/html/storiaDellaCompetizione.html"
               title="Un passo nella storia">Storia della competizione</a>
            </h3>
            La Formula 1 &egrave; il pi&uacute; grande manifesto sportivo di velocit&aacute; e continua ingegnerizzazione nel complesso
            mondo del Motorsport. Competizione che da quando &egrave; nata - nel 1959 - ha sempre suscitato grande scalpore ed &egrave; 
            uno sport che continua a regalare grandi emozioni a tutti i fan della competizione.<br />
            Scopriamone alcune peculariet&aacute; dalla sua nascita.
        </article>

        <hr />

        <article>
            <h3>
                <a style="text-decoration: none; color: blue;" href="media/collegamenti/html/grandiPilotiStoria.html"
                title="I migliori piloti">I pi&uacute; grandi piloti della Storia</a>
            </h3>         
            A guidare le monoposto di Formula 1 ci pensano degli atleti che con l'evoluzione negli anni delle monoposto devono farsi trovare
            sempre pi&uacute; pronti fisicamente e mentalmente. Scopriamo chi sono stati i pi&uacute; grandi piloti nella storia della 
            pi&uacute; grande competizione del motorsport a livello mondiale.
        </article>

        <hr />

        <article>
            <h3>
                <a style="text-decoration: none; color: blue;" href="media/collegamenti/html/circuitiIconici.html"
                title="I circuiti che hanno segnato un'epoca">I circuiti pi&uacute; iconici</a>
            </h3>
            Teatri di mille emozioni - ma anche di tante disfatte - i circuiti su cui si corrono le gare di Formula 1 devono
            rispettare altissimi standard di sicurezza. Entriamo nella lista dei circuiti che hanno fatto la storia della classe regina
            del Motorsport e che rimarrano ancora a lungo nei cuori degli appassionati.
        </article>

        <hr />

        <article>
            <h3>
                <a style="text-decoration: none; color: blue;" href="media/collegamenti/html/anniPrecedenti.html"
                title="Classifiche passate dei campionati piloti e costruttori">Anni precedenti</a>
            </h3>
            A volte il campionato Piloti e il campionato Costruttori sono vinti da piloti o Team che non sono riusciti a conquistare
            i rispettivi titoli l'anno precedente, o che quantomeno migliorano le prestazioni - e di conseguenza anche i risultati - 
            rispetto alle precedenti annate. Vediamo nel dettaglio come sono andati gli ultimi 10 campionati di F1.  
        </article>
       

    </div>

    <div class="WCCarea">
        <h2>Classifica Costruttori</h2>
        <table border="1" cellspacing="1" cellpadding="10" style="margin: 10%; table-layout: auto; margin-top: auto; border-color: red;">
            
            <caption style="font-size: 115%;"> <a href="media/collegamenti/html/WCCcompleta.html">Qui</a> la classifica costruttori completa </caption> <!-- metterla sotto, scritta + piccola e togliere sottolineatura-->
            <thead style="background-color: rgb(159, 24, 24);">
            <tr>
                <th></th>
                <th>Team</th>
                <th>Punti</th>
            </tr>
            </thead>

            <tbody style="background-color: rgb(212, 201, 201); color: blue">

                <col style="background-color: white; width: 33%;"/>
                <col style="background-color: rgb(235, 127, 12); width: 33%;" />
                <col style="background-color: rgb(64, 171, 48); width: 33%;" />

                <tr>
                    <th>
                        <img style="display: block; margin: 0 auto;" src="media/img/Logo/redbull.png" 
                        width="100%"
                        height="100%"
                        alt="not found"/>
                    </th>
                    <th>
                        Red Bull
                    </th>
                    <th>
                        97
                    </th>
                </tr>
                <tr>
                    <th>
                        <img style="display: block; margin: 0 auto;" src="media/img/Logo/LogoFerrari.png"
                        width="30%"
                        height="30%"
                        alt="not found"/>
                    </th>
                    <th>
                        Ferrari
                    </th>
                    <th>
                        93
                    </th>
                </tr>
                <tr>
                    <th>
                        <img style="display: block; margin: 0 auto;" src="media/img/Logo/logoMcLaren.png"
                        width="50%"
                        height="40%"
                        alt="not found"/>
                    </th>
                    <th>
                        McLaren
                    </th>
                    <th>
                        55
                    </th>
                </tr>

            </tbody>

        </table>

    </div>
   
    <div class="WPCarea" style="margin-top: 0px;">

        <h2>Classifica Piloti</h2>
        
        <table align="center" border="1" cellspacing="1" cellpadding="10" style="margin: auto auto 10% auto; table-layout: auto; margin-top: auto; border-color: red;">

            <caption style="font-size: 115%; width: 120%;"> <a href="media/collegamenti/html/WPCcompleta.html">
                Qui</a> la classifica piloti completa </caption> 
            <thead style="background-color: rgb(159, 24, 24);">
            <tr>
                <th>Pilota</th>
                <th>Punti</th>
            </tr>
            </thead>

            <tbody style="color: blue;">
                <col style="background-color: rgb(40, 88, 171); width: auto;" />
                <col style="background-color: rgb(92, 85, 85); width: auto;" />
                <tr>
                    <th>
                        Max Verstappen
                    </th>
                    <th>
                        51
                    </th>
                </tr>
                <tr>
                    <th>
                        Charles Leclerc
                    </th>
                    <th>
                        47
                    </th>
                </tr>
                <tr>
                    <th>
                        Sergio Perez
                    </th>
                    <th>
                        46
                    </th>
                </tr>

            </tbody>


        </table>

    </div>
    
    <div class="newsTable" style="margin-top: 20%">
    <h1 style="position: relative; top: 20px;">
        <a name="news">News</a>
    </h1>

    <table border="0" cellspacing="1" cellpadding="15">

        <tbody>
            <tr> 
                <td>
                    <img style="margin-left: 2%;"
                    src="media/img/AusPartenza2024.jpg"
                    width="100%"
                    height="68%"
                    alt="niente"/>
                </td>

                <td>
                    <img style="margin-left: 5%;"
                    src="media/img/aggRB.jpg"
                    width="85%"
                    alt="niente"/>
                </td>

                <td>
                    <img style="margin-left: -6%;"
                    src="media/img/prevMeteo.jpg"
                    width="100%"
                    height="68%"
                    alt="niente"/>
                </td>

            </tr>
            <tr>
                <th>
                    <a class="noUnderlined" href="media/collegamenti/html/recapGaraAustralia.html" style="font-size: 150%;"
                    title="Riassunto del GP di Melbourne">Recap gara Australia</a>
                </th>
                <th>
                    <a class="noUnderlined" href="media/collegamenti/html/aggiornamentoMonoposto.html" style="font-size: 150%;"
                    title="Alcune novit&aacute; portate dai Team">Aggiornamenti monoposto</a>
                </th>
                <th>
                    <a class="noUnderlined" href="media/collegamenti/html/previsioniMeteo.html" style="font-size: 150%;"
                    title="Scopriamo se ci saranno problemi meteorologici">Previsioni meteo</a>
                </th>
               
            </tr>
        </tbody>

    </table>    
    </div>
    
    <div class="favConstructorArea">

        <h2>Seleziona una scuderia</h2> 
        <p style="text-align: center; font-size: 120%;">
            Scegli una scuderia per scoprire cose che (forse) non sapevi.
        </p>

        <form action="media/collegamenti/php/formScuderie.php" method="post" style="width: 20%; margin: auto;">
            <select name="team" size="5" style="font-size: 75%;">
                <option value="sf">Scuderia Ferrari</option>
                <option value="rb">Red Bull Racing</option>
                <option value="mc">McLaren</option>
                <option value="merc">Mercedes</option>
                <option value="am">Aston Martin</option>
                <option value="rbr">Racing Bulls</option>
                <option value="wll">Williams</option>
                <option value="haas">Haas</option>
                <option value="stake">Stake F1 Team</option>
                <option value="al">Alpine</option>
            </select><br />
            <input type="submit" name="invio">
        </form>

        <h2>Seleziona un pilota</h2> 
        <p style="text-align: center; font-size: 120%;">
            Scegli un pilota per visualizzarne dei dettagli.
        </p>

        <form action="media/collegamenti/php/formPiloti.php" method="post" style="width: 20%; margin: auto;">
            <select name="pilota" size="5" style="font-size: 75%;">
                <option value="Leclerc">Charles Leclerc</option>
                <option value="Verstappen">Max Verstappen</option>
                <option value="Sainz">Carlos Sainz</option>
                <option value="Hamilton">Lewis Hamilton</option>
                <option value="Piastri">Oscar Piastri</option>
                <option value="Perez">Sergio Perez</option>
                <option value="Norris">Lando Norris</option>
                <option value="Russell">George Russell</option>
                <option value="Alonso">Fernando Alonso</option>
                <option value="Ricciardo">Daniel Ricciardo</option>
                <option value="Stroll">Lance Stroll</option>
                <option value="Albon">Alexander Albon</option>
                <option value="Tsunoda">Yuki Tsunoda</option>
                <option value="Gasly">Pierre Gasly</option>
                <option value="Ocon">Esteban Ocon</option>
                <option value="Magnussen">Kevin Magnussen</option>
                <option value="Hulkenberg">Niko Hulkenberg</option>
                <option value="Bottas">Valteri Bottas</option>
                <option value="Zhou">Zhou Guanyu</option>
                <option value="Sargeant">Logan Sargeant</option>
            </select><br />
            <input type="submit" name="invio">
        </form>

    </div>

    <h3 style="margin-top: 80px; font-size: 150%; margin-left: 30px;">Divertiti giocando!</h3>
    <p style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white; margin-left: 2%;">
        Fai clic su una delle 10 monoposto presenti (pi&ugrave; o meno al centro) per accedere al corrispettivo sito ufficiale.
    </p>

    <div class="cliccable">
        <img src="media/img/i20team.jpg"
        width="auto"
        height="auto"
        usemap="#immagineCliccabile"
        alt="immagine non trovata"/>

        <map name="immagineCliccabile" id="imm">
            <area target="ferrari" shape="circle" coords="235,310,10" href="https://www.ferrari.com/it-IT/formula1" alt="not found"/>
                <!-- i numeri delle coordinate rappresentano la x del centro, la y del centro e la lunghezza del diametro
                     il tutto misurato a partire dal punto (0,0) del div. Più si aumenta la coordinata x e più si va a destra,
                    più aumenta la coordinata y e più si va verso il basso. La terza coordinata modifica la dimensione del cerchio -->
            <area target="mercedes" shape="circle" coords="145,390,10" href="https://www.mercedesamgf1.com/" alt="not found"/>
            <area target="alpine" shape="circle" coords="290,250,10" href="https://www.alpinecars.it/formula-1/squadra-f1.html" alt="not found"/>
            <area target="astonmartin" shape="circle" coords="345,210,10" href="https://www.astonmartinf1.com/en-GB/" alt="not found"/>
            <area target="alfaromeo" shape="circle" coords="395,175,10" href="https://www.sauber-group.com/feed" alt="not found"/>
            <area target="haas" shape="circle" coords="590,180,10" href="https://www.haasf1team.com/" alt="not found"/>
            <area target="williams" shape="circle" coords="650,210,10" href="https://www.williamsf1.com/" alt="not found"/>
            <area target="alphatauri" shape="circle" coords="690,265,10" href="https://www.visacashapprb.com/en/" alt="not found"/>
            <area target="mclaren" shape="circle" coords="765,320,10" href="https://www.mclaren.com/racing/" alt="not found"/>
            <area target="redbull" shape="circle" coords="880,385,10" href="https://www.redbullracing.com/int-en" alt="not found"/>
        </map>
    </div>

    <footer>
        <p>&copy; 2024 &nbsp; Pagina Formula 1</p>
    </footer>

</body>
</html>
