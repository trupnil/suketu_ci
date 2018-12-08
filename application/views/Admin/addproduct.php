<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
 <?php $this->load->view('Admin/common/link'); ?>



</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php $this->load->view('Admin/common/header'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Category Add Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>Admin/Addpro">
                                       
  <div class="form-group">
                                            <label>Category  name</label>
                                            <select class="form-control" name="category_fk" id="cat">
                                               
                                                 <?php  foreach ($category as $key => $value) { ?>
                                                    <option value="<?php echo $value->cat_id; ?>"><?php echo $value->cat_name; ?></option>

                                                  <?php  }   ?>
                                            </select>
                                        </div>
                                          <div class="form-group">
                                            <label>sub Category  name</label>
                                            <select class="form-control" name="sub_category_fk" id="sub">
                                               
                                                 <?php  foreach ($subcat_name as $key => $value) { ?>
                                                 

                                                  <?php  }   ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Add Product Name</label>
                                            <input type="text" class="form-control" name="product_name">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Add Product Price</label>
                                            <input type="text" class="form-control" name="product_price">
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Add Product Details</label>
                                           <textarea name="product_details" cols="50" rows="10"></textarea>
                                           
                                        </div>
                                           <div class="form-group">
                                            <label>Add Product Image</label>
                                           <input type="file" name="image" class="form-control" name="sub_category">
                                           
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Submit Button</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
   <?php $this->load->view('Admin/common/script'); ?>

</body>

</html>

<script type="text/javascript">

$(document).ready(function(){


    $('#cat').change(function(){

      
       cat = $('#cat').val();
       // alert(cat);
       $.ajax({


            url: '<?php echo base_url() ?>Admin/getsub',
            method:"POST",
            data:{'category':cat},
            success:function($data)
            {
              //  alert($data);
              $('#sub').html($data);  

            }



       });


    });




});


</script>
