<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>CIMIS | Trainer of Trainer Training</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>

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

<?php include '././../../layouts/body.php'; 
      include '../lib2.php';
?>
<?php
       include "././../../layouts/config2.php"; // Using database connection file here
        
       $id = $_GET['id']; // get id through query string
      $query="select * from tblcluster where ClusterID='$id'";
       
       if ($result_set = $link_cs->query($query)) {
           while($row = $result_set->fetch_array(MYSQLI_ASSOC))
           { 
               $ClusterName= $row["ClusterName"];
               $regionID = $row["regionID"];
               $DistrictID= $row["districtID"];
               $TAID= $row["taID"];
               $gvhID= $row["gvhID"];
           }
           $result_set->close();
       }

       if(isset($_POST['Submit']))
           {
             
           $clusterID = $_POST['cluster_id'];
           $DistrictID = $_POST['district'];
           $trainingtype = $_POST['trainingtype'];
           $startdate = $_POST['startdate'];
           $finishdate = $_POST['finishdate'];
           $animator = $_POST['animatortitle'];
           $trainedby = $_POST['trainedby'];

               $sql = "INSERT INTO tblanimatortrainings (regionID,districtID,clusterID,TrainingTypeID,StartDate,FinishDate,trainedBy,animatorType)
               VALUES ('$regionID ','$DistrictID','$id','$trainingtype','$startdate','$finishdate','$trainedby','$animator')";
           if (mysqli_query($link_cs, $sql)) {
               echo '<script type="text/javascript">'; 
               echo 'alert("Animator Training Record has been added successfully !");'; 
               echo 'history.go(-2);';
               echo '</script>';
           } else {
               echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
           }
           mysqli_close($link_cs);
           }
 
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '././../../layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Animator Training</h4>
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

                        <?php include '././../../layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h6 class="my-0 text-primary">Animator Training Update :<?php echo" ". $ClusterName; ?> Cluster;</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">

                                        <div class="row mb-1">
                                            <label for="cluster_id" class="col-sm-2 col-form-label">Cluster ID</label>
                                            <input type="text" class="form-control" id="cluster_id" name = "cluster_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="cluster_name" class="col-sm-2 col-form-label">Cluster Name</label>
                                            <input type="text" class="form-control" id="cluster_name" name ="cluster_name" value = "<?php echo $ClusterName ; ?>" style="max-width:30%;" readonly >  
                                        </div>
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo $DistrictID; ?>" style="max-width:30%;" readonly >  
                                        </div>
                                        
                                                                               
                                        <div class="row mb-2">
                                            <label for="trainingtype" class="col-sm-2 col-form-label">Training Type</label>
                                            <select class="form-select" name="trainingtype" id="trainingtype" style="max-width:30%;background:white" required>
                                                <option></option>
                                                <?php                                                           
                                                   $tt_fetch_query = "SELECT trainingTypeID, training_name FROM tbltraining_types";                                                  
                                                   $result_tt_fetch = mysqli_query($link_cs, $tt_fetch_query);                                                                       
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

                                            <label for="trainedby" class="col-sm-2 col-form-label">Facilitated By</label>
                                            <select class="form-select" name="trainedby" id="trainedby" style="max-width:30%;background:white" required>
                                                <option></option>
                                                <?php                                                           
                                                   $fc_fetch_query = "SELECT facilitatorID, title FROM tblfacilitator";                                                  
                                                   $result_fc_fetch = mysqli_query($link_cs, $fc_fetch_query);                                                                       
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
                                        <div class="row mb-2">
                                            <label for="animatortitle" class="col-sm-2 col-form-label">Animator Title</label>
                                            <select class="form-select" name="animatortitle" id="animatortitle" style="max-width:30%;background:white" required>
                                                <option></option>
                                                <?php                                                           
                                                   $an_fetch_query = "SELECT animatorID, title FROM tblanimator";                                                  
                                                   $result_an_fetch = mysqli_query($link_cs, $an_fetch_query);                                                                       
                                                   $i=0;
                                                      while($DB_ROW_an = mysqli_fetch_array($result_an_fetch)) {
                                                   ?>
                                                   <option value ="<?php echo $DB_ROW_an["animatorID"];?>">
                                                      <?php echo $DB_ROW_an["title"];?></option>
                                                   <?php
                                                      $i++;
                                                         }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="row mb-2">
                                            <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                            <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;background:white">
                                            
                                            <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>
                                            <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;background:white">
                                        </div>

                                        <div class="row justify-content-end">
                                            
                                                <div>
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Record</button>
                                                    
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
        <?php include '././../../layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include '././../../layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include '././../../layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>