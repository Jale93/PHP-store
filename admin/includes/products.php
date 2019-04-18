<?php

class Products extends Db_object {

    protected static $db_table = "products";
    protected static $db_table_fields = array('title_az', 'title_en', 'title_ru', 'description_az', 'description_en', 'description_ru', 'category_id', 'imagename', 'is_visible', 'i_add_datetime');
    public $id;
    public $title_az;
    public $title_en;
    public $title_ru;
    public $description_az;
    public $description_en;
    public $description_ru;
    public $category_id;
    public $imagename;
    public $i_add_datetime;
    public $is_visible;
    public $upload_directory = "images/products";
    public $image_placeholder = "http://placehold.it/800x400&text=image";
    
    public $cat_id;
    public $text_az;
    public $text_en;
    public $text_ru;
    public $size;
    public $code;
    public $price;
    public $product_id;
    
    protected static $db_table2 = "categories";
    protected static $db_table3 = "products_size_codes";

    
    public function set_file($file) {

        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {

            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {


            $this->imagename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public static function find_all() {

        return static::find_by_query_without_cls("SELECT A.*,C.id as cat_id,C.text_az,C.text_en,C.text_ru,P.size,P.code,P.price,P.product_id FROM " . static::$db_table . " A left join " . static::$db_table2 . " C on A.category_id=C.id "
                . " left join " . static::$db_table3 . " P on P.product_id=A.id  ",true);
    }
    public static function find_by_id($id) {
        global $database;
        $the_result_array = static::find_by_query_without_cls("SELECT A.*,C.id as cat_id,C.text_az,C.text_en,C.text_ru,P.size,P.code,P.price,P.product_id FROM " . static::$db_table . " A left join " . static::$db_table2 . " C on A.category_id=C.id "
                . " left join " . static::$db_table3 . " P on P.product_id=A.id   WHERE A.id = $id LIMIT 1",true);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public function upload_photo() {



        if (!empty($this->errors)) {

            return false;
        }

        if (empty($this->imagename) || empty($this->tmp_path)) {
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->imagename;
        if (file_exists($target_path)) {
            $this->errors[] = "The file {$this->imagename} already exists";
            return false;
        }

        if (move_uploaded_file($this->tmp_path, $target_path)) {
            unset($this->tmp_path);
            return true;
        } else {

            $this->errors[] = "the file directory probably does not have permission";
            return false;
        }
    }
    public static function getShortText($str, $length=100,$add_to_end='...'){
        
        if (strlen($str) <= $length) return $str;
        $a=strpos($str.' ', ' ', $length);
        return substr($str, 0, $a).$add_to_end;        
    }

    public function image_path_and_placeholder() {

        return empty($this->imagename) ? $this->image_placeholder : $this->upload_directory.DS.$this->imagename;

    }

    public function ajax_save_product_image($imagename, $product_id) {


        global $database;

        $imagename = $database->escape_string($imagename);
        $product_id = $database->escape_string($product_id);

        $this->imagename = $imagename;
        $this->id = $product_id;

        $sql = "UPDATE " . self::$db_table . " SET imagename = '{$this->imagename}' ";
        $sql .= " WHERE id = {$this->id} ";
        $update_image = $database->query($sql);


        echo $this->image_path_and_placeholder();
    }

    public function delete_photo() {


        if ($this->delete()) {

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->imagename;

            return unlink($target_path) ? true : false;
        } else {

            return false;
        }
    }

}

// End of Class User
?>


















