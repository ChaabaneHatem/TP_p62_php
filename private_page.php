<?php
require_once 'function/loginout.php';
if ( ! user_is_logged() ) {
    header('Location: index.php');
    exit;
}

?>
<?php require_once 'views/loginout_form.php'; ?>
<?php
    require_once "views/page_bottom.php"
?>