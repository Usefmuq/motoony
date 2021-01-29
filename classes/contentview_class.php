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
        echo '<a href="submit.php?add_content=true&content_section='.$_GET['id'].'" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-plus"></i> ADD CONTENT</a>';
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
                <td><button type="button" class="btn btn-info">الشرح والتعليقات</button></td></td>
              </tr>';
            }
            echo '</tbody>
            </table>
            </div>';
            foreach ($content_result as $row){
            echo '<p id="case-'.$row ["content_case"].'">'.$row ["content_content"].'</p>';
            }
            echo '';
    }

}
//'.$row ["content_content"].'