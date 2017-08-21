<?php

function authenticate($username, $password) {
    $users = array(
        'hatem' => 'f02368945726d5fc2a14eb576f7276c0', //bonjour
        'tania' => 'bfa99df33b137bc8fb5f5407d7e58da8', //bye
    );
    $result = array_key_exists($username, $users) && (md5($password) === $users[$username]);
 var_dump(md5($password),$result);
    return $result;
}
