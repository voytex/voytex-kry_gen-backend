<?php
class TaskController extends BaseControler
{
    public function getAllTasks()
    {
        $strErrorDesc = "";
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if (strtoupper($requestMethod) != "GET")
        {
            $strErrorDesc = "Not supported request method";
            $strErrorHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        try
        {
            $taskModel = new TaskModel();
            $arrTasks = $taskModel->getAllTasks(10);
            $responseData = json_encode($arrTasks);
        }
        catch (Error $e)
        {
            $strErrorDesc = $e->getMessage().' Something went wrong, sowwy:((';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            throw new Error("Something went wrong.");
        }

        if (!$strErrorDesc)
        {
            $this->sendOutput(
                $responseData,
                array("Content-Type: application/json", "HTTP/1.1 200 OK")
            );
        }
        else
        {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array("Content-Type: application/json", $strErrorHeader)
            );
        }
    }

    public function getTask()
    {
        $strErrorDesc = "";
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();   

        if (strtoupper($requestMethod) != "GET")
        {
            $strErrorDesc = "Not supported request method";
            $strErrorHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        try
        {
            $taskModel = new TaskModel();
            $populator = new Populator();
            $code = "DH";
            if (isset($arrQueryStringParams['code']) && $arrQueryStringParams['code'])
            {
                $code = $arrQueryStringParams['code'];
            }

            $task = $taskModel->getTask($code);
            $task = $populator->populateTask($task[0]);
            $responseData = json_encode($task);
        }
        catch (Exception $e)
        {
            $strErrorDesc = $e->getMessage() . "Something in getTask() method went wrong.";
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            throw new Error("Something went wrong in getTask() method.");
        }

        if (!$strErrorDesc)
        {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
        else 
        {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json'.$strErrorHeader)
            );
        }

    }

    public function getRandomTask()
    {
        $strErrorDesc = "";
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();   

        if (strtoupper($requestMethod) != "GET")
        {
            $strErrorDesc = "Not supported request method";
            $strErrorHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        try
        {
            $taskModel = new TaskModel();
            $populator = new Populator();
            // if (isset($arrQueryStringParams['code']) && $arrQueryStringParams['code'])
            // {
            //     $code = $arrQueryStringParams['code'];
            // }

            $task = $taskModel->getRandomTask();
            $task = $populator->populateTask($task[0]);
            $responseData = json_encode($task);
        }
        catch (Exception $e)
        {
            $strErrorDesc = $e->getMessage() . "Something in getTask() method went wrong.";
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            throw new Error("Something went wrong in getTask() method.");
        }

        if (!$strErrorDesc)
        {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
        else 
        {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json'.$strErrorHeader)
            );
        }
    }


    // public function listAction()
    // {
    //     $strErrorDesc = '';
    //     $requestMethod = $_SERVER["REQUEST_METHOD"];
    //     $arrQueryStringParams = $this->getQueryStringParams();

    //     if (strtoupper($requestMethod) == 'GET')
    //     {
    //         try
    //         {
    //             $taskModel = new TaskModel();
    //             $intLimit = 10;
    //             if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit'])
    //             {
    //                 $intLimit = $arrQueryStringParams['limit'];
    //             }

    //             $arrUsers = $taskModel->getTasks($intLimit);
    //             $responseData = json_encode($arrUsers);
    //         }
    //         catch (Error $e)
    //         {
    //             $strErrorDesc = $e->getMessage().' Something went wrong, sowwy:((';
    //             $strEerrorHeader = 'HTTP/1.1 500 Internal Server Error';
    //             throw new Error("Something went wrong.");
    //         }
    //     } 
    //     else
    //     {
    //         $strErrorDesc = 'Method not supported';
    //         $strEerrorHeader = "HTTP/1.1 422 Unprocessable Entity";
    //     }

    //     // send output
    //     if (!$strErrorDesc)
    //     {
    //         $this->sendOutput(
    //             $responseData,
    //             array('Content-Type: application/json', 'HTTP/1.1 200 OK')
    //         );
    //     }
    //     else 
    //     {
    //         $this->sendOutput(
    //             json_encode(array('error' => $strErrorDesc)),
    //             array('Content-Type: application/json'.$strEerrorHeader)
    //         );
    //     }
    // }
}