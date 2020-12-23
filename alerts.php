<?php
if (isset($_SESSION['message'])){
    echo '<div class="alert alert-'.$_SESSION["msg_type"].' alert-dismissible fade show" role="alert">';
    echo '<p>'.$_SESSION["message"].'</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
    unset($_SESSION['message']);
    unset($_SESSION['msg_type']);
}