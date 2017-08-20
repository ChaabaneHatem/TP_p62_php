<?php
require_once "function/update_panier.php";
require_once "function/calcul_somme_total_achat.php";
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
            echo "<h2>Votre panier est vide ...</h2>";
        }
        /*calcul_some_achat();*/
        $somme_achats = 0;
        foreach ($panier as $id => $qty) {
            $mon_produit =& $produits[$id];
            $name        =& $mon_produit["nom"];
            $description =& $mon_produit["description"];
            $image       =& $mon_produit["image_path"];
            $prix        =& $mon_produit["prix"];
            $prix_total_par_item = $prix * $qty;
            generer_un_item_pour_panier($id, $name, $description, $image, $prix_total_par_item, $qty);
            $somme_achats += $prix_total_par_item;
        }
        $_SESSION["somme_achat"] = $somme_achats;
        ?>
        <buttom><a href="catalogue.php">Continuer shopping</a></buttom>
        <?php
        if (count($panier) != 0) {?>
        <buttom><a href="caisse.php">Passez à la caisse</a></buttom>
        <span>Total du panier : <?= $somme_achats; ?>$</span>
        <?php } ?>
    </main>
<?php
require_once "views/page_bottom.php";
?>