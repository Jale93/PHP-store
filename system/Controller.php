<?php 
class Controller{
	public static $view;
	public static $connection;
	public function __construct(){
		self::$view = new Viewer();
		self::$connection= new Model();
	}
}


?>