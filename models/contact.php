<?php

class Contact extends Db_object {

    protected static $db_table = "contact_messages";
    protected static $db_table_fields = array('id', 'person_name', 'person_email', 'phone_number', 'message_text', 'is_visible', 'i_add_datetime','response_datetime');
    public $id;
    public $person_name;
    public $person_email;
    public $phone_number;
    public $message_text;
    public $is_visible;
    public $i_add_datetime;
    public $response_datetime;

    public static function create_contact_message($person_name, $person_email, $phone_number, $message_text, $is_visible, $i_add_datetime,$response_datetime) {


        if (!empty($person_name) && !empty($person_email) && !empty($phone_number) && !empty($message)) {

            $param = new Contact();

            $param->person_name = $person_name;
            $param->person_email = $person_email;
            $param->phone_number = $phone_number;
            $param->message_text = $message_text;
            $param->i_add_datetime = $add_datetime;
            $param->is_visible = $is_visible;
            $param->response_datetime = $response_datetime;

            return $param;
        } else {


            return false;
        }
    }

    public static function find_the_contact_message($id = 0) {

        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE id = " . $database->escape_string($id);
        $sql .= " ORDER  BY id ASC";

        return self::find_by_query($sql);
    }

}

// End of Class User
?>




















