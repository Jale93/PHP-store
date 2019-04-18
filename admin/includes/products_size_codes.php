<?php 



class ProductSizeCodes extends Db_object {

	protected static $db_table = "products_size_codes";
	protected static $db_table_fields = array('id','size','code','price','product_id','is_visible','add_datetime');
	public $id;
	public $size;
	public $code;
	public $price;
	public $product_id;
	public $is_visible;
	public $add_datetime;



	public static function create_category($size,$code,$price,$product_id,$is_visible=1,$add_datetime = 'NOW()') {


		if( !empty($size) && !empty($code)&& !empty($price) && !empty($product_id)) {

			$pr_size_code = new ProductSizeCodes();
			$pr_size_code->size = $size;
			$pr_size_code->code = $code;
			$pr_size_code->price = $price;
			$pr_size_code->product_id = $product_id;
			$pr_size_code->add_datetime = $add_datetime;
			$pr_size_code->is_visible = $is_visible;
			

			return $pr_size_code;


		} else {


			return false;
		}


	}



	public static function find_the_categories($id=0) {

		global $database;

		$sql  = "SELECT * FROM " . self::$db_table;
		$sql .= " WHERE id = " . $database->escape_string($id);
		$sql .= " ORDER  BY id ASC";

		return self::find_by_query($sql);

	} 




} // End of Class User














 ?>


















