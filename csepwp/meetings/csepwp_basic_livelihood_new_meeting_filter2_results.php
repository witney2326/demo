<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>Sensitization Meetings</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config2.php'; ?>
    <?php include '././../../lib.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include '././../../layouts/body.php'; ?>

<?php 
  
  if (($_SESSION["user_role"] == '04')) 
  {
      $region = $_SESSION["user_reg"];
      $district = $_SESSION["user_dis"];
  }
  else if ((isset($_POST['region'])) and (isset($_POST['district'])))
  {
      $region = $_POST['region'];
      $district = $_POST['district'];  
  }else
  {
    header("location: basic_livelihood_meetings.php");
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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP New Sensitization Meeting</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="csepwp_basic_livelihood_meetings.php">Sensitization Meetings</a></li>
                                    <li class="breadcrumb-item active">Sensitization Meetings</li>
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

                                
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="csepwp_basic_livelihood_meetings.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Meetings</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Meeting</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="javascript:void(0);" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Comm. Based DRA</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <!--start here -->
                                           
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    
                                                    
                                                        
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row-cols-lg-auto g-3 align-items-center" novalidate action="insertBasicAwarenessMeeting_csepwp.php" method="post">
                                                        
                                                        <div class="row mb-4">
                                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" name="region" id="region" required>
                                                                    <option selected value="<?php echo $region;?>"><?php echo get_rname($link_cs,$region);?></option>   
                                                                </select>
                                                            </div>

                                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" name="district" id="district" required >
                                                                    <option selected value="<?php echo $district; ?>" ><?php echo dis_name($link_cs,$district); ?></option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="row mb-4">
                                                            <label for="sectorID" class="col-sm-2 col-form-label">Sector</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" name="sectorID" id="sectorID" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                            $sector_fetch_query = "SELECT id, name FROM tblsector";                                                  
                                                                            $result_sector_fetch = mysqli_query($link_cs, $sector_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_sector = mysqli_fetch_array($result_sector_fetch)) {
                                                                            ?>
                                                                            <option value="<?php echo $DB_ROW_sector["id"]; ?>">
                                                                                <?php echo $DB_ROW_sector["name"]; ?></option><?php
                                                                                $i++;
                                                                                    }
                                                                        ?>
                                                                </select>
                                                            </div>

                                                            <label for="purpose" class="col-sm-2 col-form-label">Meeting Purpose</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" name="purpose" id="purpose" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                        $meetpurpose_fetch_query = "SELECT id, purpose FROM tblmeetingpurpose";                                                  
                                                                        $result_meetpurpose_fetch = mysqli_query($link_cs, $meetpurpose_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_meetpurpose = mysqli_fetch_array($result_meetpurpose_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_meetpurpose["id"]; ?>">
                                                                            <?php echo $DB_ROW_meetpurpose["purpose"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <label for="orientationDate" class="col-sm-2 col-form-label">Orientation Date</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" name="orientationDate" id="orientationDate" required>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <label for="NoOrientedF" class="col-sm-2 col-form-label">No. Females Oriented</label>
                                                            <div class="col-sm-3">
                                                                <input class="form-text" name="NoOrientedF" id="NoOrientedF" required>
                                                            </div>

                                                            <label for="NoOrientedM" class="col-sm-2 col-form-label">No. Males Oriented</label>
                                                            <div class="col-sm-3">
                                                                <input class="form-text" name="NoOrientedM" id="NoOrientedM" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-outline-primary w-md" name="submit" value="submit">Submit Meeting Details</button>
                                                                
                                                                <INPUT TYPE="button" class="btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                                
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>     

                                            </div>    
                                                </div>            
                                            </div>  
                                </div>
                                    <!-- Here -->
                                    
                                    <!-- end here -->
                                    
                                   
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