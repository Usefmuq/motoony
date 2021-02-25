<?php

class BooksView extends Books {

    private function is_authorized()
    {
      if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        return true;
      }
      return false;
    }

    public function add_button()
    {
      if ($this->is_authorized()){
        echo '<button type="button" class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#add_book">
        <i class="fa fa-plus"></i>              
      </button>
      <div class="modal" id="add_book" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredAddBook" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalCenteredAddBook">ADD book</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <input type="text" class="form-control mb-2 mr-sm-2" name="book_name" placeholder="Book name...">
              <textarea class="form-control mb-2 mr-sm-2" name="book_description" rows="4" placeholder="Book description..."></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name= "add_book">Save changes</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>';
      }
    }

    public function show_books()
    {
        $result = $this->get_books();
        $counter = 0;

        echo '<div class="card-deck m-3">';
        foreach ($result as $row){
            if ($counter % 3 == 0){
                echo '</div>
                <div class="card-deck m-3">';
            }
            echo '<div class="card">
            <div class="card-body">
              <h4 class="card-title"><a href="sections.php?id='.$row ["book_id"].'">'.$row ["book_name"].'</a></h4>';
              // delete and edit
              if ($this->is_authorized()){
                echo '<ul class="list-inline m-0"style="font-family: "FontAwesome";">
                <li class="list-inline-item">
                <button type="button" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#edit_book'.$row["book_id"].'">
                <i class="fa fa-edit"></i>              
                </button>
                <div class="modal" id="edit_book'.$row["book_id"].'" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredEditBook'.$row["book_id"].'" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenteredEditBook'.$row["book_id"].'">Edit Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="">
                        <input type="hidden" name="book_id" value="'.$row["book_id"].'">
                        <input type="text" class="form-control mb-2 mr-sm-2" name="book_name" value="'.$row["book_name"].'">
                        <textarea class="form-control mb-2 mr-sm-2" name="book_description" rows="4">'.$row["book_description"].'</textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name= "edit_book">Save changes</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>                
                </li>
                <li class="list-inline-item">
                  <form method="POST" action="">
                  <input type="hidden" name="book_id" value="'.$row["book_id"].'">
                  <button type="submit" class="btn btn-danger btn-sm rounded-0" name ="delete_book" onclick="return confirm(\'Are you sure you want to delete?\')">
                    <i class="fa fa-trash"></i>
                  </button>
                  </form>
                </li>
                </ul>';
            }
             echo  '<p class="card-text">'.$row ["book_description"].'</p>';
            echo '</div>
          </div>';
          $counter++;
        }
        while ($counter % 3 != 0){
            echo '<div class="card">
            <div class="card-body">
              <h4 class="card-title"></h4>
              <p class="card-text"></p>
            </div>
          </div>';
            $counter++;
        }
        echo'</div>';
    }
}