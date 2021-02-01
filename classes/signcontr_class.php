<?php

class SignContr extends Sign {

    private function signin_submit_condition()
    {
        if(!isset($_POST['sign_in_submit'])){
            $_SESSION['message']='Did not submit!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php");
            exit();
            return false;
        }
        return true;
    }
    private function signup_submit_condition()
    {
        if(!isset($_POST['sign_up_submit'])){
            $_SESSION['message']='Did not submit!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        return true;
    }
    private function signout_submit_condition()
    {
        if(!isset($_POST['sign_out_submit'])){
            $_SESSION['message']='Did not submit!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        return true;
    }
    private function not_empty_condition_signin($mail_or_name, $user_pass)
    {
        if(empty($mail_or_name) or empty($user_pass)){
            $_SESSION['message']='Empty username or password!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php");
            exit();
            return false;
        }
        return true;
    }
    private function not_empty_condition_signup($user_name, $user_email, $user_nickname, $user_pass, $user_country)
    {
        if(empty($user_name) or empty($user_email) or empty($user_nickname) or empty($user_pass)){
            $_SESSION['message']='Something is empty!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php?user_name=$user_name&user_email=$user_email&user_nickname=$user_nickname&user_country=$user_country");
            exit();
            return false;
        }
        return true;
    }
    private function valid_email($user_name, $user_email, $user_nickname, $user_pass, $user_country)
    {
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['message']='Wrong Email!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php?user_name=$user_name&user_nickname=$user_nickname&user_country=$user_country");
            exit();
            return false;
        }
        if ($this->is_email_taken($user_email)){
            $_SESSION['message']='Email has been taken!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php?user_name=$user_name&user_nickname=$user_nickname&user_country=$user_country");
            exit();
            return false;
        }

        return true;
    }
    private function valid_user_name($user_name, $user_email, $user_nickname, $user_pass, $user_country)
    {
        if (!preg_match('/^[a-zA-Z\d_]{3,20}$/i', $user_name)){
            $_SESSION['message']='Wrong username consist of alpha-numeric (a-z, A-Z, 0-9), underscores, and has minimum 3 character and maximum 20 character!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php?user_email=$user_email&user_nickname=$user_nickname&user_country=$user_country");
            exit();
            return false;
        }
        if ($this->is_username_taken($user_name)){
            $_SESSION['message']='Username has been taken!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php?user_email=".$user_email."&user_nickname=".$user_nickname."&user_country=".$user_country);
            exit();
            return false;
        }
        return true;
    }
    private function valid_nickname($user_name, $user_email, $user_nickname, $user_pass, $user_country)
    {
        if (!preg_match('/\A[أ-يA-Za-z0-9]+\z/', $user_nickname)){
            $_SESSION['message']='Wrong user nickname consist of alpha-numeric (a-z, A-Z, 0-9), underscores, and has minimum 3 character and maximum 20 character!';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php?user_name=$user_name&user_email=$user_email&user_country=$user_country");
            exit();
            return false;
        }
        return true;
    }
    public function sign_in()
    {
        if ($this->signin_submit_condition()) {
            $mail_or_name = $_POST['mail_or_name'];
            $user_pass = $_POST['user_pass'];
            if ($this->not_empty_condition_signin($mail_or_name, $user_pass)){
                $this->sign_in_user($mail_or_name, $user_pass);
            }
        }
    }
    public function sign_up()
    {
        if ($this->signup_submit_condition()) {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_nickname = $_POST['user_nickname'];
            $user_pass = $_POST['user_pass'];
            $user_country = $_POST['user_country'];
            $user_ip = $_SERVER['REMOTE_ADDR'];
            if ($this->not_empty_condition_signup($user_name, $user_email, $user_nickname, $user_pass, $user_country)){
                if ($this->valid_email($user_name, $user_email, $user_nickname, $user_pass, $user_country)){
                    if ($this->valid_user_name($user_name, $user_email, $user_nickname, $user_pass, $user_country)){
                        if ($this->valid_nickname($user_name, $user_email, $user_nickname, $user_pass, $user_country)){
                            // insert new user
                            $hashed_pass = password_hash($user_pass,PASSWORD_DEFAULT);
                            $this->sign_up_user($user_name, $user_email, $user_nickname, $hashed_pass, $user_country, $user_ip);
                        }
                    }
                }
            }
        }
    }
    public function sign_out()
    {
        if ($this->signout_submit_condition()) {
            session_start();
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit();
        }
    }

}