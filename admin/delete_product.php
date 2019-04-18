<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


if(empty($_GET['id'])) {

redirect("products.php");


}

$product = Products::find_by_id($_GET['id']);

if($product) {

$session->message("The {$product->id} user has been deleted");

$product->delete_photo();
redirect("products.php");


} else {



redirect("products.php");


}










 ?>