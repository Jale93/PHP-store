<?php 

require "system/functions.php";
require "system/Model.php";
require "system/Viewer.php";
require "system/Controller.php";
require "admin/includes/database.php";
require "system/utils.php";
require "admin/includes/db_object.php";
require "admin/includes/session.php";
require "admin/includes/categories.php";
require "admin/includes/directors.php";
require "models/contact.php";
require "models/order.php";


$m = new Model();
$f = new Functions();
    //Disable error reporting
    error_reporting(0);
    //Report all errors
    error_reporting(E_ERROR);
    //error_reporting(E_ALL& ~E_NOTICE);
Functions::$url = "url";
Functions::$id = "id";


$f->start();

?>