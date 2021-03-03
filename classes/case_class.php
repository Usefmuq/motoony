<?php
class Case extends Dbh {
    protected function get_case($content_id)
    {
        $sql = "SELECT * FROM content WHERE content_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$content_id]);
        return $stmt->fetchAll();
    }
}