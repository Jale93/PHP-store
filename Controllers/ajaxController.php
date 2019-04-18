<?php 
class ajaxController extends Controller{
    
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
        public function getProductByCategory(){
            $sql = "select * from products where category_id = ".$_POST['cat_id'];
            $arr = Db_object::find_by_query_without_cls($sql);
            echo json_encode($arr);
        }
        public function getSizeByProduct(){
            $sql = "select * from products_size_codes where product_id = ".$_POST['pr_id'];
            $arr = Db_object::find_by_query_without_cls($sql);
            echo json_encode($arr);
        }
        public function changeOrderStatus(){
            echo 'dadadadada';
            $sql = "update orders set status= ".$_POST['status'].' where order_id = '.$_POST['order_id'];
            $arr = Db_object::find_by_query_without_cls($sql);
            echo json_encode($arr);
        }
}

?>