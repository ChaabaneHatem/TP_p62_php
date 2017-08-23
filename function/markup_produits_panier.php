<?php

function generer_un_item_pour_panier($id, $name, $description, $image, $prix, $qty) {
    ?>
    <div class="conteneur_item_panier">
        <div class="img_item">
        <a href="detail_produit.php?id_item=<?=$id?>"><img src="images/<?=$image?>" alt="<?=$name?>"></a>
        </div>
        <span><?=$name?></span>
        <div>
            <p><?=$description?></p>
        </div>
        <span class="prix_item_panier"> Prix : <?=$prix?>$</span>
        <form method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="-" name="delete_one">
            <input type="text" value="<?=$qty?>" name="qty">
            <input type="submit" value="+" name="add_one">
            <input type="submit" value="Remove product" name="delete_item">
        </form>
    </div>

    <?php

}

?>
