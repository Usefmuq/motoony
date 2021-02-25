<?php

class SectionsView extends Sections {

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
        echo '<button type="button" class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#add_section">
        <i class="fa fa-plus"></i>              
      </button>
      <div class="modal" id="add_section" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredAddSection" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalCenteredAddSection">ADD section</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <input type="hidden" name="section_cat" value="'.$_GET["id"].'">
              <input type="text" class="form-control mb-2 mr-sm-2" name="section_name" placeholder="section name...">
              <textarea class="form-control mb-2 mr-sm-2" name="section_description" rows="4" placeholder="section description..."></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name= "add_section">Save changes</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>';
      }
    }

    public function show_sections()
    {
        $result = $this->get_sections($_GET['id']);
        $counter = 0;

        echo '<div class="card-deck m-3">';
        foreach ($result as $row){
            if ($counter % 3 == 0){
                echo '</div>
                <div class="card-deck m-3">';
            }
            echo '<div class="card">
            <div class="card-body">
              <h4 class="card-title"><a href="content.php?id='.$row ["section_id"].'">'.$row ["section_name"].'</a></h4>';
              // delete and edit
              if ($this->is_authorized()){
                echo '<ul class="list-inline m-0"style="font-family: "FontAwesome";">
                <li class="list-inline-item">
                  <button type="button" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#edit_section'.$row["section_id"].'">
                  <i class="fa fa-edit"></i>              
                  </button>
                  <div class="modal" id="edit_section'.$row["section_id"].'" tabindex="-1" role="dialog" aria-labelledby="ModalCenteredEditSection'.$row["section_id"].'" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalCenteredEditSection'.$row["section_id"].'">Edit Section</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="">
                          <input type="hidden" name="section_id" value="'.$row["section_id"].'">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="section_name" value="'.$row["section_name"].'">
                          <textarea class="form-control mb-2 mr-sm-2" name="section_description" rows="4">'.$row["section_description"].'</textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name= "edit_section">Save changes</button>
                          </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-inline-item">
                  <form method="POST" action="">
                    <input type="hidden" name="section_id" value="'.$row["section_id"].'">
                    <button type="submit" class="btn btn-danger btn-sm rounded-0" name ="delete_section" onclick="return confirm(\'Are you sure you want to delete?\')">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                </li>
                </ul>';
            }
             echo  '<p class="card-text">'.$row ["section_description"].'</p>';
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