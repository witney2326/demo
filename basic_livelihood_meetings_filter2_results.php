<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>Sensitization Meetings</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
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
    if (($_SESSION["user_role"] == '04')) 
    {
        $region = $_SESSION["user_reg"];
        $district = $_SESSION["user_dis"];
    }
    else
    {
        $region = $_POST['region'];
        $district = $_POST['district'];  
    }
    
    
    function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }
    
        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }

        function r_name($link, $rcode)
        {
        $region_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $dis = mysqli_fetch_array($region_query);// fetch data
        return $dis['name'];
    }

    function s_name($link, $scode)
        {
        $sector_query = mysqli_query($link,"select name from tblsector where id='$scode'"); // select query
        $dis = mysqli_fetch_array($sector_query);// fetch data
        return $dis['name'];
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
                            <h4 class="mb-sm-0 font-size-18">Sensitization and Awareness Meetings</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">Sensitization Meetings</li>
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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Meetings</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="basic_livelihood_new_meeting_filter2_results.php" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Meeting</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="basic_livelihood_cbdra.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Comm. Based DRA</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="basicReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Sensitization Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <!--start here -->
                                            <p align="right">
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">             
                                            </p>

                                            

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Meetings Conducted in <?php echo dis_name($link,$district); ?></h5>
                                                    </div>
                                                    <div class="card-body">
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
                                                                       
                                                                        $query="select * from tblawareness_meetings where DistrictID ='$district'";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                        $district = dis_name($link,$row["DistrictID"]);
                                                                        $region = r_name($link,$row["regionID"]);
                                                                        $sector = s_name($link,$row["sectorID"]);
                                                                        echo "<tr>\n";
                                                                            echo "<td>".$row["meetingID"]."</td>\n";
                                                                            echo "\t\t<td>$region</td>\n";
                                                                            echo "\t\t<td>$district</td>\n";
                                                                            echo "\t\t<td>$sector</td>\n";
                                                                            echo "<td>".$row["orientationDate"]."</td>\n";
                                                                            echo "<td>".$row["femalesNo"]."</td>\n";
                                                                            echo "<td>".$row["malesNo"]."</td>\n";
                                                                        echo "<td>
                                                                        <a href=\"basicAwarenessMeetingview.php?id=".$row['meetingID']."\"><i class='far fa-eye' title='Meeting Details' style='font-size:18px;color:purple'></i></a>
                                                                            <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This Meeting Record - You Must Be a Supervisor');\" href=\"basicAwarenessMeetingDelete.php?id=".$row['meetingID']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>       
                                                                            
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
                                    <!-- Here -->
                                    
                                    <!-- end here -->
                                    
                                   
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