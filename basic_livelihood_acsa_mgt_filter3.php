<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>ACSA Management</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--jQuery library file -->
  <script type="text/javascript" 
      src="https://code.jquery.com/jquery-3.5.1.js">
  </script>

  <!--Datatable plugin JS library file -->
  <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
</head>

<?php include 'layouts/body.php'; ?>

<?php 

$region = $_GET["region"];
$district = $_GET["district"];
$ta = $_GET["ta"];
        
    function issue_name($link, $icode)
    {
    $rg_query = mysqli_query($link,"select name from tblissues where id='$icode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['name'];
    }
    
    function dis_name($link, $disID)
    {
    $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
    $dis = mysqli_fetch_array($dis_query);// fetch data
    return $dis['DistrictName'];
    }

    function demo_plot_found($link, $clsID)
    {
    $place_query = mysqli_query($link,"select id from tblacsademoplot where cluster='$clsID'"); // select query
    $place = mysqli_fetch_array($place_query);// fetch data
    return $place['id'];
    }

    function lf_found($link, $clsID)
    {
    $place_query = mysqli_query($link,"select TrainingID from tblanimatortrainings where (clusterID='$clsID' and animatorType ='06')"); // select query
    $lf = mysqli_fetch_array($place_query);// fetch data
    return $lf['TrainingID'];
    }

    function get_rname($link, $rID)
    {
    $dis_query = mysqli_query($link,"select name from tblregion where regionID='$rID'"); // select query
    $dis = mysqli_fetch_array($dis_query);// fetch data
    return $dis['name'];
    }

    function ta_name($link, $tacode)
    {
    $ta_query = mysqli_query($link,"select TAName from tblta where TAID='$tacode'"); // select query
    $taname = mysqli_fetch_array($ta_query);// fetch data
    return $taname['TAName'];
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
                            <h4 class="mb-sm-0 font-size-18">Actionable Climate Smart Agriculture</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">ACSA</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#clusters" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                  
                                   
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="basicReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">ACSA Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">

                                    <div class="tab-pane active" id="clusters" role="tabpanel">
                                        <p class="mb-0">                                          
                                            <div class="row">                  
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                    
                                                            <div class="card border border-primary">
                                                                <div class="card-header bg-transparent border-primary">
                                                                    <h5 class="my-0 text-primary"></i>Cluster Search Filter</h5>
                                                                </div>

                                                                <div class="card-body">
                                                                    <h5 class="card-title mt-0"></h5>
                                                                    <form class="row row-cols-lg-auto g-3 align-items-center">
                                                                        <div class="col-12">
                                                                            <label for="region" class="form-label">Region</label>
                                                                            <select class="form-select" name="region" id="region" value ="<?php echo $region;?>"  required>
                                                                                    <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                                                                </select>
                                                                        </div>
                                                                        
                                                                        <div class="col-12">
                                                                            <label for="district" class="form-label">District</label>
                                                                            <select class="form-select" name="district" id="district" value ="<?php echo $district;?>" required >
                                                                                <option selected value="<?php echo $district;?>"><?php echo dis_name($link,$district);?></option>                                                                                   
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                                            <select class="form-select" name="ta" id="ta" value = "<?php echo $ta;?>" required >
                                                                                <option selected  value="<?php echo $ta;?>"><?php echo ta_name($link,$ta);?></option>   
                                                                            </select>
                                                                        </div>

                                                                        
                                                                        <div class="col-12">
                                                                            
                                                                            <INPUT TYPE="button" class="btn btn-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                                        </div>
                                                                    </form>                                             
                                                                    <!-- End Here -->
                                                                </div>
                                                            </div>

                                                                        <!-- start here -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border border-primary">
                                                                    <div class="card-header bg-transparent border-primary">
                                                                        
                                                                    </div>
                                                                    <div class="card-body">
                                                                    <h7 class="card-title mt-0"></h7>
                                                                        
                                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                            
                                                                                <thead>
                                                                                    <tr>                                                                                                                      
                                                                                        <th>Cluster code</th>
                                                                                        <th>Cluster Name</th>
                                                                                        <th>cohort</th>
                                                                                        <th>Lead Farmer Trained?</th>
                                                                                        <th>Demo Plot?</th>                                                         
                                                                                        <th>Action</th>                                                            
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?Php
                                                                                        $query="select * from tblcluster where taID = '$ta'";
                                                                                        
                                                                                        if ($result_set = $link->query($query)) {
                                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                                        { 
                                                                                            $found = demo_plot_found($link,$row["ClusterID"]);
                                                                                            if ($found > 0)
                                                                                            {$check = "Yes";}
                                                                                            else
                                                                                            {$check = "No";}

                                                                                            $found_lf = lf_found($link,$row["ClusterID"]);
                                                                                            if ($found_lf > 0)
                                                                                            {$check1 = "Yes";}
                                                                                            else
                                                                                            {$check1 = "No";}

                                                                                        echo "<tr>\n";                                                                                          
                                                                                            echo "<td>".$row["ClusterID"]."</td>\n";
                                                                                            echo "<td>".$row["ClusterName"]."</td>\n";
                                                                                            echo "<td>".$row["cohort"]."</td>\n";                                                                            
                                                                                            
                                                                                            echo "<td>\t\t$check1</td>\n";
                                                                                            echo "<td>\t\t$check</td>\n";
                                                                                            echo "<td>
                                                                                                <a href=\"ACSADemoPlotView.php?id=".$row['ClusterID']."\"><i class='far fa-eye' title ='View Status' style='font-size:18px'></i></a>
                                                                                                <a href=\"ACSADemoPlotEdit.php?id=".$row['ClusterID']."\"><i class='far fa-edit' title ='Edit Place' style='font-size:18px'></i></a>                                                                            
                                                                                                <a href=\"ACSADemoPlotAdd.php?id=".$row['ClusterID']."\"><i class='fas fa-plus' title ='Add Demo Plot' style='font-size:18px'></i></a>                       
                                                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This Demo Plot Record - You Must Be a Supervisor!');\" href=\"ACSADemoPlotDelete.php?id=".$row['ClusterID']."\"><i class='far fa-trash-alt' title ='Delete Demo Plot' style='font-size:18px'></i></a>
                                                                                            </td>\n";
                                                                                        echo "</tr>\n";
                                                                                        }
                                                                                        $result_set->close();
                                                                                        }  
                                                                                                            
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                            </p>
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

</body>

</html>