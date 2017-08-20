<?php
require_once "page_top.php"
?>
<div id="loginout">
<?php if (user_is_logged()) { ?>
    <h2>Deconnection de votre compte</h2>
    <form method="post" id="form-logout">
        <input type="submit" name="logout" value="Déconnexion"/>
    </form>
<?php } else { ?>
    <h2>Veuillez vous connecter dans votre compte</h2>
    <form method="post" id="form-login">
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
<?php } ?>
</div>
