<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Management</title>
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
        $region = $_GET["region"];
         $district = $_GET['district'];
         $ta = $_GET["ta"];

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
 
         function grp_name($link, $grpID)
         {
         $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
         $grp = mysqli_fetch_array($grp_query);// fetch data
         return $grp['groupname'];
         }
 
         function ta_name($link, $ID)
         {
         $ta_query = mysqli_query($link,"select TAName from tblta where TAID='$ID'"); // select query
         $prog = mysqli_fetch_array($ta_query);// fetch data
         return $prog['TAName'];
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
                            <h4 class="mb-sm-0 font-size-18">Household Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">Household Management</li>
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
                                            <span class="d-none d-sm-block">Households</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="basic_livelihood_HH_reports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Household Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">

                                    
                                    



                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!--start here -->
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Household Search Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_hh_mgt_filter2.php" method="GET">
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" required>
                                                                    <option selected value = "<?php echo $region; ?>"><?php echo get_rname($link,$region);?></option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid Malawi region.
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" required>
                                                                <option selected value = "<?php echo $district ;?>"><?php echo dis_name($link,$district);?></option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Malawi district.
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required>
                                                                <option selected value = "<?php $ta; ?>"><?php echo ta_name($link,$ta);?></option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid TA.
                                                            </div>
                                                        </div>

                                                        
                                                        
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="FormSubmit" value="Submit">Submit</button>
                                                            <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Beneficiary Households in <?php echo ta_name($link,$_GET['ta']); ?> TA</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>                    
                                                                    <th>hhcode</th>
                                                                        <th>Programme</th>
                                                                        <th>Region</th>
                                                                        <th>District</th>
                                                                        <th>Group</th> 
                                                                        <th>Cohort</th>
                                                                        <th>Approved?</th>                                           
                                                                        <th>View</th>
                                                                        <th>Approve</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $ta = $_GET["ta"];
                                                                        $query="select * from tblbeneficiaries where TAID = $ta";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                        $region = get_rname($link,$row["regionID"]);
                                                                        $district = dis_name($link,$row["districtID"]);
                                                                        $group = grp_name($link,$row["groupID"]);
                                                                        $prog = prog_name($link, $row["spProg"]);

                                                                        $hhstatus = $row["hhstatus"];

                                                                        if ($row["hhstatus"] == '1')
                                                                        {
                                                                            $hhstatus = 'Yes';}

                                                                        if ($row["hhstatus"] == '0')
                                                                        {
                                                                            $hhstatus = 'No';}    
                                                                        

                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["sppCode"]."</td>\n";
                                                                        echo "\t\t<td>$prog</td>\n";
                                                                        echo "\t\t<td>$region</td>\n";
                                                                        echo "\t\t<td>$district</td>\n";
                                                                        echo "\t\t<td>$group</td>\n";
                                                                        echo "<td>".$row["cohort"]."</td>\n";
                                                                        echo "\t\t<td>$hhstatus</td>\n";
                                                                        
                                                                        
                                                                        echo "<td> <a href=\"basicSLGMemberedit.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Household' style='font-size:18px'></i></a>\n";
                                                                        echo "";
                                                                        echo "<td> <a onClick=\"javascript: return confirm('Are You Sure You want To APPROVE This HOUSEHOLD - You Must Be a Supervisor');\" href=\"basicHHStatusApproval.php?id=".$row['sppCode']."\"><i class='far fa-thumbs-up' title='Approve Household' style='font-size:18px'></i></a>\n";
                                                                       
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
                                    <!-- Here -->
                                    
                                    <!-- end here -->
                                    <!-- start new --> 
                                    
                                    <!-- end new -->
                                    
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