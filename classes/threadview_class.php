<?php
class ThreadView extends Thread {
  public $parents  = array();  
  public $children = array();  
  public $comments_size = 0;

  function __construct()
  {
    $comments = $this->get_comments();
    $this->comments_size = sizeof($comments);
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
      <div class="card shadow mb-2 bg-light rounded" style="border: none;">
          <a href="#comment-'.$comment['comment_id'].'" class="comment-border-link">
              <span class="sr-only">Jump to comment-'.$comment['comment_id'].'</span>
          </a>
          <p class="mb-2" id="heading-'.$comment['comment_id'].'">
              <a role="button" data-toggle="collapse" data-target="#collapse-'.$comment['comment_id'].'"
                  aria-expanded="true" aria-controls="collapse-'.$comment['comment_id'].'">[-]</a>
                  <a href="user.php?id='.$comment['comment_by'].'">'.$comment['comment_by'].'</a> <small class="ml-5">
                  Date: '.$comment['comment_date'].'
          </small>

          </p>
          <div id="collapse-'.$comment['comment_id'].'" class="collapse show" aria-labelledby="heading-'.$comment['comment_id'].'" data-parent="#comment-'.$comment['comment_id'].'">
              <div class="card-body ml-2">
              '.$comment['comment_body'].'  
                  <ul class="list-inline mt-2">
                      <li class="list-inline-item">
                          <i class="fa fa-chevron-up"></i>
                          <span class="badge badge-pill badge-secondary">18</span>
                          <i class="fa fa-chevron-down"></i>
                            <button type="button" class="btn btn-info btn-sm rounded-0 mx-5" data-toggle="modal" data-target="#reply_comment-'.$comment['comment_id'].'">
                            <i class="fa fa-reply"> Reply</i>              
                            </button>
                            '.$this->reply_button($comment['comment_id'], $comment['comment_body']).'
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
            $this->print_parent($this->children[$c['comment_id']], $depth + 1);
            echo "</div>
            </div>
            </div>
            </div>";
          }
          else {
            echo "</div>
            </div>
            </div>
            </div>";
          }
      }
  }  

  public function reply_button($comment_parent, $comment_body)
  {  
      echo '
      <div class="modal" id="reply_comment-'.$comment_parent.'" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredReplyComment" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalCenteredReplyComment">Reply comment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <input type="hidden" name="comment_content_id" value="'.$_GET["id"].'">
              <input type="hidden" name="comment_parent" value="'.$comment_parent.'">
              <input type="hidden" name="comment_by" value="'.$_SESSION["userid"].'">
              <p>#'.$comment_parent.' - '.$comment_body.'</p>
              <textarea class="form-control mb-2 mr-sm-2" name="comment_body" rows="4" placeholder="comment body..."></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name= "reply_comment">Reply COMMENT</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>';
  }  

  public function add_button()
  {  
      echo '
      <button type="button" class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#add_comment">
        <i class="fa fa-plus"></i>              
      </button>
      <div class="modal" id="add_comment" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredAddComment" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalCenteredAddComment">ADD comment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <input type="hidden" name="comment_content_id" value="'.$_GET["id"].'">
              <input type="hidden" name="comment_by" value="'.$_SESSION["userid"].'">
              <textarea class="form-control mb-2 mr-sm-2" name="comment_body" rows="4" placeholder="comment body..."></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name= "add_comment">ADD COMMENT</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>';
  }  

  public function add_post()
  {  
      echo '
      <button type="button" class="btn btn-success btn-sm rounded-0 my-2" data-toggle="modal" data-target="#add_post">
        <i class="fa fa-plus"> شرح جديد</i>
      </button>
      <div class="modal" id="add_post" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredAddPost" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalCenteredAddPost">ADD post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <input type="hidden" name="post_content_id" value="'.$_GET["id"].'">
              <input type="hidden" name="post_by" value="'.$_SESSION["userid"].'">
              <input type="hidden" name="post_status" value="pending">
              <input type="text" class="form-control mb-2 mr-sm-2" name="post_title" placeholder="post title...">
              <input type="text" class="form-control mb-2 mr-sm-2" name="post_sayer" placeholder="post sayer...">
              <input type="text" class="form-control mb-2 mr-sm-2" name="post_source" placeholder="post source...">
              <textarea class="form-control mb-2 mr-sm-2" name="post_body" rows="4" placeholder="post body..."></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name= "add_post">ADD post</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>';
  }

  public function print_comments()
  {  
    echo '<hr>
    <h3 class="my-4">'.$this->comments_size.' Comments:</h3>';

      foreach ($this->parents as $c)  
      {  
        $this->print_parent($c);
      }  
  }  

    public function show_case()
    {
      $result = $this->get_case($_GET['id']); 
      foreach ($result as $row){
        echo'
        <div class="card mt-4">
          <h3 class="card-header text-center">'.$row['content_case'].'</h3>
          <div class="card-body">
            <h5 class="card-title">'.$row['content_content'].'</h5>
            <hr>
              <p class="card-text">'.$row['content_case_description'].'.</p>
          </div>
        </div>
        ';
      }
    }

    public function show_posts()
    {
        echo'
        <div class="card mt-4">
          <h3 class="card-header text-center">الشروح</h3>
          <div class="card-body">';
          $this->add_post();
          // loop throw posts then show them with read more/less
          $result = $this->get_posts($_GET['id']); 
          foreach ($result as $row){
            echo' 
            <div class="card mt-2 shadow p-3 mb-5 bg-light rounded">

              <div id="module" class="container">
                <h3>'.$row['post_title'].'</h3>
                <small>'.$row['post_date'].'</small>
                <br>
                <small>Author: '.$row['post_by'].'</small>
                <br>
                <small class:"mx-4">source: '.$row['post_source'].'</small>
                <hr>
                <p class="collapse" id="collapseExample" aria-expanded="false">'.$row['post_body'].'</p>
                <a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                </a>
              </div>

            </div>
          
          </div>
        </div>
        ';
      }
    }
}
