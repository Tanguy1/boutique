<?php
    ////////////////////////////////////////////////////////////////////////////
    //INSCRIPTION
    ////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['subInscription']) && $_POST['subInscription'] == "Créer un Compte")
    {
        $identifiant = $_POST['identifiant'];
        $email = $_POST['email'];
        $reponse = $pdo->query("SELECT identifiant FROM client WHERE identifiant = '$identifiant'");
        $login = $reponse->fetch();

        $reponse = $pdo->query("SELECT email FROM client WHERE email = '$email'");
        $mail = $reponse->fetch();
        if (strtolower($_POST['identifiant']) == strtolower($login['identifiant']))
        {
            $erreur = "Ce nom d'utilisateur est déjà utilisé.";
            return;
        }
        elseif (strtolower($_POST['email']) == strtolower($mail['email']))
        {
            $erreur = "Cette adresse de mail est déjà utilisée.";
            return;
        }
        elseif (strtolower($_POST['mdp1']) != strtolower($_POST['mdp2']))
        {
            $erreur = "Mot de Pass différents";
            return;
        }
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp1 = $_POST['mdp1'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];
        $requete = $pdo->query("INSERT INTO client(nom, prenom, adresse, tel, email, mdp, identifiant)"
                . "VALUES('$nom', '$prenom', '$adresse', '$tel', '$email', '$mdp1', '$identifiant') ");
    }
    ////////////////////////////////////////////////////////////////////////////
    //CONNEXION
    ////////////////////////////////////////////////////////////////////////////    
    if(isset($_POST['subConnexion']) && $_POST['subConnexion'] == "Connexion")
    {
        $identifiant = $_POST['identifiant'];
        $mdp = $_POST['mdp'];
        $reponse = $pdo->query("SELECT identifiant FROM client WHERE identifiant = '$identifiant' AND mdp = '$mdp'");
        $login = $reponse->rowCount();

        if ($login > 0)
        {
            $_SESSION['pseudo'] = $identifiant;
            header('Location: accueil.php');
        }
        else
        {
            $erreur = "Les identifiants ne correspondent à aucun utilisateur ou les champs sont mal renseignés!";
        }
    }
    ////////////////////////////////////////////////////////////////////////////
    //AJOUTER UNE CATEGORIE
    ////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['subCat']) && $_POST['subCat'] == "Ajouter la Catégorie")
    {
        $categorie = $_POST['categorie'];
        $reponse = $pdo->query("SELECT nom FROM categorie WHERE nom = '$categorie'");
        $maCat = $reponse->fetch();
        if (strtolower($_POST['categorie']) == strtolower($maCat['nom']))
        {
            $erreur = "Cette Catégorie existe déjà.";
            return;
        }
        $requete = $pdo->query("INSERT INTO categorie(nom)"
                . "VALUES('$categorie') ");
    }
    ////////////////////////////////////////////////////////////////////////////
    //SUPPRIMER UNE CATEGORIE
    ////////////////////////////////////////////////////////////////////////////    
    if(isset($_POST['subCat']) && $_POST['subCat'] == "Supprimer la Catégorie")
    {
        $categorie = $_POST['categorie'];
        $reponse = $pdo->query("SELECT nom FROM categorie WHERE nom = '$categorie'");
        $maCat = $reponse->fetch();
        if (strtolower($_POST['categorie']) != strtolower($maCat['nom']))
        {
            $erreur = "Cette Catégorie n'existe pas ou a déjà été supprimé.";
            return;
        }
        $requete = $pdo->query("DELETE FROM categorie WHERE nom = '$categorie'");
    }
    ////////////////////////////////////////////////////////////////////////////
    //AJOUTER UN PRODUIT
    ////////////////////////////////////////////////////////////////////////////
    if(isset($_POST['subProd']) && $_POST['subProd'] == "Ajouter le Produit")
    {
        $produit = $_POST['produit'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $idCategorie = $_POST['idCategorie'];
        $requete = $pdo->query("INSERT INTO produit(titre, description, prix, categorie_id)"
                . "VALUES('$produit', '$description', '$prix', '$idCategorie') ");
    }
    ////////////////////////////////////////////////////////////////////////////
    //SUPPRIMER UN PRODUIT
    ////////////////////////////////////////////////////////////////////////////    
    if(isset($_POST['subProd']) && $_POST['subProd'] == "Supprimer le Produit")
    {
        $produit = $_POST['produit'];
        $reponse = $pdo->query("SELECT titre FROM produit WHERE titre = '$produit'");
        $monProd = $reponse->fetch();
        if (strtolower($_POST['produit']) != strtolower($monProd['titre']))
        {
            $erreur = "Aucun produit ne correspond à votre sélection.";
            return;
        }
        $requete = $pdo->query("DELETE FROM produit WHERE titre = '$produit'");
    }
?>
