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
$Content_obj->add_button();
$Content_obj->show_content();
?>
</div>
<!-- end code -->
<?php
    include 'footer.php';
?>
