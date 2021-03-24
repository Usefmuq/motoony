<?php
    include 'header.php';
?>

<!-- code -->
<style>
    .comment-border-link {
        display: block;
        position: absolute;
        top: 30px;
        left: 2px;
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
    #module {
        font-size: 1rem;
        line-height: 1.5;
    }

    #module #collapseExample.collapse:not(.show) {
        display: block;
        height: 7rem;
        overflow: hidden;
    }

    #module #collapseExample.collapsing {
        height: 7rem;
    }

    #module a.collapsed:after {
        content: '+ Show More';
    }

    #module a:not(.collapsed):after {
        content: '- Show Less';
    }
    .toggle_text a.collapsed:after {
        content: '[+]';
    }

    .toggle_text a:not(.collapsed):after {
        content: '[-]';
    }
    .badge {
        font-size: 14px;
    }
    .like-btn {
        font-size: 20px;
    }
    .dislike-btn {
        font-size: 20px;
    }
    .like-btn:hover {
        text-shadow: 1px 2px 4px #00FF00;
    }
    .dislike-btn:hover {
        text-shadow: 1px 2px 4px #FF0000;
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
$threaded_comments->show_posts();
$threaded_comments->print_comments();
$threaded_comments->add_comment();

if (isset($_POST['add_comment'])) {
    $comment_contr = new ThreadContr();
    $comment_contr->add_comment();
}
if (isset($_POST['add_post'])) {
    $post_contr = new ThreadContr();
    $post_contr->add_post();
}
if (isset($_POST['reply_comment'])) {
    $comment_contr = new ThreadContr();
    $comment_contr->reply_comment();
}
if (isset($_POST['vote_status'])) {
    $comment_contr = new ThreadContr();
    $comment_contr->vote_comment($_POST['vote_comment_id'], $_POST['vote_status']);
}
?>
</div>

<!-- end code -->
<?php
    include 'footer.php';
?>
<script type="text/javascript">
$(document).ready(function(){
    // if like btn clicked post it and change btn class
    $('.like-btn').on('click', function(){
        var vote_comment_id = $(this).data('id');
        $clicked_btn = $(this);
        if ($clicked_btn.hasClass('fa fa-thumbs-o-up')) {
            vote_status = 'like';
        }         
        else if ($clicked_btn.hasClass('fa fa-thumbs-up')) {
            vote_status = 'unlike';
        }
        $.ajax({
            url: '' ,
            type: 'POST',
            data: {
                'vote_status': vote_status,
                'vote_comment_id': vote_comment_id
            },
            datatype: 'JSON',
            success: function(data) {
                // res = JSON.parse(data);
                if (vote_status == 'like'){
                    $clicked_btn.removeClass('fa fa-thumbs-o-up')
                    $clicked_btn.addClass('fa fa-thumbs-up')
                }
                else if (vote_status == 'unlike'){
                    $clicked_btn.removeClass('fa fa-thumbs-up')
                    $clicked_btn.addClass('fa fa-thumbs-o-up')
                }
                $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
            }
        });

    });

    // if dislike btn clicked post it and change btn class
    $('.dislike-btn').on('click', function(){
        var vote_comment_id = $(this).data('id');
        $clicked_btn = $(this);
        if ($clicked_btn.hasClass('fa fa-thumbs-o-down')) {
            vote_status = 'dislike';
        }         
        else if ($clicked_btn.hasClass('fa fa-thumbs-down')) {
            vote_status = 'undislike';
        }
        $.ajax({
            url: '' ,
            type: 'POST',
            data: {
                'vote_status': vote_status,
                'vote_comment_id': vote_comment_id
            },
            datatype: 'JSON',
            success: function(data) {
                // res = JSON.parse(data);
                if (vote_status == 'dislike'){
                    $clicked_btn.removeClass('fa fa-thumbs-o-down')
                    $clicked_btn.addClass('fa fa-thumbs-down')
                }
                else if (vote_status == 'undislike'){
                    $clicked_btn.removeClass('fa fa-thumbs-down')
                    $clicked_btn.addClass('fa fa-thumbs-o-down')
                }
                $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
            }
        });

    });

});
// document.addEventListener(
//     "click",
//     function(event) {
//         var target = event.target;
//         var replyForm;
//         if (target.matches("[data-toggle='reply-form']")) {
//             replyForm = document.getElementById(target.getAttribute("data-target"));
//             replyForm.classList.toggle("d-none");
//         }
//     },
//     false
// );
</script>
