<?php

if(isset($_POST["send"])){
    if($_POST['season'] == "2020"){
        header("Location: 2020.php");
    }
    if($_POST['season'] == "2021")
        header("Location: 2021.php");
    if($_POST['season'] == "2022")
        header("Location: 2022.php");
    if($_POST['season'] == "2023")
        header("Location: 2023.php");
}
