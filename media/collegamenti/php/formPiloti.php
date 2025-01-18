<?php

if(isset($_POST["invio"])){
    switch($_POST["pilota"]){
        case "Leclerc": header("Location: https://it.wikipedia.org/wiki/Charles_Leclerc");
            break;
        case "Verstappen": header("Location: https://it.wikipedia.org/wiki/Max_Verstappen");
            break;
        case "Sainz": header("Location: https://it.wikipedia.org/wiki/Carlos_Sainz_Jr.");
            break;
        case "Hamilton": header("Location: https://it.wikipedia.org/wiki/Lewis_Hamilton");
            break;
        case "Piastri": header("Location: https://it.wikipedia.org/wiki/Oscar_Piastri");
            break; 
        case "Perez": header("Location: https://it.wikipedia.org/wiki/Sergio_P%C3%A9rez_(pilota_automobilistico)");
            break; 
        case "Norris": header("Location: https://it.wikipedia.org/wiki/Lando_Norris");
            break; 
        case "Russell": header("Location: https://it.wikipedia.org/wiki/George_Russell_(pilota_automobilistico)");
            break; 
        case "Alonso": header("Location: https://it.wikipedia.org/wiki/Fernando_Alonso");
            break; 
        case "Ricciardo": header("Location: https://it.wikipedia.org/wiki/Daniel_Ricciardo");
            break;
        case "Stroll": header("Location: https://it.wikipedia.org/wiki/Lance_Stroll");
            break;
        case "Albon": header("Location: https://it.wikipedia.org/wiki/Alexander_Albon");
                break;
        case "Tsunoda": header("Location: https://it.wikipedia.org/wiki/Yuki_Tsunoda");
            break;
        case "Gasly": header("Location: https://it.wikipedia.org/wiki/Pierre_Gasly");
            break;
        case "Ocon": header("Location: https://it.wikipedia.org/wiki/Esteban_Ocon");
            break;
        case "Magnussen": header("Location: https://it.wikipedia.org/wiki/Kevin_Magnussen");
            break;
        case "Hulkenberg": header("Location: https://it.wikipedia.org/wiki/Nico_H%C3%BClkenberg");
            break;
        case "Bottas": header("Location: https://it.wikipedia.org/wiki/Valtteri_Bottas");
            break;
        case "Zhou": header("Location:https://en.wikipedia.org/wiki/Zhou_Guanyu");
            break;
        case "Sargeant": header("Location: https://it.wikipedia.org/wiki/Logan_Sargeant");
            break; 
    }
}

?>

