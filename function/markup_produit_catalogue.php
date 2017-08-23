<?php

function generer_un_item($id, $name, $description, $image, $prix, $catalogue, $matiere) {
    ?>
    <div class="conteneur_item">
        <div class="img_item">
            <a href="detail_produit.php?id_item=<?=$id?>"><img src="images/<?=$image?>" alt="<?=$name?>"></a>
        </div>
        <span><?=$name?></span>
        <div>
            <p><?=$description?></p>
        </div>
        <div>
            <p><strong>Categorie : </strong><?=$catalogue?></p>
        </div>
        <div>
            <p><strong>Matiere : </strong><?=$matiere?></p>
        </div>
        <span class="prix_item"> Prix : <?=$prix?>$</span>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <select name="qty" class="quantite">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="submit" name="add_item" value="ajouter au panier">
        </form>
    </div>


<?php

}

?>
