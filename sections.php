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
$sections_cont = new sectionsContr();
$sections_cont->job_check();
$sections_obj = new sectionsView();
$sections_obj->add_button();
$sections_obj->show_sections();
?>
</div>
<!-- end code -->
<?php
    include 'footer.php';
?>
