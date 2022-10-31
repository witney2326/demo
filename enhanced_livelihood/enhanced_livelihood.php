<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>Enhanced Livelihood</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    
    ['Adopted_Places ', 'District'],
    
    <?php 
        $select_query = "SELECT tbldistrict.DistrictName as District, count(cluster) as Adopted_Places
        FROM tbladoptplace 
        inner join tbldistrict on tbldistrict.DistrictID = tbladoptplace.districtID
        GROUP BY tbldistrict.DistrictName";
        $query_result = mysqli_query($link,$select_query);
        while($row_val = mysqli_fetch_array($query_result)){
            
        echo "['".$row_val['Adopted_Places']."',".$row_val['District']."],";
        
        }
    ?>
    
    ]);
    
    

    // Optional; add a title and set the width and height of the chart
    var options = {'title':'', 'width':370, 'height':250};

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.ColumnChart(document.getElementById('AdoptedPlaces'));
    chart.draw(data, options);
    }
</script> 


<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Month', 'Amount'],
    <?php 
        $select_query = "SELECT SUM(Amount) AS value_sum, Month FROM tblgroupsavings  ORDER BY month";
        $query_result = mysqli_query($link,$select_query);
        while($row_val = mysqli_fetch_array($query_result)){
        echo "['".$row_val['Month']."',".$row_val['value_sum']."],";
        }
    ?>
    
    ]);

    

    // Optional; add a title and set the width and height of the chart
    var options = {'title':'', 'width':370, 'height':250};

    // Display the chart inside the <div> element with id="barchart"
    var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));
    chart.draw(data, options);
    }
</script> 


<style>

    .flip-card {
    background-color: transparent;
    width: 300px;
    height: 300px;
    perspective: 500px;
    }

    .flip-card-inner {
    position: relative;
    width: 70%;
    height: 70%;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
    position: absolute;
    width: 70%;
    height: 70%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    }

    .flip-card-front {
    background-color: #FFFFFF;
    color: black;
    }

    .flip-card-back {
    background-color: #FFFFFF;
    color: black;
    transform: rotateY(180deg);
    }

    *{
    box-sizing: border-box;
    }

    body {
    font-family: Arial, Helvetica, sans-serif;
    }

    /* Float four columns side by side */
    .column {
    float: left;
    width: 25%;
    padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding in columns */
    .row {margin: 0 -5px;}

    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    /* Style the counter cards */
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
    padding: 16px;
    text-align: center;
    background-color: #f1f1f1;
    }

    /* Responsive columns - one column layout (vertical) on small screens */
    @media screen and (max-width: 600px) {
    .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
    }
    }

    .numberCircle {
        border-radius: 100%;
        width: 72px;
        height: 72px;
        padding: 18px;

        background: #fff;
        border: 2px solid #00FF00;
        color: #666;
        text-align: center;

        font: 10px Arial, sans-serif;
    }
</style>

</head>
<?php
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
<?php include '../layouts/body.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Enhanced Livelihood</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><?php if ($user == '05'){echo '<a href="..\index_cw.php">Dashboard</a>';}else if ($user == '04'){echo '<a href="..\index_dc.php">Dashboard</a>';} else if ($user == '03') {echo '<a href="..\index_pc.php">Dashboard</a>';} else{echo '<a href="..\index.php">Dashboard</a>';}?></li>
                                    <li class="breadcrumb-item active">Enhanced Livelihood</li>
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
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Enhanced Lvhd Dashboard</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" data-bs-toggle="link" href="jsg.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Joint Skill Groups</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" data-bs-toggle="link" href="ycs.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Youth Challenge Support</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" data-bs-toggle="link" href="cmt.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Coop Management Training</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="vc_production_clusters.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Coop Value Chain</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#lesp" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Legumes ES Production</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#esmp" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Safeguards Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="enhancedReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Enhanced Reports</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
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
                                                                                    <p class="text-muted fw-medium">Youths Linked</p>
                                                                                    <?php
                                                                                    if ($user == "05")
                                                                                    {
                                                                                        $result = mysqli_query($link, "SELECT COUNT(recID) AS v_total FROM tblycs inner join tblgroup 
                                                                                        on tblycs.groupID = tblgroup.groupID where tblgroup.TAID = '$ta'"); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $sum = $row['v_total'];
                                                                                    } else if ($user == "04")
                                                                                    {
                                                                                        $result = mysqli_query($link, "SELECT COUNT(recID) AS v_total FROM tblycs inner join tblgroup 
                                                                                        on tblycs.groupID = tblgroup.groupID where tblgroup.districtID = '$district'"); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $sum = $row['v_total'];
                                                                                    } else if ($user == "03")
                                                                                    {
                                                                                        $result = mysqli_query($link, "SELECT COUNT(recID) AS v_total FROM tblycs inner join tblgroup 
                                                                                        on tblycs.groupID = tblgroup.groupID where tblgroup.regionID = '$region'"); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $sum = $row['v_total'];
                                                                                    }else
                                                                                    {
                                                                                        $result = mysqli_query($link, 'SELECT COUNT(hh_code) AS value_sum FROM tblycs'); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $sum = $row['value_sum'];
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
                                                                            <i class='fas fa-users' style='font-size:24px'></i>

                                                                            <p class="text-muted fw-medium">JSGs Formed</p>
                                                                            <?php
                                                                                if ($user == "05")
                                                                                {
                                                                                    $result = mysqli_query($link, "SELECT COUNT(recID) AS value_total FROM tbljsg inner join tblgroup 
                                                                                    on tbljsg.groupID = tblgroup.groupID where tblgroup.TAID = '$ta'"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_jsgs = $row['value_total'];
                                                                                } 
                                                                                else if ($user == "04")
                                                                                {
                                                                                    $result = mysqli_query($link, "SELECT COUNT(recID) AS value_total FROM tbljsg inner join tblgroup 
                                                                                    on tbljsg.groupID = tblgroup.groupID where tblgroup.districtID = '$district'"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_jsgs = $row['value_total'];
                                                                                } 
                                                                                else if ($user == "03")
                                                                                {
                                                                                    $result = mysqli_query($link, "SELECT COUNT(recID) AS value_total FROM tbljsg inner join tblgroup 
                                                                                    on tbljsg.groupID = tblgroup.groupID where tblgroup.regionID = '$region'"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_jsgs = $row['value_total'];
                                                                                } else
                                                                                {
                                                                                    $result = mysqli_query($link, 'SELECT COUNT(recID) AS total_jsgs FROM tbljsg'); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_jsgs = $row['total_jsgs'];
                                                                                }
                                                                            ?>
                                                                                <div class="container">
                                                                                    <h5><div class="mb-0"><?php echo "" . $total_jsgs;?></div></h5>
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

                                                                            <p class="text-muted fw-medium">Coops Formed</p>
                                                                            <?php

                                                                                if ($user == "05")
                                                                                {
                                                                                    $result = mysqli_query($link, "SELECT count(groupID) AS total_slgs FROM tblgroup where ((registered_group = '1') and (TAID ='$ta'))"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_slgs = $row['total_slgs'];

                                                                                    $resultcls2 = mysqli_query($link, "SELECT count(ClusterID) AS total_cls2 FROM tblcluster where ((registered_group = '1') and (taID ='$ta'))"); 
                                                                                    $rowcls2 = mysqli_fetch_assoc($resultcls2); 
                                                                                    $total_cls2 = $rowcls2['total_cls2'];
                                                                                }
                                                                                if ($user == "04")
                                                                                {
                                                                                    $result = mysqli_query($link, "SELECT count(groupID) AS total_slgs FROM tblgroup where ((registered_group = '1') and (districtID ='$district'))"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_slgs = $row['total_slgs'];

                                                                                    $resultcls2 = mysqli_query($link, "SELECT count(ClusterID) AS total_cls2 FROM tblcluster where ((registered_group = '1') and (districtID ='$district'))"); 
                                                                                    $rowcls2 = mysqli_fetch_assoc($resultcls2); 
                                                                                    $total_cls2 = $rowcls2['total_cls2'];
                                                                                }
                                                                                if ($user == "03")
                                                                                {
                                                                                    $result = mysqli_query($link, "SELECT count(groupID) AS total_slgs FROM tblgroup where ((registered_group = '1') and (regionID ='$region'))"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_slgs = $row['total_slgs'];

                                                                                    $resultcls2 = mysqli_query($link, "SELECT count(ClusterID) AS total_cls2 FROM tblcluster where ((registered_group = '1') and (regionID ='$region'))"); 
                                                                                    $rowcls2 = mysqli_fetch_assoc($resultcls2); 
                                                                                    $total_cls2 = $rowcls2['total_cls2'];
                                                                                } else
                                                                                {
                                                                                    $result = mysqli_query($link, "SELECT count(groupID) AS total_slgs FROM tblgroup where ((registered_group = '1'))"); 
                                                                                    $row = mysqli_fetch_assoc($result); 
                                                                                    $total_slgs = $row['total_slgs'];

                                                                                    $resultcls2 = mysqli_query($link, "SELECT count(ClusterID) AS total_cls2 FROM tblcluster where ((registered_group = '1'))"); 
                                                                                    $rowcls2 = mysqli_fetch_assoc($resultcls2); 
                                                                                    $total_cls2 = $rowcls2['total_cls2'];
                                                                                }
                                                                                echo '<h5 class="mb-0">'. number_format($total_slgs+$total_cls2); echo '</h5>'
                                                                            ?>
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

                                                                            <p class="text-muted fw-medium">Groups in Production VC</p>
                                                                            <h4 class="mb-0">0</h4>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <!-- end here -->
                                            
                                            <!-- end here row1 -->

                                            <!-- pie chart -->
                                            
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
