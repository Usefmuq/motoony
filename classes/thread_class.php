<?php
class Thread extends Dbh {
    protected function get_case($content_id)
    {
        $sql = "SELECT * FROM content WHERE content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_id]);
        return $stmt->fetchAll();
    }
    protected function get_comments()
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    protected function get_posts($post_content_id)
    {
        $sql = "SELECT * FROM posts WHERE post_content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$post_content_id]);
        return $stmt->fetchAll();
    }
    protected function set_post($post_content_id,$post_by,$post_status,$post_title,$post_sayer,$post_source,$post_body)
    {
        $sql = "INSERT INTO posts(post_content_id,post_by,post_status,post_title,post_sayer,post_source,post_body) VALUES(?,?,?,?,?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$post_content_id,$post_by,$post_status,$post_title,$post_sayer,$post_source,$post_body]) or die('error set_post');
        $_SESSION['message']='post has been Added';
        $_SESSION['msg_type']='success';
        header("Location: thread.php?id=".$_GET['id']);
        exit();
    }
    protected function set_comment($comment_body,$comment_by)
    {
        $sql = "INSERT INTO comments(comment_body, comment_by) VALUES(?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$comment_body,$comment_by]) or die('error');
        $_SESSION['message']='comment has been Added';
        $_SESSION['msg_type']='success';
        header("Location: thread.php?id=".$_GET['id']);
        exit();
    }
    protected function set_reply_comment($comment_body,$comment_by,$comment_parent)
    {
        $sql = "INSERT INTO comments(comment_body, comment_by, comment_parent) VALUES(?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$comment_body,$comment_by,$comment_parent]) or die('error');
        $_SESSION['message']='comment reply has been Added';
        $_SESSION['msg_type']='success';
        header("Location: thread.php?id=".$_GET['id']);
        exit();
    }
    protected function delete_comment($comment_id)
    {
        $sql = "DELETE FROM comments WHERE comment_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$comment_id]);
        $_SESSION['message']='comment has been deleted';
        $_SESSION['msg_type']='danger';
        header("Location: thread.php?id=".$_GET['id']);
        exit();
    }
    protected function edit_comment($comment_body, $comment_id)
    {
        $sql = "UPDATE comments SET comment_body=? WHERE comment_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$comment_body, $comment_id]) or die('aaa');
        $_SESSION['message']='comment has been updated '.$result;
        $_SESSION['msg_type']='success';
        header("Location: thread.php?id=".$_GET['id']);
        exit();
    }

}