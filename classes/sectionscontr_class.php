<?php

class SectionsContr extends Sections {

    private function is_authorized()
    {
      if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        return true;
      }
      return false;
    }

    public function conditions($section_name, $section_description)
    {
        if(empty($section_name) or empty($section_description)){
            $_SESSION['message']='Something is empty!';
            $_SESSION['msg_type']='danger';
            header("Location: submit.php?add_section=true");
            exit();
            return false;
        }
        if(strlen($section_description) > 255 or strlen($section_name) > 255){
            $_SESSION['message']='Section name and description should be less than 255 character!';
            $_SESSION['msg_type']='danger';
            header("Location: submit.php?add_section=true");
            exit();
            return false;
        }
        $result_check = $this->find_section($section_name);
        if($result_check){
            $_SESSION['message']='Section name has been taken!';
            $_SESSION['msg_type']='danger';
            header("Location: submit.php?add_section=true");
            exit();
            return false;
        }
        
        return true;
    }

    public function job_check()
    {
        if ($this->is_authorized()){
            if(isset($_GET['edit_section'])){
                $section_id = $_GET['edit_section'];
                $result_check = $this->find_section_id($section_id);
                if(!$result_check){
                    $_SESSION['message']='section was not found!';
                    $_SESSION['msg_type']='danger';
                    header("Location: index.php");
                    exit();
                }        
                else {
                    header('Location: submit.php?update_section='.$result_check["section_id"].'&section_name='.$result_check["section_name"].'&section_description='.$result_check["section_description"]);
                }
            }
            if(isset($_GET['delete_section'])){
                $section_id = $_GET['delete_section'];
                $result_check = $this->find_section_id($section_id);
                if(!$result_check){
                    $_SESSION['message']='section was not found!';
                    $_SESSION['msg_type']='danger';
                    header("Location: index.php");
                    exit();
                }        
                else {
                    $this->delete_section($section_id);
                }
            }
        }
    }

    public function call_edit($section_id, $section_name, $section_description)
    {
        if ($this->is_authorized()){
            $result = $this->edit_section($section_id,$section_name, $section_description);
            return $result;
        }
    }

    public function add_section()
    {
        if(!isset($_POST['add_section'])){
            $_SESSION['message']='submit error';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            }
        else {
            $section_name = $_POST['section_name'];
            $section_description = $_POST['section_description'];
            $section_cat = $_POST['section_cat'];
            if ($this->conditions($section_name, $section_description)){
                $stmt = $this->set_section($section_name, $section_description, $section_cat);
                
            }
        }        

    }

}