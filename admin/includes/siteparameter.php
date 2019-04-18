<?php

class Siteparameter extends Db_object {

    protected static $db_table = "site_parameters";
    protected static $db_table_fields = array('id', 'name', 'text_az', 'text_en', 'text_ru', 'is_visible', 'add_datetime');
    public $id;
    public $name;
    public $text_az;
    public $text_en;
    public $text_ru;
    public $is_visible;
    public $add_datetime;

    public static function create_siteparameter($name, $text_az, $text_en, $text_ru, $is_visible, $add_datetime = 'NOW()') {


        if (!empty($name) && !empty($text_az) && !empty($text_en) && !empty($text_ru)) {

            $param = new Siteparameter();

            $param->name = $name;
            $param->text_az = $text_az;
            $param->text_az = $text_en;
            $param->text_az = $text_ru;
            $param->add_datetime = $add_datetime;
            $param->is_visible = $is_visible;


            return $param;
        } else {


            return false;
        }
    }

    public static function find_the_parameters($id = 0) {

        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE name = " . $database->escape_string($name);
        $sql .= " ORDER  BY id ASC";

        return self::find_by_query($sql);
    }

}

// End of Class User
?>


















