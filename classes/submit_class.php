<?php
class SectionSubmit extends SectionsContr {
    function __construct() {
        $this->add_section();
    }
}
class Submit extends BooksContr {
    
    public function job_check()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['update_book'])){
                $book_id = $_POST['book_id'];
                $book_name =  $_POST['book_name'];
                $book_description =  $_POST['book_description'];
                $this->call_edit($book_id, $book_name, $book_description);
            }
            if (isset($_POST['add_book'])){
                $this->add_book();
            }
            if (isset($_POST['add_section'])){
                $section_submit = new SectionSubmit();
            }
        }
            if(isset($_GET['update_book'])){
            if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
                echo'<div class="card pb-3"> 
                <div class="card-header"> <div class="h2">Update book:</div></div>
                <div class="card-body"> 
                <form method="POST" action="submit.php?update_book='.$_GET["update_book"].'&book_name='.$_GET["book_name"].'&book_description='.$_GET["book_description"].'">
                <input type="hidden" name="book_id" value="'.$_GET["update_book"].'">
                <input type="text" class="form-control mb-2 mr-sm-2" name="book_name" placeholder="Book name..." value="'.$_GET["book_name"].'">
                <textarea class="form-control mb-2 mr-sm-2" name="book_description" rows="4" placeholder="Book description...">'.$_GET["book_description"].'</textarea>
                <button type= "submit" class="px-5 p-2 btn btn-primary mb-2" name= "update_book">Update book</button>
                </form>
                </div>
                </div>';
            }
        }
        if(isset($_GET['add_book'])){
            if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
                echo'<div class="card pb-3"> 
                <div class="card-header"> <div class="h2">Add book:</div></div>
                <div class="card-body"> 
                <form method="POST" action="submit.php">
                <input type="text" class="form-control mb-2 mr-sm-2" name="book_name" placeholder="Book name...">
                <textarea class="form-control mb-2 mr-sm-2" name="book_description" rows="4" placeholder="Book description..."></textarea>
                <button type= "submit" class="px-5 p-2 btn btn-primary mb-2" name= "add_book" value= "submit">Add book</button>
                </form>
                </div>
                </div>';
                }
            }
        
            if(isset($_GET['add_section'])){
            if (isset($_SESSION['userid']) && $_SESSION['userlevel'] >= 4){
                echo'<div class="card pb-3"> 
                <div class="card-header"> <div class="h2">Add section:</div></div>
                <div class="card-body"> 
                <form method="POST" action="submit.php">
                <input type="hidden" name="section_cat" value="'.$_GET["section_cat"].'">
                <input type="text" class="form-control mb-2 mr-sm-2" name="section_name" placeholder="section name...">
                <textarea class="form-control mb-2 mr-sm-2" name="section_description" rows="4" placeholder="section description..."></textarea>
                <button type= "submit" class="px-5 p-2 btn btn-primary mb-2" name= "add_section" value= "submit">Add section</button>
                </form>
                </div>
                </div>';
                }
            }

        
    }


}