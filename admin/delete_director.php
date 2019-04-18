<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


if(empty($_GET['id'])) {

redirect("directories.php");


}

$director = Directors::find_by_id($_GET['id']);

if($director) {

$session->message("The {$director->full_name}  has been deleted");

$director->delete_photo();
redirect("directories.php");


} else {



redirect("directories.php");


}










 ?>