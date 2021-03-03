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
$Case_obj = new CaseView();
$Case_obj->show_case();
?>
</div>

<!-- end code -->
<?php
    include 'footer.php';
?>