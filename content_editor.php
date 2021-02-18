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
// $Content_cont = new ContentContr();
// $Content_cont->job_check();
$Content_obj = new ContentView();
$Content_obj->show_editor();
if (isset($_POST['content_edit'])) {
    $Sign_contr = new ContentContr();
    $Sign_contr->content_edit();
}
if (isset($_POST['add_content'])) {
    $Sign_contr = new ContentContr();
    $Sign_contr->add_content();
}
if (isset($_POST['delete_content'])) {
    $Sign_contr = new ContentContr();
    $Sign_contr->delete_request();
}

?>
</div>

<!-- end code -->
<?php
    include 'footer.php';
?>
