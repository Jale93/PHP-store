<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 


if(empty($_GET['id'])) {

redirect("siteparameters.php");


}

$param = Siteparameter::find_by_id($_GET['id']);

if($param) {

$session->message("The parameter has been deleted");

$param->delete();
redirect("siteparameters.php");


}










 ?>