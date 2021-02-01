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
            header("Location: sign.php");
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
                header("Location: sign.php");
                exit();
                return false;
            }
        }
        // if user was not found
        else{
            $_SESSION['message']='Wrong name or pass';
            $_SESSION['msg_type']='danger';
            header("Location: sign.php");
            exit();
            return false;
        }
        
    }

    protected function is_username_taken($user_name)
    {
        $sql = "SELECT * FROM users WHERE user_name=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_name]);
        if(!$stmt){
            header("Location: ../index.php?sign=sql");
            exit();
        }
        $result = $stmt->fetch();
        if ($result){
            return true;
        }
        else {
            return false;
        }
    }
    protected function is_email_taken($user_email)
    {
        $sql = "SELECT * FROM users WHERE user_email=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_email]);
        if(!$stmt){
            header("Location: ../index.php?sign=sql");
            exit();
        }
        $result = $stmt->fetch();
        if ($result){
            return true;
        }
        else {
            return false;
        }
    }
    protected function sign_up_user($user_name, $user_email, $user_nickname, $user_pass, $user_country, $user_ip)
    {
        $sql = "INSERT INTO users(user_name, user_email, user_nickname, user_pass, user_country, user_ip) VALUES(?,?,?,?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_name, $user_email, $user_nickname, $user_pass, $user_country, $user_ip]);
        if(!$stmt){
            header("Location: ../index.php?sign=sql");
            exit();
        }
        $_SESSION['message']='User has been signed up';
        $_SESSION['msg_type']='success';
        header("Location: index.php");
        exit();
    }


}