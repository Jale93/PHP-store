<?php 
class Viewer{
	public function __construct(){
        }
	public function view($str,$var=false){
		$fileEx = 'Views/'.$str.".php";
		if (file_exists($fileEx)) {
			require $fileEx;
		}
	}
	public function main($str,$var=false){
            include $str.".php/".$var;
	}
}
?>