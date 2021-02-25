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
$books_obj = new BooksView();
$books_obj->add_button();
$books_obj->show_books();

if (isset($_POST['add_book'])) {
    $Sign_contr = new BooksContr();
    $Sign_contr->add_book();
}
if (isset($_POST['edit_book'])) {
    $Sign_contr = new BooksContr();
    $Sign_contr->call_edit();
}
if (isset($_POST['delete_book'])) {
    $Sign_contr = new BooksContr();
    $Sign_contr->delete_request();
}

?>
</div>
<!-- end code -->
<?php
    include 'footer.php';
?>
