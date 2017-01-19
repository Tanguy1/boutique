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
    $categories = $pdo->query("SELECT * FROM categorie ORDER BY nom")->fetchAll();
    echo '<br>';
?>  Catégorie <form action="accueil.php" method="post"><input type="text" name="categorie">
    <input type="submit" name="subCat" value="Ajouter la Catégorie">
    <input type="submit" name="subCat" value="Supprimer la Catégorie"></form>
    <br>
    
    
    
    
    Produits <form action="accueil.php" method="post">
    <input type="text" name="produit">
    <br>Description<br><textarea type="text" name="description"></textarea>
    <br>Prix<br><input type="text" name="prix">
    <br>Catégorie du Produit<br><select name="idCategorie">
<?php
            foreach ($categories as $value) {
?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value ['nom'] ?></option>
<?php
}
?>
            </select>
    <input type="submit" name="subProd" value="Ajouter le Produit">
    <input type="submit" name="subProd" value="Supprimer le Produit"></form>
<?php    if(isset($erreur)){ echo $erreur;}
    echo '<br>';
}




else
{
    include '_config.php';
    include 'inscription.php';
    $categories = $pdo->query("SELECT * FROM categorie ORDER BY nom")->fetchAll();
    echo '<br>';
?><script src="jquery.js" type="text/javascript"></script>
<script src="produits.js" type="text/javascript"></script>
<div id="filtre">
<?php    
?>
    <form>
        Produit <input type="text" name="produit">
        Catégorie <select name="idCategorie">
            <option></option>
<?php
            foreach ($categories as $value) {
?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value ['nom'] ?></option>
<?php
}
?>
            </select><input type="button" id="filtrer" value="filtrer"></form></div>
    <div id="listeProduits"></div>
<?php
}
?>