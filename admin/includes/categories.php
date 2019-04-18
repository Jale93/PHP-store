<?php 



class Categories extends Db_object {

	protected static $db_table = "categories";
	protected static $db_table_fields = array('id','text_az','text_en','text_ru','is_visible','add_datetime');
	public $id;
	public $text_az;
	public $text_en;
	public $text_ru;
	public $is_visible;
	public $add_datetime;



	public static function create_category($text_az,$text_en,$text_ru,$is_visible=1,$add_datetime = 'NOW()') {


		if( !empty($text_az) && !empty($text_en)&& !empty($text_ru)) {

			$cat = new Categories();
			$cat->text_az = $text_az;
			$cat->text_az = $text_en;
			$cat->text_az = $text_ru;
			$cat->add_datetime = $add_datetime;
			$cat->is_visible = $is_visible;
			

			return $cat;


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


















