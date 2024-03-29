<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>Joint Skill Groups</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config2.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include '././../../layouts/body.php'; ?>

<?php  
    $region = $_POST['region'];
    $district =$_POST['district'];
    $ta =$_POST['ta'];
    $slg =$_POST['slg'];
    
    
    function get_rname($link_cs, $rcode)
        {
        $rg_query = mysqli_query($link_cs,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }
    
        function dis_name($link_cs, $disID)
        {
        $dis_query = mysqli_query($link_cs,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }

        function cw_name($link_cs, $cwcode)
        {
        $cw_query = mysqli_query($link_cs,"select cwName from tblcw where cwID='$cwcode'"); // select query
        $cwname = mysqli_fetch_array($cw_query);// fetch data
        return $cwname['cwName'];
        }

        function grp_name($link_cs, $grpcode)
        {
        $grp_query = mysqli_query($link_cs,"select groupname from tblgroup where groupID='$grpcode'"); // select query
        $grpname = mysqli_fetch_array($grp_query);// fetch data
        return $grpname['groupname'];
        }
        function ta_name($link_cs, $taID)
        {
        $dis_query = mysqli_query($link_cs,"select TAName from tblta where TAID='$taID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['TAName'];
        }
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '././../../layouts/vertical-menu.php'; ?>

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
                        <h4 class="mb-sm-0 font-size-18">CS-EPWP BDS: Allocate and Schedule</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="jsg.php">JSG Dashboard</a></li>
                                <li class="breadcrumb-item active">Busines Development Services</li>
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
                                <!--start here -->
                                <div class="card border border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        <form class="row row-cols-lg-auto g-3 align-items-center" >
                                            <div class="col-12">
                                                <label for="region" class="form-label">Region</label>
                                                <div>
                                                    <select class="form-select" name="region" id="region" value ="$region" required>
                                                        <option selected value = "<?php echo $region;?>"><?php echo get_rname($link_cs,$region);?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="district" class="form-label">District</label>
                                                <div>
                                                    <select class="form-select" name="district" id="district" value ="$district" required>
                                                        <option selected value = "<?php echo $district;?>"><?php echo dis_name($link_cs,$district);?></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="ta" class="form-label">Traditional Authority</label>
                                                <div>
                                                    <select class="form-select" name="ta" id="ta" value ="$ta" required>
                                                        <option selected value = "<?php echo $ta;?>"><?php echo ta_name($link_cs,$ta);?></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="slg" class="form-label">SL Group</label>
                                                <select class="form-select" name="slg" id="slg"  required>
                                                    <option selected value = "<?php echo $slg;?>"><?php echo grp_name($link_cs,$slg);?></option>
                                                        
                                                </select>
                                                
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit" >Submit</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </form>                                             
                                        <!-- End Here -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-default">Joint Skill Groups For SLG:  <?php echo grp_name($link_cs,$slg); ?></h5>
                                        </div>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>  
                                                            <th>JSG code</th>
                                                            <th>JSG Name</th>   
                                                            <th>SLG/Cluster ID</th>
                                                            <th>BDS Identified?</th>
                                                            <th>BDS Allocated?</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?Php
                                                            $query="select * from tbljsg where groupID = '$slg'";

                                                            //Variable $link_cs is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link_cs->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            {
                                                            
                                                                if ($row["bds_identified"] == 0){$bds_identified = "No";};if ($row["bds_identified"] == 1){$bds_identified = "Yes";};
                                                                if ($row["bds_allocated"] == 0){$bds_allocated = "No";};if ($row["bds_allocated"] == 1){$bds_allocated = "Yes";}; 
                                                                echo "<tr>\n";
                                                                    
                                                                
                                                                    echo "<td>".$row["recID"]."</td>\n";
                                                                    echo "<td>".$row["jsg_name"]."</td>\n";
                                                                
                                                                    echo "<td>".$row["groupID"]."</td>\n";
                                                                    echo "<td>\t\t$bds_identified</td>\n";
                                                                    echo "<td>\t\t$bds_allocated</td>\n";
                                                                    echo "<td>
                                                                        <a href=\"jsg_view.php?id=".$row['recID']."\"><i class='far fa-eye' title='View JSG' style='font-size:18px;color:purple'></i></a>
                                                                        <a href=\"jsg_bds_identify.php?id=".$row['recID']."\"><i class='fas fa-id-badge' title='Training Plan' style='font-size:18px;color:orange'></i></a>
                                                                        
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

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include '././../../layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include '././../../layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include '././../../layouts/vendor-scripts.php'; ?>

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