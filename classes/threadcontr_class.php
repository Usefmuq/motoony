<?php

class ThreadContr extends Thread {
  public $parents  = array();  
  public $children = array();  

  function __construct()
  {
    $comments = $this->get_comments();
    foreach ($comments as $comment)  
    {  
        if ($comment['comment_parent'] === NULL)  
        {  
            $this->parents[$comment['comment_id']][] = $comment;  
        }  
        else  
        {  
            $this->children[$comment['comment_parent']][] = $comment;
        }  
    }          
  }  

  private function format_comment($comment, $depth)  
  {     
      for ($depth; $depth > 0; $depth--)  
      {  
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
      }  
        
      echo $comment['comment_body'];
      echo "<br>";  
  }  

  private function print_parent($comment, $depth = 0)  
  {     
      foreach ($comment as $c)  
      {  
          $this->format_comment($c, $depth);  

          if (isset($this->children[$c['comment_id']]))  
          {  
              $this->print_parent($this->children[$c['comment_id']], $depth + 1);  
          }  
      }  
  }  

  public function print_comments()  
  {  
      foreach ($this->parents as $c)  
      {  
          $this->print_parent($c);  
      }  
  }  


  private function is_authorized()
  {
    if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
      return true;
    }
    return false;
  }

}