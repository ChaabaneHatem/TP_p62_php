<?php

require_once 'views/page_top.php';

?>

<img src="images/dandelion-seeds-number-of-lion-screen-pilot-159056.jpeg" alt="">
<div id="contenu-connect">
    <h2 id="titre-connection">Veuillez vous connecter dans votre compte</h2>
    <form action="function/loginout.php" method="post" id="form-login">
        <ul>
            <li>
                <label for="username">Identifiant</label>
                <input type="text" name="username" id="username" />
            </li>
            <li>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" />
            </li>
            <li>
                <input type="submit" name="login" value="Connexion"/>
            </li>
        </ul>
    </form>
</div>

<?php

require_once 'views/page_bottom.php';

?>
