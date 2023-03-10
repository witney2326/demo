<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Psychosocial Clinics Reports</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include 'layouts/body.php'; ?>

<?php 
    if(isset($_GET['Submit']))
    {   
        $region = $_GET['region'];
        $district = $_GET['district'];
        $ta = $_GET['ta'];
     
    }
    
        function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }
    
        function get_sector_name($link, $scode)
        {
        $rg_query = mysqli_query($link,"select name from tblsector where id='$scode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }

        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
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
                            <h4 class="mb-sm-0 font-size-18">Psychosocial Clinics Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_pyschosocial_clinics.php">Basic Livelihood Psychosocial Clinics</a></li>
                                    <li class="breadcrumb-item active">Psychosocial Clinics Reports</li>
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
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#hotspots" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Psychosocial Clinics</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#district-summary" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Summary Clinics Per District</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#iga" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">National Summary</span>
                                        </a>
                                    </li>
   
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    
                                    <div class="tab-pane active" id="hotspots" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Clinics Formed</h5>
                                                    </div>

                                                    

                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        <th>Meeting ID</th>
                                                                        <th>District</th>
                                                                        <th>Sector</th>
                                                                        <th>No, Females</th>
                                                                        <th>No. Males</th>
                                                                        <th>Date</th>
                                                                        
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="SELECT meetingID,DistrictID,sectorID, femalesNo, malesNo, orientationDate
                                                                        FROM tblawareness_meetings order by DistrictID";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            $col_value = dis_name($link,$row["DistrictID"]);
                                                                            $sector_name = get_sector_name($link,$row["sectorID"]);
                                                                        echo "<tr>\n";
                                                                            
                                                                            echo "<td>".$row["meetingID"]."</td>\n";
                                                                            echo "\t\t<td>$col_value</td>\n";                                                                          
                                                                            
                                                                            echo "\t\t<td>$sector_name</td>\n"; 
                                                                            echo "<td>".$row["femalesNo"]."</td>\n";
                                                                            echo "<td>".$row["malesNo"]."</td>\n";
                                                                            echo "<td>".$row["orientationDate"]."</td>\n";
                                                                            
                                                                            
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
                                        </p>
                                    </div>
                                
                                    
                                    

                                    <div class="tab-pane" id="iga" role="tabpanel">
                                        <p class="mb-0">
                                            
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Summary Per Region</h5>
                                                    </div>

                                                    <form action="exporttoexcel6.php">
                                                        <div class="btn-group" role="group" aria-label="Basic example" style{"50"}>
                                                            <button type="button" class="btn btn-secondary">Copy</button>
                                                            <button type="submit" class="btn btn-secondary" value="Export to Excel" name="btn">Excel</button>
                                                            <button type="button" class="btn btn-secondary">PDF</button>
                                                            <button type="button" class="btn btn-secondary">Column Visibility</button>   
                                                        </div>
                                                    </form>

                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>

                                                        

                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>Region</th>
                                                                        <th>No Of Meetings</th>
                                                                        <th>No.Males</th>
                                                                        <th>No.Females</th>
                                                                        
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="SELECT tblregion.name, COUNT(tblawareness_meetings.meetingID) as meetings, sum(malesNo) as smales, sum(femalesNo) as sfemales
                                                                        FROM tblawareness_meetings
                                                                        inner join tblregion on tblawareness_meetings.regionID = tblregion.regionID
                                                                        GROUP BY tblregion.name";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                        echo "<tr>\n";
 
                                                                            echo "<td>".$row["name"]."</td>\n";                                                                         
                                                                            echo "<td>".$row["meetings"]."</td>\n";
                                                                            echo "<td>".$row["smales"]."</td>\n";
                                                                            echo "<td>".$row["sfemales"]."</td>\n";
                                                                            
                                                                            
                                                                            
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
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="district-summary" role="tabpanel">
                                        <p class="mb-0">
                                            
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Clinics Conducted Per District</h5>
                                                    </div>

                                                    <form action="exporttoexcel5.php">
                                                        <div class="btn-group" role="group" aria-label="Basic example" style{"50"}>
                                                            <button type="button" class="btn btn-secondary">Copy</button>
                                                            <button type="submit" class="btn btn-secondary" value="Export to Excel" name="btn">Excel</button>
                                                            <button type="button" class="btn btn-secondary">PDF</button>
                                                            <button type="button" class="btn btn-secondary">Column Visibility</button>   
                                                        </div>
                                                    </form>

                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>

                                                        

                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>District</th>
                                                                        <th>No Of Meetings</th>
                                                                        <th>No.Males</th>
                                                                        <th>No.Females</th>
                                                                        
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="SELECT tbldistrict.DistrictName,COUNT(tblawareness_meetings.meetingID) as meetings, sum(malesNo) as smales, sum(femalesNo) as sfemales
                                                                        FROM tblawareness_meetings 
                                                                        INNER JOIN tbldistrict  on tblawareness_meetings.DistrictID  = tbldistrict.DistrictID 
                                                                        GROUP BY tbldistrict.DistrictName;";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                        echo "<tr>\n";
 
                                                                            echo "<td>".$row["DistrictName"]."</td>\n";                                                                         
                                                                            echo "<td>".$row["meetings"]."</td>\n";
                                                                            echo "<td>".$row["smales"]."</td>\n";
                                                                            echo "<td>".$row["sfemales"]."</td>\n";
                                                                            
                                                                            
                                                                            
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