<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">ACSA Demo Plot View</h4>

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
                                            <h5 class="my-0 text-default"> ACSA Demo Plot: <?php echo clsname($link,$id);?> Cluster</h5>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form>
                                                <div class="row mb-1">
                                                    <label for="clinic_id" class="col-sm-2 col-form-label">Cluster ID.</label>               
                                                    <input type="text" class="form-control" id="clinic_id" name = "clinic_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                                    
                                                    <label for="region" class="col-sm-2 col-form-label">Region</label>
                                                    <input type="text" class="form-control" id="region" name="region" value ="<?php if (isset($regionID)) {echo get_rname($link,$regionID);} else {echo "Region Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                </div>

                                                
                                                <div class="row mb-1">
                                                    <label for="district" class="col-sm-2 col-form-label">District</label>
                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php if (isset($districtID)) {echo dis_name($link,$districtID) ;} else {echo "District Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                    
                                                    <label for="ta" class="col-sm-2 col-form-label">TA</label>
                                                    <input type="text" class="form-control" id="ta" name="ta" value ="<?php if (isset($ta)) {echo ta_name($link,$ta);} else {echo "TA Not Set";}?>" style="max-width:30%;" disabled ="True">
                                                </div>

                                                                    
                                                <div class="row mb-1">
                                                    <label for="place" class="col-sm-2 col-form-label">Demo Plot </label>
                                                    <input type="text" class="form-control" id="plot" name="plot" value =" <?php if (isset($plot)) {echo $plot ;} else {echo "No Demo Plot";}?>" style="max-width:30%;" disabled ="True">
                                                    
                                                    <label for="acreage" class="col-sm-2 col-form-label">Acreage </label>
                                                    <input type="text" class="form-control" id="acreage" name="acreage" value =" <?php if (isset($acreage)) {echo $acreage ;} else {echo "Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                                </div>
                                                <div class="row mb-2">
                                                </div>
                                                
                                                <div class="row justify-content-end">
                                                    <div>
                                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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