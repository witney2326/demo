<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG |Group Savings</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

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

<?php include '../layouts/body.php'; ?>
<?php
       include "../layouts/config.php"; // Using database connection file here
        
       $id = $_GET['id']; // get id through query string
      $query="select * from tblgroup where groupID='$id'";
       
       if ($result_set = $link->query($query)) {
           while($row = $result_set->fetch_array(MYSQLI_ASSOC))
           { 
               $groupname= $row["groupname"];
               $regionID = $row["regionID"];
               $DistrictID= $row["DistrictID"];
               $TAID= $row["TAID"];
               $gvhID= $row["gvhID"];
               $cohort = $row["cohort"];
           }
           $result_set->close();
       }

       if(isset($_POST['Submit']))
           {    
           $groupID = $_POST['group_id'];
           $DistrictID = $_POST['district'];
           $year = $_POST['year'];
           $month = $_POST['month'];
           $amount = $_POST['amount'];
           
           
               $sql = "INSERT INTO tblgroupsavings (GroupID,DistrictID,Yr,Month,Amount)
               VALUES ('$groupID','$DistrictID','$year','$month','$amount')";
           if (mysqli_query($link, $sql)) {
               echo '<script type="text/javascript">'; 
               echo 'alert("SLG Savings Record has been added successfully !");'; 
               //echo 'window.location.href = "csepwp_basic_livelihood_slg_mgt2.php";';
               echo 'history.go(-2);';
               echo '</script>';
           } else {
               echo "Error: " . $sql . ":-" . mysqli_error($link);
           }
           mysqli_close($link);
           }
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '../layouts/vertical-menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP SLG Savings</h4>
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

                        <?php include '../layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">Update Savings Record for SLG: <?php echo $groupname;?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        <div class="row mb-1">
                                            <label for="group_id" class="col-sm-2 col-form-label">Group ID</label>                           
                                            <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="group_name" class="col-sm-2 col-form-label">Group Name</label>
                                            <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                                                                
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label> 
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo $DistrictID ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="ta" class="col-sm-2 col-form-label">TA</label>
                                            <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo $TAID ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="gvh" class="col-sm-2 col-form-label">GVH</label>
                                            <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        
                                        <div class="row mb-1">
                                            <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                            <input type="text" class="form-control" id="cohort" name="cohort" value ="<?php echo $cohort ; ?> " style="max-width:30%;" readonly >
                                            
                                        </div>

                                        <div class="row mb-1">
                                            <label for="year" class="col-sm-2 col-form-label">Select Year</label>
                                            <select class="form-select" name="year" id="year" style="max-width:30%;" required>
                                                <option></option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>

                                            <label for="month" class="col-sm-2 col-form-label">Select Month</label>
                                            <select class="form-select" name="month" id="month" style="max-width:30%;" required>
                                                <option></option>
                                                <option value='01'>January</option>
                                                <option value='02'>February</option>
                                                <option value='03'>March</option>
                                                <option value='04'>April</option>
                                                <option value='05'>May</option>
                                                <option value='06'>June</option>
                                                <option value='07'>July</option>
                                                <option value='08'>August</option>
                                                <option value='09'>September</option>
                                                <option value='10'>October</option>
                                                <option value='11'>November</option>
                                                <option value='12'>December</option>
                                            </select>
                                        </div>

                                        

                                        <div class="row mb-3">
                                            <label for="amount" class="col-sm-2 col-form-label">Amount Saved</label>                              
                                            <input type="text" class="form-control" id="amount" name="amount" value ="" style="max-width:30%;">
                                            
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
        <?php include '../layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include '../layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include '../layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>