<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG |Add New Beneficiary</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

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
       include "layouts/config.php";
       $id = $_GET['id']; // get id through query string
       $query="select * from tblgroup where groupID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["groupname"];
                $regionID = $row["regionID"];
                $DistrictID= $row["DistrictID"];
                $TAID= $row["TAID"];
                $gvhID= $row["gvhID"];
                $cohort = $row["cohort"];
            }
            $result_set->close();
        }

        if(isset($_POST['Submit']))
        {    
            $groupID = $_POST['group_id'];
            $DistrictID = $_POST['district'];
            $spp_programme = $_POST['spp_programme'];
            $hhcode = $_POST['hhcode'];

            if  (empty($hhcode))
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Please Enter Household code !");'; 
                echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
                echo '</script>';
            }
            else
            {
                $sql = "INSERT INTO tblbeneficiaries (sppCode,spProg,regionID,districtID,groupID,cohort)
                VALUES ('$hhcode','$spp_programme','$regionID','$DistrictID','$groupID','$cohort')";
                if (mysqli_query($link, $sql)) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("SLG Member Record has been added successfully !");'; 
                    echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
                mysqli_close($link);
            }
        }
        
            function get_rname($link, $rcode)
            {
            $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
            while($rg = mysqli_fetch_array($rg_query)){
               return $rg['name'];
            };// fetch data
            
            }
    
            function dis_name($link, $disID)
            {
            $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
            while($dis = mysqli_fetch_array($dis_query)){
               return $dis['DistrictName'];
            };// fetch data
            
            
            }

            function ta_name($link, $taID)
            {
            $dis_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
            $tame = mysqli_fetch_array($dis_query);// fetch data
            return $tame['TAName'];
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
                            <h4 class="mb-sm-0 font-size-18">SLG New Member</h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">

                        <div class="card border border-success">
                            <div class="card-header bg-transparent border-success">
                                <h5 class="my-0 text-success">New Member for :<?php echo $groupname; ?></h5>
                            </div>
                            <div class="card-body">
                                
                                <form method="POST" action="">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="group_id" class="form-label">Group ID</label>
                                                <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="group_name" class="form-label">SL Group Name</label>
                                                <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="region" class="form-label">Region</label>
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo $regionID ; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="district" class="form-label">District</label>
                                                <input type="text" class="form-control" id="district" name = "district" value="<?php echo $DistrictID; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ta" class="form-label">Traditional Authority</label>
                                                <input type="text" class="form-control" id="ta" name ="ta" value = "<?php echo $TAID; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="gvh" class="form-label">Group Village Head</label>
                                                <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="cohort" class="form-label">Cohort</label>
                                                <input type="text" class="form-control" id="cohort" name = "cohort" value="<?php echo $cohort ; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="spp_programme" class="form-label">SP Programme</label>
                                                <select class="form-select" id="spp_programme" name ="spp_programme" required>
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT progID, progName FROM tblspp";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["progID"]; ?>">
                                                            <?php echo $DB_ROW_spp["progName"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="hhcode" class="form-label">Household Code</label>
                                                <input type="text" class="form-control" id="hhcode" name="hhcode">
                                            </div>

                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px" name="Submit" value="Submit">Save New Record</button>
                                                
                                                
                                            </div>                                   
                                        </div>
                                    </div>
                                </form>

                                <form action="basicSLGGroupMembers.php" method="POST">
                                    <input type="hidden" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>"readonly>               
                                    <button type="submit" class="btn btn-btn btn-outline-success w-md"  name="Update_Group_Membership" value="Update_Group_Membership">Member Management</button> 
                                </form>
                                
                                
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

</body>

</html>