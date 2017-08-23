<?php
require_once "function/update_panier.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>accueil</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <header>
        <div id="info_supplimentaire">
            <a href="#"><img src="images/logo_maps.png" alt="maps"></a>
            <span>(514) 234-4567</span>
            <?php if (array_key_exists('P_SESS_USERNAME', $_SESSION)) {
                echo "<span class='msg_bienvenue'> Boujour Mr. <strong>",$_SESSION['P_SESS_USERNAME']['username'],"</strong></span>";
            }?>
            <div><form action="function/loginout.php" method="post">
                <?php if ( ! array_key_exists('P_SESS_USERNAME', $_SESSION)) {
                    echo "<input type='submit' value='Se connecter'>";
                } else if (array_key_exists('P_SESS_USERNAME', $_SESSION)) {
                    echo "<input type='submit' name='logout' value='Deconnexion'>";
                }?>
            </form>
            <img id="drapeau" src="images/drapeau_canada.jpg" alt="drapeau canada">
            </div>
        </div>
        <div id="logo_panier">
            <a href="index.php"><img src="images/logo-bijouterie-montreal.png" alt="logo_bijouterie_MTL"></a>
            <div id="panier">
                <span><?php
                    if (array_key_exists("panier", $_SESSION)) {
                        echo count($panier);
                    }
                    ?></span>
                <a href="panier.php"><img src="images/Logo-Panier.png" alt="logo panier"></a>
                <!--<div>
                    <span>Total Achats : <?php /*if(array_key_exists('somme_achat', $_SESSION)) { echo $_SESSION["somme_achat"]; } */?>$</span>
                </div>-->
            </div>
        </div>
        <div id="menu">
            <?php
            require_once "menu.php"
            ?>
        </div>

    </header>

