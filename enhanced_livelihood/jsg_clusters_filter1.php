<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>JSG Clusters</title>
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
  
    $region = $_GET['region'];
    
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
                        <h4 class="mb-sm-0 font-size-18">Joint skill Groups - Clusters</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="jsg_formation.php">JSG Formation</a></li>
                                <li class="breadcrumb-item active">JSG Clusters</li>
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
                                                    <h5 class="my-0 text-primary">Cluster Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="jsg_clusters_filter2.php" method ="GET">
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="$region" required>
                                                                    <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" value ="" required>
                                                                <option></option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict where regionID =$region";                                                  
                                                                        $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_Dis["DistrictID"]; ?>">
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
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required disabled>
                                                                <option ></option>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid TA.
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            
                                        </p>
                                    </div>
                                    <!-- start Here -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border border-primary">
                                            <div class="card-header bg-transparent border-primary">
                                                <h5 class="my-0 text-primary">Clusters in <?php echo get_rname($link,$region); ?> Region</h5>
                                            </div>
                                            <div class="card-body">
                                            <h7 class="card-title mt-0"></h7>
                                                
                                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                    
                                                        <thead>
                                                            <tr>
                                                                
                                                                
                                                                <th>Cluster code</th>
                                                                <th>Cluster Name</th>
                                                                <th>cohort</th>
                                                                <th>GVH</th>
                                                                <th>SP Programme</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?Php
                                                                $query="select * from tblcluster where regionID = '0'";

                                                                //Variable $link is declared inside config.php file & used here
                                                                
                                                                if ($result_set = $link->query($query)) {
                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                { 
                                                                echo "<tr>\n";
                                                                    
                                                                
                                                                    echo "<td>".$row["ClusterID"]."</td>\n";
                                                                    echo "<td>".$row["ClusterName"]."</td>\n";
                                                                    echo "<td>".$row["cohort"]."</td>\n";                                                                            
                                                                    echo "<td>".$row["gvhID"]."</td>\n";
                                                                    echo "<td>".$row["programID"]."</td>\n";
                                                                    
                                                                    echo "<td>
                                                                        <a href=\"basicCLSview.php?id=".$row['ClusterID']."\"><i class='far fa-eye' title='View Cluster' style='font-size:18px'></i></a>
                                                                        <a href=\"basicCLSedit.php?id=".$row['ClusterID']."\"><i class='far fa-edit' title='Edit Cluster Details' style='font-size:18px'></i></a>
                                                                        <a href=\"add_JSG_clusters.php?id=".$row['ClusterID']."\"><i class='fa fa-users' title='Add JSG to SLG' style='font-size:18px'></i></a> 
                                                                        <a href=\"basicCLSdelete.php?id=".$row['ClusterID']."\"><i class='far fa-trash-alt' title='Delete Cluster' style='font-size:18px'></i></a>    
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
                                    <!-- start Here -->
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