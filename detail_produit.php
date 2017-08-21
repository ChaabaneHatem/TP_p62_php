<?php
require_once "views/page_top.php";
require_once "data/data.php";
require_once "function/markup_produit_detail.php";

if (array_key_exists("id_item", $_GET)) {
    $id = $_GET["id_item"];
    $name        =& $produits[$id]["nom"];
    $description =& $produits[$id]["description"];
    $image       =& $produits[$id]["image_path"];
    $prix        =& $produits[$id]["prix"];
    $catalogue   =& $produits[$id]["categorie"];
    $matiere     =& $produits[$id]["matiere"];
}

?>
    <main>

        <?php
        generer_un_item_description($id, $name, $description, $image, $prix, $catalogue, $matiere);
        ?>

    </main>
<?php
require_once "views/page_bottom.php"
?>