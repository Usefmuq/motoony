<?php
    include 'header.php';
?>

<!-- code -->
<style>
    .comment-border-link {
        display: block;
        position: absolute;
        top: 30px;
        left: 12px;
        width: 12px;
        height: calc(100% - 50px);
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        background-color: rgba(0, 0, 0, 0.1);
        background-clip: padding-box;
    }

    .comment-border-link:hover {
        background-color: rgba(0, 0, 0, 0.3);
    }
</style>

<div class="my-2 container">
<?php
    include 'alerts.php';
    // error_message();
?>
</div>
<div class="my-4 container">
<?php


$threaded_comments = new ThreadView();
$threaded_comments->show_case();
$threaded_comments->print_comments();
$threaded_comments->add_button();

if (isset($_POST['add_comment'])) {
    $comment_contr = new ThreadContr();
    $comment_contr->add_comment();
}

?>
</div>

<!-- end code -->
<?php
    include 'footer.php';
?>
<!-- <script type="text/javascript">
document.addEventListener(
    "click",
    function(event) {
        var target = event.target;
        var replyForm;
        if (target.matches("[data-toggle='reply-form']")) {
            replyForm = document.getElementById(target.getAttribute("data-target"));
            replyForm.classList.toggle("d-none");
        }
    },
    false
);
</script> -->
