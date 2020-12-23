<?php

class Books extends Dbh {
    
    protected function get_books()
    {
        $sql = "SELECT * FROM books;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function find_book($book_name)
    {
        $sql = "SELECT * FROM books WHERE book_name=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_name]);
        if(!$stmt){
            header("Location: ../index.php?sign=sql");
            exit();
        }
        $result = $stmt->fetch();
        return $result;
    }

    protected function find_book_id($book_id)
    {
        $sql = "SELECT * FROM books WHERE book_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_id]);
        if(!$stmt){
            header("Location: ../index.php?sign=sql");
            exit();
        }
        $result = $stmt->fetch();
        return $result;
    }

    protected function set_book($book_name, $book_description)
    {
        $sql = "INSERT INTO books(book_name, book_description) VALUES(?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_name, $book_description]);
        $_SESSION['message']='book has been Added';
        $_SESSION['msg_type']='success';
        header("Location: index.php");
        exit();
    }

    protected function delete_book($book_id)
    {
        $sql = "DELETE FROM books WHERE book_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_id]);
        $_SESSION['message']='book has been deleted';
        $_SESSION['msg_type']='danger';
        header("Location: index.php");
        exit();
    }
    protected function edit_book($book_id,$book_name, $book_description)
    {
        $sql = "UPDATE books SET book_name=?,book_description=? WHERE book_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$book_name, $book_description,$book_id]) or die('aaa');
        $_SESSION['message']='book has been updated';
        $_SESSION['msg_type']='success';
        header("Location: index.php");
        exit();
    }



}