<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

$directories = Directors::find_all();
//echo '<pre>';
//var_dump($users);
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
                            Directors
                         
                        </h1>
                          <p class="bg-success">
                            <?php echo $message; ?>
                        </p>

                        <a href="add_director.php" class="btn btn-primary">Add Director</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Fullname</th>
                                        <th>Position</th>
                                        <th>Section</th>
                                        <th>Mobile Number</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($directories as $director): ?>

                                    <tr>

                                    	<td><?php echo $director->id; ?> </td>
                                        <td><img class="admin-user-thumbnail user_image" src="<?php echo $director->image_path_and_placeholder(); ?>" alt=""></td>
                                        
                                        <td><?php echo $director->full_name; ?></td>
                                        <td><?php echo $director->position; ?></td>
                                        <td><?php echo $director->section; ?></td>
                                        <td><?php echo $director->phone_number; ?></td>
                                        <td><a href="delete_director.php?id=<?php echo $director->id; ?>">Delete</a></td>
                                        <td><a href="edit_director.php?id=<?php echo $director->id; ?>">Edit</a></td>
                    
                                    </tr>


                                <?php endforeach; ?>


                                    
                                    
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