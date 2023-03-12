<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Verification</title>
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

    function grp_name($link, $grpID)
    {
    $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
    $grp = mysqli_fetch_array($grp_query);// fetch data
    return $grp['groupname'];
    }

    function prog_name($link, $progID)
    {
    $prog_query = mysqli_query($link,"select progName from tblspp where progID='$progID'"); // select query
    $prog = mysqli_fetch_array($prog_query);// fetch data
    return $prog['progName'];
    }

?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Household Verification</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">Household Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                
                <!--start here -->
                <div class="card border border-primary">
                    
                    <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_hh_mgt_filter3.php" method="POST">
                            <div class="col-12">
                                <label for="region" class="form-label">Region</label>
                                <div>
                                    <select class="form-select" name="region" id="region" required>
                                        <option selected value = "<?php echo $region; ?>"><?php echo get_rname($link,$region);?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="district" class="form-label">District</label>
                                <select class="form-select" name="district" id="district" required>
                                    <option selected value = "<?php echo $district; ?>"><?php echo dis_name($link,$district);?></option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="cw" class="form-label">Case Worker</label>
                                <select class="form-select" name="cw" id="cw" required >
                                    <option></option>
                                    <?php                                                           
                                            $cw_fetch_query = "SELECT cwID,cwName FROM tblcw where districtID = '$district'";                                                  
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
                                    Please select a valid Case Worker.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="slg" class="form-label">SL Group</label>
                                <select class="form-select" name="slg" id="slg" required disabled>
                                    <option></option>
                                    <?php                                                           
                                            $slg_fetch_query = "SELECT groupID,groupname FROM tblcw";                                                  
                                            $result_slg_fetch = mysqli_query($link, $slg_fetch_query);                                                                       
                                            $i=0;
                                                while($DB_ROW_slg = mysqli_fetch_array($result_slg_fetch)) {
                                            ?>
                                            <option value="<?php echo $DB_ROW_slg["groupID"]; ?>">
                                                <?php echo $DB_ROW_slg["groupname"]; ?></option><?php
                                                $i++;
                                                    }
                                        ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid SL Group.
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="FormSubmit" value="Submit">Submit</button>
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
                            <h5 class="my-0 text-default">Beneficiary Households in <?php echo dis_name($link,$district); ?> District</h5>
                        </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>                    
                                            <th>hhcode</th>
                                            <th>Programme</th>                       
                                            <th>Group</th> 
                                            <th>Cohort</th>
                                            <th>HH checked?</th>
                                            <th>Verified?</th>
                                            <th>Approved?</th>                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            
                                            $query="select * from tblbeneficiaries where districtID = '$district'";

                                        //Variable $link is declared inside config.php file & used here
                                        
                                        if ($result_set = $link->query($query)) {
                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                        { 
                                            $region = get_rname($link,$row["regionID"]);
                                            $district = dis_name($link,$row["districtID"]);
                                            $group = grp_name($link,$row["groupID"]);
                                            $prog = prog_name($link, $row["spProg"]);

                                            $Hstatus = $row["hhstatus"];
                                            if ($Hstatus == '1'){$hhstatus = 'Yes';}
                                            if ($Hstatus == '0'){$hhstatus = 'No';}    

                                            $Hchecked = $row["prog_status_check"];
                                            if ($Hchecked == '1'){$hhchecked = 'Yes';}
                                            if ($Hchecked == '0'){$hhchecked = 'No';}  

                                            $Hverified = $row["prog_status_verified"];
                                            if ($Hverified == '1'){$hhverified = 'Yes';}
                                            if ($Hverified == '0'){$hhverified = 'No';}  

                                            
                                        echo "<tr>\n";
                                            echo "<td>".$row["sppCode"]."</td>\n";
                                            echo "\t\t<td>$prog</td>\n";
                                            echo "\t\t<td>$group</td>\n";
                                            echo "<td>".$row["cohort"]."</td>\n";
                                            echo "\t\t<td>$hhchecked</td>\n";
                                            echo "\t\t<td>$hhverified</td>\n";
                                            echo "\t\t<td>$hhstatus</td>\n";
                                            echo "<td> 
                                                <a href=\"basicSLGMemberedit.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Household' style='font-size:18px;color:purple'></i></a>
                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Verify This HOUSEHOLD on SCT Database - Be patient!');\" href=\"basicHHVerificationSCTP.php?id=".$row['sppCode']."\"><i class='fas fa-check' title='Verify Household on SCT List' style='font-size:18px;color:cadetblue'></i></a>
                                                <a onClick=\"javascript: return confirm('Are You Sure You want To APPROVE This HOUSEHOLD - You Must Be a Supervisor');\" href=\"basicHHStatusApproval.php?id=".$row['sppCode']."\"><i class='far fa-thumbs-up' title='Approve Household' style='font-size:18px;color:green'></i></a>
                                                </td>"; 
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