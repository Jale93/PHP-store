<?php 
class Model{
	public static $conn;
	private $host = "localhost";
	private $user = "root";
	private $db = "gallery";
	private $pass = "";
	public function __construct(){
		self::$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		return self::$conn;
	}
}

?>