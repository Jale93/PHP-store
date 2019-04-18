
<?php include("includes/header.php"); ?>

<?php include("includes/photo_library_modal.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 



if(empty($_GET['id'])) {

redirect("siteparameters.php");

}

$param = Siteparameter::find_by_id($_GET['id']);


if(isset($_POST['update'])) {


if($param) {


$param->name = $_POST['name'];
$param->text_az =$_POST['text_az'];
$param->text_en =$_POST['text_en'];
$param->text_ru =$_POST['text_ru'];
$param->id =$_POST['id'];

$param->save();
redirect("siteparameters.php");
$session->message("The parameter has been updated");








}



}




// $users = user::find_all();

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
                            users
                            <small>Subheading</small>
                        </h1>


                    <form action="" method="post" >

  


                        <div class="col-md-6">

                           <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $param->name; ?>" >
                               
                           </div>


                            <div class="form-group">
                                <label for="text_en">Text EN</label>
                            <input type="text" name="text_en" class="form-control" value="<?php echo $param->text_en; ?>"  >
                               
                           </div>
                           <div class="form-group">
                                <label for="text_az">Text AZ</label>
                            <input type="text" name="text_az" class="form-control" value="<?php echo $param->text_az; ?>"  >
                               
                           </div>

                            <div class="form-group">
                                <label for="text_ru">Text RU</label>
                            <input type="text" name="text_ru" class="form-control" value="<?php echo $param->text_ru; ?>"  >
                            <input type="hidden" name="id" class="form-control" value="<?php echo $_GET['id'] ?>"  >
                               
                           </div>


                            <div class="form-group">

                            <a id="user-id" class="btn btn-danger" href="delete_siteparameters.php?id=<?php echo $param->id; ?>">Delete</a>

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