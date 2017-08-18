<?php
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

        </div>
        <div id="logo_panier">
            <img src="images/logo-bijouterie-montreal.png" alt="logo_bijouterie_MTL">
            <div id="pannier">
                <span>0</span>
                <a href="panier.php"><img src="" alt=""></a>
            </div>
        </div>
        <div id="menu">
            <?php
            require_once "menu.php"
            ?>
        </div>

    </header>

