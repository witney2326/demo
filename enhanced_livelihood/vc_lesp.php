<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>


<head>
    <title>LESP</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
</head>

<?php include '../layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; 
    include '../layouts/config.php';
    ?>

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
                            <h4 class="mb-sm-0 font-size-18">Legume Entreprise Structured Programme</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="enhanced_livelihood.php">Enhanced Livelihood</a></li>
                                    <li class="breadcrumb-item active">LESP</li>
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
                                        <a class="nav-link active" data-bs-toggle="tab" href="javascript:void(0);" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="vc_lesp_group_assesment.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Cluster Assesment/Mapping</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="vc_lesp_mapped_clusters.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Mapped Clusters</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="javascript:void(0);" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Market Linkage</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="javascript:void(0);" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Finacial Linkage</span>
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
                                                                                    <i class='fas fa-house-user' style='font-size:24px'></i>
                                                                                    <p class="text-muted fw-medium">Clusters Assesed</p>
                                                                                    <?php

                                                                                        $result2 = mysqli_query($link, "SELECT count(ClusterID) AS total_cls FROM tblcluster where lesp_assesed = '1'"); 
                                                                                        $row = mysqli_fetch_assoc($result2); 
                                                                                        $total_cls = $row['total_cls'];

                                                                                        $sum = $total_cls;

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
                                                                            <i class='fas fa-users' style='font-size:24px'></i>

                                                                            <p class="text-muted fw-medium">Mapped Clusters</p>
                                                                                <?php
                                                                                    
                                                                                    $result = mysqli_query($link, 'SELECT count(ClusterID) AS total_cls FROM tblcluster where lesp_status = "1"'); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_cls = $row['total_cls'];

                                                                                    $sum = $total_cls;

                                                                                    ?>
                                                                                        <div class="container">
                                                                                            <h5><div class="mb-0"><?php echo "" . $sum;?></div></h5>
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
                                                                            <i class='fas fa-user-graduate' style='font-size:24px'></i>

                                                                            <p class="text-muted fw-medium">SLGs Trained Storage Handling</p>
                                                                            <?php
                                                                               
                                                                                $resultcls = mysqli_query($link, 'SELECT count(ClusterID) AS total_cls FROM tblcluster where regionID = "0"'); 
                                                                                $rowcls = mysqli_fetch_assoc($resultcls); 
                                                                                $total_cls = $rowcls['total_cls'];
                                                                                $sumcls = $total_cls;

                                                                                ?>
                                                                                    <div class="container">
                                                                                        <h5><div class="mb-0"><?php echo "" . $sumcls;?></div></h5>
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
                                                                            <i class='fas fa-chalkboard-teacher' style='font-size:24px'></i>

                                                                            <p class="text-muted fw-medium">Market Linked Clusters</p>
                                                                            <?php
                                                                                

                                                                                $resultcls2 = mysqli_query($link, 'SELECT count(ClusterID) AS total_cls2 FROM tblcluster where regionID = "0"'); 
                                                                                $rowcls2 = mysqli_fetch_assoc($resultcls2); 
                                                                                $total_cls2 = $rowcls2['total_cls2'];
                                                                                $sumcls2 = $total_cls2;
                                                                                ?>
                                                                                    <div class="container">
                                                                                        <h5><div class="mb-0"><?php echo "" . $sumcls2;?></div></h5>
                                                                                    </div>
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
