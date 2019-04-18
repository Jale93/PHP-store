<?php 
require_once("includes/database.php");
if(isset($_POST['url'])){
    if($_POST['url'] == 'changeOrderStatus'){
        if($_POST['status'] == '1')$execute = 'NULL';
        else if($_POST['status'] == '2')$execute = 'NOW()';
        $sql = "update orders set status= ".$_POST['status'].',i_order_execute_datetime = '.$execute.' where id = '.$_POST['order_id'];
        $isUpdated = $database->query($sql);
        if($isUpdated)echo json_encode (array('result'=>'succes'));
        else echo json_encode (array('result'=>'error'));
    }
}



 ?>