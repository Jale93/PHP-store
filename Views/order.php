<?php 
$ROOT = './';
include("includes/header.php");
$param = new Order();
if(isset($_POST['submit_btn'])) {


if($param) {

$param->product_size_code_id = isset($_POST['product_size_id'])?$_POST['product_size_id']:'NULL';
$param->product_id = $_POST['product_id'];
$param->i_order_add_datetime ='NOW()';
$param->phone_number =$_POST['telephone'];
$param->i_order_execute_datetime ='NULL';
$param->status = '1';
$param->person_fullname =$_POST['name'];
$param->email =$_POST['email'];
$param->phone =$_POST['telephone'];


//$session->message("The user parameter has been added");
if($param->save()){
    echo '<script>var myAlert = new cAlert("Message has been sent successfully!", "success",10);myAlert.alert();</script>';
}else{
    echo '<script>var myAlert = new cAlert("Error was occured!", "error",10);myAlert.alert();</script>';
}

//redirect("contact.php");


}
}
?>
<style>
    .mb{
        margin-bottom:15px;
    }
</style>

<div class="banner banner10">
		<div class="container">
			<h2>Online Order</h2>
		</div>
	</div>
	<!-- //banner -->    
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="mainpage"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Online Order</li>
			</ul>
		</div>
	</div>
        	<div class="agile_mail_grids">
				
				<div class="col-md-4 col-md-offset-4 contact-left">
					<h4>Order Form</h4>
					<form action="order" method="post">
                                            <div class="form-group"><input type="text" name="name" placeholder="Your Name" required="" class="form-control"></div>
                                            <div class="form-group"><input type="email" name="email" placeholder="Your Email" required="" class="form-control"></div>
                                            <div class="form-group"><input type="text" name="telephone" placeholder="Telephone No" required="" class="form-control mb"></div>
                                            <div class="form-group">
                                                <select class="form-control" id="category">
                                                    <option disabled="disabled" selected="selected">Select Category</option>
                                                    <?php $category = new Categories(); $cats = $category->find_all() ; $text_lang = "text_".$global_lang_cookie;
                                                    foreach($cats as $cat):?>
                                                    <option value="<?=$cat->id?>"><?=$cat->$text_lang?></option>
                                                    <?php endforeach; ?>
                                                    
                                                </select> 
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <select class="form-control" id="product" name="product_id">
                                                    <option class="pr_first_opt" disabled="disabled" selected="selected">Select Product</option>
                                                </select> 
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <select class="form-control" id="product_size" name="product_size_id">
                                                    <option class="sz_first_opt" disabled="disabled" selected="selected">Select Size</option>
                                                </select> 
                                            </div>
                                                <input type="submit" value="Submit" name="submit_btn" >
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
        <script>
            $('#category').on("change",function(){
                $('#product_size option:not(.sz_first_opt)').remove();
                $('#product option:not(.pr_first_opt)').remove();
                $('#product_size').parent().css({'display':'none'});
                $('#product').parent().css({'display':'none'});
                $('#product option.pr_first_opt').attr('selected',true);
                jQuery.ajax({
                    url: "ajax/getProductByCategory",
                    type: "post",
                    data: {cat_id: $(this).val()},
                    dataType: "json"
                }).done(function( res ) {
                    if(res!=null && res.length > 0){
                        str = "";
                        $('#product').parent().css({'display':'block'});
                        for(var r in res){
                            str +="<option value='"+res[r]['id']+"'>"+res[r]['title_<?=$global_lang_cookie?>']+"</option>";
                        }
                        $(".pr_first_opt").after(str);
                    }
                });
            });
            $('#product').on("change",function(){
                $('#product_size option:not(.sz_first_opt)').remove();
                $('#product_size option.sz_first_opt').attr('selected',true);   
                $('#product_size').parent().css({'display':'none'});
                jQuery.ajax({
                    url: "ajax/getSizeByProduct",
                    type: "post",
                    data: {pr_id: $(this).val()},
                    dataType: "json"
                    }).done(function( res1 ){
                        if(res1!=null && res1.length > 0){
                            str = "";
                            $('#product_size').parent().css({'display':'block'});
                            for(var r in res1){
                                str +="<option value='"+res1[r]['id']+"'>"+res1[r]['size']+"</option>";
                            }
                             $(".sz_first_opt").after(str);
                        }
                });
            });
        </script>
	<?php include("includes/footer.php"); ?>
