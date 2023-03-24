
<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>
<head>
    <title>SLG Graduation Assesment</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config2.php'; ?>
<!-- DataTables -->
    <link href="././../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="././../../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="././../../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    
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

    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
        var agree=confirm("Are you sure you want to RATE this SLG?");
        if (agree)
        return true ;
        else
        return false ;
        }   
    </script>
</head>

<?php include '././../../layouts/body.php';
include '././../../lib.php'; 
?>

<?php		
    
    $user = $_SESSION["user_role"];
    if ($user == '05')
    {
        $region = $_SESSION["user_reg"];$district = $_SESSION["user_dis"];$ta = $_SESSION["user_ta"]; 
    } 
    if ($user == '04')
    {
        $region = $_SESSION["user_reg"];$district = $_SESSION["user_dis"];
    } 
    if ($user == '03')
    {
        $region = $_SESSION["user_reg"];
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
                            <h4 class="mb-sm-0 font-size-18">SLG Graduation Assesment</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation.php">Graduation</a></li>
                                    <li class="breadcrumb-item active">SLG Graduation Assesment</li>
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
                                        <a class="nav-link active " data-bs-toggle="link" href="#home"role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light"> 
                                        <a class="nav-link " data-bs-toggle="link" href="<?php if($_SESSION["user_role"]== '05'){echo"javascript:void(0)";}else{echo "../meetings/grad_planning_meeting_meetings.php";}?>" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Planning Meeting</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="graduation_group_assesment_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">SLG Assesment & Verification</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="graduation_cluster_assesment_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Cluster Assesment & Verification</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="graduation_beneficiary_assesment.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Beneficiary Assesment & Verification</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="graduation_selected_beneficiary.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Selected Beneficiaries</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link " data-bs-toggle="link" href="graduation_cluster_cf_identification_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">CF Identification</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link " data-bs-toggle="link" href="graduation_refresher_training_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Refresher and AT Training</span>
                                        </a>
                                    </li>
                                                                   
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">

                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="row">
                    
                                                <div class="card-header bg-transparent border-primary">
                                                    <div class="card-group">
                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            <?php
                                                                            if ($user == "05")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Area: Assessed SLGs</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(groupID) AS value_groups FROM tblgroup where ((grad_status = '1') and (TAID = '$ta'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum_groups = $row['value_groups'];

                                                                                $result2 = mysqli_query($link_cs, "SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where ((grad_status = '1') and (taID = '$ta'))"); 
                                                                                $row2 = mysqli_fetch_assoc($result2); 
                                                                                $sum_clusters = $row2['value_clusters'];
                                                                            } else if ($user == "04")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">District: Assessed SLGs</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(groupID) AS value_groups FROM tblgroup where ((grad_status = '1') and (DistrictID = '$district'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum_groups = $row['value_groups'];

                                                                                $result2 = mysqli_query($link_cs, "SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where ((grad_status = '1') and (districtID = '$district'))"); 
                                                                                $row2 = mysqli_fetch_assoc($result2); 
                                                                                $sum_clusters = $row2['value_clusters'];
                                                                            } else if ($user == "03")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Region: Assessed SLGs</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(groupID) AS value_groups FROM tblgroup where ((grad_status = '1') and (regionID = '$region'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum_groups = $row['value_groups'];

                                                                                $result2 = mysqli_query($link_cs, "SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where ((grad_status = '1') and (regionID = '$region'))"); 
                                                                                $row2 = mysqli_fetch_assoc($result2); 
                                                                                $sum_clusters = $row2['value_clusters'];
                                                                            } else
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Assessed SLGs</p>';
                                                                                $result = mysqli_query($link_cs, 'SELECT COUNT(groupID) AS value_groups FROM tblgroup where grad_status = 1'); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum_groups = $row['value_groups'];

                                                                                $result2 = mysqli_query($link_cs, 'SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where grad_status = 1'); 
                                                                                $row2 = mysqli_fetch_assoc($result2); 
                                                                                $sum_clusters = $row2['value_clusters'];
                                                                            }
                                                                            ?>
                                                                                
                                                                            <div class="container">
                                                                                <div class="mb-0"><?php echo "" . $sum_groups + $sum_clusters;?></div>
                                                                            </div> 
                                                                                
                                                                        </div>
                                                                        <i class='fas fa-users' style='font-size:24px;color:brown'></i><i class='fas fa-users' style='font-size:24px;color:black'></i>
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                            <!-- -->
                                                            </div>
                                                        </div>
                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            
                                                                            <?php
                                                                            if ($user == "05")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Area: Assessed HHs</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries 
                                                                                inner join tblgroup on tblbeneficiaries.groupID = tblgroup.groupID where ((tblbeneficiaries.grad_status ='1') and (tblgroup.TAID = '$ta'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['value_sum'];
                                                                            } else if ($user = "04")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">District: Assessed HHs</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where ((grad_status ='1') and (districtID = '$district'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['value_sum'];
                                                                            } else if ($user = "03")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Region: Assessed HHs</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where ((grad_status ='1') and (regionID ='$region'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['value_sum'];
                                                                            }else
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Assessed HHs</p>';
                                                                                $result = mysqli_query($link_cs, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where grad_status ="1"'); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['value_sum'];
                                                                            }
                                                                            ?>
                                                                                <div class="container">
                                                                                    <div class="mb-0"><?php echo "" . number_format($sum);?></div>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                        <i class='fas fa-house-user' style='font-size:24px;color:brown'></i><i class='fas fa-house-user' style='font-size:24px;color:burlywood'></i>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            
                                                                            <?php
                                                                            if ($user == "05")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Area: CFs Identified</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(tblcfs.cfID) AS cfs FROM tblcfs inner join tblcluster on 
                                                                                tblcfs.clusterID = tblcluster.clusterID where tblcluster.taID = '$ta'"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['cfs'];
                                                                            } else if ($user = "04")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">District: CFs Identified</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(cfID) AS cfs FROM tblcfs inner join tblcluster on 
                                                                                tblcfs.clusterID = tblcluster.clusterID where tblcluster.districtID = '$district'"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['cfs'];
                                                                            } else if ($user = "03")
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Region: CFs Identified</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(cfID) AS cfs FROM tblcfs inner join tblcluster on 
                                                                                tblcfs.clusterID = tblcluster.clusterID where tblcluster.regionID = '$region'"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['cfs'];
                                                                            }else
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">CFs Identified</p>';
                                                                                $result = mysqli_query($link_cs, 'SELECT COUNT(cfID) AS cfs FROM tblcfs'); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $sum = $row['cfs'];
                                                                            }
                                                                                
                                                                            ?>
                                                                                <div class="container">
                                                                                    <div class="mb-0"><?php echo "" . number_format($sum);?></div>
                                                                                </div>
                                                                        </div>
                                                                        <i class='fas fa-users' style='font-size:24px;color:brown'></i>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            <?php
                                                                            if (($user == "05") or ($user == "04"))
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">District: Asset Transfer Sensitization Meetings</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(meetingID) AS meets FROM tblawareness_meetings where ((meetingpurpose = '04') and (DistrictID = '$district'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $meets = $row['meets'];
                                                                            } else if (($user == "05") or ($user == "03"))
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Region: Asset Transfer Sensitization Meetings</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(meetingID) AS meets FROM tblawareness_meetings where ((meetingpurpose = '04') and (regionID = '$region'))"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $meets = $row['meets'];
                                                                            } else
                                                                            {
                                                                                echo '<p class="text-muted fw-medium">Asset Transfer Sensitization Meetings</p>';
                                                                                $result = mysqli_query($link_cs, "SELECT COUNT(meetingID) AS meets FROM tblawareness_meetings where meetingpurpose = '04'"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $meets = $row['meets'];
                                                                            }
                                                                            ?>
                                                                            <div class="container">
                                                                                    <div class="mb-0"><?php echo "" . number_format($meets);?></div>
                                                                            </div>
                                                                        </div>
                                                                        <i class='fas fa-users' style='font-size:24px;color:chocolate'></i><i class='fas fa-users' style='font-size:24px;color:coral'></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </p>
                                    </div>
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
<script src="././../../assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="././../../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="././../../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="././../../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="././../../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="././../../assets/libs/jszip/jszip.min.js"></script>
<script src="././../../assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="././../../assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="././../../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="././../../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="././../../assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="././../../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="././../../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="././../../assets/js/pages/datatables.init.js"></script>

</body>

</html>