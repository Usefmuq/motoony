<?php

class Content extends Dbh {
    
    protected function get_content($content_section)
    {
        $sql = "SELECT * FROM content WHERE content_section=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_section]);
        return $stmt->fetchAll();
    }
    protected function get_cases($case_section)
    {
        $sql = "SELECT * FROM cases WHERE case_section=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$case_section]);
        return $stmt->fetchAll();
    }
    protected function set_content($content_subject, $content_section , $content_sayer, $content_by, $content_content, $content_source)
    {
        $sql = "INSERT INTO content(content_subject, content_section, content_sayer, content_by, content_content, content_source) VALUES(?,?,?,?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_subject, $content_section , $content_sayer, $content_by, $content_content, $content_source]);
        $_SESSION['message']='content has been Added';
        $_SESSION['msg_type']='success';
        header("Location: sections.php?id=".$content_section);
        exit();
    }
    protected function delete_content($content_id)
    {
        $sql = "DELETE FROM content WHERE content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_id]);
        $_SESSION['message']='content has been deleted';
        $_SESSION['msg_type']='danger';
        header("Location: sections.php?id=".$_GET['section_cat']);
        exit();
    }
    protected function edit_content($content_id,$content_subject, $content_sayer, $content_by, $content_content, $content_source)
    {
        $sql = "UPDATE content SET content_subject=?,content_sayer=?,content_by=?,content_content=?,content_source=? WHERE content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_id,$content_subject, $content_sayer, $content_by, $content_content, $content_source]) or die('aaa');
        $_SESSION['message']='section has been updated';
        $_SESSION['msg_type']='success';
        header("Location: sections.php");
        exit();
    }

}