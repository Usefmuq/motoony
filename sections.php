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
// $sections_cont = new sectionsContr();
// $sections_cont->job_check();
$sections_obj = new SectionsView();
$sections_obj->add_button();
$sections_obj->show_sections();

if (isset($_POST['add_section'])) {
    $Sign_contr = new SectionsContr();
    $Sign_contr->add_section();
}
if (isset($_POST['edit_section'])) {
    $Sign_contr = new SectionsContr();
    $Sign_contr->call_edit();
}
if (isset($_POST['delete_section'])) {
    $Sign_contr = new SectionsContr();
    $Sign_contr->delete_request();
}


?>
</div>
<!-- end code -->
<?php
    include 'footer.php';
?>
