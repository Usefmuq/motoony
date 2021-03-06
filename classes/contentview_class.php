<?php

class ContentView extends Content {
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
        echo '
        <button type="button" class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#add_content">
          <i class="fa fa-plus"></i>              
        </button>
        <div class="modal" id="add_content" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredAddContent" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalCenteredAddContent">ADD CONTENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="">
                <input type="hidden" name="content_section" value="'.$_GET["id"].'">
                <p>content sayer</p>
                <input type="text" class="form-control mb-2 mr-sm-2" name="content_sayer">
                <hr>
                <input type="hidden" name="content_by" value="'.$_SESSION['userid'].'">
                <p>content</p>
                <textarea class="form-control mb-2 mr-sm-2" name="content_content" rows="4"></textarea>
                <hr>
                <p>case</p>
                <input type="text" class="form-control mb-2 mr-sm-2" name="content_case">
                <hr>
                <p>case description</p>
                <input type="text" class="form-control mb-2 mr-sm-2" name="content_case_description">
                <hr>
                <p>content source</p>
                <input type="text" class="form-control mb-2 mr-sm-2" name="content_source">

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name= "add_content">Save changes</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>';
      }
    }
    public function edit_button()
    {
      if ($this->is_authorized()){
        echo '<a href="content_editor.php?id='.$_GET['id'].'" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-plus"></i> EDIT CONTENT</a>';
      }
    }
    public function show_content()
    {
        $content_result = $this->get_content($_GET['id']);
        $cases_result = $this->get_cases($_GET['id']);

            echo '
            <div class="overflow-auto p-3 bg-light" style="max-height: 300px;">
            <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Case Name</th>
                <th>Go</th>
                <th>Case link</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($cases_result as $row){
                echo '
              <tr>
                <td>'.$row ["case_id"].'</td>
                <td><a href="#case-'.$row ["case_id"].'">'.$row ["case_name"].'</a></td>
                <td><button type="button" class="btn btn-warning" onclick="case_search(\'cupidatat nulla elit cupidatat\')">عرض</button></td>
                <td><a href="thread.php?id='.$row ["case_id"].'" class="btn btn-info btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Comments"><i class="fa fa-comment"></i>التعليقات</a></td>
              </tr>';
            }
            echo '</tbody>
            </table>
            </div> <p>';
            foreach ($content_result as $row){
            echo ' '.$row ["content_content"].' <a href="thread.php?id='.$row ["content_id"].'"><span class="fa fa-comment"></span></a>';
            }
            echo '</p>';
    }
    public function show_editor()
    {
      if ($this->is_authorized()) {
        $content_result = $this->get_content($_GET['id']);
        $cases_result = $this->get_cases($_GET['id']);
        $this->add_button();
        foreach ($content_result as $row){
          echo '
          <div class="card">
          <div class="card-header">
          <ul class="list-inline m-0"style="font-family: "FontAwesome";">
          <li class="list-inline-item">
            <button type="button" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#Content'.$row ["content_id"].'">
              <i class="fa fa-edit"></i>              
            </button>
          </li>
          <li class="list-inline-item">
          <form method="POST" action="">
            <input type="hidden" name="content_id" value="'.$row["content_id"].'">
            <button type="submit" class="btn btn-danger btn-sm rounded-0" name ="delete_content">
              <i class="fa fa-trash"></i>
            </button>
          </form>
          </li>
          </ul>
          <div class="modal" id="Content'.$row ["content_id"].'" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredContent'.$row ["content_id"].'" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalCenteredContent'.$row ["content_id"].'">'.$row ["content_case"].'</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                  <input type="hidden" name="content_section" value="'.$_GET["id"].'">
                  <input type="hidden" name="content_id" value="'.$row["content_id"].'">
                  <input type="hidden" name="content_by" value="'.$_SESSION['userid'].'">
                  <p>content sayer</p>
                  <input type="text" class="form-control mb-2 mr-sm-2" name="content_sayer" value="'.$row["content_sayer"].'">
                  <hr>
                  <p>content</p>
                  <textarea class="form-control mb-2 mr-sm-2" name="content_content" rows="4">'.$row["content_content"].'</textarea>
                  <hr>
                  <p>case</p>
                  <input type="text" class="form-control mb-2 mr-sm-2" name="content_case" value="'.$row["content_case"].'">
                  <hr>
                  <p>case description</p>
                  <input type="text" class="form-control mb-2 mr-sm-2" name="content_case_description" value="'.$row["content_case_description"].'">
                  <hr>
                  <p>content source</p>
                  <input type="text" class="form-control mb-2 mr-sm-2" name="content_source" value="'.$row["content_source"].'">
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name= "content_edit">Save changes</button>
                  </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <hr>
          '.$row ["content_content"].'
          </div>
        <div class="card-body">
        <ul>
          <li>CASE: '.$row ["content_case"].'</li>
          <li>case description: '.$row ["content_case_description"].'</li>
          <li>source: '.$row ["content_source"].'</li>
          <li>date: '.$row ["content_date"].'</li>
        </ul>
        </div>
        </div>
        <hr>';


      }

    }
  }

}
