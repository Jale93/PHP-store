<?php

$user = new User();
$product = new Products();



if(isset($_POST['image_name'])) {


$user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);


}
if(isset($_POST['imagename'])) {


$product->ajax_save_product_image($_POST['imagename'], $_POST['product_id']);


}


if(isset($_POST['photo_id'])) {


Photo::display_sidebar_data($_POST['photo_id']);


}

if(isset($_POST['url'])){
    if($_POST['url'] == 'changeOrderStatus'){
        $sql = "update orders set status= ".$_POST['status'].' where order_id = '.$_POST['order_id'];
        echo $sql;
        $arr = Db_object::find_by_query_without_cls($sql);
        echo json_encode($arr);
    }
   
}



 ?>