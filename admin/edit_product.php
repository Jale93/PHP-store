
<?php include("includes/header.php"); ?>

<?php include("includes/photo_library_modal.php"); ?>

<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>

<?php
if (empty($_GET['id'])) {

    redirect("products.php");
}
$cls=new Products();
$product = Products::find_by_id($_GET['id']);
if (isset($_POST['update'])) {


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
        if (empty($_FILES['imagename'])) {

            $product->save();
            redirect("products.php");
            $session->message("The product has been updated");
        } else {
            
            $product->set_file($_FILES['imagename']);
            $product->upload_photo();
            $product->save();
            $session->message("The product has been updated");
            
            redirect("products.php");
        }
    }
}




// $products = product::find_all();
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
                <div class="col-md-6 user_image_box">
                    <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="<?= (empty($product->imagename))? $cls->image_placeholder : $cls->upload_directory . DS . $product->imagename ?>" alt=""></a>
                </div>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="title_az">Title AZ</label>
                            <input type="text" name="title_az" class="form-control" value="<?= $product->title_az; ?>" >

                        </div>
                        <div class="form-group">
                            <label for="title_en">Title EN</label>
                            <input type="text" name="title_en" class="form-control" value="<?= $product->title_en; ?>" >

                        </div>
                        <div class="form-group">
                            <label for="title_ru">Title RU</label>
                            <input type="text" name="title_ru" class="form-control" value="<?= $product->title_ru; ?>">

                        </div>
                        <div class="form-group">
                            <label for="caption">Description AZ</label>
                            <textarea class="form-control" name="description_az" id="" cols="30" rows="10"><?= $product->description_az; ?></textarea>

                        </div>
                        <div class="form-group">
                            <label for="caption">Description EN</label>
                            <textarea class="form-control" name="description_en" id="" cols="30" rows="10" ><?= $product->description_en; ?></textarea>

                        </div>
                        <div class="form-group">
                            <label for="caption">Description RU</label>
                            <textarea class="form-control" name="description_ru" id="" cols="30" rows="10" ><?= $product->description_ru; ?></textarea>

                        </div>

                        <?php $cats = Categories::find_all(); ?>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id">
                                <option value=""></option>
                                <?php foreach ($cats as $cat): ?>
                                    <option value="<?= $cat->id; ?> " <?php if($cat->id==$product->category_id) echo 'selected'; ?>><?php echo $cat->text_en; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>


                        <div class="form-group">

                            <input class="form-control" type="file" name="imagename">

                        </div>
                        <div class="form-group">

                            <a id="user-id" class="btn btn-danger" href="delete_product.php?id=<?php echo $product->id; ?>">Delete</a>

                            <input type="submit" name="update" class="btn btn-primary pull-right" value="Update" >
                               
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