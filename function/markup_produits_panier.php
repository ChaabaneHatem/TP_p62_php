<?php

function generer_un_item_pour_panier($id, $name, $description, $image, $prix, $qty) {
    ?>
    <div class="conteneur_item_panier">

            <img src="images/<?=$image?>" alt="<?=$name?>">

        <span><?=$name?></span>
        <div>
            <p><?=$description?></p>
        </div>
        <span class="prix_item"> Prix : <?=$prix?>$</span>
        <form action="" method="post">
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
