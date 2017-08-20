<?php
require_once "page_top.php"
?>
<div id="loginout">
<?php if (user_is_logged()) { ?>
    <form method="post" id="logoutform">
        <input type="submit" name="logout" value="Déconnexion"/>
    </form>
<?php } else { ?>
    <form method="post" id="loginform">
        <label for="username">Identifiant :</label>
        <input type="text" name="username" id="username" />
        <label for="password">Mot de passe: </label>
        <input type="password" name="password" id="password" />
        <input type="submit" name="login" value="Connexion"/>
    </form>
<?php } ?>
</div>
