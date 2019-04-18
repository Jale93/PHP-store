<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 



$param = new Siteparameter();

if(isset($_POST['create'])) {


if($param) {


$param->name = $_POST['name'];
$param->text_en =$_POST['text_en'];
$param->text_az =$_POST['text_az'];
$param->text_ru =$_POST['text_ru'];

$session->message("The user parameter has been added");
$param->save();
redirect("siteparameters.php");


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
                            users
                            <small>Subheading</small>
                        </h1>

                    <form action="" method="post" >

                        <div class="col-md-6 col-md-offset-3">

                           <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" >
                               
                           </div>


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