<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Management</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // In your Javascript
        $(document).ready(function() {
            $('.js-single').select2();
        });
    </script>
</head>

<?php include 'layouts/body.php'; ?>

<?php 
    // var_dump($_POST);
    // die();

    if(isset($_POST['region4']) && isset($_POST['district4']) && isset($_POST["ta4"])){
        $_SESSION["region4-5"] = $_POST['region4'];
        $_SESSION["district4-5"] = $_POST['district4'];
        $_SESSION["ta4-5"] = $_POST['ta4'];

    } else if(isset($_POST['region5']) && isset($_POST['district5']) && isset($_POST["ta5"])){
        $_SESSION["region4-5"] = $_POST['region5'];
        $_SESSION["district4-5"] = $_POST['district5'];
        $_SESSION["ta4-5"] = $_POST['ta5'];

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
                            <h4 class="mb-sm-0 font-size-18">New Savings and Loan Group!</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_slg_mgt_check.php">SLG Management</a></li>
                                    <li class="breadcrumb-item active">New SLG</li>
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
                                        <a class="nav-link" data-bs-toggle="link" href="basic_livelihood_slg_mgt_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">SL Groups</span>
                                        </a>
                                    </li>
                                    
                                    <?php
                                        if (($_SESSION["user_role"]== '05')){ ?>
                                          <li class="nav-item waves-effect waves-light">
                                            <a class="link"  href="basic_livelihood_cls_mgt_filter_cw_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                           </a>
                                         </li>
                                    <?php } else if(($_SESSION["user_role"]== '04')){ ?>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="link"  href="basic_livelihood_cls_mgt_district_cood_filter_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                           </a>
                                         </li>
                                    <?php } else if(($_SESSION["user_role"]== '03')){ ?>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="link"  href="basic_livelihood_cls_mgt_region_cood_filter_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                           </a>
                                         </li>
                                    <?php }
                                     else { ?>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="link"  href="basic_livelihood_clusters_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                           </a>
                                         </li>
                                    <?php } ?>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="basic_livelihood_slg_mgt_new_cls_filter1_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Cluster!</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="basic_livelihood_slg_mgt2.php" role="tab">
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
                                                    
                                                    
                                                    <form action="insertSLG.php" method="POST">
                                                        <!-- start here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="region" class="form-label">Region</label>
                                                                    <select class="form-select" name="region" id="region" required>
                                                                        <option selected value="<?php echo $_SESSION["region4-5"];?>"><?php echo get_rname($link,$_SESSION["region4-5"]);?></option>                               
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Malawi region.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <select class="form-select" name="district" id="district"  required>
                                                                        <option  value= <?php echo $_SESSION["district4-5"]; ?> ><?php echo dis_name($link,$_SESSION["district4-5"]); ?></option>
                                                                            
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="ta" class="form-label">TA</label>
                                                                    <select class="form-select" name="ta" id="ta" required>
                                                                        <option  value= <?php echo $_SESSION["ta4-5"]; ?> ><?php echo tname($link,$_SESSION["ta4-5"]); ?></option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid TA.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="gvh" class="form-label">GVH</label>
                                                                    <input type="text" name="GVHID" placeholder="Enter GVH" class="form-control" required>              
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Group Village Head.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-3">
                                                                    <label for="village" class="form-label">Village</label>
                                                                    <input type="text" name="village" placeholder="Enter Village" class="form-control" required>                                                  
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Village in Malawi.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- End here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupID" class="form-label">Group ID</label>
                                                                        <input type="text" name="groupID" class="form-control" disabled ="True">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupname" class="form-label">Group Name</label>
                                                                        <input type="text" name="groupname" placeholder="Enter Group Name" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>Date Established</label>
                                                                        <input type="date" name="DateEstablished" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="cluster" class="form-label">Cluster Name</label>
                                                                    <select class="form-select" name="clusterID"  id="clusterID" required>
                                                                        <?php   
                                                                                $taID = $_SESSION["ta4-5"];                                                        
                                                                                $cls_fetch_query = "SELECT ClusterID,ClusterName FROM tblcluster where taID=$taID";                                                  
                                                                                $result_cls_fetch = mysqli_query($link, $cls_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_cls = mysqli_fetch_array($result_cls_fetch)) {
                                                                                ?>
                                                                                <option value="<?php echo $DB_ROW_cls["ClusterID"]; ?>">
                                                                                    <?php echo $DB_ROW_cls["ClusterName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid cluster.
                                                                    </div>                                                                                                         
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="spp" class="form-label">SP Program</label>
                                                                    <select class="form-select" name="spp" id="spp" required>
                                                                        <?php                                                           
                                                                                $spp_fetch_query = "SELECT pID,pName FROM tblprogram";                                                  
                                                                                $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                                                ?>
                                                                                <option value="<?php echo $DB_ROW_spp["pID"]; ?>">
                                                                                    <?php echo $DB_ROW_spp["pName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Program.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>No Males</label>
                                                                        <input type="text" name="membersM" placeholder="0" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                    <label>No Females</label>
                                                                        <input type="text" name="membersF" placeholder="0"class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="Cohort" class="form-label">Cohort</label>
                                                                    <select class="form-select" name="Cohort" id="Cohort" required>
                                                                        <option value ="1">1</option>
                                                                        <option value ="2">2</option>
                                                                        <option value ="3">3</option>
                                                                        <option value ="4">4</option>                                                                    
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Cohort.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="cw" class="form-label">Case Worker</label>
                                                                    <select class="form-select" name="cw" id="cw" required>
                                                                        <?php   
                                                                                $districtID = $_SESSION["district4-5"];                                                        
                                                                                $cw_fetch_query = "SELECT cwID,cwName FROM tblcw where districtID = $districtID";                                                  
                                                                                $result_cw_fetch = mysqli_query($link, $cw_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_cw = mysqli_fetch_array($result_cw_fetch)) {
                                                                                ?>
                                                                                <option value="<?php echo $DB_ROW_cw["cwID"]; ?>">
                                                                                    <?php echo $DB_ROW_cw["cwName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Case Worker.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit New SLG">
                                                    </form>
                                                </div>
                                                    <!-- here  -->
                                                    
                                                </div>            
                                            </div>  
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


                

                    

               


                <!-- Collapse -->
                

                
                <!-- end row -->

                
                <!-- end row -->

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