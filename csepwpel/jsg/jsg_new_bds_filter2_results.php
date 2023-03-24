<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>JSGs|Busines Development Services</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config2.php'; ?>
    <?php include '././../../lib.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include '././../../layouts/body.php'; ?>

<?php 
  
  if (($_SESSION["user_role"] == '05') or ($_SESSION["user_role"] == '04')) 
  {
      $region = $_SESSION["user_reg"];
      $district = $_SESSION["user_dis"];
  }
  else if ((isset($_POST['region'])) and (isset($_POST['district'])))
  {
      $region = $_POST['region'];
      $district = $_POST['district'];  
  }else
  {
    header("location: jsgs_bdss.php");
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
                            <h4 class="mb-sm-0 font-size-18">New Busines Development Services</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    
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

                                <div class="row">
                                    <div class="col-8">
                                        <div class="card border border-primary">
   
                                            <div class="card-body">
                                                <h5 class="card-title mt-0"></h5>
                                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="jsg_newBDS.php" method="post">
                                                        
                                                    <div class="row">

                                                        <div class="row mb-2">
                                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-select" name="region" id="region" required style="width: 50%;">
                                                                    <option selected value="<?php echo $region;?>"><?php echo get_rname($link_cs,$region);?></option>   
                                                                </select>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="row mb-2">
                                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-select" name="district" id="district" required style="width: 50%;">
                                                                    <option selected value="<?php echo $district; ?>" ><?php echo dis_name($link_cs,$district); ?></option> 
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <label for="sectorID" class="col-sm-3 col-form-label">Busines Category</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-select" name="sectorID" id="sectorID" required style="width: 50%;">
                                                                    <option></option>
                                                                    <?php                                                           
                                                                        $sector_fetch_query = "SELECT categoryID, catname FROM tblbusines_category";                                                  
                                                                        $result_sector_fetch = mysqli_query($link_cs, $sector_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_sector = mysqli_fetch_array($result_sector_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_sector["categoryID"]; ?>">
                                                                            <?php echo $DB_ROW_sector["catname"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                                <label for="bdsname" class="col-sm-3 col-form-label">BDS Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" id="bdsname" name="bdsname" placeholder="Enter BDS name" style="width: 50%;">
                                                                </div>
                                                        </div>
                                                        
                                                    </div>

                                                    
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-outline-primary w-md" name="submit" value="submit">Submit BDS</button>
                                                            
                                                            <INPUT TYPE="button" class="btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                            
                                                        </div>

                                                    </div>
                                                </form>
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