<?php
require_once 'data/data.php';
require_once 'function/markup_produit_catalogue.php';

function filtrage_des_item($id, $name, $description, $image, $prix, $catalogue, $matiere) {

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

?>
