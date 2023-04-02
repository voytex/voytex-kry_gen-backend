<?php
class Populator
{
    public function populateTask($task)
    {
        // foreach ($task as $row)
        // {
        //     echo $row . " \n";
        // }
        switch ($task['code'])
        {
            default:
            $task['description'] = preg_replace('/(\$)\d+/i', 'VALUE',$task['description']);
        }
        return $task;
    }
}