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
            header("Location: submit.php?add_book=true");
            exit();
            return false;
        }
        if(strlen($book_description) > 255 or strlen($book_name) > 255){
            $_SESSION['message']='Book name and description should be less than 255 character!';
            $_SESSION['msg_type']='danger';
            header("Location: submit.php?add_book=true");
            exit();
            return false;
        }
        $result_check = $this->find_book($book_name);
        if($result_check){
            $_SESSION['message']='Book name has been taken!';
            $_SESSION['msg_type']='danger';
            header("Location: submit.php?add_book=true");
            exit();
            return false;
        }
        
        return true;
    }

    public function job_check()
    {
        if ($this->is_authorized()){
            if(isset($_GET['edit_book'])){
                $book_id = $_GET['edit_book'];
                $result_check = $this->find_book_id($book_id);
                if(!$result_check){
                    $_SESSION['message']='Book was not found!';
                    $_SESSION['msg_type']='danger';
                    header("Location: index.php");
                    exit();
                }        
                else {
                    header('Location: submit.php?update_book='.$result_check["book_id"].'&book_name='.$result_check["book_name"].'&book_description='.$result_check["book_description"]);
                }
            }
            if(isset($_GET['delete_book'])){
                $book_id = $_GET['delete_book'];
                $result_check = $this->find_book_id($book_id);
                if(!$result_check){
                    $_SESSION['message']='Book was not found!';
                    $_SESSION['msg_type']='danger';
                    header("Location: index.php");
                    exit();
                }        
                else {
                    $this->delete_book($book_id);
                }
            }
        }
    }

    public function call_edit($book_id, $book_name, $book_description)
    {
        if ($this->is_authorized()){
            $result = $this->edit_book($book_id,$book_name, $book_description);
            return $result;
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
            $book_name = $_POST['book_name'];
            $book_description = $_POST['book_description'];
            if ($this->conditions($book_name, $book_description)){
                $stmt = $this->set_book($book_name, $book_description);
                
            }
        }        

    }

}