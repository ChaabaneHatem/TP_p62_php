<?php
require_once "function/update_panier.php";
require_once "function/calcul_somme_total_achat.php";

/*calcul_some_achat();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>accueil</title>
    <link rel="stylesheet" href="style/main.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <header>
        <div id="info_supplimentaire">
            <a href="#"><img src="images/logo_maps.png" alt="maps"></a>
            <span>514-321-6522</span>
            <div><form action="seconnecter.php" method="post">
                <input type="submit" value="Se connecter">
            </form>
            <img src="images/drapeau_canada.jpg" alt="drapeau canada">
            <span>FR, CAD</span></div>
        </div>
        <div id="logo_panier">
            <img src="images/logo-bijouterie-montreal.png" alt="logo_bijouterie_MTL">
            <div id="panier">
                <span><?php
                    if (array_key_exists("panier", $_SESSION)) {
                        echo count($panier);
                    }
                    ?></span>
                <a href="panier.php"><img src="images/Logo-Panier.png" alt="logo panier"></a>
                <div>
                    <span>Total Achats : <?php if(array_key_exists('somme_achat', $_SESSION)) { echo $_SESSION["somme_achat"]; } ?>$</span>
                </div>
            </div>
        </div>
        <div id="menu">
            <?php
            require_once "menu.php"
            ?>
        </div>

    </header>

