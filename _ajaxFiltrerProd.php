<?php
include '_config.php';


// Crée req sql (ms execute pas)
if(empty($_GET['produit']) && empty($_GET['idCategorie']))
{
    $sql = "SELECT * FROM produit";
}
elseif (empty ($_GET['produit']) && $_GET['idCategorie'])
{
    $sql = "SELECT produit.titre, categorie.nom 
FROM produit
		JOIN categorie ON categorie.id = produit.categorie_id
WHERE categorie.id=1";
}

// Execute req SQL
$produits = $pdo->query( $sql )->fetchAll();

?>

<table>
    <?php foreach ($produits as $prodAct){ ?>
    <tr>
        <td><?php echo $prodAct["titre"]; ?></td>
        <td><?php echo $prodAct["description"]; ?></td>
    </tr>
    <?php } ?>
</table>