<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>ESMP | Track Progress</title>
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

<?php include '././../../layouts/body.php'; ?>
<?php
       include "././../../layouts/config2.php"; // Using database connection file here
       include '../lib2.php';

       $id = $_GET['id']; // get id through query string
      $query="select * from tblsafeguard_group_plans where planID='$id'";
       
       if ($result_set = $link_cs->query($query)) {
           while($row = $result_set->fetch_array(MYSQLI_ASSOC))
           { 
               
               $groupID= $row["groupID"];
               $districtID = $row["districtID"];
               $taID= $row["taID"];
              
               $busTypeID = $row["busTypeID"];
               
               $activityID = $row["activityID"];
               $indicator = $row["indicator"];
               $target = $row["target"];
               $startdate = $row["startdate"];
               $finishdate = $row["finishdate"];
               $budget = $row["budget"];

           }
           $result_set->close();
       }

       

    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">ESMP Progress Update</h4>
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
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form action ="basicCLSESMPPlansProgressUpdate.php" method="POST"> 
                                        <div class="row mb-1">
                                            <label for="plan_id" class="col-sm-2 col-form-label">Plan ID</label>
                                            <input type="text" class="form-control" id="plan_id" name = "plan_id" value="<?php echo $id ; ?>" style="max-width:30%;">

                                            <label for="group" class="col-sm-2 col-form-label">SLG</label>
                                            <input type="text" class="form-control" id="group" name="group" value ="<?php echo grp_name($link_cs,$groupID) ; ?>" style="max-width:30%;">
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link_cs,$districtID) ; ?>" style="max-width:30%;">

                                            <label for="ta" class="col-sm-2 col-form-label">Trad. Authority</label>
                                            <input type="text" class="form-control" id="ta" name ="ta" value = "<?php echo ta_name($link_cs,$taID); ?>" style="max-width:30%;">
                                        </div>

                                                                                                                        
                                        <div class="row mb-1">
                                            <label for="bustype" class="col-sm-2 col-form-label">Bus Type</label>
                                            <input type="text" class="form-control" id="bustype" name="bustype" value ="<?php echo iga_name($link_cs,$busTypeID); ?>" style="max-width:30%;">

                                            <label for="sactivity" class="col-sm-2 col-form-label">P Activity</label>
                                            <input type="text" class="form-control" id="sactivity" name="sactivity" value =" <?php echo activity_name($link_cs,$activityID) ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                                                               
                                        <div class="row mb-1">
                                            <label for="indicator" class="col-sm-2 col-form-label">Indicator</label>
                                            <input type="text" class="form-control" id="indicator" name="indicator" value =" <?php echo indicator_name($link_cs,$indicator) ; ?>" style="max-width:30%;">

                                            <label for="hstatus" class="col-sm-2 col-form-label">Target</label>
                                            <input type="text" class="form-control" id="hstatus" name="hstatus" value ="<?php echo $target;?>" style="max-width:30%;">
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="achieved" class="col-sm-2 col-form-label">Achieved</label>
                                            <input type="number" step ="any" class="form-control" id="achieved" name="achieved"  style="max-width:30%;">

                                            <label for="achieved_date" class="col-sm-2 col-form-label">Date</label>
                                            <input type="date" class="form-control" id="achieved_date" name="achieved_date"  style="max-width:30%;">
                                        </div>

                                                                               

                                        <div class="row justify-content-end">
                                            
                                            <div>
                                                
                                                <button type="submit" class="btn btn-primary w-md" name="Update" value="Update" >Update ESMP Record</button>
                                                <INPUT TYPE="button" class="btn btn-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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