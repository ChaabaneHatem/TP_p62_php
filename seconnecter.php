<?php

require_once 'views/page_top.php';
var_dump($_SESSION);
?>

<h2>Veuillez vous connecter dans votre compte</h2>
<form action="function/loginout.php" method="post" id="form-login">
    <ul>
        <li>
            <label for="username">Identifiant :</label>
            <input type="text" name="username" id="username" />
        </li>
        <li>
            <label for="password">Mot de passe: </label>
            <input type="password" name="password" id="password" />
        </li>
        <li>
            <input type="submit" name="login" value="Connexion"/>
        </li>
    </ul>
</form>

<?php

require_once 'views/page_bottom.php';

?>
