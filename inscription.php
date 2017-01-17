<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VerifInscription</title>
    </head>
    <body>
        <?php
            include 'index.php';
            include '_config.php';
            $identifiant = $_POST['identifiant'];
            $email = $_POST['email'];
            $reponse = $pdo->query('SELECT identifiant FROM client WHERE identifiant = "' . $_POST['identifiant'] . '" ');
            $login = $reponse->fetch();
             
            $reponse = $pdo->query('SELECT email FROM client WHERE email = "' . $_POST['email'] . '" ');
            $mail = $reponse->fetch();
            if (strtolower($_POST['identifiant']) == strtolower($login['identifiant']))
            {
                $erreur = "Ce nom d'utilisateur est déjà utilisé.";
            }
            elseif (strtolower($_POST['email']) == strtolower($mail['email']))
            {
                $erreur = "Cette adresse de mail est déjà utilisée.";
            }

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mdp1 = $_POST['mdp1'];
            $adresse = $_POST['adresse'];
            $tel = $_POST['tel'];
            $requete = $pdo->query('INSERT INTO client VALUES(:identifiant) ');
?>
    </body>
</html>
