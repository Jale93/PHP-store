<?php

class Order extends Db_object {

    protected static $db_table = "orders";
    protected static $db_table_fields = array('id', 'product_size_code_id','product_id', 'i_order_add_datetime','i_order_execute_datetime', 'status', 'person_fullname', 'email', 'phone');
    public $id;
    public $product_size_code_id;
    public $product_id;
    public $i_order_add_datetime;
    public $i_order_execute_datetime;
    public $status;
    public $person_fullname;
    public $email;
    public $phone;

    public static function create_order($product_size_code_id,$product_id, $i_order_add_datetime, $i_order_execute_datetime, $status, $person_fullname, $email,$phone) {


        if (!empty($product_id) && !empty($person_fullname) && !empty($email) && !empty($phone)) {

            $param = new Order();

            $param->product_size_code_id = $product_size_code_id;
            $param->i_order_add_datetime = $i_order_add_datetime;
            $param->i_order_execute_datetime = $i_order_execute_datetime;
            $param->status = $status;
            $param->person_fullname = $person_fullname;
            $param->email = $email;
            $param->phone = $phone;
            $param->product_id = $product_id;

            return $param;
        } else {
            return false;
        }
    }

    public static function find_the_order_message($id = 0) {

        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE id = " . $database->escape_string($id);
        $sql .= " ORDER  BY id ASC";

        return self::find_by_query($sql);
    }

}

// End of Class User
?>




















