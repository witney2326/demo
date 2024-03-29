<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>


<head>
    <title>Livelihood Graduation</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config2.php'; ?>

    <!-- DataTables -->
<link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Disaster', 'Probability'],
        ['Floods', 10],
        ['Drought', 12],
        ['Earthquake', 2],
        ['Strong winds', 1],
        ['Heatwave', 15],
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':370, 'height':250};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
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
            $query_result = mysqli_query($link_cs,$select_query);
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
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP Graduation</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><?php if ($user == '05'){echo '<a href="..\index_cw.php">Dashboard</a>';}else if ($user == '04'){echo '<a href="..\index_dc.php">Dashboard</a>';} else if ($user == '03') {echo '<a href="..\index_pc.php">Dashboard</a>';} else{echo '<a href="..\index.php">Dashboard</a>';}?></li>
                                    <li class="breadcrumb-item active">Graduation</li>
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
                                            <span class="d-none d-sm-block">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" data-bs-toggle="link" href="assesments/graduation_grp_assesment.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-users"></i></span>
                                            <span class="d-none d-sm-block">Beneficiary Selection</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Beneficiaries" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Nutrition Support</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="graduation_livelihood_promotion.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Livelihood Promotion</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ycs" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Asset Mgt</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#esmp" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Asset Procurement</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reports" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Coaching and mentoring</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reports1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Linkages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="tracking/graduation_hh_tracking.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Graduation Tracking</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        
                                           <!--start --> 
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

                                                                            echo '<p class="text-muted fw-medium">Area: Selected SLGs</p>';

                                                                            $result = mysqli_query($link_cs, "SELECT COUNT(groupID) AS value_groups FROM tblgroup where ((grad_status = '1') and (TAID = '$ta'))"); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum_groups = $row['value_groups'];

                                                                            $result2 = mysqli_query($link_cs, "SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where ((grad_status = '1') and (taID = '$ta'))"); 
                                                                            $row2 = mysqli_fetch_assoc($result2); 
                                                                            $sum_clusters = $row2['value_clusters'];
                                                                        } else if ($user == "04")
                                                                        {
                                                                            echo '<p class="text-muted fw-medium">District: Selected SLGs</p>';

                                                                            $result = mysqli_query($link_cs, "SELECT COUNT(groupID) AS value_groups FROM tblgroup where ((grad_status = '1') and (DistrictID = '$district'))"); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum_groups = $row['value_groups'];

                                                                            $result2 = mysqli_query($link_cs, "SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where ((grad_status = '1') and (districtID = '$district'))"); 
                                                                            $row2 = mysqli_fetch_assoc($result2); 
                                                                            $sum_clusters = $row2['value_clusters'];
                                                                        } else if ($user == "03")
                                                                        {
                                                                            echo '<p class="text-muted fw-medium">Region: Selected SLGs</p>';

                                                                            $result = mysqli_query($link_cs, "SELECT COUNT(groupID) AS value_groups FROM tblgroup where ((grad_status = '1') and (regionID = '$region'))"); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum_groups = $row['value_groups'];

                                                                            $result2 = mysqli_query($link_cs, "SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where ((grad_status = '1') and (regionID = '$region'))"); 
                                                                            $row2 = mysqli_fetch_assoc($result2); 
                                                                            $sum_clusters = $row2['value_clusters'];
                                                                        } else
                                                                        {
                                                                            echo '<p class="text-muted fw-medium">Selected SLGs</p>';

                                                                            $result = mysqli_query($link_cs, "SELECT COUNT(groupID) AS value_groups FROM tblgroup where (grad_status = '1')"); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum_groups = $row['value_groups'];

                                                                            $result2 = mysqli_query($link_cs, "SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where (grad_status = '1')"); 
                                                                            $row2 = mysqli_fetch_assoc($result2); 
                                                                            $sum_clusters = $row2['value_clusters'];
                                                                        }

                                                                        ?>
                                                                            <div class="container">
                                                                                <div class="mb-0"><?php echo "" . number_format($sum_groups + $sum_clusters);?></div>
                                                                            </div> 
                                                                            
                                                                    </div>
                                                                    <i class='fas fa-users' style='font-size:24px;color:chocolate'></i><i class='fas fa-users' style='font-size:24px;color:brown'></i>
                                                                    
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
                                                                            echo '<p class="text-muted fw-medium">Area:Selected HHs</p>';
                                                                            $result = mysqli_query($link_cs, "SELECT COUNT(tblbeneficiaries.sppCode) AS value_sum FROM tblbeneficiaries inner join tblgroup on 
                                                                            tblbeneficiaries.groupID = tblgroup.groupID where ((tblbeneficiaries.grad_status ='1') and (tblgroup.TAID = '$ta'))"); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum = $row['value_sum'];
                                                                        } else if ($user == "04")
                                                                        {
                                                                            echo '<p class="text-muted fw-medium">District:Selected HHs</p>';
                                                                            $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where ((grad_status ='1') and (districtID = '$district'))"); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum = $row['value_sum'];
                                                                        } else if ($user == "03")
                                                                        {
                                                                            echo '<p class="text-muted fw-medium">Region:Selected HHs</p>';
                                                                            $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where ((grad_status ='1') and (regionID = '$region'))"); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum = $row['value_sum'];
                                                                        }else 
                                                                        {
                                                                            echo '<p class="text-muted fw-medium">Selected HHs</p>';
                                                                            $result = mysqli_query($link_cs, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where grad_status ="1"'); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum = $row['value_sum'];
                                                                        }

                                                                        ?>
                                                                        <div class="container">
                                                                            <div class="mb-0"><?php echo "" . number_format($sum);?></div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <i class='fas fa-house-user' style='font-size:24px;color:brown'></i><i class='fas fa-house-user' style='font-size:24px;color:black'></i>
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
                                                                        <p class="text-muted fw-medium">AMCs Formed</p>
                                                                        0
                                                                    </div>
                                                                    <i class='fas fa-user-plus' style='font-size:24px;color:brown'></i>
                                                                    
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
                                                                        <p class="text-muted fw-medium">HHs Trained Asset Mgt</p>
                                                                        0
                                                                    </div>
                                                                    <i class='fas fa-graduation-cap' style='font-size:24px;color:black'></i>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
<script src="../assets/js/app.js"></script>

</body>

</html>
