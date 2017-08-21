<?php
require_once "update_panier.php";
const P_SESS_USERNAME = 'P_SESS_USERNAME';
/*var_dump($_SESSION);*/
/*if ( session_status() === PHP_SESSION_NONE ) { // Regarde si la session a été démarré ou pas
    session_start();
}*/

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
    require_once dirname(__FILE__) .  '\authenticate.php';
    if (authenticate($username, $password)) {
        $_SESSION[P_SESS_USERNAME] = $_POST['username'];
    }
}

if (array_key_exists('logout', $_POST)) {
    unset($_SESSION[P_SESS_USERNAME]);

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
