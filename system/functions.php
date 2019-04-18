<?php 
	class Functions{
		public static $url;
		public static $id;
		public function __construct(){

		}
		public function start(){
			if (isset($_GET[self::$url])) {
				$cont = $_GET[self::$url];
				$expCont = explode("/",$cont);
				if ($this->existsController($expCont[0])) {
					$expCont[0].='Controller';
					$pageController = new $expCont[0]();
					if ($pageController->existsMethod($expCont[1])) {
                                            $method = $expCont[1];
						if (isset($expCont[2])) {
							$pageController->$method($expCont[2]);
						}
						else{
							$pageController->$method();
						}
					}
					else{
						echo "This page is not exists";
					}
					
				}
				else{
					require 'Controllers/pageController.php';
					$pageController = new pageController();
					if ($pageController->existsMethod($expCont[0])) {
                                                $method = $expCont[0];
						if (isset($expCont[1])) {
							$pageController->$method($expCont[1]);
						}
						else{
                                                    
							$pageController->$method();
						}
                                        }else{
                                            echo "<script>location.replace('mainpage')</script>";
                                        }

				}
			}
			else{
                            echo "<script>location.replace('mainpage')</script>";
			}
		}
		public function existsController($contName){
			$contName = 'Controllers/'.$contName.'Controller.php';
			if (file_exists($contName)) {
				include $contName;
				return true;
			}
			else{
				return false;
			}
		}


	}

 ?>
