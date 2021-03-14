<?php

class ThreadContr extends Thread {
  private function is_authorized()
  {
    if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
      return true;
    }
    return false;
  }

  public function add_comment()
  {
    if (isset($_SESSION['userid']) and isset($_POST['comment_body'])) {
      $this->set_comment($_POST['comment_body'],$_POST['comment_by']);
    }
  }


}