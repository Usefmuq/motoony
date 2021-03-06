<?php
class Thread extends Dbh {
    protected function get_case($content_id)
    {
        $sql = "SELECT * FROM content WHERE content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_id]);
        return $stmt->fetchAll();
    }
    protected function get_comments()
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}