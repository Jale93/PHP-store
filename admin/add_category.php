<?php include("includes/header.php"); ?>

<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>

<?php
$cat = new Categories();

if (isset($_POST['create'])) {
    if ($cat) {
        $cat->text_en = $_POST['text_en'];
        $cat->text_az = $_POST['text_az'];
        $cat->text_ru = $_POST['text_ru'];
        $cat->add_datetime ='NOW()';
        $cat->is_visible = 1;

        $session->message("The user Category has been added");
        $cat->save();
        redirect("categories.php");
    }
}
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
                    Category
                    <small>Subheading</small>
                </h1>

                <form action="" method="post" >

                    <div class="col-md-6 col-md-offset-3">

                        <div class="form-group">
                            <label for="text_en">Text EN</label>
                            <input type="text" name="text_en" class="form-control" >

                        </div>

                        <div class="form-group">
                            <label for="text_az">Text AZ</label>
                            <input type="text" name="text_az" class="form-control" >

                        </div>


                        <div class="form-group">
                            <label for="text_ru">Text RU</label>
                            <input type="text" name="text_ru" class="form-control" >

                        </div>

                        <div class="form-group">

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