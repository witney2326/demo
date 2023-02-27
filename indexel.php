<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CIMIS - Enhanced Livelihood</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<?php include 'layouts/body.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> <!-- for pie chart -->



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
    var options = {'title':'Joint Skill Group Distribution', 'width':490, 'height':250};
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
        
        ['District', 'coops'],
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName as District,COUNT(tblcluster.ClusterID) as coops 
            FROM tblcluster 
            inner join tbldistrict on tblcluster.districtID = tbldistrict.DistrictID where tblcluster.registered_group = '1'
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
                
            echo "['".$row_val['District']."',".$row_val['coops']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':370, 'height':250};

        var options = {
            title: 'Coops Formed Per District',
            hAxis: {title: ''},
            vAxis: {title: 'No. Coops'},
            legend: 'none',
            series: {
            0: { color: '#002364' },
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
        ['District', 'TotalYouths'],
        
        <?php 
            $select_query = "SELECT tbldistrict.DistrictName as District, COUNT(tblycs.recID) as TotalYouths
            FROM tblycs 
            INNER JOIN tbldistrict on tbldistrict.DistrictID = tblycs.districtID 
            GROUP BY tbldistrict.DistrictName";
            $query_result = mysqli_query($link,$select_query);
            while($row_val = mysqli_fetch_array($query_result)){
            echo "['".$row_val['District']."',".$row_val['TotalYouths']."],";
            }
        ?>
        
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Youths Linkage per District', 'width':490, 'height':250};

        var options = {
            title: 'Youths Linkage per District',
            hAxis: {title: ''},
            vAxis: {title: 'No Youths'},
            legend: 'none',
            series: {
            0: { color: '#e2431e' },
          }
        };

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
                        echo '<h3><div class="alert alert-danger" role="alert">Enhanced Livelihood</div></h3>';
                    ?>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card border border-success">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <th></th>
                                            <th>Track Unit</th>
                                            <th>Target</th>
                                            <th>Achieved</th>
                                            <th></th>
                                            <tbody>
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
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($total_slgs+$total_cls2);?></td>
                                                    
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="slg_coop_formation_reports.php">more ..</a>';}  ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-layer-group' style='font-size:18px;color:darkgoldenrod'></i></th>
                                                    <td>JSGs Formed</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(recID) AS value_total FROM tbljsg'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $total = $row['value_total'];
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($total);?></td>
                                                    
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
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($v_total);?></td>
                                                    
                                                    <td><?php if ($_SESSION["user_role"] == '00'){echo '<a href="javascript: void(0);">more..</a>' ;}else{echo '<a href="slg_ycs_reports.php">more ..</a>';}  ?></td>                         
                                                </tr>

                                                <tr>
                                                    <th scope="row"><i class='fas fa-industry' style='font-size:18px; color:crimson'></i></th>
                                                    <td>Clusters In Prod. VC</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(ClusterID) AS v_total FROM tblcluster where vc_mapped = "1"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $v_total = $row['v_total'];
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($v_total);?></td>
                                                    
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-farm' style='font-size:18px; color:green'></i></th>
                                                    <td>Clusters In Lesp Prod</td>
                                                    <?php
                                                        $query = mysqli_query($link,"SELECT COUNT(recID) as Total FROM tblvc_lesp");
                                                        $row = mysqli_fetch_assoc($query);
                                                        $Total =  $row['Total'];
                                                    ?>
                                                    <td><?php echo number_format(0);?></td>
                                                    <td><?php echo "" . number_format($Total);?></td>
                                                    
                                                    <td></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                

                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card border border-success">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <th></th>
                                            <th>Track Unit</th>
                                            <th>North</th>
                                            <th>Centre</th>
                                            <th>South</th>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-layer-group' style='font-size:18px;color:darkgoldenrod'></i></th>
                                                    <td>Coops Formed</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT count(groupID) AS total_slgs_nr FROM tblgroup where ((registered_group = "1") and (regionID = "01"))'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $total_slgs_nr = $row['total_slgs_nr'];

                                                        $resultcls2 = mysqli_query($link, 'SELECT count(ClusterID) AS total_cls2_nr FROM tblcluster where ((registered_group = "1") and (regionID = "01"))'); 
                                                        $row2 = mysqli_fetch_assoc($resultcls2); 
                                                        $total_cls2_nr = $row2['total_cls2_nr'];

                                                        $result3 = mysqli_query($link, 'SELECT count(groupID) AS total_slgs_cr FROM tblgroup where ((registered_group = "1") and (regionID = "02"))'); 
                                                        $row3 = mysqli_fetch_assoc($result3); 
                                                        $total_slgs_cr = $row3['total_slgs_cr'];

                                                        $resultcls4 = mysqli_query($link, 'SELECT count(ClusterID) AS total_cls2_cr FROM tblcluster where ((registered_group = "1") and (regionID = "02"))'); 
                                                        $row4 = mysqli_fetch_assoc($resultcls4); 
                                                        $total_cls2_cr = $row4['total_cls2_cr'];
                                                        
                                                        $result5 = mysqli_query($link, 'SELECT count(groupID) AS total_slgs_sr FROM tblgroup where ((registered_group = "1") and (regionID = "03"))'); 
                                                        $row5 = mysqli_fetch_assoc($result5); 
                                                        $total_slgs_sr = $row5['total_slgs_sr'];

                                                        $resultcls6 = mysqli_query($link, 'SELECT count(ClusterID) AS total_cls2_sr FROM tblcluster where ((registered_group = "1") and (regionID = "03"))'); 
                                                        $row6 = mysqli_fetch_assoc($resultcls6); 
                                                        $total_cls2_sr = $row6['total_cls2_sr'];
                                                    ?>
                                                    <td><?php echo number_format($total_slgs_nr+$total_cls2_nr);?></td>
                                                    <td><?php echo number_format($total_slgs_cr+$total_cls2_cr);?></td>
                                                    <td><?php echo number_format($total_slgs_sr+$total_cls2_sr);?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-layer-group' style='font-size:18px;color:darkgoldenrod'></i></th>
                                                    <td>JSGs Formed</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(recID) AS value_total_nr FROM tbljsg inner join tbldistrict on
                                                        tbldistrict.DistrictID = tbljsg.districtID where tbldistrict.regionID = "01"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $value_total_nr = $row['value_total_nr'];

                                                        $result2 = mysqli_query($link, 'SELECT COUNT(recID) AS value_total_cr FROM tbljsg inner join tbldistrict on
                                                        tbldistrict.DistrictID = tbljsg.districtID where tbldistrict.regionID = "02"'); 
                                                        $row2 = mysqli_fetch_assoc($result2); 
                                                        $value_total_cr = $row2['value_total_cr'];

                                                        $result3 = mysqli_query($link, 'SELECT COUNT(recID) AS value_total_sr FROM tbljsg inner join tbldistrict on
                                                        tbldistrict.DistrictID = tbljsg.districtID where tbldistrict.regionID = "03"'); 
                                                        $row3 = mysqli_fetch_assoc($result3); 
                                                        $value_total_sr = $row3['value_total_sr'];
                                                    ?>
                                                    <td><?php echo number_format($value_total_nr);?></td>
                                                    <td><?php echo number_format($value_total_cr);?></td>
                                                    <td><?php echo number_format($value_total_sr);?></td>                         
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row"><i class='fas fa-hiking' style='font-size:18px; color:chocolate'></i></th>
                                                    <td>Youths Linked</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(recID) AS y_total_nr FROM tblycs inner join tbldistrict on
                                                        tbldistrict.DistrictID = tblycs.districtID where tbldistrict.regionID = "01"'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $y_total_nr = $row['y_total_nr'];

                                                        $result2 = mysqli_query($link, 'SELECT COUNT(recID) AS y_total_cr FROM tblycs inner join tbldistrict on
                                                        tbldistrict.DistrictID = tblycs.districtID where tbldistrict.regionID = "02"'); 
                                                        $row2 = mysqli_fetch_assoc($result2); 
                                                        $y_total_cr = $row2['y_total_cr'];

                                                        $result3 = mysqli_query($link, 'SELECT COUNT(recID) AS y_total_sr FROM tblycs inner join tbldistrict on
                                                        tbldistrict.DistrictID = tblycs.districtID where tbldistrict.regionID = "03"'); 
                                                        $row3 = mysqli_fetch_assoc($result3); 
                                                        $y_total_sr = $row3['y_total_sr'];

                                                    ?>
                                                    <td><?php echo number_format($y_total_nr);?></td>
                                                    <td><?php echo number_format($y_total_cr);?></td>
                                                    
                                                    <td><?php echo number_format($y_total_sr);?></td>                         
                                                </tr>

                                                <tr>
                                                    <th scope="row"><i class='fas fa-industry' style='font-size:18px; color:crimson'></i></th>
                                                    <td>Clusters In Production Value Chains</td>
                                                    <?php
                                                        $result = mysqli_query($link, 'SELECT COUNT(ClusterID) AS v_total_nr FROM tblcluster where ((vc_mapped = "1") and (regionID = "01"))'); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $v_total_nr = $row['v_total_nr'];

                                                        $result2 = mysqli_query($link, 'SELECT COUNT(ClusterID) AS v_total_cr FROM tblcluster where ((vc_mapped = "1") and (regionID = "02"))'); 
                                                        $row2 = mysqli_fetch_assoc($result2); 
                                                        $v_total_cr = $row2['v_total_cr'];

                                                        $result3 = mysqli_query($link, 'SELECT COUNT(ClusterID) AS v_total_sr FROM tblcluster where ((vc_mapped = "1") and (regionID = "03"))'); 
                                                        $row3 = mysqli_fetch_assoc($result3); 
                                                        $v_total_sr = $row3['v_total_sr'];

                                                    ?>
                                                    <td><?php echo number_format($v_total_nr);?></td>
                                                    <td><?php echo number_format($v_total_cr);?></td>
                                                    <td><?php echo number_format($v_total_sr);?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class='fas fa-farm' style='font-size:18px; color:green'></i></th>
                                                    <td>Clusters In LESP Production</td>
                                                    <?php
                                                        $query1 = mysqli_query($link,"SELECT COUNT(recID) as Total_nr FROM tblvc_lesp inner join tblcluster on
                                                        tblvc_lesp.ClusterID = tblcluster.ClusterID where (tblcluster.regionID = '01')");
                                                        $row1 = mysqli_fetch_assoc($query1);
                                                        $Total_nr =  $row1['Total_nr'];

                                                        $query2 = mysqli_query($link,"SELECT COUNT(recID) as Total_cr FROM tblvc_lesp inner join tblcluster on
                                                        tblvc_lesp.ClusterID = tblcluster.ClusterID where (tblcluster.regionID = '02')");
                                                        $row2 = mysqli_fetch_assoc($query2);
                                                        $Total_cr =  $row2['Total_cr'];

                                                        $query3 = mysqli_query($link,"SELECT COUNT(recID) as Total_sr FROM tblvc_lesp inner join tblcluster on
                                                        tblvc_lesp.ClusterID = tblcluster.ClusterID where (tblcluster.regionID = '03')");
                                                        $row3 = mysqli_fetch_assoc($query3);
                                                        $Total_sr =  $row3['Total_sr'];

                                                    ?>
                                                    <td><?php echo number_format($Total_nr );?></td>
                                                    <td><?php echo number_format($Total_cr );?></td>
                                                    <td><?php echo number_format($Total_sr );?></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
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
