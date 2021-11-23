<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Sensitization Meetings</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include 'layouts/body.php'; 

function dis_name($link, $disname)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disname'"); // select query
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
                            <h4 class="mb-sm-0 font-size-18">Sensitization and Awareness Meetings</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">Sensitization Meetings</li>
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
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Meetings</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#new-meeting" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Meeting</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reports" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Sensitization Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">

                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!--start here -->
                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="" method="GET">
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" required>
                                                                    <option ></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query = "SELECT regionID,name FROM tblregion";                                                  
                                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                            ?>
                                                                            <option value=<?php echo $DB_ROW_reg["regionID"]; ?>>
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
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" required>
                                                                <option selected value="$district"></option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
                                                                        $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                        ?>
                                                                        <option value =<?php echo $DB_ROW_Dis["DistrictID"]; ?>>
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
                                                            <button type="submit" class="btn btn-primary w-md" name="FormSubmit" value="Submit">Submit</button>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Meetings Conducted In Selected District</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>                    
                                                                        <th>Meeting</th>
                                                                        <th>Region</th>
                                                                        <th>District</th>
                                                                        <th>Sector</th>
                                                                        <th>Orientation Date</th>
                                                                        <th>No. Females</th>
                                                                        <th>No.Males</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                       $selectedDistrict = $_GET["district"];
                                                                        $query="select * from tblawareness_meetings where DistrictID ='$selectedDistrict'";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                       
                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["meetingID"]."</td>\n";
                                                                        echo "<td>".$row["regionID"]."</td>\n";
                                                                        echo "<td>".$row["DistrictID"]."</td>\n";
                                                                        echo "<td>".$row["sectorID"]."</td>\n";
                                                                        echo "<td>".$row["orientationDate"]."</td>\n";
                                                                        echo "<td>".$row["femalesNo"]."</td>\n";
                                                                        echo "<td>".$row["malesNo"]."</td>\n";
                                                                        echo "<td>
                                                                        <a href=\"basicAwarenessMeetingview.php?id=".$row['meetingID']."\">view</a>   
                                                                            
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
                                        </p>
                                    </div>
                                    <!-- Here -->
                                
                                    <div class="tab-pane" id="new-meeting" role="tabpanel">
                                        <p class="mb-0">
                                        <div class="card border border-primary">
                                            <div class="card-header bg-transparent border-primary">
                                                <h5 class="my-0 text-primary">Sensitization and Awareness Meetings</h5>
                                            </div>
                                            <!-- start -->
                                            <div class="card border border-primary">
                                                        
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="insertBasicAwarenessMeeting.php" method="post">
                                                            
                                                        <div class="row">

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="region" class="form-label">Region</label>
                                                                
                                                                    <select class="form-select" name="region" id="region" required>
                                                                        <option selected value = ""></option>
                                                                        <?php                                                           
                                                                                $dis_fetch_query = "SELECT name FROM tblregion";                                                  
                                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                                ?>
                                                                                <option>
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
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <select class="form-select" name="district" id="district" required>
                                                                        <option selected value="$district" ></option>
                                                                            <?php                                                           
                                                                                $dis_fetch_query = "SELECT DistrictName FROM tbldistrict";                                                  
                                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Malawi district.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="sectorID" class="form-label">Sector</label>
                                                                    <select class="form-select" name="sectorID" id="sectorID" required>
                                                                        <option></option>
                                                                        <?php                                                           
                                                                                $sector_fetch_query = "SELECT id, name FROM tblsector";                                                  
                                                                                $result_sector_fetch = mysqli_query($link, $sector_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_sector = mysqli_fetch_array($result_sector_fetch)) {
                                                                                ?>
                                                                                <option value="<?php echo $DB_ROW_sector["id"]; ?>">
                                                                                    <?php echo $DB_ROW_sector["name"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Sector.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="purpose" class="form-label">Meeting Purpose</label>
                                                                        <select class="form-select" name="purpose" id="purpose" required>
                                                                            <option></option>
                                                                            <?php                                                           
                                                                                $meetpurpose_fetch_query = "SELECT id, purpose FROM tblmeetingpurpose";                                                  
                                                                                $result_meetpurpose_fetch = mysqli_query($link, $meetpurpose_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_meetpurpose = mysqli_fetch_array($result_meetpurpose_fetch)) {
                                                                                ?>
                                                                                <option value="<?php echo $DB_ROW_meetpurpose["id"]; ?>">
                                                                                    <?php echo $DB_ROW_meetpurpose["purpose"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please select a valid Purpose.
                                                                        </div>
                                                                   
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="orientationDate" class="form-label">Orientation Date</label>
                                                                        <input type="date" name="orientationDate" id="orientationDate" required>
                                                                            
                                                                        <div class="invalid-feedback">
                                                                            Please enter a valid date.
                                                                        </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="NoOrientedF" class="form-label">No. Females Oriented</label>
                                                                    <input class="form-text" name="NoOrientedF" id="NoOrientedF" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid number.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                <label for="NoOrientedM" class="form-label">No. Males Oriented</label>
                                                                    <input class="form-text" name="NoOrientedM" id="NoOrientedM" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid number.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary w-md" name="submit" value="submit">Submit Meeting Details</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>     

                                            </div>
                                        </p>
                                    </div>

                                    <div class="tab-pane" id="reports" role="tabpanel">
                                        <p class="mb-0">
                                           Meeting Reports 
                                        </p>
                                    </div>
                                    
                                </div>

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