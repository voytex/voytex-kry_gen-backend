<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");

// include config file
require_once PROJECT_ROOT_PATH . "/inc/config.php";

// include base controller
require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";

require_once PROJECT_ROOT_PATH . "/Controller/Populator.php";
require_once PROJECT_ROOT_PATH . "/Controller/Generator.php";

// include Task model file
require_once PROJECT_ROOT_PATH . "/Model/TaskModel.php";


