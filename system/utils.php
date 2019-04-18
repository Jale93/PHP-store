<?php
class Utils {
    public static $db;
    public static function getDbObject(){
        self::$db = new Db_object();
        return self::$db;
    }
    public static function debug($arr){
        echo '<div style="position:relative;float:left;z-index:999999"><pre style="text-align:left;">';
        print_r($arr);
        echo '</pre></div>';
    }
    public static function getWord($element_id,$current_lang){
        $db = new Db_object();$word = '';
        $sql = "SELECT text_".$current_lang." from site_parameters where name='".$element_id."'";
        $word = $db->find_by_query_without_cls($sql)[0]['text_'.$current_lang];
        return $word;
    }
}

