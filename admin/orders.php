<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

$params = Order::find_all();

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
                           All Orders
                         
                        </h1>

                         <p class="bg-success"> <?php echo $message; ?></p>

                        <div class="col-md-12">

                            <table class="table table-hover" id="tbl_main" border="1">
                                <thead>
                                    <tr>
                                        <th>Person Fullname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Order Date</th>
                                        <th>Excute Date</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                        <th>Change Status</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th>Person Fullname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Order Date</th>
                                        <th>Excute Date</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($params as $param): ?>

                                    <tr>

                                        <td><?php echo $param->person_fullname; ?> </td>
                                        
                                        <td><?php echo $param->email; ?></td>
                                        
                                        
                                        <td><?php echo $param->phone; ?></td>
                                        <td><?php echo $param->i_order_add_datetime; ?></td>
                                        <td><?php echo $param->i_order_execute_datetime; ?></td>
                                        <td><?php if($param->status == '1'){echo'Created';}else if($param->status == '2'){echo 'Shipped'; } ?></td>
                                        <td><a href="delete_order.php?id=<?php echo $param->id; ?>">Delete</a></td>
                                        <td>
                                            <select id="change_status" class="change_status">
                                                <option value="1" <?php if($param->status == '1')echo 'selected';?> >Created</option>
                                                <option value="2" <?php if($param->status == '2')echo 'selected';?>>Shipped</option>
                                            </select>
                                            <input type="hidden" name="id" value="<?=$param->id?>" class="id"/>
                                        </td>
                                        
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
 <script>
    $('.change_status').change(function(){
       jQuery.ajax({
                    url: "ajax.php",
                    type: "post",
                    data: {url:'changeOrderStatus',order_id: $(this).siblings().val(),status:$(this).val()},
                    dataType: "json",
                    success:function(res){
                       console.log(res['result']);
                    },
                    complete:function(){
                        location.reload();
                    }
                })
    });
</script>