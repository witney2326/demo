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

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
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
    var options = {'title':'Savings and Loan Group Distribution', 'width':490, 'height':250};
    var chart = new google.visualization.LineChart(document.getElementById('grps_per_district'));
    chart.draw(data, options);
    
    }
</script> 




<script type="text/javascript">
    <?
    $select_query1 = "SELECT tbldistrict.DistrictName as District,COUNT(tblgroup.groupname ) as grps
    FROM tblgroup 
    inner join tbldistrict on tblgroup.DistrictID = tbldistrict.DistrictID where tblgroup.deleted = '0'
    GROUP BY tbldistrict.DistrictName";
    $res1 = mysqli_query($link,$select_query1);

    $data1 = array();
    while ($row1 = $res1->fetch_assoc()) {
        $data1[] = [$row1['District'], $row1['grps']];
    }

    $select_query2 = "SELECT tbldistrict.DistrictName as District,COUNT(tblbeneficiaries.sppCode) as households
    FROM tblbeneficiaries 
    inner join tbldistrict on tblbeneficiaries.DistrictID = tbldistrict.DistrictID
    GROUP BY tbldistrict.DistrictName";
    $res2 = mysqli_query($link,$select_query2);

    $data2 = array();
    while ($row2 = $res2->fetch_assoc()) {
        $data2[] = [$row2['District'], $row2['households']];
    }
?>

var grp = <?php echo json_encode($data1); ?>;
var hhs = <?php echo json_encode($data2); ?>;

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Current month
var data1 = new google.visualization.DataTable();
        data1.addColumn({label: 'groups', type: 'number'});
        data1.addRows(grp);

// Last Month
        var data2 = new google.visualization.DataTable();
        data2.addColumn({label: 'households', type: 'number'});
        data2.addRows(hhs);

var join1 = google.visualization.data.join(data1, data2, 'full');

var options = {
                title: '',
                curveType: 'function',
                legend: { position: 'bottom' }
                };

// Curved chart
var chart = new google.visualization.LineChart(document.getElementById('test1'));
chart.draw(join1, options);

 // End bracket from drawChart

    

</script> 

<script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([

['District', 'JSGs'],
<?php 
    $select_query = "SELECT tbldistrict.DistrictName,COUNT(tbljsg.recID ) as grps
    FROM tbljsg 
    inner join tbldistrict on tbljsg.districtID = tbldistrict.DistrictID where tbljsg.deleted = '0'
    GROUP BY tbldistrict.DistrictName";

    $query_result = mysqli_query($link,$select_query);
    while($row_val = mysqli_fetch_array($query_result)){               
        echo "['".$row_val['DistrictName']."',".$row_val['grps']."],";
    }
?>       
]);
// Optional; add a title and set the width and height of the chart
var options = {'title':'JSG Distribution', 'width':490, 'height':250};
var chart = new google.visualization.PieChart(document.getElementById('jsgs_per_district'));
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
                <div class ="row">
                    <?php
                        if ($_SESSION["user_role"] == '00'){echo '<div class="alert alert-warning" role="alert">You are Logged in as a CIMIS Guest Please Get Registered! <a href="auth-register-2.php">here ..</a></div>';}
                    ?>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card border border-success">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <th></th>
                                            <th>Track Unit</th>
                                            <th>Achieved</th>
                                            <th>Target</th>
                                            <th></th>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-house-user' style='font-size:18px'></i></th>
                                                    <td>HHs Reached</td>
                                                    <?php
                                                            $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
                                                            $row = mysqli_fetch_assoc($result); 
                                                            $sum = $row['value_sum'];
                                                        ?>
                                                    <td><?php echo "" . number_format($sum);?>  </td>
                                                    <td><?php echo number_format(70000);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="basic_livelihood_hh_mgt.php">more ..</a>';}  ?></td> 
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-users' style='font-size:18px'></i></th>
                                                    <td>SLGs Formed</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(groupID) AS value_sum FROM tblgroup WHERE deleted = 0'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['value_sum'];
                                                    ?>
                                                    <td><?php echo "" . number_format($sum);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="basic_livelihood_HH_Nat_reports.php">more ..</a>';}  ?></td>              
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-book-reader' style='font-size:18px'></i></th>
                                                    <td>SLGs Trained</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT count(TrainingID) AS total_grps FROM tblgrouptrainings'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['total_grps'];
                                                    ?>
                                                    <td><?php echo "" . number_format($sum);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="basic_livelihood_training_trained_groups.php">more ..</a>';}  ?></td>                         
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-house-user' style='font-size:18px'></i></th>
                                                    <td>HHs Trained</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT sum(Males+Females) AS total_hhs_trained FROM tblgrouptrainings'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sumhhs = $row['total_hhs_trained'];
                                                    ?>
                                                    <td><?php echo "" . number_format($sumhhs);?></td>
                                                    <td><?php echo number_format(70000);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-users' style='font-size:18px'></i></th>
                                                    <td>Clusters Formed</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(ClusterID) AS value_cls FROM tblcluster WHERE deleted = 0'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sumcls = $row['value_cls'];
                                                    ?>
                                                    <td><?php echo "" . number_format($sumcls);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-layer-group' style='font-size:18px;color:darkgoldenrod'></i></th>
                                                    <td>Clusters Trained</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT count(TrainingID) AS total_grps FROM tblgrouptrainings'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['total_grps'];
                                                    ?>
                                                    <td><?php echo "" . number_format($sum);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="basic_livelihood_training_trained_groups.php">more ..</a>';}  ?></td>                         
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-layer-group' style='font-size:18px;color:darkgoldenrod'></i></th>
                                                    <td>Coops Formed</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT count(groupID) AS total_slgs FROM tblgroup where registered_group = "1"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $total_slgs = $row['total_slgs'];

                                                        $resultcls2 = mysqli_query($link, 'SELECT count(ClusterID) AS total_cls2 FROM tblcluster where registered_group = "1"'); 
                                                        $rowcls2 = mysqli_fetch_assoc($resultcls2); 
                                                        $total_cls2 = $rowcls2['total_cls2'];
                                                        
                                                    ?>
                                                    <td><?php echo "" . number_format($total_slgs+$total_cls2);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-layer-group' style='font-size:18px;color:darkgoldenrod'></i></th>
                                                    <td>JSGs Formed</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(recID) AS value_total FROM tbljsg'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $total = $row['value_total'];
                                                    ?>
                                                    <td><?php echo "" . number_format($total);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="slg_jsg_reports.php">more ..</a>';}  ?></td>                         
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row"><i class='fas fa-hiking' style='font-size:18px; color:chocolate'></i></th>
                                                    <td>Youths Linked</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(recID) AS v_total FROM tblycs'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $v_total = $row['v_total'];
                                                    ?>
                                                    <td><?php echo "" . number_format($v_total);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="slg_ycs_reports.php">more ..</a>';}  ?></td>                         
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-school' style='font-size:18px;color:cadetblue'></i></th>
                                                    <td>SLGs on Graduation</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(groupID) AS value_grps FROM tblgroup where grad_status="1"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum_grps = $row['value_grps'];

                                                        $result_2 = mysqli_query($link, 'SELECT COUNT(ClusterID) AS value_clusters FROM tblcluster where grad_status="1"'); 
                                                        $row = mysqli_fetch_assoc($result_2); 
                                                        $sum_clusters = $row['value_clusters'];

                                                    ?>
                                                    <td><?php echo "" . number_format($sum_clusters+$sum_grps);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="graduation/graduation.php">more..</a>';}  ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-graduation-cap' style='font-size:18px;color:cadetblue'></i></th>
                                                    <td>HHs on Graduation</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where grad_status ="1"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['value_sum'];
                                                    ?>
                                                    <td><?php echo "" . number_format($sum);?></td>
                                                    <td><?php echo number_format(8400);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-graduation-cap' style='font-size:18px'></i></th>
                                                    <td>Graduated HHs</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries where grad_status ="1"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $sum = $row['value_sum'];
                                                    ?>
                                                    <td>0</td>
                                                    <td><?php echo number_format(8400);?></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><i class='fas fa-industry' style='font-size:18px; color:crimson'></i></th>
                                                    <td>SLGs In Prod. VC</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(groupID) AS v_total FROM tblgroup where vc_status = "1"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $v_total = $row['v_total'];
                                                    ?>
                                                    <td><?php echo "" . number_format($v_total);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fa fa-globe' style='font-size:18px; color:green'></i></th>
                                                    <td>Safeguard Plans</td>
                                                    <?php
                                                        $select_query_esmp = "SELECT COUNT(planID) as TotalESMPs FROM tblsafeguard_group_plans";
                                                        $query_result_esmp = mysqli_query($link,$select_query_esmp);
                                                        $row_val = mysqli_fetch_array($query_result_esmp);
                                                        $totalesmps =  $row_val['TotalESMPs'];
                                                    ?>
                                                    <td><?php echo "" . number_format($totalesmps);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-dollar-sign' style='font-size:18px; color:green'></i></th>
                                                    <td>Savings Mobilised</td>
                                                    <?php 
                                                        $select_query = "SELECT SUM(amount) as TotalSavings FROM tblslg_member_savings";
                                                        $query_result = mysqli_query($link,$select_query);
                                                        $row_val = mysqli_fetch_array($query_result);
                                                        $CurSavings =  floatval($row_val['TotalSavings']);
                                                    ?>
                                                    <td><?php echo "MK", number_format("$CurSavings",2);?></td>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="basic_livelihood_savings_members_reports.php">more ..</a>';}  ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class ="row">
                            <div class="card border border-success">                               
                                <div id="test1"></div> 
                            </div>
                        </div>
                    </div>

                    <div class = "col-lg-6">
                        <div class ="row">
                            <div class="card border border-success">                               
                                <div id="grps_per_district"></div> 
                            </div>
                        </div>
                        <div class ="row">
                            <div class="card border border-success">  
                                <div id="savings_per_district"></div>
                            </div>
                        </div>
                        <div class ="row">
                            <div class="card border border-success">  
                                <div id="actual_hhs"></div> 
                            </div>
                        </div>
                        <div class ="row">
                            <div class="card border border-success">                               
                                <div id="jsgs_per_district"></div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
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
