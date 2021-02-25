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
    protected function set_content($content_section , $content_sayer, $content_by, $content_content,$content_case, $content_case_description, $content_source)
    {
        $sql = "INSERT INTO content(content_section, content_sayer, content_by, content_content,content_case,content_case_description, content_source) VALUES(?,?,?,?,?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_section , $content_sayer, $content_by, $content_content,$content_case, $content_case_description, $content_source]) or die('error');
        $_SESSION['message']='content has been Added';
        $_SESSION['msg_type']='success';
        header("Location: content_editor.php?id=".$_GET['id']);
        exit();
    }
    protected function delete_content($content_id)
    {
        $sql = "DELETE FROM content WHERE content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_id]);
        $_SESSION['message']='content has been deleted';
        $_SESSION['msg_type']='danger';
        header("Location: content_editor.php?id=".$_GET['id']);
        exit();
    }
    protected function edit_content($content_sayer, $content_content,$content_case, $content_case_description, $content_source, $content_id)
    {
        $sql = "UPDATE content SET content_sayer=?,content_content=?,content_case=? ,content_case_description=?,content_source=? WHERE content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$content_sayer, $content_content,$content_case, $content_case_description, $content_source, $content_id]) or die('aaa');
        $_SESSION['message']='content has been updated '.$result;
        $_SESSION['msg_type']='success';
        header("Location: content_editor.php?id=".$_GET['id']);
        exit();
    }

}