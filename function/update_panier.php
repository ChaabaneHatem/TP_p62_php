<?php
session_start();
if (! array_key_exists("panier", $_SESSION)) {
    $_SESSION["panier"] = array();
}

$panier =& $_SESSION["panier"];

if (array_key_exists("add_item", $_POST)) {
    if (array_key_exists("id" , $_POST) && array_key_exists("qty" , $_POST)) {
        $id_item = $_POST["id"];
        $qty_item = $_POST["qty"];
        if ( ! array_key_exists($_POST["id"], $panier)) {
            $panier[$id_item] = $qty_item;
        }
        else {
            $panier[$id_item] += $qty_item;
        }
    }
}
if (array_key_exists("add_one", $_POST)) {
    if ( ! ($panier[$_POST["id"]] >= 99)) {
        $panier[$_POST["id"]]++;
    }
}
if (array_key_exists("delete_one", $_POST)) {
    if ( ! ($panier[$_POST["id"]] <= 1)) {
        $panier[$_POST["id"]]--;
    }
}

if (array_key_exists("delete_item", $_POST)) {
    unset($panier[$_POST["id"]]);
}


?>
