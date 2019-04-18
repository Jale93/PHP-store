<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

$params = ContactMessage::find_all();

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
                           All Messages
                         
                        </h1>

                         <p class="bg-success"> <?php echo $message; ?></p>

                        <div class="col-md-12">

                            <table class="table table-hover" id="tbl_main" border="1">
                                <thead>
                                    <tr>
                                        <th>Person Fullname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Send Date</th>
                                       
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th>Person Fullname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Send Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($params as $param): ?>

                                    <tr>

                                        <td><?php echo $param->person_name; ?> </td>
                                        <td><?php echo $param->person_email; ?></td>
                                        <td><?php echo $param->phone_number; ?></td>
                                        <td><?php echo $param->message; ?></td>
                                        <td><?php echo $param->i_add_datetime; ?></td>
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