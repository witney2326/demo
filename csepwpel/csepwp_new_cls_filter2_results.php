<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG Management</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config2.php'; ?>
    <?php include 'lib2.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include '../layouts/body.php'; ?>

<?php 
    
    if (($_SESSION["user_role"]== '05')) 
    {
        $region = $_SESSION["user_reg"];
        $district = $_SESSION["user_dis"];
        $ta = $_SESSION["user_ta"];   
    }
 else
    {
    $region = $_POST['region'];
    $district = $_POST['district'];
      
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
                            <h4 class="mb-sm-0 font-size-18">Add New Cluster</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_slg_mgt2.php">SLG Management</a></li>
                                    <li class="breadcrumb-item active">New Cluster</li>
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
                                        <a class="nav-link" data-bs-toggle="link" href="csepwp_basic_livelihood_slg_mgt2.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">SL Groups</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="csepwp_basic_livelihood_clusters.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Cluster!</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#slg-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">New SLG!</span>
                                        </a>
                                    </li>
                                    
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <!--start here -->
                                            <p align="right">
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </p>
                                            
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <!-- here -->
                                                    <div class="card-body">
                                                    
                                                    <form action="insertCluster_csepwp.php" method="post">
                                                        <!-- start here -->
                                                        <div class="row mb-2">
                                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                                            <select class="form-select" name="region" id="region" style="max-width:30%;" required>
                                                                <option selected value="<?php echo $region;?>"><?php echo get_rname($link_cs,$region);?></option>
                                                            </select>

                                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                                            <select class="form-select" name="district" id="district" style="max-width:30%;" required>
                                                                <option  value= <?php echo $district; ?> ><?php echo dis_name($link_cs,$district); ?></option>
                                                            </select>   
                                                        </div>

                                                        <div class="row mb-2">
                                                            <label for="ta" class="col-sm-2 col-form-label">TA</label>
                                                            <select class="form-select" name="ta" id="ta" style="max-width:30%;" required>
                                                                <option></option>
                                                                <?php                                                           
                                                                        $ta_fetch_query = "SELECT TAID,TAName FROM tblta where DistrictID = $district";                                                  
                                                                        $result_ta_fetch = mysqli_query($link_cs, $ta_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                        ?>
                                                                        <option value ="<?php echo $DB_ROW_ta["TAID"]; ?>">
                                                                            <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                            </select>

                                                            <label for="GVHID" class="col-sm-2 col-form-label">GVH</label>
                                                            <input type="text" name="GVHID" id="GVHID" class="form-control" style="max-width:30%;" required>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <label for="cw" class="col-sm-2 col-form-label">Case Worker</label>
                                                            <select class="form-select" name="cw" id="cw" style="max-width:30%;" required>
                                                                <option></option>
                                                                    <?php                                                           
                                                                            $cw_fetch_query = "SELECT cwID,cwName FROM tblcw where districtID = $district";                                                  
                                                                            $result_cw_fetch = mysqli_query($link_cs, $cw_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_cw = mysqli_fetch_array($result_cw_fetch)) {
                                                                            ?>
                                                                            <option value="<?php echo $DB_ROW_cw["cwID"]; ?>">
                                                                                <?php echo $DB_ROW_cw["cwName"]; ?></option><?php
                                                                                $i++;
                                                                                    }
                                                                        ?>
                                                            </select>

                                                            <label for="clusterID" class="col-sm-2 col-form-label">Cluster ID</label>
                                                            <input type="text" name="clusterID" id="clusterID" class="form-control" disabled ="True" style="max-width:30%;" required>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <label for="clustername" class="col-sm-2 col-form-label">Cluster Name</label>
                                                            <input type="text" name="clustername" id="clustername" class="form-control"  style="max-width:30%;" required>
                                                        </div>

                            
                                                        <!-- End here -->
                                                        
                                                        
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Add New Cluster">
                                                    </form>
                                                </div>
                                                    <!-- here  -->
                                                    
                                                </div>            
                                            </div>  
                                        </p>
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