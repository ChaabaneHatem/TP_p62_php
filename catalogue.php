<?php
require_once "views/page_top.php";
require_once "function/update_panier.php";
?>
<main>
    <?php
    require_once "views/filtre_item.php";
    ?>
    <div id="coneteneur_global">
        <?php
        /*var_dump($_POST);
        var_dump($panier);*/
        require_once "views/produit_catalogue.php";
        ?>
    </div>
</main>
<?php
require_once "views/page_bottom.php"
?>