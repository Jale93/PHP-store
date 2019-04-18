<?php include("includes/header.php"); ?>

<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>

<?php
$product = new Products();

if (isset($_POST['create'])) {
    if ($product) {

        Utils::debug($_POST);
        Utils::debug($product);
        $product->title_az = $_POST['title_az'];
        $product->title_en = $_POST['title_en'];
        $product->title_ru = $_POST['title_ru'];
        $product->description_az = $_POST['description_az'];
        $product->description_en = $_POST['description_en'];
        $product->description_ru = $_POST['description_ru'];
        $product->category_id = $_POST['category_id'];
        $product->add_datetime = 'NOW()';
        $product->is_visible = 1;


        $product->set_file($_FILES['imagename']);
        $product->upload_photo();
        $session->message("The user {$product->id} has been added");
        $product->save();
//        redirect("products.php");
    }


// if($product) {
// $product->title = $_POST['title'];
// $product->caption = $_POST['caption'];
// $product->alternate_text = $_POST['alternate_text'];
// $product->description = $_POST['description'];
// $product->save();
// }
}





// $products = user::find_all();
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->



    <?php include("includes/top_nav.php") ?>





    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->



    <?php include("includes/side_nav.php"); ?>




    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">


    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Products
                    <small>Subheading</small>
                </h1>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-8 col-md-offset-2">
                        <input type="hidden" name="add_datetime" class="form-control" >
                        <input type="hidden" name="is_visible" class="form-control" >

                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                                        <thead>
                                            <tr >
                                                <th class="text-center">
                                                    Size
                                                </th>   
                                                <th class="text-center">
                                                    Code
                                                </th>   
                                                <th class="text-center">
                                                    Price
                                                </th>   
                                                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id='addr0' data-id="0" class="hidden">
                                                <td data-name="size">
                                                    <input type="text" name='size0'  placeholder='Size' class="form-control"/>
                                                </td>
                                                <td data-name="code">
                                                    <input type="text" name='code0'  placeholder='Code' class="form-control"/>
                                                </td>
                                                <td data-name="price">
                                                    <input type="text" name='price0'  placeholder='Price' class="form-control"/>
                                                </td>
                                                <td data-name="del">
                                                    <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a id="add_row" class="btn btn-default pull-right">Add Row</a>
                        </div>
                        <div class="form-group" style="margin: 75px 0px;">

                            <input type="submit" name="create" class="btn btn-primary pull-right" >

                        </div>




                    </div>





                </form>











            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>