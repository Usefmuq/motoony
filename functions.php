<?php

function error_message(){
    if (!isset($_GET['book'])){
        //exit();
    }
    else{
        $book_check = $_GET['book'];
        if ($book_check == "added"){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<p>You added a new book!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($book_check == "taken"){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            <p class="text-danger"><strong>Error!</strong> Book name has been taken!.</p> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($book_check == "empty"){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            <p class="text-danger"><strong>Error!</strong> Something is empty!.</p> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($book_check == "unauthorized"){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            <p class="text-danger"><strong>Error!</strong> You are unauthorized!.</p> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($book_check == "length"){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            <p class="text-danger"><strong>Error!</strong> Book name and description should be less than 255 character!.</p> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }


    }
    if(!isset($_GET['sign'])){
        //exit();
    }
    else {
        $signup_check = $_GET['sign'];
        if ($signup_check == "successu"){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<p>You have been signed up successfully!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "successi"){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<p>You have been signed in successfully!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "out"){
            echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert">';
            echo '<p>You have been signed out successfully!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "post"){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            <p class="text-danger"><strong>Error!</strong> Did not submit!.</p> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "empty"){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            <p class="text-danger"><strong>Error!</strong> Something is empty!.</p> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "email"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<p>Wrong Email!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "username"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<p>Wrong username must consist of alpha-numeric (a-z, A-Z, 0-9), underscores, and has minimum 3 character and maximum 20 character!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "notfound"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<p>Wrong username or email</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "usertaken"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<p>Username is taken. Chose another one please.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "emailtaken"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<p>This email already has an account.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "wrongpass"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<p>Wrong password.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
        elseif ($signup_check == "sql"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<p>Error try again sql!</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';
            // exit();
        }
    }
}

function nav_form(){
    if (isset($_SESSION['userid'])){
        echo '<ul class="navbar-nav my-2 my-lg-0"><li class="nav-item"><a class="nav-link" href="account.php">Hello '.$_SESSION['username'].'</a></li></ul>';
        echo '<form class="form-inline my-2 my-lg-0" method="POST" action="includes/signout_inc.php">
        <button class="m-2 p-2 btn btn-outline-danger my-2 my-sm-0" type="submit" name= "signout_submit">Sign out</button></form>';
    }
    else{
        echo '<form class="form-inline my-2 my-lg-0" method="POST" action="includes/signin_inc.php">
        <input type="text" class="m-2 p-2 form-control mb-2 mr-sm-2" name="mail_or_name" placeholder="E-mail or Username">
        <input type="text" class="m-2 p-2 form-control mb-2 mr-sm-2" name="user_pass" placeholder="Password">
        <button class="m-2 p-2 btn btn-outline-success my-2 my-sm-0" type="submit" name= "submit" value= "submit">Sign in</button></form>';
        echo '<form class="form-inline my-2 my-lg-0" method="POST" action="sign.php">
        <button class="m-2 p-2 btn btn-outline-primary my-2 my-sm-0" type="submit" name= "submit" value= "submit">Sign up</button></form>';
    }

}

function nav_list(){
    if (isset($_SESSION['userid'])){
        echo '<li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>';
    }
    else{
        echo '<li class="nav-item"><a class="nav-link" href="sign.php">Sign</a></li>';
    }
}

function add_book(){
    if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        echo'<div class="card pb-3"> 
        <div class="card-header"> <div class="h2">Add book:</div></div>
        <div class="card-body"> 
        <form method="POST" action="includes/add_book_inc.php">
        <input type="text" class="form-control mb-2 mr-sm-2" name="book_name" placeholder="Book name...">
        <textarea class="form-control mb-2 mr-sm-2" name="book_description" rows="4" placeholder="Book description..."></textarea>
        <button type= "submit" class="px-5 p-2 btn btn-primary mb-2" name= "submit" value= "submit">Add book</button>
        </form>
        </div>
        </div>';
    }
}

function add_section(){
    if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        echo'<div class="card pb-3"> 
        <div class="card-header"> <div class="h2">Add section:</div></div>
        <div class="card-body"> 
        <form method="POST" action="includes/add_section_inc.php">
        <input class="form-control mb-2 mr-sm-2" type="text" name="section_cat" value="'.$_GET['id'].'" readonly>
        <input type="text" class="form-control mb-2 mr-sm-2" name="section_name" placeholder="Section name...">
        <textarea class="form-control mb-2 mr-sm-2" name="section_description" rows="4" placeholder="Section description..."></textarea>
        <button type= "submit" class="px-5 p-2 btn btn-primary mb-2" name= "submit" value= "submit">Add section</button>
        </form>
        </div>
        </div>';
    }
}

function add_case(){
    if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
        echo'<div class="card pb-3"> 
        <div class="card-header"> <div class="h2">Add case:</div></div>
        <div class="card-body"> 
        <form method="POST" action="includes/add_case_inc.php">
        <input class="form-control mb-2 mr-sm-2" type="text" name="case_section" value="'.$_GET['id'].'" readonly>
        <input type="text" class="form-control mb-2 mr-sm-2" name="case_name" placeholder="case name...">
        <textarea class="form-control mb-2 mr-sm-2" name="case_description" rows="4" placeholder="case description..."></textarea>
        <button type= "submit" class="px-5 p-2 btn btn-primary mb-2" name= "submit" value= "submit">Add case</button>
        </form>
        </div>
        </div>';
    }
}

function show_books(){
$result= include_once "includes/show_books_inc.php";
    $counter = 0;
    echo '<div class="card-deck m-3">';
    while ($row=mysqli_fetch_assoc($result)){
        if ($counter % 3 == 0){
            echo '</div>
            <div class="card-deck m-3">';
        }
        echo '<div class="card">
        <div class="card-body">
          <h4 class="card-title"><a href="book.php?id='.$row ["book_id"].'">'.$row ["book_name"].'</a></h4>
          <p class="card-text">'.$row ["book_description"].'</p>
        </div>
      </div>';
      $counter++;
    }
    while ($counter % 3 != 0){
        echo '<div class="card">
        <div class="card-body">
          <h4 class="card-title"></h4>
          <p class="card-text"></p>
        </div>
      </div>';
        $counter++;
    }
    echo'</div>';
}

function show_sections(){
$result= include_once "includes/show_sections_inc.php";
    $counter = 0;
    echo '<div class="card-deck m-3">';
    while ($row=mysqli_fetch_assoc($result)){
        if ($counter % 3 == 0){
            echo '</div>
            <div class="card-deck m-3">';
        }
        echo '<div class="card">
        <div class="card-body">
          <h4 class="card-title"><a href="section.php?id='.$row ["section_id"].'">'.$row ["section_name"].'</a></h4>
          <p class="card-text">'.$row ["section_description"].'</p>
        </div>
      </div>';
      $counter++;
    }
    while ($counter % 3 != 0){
        echo '<div class="card">
        <div class="card-body">
          <h4 class="card-title"></h4>
          <p class="card-text"></p>
        </div>
      </div>';
        $counter++;
    }
    echo'</div>';
}

function show_cases(){
$result= include_once "includes/show_cases_inc.php";
    $counter = 0;
    echo '<table class="table m-3">
    <thead class="thead-dark">
      <tr>
        <th>#case ID</th>
        <th>Case Name</th>
        <th>Case Description</th>
        <th>Number Of Says</th>
        <th>Case Date</th>
      </tr>
    </thead>
    <tbody>';
    while ($row=mysqli_fetch_assoc($result)){
        echo '<tr>
        <th scope="row"><a href="case.php?id='.$row ["case_id"].'">'.$row ["case_id"].'</th>
        <td><a href="case.php?id='.$row ["case_id"].'">'.$row ["case_name"].'</td>
        <td>'.$row ["case_description"].'</td>
        <td><span class="badge badge-primary badge-pill">0</span></td>
        <td>'.$row ["case_date"].'</td>
        </tr>
        ';
    }
    echo'</tbody>
    </table>';
}