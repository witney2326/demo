<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Training Management</title>
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
        $ta = $_GET['ta'];
        
       
     
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

        function ta_name($link, $taID)
        {
        $ta_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
        $dita = mysqli_fetch_array($ta_query);// fetch data
        return $dita['TAName'];
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
                            <h4 class="mb-sm-0 font-size-18">Fully Trained SLGs</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_training.php">Training Management</a></li>
                                    <li class="breadcrumb-item active">Trained SLGs</li>
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
                                

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!--start here -->
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"></i>Search Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate >
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="<?php if(isset($_GET['region'])) {echo $_GET['region'];} ?>" required>
                                                                    <option selected value = "$region"><?php echo get_rname($link,$_GET['region']);?></option>    
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid Malawi region.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" value ="$district" required >
                                                                <option selected value = "$district"><?php echo dis_name($link,$_GET['district']);?></option>    
                                                            </select>                                           
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required >
                                                                <option selected value = "$ta"><?php echo ta_name($link,$_GET['ta']);?></option>    
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid TA.
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-12">
                                                            
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
                                                        <h5 class="my-0 text-primary">Trained SLGs in TA: <?php echo ta_name($link,$ta); ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>Groupcode</th>
                                                                        <th>Group Name</th>
                                                                        <th>Cohort</th>
                                                                        <th>No. Males</th>
                                                                        <th>No. Females</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblgroup where TAID = '$ta'";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                         
                                                                        if ($result_set = $link->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            { 
                                                                              $id = $row["groupID"];
                                                                                $query_training="select distinct(groupID) from tblgrouptrainings where ((groupID='$id'))";
                                                                                if ($result_set_GD = $link->query($query_training)) {
                                                                                    while($row_GD = $result_set_GD->fetch_array(MYSQLI_ASSOC))
                                                                                    { 
                                                                                        
                                                                                        echo "<tr>\n";
    
                                                                                            echo "<td>".$row["groupID"]."</td>\n";
                                                                                            echo "<td>".$row["groupname"]."</td>\n";
                                                                                            echo "<td>".$row["cohort"]."</td>\n";
                                                                                            echo "<td>".$row["MembersM"]."</td>\n";
                                                                                            echo "<td>".$row["MembersF"]."</td>\n";
                                                                                            echo "<td><a href=\"basicSLGTraining_view.php?id=".$row['groupID']."\"><i class='far fa-eye' title='View Training Details' style='font-size:18px'></i></a></td>\n";
                                                                                        echo "</tr>\n";
                                                                                    } 
                                                                    
                                                                                }     
                                                                                
                                                                            
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
                                    
                                    
                                    
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <p class="mb-0">
                                            
                                        
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