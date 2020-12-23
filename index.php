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
$books_cont = new BooksContr();
$books_cont->job_check();
$books_obj = new BooksView();
$books_obj->add_button();
$books_obj->show_books();
?>
</div>
<!-- end code -->
<?php
    include 'footer.php';
?>
