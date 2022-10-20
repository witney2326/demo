<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>


<head>
    <title>Joint Skill Groups</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
</head>

<?php 
    include '../layouts/body.php'; 
    
    $user = $_SESSION["user_role"];

    if ($user == '05')
    {
        $region = $_SESSION["user_reg"];
        $district = $_SESSION["user_dis"];
        $ta = $_SESSION["user_ta"]; 
    } 
    if ($user == '04')
    {
        $region = $_SESSION["user_reg"];
        $district = $_SESSION["user_dis"];
    } 
    if ($user == '03')
    {
        $region = $_SESSION["user_reg"];
    } 
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '../layouts/menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Joint Skill Groups</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="enhanced_livelihood.php">Enhanced Livelihood</a></li>
                                    <li class="breadcrumb-item active">JSGs</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Home </span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href = "jsg_formation_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">JSG Mapping & Formation</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="jsgs_bds_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Business Development Services</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="jsgs_business_plans_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Business Plans</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="jsg_training_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Training (Beneficiary & Stakeholder)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="jsgs_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Financial Linkage</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="enhancedReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Reports</span>
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
                                                                                    <i class='fas fa-house-user' style='font-size:24px;color:brown'></i>
                                                                                    <p class="text-muted fw-medium">Households in JSG</p>
                                                                                    <?php
                                                                                    if ($user == "05")
                                                                                    {
                                                                                        $result = mysqli_query($link, "SELECT sum(no_male) AS total_males FROM tbljsg inner join tblgroup on
                                                                                        tbljsg.groupID = tblgroup.groupID where tblgroup.TAID = '$ta'"); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $total_males = $row['total_males'];
                                                                                        
                                                                                        $result2 = mysqli_query($link, "SELECT sum(no_female) AS total_females FROM tbljsg inner join tblgroup on
                                                                                        tbljsg.groupID = tblgroup.groupID where tblgroup.TAID = '$ta'"); 
                                                                                        $row2 = mysqli_fetch_assoc($result2); 
                                                                                        $total_females = $row2['total_females'];

                                                                                        $sum = $total_males+$total_females;
                                                                                    } else
                                                                                    {
                                                                                        $result = mysqli_query($link, 'SELECT sum(no_male) AS total_males FROM tbljsg'); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $total_males = $row['total_males'];
                                                                                        
                                                                                        $result2 = mysqli_query($link, 'SELECT sum(no_female) AS total_females FROM tbljsg'); 
                                                                                        $row2 = mysqli_fetch_assoc($result2); 
                                                                                        $total_females = $row2['total_females'];

                                                                                        $sum = $total_males+$total_females;
                                                                                    }

                                                                                    ?>
                                                                                        <h5 class="mb-0">
                                                                                            <div class="container">
                                                                                                <div class="mb-0"><?php echo "" . $sum;?></div>
                                                                                            </div> 
                                                                                        </h5>
                                                                                </div>
                                                                                
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
                                                                            <i class='fas fa-users' style='font-size:24px;color:purple'></i>

                                                                            <p class="text-muted fw-medium">JSGs Formed</p>
                                                                            <?php
                                                                            if ($user == "05")
                                                                            {
                                                                                $result = mysqli_query($link, "SELECT COUNT(recID) AS total_jsgs FROM tbljsg inner join tblgroup on
                                                                                tbljsg.groupID = tblgroup.groupID where tblgroup.TAID = '$ta'"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $total_jsgs = $row['total_jsgs'];
                                                                            }else
                                                                            {
                                                                                $result = mysqli_query($link, 'SELECT COUNT(recID) AS total_jsgs FROM tbljsg'); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $total_jsgs = $row['total_jsgs'];
                                                                            }
                                                                            ?>
                                                                                        <div class="container">
                                                                                            <h4><div class="mb-0"><?php echo "" . $total_jsgs;?></div></h4>
                                                                                        </div>
                                                                            
                                                                        </div>
                                                                        
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
                                                                            
                                                                            <i class='fas fa-certificate' style='font-size:24px;color:red'></i>
                                                                            <p class="text-muted fw-medium">Available BDSs</p>
                                                                            <?php
                                                                                        $result = mysqli_query($link, 'SELECT COUNT(bdsID) AS total_bdss FROM tblbds'); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $total_bdss = $row['total_bdss'];
                                                                                    ?>
                                                                                        <div class="container">
                                                                                            <h4><div class="mb-0"><?php echo "" . $total_bdss;?></div></h4>
                                                                                        </div>
                                                                            
                                                                        </div>
                                                                        
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
                                                                            <i class='fas fa-user-graduate' style='font-size:24px;color:black'></i>

                                                                            <p class="text-muted fw-medium">JSG Trained</p>
                                                                            <h4 class="mb-0">0</h4>
                                                                        </div>
                                                                        
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
                                                                            <i class='fas fa-chalkboard-teacher' style='font-size:24px;color:chocolate'></i>

                                                                            <p class="text-muted fw-medium">JSG Linked</p>
                                                                            <h4 class="mb-0">0</h4>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div> 

                                        </p>
                                    </div>
                                    <div class="tab-pane" id="profile-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                        </p>
                                    </div>
                                    <div class="tab-pane" id="messages-1" role="tabpanel">
                                        <p class="mb-0">
                                           

                                        </p>
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <p class="mb-0">
                                           
                                            
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

        <?php include __DIR__."/../layouts/footer.php"; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include __DIR__."/../layouts/right-sidebar.php"; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include __DIR__."/../layouts/vendor-scripts.php"; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>
