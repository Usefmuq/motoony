<?php

class SignView extends Sign {
    
    public function nav_form()
    {
        if (isset($_SESSION['userid'])){
            echo '<ul class="navbar-nav my-2 my-lg-0"><li class="nav-item"><a class="nav-link" href="account.php">Hello '.$_SESSION['username'].'</a></li></ul>';
            echo '<form class="form-inline my-2 my-lg-0" method="POST" action="">
            <button class="m-2 p-2 btn btn-outline-danger my-2 my-sm-0" type="submit" name= "sign_out_submit">Sign out</button></form>';
        }
        else{
            echo '<form class="form-inline my-2 my-lg-0" method="POST" action="">
            <input type="text" class="m-2 p-2 form-control mb-2 mr-sm-2" name="mail_or_name" placeholder="E-mail or Username">
            <input type="text" class="m-2 p-2 form-control mb-2 mr-sm-2" name="user_pass" placeholder="Password">
            <button class="m-2 p-2 btn btn-outline-success my-2 my-sm-0" type="submit" name= "sign_in_submit" value= "submit">Sign in</button></form>';
            echo '<form class="form-inline my-2 my-lg-0" method="POST" action="sign.php">
            <button class="m-2 p-2 btn btn-outline-primary my-2 my-sm-0" type="submit" name= "sign_up_submit" value= "submit">Sign up</button></form>';
        }
    
    }

}