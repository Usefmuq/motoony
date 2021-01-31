<?php

class SignContr extends Sign {

    private function submit_condition()
    {
        if(!isset($_POST['sign_in_submit'])){
            $_SESSION['message']='Did not submit!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        return true;
    }
    private function not_empty_condition($mail_or_name, $user_pass)
    {
        if(empty($mail_or_name) or empty($user_pass)){
            $_SESSION['message']='Empty username or password!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        return true;
    }
    public function sign_in()
    {

        if ($this->submit_condition()) {
            $mail_or_name = $_POST['mail_or_name'];
            $user_pass = $_POST['user_pass'];
            if ($this->not_empty_condition($mail_or_name, $user_pass)){
                $this->sign_in_user($mail_or_name, $user_pass);
            }
        }
    }

}