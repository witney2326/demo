<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>


<head>
    <title>Youth Challenge Support</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
</head>

<?php include 'layouts/body.php'; 

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
                            <h4 class="mb-sm-0 font-size-18">Youth Challenge Support</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="enhanced_livelihood.php">Enhanced Livelihood</a></li>
                                    <li class="breadcrumb-item active">YCSs</li>
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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link " data-bs-toggle="link" href="<?php if($_SESSION["user_role"]== '05'){echo"javascript: void(0)";}else{echo "ycs_meetings.php";}?>" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Sensitization</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="ycs_identification_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Identification</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="ycs_concept_devt_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Concept Devt</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="ycs_skills_linkage_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Skills Linkage</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#vcp" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">IGP</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#vcp" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">IGP Startup Capital</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#vcp" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Fin. Linkages</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home1" role="tabpanel">
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
                                                                                    <i class='fas fa-house-user' style='font-size:18px;color:black'></i><i class='fas fa-house-user' style='font-size:18px;color:coral'></i>
                                                                                   
                                                                                    <?php
                                                                                        if (($user == "05") or ($user == "04"))
                                                                                        {
                                                                                            echo '<p class="text-muted fw-medium">District: Youths Sensitized</p>';
                                                                                            $result = mysqli_query($link, "SELECT sum(malesNo) AS total_males FROM tblawareness_meetings where ((sectorID ='13') and (DistrictID = '$district'))"); 
                                                                                            $row = mysqli_fetch_assoc($result); 
                                                                                            $total_males = $row['total_males'];
                                                                                            
                                                                                            $result2 = mysqli_query($link, "SELECT sum(femalesNo) AS total_females FROM tblawareness_meetings where ((sectorID ='13') and (DistrictID = '$district'))"); 
                                                                                            $row2 = mysqli_fetch_assoc($result2); 
                                                                                            $total_females = $row2['total_females'];

                                                                                            $sum = $total_males+$total_females;
                                                                                        } else if ($user == "03")
                                                                                        {
                                                                                            echo '<p class="text-muted fw-medium">Region:Youths Sensitized</p>';

                                                                                            $result = mysqli_query($link, "SELECT sum(malesNo) AS total_males FROM tblawareness_meetings where ((sectorID ='13') and (regionID = '$region'))"); 
                                                                                            $row = mysqli_fetch_assoc($result); 
                                                                                            $total_males = $row['total_males'];
                                                                                            
                                                                                            $result2 = mysqli_query($link, "SELECT sum(femalesNo) AS total_females FROM tblawareness_meetings where ((sectorID ='13') and (regionID = '$district'))"); 
                                                                                            $row2 = mysqli_fetch_assoc($result2); 
                                                                                            $total_females = $row2['total_females'];

                                                                                            $sum = $total_males+$total_females;
                                                                                        }
                                                                                    ?>
                                                                                        <h5 class="mb-0">
                                                                                            <div class="container">
                                                                                                <div class="mb-0"><?php echo "" . number_format($sum);?></div>
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
                                                                            <i class='fas fa-users' style='font-size:18px;color:brown'></i><i class='fas fa-users' style='font-size:18px;color:chocolate'></i>

                                                                            <?php
                                                                                if ($user == "05")
                                                                                {
                                                                                    echo '<p class="text-muted fw-medium">Youths in YCS</p>';
                                                                                    $result = mysqli_query($link, "SELECT COUNT(distinct hh_code) AS total_youths FROM tblycs inner join tblgroup on
                                                                                    tblycs.groupID = tblgroup.groupID where tblgroup.TAID = '$ta'"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_youths = $row['total_youths'];

                                                                                }else if ($user == "04")
                                                                                {
                                                                                    echo '<p class="text-muted fw-medium">District: Youths in YCS</p>';
                                                                                    $result = mysqli_query($link, "SELECT COUNT(distinct hh_code) AS total_youths FROM tblycs where districtID = '$district'"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_youths = $row['total_youths'];
                                                                                }else if ($user == "03")
                                                                                {
                                                                                    echo '<p class="text-muted fw-medium">Region: Youths in YCS</p>';
                                                                                    $result = mysqli_query($link, "SELECT COUNT(distinct hh_code) AS total_youths FROM tblycs inner join tblgroup on
                                                                                    tblycs.groupID = tblgroup.groupID where tblgroup.regionID = '$region'"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_youths = $row['total_youths'];
                                                                                }else
                                                                                {
                                                                                    echo '<p class="text-muted fw-medium">Youths in YCS</p>';
                                                                                    $result = mysqli_query($link, 'SELECT COUNT(distinct hh_code) AS total_youths FROM tblycs'); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_youths = $row['total_youths'];
                                                                                }

                                                                            ?>
                                                                                <div class="container">
                                                                                    <h5><div class="mb-0"><?php echo "" . number_format($total_youths);?></div></h5>
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
                                                                            <i class='fas fa-user-graduate' style='font-size:18px;color:black'></i><i class='fas fa-user-graduate' style='font-size:18px;color:black'></i>

                                                                            <p class="text-muted fw-medium">Youths Linked (Vocational Skills)</p>
                                                                            <h5 class="mb-0">0</h5>
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
                                                                            <i class='fas fa-chalkboard-teacher' style='font-size:18px;color:black'></i><i class='fas fa-chalkboard-teacher' style='font-size:18px;color:black'></i>

                                                                            <p class="text-muted fw-medium">Youths Linked (Financial)</p>
                                                                            <h5 class="mb-0">0</h5>
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
