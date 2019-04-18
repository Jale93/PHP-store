<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 



$director = new Directors();

if(isset($_POST['create'])) {


if($director) {


$director->full_name = $_POST['fullname'];
$director->position =$_POST['position'];
$director->section =$_POST['section'];
$director->phone_number =$_POST['phone_number'];
$director->i_add_datetime ='NOW()';

print_r($_FILES['user_image']);
$director->set_file($_FILES['user_image']);
$director->upload_photo();
$session->message("The user {$director->full_name} has been added");
$director->save();
//redirect("directories.php");


}


// if($user) {

// $user->title = $_POST['title'];
// $user->caption = $_POST['caption'];
// $user->alternate_text = $_POST['alternate_text'];
// $user->description = $_POST['description'];

// $user->save();

// }



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

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-6 col-md-offset-3">

                           <div class="form-group">
                           
                            <input type="file" name="user_image">
                               
                           </div>


                           <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" name="fullname" class="form-control" >
                               
                           </div>


                            <div class="form-group">
                                <label for="position">Position</label>
                            <input type="text" name="position" class="form-control" >
                               
                           </div>

                            <div class="form-group">
                                <label for="section">Section</label>
                            <input type="text" name="section" class="form-control" >
                               
                           </div>


                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" >
                               
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