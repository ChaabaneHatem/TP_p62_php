<?php
require_once "data/data.php";

function generer_un_item_description($id, $name, $description, $image, $prix, $catalogue, $matiere) {
    ?>
    <h2 class="categorie_titre_description"><?=ucfirst($catalogue)?>'s rings</h2>
    <div id="conteneur_item_description">
        <div>
            <div class="img_item">
                <img src="images/<?=$image?>" alt="<?=$name?>">
            </div>
        </div>
        <div>
            <span class="titre_produit"><?=$name?> en <strong><?=ucfirst($matiere)?></strong></span>
            <div>
                <p><?=$description?>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam distinctio dolorem eaque iste laborum libero minus odit officia quam qui quis ratione rem, repellendus rerum sapiente soluta suscipit totam vitae?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A earum error natus necessitatibus nostrum numquam obcaecati pariatur porro quam quasi quibusdam quo rerum sapiente, sint soluta, sunt temporibus vel, voluptates.</p>
            </div>
            <span class="prix_item_description"> Prix : <?=$prix?>$</span>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <!--            <input type="text" value="1" name="qty">-->
                <select name="qty" id="quantite">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input type="submit" name="add_item" value="Ajouter au panier">
            </form>
        </div>
    </div>


<?php

}

?>