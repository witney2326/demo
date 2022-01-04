<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CIMIS - Comsip Intergrated MIS</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
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
            $select_query = "SELECT tbldistrict.DistrictName,COUNT(tblgroup.groupname) as grps
            FROM tblgroup 
            inner join tbldistrict on tblgroup.DistrictID = tbldistrict.DistrictID
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['DistrictName']."',".$row_val['grps']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'SL Groups Per District', 'width':370, 'height':250};

        // 
        var chart = new google.visualization.ColumnChart(document.getElementById('grps_per_district'));
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
        var options = {'title':'Actual Households', 'width':370, 'height':250};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('actual_hhs'));
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
            inner join tbldistrict on tblgroup.DistrictID = tbldistrict.DistrictID
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['District']."',".$row_val['membership']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':370, 'height':250};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
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
                $mon = month_name($row_val['Month']);
            echo "['".$mon."',".$row_val['value_sum']."],";
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
        var options = {'title':'Member Savings', 'width':370, 'height':250};

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
            $select_query = "SELECT tbldistrict.DistrictName as District, SUM(tblgroupsavings.Amount) as TotalSavings
            FROM tblgroupsavings 
            INNER JOIN tbldistrict on tbldistrict.DistrictID = tblgroupsavings.DistrictID 
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
            echo "['".$row_val['District']."',".$row_val['TotalSavings']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Savings per District', 'width':370, 'height':250};

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
                                            <div class="card mini-stats-wid">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <p class="text-muted fw-medium">Basic Enrolment</p>
                                                                <?php
                                                                            $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
                                                                            $row = mysqli_fetch_assoc($result); 
                                                                            $sum = $row['value_sum'];
                                                                        ?>
                                                                        <h4 class="mb-0">
                                                                            <div class="container">
                                                                                <div class="numberCircle"><?php echo "" . $sum;?></div>
                                                                            </div> 
                                                                        </h4>
                                                            </div>
                                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">  
                                                            <span class="avatar-title">
                                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                                </span>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                            </div>  
                                        <!-- -->
                                        </div>
                                        <a href="basic_livelihood_hh_mgt.php">more ..</a>
                                    </div>
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                        
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Joint Skill Grps</p>
                                                            <h4 class="mb-0">0</h4>
                                                        </div>
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="">more ..</a>
                                    </div>
                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">

                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Youth Challenge</p>
                                                            <h4 class="mb-0">0</h4>
                                                        </div>
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a href="">more ..</a>
                                    </div>

                                    <div class="card border">
                                        <img src="..." class="card-img-top" alt="">
                                        <div class="card-body">
                                        
                                            <div class="card mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted fw-medium">Value Chains</p>
                                                            <h4 class="mb-0">0</h4>
                                                        </div>
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a href="">more ..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- end here row1 -->
                    <div class = "row">
                                                
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <?php 
                                        $select_query = "SELECT COUNT(groupID) as TotalGroups FROM tblgroup";
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
                                        $select_query = "SELECT SUM(tblgroupsavings.Amount) as TotalSavings FROM tblgroupsavings";
                                        $query_result = mysqli_query($link,$select_query);
                                        $row_val = mysqli_fetch_array($query_result);
                                         $CurSavings =  $row_val['TotalSavings'];
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
                                <div class="card-header bg-transparent border-primary">
                                    <h6 class="my-0 text-primary">Total: <?php echo $sum;?></h6>
                                </div>
                                <div id="actual_hhs"></div> 
                            </div>
                        </div>
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                 <?php 
                                        $select_query = "SELECT SUM((MembersF)+(MembersM)) as TotalMembers FROM tblgroup";
                                        $query_result = mysqli_query($link,$select_query);
                                        $row_val = mysqli_fetch_array($query_result);
                                         $totalM =  $row_val['TotalMembers'];
                                    ?>
                                    <h5 class="my-0 text-primary">Expected Household Distribution (BL):<?php echo $totalM;?></h5>
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
                                    <h6 class="my-0 text-primary">Group Savings: </h6>
                                </div>
                                <div id="barchart"></div> 
                            </div>
                        </div>
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    
                                    <h5 class="my-0 text-primary">Member Savings:</h5>
                                </div>
                                <div id="MemberSavings"></div> 
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
