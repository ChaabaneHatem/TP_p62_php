<?php
require_once 'data/data.php';
require_once 'function/markup_produit_catalogue.php';

foreach ($produits as $id => $info) {
    $name        =& $info["nom"];
    $description =& $info["description"];
    $image       =& $info["image_path"];
    $prix        =& $info["prix"];
    $catalogue   =& $info["categorie"];
    $matiere     =& $info["matiere"];
    if (array_key_exists("filtre_cat_mat", $_POST)) {
        if (count($_POST) == 1) {
            echo "<h2>Vous avez rien selectionner , Reselectinner une autre fois</h2>";
            break;
        }
        if (array_key_exists("engagement", $_POST) && $catalogue == "engagement") {

            if (array_key_exists("diamant", $_POST) && $matiere == "diamant") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
            if (array_key_exists("white", $_POST) && $matiere == "white") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
            if (array_key_exists("yellow", $_POST) && $matiere == "yellow") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }

        }
        if (array_key_exists("men", $_POST) && $catalogue == "men") {

            if (array_key_exists("diamant", $_POST) && $matiere == "diamant") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
            if (array_key_exists("white", $_POST) && $matiere == "white") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
            if (array_key_exists("yellow", $_POST) && $matiere == "yellow") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
        }
        if (array_key_exists("women", $_POST) && $catalogue == "women") {

            if (array_key_exists("diamant", $_POST) && $matiere == "diamant") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
            if (array_key_exists("white", $_POST) && $matiere == "white") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
            if (array_key_exists("yellow", $_POST) && $matiere == "yellow") {
                generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
            }
        }
    }
    else {
        generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
    }
}




?>
