<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '_config.php';
        include 'inscription.php';
        if(isset($erreur)){ echo $erreur;}
        ?>
        <form action="connexion.php" method="post">
            <label>Identifiant</label><input type="text" name="identifiant"><br>
            <label>Mot de Pass</label><input type="password" name="mdp"><br>
            <input type="submit" value="Connexion" name="subConnexion">
        </form>
    </body>
</html>
