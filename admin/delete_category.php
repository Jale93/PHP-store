<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


if(empty($_GET['id'])) {

redirect("categories.php");


}

$cat = Categories::find_by_id($_GET['id']);

if($cat) {

$session->message("The category has been deleted");

$cat->delete();
redirect("categories.php");


}










 ?>