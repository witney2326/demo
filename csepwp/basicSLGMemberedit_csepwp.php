<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Household Edit</title>
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
      include "layouts/config2.php"; // Using database connection file here
        
      $id = $_GET['id']; // get id through query string
     $query="select * from tblbeneficiaries where sppCode='$id'";
      
      if ($result_set = $link_cs->query($query)) {
          while($row = $result_set->fetch_array(MYSQLI_ASSOC))
          { 
              $hhname= $row["hh_head_name"];
              $sppname= $row["spProg"];
              $regionID = $row["regionID"];
              $districtID= $row["districtID"];
             
              $groupID = $row["groupID"];
              
              $cohort = $row["cohort"];
              $hhstatus = $row["hhstatus"];
              $natID = $row["nat_id"];
              
              if ($row["hhstatus"] == 1){$hhstatus = 'Approved';}
              if ($row["hhstatus"] == 0){$hhstatus = 'Not Approved';}
          }
          $result_set->close();
      }

    include 'lib2.php';

      
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
                            <h4 class="mb-sm-0 font-size-18">SLG Household Edit</h4>
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

                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success"> SLG Edit Household</h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action ="basicSLGMemberedit_saveNI.php" method="POST"> 
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label>                                      
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;">

                                            <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>                           
                                            <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;">                       
                                        </div>
                                                                                
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>                       
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link_cs,$regionID) ; ?>" style="max-width:30%;">
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link_cs,$districtID) ; ?>" style="max-width:30%;">
                                        </div>

                                                                             
                                        
                                        <div class="row mb-1">
                                            <label for="group" class="col-sm-2 col-form-label">SLG Name</label>               
                                            <input type="text" class="form-control" id="group" name="group" value ="<?php echo grp_name($link_cs,$groupID) ; ?>" style="max-width:30%;">
                                            
                                            <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                            <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="sppname" class="col-sm-2 col-form-label">SPP Name</label>                                  
                                            <input type="text" class="form-control" id="sppname" name="sppname" value =" <?php echo prog_name($link_cs,$sppname) ; ?>" style="max-width:30%;">
                                            
                                            <label for="hstatus" class="col-sm-2 col-form-label">HH Status</label>
                                            <input type="text" class="form-control" id="hstatus" name="hstatus" value ="<?php echo $hhstatus;?>" style="max-width:30%;">
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nat_ID" class="col-sm-2 col-form-label">National ID</label>                                  
                                            <input type="text" class="form-control" id="nat_ID" name="nat_ID" value =" <?php echo $natID; ?>" style="max-width:30%;">
                                            
                                            
                                        </div>
                                        
                                        <div class="row justify-content-end">
                                            <div>
                                                
                                                <button type="submit" class="btn btn-btn btn-outline-secondary w-md" name="Submit" value="Submit">Update National_ID or HH Name</button>
                                                
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