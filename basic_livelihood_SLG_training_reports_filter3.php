<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Training Report</title>
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
   
        $region = $_GET['region'];
        $district = $_GET['district'];
        $cw = $_GET['cw'];
     
    
    function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }
    
        function cw_name($link, $cwcode)
        {
        $rg_query = mysqli_query($link,"select cwName from tblcw where cwID='$cwcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['cwName'];
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
                            <h4 class="mb-sm-0 font-size-18">SLG Training Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basicReports.php">Basic Livelihood Reports</a></li>
                                    <li class="breadcrumb-item active">SLG Training Reports</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
 
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"></i>Report Filter</h5>
                    </div>
                    <div class="card-body">
                       
                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action=".php" method ="GET" >
                            
                            <div class="col-12">
                                <label for="region" class="form-label">Region</label>
                                <div>
                                    <select class="form-select" name="region" id="region" value ="<?php echo $region;?>" required>
                                        <option selected value="<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="district" class="form-label">District</label>
                                <select class="form-select" name="district" id="district" value ="<?php echo $district?>" required>
                                    <option selected value="<?php echo $district?>"><?php echo dis_name($link,$district);?></option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="cw" class="form-label">Case Worker</label>
                                <select class="form-select" name="cw" id="cw" value ="<?php echo $cw;?>"required >
                                    <option selected value="<?php echo $cw;?>"><?php echo cw_name($link,$cw);?></option>
                                </select>
                            </div>
                                

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                <INPUT TYPE="button" class="btn btn-secondary w-md" style="width:120px" VALUE="Back" onClick="history.go(-1);">
                            </div>
                        </form>                                             
                        <!-- End Here -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary">Training Report</h5>
                        </div>

                        

                        <div class="card-body">
                        <h7 class="card-title mt-0"></h7>

                            

                                <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>SLG Name</th>
                                            <th>Cohort</th>
                                            <th>GD</th>
                                            <th>FLT</th>
                                            <th>BMT</th>
                                            <th>RK</th>
                                            <th>BK</th>
                                            <th>Safeguards</th>
                                            <th>Gender</th>
                                            <th>DRA</th>
                                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            $query="select distinct tblgroup.groupname,tblgroup.cohort,tblgroup.districtID, tblgroup.groupID from tblgrouptrainings inner join tblgroup on tblgrouptrainings.groupID = tblgroup.groupID where tblgroup.cwID = '$cw';";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                $col_value = dis_name($link,$row["districtID"]);

                                                $id = $row["groupID"];
                                                $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='01'))";
                                                    if ($result_set_GD = $link->query($query_training)) {
                                                        while($row_GD = $result_set_GD->fetch_array(MYSQLI_ASSOC))
                                                        { $tGD = $row_GD["TrainingID"];} } 
                                                         if (isset($tGD) >0) {$GD ="Yes";} else {$GD ="No";}

                                                $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='02'))";
                                                    if ($result_set_FLT = $link->query($query_training)) {
                                                        while($row_FLT = $result_set_FLT->fetch_array(MYSQLI_ASSOC))
                                                        { $tFLT = $row_FLT["TrainingID"];} } 
                                                         if (isset($tFLT) >0) {$FLT ="Yes";} else {$FLT ="No";} 

                                                $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='03'))";
                                                    if ($result_set_BMT = $link->query($query_training)) {
                                                        while($row_BMT = $result_set_BMT->fetch_array(MYSQLI_ASSOC))
                                                        { $tBMT = $row_BMT["TrainingID"];} } 
                                                         if (isset($tBMT) >0) {$BMT ="Yes";} else {$BMT ="No";}
                                                         
                                                $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='04'))";
                                                    if ($result_set_RK = $link->query($query_training)) {
                                                        while($row_RK = $result_set_RK->fetch_array(MYSQLI_ASSOC))
                                                        { $tRK = $row_RK["TrainingID"];} } 
                                                         if (isset($tRK) >0) {$RK ="Yes";} else {$RK ="No";} 

                                                         $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='05'))";
                                                    if ($result_set_BK = $link->query($query_training)) {
                                                        while($row_BK = $result_set_BK->fetch_array(MYSQLI_ASSOC))
                                                        { $tBK = $row_BK["TrainingID"];} } 
                                                         if (isset($tBK) >0) {$BK ="Yes";} else {$BK ="No";}

                                                $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='06'))";
                                                    if ($result_set_SFG = $link->query($query_training)) {
                                                        while($row_SFG = $result_set_SFG->fetch_array(MYSQLI_ASSOC))
                                                        { $tSFG = $row_SFG["TrainingID"];} } 
                                                         if (isset($tSFG) >0) {$SFG ="Yes";} else {$SFG ="No";} 

                                                $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='07'))";
                                                    if ($result_set_GND = $link->query($query_training)) {
                                                        while($row_GND = $result_set_GND->fetch_array(MYSQLI_ASSOC))
                                                        { $tGND = $row_GND["TrainingID"];} } 
                                                         if (isset($tGND) >0) {$GND ="Yes";} else {$GND ="No";}
                                                         
                                                $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='08'))";
                                                    if ($result_set_DRA = $link->query($query_training)) {
                                                        while($row_DRA = $result_set_DRA->fetch_array(MYSQLI_ASSOC))
                                                        { $tDRA = $row_DRA["TrainingID"];} } 
                                                         if (isset($tDRA) >0) {$DRA ="Yes";} else {$DRA ="No";}

                                            echo "<tr>\n";
                                                
                                                echo "<td>".$row["groupname"]."</td>\n";                                                                      
                                                echo "<td>".$row["cohort"]."</td>\n";
                                                echo "<td>\t\t$GD</td>\n";
                                                echo "<td>\t\t$FLT</td>\n";
                                                echo "<td>\t\t$BMT</td>\n";
                                                echo "<td>\t\t$RK</td>\n";
                                                echo "<td>\t\t$BK</td>\n";
                                                echo "<td>\t\t$SFG</td>\n";
                                                echo "<td>\t\t$GND</td>\n";
                                                echo "<td>\t\t$DRA</td>\n";
                                                
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