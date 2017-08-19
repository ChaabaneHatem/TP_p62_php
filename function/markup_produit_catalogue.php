<?php

function generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere) {
    ?>
    <div class="conteneur_item">
        <div class="img_item">
            <img src="images/<?=$image?>" alt="<?=$name?>">
        </div>
        <span><?=$name?></span>
        <div>
            <p><?=$description?></p>
        </div>
        <span class="prix_item"> Prix : <?=$prix?>$</span>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="text" value="1" name="qty">
            <input type="submit" value="ajouter au panier">
        </form>
    </div>


<?php

}

?>
