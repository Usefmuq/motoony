<?php

class Sections extends Dbh {
    
    protected function get_sections($section_cat)
    {
        $sql = "SELECT * FROM sections WHERE section_cat=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$section_cat]);
        return $stmt->fetchAll();
    }

    protected function find_section($section_name)
    {
        $sql = "SELECT * FROM sections WHERE section_name=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$section_name]);
        if(!$stmt){
            header("Location: ../index.php?sign=sql");
            exit();
        }
        $result = $stmt->fetch();
        return $result;
    }

    protected function find_section_id($section_id)
    {
        $sql = "SELECT * FROM sections WHERE section_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$section_id]);
        if(!$stmt){
            header("Location: ../index.php?sign=sql");
            exit();
        }
        $result = $stmt->fetch();
        return $result;
    }

    protected function set_section($section_name, $section_description, $section_cat)
    {
        $sql = "INSERT INTO sections(section_name, section_cat, section_description) VALUES(?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$section_name, $section_cat, $section_description]) or die('error 101');
        $_SESSION['message']='section has been Added';
        $_SESSION['msg_type']='success';
        header("Location: sections.php?id=".$_GET['id']);
        exit();
    }

    protected function delete_section($section_id)
    {
        $sql = "DELETE FROM sections WHERE section_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$section_id]);
        $_SESSION['message']='section has been deleted';
        $_SESSION['msg_type']='danger';
        header("Location: sections.php?id=".$_GET['id']);
        exit();
    }
    protected function edit_section($section_id,$section_name, $section_description)
    {
        $sql = "UPDATE sections SET section_name=?,section_description=? WHERE section_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$section_name, $section_description,$section_id]) or die('aaa');
        $_SESSION['message']='section has been updated';
        $_SESSION['msg_type']='success';
        header("Location: sections.php?id=".$_GET['id']);
        exit();
    }



}