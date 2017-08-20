<?php
require_once "update_panier.php";

$somme_achats = 0;

function calcul_some_achat() {
    global $panier;
    global $somme_achats;
    foreach ($panier as $id => $qty) {
        $mon_produit =& $produits[$id];
        $prix        =& $mon_produit["prix"];
        $prix_total_par_item = $prix * $qty;
        $somme_achats += $prix_total_par_item;
    }
    $_SESSION["somme_achat"] = $somme_achats;
}


?>