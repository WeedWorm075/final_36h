<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="welcome/manahoana" method="get">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="adresse" placeholder="Provenance">
        <input type="submit" value="Entrer">
    </form>
    <a href="<?php echo site_url("welcome/bonjour/Fiderana"); ?> " >Click here</a>
</body>
</html>