<?php
    include 'header.php';
?>

<!-- code -->

<div class="my-2 container">
<?php
    include 'alerts.php';
    // error_message();
?>
</div>
<div class="my-4 container">
<?php
// show_books();
$Sign_obj = new SignView();
$Sign_obj->sign_page();
if (isset($_POST['sign_up_submit'])) {
    $Sign_contr = new SignContr();
    $Sign_contr->sign_up();
}

?>
</div>
<!-- end code -->
<?php
    include 'footer.php';
?>
