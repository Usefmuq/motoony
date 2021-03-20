<?php

class ThreadContr extends Thread {
  private function is_authorized()
  {
    if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
      return true;
    }
    return false;
  }
  private function post_conditions()
  {
      if(!isset($_SESSION['userid'])){
          $_SESSION['message']='you are not signed in!';
          $_SESSION['msg_type']='danger';
          header("Location: thread.php?id=".$_GET['id']);
          exit();
          return false;
      }
      if(empty($_POST['post_content_id']) or empty($_POST['post_by'])or empty($_POST['post_status'])or empty($_POST['post_title'])or empty($_POST['post_sayer']) or empty($_POST['post_source']) or empty($_POST['post_body'])){
          $_SESSION['message']='Something is empty!';
          $_SESSION['msg_type']='danger';
          header("Location: thread.php?id=".$_GET['id']);
          exit();
          return false;
      }
      if(strlen($_POST['post_title']) > 255 or strlen($_POST['post_source']) > 255 or strlen($_POST['post_body']) > 65500){
          $_SESSION['message']='title, source, and body should be less than 255 character!';
          $_SESSION['msg_type']='danger';
          header("Location: thread.php?id=".$_GET['id']);
          exit();
          return false;
      }      
      return true;
  }

  public function add_comment()
  {
    if (isset($_SESSION['userid']) and isset($_POST['comment_body'])) {
      $this->set_comment($_POST['comment_body'],$_POST['comment_by']);
    }
  }
  public function add_post()
  {
    if ($this->post_conditions()) {
      $this->set_post($_POST['post_content_id'],$_POST['post_by'],$_POST['post_status'],$_POST['post_title'],$_POST['post_sayer'],$_POST['post_source'],$_POST['post_body']);
    }
  }
  public function reply_comment()
  {
    if (isset($_SESSION['userid']) and isset($_POST['comment_body'])) {
      $this->set_reply_comment($_POST['comment_body'],$_POST['comment_by'],$_POST['comment_parent']);
    }
  }


}