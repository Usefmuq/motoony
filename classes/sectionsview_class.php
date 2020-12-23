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
        echo '<a href="submit.php?add_section=true&section_cat='.$_GET['id'].'" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-plus"></i> ADD SECTION</a>';
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
              <h4 class="card-title"><a href="sections.php?id='.$row ["section_id"].'">'.$row ["section_name"].'</a></h4>';
              // delete and edit
              if ($this->is_authorized()){
                echo '<ul class="list-inline m-0"style="font-family: "FontAwesome";">
                <li class="list-inline-item">
                    <a href="sections.php?edit_section='.$row["section_id"].'" class="btn btn-info btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="sections.php?delete_section='.$row["section_id"].'&section_cat='.$row["section_cat"].'" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" onclick="return confirm(\'Are you sure you want to delete?\')" title="Delete"><i class="fa fa-trash"></i></a>
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