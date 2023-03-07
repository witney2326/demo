<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>CIMIS | Trainer of Trainer Training</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
  <!--jQuery library file -->
  <script type="text/javascript" 
      src="https://code.jquery.com/jquery-3.5.1.js">
  </script>

  <!--Datatable plugin JS library file -->
  <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
</head>

<?php include 'layouts/body.php'; ?>
<?php
       include "layouts/config.php"; // Using database connection file here
        
       $id = $_GET['id']; // get id through query string
      

       if(isset($_POST['Submit']))
           { 
           $trainingtype = $_POST['trainingtype'];
           $startdate = $_POST['startdate'];
           $finishdate = $_POST['finishdate'];
           $title = $_POST['title'];
           $trainedby = $_POST['trainedby'];
           $fname = $_POST['first_name'];
           $lname = $_POST['last_name']; 
           $gender = $_POST['gender'];
           $region = rcode($link,$id);
           
           
           $sql = "INSERT INTO tbltottraining (regionID,districtID,fname,lname,gender,title,TrainingTypeID,StartDate,FinishDate,trainedBy)
           VALUES ('$region ','$id','$fname','$lname','$gender','$title','$trainingtype','$startdate','$finishdate','$trainedby')";
           
           if (mysqli_query($link, $sql)) {
               echo '<script type="text/javascript">'; 
               echo 'alert("SLG Training Record has been added successfully !");'; 
               echo 'history.go(-1)';
               echo '</script>';
           } else {
               echo "Error: " . $sql . ":-" . mysqli_error($link);
           }
           mysqli_close($link);
           }
             
           function get_rname($link, $rcode)
           {
           $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
           while($rg = mysqli_fetch_array($rg_query)){
              return $rg['name'];
           };// fetch data
           
           }

           function rcode($link, $discode)
           {
           $rg_query = mysqli_query($link,"select regionID from tbldistrict where DistrictID='$discode'"); // select query
           while($rg = mysqli_fetch_array($rg_query)){
              return $rg['regionID'];
           };
           }
   
           function dis_name($link, $disID)
           {
           $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
           while($dis = mysqli_fetch_array($dis_query)){
              return $dis['DistrictName'];
           };
           }

           
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-9">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Trainer Of Trainer Update</h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">

                       
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link,rcode($link,$id)); ?>" style="max-width:30%;" >
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>                                          
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$id); ?>" style="max-width:30%;" >
                                        </div>

                                        <div class="row mb-1">
                                            <label for="first_name" class="col-sm-2 col-form-label">Trainer FName</label> 
                                            <input type="text" class="form-control" id="first_name" name ="first_name" value = "" style="max-width:30%;" >
                                            
                                            <label for="last_name" class="col-sm-2 col-form-label">Trainer LName</label>                                            
                                            <input type="text" class="form-control" id="last_name" name ="last_name" value = "" style="max-width:30%;"  >
                                        </div>
                                        <div class="row mb-1">
                                            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                <input type="radio" id="male" name="gender" value="M">
                                                <label for="male">Male</label><br>
                                                <input type="radio" id="female" name="gender" value="F">
                                                <label for="female">Female</label><br>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="trainingtype" class="col-sm-2 col-form-label">Training Type</label>
                                            <select class="form-select" name="trainingtype" id="trainingtype" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                   $tt_fetch_query = "SELECT trainingTypeID, training_name FROM tbltraining_types";                                                  
                                                   $result_tt_fetch = mysqli_query($link, $tt_fetch_query);                                                                       
                                                   $i=0;
                                                      while($DB_ROW_tt = mysqli_fetch_array($result_tt_fetch)) {
                                                   ?>
                                                   <option value ="<?php
                                                         echo $DB_ROW_tt["trainingTypeID"];?>">
                                                      <?php
                                                         echo $DB_ROW_tt["training_name"];
                                                      ?>
                                                   </option>
                                                   <?php
                                                      $i++;
                                                         }
                                                ?>
                                            </select>

                                            <label for="trainedby" class="col-sm-2 col-form-label">Facilitator</label>
                                            <select class="form-select" name="trainedby" id="trainedby" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                   $fc_fetch_query = "SELECT facilitatorID, title FROM tblfacilitator";                                                  
                                                   $result_fc_fetch = mysqli_query($link, $fc_fetch_query);                                                                       
                                                   $i=0;
                                                      while($DB_ROW_fc = mysqli_fetch_array($result_fc_fetch)) {
                                                   ?>
                                                   <option value ="<?php
                                                         echo $DB_ROW_fc["facilitatorID"];?>">
                                                      <?php
                                                         echo $DB_ROW_fc["title"];
                                                      ?>
                                                   </option>
                                                   <?php
                                                      $i++;
                                                         }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="title" class="col-sm-2 col-form-label">Trainer Title</label>
                                            <select class="form-select" name="title" id="title" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                   $an_fetch_query = "SELECT trainerID, title FROM tbltot";                                                  
                                                   $result_an_fetch = mysqli_query($link, $an_fetch_query);                                                                       
                                                   $i=0;
                                                      while($DB_ROW_an = mysqli_fetch_array($result_an_fetch)) {
                                                   ?>
                                                   <option value ="<?php echo $DB_ROW_an["trainerID"];?>">
                                                      <?php echo $DB_ROW_an["title"];?></option>
                                                   <?php
                                                      $i++;
                                                         }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="row mb-4">
                                            <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                            <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;">
                                          
                                            <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>                                          
                                            <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;">
                                        </div>
                                     
                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn btn-outline-primary w-md" name="Submit" value="Submit">Save TOT Record</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>