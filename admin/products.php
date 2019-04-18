<?php include("includes/header.php"); ?>

<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>

<?php
$cls=new Products();
$products = Products::find_all();
//echo '<pre>';
//var_dump($products);
//echo '</pre>';
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
                    <small></small>
                </h1>

                <p class="bg-success"> <?php echo $message; ?></p>

                <a href="add_product.php" class="btn btn-primary">Add Product</a>

                <div class="col-md-12">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Product AZ</th>
                                <th>Product EN</th>
                                <th>Product RU</th>
                                <th>Description AZ</th>
                                <th>Description EN</th>
                                <th>Description RU</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Add DateTime</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php for ($i = 0; $i < count($products); $i++) { ?>

                                <tr>
                                    
                                    <td><?= $products[$i]->id; ?> </td>
                                    <td><?= $products[$i]->title_az; ?></td>
                                    <td><?= $products[$i]->title_en; ?></td>
                                    <td><?= $products[$i]->title_ru; ?></td>
                                    <td><?= Products::getShortText($products[$i]->description_az); ?></td>
                                    <td><?= Products::getShortText($products[$i]->description_en); ?></td>
                                    <td><?= Products::getShortText($products[$i]->description_ru); ?></td>
                                    <td><?= $products[$i]->text_az; ?></td>
                                    <td><img class="admin-photo-thumbnail" src="<?php echo $products[$i]->image_path_and_placeholder(); ?>" alt="">

                                        <div class="action_links">

                                            <a class="delete_link" href="delete_product.php?id=<?php echo $products[$i]->id; ?>">Delete</a>
                                            <a href="edit_product.php?id=<?php echo $products[$i]->id; ?>">Edit</a>
                                            <a href="../product.php?id=<?php echo $products[$i]->id; ?>">View</a>

                                        </div>
                                    </td>
                                    <td><?=$products[$i]->i_add_datetime; ?></td>
                                    <td><?=$products[$i]->is_visible; ?></td>
<!--                                    <td>

                                        <a href="comment_photo.php?id=<?php // echo $products[$i]['id'];; ?>">

                                            <?php
//                                            $comments = Comment::find_the_comments($products[$i]['id']);
//
//
//                                            echo count($comments);
                                            ?>

                                        </a>



                                    </td>-->

                                </tr>


                            <?php } ?>




                        </tbody>
                    </table> <!--End of Table-->


                </div>











            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>