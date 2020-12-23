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
        echo '<a href="submit.php?add_book=true" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-plus"></i> ADD BOOK</a>';
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
                    <a href="index.php?edit_book='.$row["book_id"].'" class="btn btn-info btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="index.php?delete_book='.$row["book_id"].'" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" onclick="return confirm(\'Are you sure you want to delete?\')" title="Delete"><i class="fa fa-trash"></i></a>
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