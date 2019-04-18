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
        $product->title_az = $_POST['title_az'];
        $product->title_en = $_POST['title_en'];
        $product->title_ru = $_POST['title_ru'];
        $product->description_az = $_POST['description_az'];
        $product->description_en = $_POST['description_en'];
        $product->description_ru = $_POST['description_ru'];
        $product->category_id = $_POST['category_id'];
        $product->i_add_datetime = 'NOW()';
        $product->is_visible = 1;


        $product->set_file($_FILES['imagename']);
        $product->upload_photo();
        $session->message("The Product {$product->id} has been added");
        $product->save();
        redirect("products.php");
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
                        <div class="form-group">
                            <label for="title_az">Title AZ</label>
                            <input type="text" name="title_az" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label for="title_en">Title EN</label>
                            <input type="text" name="title_en" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label for="title_ru">Title RU</label>
                            <input type="text" name="title_ru" class="form-control" >

                        </div>
                        <div class="form-group">
                            <label for="caption">Description AZ</label>
                            <textarea class="form-control" name="description_az" id="" cols="30" rows="10"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="caption">Description EN</label>
                            <textarea class="form-control" name="description_en" id="" cols="30" rows="10"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="caption">Description RU</label>
                            <textarea class="form-control" name="description_ru" id="" cols="30" rows="10"></textarea>

                        </div>

                        <?php $cats = Categories::find_all(); ?>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id">
                                <option value=""></option>
                                <?php foreach ($cats as $cat): ?>
                                    <option value="<?= $cat->id; ?>"><?php echo $cat->text_en; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <input type="hidden" name="i_add_datetime" class="form-control" >
                        <input type="hidden" name="is_visible" class="form-control" >
                        <div class="form-group">

                            <input class="form-control" type="file" name="imagename">

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