<?php
require_once 'data/data.php';
require_once 'function/markup_produit_catalogue.php';
$cpt = 1;
foreach ($produits as $id => $info) {
    $name        =& $info["nom"];
    $description =& $info["description"];
    $image       =& $info["image_path"];
    $prix        =& $info["prix"];
    $catalogue   =& $info["categorie"];
    $matiere     =& $info["matiere"];
    generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere);
    $cpt++;
    if ($cpt == 4) {
        break;
    }
}




?>
