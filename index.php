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
                                                                            $result = mysqli_query($link, 'SELECT COUNT(hhcode) AS value_sum FROM tblbasic_beneficiary'); 
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
                                    <h5 class="my-0 text-primary">Beneficiary Enrolment BL</h5>
                                </div>
                                <div id="piechart"></div> 
                            </div>
                        </div>
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">Joint Skills</h5>
                                </div>
                                
                            </div>
                        </div>   
                    </div>
                    
                    <div class = "row">
                                                
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">Youth Challenge Support</h5>
                                </div>
                                <div id="piechart"></div> 
                            </div>
                        </div>
                        <div class = "col-lg-6">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">Savings Mobilisation</h5>
                                </div>
                                <div id="barchart"></div> 
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
