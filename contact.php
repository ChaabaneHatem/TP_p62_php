<?php
require_once "views/page_top.php";
require_once "data/select-data-form.php";

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
    'select_bijoux' => array(
        'is_valid' => false,
        'err_msg' => 'Veuillez choisir au moins un bijoux.',
        'val' => array(),
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
    $email['val']  = trim(filter_input(INPUT_POST, 'saisie_email', FILTER_VALIDATE_EMAIL));
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


$fbijoux =& $validation['select_bijoux'];
if (array_key_exists('select_bijoux', $_POST) && is_array($_POST['select_bijoux'])) {
    foreach ($_POST['select_bijoux'] as $valeur) {
        if (in_array($valeur, $liste_bijoux)) {
            $fbijoux['val'][] = $valeur;
        }
    }
    $fbijoux['is_valid'] = count($fbijoux['val']) >= 1;
}

if ($fnom['is_valid'] && $fprenom['is_valid'] && $email['is_valid'] &&
    $fphone['is_valid'] && $fradio['is_valid'] && $fbijoux['is_valid']) {
    require_once('confirmation-formulaire.php');
    exit;
}


?>
<main>
    <img id="banner-form" src="images/formulaire-banner.jpg" alt="">
    <section>
        <div class="section-title">
        </div>
        <div id="info-contact">
            <div>
                <img src="images/icone-adresse.gif" alt="icone d'adresse"/>
                <p>255 boul. Cremazie E.<br/>Montreal, QC, H2M 1M2</p>
                <p>Metro Cremazie</p>
            </div>
            <div>
                <img src="images/icone-telephone.gif" alt="icone de téléphone"/>
                <p>(514) 234-4567</p>
                <p>Fax : 555.555.5555</p>
            </div>
            <div>
                <img src="images/icone-calendrier.gif" alt="icone de calendrier"/>
                <p>Lundi - Vendredi : 10h à 20h</p>
                <p>Samdi - Dimanche : 10h à 17h</p>
            </div>
            <div>
                <img src="images/icone-courriel.gif" alt="icone d'une enveloppe"/>
                <p>bijouterie.montreal@gmail.com</p>
            </div>
        </div>
    </section>
    <div id="formu">
        <h2 id="titre-contact">Contactez-nous</h2>
        <form id="formulaire"  method="post">
            <ul>
                <div id="section-radio">
                <?php foreach($liste_sexe as $radio) {?>
                        <input
                                type="radio"
                                name="radio_sexe"
                                id="<?= $radio ?>"
                                value="<?= $radio ?>"
                            <?= (array_key_exists('radio_sexe', $_POST)
                                && ($_POST['radio_sexe'] === $radio)) ? CHECKED_ATTR : '' ?>
                        />
                    <label for="<?=$radio?>" id="bouton-radio"><?= $radio ?></label>
                <?php }?>
                </div>
                <?php if ($en_post && ( ! $fradio['is_valid'])) {
                        echo '<p class="error">' , $fradio['err_msg'] , '</p>';
                    }
                    ?>
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
                    <select  multiple="multiple" name="select_bijoux[]" id="select_bijoux">
                        <?php foreach($liste_bijoux as $bijoux) { ?>
                            <option
                                <?= in_array($bijoux, $fbijoux['val']) ? SELECTED_ATTR : '' ?>
                                    value="<?= $bijoux ?>"><?= $bijoux ?></option>
                        <?php } ?>
                    </select>
                    <?php if ( ! $fbijoux['is_valid']) {
                        echo '<p class="error">',  $fbijoux['err_msg'], '</p>';
                    } ?>
                </li>
                <li>
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="78" rows="6"></textarea>
                </li>
                <li><input id="bouton-formu" type="submit" value="SOUMETTRE"></li>
            </ul>
        </form>
    </div>
    <div id="maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.3027433709485!2d-73.64289478461531!3d45.54423507910193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc918e0c061b07f%3A0x647a6b6d7cb681a7!2sISI%2C+l&#39;Institut+sup%C3%A9rieur+d&#39;informatique!5e0!3m2!1sen!2sca!4v1503187401282" width="800" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</main>
<?php
require_once "views/page_bottom.php"
?>


