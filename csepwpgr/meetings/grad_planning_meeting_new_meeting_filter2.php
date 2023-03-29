<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>Planning Meetings</title>
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
    if(isset($_GET['Submit']))
    {   
        $region = $_GET['region'];
        $district =$_GET['district'];
    }
    
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

        function sector_name($link_cs, $secID)
        {
        $sec_query = mysqli_query($link_cs,"select name from tblsector where id='$secID'"); // select query
        $sec = mysqli_fetch_array($sec_query);// fetch data
        return $sec['name'];
        }

        function meeeting_purpose($link_cs, $ID)
        {
        $purp_query = mysqli_query($link_cs,"select purpose from tblmeetingpurpose where id='$ID'"); // select query
        $purp = mysqli_fetch_array($purp_query);// fetch data
        return $purp['purpose'];
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
                            <h4 class="mb-sm-0 font-size-18">Graduation Planning Meetings</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation_grp_assesment.php">Graduation Assesment</a></li>
                                    <li class="breadcrumb-item active">Planning Meetings</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    
                    
                <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                <h5 class="my-0 text-primary"> New Graduation Meeting in <?php echo dis_name($link_cs,$district); ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form validate action="grad_planning_meeting_add_Meeting.php" method="post">
                                       
                                        <div class="row mb-1">
                                            
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                                    
                                            <select class="form-select" name="region" id="region" style="width:30%;" required>
                                                <option selected value="<?php echo $region; ?>"><?php echo get_rname($link_cs,$region);?></option> 
                                            </select>

                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <select class="form-select" name="district" id="district" style="width:30%;" required >
                                                <option selected value="<?php echo $district; ?>" ><?php echo dis_name($link_cs,$district); ?></option>      
                                            </select>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="sectorID" class="col-sm-2 col-form-label">Sector</label>
                                            <select class="form-select" name="sectorID" id="sectorID" style="width:30%;" required>
                                                <option ></option>
                                                <?php                                                           
                                                    $sector_fetch_query = "SELECT id, name FROM tblsector";                                                  
                                                    $result_sector_fetch = mysqli_query($link_cs, $sector_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_sector = mysqli_fetch_array($result_sector_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_sector["id"]; ?>">
                                                        <?php echo $DB_ROW_sector["name"]; ?></option><?php
                                                        $i++;
                                                            }
                                                    ?>
                                            </select>

                                            <label for="purpose" class="col-sm-2 col-form-label"> Purpose</label>
                                            <select class="form-select" name="purpose" id="purpose" style="width:30%;" required>
                                            <option></option>
                                                <?php                                                           
                                                    $meetpurpose_fetch_query = "SELECT id, purpose FROM tblmeetingpurpose ";                                                  
                                                    $result_meetpurpose_fetch = mysqli_query($link_cs, $meetpurpose_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_meetpurpose = mysqli_fetch_array($result_meetpurpose_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_meetpurpose["id"]; ?>">
                                                        <?php echo $DB_ROW_meetpurpose["purpose"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>
                                        </div>
                                                                                
                                        <div class="row mb-1">
                                            <label for="orientationDate" class="col-sm-3 col-form-label">Orientation Date</label>
                                            <input type="date" name="orientationDate" id="orientationDate" style="width:22%;" required>
                                                
                                            <div class="invalid-feedback">
                                                Please enter a valid date.
                                            </div>  
                                            
                                            <label for="NoOrientedM" class="col-sm-1 col-form-label">Males</label>
                                            <input type="text" class="form-control" id="NoOrientedM" name="NoOrientedM" value ="" style="max-width:10%;">
                                            
                                            <label for="NoOrientedF" class="col-sm-2 col-form-label">Females</label>
                                            <input type="text" class="form-control" id="NoOrientedF" name="NoOrientedF" value ="" style="max-width:10%;">
                                        </div>

                                                                               

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="submit" value="submit">Submit Meeting Details</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </div>
                                    </form>
                                    
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