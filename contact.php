<?php
require_once "views/page_top.php";

const SELECTED_ATTR = 'selected="selected"';
const CHECKED_ATTR = 'checked="checked"';

$en_post = ('POST' === $_SERVER['REQUEST_METHOD']);

$liste_sexe = array(
    'M.',
    'Mme.',
    'Mlle.',
);
$validation = array(
    'saisie_nom' => array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'saisie_prenom' => array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'saisie_email' => array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'saisie_tel' => array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'radio_sexe' => array(
        'val' => -1,
        'err_msg' => 'Veuillez choisir une civilité',
        'is_valid' => false,
    ),
);

$fnom =& $validation['saisie_nom'];
if (array_key_exists('saisie_nom', $_POST)) {
    $fnom['val']  = trim(filter_input(INPUT_POST, 'saisie_nom', FILTER_SANITIZE_STRING));
    $fnom['is_valid'] = (1 === preg_match('/^[a-zA-Z]{2,}$/',$fnom['val']));
    if ( ! $fnom['is_valid']) {
        $fnom['err_msg'] = 'Le nom doit comporter au moins 2 caractères valides.';
    }
}

$fprenom =& $validation['saisie_prenom'];
if (array_key_exists('saisie_prenom', $_POST)) {
    $fprenom['val']  = trim(filter_input(INPUT_POST, 'saisie_prenom', FILTER_SANITIZE_STRING));

    $fprenom['is_valid'] = (1 === preg_match('/^[a-zA-Z]{2,}$/',$fprenom['val']));
    if ( ! $fprenom['is_valid']) {
        $fprenom['err_msg'] = 'Le prénom doit comporter au moins 2 caractères valides.';
    }
}

$email =& $validation['email'];
if (array_key_exists('saisie_email', $_POST)) {
    $email['val']  = (trim(filter_input(INPUT_POST, 'saisie_email', FILTER_VALIDATE_EMAIL)))|| (strlen($fnom['val']) == 0);
    $email['is_valid']=$email['val'];
    if (!$email['is_valid']) {
        $email['err_msg'] = 'Le Email nest pas valide';
    }
}


$fphone=& $validation['saisie_tel'];
if(array_key_exists('saisie_tel',$_POST)){
    $fphone['val']=preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['saisie_tel'])||preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $_POST['saisie_tel']);
    $fphone['is_valid']=$fphone['val'];
    if(!$fphone['is_valid']){
        $fphone['err_msg'] = 'Le numero de telephone nest pas valide';
    }
}

$fradio =& $validation['radio_sexe'];
if (array_key_exists('radio_sexe', $_POST)) {
    $fradio['is_valid'] = in_array($_POST['radio_sexe'], $liste_sexe);
    if ($fradio['is_valid']) {
        $fradio['val'] = $_POST['radio_sexe'];
    }
    else{
        $fradio['err_msg']='erreur';
    }
}

?>
<main>
    <h2>Contactez-nous</h2>
    <form id="formulaire" action="" method="post">
    <ul>
        <li>
            <?php foreach($liste_sexe as $radio) {?>
                <label for="<?=$radio?>"><?= $radio ?></label>
                <input
                        type="radio"
                        name="radio_sexe"
                        id="<?= $radio ?>"
                        value="<?= $radio ?>"
                    <?= (array_key_exists('radio_sexe', $_POST)
                        && ($_POST['radio_sexe'] === $radio)) ? CHECKED_ATTR : '' ?>
                />
            <?php }?>
            <?php if ($en_post && ( ! $fradio['is_valid'])) {
                echo '<p class="error">' , $fradio['err_msg'] , '</p>';
            }
            ?>
        </li>
        <li>
            <label for="saisie_nom">Nom</label>
            <input type="text" id="saisie_nom" name="saisie_nom"
                   value="<?= $en_post ? $fnom['val'] : '' ?>"/>
            <?php if ($en_post && ( ! $fnom['is_valid'])) {
                echo '<p class="error">' , $fnom['err_msg'] , '</p>';
            }
            ?>
        </li>
        <li>
            <label for="saisie_prenom">Prénom</label>
            <input type="text" id="saisie_prenom" name="saisie_prenom"
                   value="<?= $en_post ? $fprenom['val'] : '' ?>"/>
            <?php if ($en_post && ( ! $fprenom['is_valid'])) {
                echo '<p class="error">' , $fprenom['err_msg'] , '</p>';
            }
            ?>
        </li>
        <li>
            <label for="saisie_email">Email</label>
            <input type="text" id="saisie_email" name="saisie_email"
                   value="<?= $en_post ? $email['val'] : '' ?>">
            <?php if ($en_post && ( ! $email['is_valid'])) {
                echo '<p class="error">' , $email['err_msg'] , '</p>';
            }
            ?>
        </li>
        <li>
            <label for="saisie_tel">Telephone</label>
            <input type="tel" id="saisie_tel" name="saisie_tel"
                   value="<?= $en_post ? $fphone['val'] : '' ?>">
            <?php if ($en_post && ( ! $fphone['is_valid'])) {
                echo '<p class="error">' , $fphone['err_msg'] , '</p>';
            }
            ?>
        </li>
        <li>
            <label for="select_bijoux">Nos choix</label>
            <select name="select_bijoux" id="select_bijoux">
                <option value="-1">Choisissez</option>
                <option value="bague">Bague</option>
                <option value="Bracelet">Bracelet</option>
                <option value="collier">Collier</option>
                <option value="boucle">Boucle d'oreille</option>
            </select>
        </li>
        <li>
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="80" rows="10"></textarea>
        </li>
        <li><input type="submit" value="SOUMETTRE"></li>
    </ul>
    </form>
</main>
<?php
require_once "views/page_bottom.php"
?>


