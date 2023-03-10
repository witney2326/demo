<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>ACSA</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>
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

// do check
if (($_SESSION["user_role"]= '05')) {
    $region = $_SESSION["user_reg"];
    $ta = $_SESSION["user_ta"];
    $district = $_SESSION["user_dis"];
     
} else
{
    $region = $_POST['region'];
    $district = $_POST['district'];
    $ta = $_POST['ta'];
}
?>
<?php   

$id = $_GET['id']; // get id through query string
       $query="select * from tblacsademoplot where cluster='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
               
                $regionID = $row["region"];
                $districtID= $row["districtID"];
                $ta = $row["ta"];
                $PlaceNo = $row['id'];
                $plot = $row["plot"];
                $acreage = $row["acreage"];
                
            }
            $result_set->close();
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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">ACSA Demo Plot Edit</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_acsa_mgt.php">ACSA Management</a></li>
                                    <li class="breadcrumb-item active">ACSA Demo Plot</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- main content -->
                                
                                <div class="col-lg-9">
                                    <div class="card border border-success">
                                        <div class="card-header bg-transparent border-success">
                                            <h5 class="my-0 text-success">Demo Plot Record No. -- <?php if (isset($PlaceNo)) {echo $PlaceNo ;} else {echo "Not Set";} ?></h5>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form method="POST" action="ACSADemoPlotEditSav.php">
                                                
                                                
                                                <div class="row mb-1">
                                                    <label for="rec_no" class="col-sm-2 col-form-label">Record No.</label>
                                                    <input type="text" class="form-control" id="rec_no" name = "rec_no" value="<?php if (isset($PlaceNo)) echo $PlaceNo ; ?>" style="max-width:30%;" readonly>
                                                    
                                                    <label for="cluster_name" class="col-sm-2 col-form-label">Cluster Name</label>
                                                    <input type="text" class="form-control" id="cluster_name" name = "cluster_name" value="<?php echo cluster_name($link,$id) ; ?>" style="max-width:30%;" readonly >
                                                </div>


                                                <div class="row mb-1">
                                                    <label for="district" class="col-sm-2 col-form-label">District</label>
                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php if (isset($districtID)) {echo dis_name($link,$districtID) ;} ?>" style="max-width:30%;" readonly >
                                                    
                                                    <label for="ta" class="col-sm-2 col-form-label">Trad. Authority</label>
                                                    <input type="text" class="form-control" id="ta" name="ta" value ="<?php if (isset($ta)) {echo ta_name($link,$ta) ;} ?>" style="max-width:30%;" readonly >
                                                </div>
                                                
                                                                        
                                                <div class="row mb-1">
                                                    <label for="place" class="col-sm-2 col-form-label">Plot (Village)</label>
                                                    <input type="text" class="form-control" name="plot" id="plot" value="<?php if (isset($plot)) {echo $plot ;} else {echo "";} ?>" style="max-width:30%;" required>
                                                    
                                                    <label for="purpose" class="col-sm-2 col-form-label">Plot acreage</label>
                                                    <input type ="number" step = "any" name="acreage" id="acreage" value = "<?php if (isset($acreage)) {echo $acreage;}?>" style="max-width:30%;" required>
                                                </div>

                                                <div class="row mb-2">
                                            
                                                </div>

                                                
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-9">
                                                        <div>
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Update" id="Update" value="Update">Update Current Record</button>
                                                            
                                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>

                                <!-- main content -->
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
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

</body>

</html>