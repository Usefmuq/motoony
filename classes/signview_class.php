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
            <button class="m-2 p-2 btn btn-outline-primary my-2 my-sm-0" type="submit" name= "sign_up_nav" value= "submit">Sign up</button></form>';
        }
    }

    public function sign_page()
    {
        if (isset($_SESSION['userid'])){
            $_SESSION['message']='You are already signed in!';
            $_SESSION['msg_type']='danger';
            header("Location: index.php");
            exit();
        }
        echo '
        <div class="row">
        <div class="col-8">
            <div class="card pb-3"> 
                <div class="card-header"> <div class="h2">Sign up:</div></div>
                <div class="card-body"> 
                    <form method="POST" action="">
                    <div class="row">
                    <div class="col">';
                    if (isset($_GET['user_name'])){
                        $user_name = $_GET['user_name'];
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_name" placeholder="Username" value="'.$user_name.'">';
                    }
                    else {
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_name" placeholder="Username">';
                    }
                    echo '</div>';
                    echo '<div class="col">';
                    if (isset($_GET['user_email'])){
                        $user_email = $_GET['user_email'];
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_email" placeholder="E-mail" value="'.$user_email.'">';
                    }
                    else {
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_email" placeholder="E-mail">';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col">';
                    if (isset($_GET['user_nickname'])){
                        $user_nickname = $_GET['user_nickname'];
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_nickname" placeholder="Neck name" value="'.$user_nickname.'">';
                    }
                    else {
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_nickname" placeholder="Neck name">';
                    }
                    echo '</div>
                    <div class="col">
                        <input type="text" class="form-control mb-2 mr-sm-2" name="user_pass" placeholder="Password">
                    </div>
                    </div>';
           
                   

                    echo '<div class="row">';
                    echo '<div class="col">';
                    if (isset($_GET['user_country'])){
                        $user_country = $_GET['user_country'];
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_country" placeholder="Country (optional)" value="'.$user_country.'">';
                    }
                    else {
                        echo '<input type="text" class="form-control mb-2 mr-sm-2" name="user_country" placeholder="Country (optional)">';
                    }
                    echo '</div> 
                    </div>
                    <button type= "submit" class="px-5 p-2 btn btn-primary mb-2" name= "sign_up_submit" value= "submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card pb-4"> 
                <div class="card-header"> <div class="h2">Sign in:</div></div>
                <div class="card-body"> 
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col">';
                            if (isset($_GET['mail_or_name'])){
                                $mail_or_name = $_GET['mail_or_name'];
                                echo '<input type="text" class="form-control mb-2 mr-sm-2" name="mail_or_name" placeholder="E-mail or Username" value="'.$mail_or_name.'">';
                            }
                            else{
                                echo '<input type="text" class="form-control mb-2 mr-sm-2" name="mail_or_name" placeholder="E-mail or Username">';
                            }
                            echo '
                            </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="user_pass" placeholder="Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type= "submit" class="px-5 p-2 btn btn-outline-success my-2 my-sm-0" name= "sign_in_submit" value= "submit">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>';



    }

}