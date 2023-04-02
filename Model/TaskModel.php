<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class TaskModel extends Database
{
    public function getAllTasks($limit)
    {
        return $this->select("SELECT * FROM `mpckrygr14`.`tasks` LIMIT ?", ["i", $limit]);
    }

    public function getTask($code)
    {
        return $this->select("SELECT * FROM `mpckrygr14`.`tasks` WHERE `code` = ?", ["s", $code]);
    }
}