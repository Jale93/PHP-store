<?php 
class pageController extends Controller{
	public function __construct(){
		Controller::__construct();
	}
	public function existsMethod($str){
		if (method_exists($this,$str)) {
			return true;
		}
		else{
			return false;
		}
	}
	public function mainpage($str=false){
            Controller::$view->view('mainpage','id');
	}
        public function products($str=false){
		Controller::$view->view('products','id');
	}
        public function about($str=false){
		Controller::$view->view('about');
	}
	public function contact($str=false){
		Controller::$view->view('contact');
	}
	public function order($str=false){
		Controller::$view->view('order');
	}
	public function ajax($str=false){
		Controller::$view->view('ajax');
	}	
	
}


?>