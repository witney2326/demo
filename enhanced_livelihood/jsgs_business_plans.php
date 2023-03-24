<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>JSGs|Busines Plans</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
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

    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
        var agree=confirm("Are you sure you want to RATE this JSG?");
        if (agree)
        return true ;
        else
        return false ;
        }   
    </script>
</head>

<?php include '../layouts/body.php'; ?>

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
    
        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">JSGs - Busines Plans</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="jsg.php">JSG Dashboard</a></li>
                                    <li class="breadcrumb-item active">JSGs - Busines Plans</li>
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
                                    
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="jsgs_business_plans_filter1.php" method ="POST" >
                                            <div class="col-12">
                                                <label for="region" class="form-label">Region</label>
                                                
                                                    <select class="form-select" name="region" id="region"  required>
                                                        <option ></option>
                                                        <?php                                                           
                                                                $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                $i=0;
                                                                    while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                ?>
                                                                <option value ="<?php
                                                                        echo $DB_ROW_reg["regionID"];?>">
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
                                            
                                            <div class="col-12">
                                                <label for="district" class="form-label">District</label>
                                                <select class="form-select" name="district" id="district"  required disabled>
                                                    <option ></option>
                                                        <?php                                                           
                                                            $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
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
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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
                                            <h5 class="my-0 text-primary">Joint Skill Groups</h5>
                                        </div>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" style="font-size:11px;">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th>JSG code</th>
                                                            <th>JSG Name</th>             
                                                            <th>SLG/Cluster ID</th>
                                                            <th>BP Evaluation</th>
                                                            <th>BP Submitted</th>
                                                            <th>BP Evaluated</th>
                                                            <th>Ev. Result</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?Php
                                                            $query="select * from tbljsg";
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                if ($row["bp_submitted"] == 0){$bp_submitted = "No";};if ($row["bp_submitted"] == 1){$bp_submitted = "Yes";};
                                                                if ($row["bp_evaluated"] == 0){$bp_evaluated = "No";};if ($row["bp_evaluated"] == 1){$bp_evaluated = "Yes";};
                                                                if ($row["evaluation_result"] == 0){$evaluation_result = "NA";};if ($row["evaluation_result"] == 1){$evaluation_result = "Pass";};if ($row["evaluation_result"] == 2){$evaluation_result = "Fail";};
                                                                $grpID = $row["recID"];
                                                                echo "<tr>\n";
                                                                
                                                                echo "<td>".$row["recID"]."</td>\n";
                                                                echo "<td>".$row["jsg_name"]."</td>\n";
                                                                
                                                                echo "<td>".$row["groupID"]."</td>\n";
                                                                echo "<td>";
                                                                echo "<form action = 'jsg_bp_evaluate.php' method ='POST'>";
                                                                    echo '<select id="rating"  name="rating">';
                                                                        
                                                                        echo '<option value="0">NA</option>';
                                                                        echo '<option value="1">Pass</option>';
                                                                        echo '<option value="2">Fail</option>';
                                                                    echo "</select>";
                                                                    echo "<input type='hidden' id='grpID' name='grpID' value='$grpID'>";
                                                                    echo "<button type='submit' class='btn-outline-primary' name='FormSubmit' value='Submit' onClick='return confirmSubmit()'>Rate</button>";
                                                                echo "</form>";
                                                                echo "</td>";
                                                                echo "<td>\t\t$bp_submitted</td>\n";
                                                                echo "<td>\t\t$bp_evaluated</td>\n";
                                                                echo "<td>\t\t$evaluation_result</td>\n";
                                                                
                                                                echo "<td>
                                                                    <a href=\"view_JSG1.php?id=".$row['recID']."\"><i class='far fa-eye' title='View JSG' style='font-size:18px;color:purple'></i></a>
                                                                    <a onClick=\"javascript: return confirm('Are You In Receipt Of Business Plan For This JSG? ');\" href=\"jsg_submit_bp.php?id=".$row['recID']."\"><i class='fa fa-check' title='Accept BP for JSG' style='font-size:18px;color:green'></i></a>
                                                                    
                                                                    
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

        <?php include '../layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include '../layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include '../layouts/vendor-scripts.php'; ?>

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