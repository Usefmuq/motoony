<?php

class Sign extends Dbh {
    
    protected function sign_in_user($mail_or_name, $user_pass)
    {
        $sql = "SELECT * FROM users WHERE user_email=? OR user_name=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$mail_or_name, $mail_or_name]);
        if(!$stmt){
            $_SESSION['message']='SQL Error';
            $_SESSION['msg_type']='danger';
            header("Location: ../index.php");
            exit();
        }
        if ($row = $stmt->fetch()){
            $pass_check = password_verify($user_pass, $row['user_pass']);
            if ($pass_check == true){
                session_start();
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['username'] = $row['user_name'];
                $_SESSION['usernickname'] = $row['user_nickname'];
                $_SESSION['userlevel'] = $row['user_level'];
                $_SESSION['message']='You have been signed in successfully!';
                $_SESSION['msg_type']='success';
                header("Location: index.php");
                exit();
                return true;
            }
            else {
                $_SESSION['message']='Wrong name or pass';
                $_SESSION['msg_type']='danger';
                header("Location: index.php");
                exit();
                return false;
            }
        }
        // if user was not found
        else{
            $_SESSION['message']='Wrong name or pass';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
            return false;
        }
        
    }

}