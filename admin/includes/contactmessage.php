<?php

class ContactMessage extends Db_object {

    protected static $db_table = "contact_messages";
    protected static $db_table_fields = array('id', 'person_name','person_email','phone_number', 'message','i_add_datetime', 'i_response_datetime', 'is_visible');
    public $id;
    public $person_name;
    public $person_email;
    public $phone_number;
    public $message;
    public $i_add_datetime;
    public $i_response_datetime;
    public $is_visible;

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




















