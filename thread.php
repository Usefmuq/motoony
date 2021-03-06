<?php
    include 'header.php';
?>

<!-- code -->
<style>
        .comment-thread {
            width: 700px;
            max-width: 100%;
            margin: auto;
            padding: 0 30px;
            background-color: #fff;
            border: 1px solid transparent;
            /* Removes margin collapse */
        }

        .m-0 {
            margin: 0;
        }

        .sr-only {
            position: absolute;
            left: -10000px;
            top: auto;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }

        /* Comment */

        .comment {
            position: relative;
            margin: 20px auto;
        }

        .comment-heading {
            display: flex;
            align-items: center;
            height: 50px;
            font-size: 14px;
        }

        .comment-voting {
            width: 20px;
            height: 32px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 4px;
        }

        .comment-voting button {
            display: block;
            width: 100%;
            height: 50%;
            padding: 0;
            border: 0;
            font-size: 10px;
        }

        .comment-info {
            color: rgba(0, 0, 0, 0.5);
            margin-left: 10px;
        }

        .comment-author {
            color: rgba(0, 0, 0, 0.85);
            font-weight: bold;
            text-decoration: none;
        }

        .comment-author:hover {
            text-decoration: underline;
        }

        .replies {
            margin-left: 20px;
        }

        /* Adjustments for the comment border links */

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

        .comment-body {
            padding: 0 20px;
            padding-left: 28px;
        }

        .replies {
            margin-left: 28px;
        }

        /* Adjustments for toggleable comments */

        details.comment summary {
            position: relative;
            list-style: none;
            cursor: pointer;
        }

        details.comment summary::-webkit-details-marker {
            display: none;
        }

        details.comment:not([open]) .comment-heading {
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        }

        .comment-heading::after {
            display: inline-block;
            position: absolute;
            right: 5px;
            align-self: center;
            font-size: 12px;
            color: rgba(0, 0, 0, 0.55);
        }

        details.comment[open] .comment-heading::after {
            content: "Click to hide";
        }

        details.comment:not([open]) .comment-heading::after {
            content: "Click to show";
        }

        /* Adjustment for Internet Explorer */

        @media screen and (-ms-high-contrast: active),
        (-ms-high-contrast: none) {

            /* Resets cursor, and removes prompt text on Internet Explorer */
            .comment-heading {
                cursor: default;
            }

            details.comment[open] .comment-heading::after,
            details.comment:not([open]) .comment-heading::after {
                content: " ";
            }
        }

        /* Styling the reply to comment form */

        .reply-form textarea {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 16px;
            width: 100%;
            max-width: 100%;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .d-none {
            display: none;
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


$Case_obj = new ThreadView();
$Case_obj->show_case();
$threaded_comments = new ThreadView();
$threaded_comments->print_comments();

?>
</div>

<!-- end code -->
<?php
    include 'footer.php';
?>
<script type="text/javascript">
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
</script>