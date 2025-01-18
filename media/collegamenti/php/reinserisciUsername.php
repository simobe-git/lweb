<xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xml:lang="en" lang="en">

<head>
    <title>Reinserimento username</title>

    <style>
    
        body{
            background-color: red;
            font-family: 'Times New Roman', Times, serif;
        }

        .form{
            display: flex;
            justify-content: center;
            margin-right: 50%;
            align-items: left;
            margin: 10%;
            margin-top: 4%;
            border-color: white;
        }

        input{
            border-style: solid;
            height: 45px;
            border-radius: 15px;
            border-style: double;
        }

    </style>
</head>

<body>

<p style="color: white; font-size: 140%; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center;">
Errore: lo username inserito esiste gi&agrave;!<br /> Immetti un altro username.</p> 

<h1 style="text-align: center; color: white; font-size: 230%; margin-top: 50px;">Reinserisci username</h1>
<div class="form">
    <form action="paginaPersonale.php" method="post">
        <input type="text" name="nuovoUsername" placeholder="UserName"><br />
        <input style="border-radius: 10px; width: 100px; height: 30px;" type="submit" value="procedi" name="reinserisci">
    </form>
</div>


</body>
</html>