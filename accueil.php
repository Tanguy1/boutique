<?php
session_start();
if(isset($_SESSION['pseudo']))
{
    echo "Bienvenu ".$_SESSION['pseudo']." ";
    echo "<a href='deconnexion.php'>Déconnexion</a>";
}
 else
{
    header('Location: connexion.php');
}
if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == 'Admin')
{
    include '_config.php';
    include 'inscription.php';
    echo '<br>';
    echo 'Catégorie <form action="accueil.php" method="post"><input type="text" name="categorie">'
    . '<input type="submit" name="subCat" value="Ajouter la Catégorie">'
    . " " .'<input type="submit" name="subCat" value="Supprimer la Catégorie"></form>';
    if(isset($erreur)){ echo $erreur;}
    echo '<br>';
}
else
{
    include '_config.php';
    include 'inscription.php';
}
?>