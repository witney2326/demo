<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Basic Livelihood</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
     <?php include 'layouts/config.php'; ?>
    

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
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


<?php include 'layouts/body.php'; ?>

<?php
                        
                //include "layouts/config.php"; // Using database connection file here
                
               

            if(isset($_POST['Submit']))
            {
                
                if(isset($_POST['region'])) {
                    $region =$_POST['region'];
                   $region = "Not Set";

                }
                if(isset($_POST['district'])) {
                    $district =$_POST['district'];
                   $district = "Not Set";

                }
                if(isset($_POST['ta'])) {
                    $ta =$_POST['ta'];
                   $ta = "Not Set";

                }
                if(isset($_POST['gvh'])) {
                    $gvh =$_POST['gvh'];
                   $gvh = "Not Set";

                }
                if(isset($_POST['village'])) {
                    $village =$_POST['village'];
                   $village = "Not Set";

                }
                
                    
                   
               // $result=mysqli_query($link,"insert into tblbasic_beneficiary(hhcode,sppcode,hhname,nationalID,hhdob, regionID, districtID, taID, gvhID, village, sppname, sex, clusterID, groupID ) 
               // values('$hhcode','$progcode','$hhname','$nationalID','$hhdob', '$region', '$district', '$ta', '$gvh', '$village', '$progname', '$sex, '$cluster', '$group')");
               $result=mysqli_query($link,"insert into tblbasic_beneficiary(regionID, districtID, taID, gvhID, village) values('$region', '$district', '$ta', '$gvh', '$village')");       
                if($result)
                    { mysqli_close($link); // Close connection
                        echo "succes";
                            
                } 
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
                            <h4 class="mb-sm-0 font-size-18">Basic Livelihood</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Basic Livelihood</li>
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
                                        <a class="nav-link" data-bs-toggle="tab" href="#Beneficiaries" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">HHs</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#awareness" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Awareness</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#mobilisation" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">SLG Mobn</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#SLG-management" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Groups</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#member-Management" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Members</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Training" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Trainings</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#cbdra" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">CBDRA</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#nutrition" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Nutrition</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reports" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Reports</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                
                                <!-- end -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <p class="mb-0">
                                            
                                            <!-- start here -->
                                            <div class="row">
                        
                                                <div class="card-header bg-transparent border-primary">
                                                    <div class="card-group">
                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                
                                                                        <div class="card-body">
                                                                            <div class="d-flex">
                                                                                <div class="flex-grow-1">
                                                                                    <p class="text-muted fw-medium">Enrolled HHs</p>
                                                                                    <?php
                                                                                        $result = mysqli_query($link, 'SELECT COUNT(hhcode) AS value_sum FROM tblbasic_beneficiary'); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $sum = $row['value_sum'];
                                                                                    ?>
                                                                                        <h4 class="mb-0">
                                                                                            <div class="container">
                                                                                                <div class="mb-0"><?php echo "" . $sum;?></div>
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
                                                                
                                                            <!-- -->
                                                            </div>
                                                        </div>
                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            <p class="text-muted fw-medium">SLGs Formed</p>
                                                                            <?php
                                                                                        $result = mysqli_query($link, 'SELECT COUNT(groupID) AS value_sum FROM tblgroup'); 
                                                                                        $row = mysqli_fetch_assoc($result); 
                                                                                        $sum = $row['value_sum'];
                                                                                    ?>
                                                                                        <div class="container">
                                                                                            <h4><div class="mb-0"><?php echo "" . $sum;?></div></h4>
                                                                                        </div>
                                                                            
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
                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            <p class="text-muted fw-medium">HH Trained in MC</p>
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

                                                        <div class="card border">
                                                            <img src="..." class="card-img-top" alt="">
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1">
                                                                            <p class="text-muted fw-medium">Animators Trained</p>
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
                                            <!-- end here -->
                                             
                                            <!-- end here row1 -->

                                            <!-- pie chart -->
                                            <div class = "row">
                                                
                                                <div class = "col-lg-6">
                                                    <div class="card border border-success">
                                                        <div class="card-header bg-transparent border-primary">
                                                            <h5 class="my-0 text-primary">Disaster Severity</h5>
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
                                                                                   
                                        </p>
                                    </div>
                                    
                                    <div class="tab-pane" id="Beneficiaries" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Beneficiary Households</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href ="basic_livelihood_hh_mgt.php">Click to go to Household management</a>
                                                    </div>
                                            </div>
                                        </p>
                                    </div>

                                    <div class="tab-pane" id="awareness" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary">Sensitization and Awareness Meetings</h5>
                                                    </div>
                                                    
                                                    <!-- start -->
                                                    <div class="card border border-primary">
                                                        
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"></h5>
                                                            <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="insertBasicAwarenessMeeting.php" method="post">
                                                                <div class="col-12">
                                                                    <label for="region" class="form-label">Region</label>
                                                                    <div>
                                                                        <select class="form-select" name="region" id="region" required>
                                                                            <option selected value = ""></option>
                                                                            <?php                                                           
                                                                                    $dis_fetch_query = "SELECT name FROM tblregion";                                                  
                                                                                    $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                    $i=0;
                                                                                        while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                                    ?>
                                                                                    <option>
                                                                                        <?php
                                                                                            echo $DB_ROW_reg["name"];
                                                                                        ?>
                                                                                    </option>
                                                                                    <?php
                                                                                        $i++;
                                                                                            }
                                                                                ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select a valid Malawi region.
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <select class="form-select" name="district" id="district" required>
                                                                        <option selected value="$district" ></option>
                                                                            <?php                                                           
                                                                                $dis_fetch_query = "SELECT DistrictName FROM tbldistrict";                                                  
                                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Malawi district.
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="sectorID" class="form-label">Sector</label>
                                                                    <select class="form-select" name="sectorID" id="sectorID" required>
                                                                        <option></option>
                                                                        <option value="01">DEC</option>
                                                                        <option value="02">CSSC</option>
                                                                        <option value="03">ADC</option>
                                                                        <option value="04">TWG</option>
                                                                        <option value="05">DSSC</option>
                                                                        <option value="06">Extension Workers</option>
                                                                        <option value="07">Beneficiaries</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Sector.
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="orientationDate" class="form-label">Orientation Date</label>
                                                                    <input type="date" name="orientationDate" id="orientationDate" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid date.
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="NoOrientedF" class="form-label">No. Females Oriented</label>
                                                                    <input class="form-text" name="NoOrientedF" id="NoOrientedF" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid number.
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-12">
                                                                    <label for="NoOrientedM" class="form-label">No. Males Oriented</label>
                                                                    <input class="form-text" name="NoOrientedM" id="NoOrientedM" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid number.
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary w-md" name="submit" value="submit">Submit Meeting Details</button>
                                                                </div>
                                                            </form>                                             
                                                            
                                                        </div>
                                                    </div>
                                            
                                            <!-- start here -->
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h6 class="my-0 text-primary">Meetings Conducted</i></h6>
                                                </div>
                                                <h5 class="card-title mt-0"></h5>
                                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Meeting</th>
                                                            <th>Region</th>
                                                            <th>District</th>
                                                            <th>Sector</th>
                                                            <th>Orientation Date</th>
                                                            <th>No. Females</th>
                                                            <th>No.Males</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?Php
                                                            
                                                            $query="select * from tblawareness_meetings";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                            echo "<tr>\n";
                                                                
                                                            
                                                                echo "<td>".$row["meetingID"]."</td>\n";
                                                                echo "<td>".$row["regionID"]."</td>\n";
                                                                echo "<td>".$row["DistrictID"]."</td>\n";
                                                                echo "<td>".$row["sectorID"]."</td>\n";
                                                                echo "<td>".$row["orientationDate"]."</td>\n";
                                                                echo "<td>".$row["femalesNo"]."</td>\n";
                                                                echo "<td>".$row["malesNo"]."</td>\n";
                                                                
                                                                
                                                                echo "<td>
                                                                <a href=\"basicAwarenessMeetingview.php?id=".$row['meetingID']."\">view</a>   
                                                                    
                                                                </td>\n";

                                                            echo "</tr>\n";
                                                            }
                                                            $result_set->close();
                                                            }                          
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <!-- end here -->
                                            </div>
                                            
                                            </p>
                                            
                                    </div>
                                    </div>

                                    <div class="tab-pane" id="reports" role="tabpanel">
                                        <p class="mb-0">
                                        <div class="card border border-primary">
                                            <div class="card-header bg-transparent border-primary">
                                                <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Basic Livelihood Reports</h5>
                                                </div>
                                                <div class="card-body">
                                                    <a href ="">Click to go to Basic Livelihood Reports</a>
                                                </div>
                                        </div>
                                        </p>
                                    </div>

                                    <div class="tab-pane" id="SLG-management" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><a href="basic_livelihood_slg_mgt2.php">Savings and Loan Groups Management</a></h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="member-Management" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><a href="basic_livelihood_member_mgt.php">Savings and Loan Groups-Members</a></h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="Training" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><a href="basic_livelihood_training.php">Group and Member Training</a></h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    
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

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

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
