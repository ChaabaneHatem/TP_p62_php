<?php
require_once 'data/data.php';
require_once 'function/markup_produit_catalogue.php';
require_once "function/filtrage_produit.php";

foreach ($produits as $id => $info) {
    $name        =& $info["nom"];
    $description =& $info["description"];
    $image       =& $info["image_path"];
    $prix        =& $info["prix"];
    $catalogue   =& $info["categorie"];
    $matiere     =& $info["matiere"];
    if (array_key_exists("filtre_cat_mat", $_POST)) {
        if (count($_POST) == 1) {
            echo "<h2>Vous avez rien selectionner , Reselectinner une autre fois <br>
                  <strong><a href='catalogue.php'>Ou voir toutes les catégories</a></strong>
                  </h2>";
            break;
        }
        filtrage_des_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
    }
    else {
        generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
    }
}




?>
