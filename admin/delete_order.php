<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


if(empty($_GET['id'])) {

redirect("orders.php");


}

$param = Order::find_by_id($_GET['id']);

if($param) {

$session->message("The parameter has been deleted");

$param->delete();
redirect("orders.php");


}










 ?>