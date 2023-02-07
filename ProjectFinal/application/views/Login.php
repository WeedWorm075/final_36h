 <?php 
   if(isset($_SESSION['erreur'])){
     $erreur = $this->session->erreur;
        echo $erreur;
   }
   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php 
        echo $message;
    ?>
    <form action="<?php echo site_url("welcome/verifierLogin"); ?>" method="post">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="mdp" placeholder="Mot de passe">
        <input type="submit" value="Sign in">
    </form>
    <a href="<?php echo site_url("welcome/bonjour/Fiderana"); ?> " >Click here</a>
</body>
</html>