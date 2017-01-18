<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
    </head>
    <body>
        <?php
        include '_config.php';
        include 'inscription.php';
        if(isset($erreur)){ echo $erreur;}
        ?>
        <form action="index.php" method="post">
            <label>Identifiant</label><input type="text" name="identifiant"><br>
            <label>Mot de Pass</label><input type="password" name="mdp1"><br>
            <label>Confirmer Mot de Pass</label><input type="password" name="mdp2"><br>
            <label>Nom</label><input type="text" name="nom"><br>
            <label>Prenom</label><input type="text" name="prenom"><br>
            <label>Telephone</label><input type="tel" name="tel"><br>
            <label>E-mail</label><input type="email" name="email"><br>
            <label>Adresse</label><textarea type="text" name="adresse"></textarea><br>
            <a href="connexion.php">Déjà Client</a><br>
            <input type="submit" value="Créer un Compte" name="subInscription">
        </form>
    </body>
</html>
