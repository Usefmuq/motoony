<?php

class ContentContr extends Content {
  private function is_authorized()
  {
    if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
      return true;
    }
    return false;
  }

  public function conditions($content_section, $content_case,$content_sayer,$content_source,$content_content)
  {
      if(empty($content_section) or empty($content_case)or empty($content_sayer)or empty($content_source)or empty($content_content)){
          $_SESSION['message']='Something is empty!';
          $_SESSION['msg_type']='danger';
          header("Location: content_editor.php?id=".$_GET['id']);
          exit();
          return false;
      }
      if(strlen($content_case) > 255 or strlen($content_source) > 255 or strlen($content_content) > 55555){
          $_SESSION['message']='subject, source, and content should be less than 255 character!';
          $_SESSION['msg_type']='danger';
          header("Location: content_editor.php?id=".$_GET['id']);
          exit();
          return false;
      }      
      return true;
  }


  public function content_edit()
  {
    if ($this->is_authorized() and $this->conditions($_POST['content_id'],$_POST['content_case'],$_POST['content_sayer'],$_POST['content_source'],$_POST['content_content'])) {
      $this->edit_content($_POST['content_sayer'], $_POST['content_content'], $_POST['content_case'],$_POST['content_case_description'], $_POST['content_source'] , $_POST['content_id']);
    }

  }


  public function delete_request()
  {
    if ($this->is_authorized()) {
      $this->delete_content($_POST['content_id']);
    }
  }
  public function add_content()
  {
    if ($this->is_authorized() and $this->conditions($_POST['content_section'],$_POST['content_case'],$_POST['content_sayer'],$_POST['content_source'],$_POST['content_content'])) {
      $this->set_content($_POST['content_section'], $_POST['content_sayer'], $_POST['content_by'], $_POST['content_content'],$_POST['content_case'],$_POST['content_case_description'], $_POST['content_source']);
    }
  }

// test
}