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
    #post {
        font-size: 1rem;
        line-height: 1.5;
    }

    #module .collapse:not(.show) {
        display: block;
        height: 7rem;
        overflow: hidden;
    }

    #module .collapsing {
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
    .fa-thumbs-up {
        font-size: 19px;
    }
    .fa-thumbs-down {
        font-size: 19px;
    }
    .fa-thumbs-o-up {
        font-size: 20px;
    }
    .fa-thumbs-o-down {
        font-size: 20px;
    }
    .comment-like-btn:hover {
        text-shadow: 1px 2px 4px #00FF00;
    }
    .comment-dislike-btn:hover {
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
if (isset($_POST['vote_comment_id'])) {
    $comment_contr = new ThreadContr();
    $comment_contr->vote_comment($_POST['vote_comment_id'], $_POST['vote_status']);
}
if (isset($_POST['vote_post_id'])) {
    $post_contr = new ThreadContr();
    $post_contr->vote_post($_POST['vote_post_id'], $_POST['vote_status']);
}
?>
</div>

<!-- end code -->
<?php
    include 'footer.php';
?>
<script type="text/javascript">
$(document).ready(function(){
    var flag = 1;
    CKEDITOR.replace( 'post_body' );
    // var textarea = document.body.appendChild( document.createElement( 'textarea' ) );
    // CKEDITOR.replace( textarea );

    // ===============  START comment like & dislike  ===============
    // if like btn clicked post it and change btn class
    $('.comment-like-btn').on('click', function(){
        if (flag == 1){
            flag = 0;
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
                    if (vote_status == 'like'){
                        $clicked_btn.removeClass('fa fa-thumbs-o-up')
                        $clicked_btn.addClass('fa fa-thumbs-up')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(++votes);
                        if ($clicked_btn.siblings("i.fa-thumbs-down").hasClass('fa fa-thumbs-down')) {
                            $clicked_btn.siblings('span.badge').text(++votes);
                        }
                    }
                    else if (vote_status == 'unlike'){
                        $clicked_btn.removeClass('fa fa-thumbs-up')
                        $clicked_btn.addClass('fa fa-thumbs-o-up')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(--votes);
                    }
                    $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa fa-thumbs-down').addClass('fa fa-thumbs-o-down');
                },
                complete: function() {
                    flag = 1;
                }
            });
        }

    });
    // if dislike btn clicked post it and change btn class
    $('.comment-dislike-btn').on('click', function(){
        if (flag == 1){
            flag = 0;
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
                    if (vote_status == 'dislike'){
                        $clicked_btn.removeClass('fa fa-thumbs-o-down')
                        $clicked_btn.addClass('fa fa-thumbs-down')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(--votes);
                        if ($clicked_btn.siblings("i.fa-thumbs-up").hasClass('fa fa-thumbs-up')) {
                            $clicked_btn.siblings('span.badge').text(--votes);
                        }
                    }
                    else if (vote_status == 'undislike'){
                        $clicked_btn.removeClass('fa fa-thumbs-down')
                        $clicked_btn.addClass('fa fa-thumbs-o-down')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(++votes);
                    }
                    $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa fa-thumbs-up').addClass('fa fa-thumbs-o-up');
                },
                complete: function() {
                    flag = 1;
                }
            });
        }
    });
    // ===============  END comment like & dislike  ===============


    // ===============  START post like & dislike  ===============
    // if like btn clicked post it and change btn class
    $('.post-like-btn').on('click', function(){
        if (flag == 1){
            flag = 0;
            var vote_post_id = $(this).data('id');
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
                    'vote_post_id': vote_post_id
                },
                datatype: 'JSON',
                success: function(data) {
                    if (vote_status == 'like'){
                        $clicked_btn.removeClass('fa fa-thumbs-o-up')
                        $clicked_btn.addClass('fa fa-thumbs-up')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(++votes);
                        if ($clicked_btn.siblings("i.fa-thumbs-down").hasClass('fa fa-thumbs-down')) {
                            $clicked_btn.siblings('span.badge').text(++votes);
                        }
                    }
                    else if (vote_status == 'unlike'){
                        $clicked_btn.removeClass('fa fa-thumbs-up')
                        $clicked_btn.addClass('fa fa-thumbs-o-up')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(--votes);
                    }
                    $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa fa-thumbs-down').addClass('fa fa-thumbs-o-down');
                },
                complete: function() {
                    flag = 1;
                }
            });
        }

    });
    // if dislike btn clicked post it and change btn class
    $('.post-dislike-btn').on('click', function(){
        if (flag == 1){
            flag = 0;
            var vote_post_id = $(this).data('id');
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
                    'vote_post_id': vote_post_id
                },
                datatype: 'JSON',
                success: function(data) {
                    if (vote_status == 'dislike'){
                        $clicked_btn.removeClass('fa fa-thumbs-o-down')
                        $clicked_btn.addClass('fa fa-thumbs-down')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(--votes);
                        if ($clicked_btn.siblings("i.fa-thumbs-up").hasClass('fa fa-thumbs-up')) {
                            $clicked_btn.siblings('span.badge').text(--votes);
                        }
                    }
                    else if (vote_status == 'undislike'){
                        $clicked_btn.removeClass('fa fa-thumbs-down')
                        $clicked_btn.addClass('fa fa-thumbs-o-down')
                        votes = $clicked_btn.siblings('span.badge').text();
                        $clicked_btn.siblings('span.badge').text(++votes);
                    }
                    $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa fa-thumbs-up').addClass('fa fa-thumbs-o-up');
                },
                complete: function() {
                    flag = 1;
                }
            });
        }
    });
    // ===============  END post like & dislike  ===============


});
</script>
