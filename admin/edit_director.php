
<?php include("includes/header.php"); ?>

<?php include("includes/photo_library_modal.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 



if(empty($_GET['id'])) {

redirect("directories.php");

}

$director = Directors::find_by_id($_GET['id']);


if(isset($_POST['update'])) {


if($director) {


$director->full_name = $_POST['fullname'];
$director->position =$_POST['position'];
$director->section =$_POST['section'];
$director->phone_number =$_POST['phone_number'];

if(empty($_FILES['user_image'])) {

$director->save();
redirect("directories.php");
$session->message("The director has been updated");

} else {

$director->set_file($_FILES['user_image']);
$director->upload_photo();
$director->save();
$session->message("The director has been updated");

// redirect("edit_user.php?id={$user->id}");
redirect("directories.php");



}







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
                            Directors
                            <small>Subheading</small>
                        </h1>

                      <div class="col-md-6 user_image_box">
                          
                         <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="<?php echo $director->image_path_and_placeholder(); ?>" alt=""></a>



                      </div>


                    <form action="" method="post" enctype="multipart/form-data">

  


                        <div class="col-md-6">

                           <div class="form-group">
                           
                            <input type="file" name="user_image">
                               
                           </div>


                           <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $director->full_name; ?>" >
                               
                           </div>


                            <div class="form-group">
                                <label for="position">Position</label>
                            <input type="text" name="position" class="form-control" value="<?php echo $director->position; ?>"  >
                               
                           </div>

                            <div class="form-group">
                                <label for="section">Section</label>
                            <input type="text" name="section" class="form-control" value="<?php echo $director->section; ?>"  >
                               
                           </div>


                            <div class="form-group">
                                <label for="phone_number">Password</label>
                            <input type="text" name="phone_number" class="form-control" value="<?php echo $director->phone_number; ?>" >
                               
                           </div>

                            <div class="form-group">

                            <a id="user-id" class="btn btn-danger" href="delete_director.php?id=<?php echo $director->id; ?>">Delete</a>

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