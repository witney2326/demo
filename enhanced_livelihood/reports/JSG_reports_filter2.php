<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Joint Skill Groups Reports</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
   <link href="..//assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
   
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
        $region = $_POST["region"];
        $district = $_POST["district"];

        function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }

        function spp_name($link, $sppcode)
        {
        $rg_query = mysqli_query($link,"select progName from tblspp where progID='$sppcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['progName'];
        }
    
        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }

        function bustype($link, $ID)
        {
        $dis_query = mysqli_query($link,"select name from tbliga_types where ID='$ID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
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
                            <h4 class="mb-sm-0 font-size-18">Joint Skill Groups Per Case Worker</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="enhancedReports.php">Enhanced Livelihood Reports</a></li>
                                    <li class="breadcrumb-item active">JSG Reports</li>
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
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"></i>JSG Filter</h5>
                                    </div>
                                    <div class="card-body">
                                        
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="JSG_reports_filter3.php" method ="POST" >
                                            
                                            <div class="col-12">
                                                <label for="region" class="form-label">Region</label>
                                                    <div>
                                                        <select class="form-select" name="region" id="region"  required>
                                                            <option selected value="<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="district" class="form-label">District</label>
                                                <select class="form-select" name="district" id="district"  required>
                                                    <option selected value="<?php echo $district;?>" ><?php echo dis_name($link,$district); ?></option>       
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="cw" class="form-label">Case Worker</label>
                                                <select class="form-select" name="cw" id="cw" required disabled>
                                                    <option></option>
                                                        <?php                                                           
                                                            $cw_fetch_query = "SELECT cwID,cwName FROM tblcw where districtID ='$district'";                                                  
                                                            $result_cw_fetch = mysqli_query($link, $cw_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_cw = mysqli_fetch_array($result_cw_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_cw["cwID"]; ?>">
                                                                <?php echo $DB_ROW_cw["cwName"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Case worker.
                                                </div>
                                            </div>
                        
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                <INPUT TYPE="button" class="btn btn-secondary w-md" style="width:120px" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </form>                                             
                                    </div>
                                </div>

                                
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary">Joint Skill Groups</h5>
                                    </div>
                                        <div class="card-body">

                                            <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                            
                                                <thead>
                                                    <tr>
                                                        <th>JSG Name</th>
                                                        <th>Group Name & Type</th>
                                                        <th>Bus Type</th>
                                                        <th>M</th>
                                                        <th>F</th>
                                                        <th>Total</th>
                                                        <th>BP Sub</th>
                                                        <th>BP Evaltd</th>
                                                        <th>Result</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?Php
                                                        $query="SELECT * from tbljsg where districtID = '$district'";

                                                        //Variable $link is declared inside config.php file & used here
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $check = substr($row["groupID"], 5, 3);
                                                              
                                                            if (($check == "CLU") or ($check == "CLS")){
                                                            $gpID =   $row["groupID"];                                                  
                                                            $name_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$gpID'"); // select query
                                                            while($rg = mysqli_fetch_array($name_query)){
                                                            $grp_name = $rg['ClusterName']." "."Cluster";}}
                                                
                                                            if ($check == "SLG"){
                                                            $gpID =   $row["groupID"];
                                                            $grpname_query = mysqli_query($link,"select groupname from tblgroup where groupID='$gpID'"); // select query
                                                            while($rg = mysqli_fetch_array($grpname_query)){
                                                            $grp_name = $rg['groupname']." "."SLG";}} 
                                                            
                                                            $busitype = bustype($link,$row["type"]);
                                                            $totalM = $row["no_male"]+$row["no_female"];
                                                            if($row["bp_submitted"] == '1'){$bp_submitted ="Yes";}else{$bp_submitted ="No";}
                                                            if($row["bp_evaluated"] == '1'){$bp_evaluated ="Yes";}else{$bp_evaluated ="No";}
                                                            if($row["evaluation_result"] == '1'){$evaluation_result ="Yes";}else{$evaluation_result ="No";}
                                                        echo "<tr>\n";
                                                                                                                       
                                                            echo "<td>".$row["jsg_name"]."</td>\n";
                                                            echo "<td>\t\t$grp_name</td>\n";
                                                            echo "<td>\t\t$busitype</td>\n";
                                                            echo "<td>".$row["no_male"]."</td>\n";
                                                            echo "<td>".$row["no_female"]."</td>\n";
                                                            echo "\t\t<td>$totalM</td>\n";
                                                            echo "<td>\t\t$bp_submitted</td>\n";
                                                            echo "<td>\t\t$bp_evaluated</td>\n";
                                                            echo "<td>\t\t$evaluation_result</td>\n";
                                                            
                                                            
                                                        echo "</tr>\n";
                                                        }
                                                        $result_set->close();
                                                        }  
                                                                            
                                                    ?>
                                                </tbody>
                                            </table>
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