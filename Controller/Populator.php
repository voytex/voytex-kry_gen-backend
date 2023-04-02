<?php
class Populator
{
    public function populateTask($task)
    {
        if ($task['code']) $code = $task['code'];
        switch ($code)
        {
            case 'dh':
                // $values = logic->getDHvalues()
                $task['description'] = preg_replace('/(\$)\d+/i', 'DH_VALUE',$task['description']);
            default:
                $task['description'] = preg_replace('/(\$)\d+/i', 'DEFAULT',$task['description']);
            break;
        }
        return $task;
    }
}