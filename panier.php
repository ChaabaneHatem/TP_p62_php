<?php
require_once "function/update_panier.php";
require_once "views/page_top.php";
require_once "function/markup_produits_panier.php";
require_once "data/data.php";
?>
    <main>
        <?php
        var_dump($_POST);
        var_dump($panier);
        var_dump($_SESSION);
        if (count($panier) == 0) {
            echo "<h2>Votre panier est vide</h2>";
        }
        
        $_SESSION["somme_achat"] = $somme_achats;
        ?>
        <buttom><a href="catalogue.php">Contenue shopping</a></buttom>
        <?php
        if (count($panier) != 0) {?>
        <buttom><a href="caisse.php">Passez à la caisse</a></buttom>
        <span>Total du panier : <?= $somme_achats; ?>$</span>
        <?php } ?>
    </main>
<?php
require_once "views/page_bottom.php";
?>