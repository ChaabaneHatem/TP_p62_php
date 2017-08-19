<?php

function generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere) {
    ?>
    <div class="conteneur_item">
        <div>
            <img src="images/<?=$image?>" alt="<?=$name?>">
        </div>
        <span><?=$name?></span>
        <div>
            <p><?=$description?></p>
        </div>
        <span class="prix_item"><?=$prix?></span>
        <form action="" method="post">
            <input type="hidden" value="<?=$id?>">
            <input type="submit" value="ajouter au panier">
        </form>
    </div>


<?php

}

?>
