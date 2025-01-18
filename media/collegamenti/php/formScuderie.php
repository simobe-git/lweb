<?php


if(isset($_POST["invio"])){
    switch($_POST["team"]){
        case "sf": header("Location: https://it.wikipedia.org/wiki/Scuderia_Ferrari");
            break;
        case "rb": header("Location: https://it.wikipedia.org/wiki/Red_Bull_Racing");
            break;
        case "mc": header("Location: https://it.wikipedia.org/wiki/McLaren");
            break;
        case "merc": header("Location: https://it.wikipedia.org/wiki/Mercedes-Benz");
            break;
        case "am": header("Location: https://it.wikipedia.org/wiki/Aston_Martin");
            break; 
        case "rbr": header("Location: https://it.wikipedia.org/wiki/File:Visa_Cash_App_Racing_Bulls.webp");
            break; 
        case "wll": header("Location: https://it.wikipedia.org/wiki/Williams_F1");
            break; 
        case "haas": header("Location: https://it.wikipedia.org/wiki/Haas_F1_Team");
            break; 
        case "stake": header("Location: https://it.wikipedia.org/wiki/Sauber_F1_Team");
            break; 
        case "al": header("Location: https://it.wikipedia.org/wiki/Renault_F1");
            break; 
    }
}

?>



?>

