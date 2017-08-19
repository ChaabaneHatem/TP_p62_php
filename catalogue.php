<?php
require_once "views/page_top.php";
require_once "function/update_panier.php";
?>
<main>
    <div id="filtre_item">
        <form action="" method="post" name="filtre_categorie" >
            <input type="checkbox" name="cat_engagement" id="cat_engagement">
            <label for="cat_engagement">Engagement</label>
            <input type="checkbox" name="cat_man" id="cat_man">
            <label for="cat_man">Men</label>
            <input type="checkbox" name="cat_women" id="cat_women">
            <label for="cat_women">Women</label>
            <input type="submit" name="filtre_categorie" value="Filtrer">
        </form>
        <form action="" method="post" name="filtre_matiere" >
            <input type="checkbox" name="mat_diamant" id="mat_diamant">
            <label for="mat_diamant">Diamant</label>
            <input type="checkbox" name="mat_white" id="mat_white">
            <label for="mat_white">White Gold</label>
            <input type="checkbox" name="mat_yellow" id="mat_yellow">
            <label for="mat_yellow">Yellow Gold</label>
            <input type="submit" name="filtre_matiere" value="Filtrer">
        </form>
    </div>
    <div id="coneteneur_global">
        <?php
        var_dump($_POST);
        var_dump($panier);
        require_once "views/produit_catalogue.php";
        ?>
    </div>
</main>
<?php
require_once "views/page_bottom.php"
?>