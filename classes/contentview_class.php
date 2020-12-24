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

        foreach ($content_result as $row){
            echo '<div class="row">
            <div class="col-8">
                '.$row ["content_content"].'
            </div>
            <div class="col-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>case</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($cases_result as $row){
                        echo '<tr>
                            <td>'.$row ["case_id"].'</td>
                            <td><a href="content.php?id='.$row ["case_section"].'&case='.$row ["case_id"].'">'.$row ["case_name"].'</a></td>
                        </tr>';
                    }
                        
                    echo '</tbody>
                </table>
            </div>
        
        </div>';

        }
    }

}