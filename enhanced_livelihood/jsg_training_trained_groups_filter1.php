<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>Training Management</title>
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
</head>

<?php include '../layouts/body.php'; ?>
<?php include '../lib.php'; ?>

<?php 

if (($_SESSION["user_role"]== '03')) 
    {
        $region = $_SESSION["user_reg"];
    }
else
    {
        $region = $_POST['region'];
    }

    
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '../layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Trained JSGs</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="jsg_training_check.php">JSG Training Management</a></li>
                                    <li class="breadcrumb-item active">Trained JSGs</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="link" href="jsg_training_check" role="link">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">JSGs</span>
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active"  href="javascript:void(0);" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">Trained JSGs</span>
                        </a>
                    </li>
                                                        
                    <li class="nav-item waves-effect waves-light">
                        <a class="link"  href="enhancedReports.php" role="link">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">JSGs Training Reports</span>
                        </a>
                    </li>
                    
                </ul>
                <div class="col-xl-12">
                    <div class="card border border-primary">
                        
                        <div class="card-body ">
                            <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="jsg_training_trained_groups_filter2.php" method ="POST" >
                                <div class="col-12">
                                    <label for="region" class="form-label">Region</label>
                                    <div>
                                        <select class="form-select" name="region" id="region"  required>
                                            <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>    
                                        </select>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="district" class="form-label">District</label>
                                    <select class="form-select" name="district" id="district"  required >
                                        <option></option>
                                            <?php                                                           
                                                $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict where regionID = '$region'";                                                  
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
                                        <option selected  value="$ta"></option>
                                        <?php                                                           
                                                $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                $i=0;
                                                    while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                ?>
                                                <option>
                                                    <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                    $i++;
                                                        }
                                            ?>
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
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary">Trained JSGs in: <?php echo get_rname($link,$region); ?> Region</h5>
                        </div>
                        <div class="card-body">
                        <h7 class="card-title mt-0"></h7>
                            
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                        <th>JSG ID</th>
                                        <th>JSG Name</th>
                                        <th>Groupcode</th>
                                        <th>Group Name</th>
                                        <th>Group Type</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            $query="select * from tbljsg_trainings inner join tblgroup on tbljsg_trainings.groupID = tblgroup.groupID where tblgroup.regionID = '$region'";

                                            //Variable $link is declared inside config.php file & used here
                                                
                                            if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                    $check = substr($row["groupID"], 5, 3);
                                                        if ($check == "SLG"){$groupname = grp_name($link,$row["groupID"]);$type = "SL Group";}
                                                        if (($check == "CLU") or ($check == "CLS")){$groupname = cls_name($link,$row["groupID"]);$type = "Cluster";}
                                                    $groupname = jsg_name($link,$row["jsgID"]);
                                                    echo "<tr>\n";

                                                        echo "<td>".$row["jsgID"]."</td>\n";
                                                        echo "<td>".jsg_name($link,$row["jsgID"])."</td>\n";
                                                        echo "<td>".$row["groupID"]."</td>\n";
                                                        echo "<td>\t\t$groupname</td>\n";
                                                        echo "<td>\t\t$type</td>\n";
                                                        echo "<td>\t\t</td>\n";
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