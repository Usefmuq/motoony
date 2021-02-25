<?php

class BooksContr extends Books {

    private function is_authorized()
    {
      if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        return true;
      }
      return false;
    }

    public function conditions($book_name, $book_description)
    {
        if(empty($book_name) or empty($book_description)){
            $_SESSION['message']='Something is empty!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        if(strlen($book_description) > 255 or strlen($book_name) > 255){
            $_SESSION['message']='Book name and description should be less than 255 character!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        $result_check = $this->find_book($book_name);
        if($result_check){
            $_SESSION['message']='Book name has been taken!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        
        return true;
    }

    // public function job_check()
    // {
    //     if ($this->is_authorized()){
    //         if(isset($_GET['edit_book'])){
    //             $book_id = $_GET['edit_book'];
    //             $result_check = $this->find_book_id($book_id);
    //             if(!$result_check){
    //                 $_SESSION['message']='Book was not found!';
    //                 $_SESSION['msg_type']='danger';
    //                 header("Location: index.php");
    //                 exit();
    //             }        
    //             else {
    //                 header('Location: submit.php?update_book='.$result_check["book_id"].'&book_name='.$result_check["book_name"].'&book_description='.$result_check["book_description"]);
    //             }
    //         }
    //         if(isset($_GET['delete_book'])){
    //             $book_id = $_GET['delete_book'];
    //             $result_check = $this->find_book_id($book_id);
    //             if(!$result_check){
    //                 $_SESSION['message']='Book was not found!';
    //                 $_SESSION['msg_type']='danger';
    //                 header("Location: index.php");
    //                 exit();
    //             }        
    //             else {
    //                 $this->delete_book($book_id);
    //             }
    //         }
    //     }
    // }

    public function call_edit()
    {
        if ($this->is_authorized()){
            if(!isset($_POST['edit_book'])){
                $_SESSION['message']='submit error';
                $_SESSION['msg_type']='danger';
                header("Location: index.php");
                exit();
            }
            else {
                if ($this->conditions($_POST['book_name'], $_POST['book_description'])){
                    $this->edit_book($_POST['book_id'],$_POST['book_name'], $_POST['book_description']);
                }
            }
        }
    }

    public function add_book()
    {
        if(!isset($_POST['add_book'])){
            $_SESSION['message']='submit error';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            }
        else {
            if ($this->conditions($_POST['book_name'], $_POST['book_description'])){
                $this->set_book($_POST['book_name'], $_POST['book_description']);
            }
        }        

    }
    
    public function delete_request()
    {
      if ($this->is_authorized()) {
        $this->delete_book($_POST['book_id']);
      }
    }  

}