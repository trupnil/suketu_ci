<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
   <?php $this->load->view('Admin/common/link'); ?>

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
       <?php  $this->load->view('Admin/common/header'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
           
           
            
                      <div class="row">
                
                <div class="col-lg-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Context Classes
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product image</th>
                                             <th>Category Name</th>
                                            <th>sub Category Name</th>
                                             
                                              <th>product Name</th>
                                              <th>Product price</th>
                                              <th>Product details</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php  foreach ($product as $key => $value) { ?>

                                       <tr class="success">
                                            <td><?php
                                            echo $value->product_id; 
                                            ?></td>
                                              <td> <img src="<?php echo base_url() ?>product_image/<?php echo  $value->image; ?>" height="150px" width="150px"> </td>
                                               <td><?php echo $value->cat_name; ?></td>
                                            <td><?php echo $value->subcat_name; ?></td>
                                             <td><?php echo $value->product_name; ?></td>
                                              <td><?php echo $value->product_price; ?></td>
                                               <td><?php echo $value->product_details; ?></td>

                                         
                                          
                                       <?php  }   ?>
                                        
                                         
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
  <?php $this->load->view('Admin/common/script'); ?>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
