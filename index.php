<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CIMIS - Comsip Intergrated MIS</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<?php include 'layouts/body.php'; ?>
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

<?php 
    $query="SELECT tbldistrict.DistrictName,COUNT(tblgroup.groupname) as grps, sum(tblgroup.MembersM) as smales, sum(MembersF) as sfemales, SUM(tblgroupsavings.Amount) as sAmount
    FROM tblgroup 
    INNER JOIN tblcw on tblcw.cwID = tblgroup.cwID 
    inner join tblgroupsavings on tblgroup.groupID = tblgroupsavings.GroupID
    inner join tbldistrict on tblgroupsavings.DistrictID = tbldistrict.DistrictID
    GROUP BY tbldistrict.DistrictName";

    
    if ($result_set = $link->query($query)) {
    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
    { 
        echo "<script>
            var my_2d = ".json_encode($row)."
        </script>";
    }
    $result_set->close();
    }  
$test = 85;
?>

<script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        
        ['District', 'Groups'],
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName,COUNT(tblgroup.groupname ) as grps
            FROM tblgroup 
            inner join tbldistrict on tblgroup.DistrictID = tbldistrict.DistrictID where tblgroup.deleted = '0'
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['DistrictName']."',".$row_val['grps']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'SL Groups Per District', 'width':490, 'height':250};

        // 
        var chart = new google.visualization.LineChart(document.getElementById('grps_per_district'));
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
        
        ['District', 'households'],
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName as District,COUNT(tblbeneficiaries.sppCode) as households
            FROM tblbeneficiaries 
            inner join tbldistrict on tblbeneficiaries.DistrictID = tbldistrict.DistrictID
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['District']."',".$row_val['households']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':370, 'height':250};

        var options = {
            title: 'Actual HHs Per District',
            hAxis: {title: ''},
            vAxis: {title: 'No HHs'},
            legend: 'none',
            series: {
            0: { color: '#006400' },
            }
        };


        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.LineChart(document.getElementById('actual_hhs'));
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
        
        ['District', 'membership'],
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName as District,(sum(tblgroup.MembersF)+sum(tblgroup.MembersF)) as membership
            FROM tblgroup 
            inner join tbldistrict on tblgroup.DistrictID = tbldistrict.DistrictID where tblgroup.deleted = '0'
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['District']."',".$row_val['membership']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':370, 'height':250};

        
        var options = {
            title: 'Expected HHs Per District',
            hAxis: {title: ''},
            vAxis: {title: 'No HHs'},
            legend: 'none',
            series: {
            0: { color: '#e2431e' },
          }
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.LineChart(document.getElementById('piechart3'));
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
            $select_query = "select month as Month1, count(distinct hh_code) as Households, sum(amount) as Amount from tblslg_member_savings group by month";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                $mon = month_name($row_val['Month1']);
            echo "['".$mon."',".$row_val['Amount']."],";
            }
        ?>   
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':740, 'height':250};

        // Display the chart inside the <div> element with id="barchart"
        var chart = new google.visualization.ColumnChart(document.getElementById('barchart_1'));
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
        ['District', 'ESMP_Plans'],
        <?php 
            $select_query = "select tbldistrict.DistrictName as District, count(tblsafeguard_group_plans.planID) as ESMP_Plans from tblsafeguard_group_plans 
            inner join tbldistrict on tblsafeguard_group_plans.districtID = tbldistrict.DistrictID group by tbldistrict.DistrictName;";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){           
            echo "['".$row_val['District']."',".$row_val['ESMP_Plans']."],";
            }
        ?>   
        ]);
        
        // Optional; add a title and set the width and height of the chart
        var options = {'title':'ESMP per District', 'width':390, 'height':250};

        // Display the chart inside the <div> element with id="barchart"
        var chart = new google.visualization.ColumnChart(document.getElementById('esmp'));
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
        ['district', 'member_savings'],
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName as district ,sum(amount) as member_savings FROM tblslg_member_savings inner join tbldistrict on tbldistrict.DistrictID = tblslg_member_savings.districtID  GROUP BY tbldistrict.DistrictName;";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                $mon = $row_val['district'];
            echo "['".$mon."',".$row_val['member_savings']."],";
            }
        ?>
        
        ]);

        

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Member Savings', 'width':370, 'height':300};

        // Display the chart inside the <div> element with id="barchart"
        var chart = new google.visualization.ColumnChart(document.getElementById('MemberSavings'));
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
        ['District', 'TotalSavings'],
        
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName as District, SUM(tblslg_member_savings.amount) as TotalSavings
            FROM tblslg_member_savings 
            INNER JOIN tbldistrict on tbldistrict.DistrictID = tblslg_member_savings.districtID 
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
            echo "['".$row_val['District']."',".$row_val['TotalSavings']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Savings per District', 'width':490, 'height':250};

        // Display the chart inside the <div> element with id="barchart"
        var chart = new google.visualization.ColumnChart(document.getElementById('savings_per_district'));
        chart.draw(data, options);
        }
    </script> 


<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">                                     
                </div>

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">CIMIS Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboards</a></li>
                                    <li class="breadcrumb-item active">CIMIS Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-transparent border-primary">
                                <div class="card-group">
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <i class='fas fa-house-user' style='font-size:24px'></i><i class='fas fa-house-user' style='font-size:24px; color:chocolate'></i>
                                                        <p class="text-muted fw-medium">HHs Reached</p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $sum = $row['value_sum'];
                                                        ?>
                                                        <h6 class="mb-0">
                                                            <div class="container">
                                                                <div class="numberCircle"><?php echo "" . number_format($sum);?></div>
                                                            </div> 
                                                        </h6>
                                                    </div>
                                                    <a href="basic_livelihood_hh_mgt.php">more ..</a> 
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
                                                    <i class='fas fa-layer-group' style='font-size:24px;color:darkgoldenrod'></i><i class='fas fa-layer-group' style='font-size:24px;color:brown'></i><i class='fas fa-layer-group' style='font-size:24px;color:burlywood'></i>
                                                        <p class="text-muted fw-medium">JSGs</p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(recID) AS value_total FROM tbljsg'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $total = $row['value_total'];
                                                        ?>
                                                        <h6 class="mb-0">
                                                            <div class="container">
                                                                <div class="numberCircle"><?php echo "" . number_format($total);?></div>
                                                            </div> 
                                                        </h6>
                                                    </div>
                                                    <a href="enhanced_livelihood/jsg.php">more ..</a>
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
                                                        <i class='fas fa-hiking' style='font-size:24px; color:chocolate'></i><i class='fas fa-running' style='font-size:24px;color:coral'></i>
                                                        <p class="text-muted fw-medium">Youths Linked</p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(recID) AS v_total FROM tblycs'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $v_total = $row['v_total'];
                                                        ?>
                                                            <h6 class="mb-0">
                                                                <div class="container">
                                                                    <div class="numberCircle"><?php echo "" . number_format($v_total);?></div>
                                                                </div> 
                                                            </h6>
                                                    </div>
                                                    <a href="enhanced_livelihood/ycs.php">more ..</a>
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
                                                        <i class='fas fa-school' style='font-size:24px;color:cadetblue'></i><i class='fas fa-graduation-cap' style='font-size:24px'></i>
                                                        <p class="text-muted fw-medium">SLGs On Graduation Path </p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(groupID) AS value_grps FROM tblgroup where grad_status="1"'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $sum_grps = $row['value_grps'];

                                                            $result_2 = mysqli_query($link, 'SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where grad_status="1"'); 
                                                            $row = mysqli_fetch_assoc($result_2); 
                                                            $sum_clusters = $row['value_clusters'];

                                                        ?>
                                                        <h6 class="mb-0">
                                                            <div class="container">
                                                                <div class="numberCircle"><?php echo "" . number_format($sum_clusters+$sum_grps);?></div>
                                                            </div> 
                                                        </h6>
                                                    </div>
                                                    <a href="graduation/graduation.php">more..</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- end here row1 -->
                    <!-- Row 2 -->
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-transparent border-primary">
                                <div class="card-group">
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                    <i class='fas fa-users' style='font-size:24px'></i>

                                                        <p class="text-muted fw-medium">SLGs Formed</p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(groupID) AS value_sum FROM tblgroup WHERE deleted = 0'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $sum = $row['value_sum'];
                                                        ?>
                                                        <div class="container">
                                                            <h6><div class="mb-0"><?php echo "" . number_format($sum);?></div></h6>
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
                                                    <i class='fas fa-layer-group' style='font-size:24px;color:darkgoldenrod'></i><i class='fas fa-chalkboard-teacher' style='font-size:24px;color:brown'></i><i class='fas fa-layer-group' style='font-size:24px;color:black'></i>
                                                        <p class="text-muted fw-medium">Coops Formed</p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT count(groupID) AS total_slgs FROM tblgroup where registered_group = "1"'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $total_slgs = $row['total_slgs'];
                                                        ?>
                                                        <h6 class="mb-0">
                                                            <div class="container">
                                                                <div class="numberCircle"><?php echo "" . number_format($total_slgs);?></div>
                                                            </div> 
                                                        </h6>
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
                                                        <i class='fas fa-industry' style='font-size:24px; color:crimson'></i><i class='fas fa-industry' style='font-size:24px; color:black'></i>
                                                        <p class="text-muted fw-medium">SLGs in Production VC</p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(groupID) AS v_total FROM tblgroup where vc_status = "1"'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $v_total = $row['v_total'];
                                                        ?>
                                                            <h6 class="mb-0">
                                                                <div class="container">
                                                                    <div class="numberCircle"><?php echo "" . number_format($v_total);?></div>
                                                                </div> 
                                                            </h6>
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
                                                        <i class='fas fa-graduation-cap' style='font-size:24px'></i><i class='fas fa-graduation-cap' style='font-size:24px;color:cadetblue'></i>
                                                        <p class="text-muted fw-medium">Households on Graduation Path</p>
                                                        <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where grad_status ="1"'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $sum = $row['value_sum'];
                                                        ?>
                                                            <div class="container">
                                                                <h6><div class="mb-0"><?php echo "" . $sum;?></div></h6>
                                                            </div>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- end Row 2 -->
                    <div class = "row">
                                                
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <?php 
                                        $select_query = "SELECT COUNT(groupID) as TotalGroups FROM tblgroup where deleted ='0'";
                                        $query_result = mysqli_query($link,$select_query);
                                        $row_val = mysqli_fetch_array($query_result);
                                         $CurGroups =  $row_val['TotalGroups'];
                                    ?>
                                    <h6 class="my-0 text-primary">Total: <?php echo number_format("$CurGroups")."<br>"  ?> </h6>
                                </div>
                                <div id="grps_per_district"></div> 
                            </div>
                        </div>
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <?php 
                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                        $query_result = mysqli_query($link,$select_query);
                                        $row_val = mysqli_fetch_array($query_result);
                                         $CurSavings =  floatval($row_val['TotalSavings']);
                                    ?>
                                    <h6 class="my-0 text-primary">Total: MK<?php echo number_format("$CurSavings",2)."<br>"  ?></h6>
                                </div>
                                <div id="savings_per_district"></div>
                            </div>
                        </div>   
                    </div>
                    
                    <div class = "row">
                                                
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                            <?php
                                $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
                                $row = mysqli_fetch_assoc($result); 
                                $sum = $row['value_sum'];
                            ?>
                                <div class="card-header bg-transparent border-primary">
                                    <h8 class="my-0 text-default">Total (CIMIS Database): <?php echo number_format($sum);?></h8>
                                </div>
                                <div id="actual_hhs"></div> 
                            </div>
                        </div>
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                 <?php 
                                        $select_query = "SELECT SUM((MembersF)+(MembersM)) as TotalMembers FROM tblgroup where deleted = '0'";
                                        $query_result = mysqli_query($link,$select_query);
                                        $row_val = mysqli_fetch_array($query_result);
                                         $totalM =  $row_val['TotalMembers'];
                                    ?>
                                    <h8 class="my-0 text-default">Total:<?php echo number_format($totalM);?></h8>
                                </div>
                                <div id="piechart3"></div> 
                            </div>
                        </div>   
                    </div>        

                    <!-- here -->
                    <div class = "row">
                                                
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <?php
                                        $select_query_esmp = "SELECT COUNT(planID) as TotalESMPs FROM tblsafeguard_group_plans";
                                        $query_result_esmp = mysqli_query($link,$select_query_esmp);
                                        $row_val = mysqli_fetch_array($query_result_esmp);
                                         $total =  $row_val['TotalESMPs'];
                                    ?>
                                    <h8 class="my-0 text-default">Total ESMPs: <?php echo number_format($total);?> </h8>
                                </div>
                                <div id="esmp"></div> 
                            </div>
                        </div>
                        
                    </div>        
                <!-- end row -->

                
                <!-- end row -->
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Transaction Modal -->
        
        <!-- end modal -->

        <!-- subscribeModal -->
        <!-- end modal -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>
