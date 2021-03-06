<?php
require_once "update_panier.php";
const P_SESS_USERNAME = 'P_SESS_USERNAME';


//si il est connecte ou pas
function user_is_logged() {
    return (array_key_exists(P_SESS_USERNAME, $_SESSION)
        && ! empty($_SESSION[P_SESS_USERNAME]));
}

if (array_key_exists('login', $_POST)
    && array_key_exists('username', $_POST)
    && array_key_exists('password', $_POST)) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


    require_once dirname(__FILE__) .  '/authenticate.php';
    if (authenticate($username, $password)) {

        $_SESSION[P_SESS_USERNAME] = array(
            'username' => $_POST['username'],
            'panier_user_stocke' => $_SESSION['panier_user']
        );
    }

}

if (array_key_exists('logout', $_POST)) {
    unset($_SESSION[P_SESS_USERNAME]);
    unset($_SESSION["panier"]);
    header('Location: ../index.php');
    exit;

}

if (! user_is_logged()) {
    header('Location: ../seconnecter.php');
    exit;
}
if (user_is_logged()) {
    header('Location: ../index.php');
    exit;
}

?>
