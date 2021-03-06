<?php
class ThreadView extends Thread {
  public $parents  = array();  
  public $children = array();  
  public $depth1 = 0;  

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
        
      echo '
      <div id="comment-'.$comment['comment_id'].'">
      <div class="card mx-4 shadow-lg" style="border: none;">
          <a href="#comment-'.$comment['comment_id'].'" class="comment-border-link">
              <span class="sr-only">Jump to comment-'.$comment['comment_id'].'</span>
          </a>
          <p class="mb-0" id="heading-'.$comment['comment_id'].'">
              <button class="btn btn-link fa fa-minus" data-toggle="collapse" data-target="#collapse-'.$comment['comment_id'].'"
                  aria-expanded="true" aria-controls="collapse-'.$comment['comment_id'].'"></button>
                  <a href="user.php?id='.$comment['comment_by'].'">'.$comment['comment_by'].'</a>
          </p>
          <small class="mb-0 ml-5">
                  Date: '.$comment['comment_date'].'
          </small>
          <div id="collapse-'.$comment['comment_id'].'" class="collapse show" aria-labelledby="heading-'.$comment['comment_id'].'" data-parent="#comment-'.$comment['comment_id'].'">
              <div class="card-body ml-5">
              '.$comment['comment_body'].'  
                  <ul class="list-inline mt-2">
                      <li class="list-inline-item">
                          <i class="fa fa-chevron-up"></i>
                          <span class="badge badge-pill badge-secondary">18</span>
                          <i class="fa fa-chevron-down"></i>
                          <i class="fa fa-reply mx-5"> Reply</i>
                          <i class="fa fa-star mx-4"> Favorite</i>
                      </li>
                  </ul>
                  <hr>';
    // if ($depth > 0)
    // {  
    //     echo "</div></div></div></div>";
    // }  
            
  }  

  private function print_parent($comment, $depth = 0)
  {     
      foreach ($comment as $c)  
      {  
          $this->format_comment($c, $depth);  

          if (isset($this->children[$c['comment_id']]))
          {  
            $this->depth1 = $this->depth1 + 1;
            $this->print_parent($this->children[$c['comment_id']], $depth + 1);
          }
          else {
            echo "</div>
            </div>
            </div>
            </div>";
            if (end($comment) == $c){
              echo "</div>
              </div>
              </div>
              </div>";
            }
          }
      }
  }  

  public function print_comments()
  {  
      foreach ($this->parents as $c)  
      {  
        $this->print_parent($c);
        if (end($this->parents) != $c){
          echo "</div>
          </div>
          </div>
          </div>";
        }
    for ($this->depth1; $this->depth1 > 0; $this->depth1--)
        {  
          // echo "</div></div></div></div>"; 
        }
      }  
  }  

    public function show_case()
    {
      $result = $this->get_case($_GET['id']); 
      foreach ($result as $row){
        echo'
        <div class="card mt-4">
          <h3 class="card-header">'.$row['content_case'].'</h3>
          <div class="card-body">
            <h5 class="card-title">'.$row['content_content'].'</h5>
            <hr>
              <p class="card-text">'.$row['content_case_description'].'.</p>
          </div>
        </div>
        <hr>
        <h3 class="my-4">Comments:</h3>
        ';
      }
    }
}
