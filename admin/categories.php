<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

$cats = Categories::find_all();

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
                           All Parameters
                         
                        </h1>

                         <p class="bg-success"> <?php echo $message; ?></p>
                         <div class="col-md-12" style="margin-bottom: 10px;">
                          <a href="add_category.php" class="btn btn-primary">Add Category</a>
                         </div>
                        <div class="col-md-12">

                            <table class="table table-hover" id="tbl_main" border="1">
                                <thead>
                                    <tr>
                                        <th>Text_EN</th>
                                        <th>Text_AZ</th>
                                        <th>Text_RU</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                 <thead>
                                    <tr>
                                        <th>Text_EN</th>
                                        <th>Text_AZ</th>
                                        <th>Text_RU</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($cats as $cat): ?>

                                    <tr>
                                        <td><?php echo $cat->text_en; ?></td>
                                        <td><?php echo $cat->text_az; ?></td>
                                        <td><?php echo $cat->text_ru; ?></td>
                                        <td><a href="delete_category.php?id=<?php echo $cat->id; ?>">Delete</a></td>
                                        <td><a href="edit_category.php?id=<?php echo $cat->id; ?>">Edit</a></td>
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