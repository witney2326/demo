<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>CSEPWP Basic Livelihood</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
     <?php include '../layouts/config2.php'; ?>
    

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->

<?php
    function month_name($month)
    {
        if($month == 1){
            $mname ='Jan';
        }
        if($month == 2){
            $mname ='Feb';
        }
        if($month == 3){
            $mname ='Mar';
        }
        if($month == 4){
            $mname ='Apr';
        }
        if($month == 5){
            $mname ='May';
        }
        if($month == 6){
            $mname ='Jun';
        }
        if($month == 7){
            $mname ='Jul';
        }
        if($month == 8){
            $mname ='Aug';
        }
        if($month == 9){
            $mname ='Sep';
        }
        if($month == 10){
            $mname ='Oct';
        }
        if($month == 11){
            $mname ='Nov';
        }
        if($month == 12){
            $mname ='Dec';
        }
        return $mname;
    }
    ?>
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
        ['District', 'Lead_Farmers'],
        
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName as District, count(TrainingID) as Lead_Farmers
            FROM tblanimatortrainings 
            inner join tbldistrict on tbldistrict.DistrictID = tblanimatortrainings.districtID where tblanimatortrainings.animatorType = '06'
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link_cs,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['District']."',".$row_val['Lead_Farmers']."],";
            
            }
        ?>
        
        ]);
        
        

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':330, 'height':250};

        var options = {
            title: 'ACSA Lead Farmers Trained' ,
            width: '330',
            height: '250',
            hAxis: {title: ''},
            vAxis: {title: ''},
            legend: 'none',
            series: {
            0: { color: '#e2431e' },
          }
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('AdoptedPlaces'));
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
        ['Month', 'Savings'],
        <?php 
            $select_query = "SELECT SUM(Amount) AS Savings, Month FROM tblslg_member_savings  Group BY month";
            $query_result = mysqli_query($link_cs,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                $mon = month_name($row_val['Month']);
            echo "['".$mon."',".$row_val['Savings']."],";
            }
        ?>
        
        ]);

        

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':470, 'height':250};

        var options = {
            title: 'Savings Per Month' ,
            width: '480',
            height: '250',
            hAxis: {title: ''},
            vAxis: {title: 'Amount Mobilised'},
            legend: 'none',
            series: {
            0: { color: '#e2431e' },
          }
        };


        // Display the chart inside the <div> element with id="barchart"
        var chart = new google.visualization.LineChart(document.getElementById('barchart'));
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<?php include '../layouts/body.php'; ?>

<?php
    $user = $_SESSION["user_role"];
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
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP Basic Livelihood</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><?php if ($user == '05'){echo '<a href="../index_cw.php">Dashboard</a>';}else if ($user == '04'){echo '<a href="../index_dc.php">Dashboard</a>';} else if ($user == '03') {echo '<a href="../index_pc.php">Dashboard</a>';} else{echo '<a href="../index.php">Dashboard</a>';}?></li>
                                    <li class="breadcrumb-item active">CS-EPWP Basic Livelihood</li>
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
                                            <span class="d-none d-sm-block">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="csepwp_basic_livelihood_hh_mgt.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Household Verification</span>
                                        </a>
                                    </li>
                                                                        
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="meetings/csepwp_basic_livelihood_meetings.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Awareness & Sensitization Meetings</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="csepwp_basic_livelihood_slg_mgt2.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Savings & Loan Group Mgt</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="trainings/csepwp_basic_livelihood_training.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Capacity Building</span>
                                        </a>
                                    </li>
                                    
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="acsa/csepwp_acsa_mgt.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Actionable Climate Smart Agriculture</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link"  href="basic_livelihood_safeguards_mgt_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Environmental & Social Safeguard Mgt</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class ="row">
                                    <?php
                                        if ($_SESSION["user_role"] == '00'){echo '<div class="alert alert-warning" role="alert">You are Logged in as a CIMIS Guest Please Get Registered! <a href="auth-register-2.php">here ..</a></div>';}
                                    ?>
                                    <div class="col-xl-9">
                                        
                                            <div class="card border border-success">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped mb-0">
                                                            
                                                            <th>District</th>
                                                            <th>Target HH</th>
                                                            <th>Achieved</th>
                                                            <th>Target Grps</th>
                                                            <th>Achieved</th>
                                                            <th></th>
                                                            <tbody>
                                                                <tr>
                                                                    
                                                                    <td>Chitipa</td>
                                                                    <?php
                                                                            $result = mysqli_query($link_cs, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum = $row['value_sum'];
                                                                        ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td> 
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Karonga</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT COUNT(groupID) AS value_sum FROM tblgroup WHERE deleted = 0'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $sum = $row['value_sum'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>              
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Rumphi</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT count(TrainingID) AS total_grps FROM tblgrouptrainings'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $sum = $row['total_grps'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>                         
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Mzimba</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT sum(Males+Females) AS total_hhs_trained FROM tblgrouptrainings'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $sumhhs = $row['total_hhs_trained'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Nkhatabay</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT COUNT(ClusterID) AS value_cls FROM tblcluster WHERE deleted = 0'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $sumcls = $row['value_cls'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Likoma</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT count(TrainingID) AS total_grps FROM tblgrouptrainings'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $sum = $row['total_grps'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>                         
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Nkhotakota</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT count(groupID) AS total_slgs FROM tblgroup where registered_group = "1"'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $total_slgs = $row['total_slgs'];

                                                                        $resultcls2 = mysqli_query($link_cs, 'SELECT count(ClusterID) AS total_cls2 FROM tblcluster where registered_group = "1"'); 
                                                                        $rowcls2 = mysqli_fetch_assoc($resultcls2); 
                                                                        $total_cls2 = $rowcls2['total_cls2'];
                                                                        
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Kasungu</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT COUNT(recID) AS value_total FROM tbljsg'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $total = $row['value_total'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>                         
                                                                </tr>
                                                                
                                                                <tr>
                                                                    
                                                                    <td>Ntchisi</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT COUNT(recID) AS v_total FROM tblycs'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $v_total = $row['v_total'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>                         
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Dowa</td>
                                                                    <?php
                                                                        

                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Mchinji</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where grad_status ="1"'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $sum = $row['value_sum'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Salima</td>
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where grad_status ="1"'); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $sum = $row['value_sum'];
                                                                    ?>
                                                                   <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    
                                                                    <td>Lilongwe</td>
                                                                    <?php
                                                                        
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td>Dedza</td>
                                                                    <?php
                                                                        $select_query_esmp = "SELECT COUNT(planID) as TotalESMPs FROM tblsafeguard_group_plans";
                                                                        $query_result_esmp = mysqli_query($link_cs,$select_query_esmp);
                                                                        $row_val = mysqli_fetch_array($query_result_esmp);
                                                                        $totalesmps =  $row_val['TotalESMPs'];
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ntcheu</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Balaka</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Machinga</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mangochi</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Zomba</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Phalombe</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mulanje</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Thyolo</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Blantyre</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Chiladzulo</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nsanje</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Chikwawa</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nwanza</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Neno</td>
                                                                    <?php 
                                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                                        $query_result = mysqli_query($link_cs,$select_query);
                                                                        $row_val = mysqli_fetch_array($query_result);
                                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                                    ?>
                                                                   <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="javascript: void(0);">more ..</a>';}  ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        
                                       
                                    </div>

                                    <div class = "col-lg-3">
                                        <div class ="row">
                                            <div class="card border border-success">                               
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <i class='fas fa-house-user' style='font-size:24px;color:brown'></i><i class='fas fa-house-user' style='font-size:24px;color:slategrey'></i>
                                                            <p class="text-muted fw-medium">CS-EPWP HouseHolds</p>
                                                            <?php
                                                                $result = mysqli_query($link_cs, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
                                                                $row = mysqli_fetch_assoc($result); 
                                                                $sum = $row['value_sum'];
                                                            ?>
                                                                <h5 class="mb-0">
                                                                    <div class="container">
                                                                        <div class="mb-0"><?php echo "" . number_format($sum);?></div>
                                                                    </div> 
                                                                </h5>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="card border border-success">  
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <i class='fas fa-users' style='font-size:24px;color:chocolate'></i><i class='fas fa-users' style='font-size:24px;color:brown'></i>

                                                            <p class="text-muted fw-medium">CS-EPWP SLGs Formed</p>
                                                            <?php
                                                                $result = mysqli_query($link_cs, 'SELECT COUNT(groupID) AS value_sum FROM tblgroup WHERE deleted = 0'); 
                                                                $row = mysqli_fetch_assoc($result); 
                                                                $sum = $row['value_sum'];
                                                            ?>
                                                            <div class="container">
                                                                <h5><div class="mb-0"><?php echo "" . number_format($sum);?></div></h5>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="card border border-success">  
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <i class='fas fa-users' style='font-size:24px;color:chocolate'></i><i class='fas fa-user-graduate' style='font-size:24px;color:black'></i><i class='fas fa-users' style='font-size:24px;color:brown'></i>
                                                            <p class="text-muted fw-medium">SLGs Trained</p>
                                                            <?php
                                                                $result = mysqli_query($link_cs, 'SELECT COUNT(DISTINCT(groupID)) AS value_sum FROM tblgrouptrainings'); 
                                                                $row = mysqli_fetch_assoc($result); 
                                                                $sum = $row['value_sum'];
                                                            ?>
                                                            <div class="container">
                                                                <h5><div class="mb-0"><?php echo "" . number_format($sum);?></div></h5>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="card border border-success">                               
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <i class='fas fa-check' style='font-size:20px;color:green'></i>
                                                            
                                                            <p class="text-muted fw-medium">CS-EPWP Verified Households</p>
                                                            <?php
                                                                $result = mysqli_query($link_cs, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries WHERE prog_status_verified = 1'); 
                                                                $row = mysqli_fetch_assoc($result); 
                                                                $sum_hhs = $row['value_sum'];
                                                            ?>
                                                            <h5 class="mb-0"><?php echo "" . number_format($sum_hhs);?></h5>
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

<script src="assets/js/app.js"></script>

</body>

</html>
