<?php

function authenticate($username, $password) {
    $users = array(
        'Hatem' => array (
            'psd' => 'a', //a
            'panier_user1' => array(
                'ED2' =>  '3',
                'ED1' =>  '2',
                'EW1' =>  '1'
            ),
        ),
        'Tania' => array (
            'psd' => 'bye') //bye
    );
    $tab = $users[$username]['panier_user1'];
    $result = array_key_exists($username, $users) && ($password === $users[$username]['psd']);
    $_SESSION['panier_user'] = $tab;
    return $result;
}
