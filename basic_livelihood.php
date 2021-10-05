<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Basic Livelihood</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
     <?php include 'layouts/config.php'; ?>
    

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        }

        .active, .accordion:hover {
        background-color: #ccc; 
        }

        .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
        }
    </style>
</head>


<?php include 'layouts/body.php'; ?>

<?php
                        
                //include "layouts/config.php"; // Using database connection file here
                
               

            if(isset($_POST['Submit']))
            {
                
                if(isset($_POST['region'])) {
                    $region =$_POST['region'];
                   $region = "Not Set";

                }
                if(isset($_POST['district'])) {
                    $district =$_POST['district'];
                   $district = "Not Set";

                }
                if(isset($_POST['ta'])) {
                    $ta =$_POST['ta'];
                   $ta = "Not Set";

                }
                if(isset($_POST['gvh'])) {
                    $gvh =$_POST['gvh'];
                   $gvh = "Not Set";

                }
                if(isset($_POST['village'])) {
                    $village =$_POST['village'];
                   $village = "Not Set";

                }
                

                //$hhname =  $_POST['hhname'];
                //$progcode = $_POST['progcode'];
                //$progname =  $_POST['progname'];
                //$hhcode = $_POST['hhcode'];
                //$nationalID = $_POST['nationalID'];
                //$hhdob =  $_POST['hhdob'];
                //$region = $_POST['region'];
                //$district =  $_POST['district'];
                //$ta = $_POST['ta'];
                //$gvh = $_POST['gvh'];
                //$village =  $_POST['village'];
                //$sex = $_POST['sex'];
                //$cluster =  $_POST['cluster'];
               //$group = $_POST['group'];
                    
                   
               // $result=mysqli_query($link,"insert into tblbasic_beneficiary(hhcode,sppcode,hhname,nationalID,hhdob, regionID, districtID, taID, gvhID, village, sppname, sex, clusterID, groupID ) 
               // values('$hhcode','$progcode','$hhname','$nationalID','$hhdob', '$region', '$district', '$ta', '$gvh', '$village', '$progname', '$sex, '$cluster', '$group')");
               $result=mysqli_query($link,"insert into tblbasic_beneficiary(regionID, districtID, taID, gvhID, village) values('$region', '$district', '$ta', '$gvh', '$village')");       
                if($result)
                    { mysqli_close($link); // Close connection
                        echo "succes";
                            
                } 
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
                            <h4 class="mb-sm-0 font-size-18">Basic Livelihood</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Basic Livelihood</li>
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
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Beneficiaries" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">HHs</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#awareness" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Awareness</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#mobilisation" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">SLG Mobn</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#SLG-management" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Groups</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#member-Management" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Members</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#mindset-trainings" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Trainings</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#cbdra" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">CBDRA</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#nutrition" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Nutrition</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reports" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Reports</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Basic Livelihood</h5>
                                                    </div>                                   
                                            </div>
                                        </p>
                                    </div>
                                    
                                    <div class="tab-pane" id="Beneficiaries" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Beneficiary Households</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href ="basic_livelihood_hh_mgt.php">Click to go to Household management</a>
                                                    </div>
                                            </div>
                                        </p>
                                    </div>

                                    <div class="tab-pane" id="awareness" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Sensitization and Awareness Meetings</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        
                                                    </div>
                                                    <!-- start -->
                                                    <div class="card border border-primary">
                                                        <div class="card-header bg-transparent border-primary">
                                                            <h6 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3">New Meeting</i></h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"></h5>
                                                            <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="insertBasicAwarenessMeeting.php" method="post">
                                                                <div class="col-12">
                                                                    <label for="region" class="form-label">Region</label>
                                                                    <div>
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

                                                                <div class="col-12">
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

                                                                <div class="col-12">
                                                                    <label for="sectorID" class="form-label">Sector</label>
                                                                    <select class="form-select" name="sectorID" id="sectorID" required>
                                                                        <option></option>
                                                                        <option value="01">DEC</option>
                                                                        <option value="02">CSSC</option>
                                                                        <option value="03">ADC</option>
                                                                        <option value="04">TWG</option>
                                                                        <option value="05">DSSC</option>
                                                                        <option value="06">Extension Workers</option>
                                                                        <option value="07">Beneficiaries</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Sector.
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="orientationDate" class="form-label">Orientation Date</label>
                                                                    <input type="date" name="orientationDate" id="orientationDate" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid date.
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="NoOrientedF" class="form-label">No. Females Oriented</label>
                                                                    <input class="form-text" name="NoOrientedF" id="NoOrientedF" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid number.
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-12">
                                                                    <label for="NoOrientedM" class="form-label">No. Males Oriented</label>
                                                                    <input class="form-text" name="NoOrientedM" id="NoOrientedM" required>
                                                                        
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid number.
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary w-md" name="submit" value="submit">Submit</button>
                                                                </div>
                                                            </form>                                             
                                                            
                                                        </div>
                                                    </div>
                                            
                                            <!-- start here -->
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h6 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3">Meetings conducted</i></h6>
                                                </div>
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
                                                            
                                                            $query="select * from tblawareness_meetings";

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
                                                <!-- end here -->
                                            </div>
                                            
                                            </p>
                                            
                                    </div>
                                    </div>

                                    <div class="tab-pane" id="reports" role="tabpanel">
                                        <p class="mb-0">
                                        <div class="card border border-primary">
                                            <div class="card-header bg-transparent border-primary">
                                                <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Basic Livelihood Reports</h5>
                                                </div>
                                                <div class="card-body">
                                                    <a href ="">Click to go to Basic Livelihood Reports</a>
                                                </div>
                                        </div>
                                        </p>
                                    </div>

                                    <div class="tab-pane" id="SLG-management" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Savings and Loan Groups Management</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <a href="basic_livelihood_slg_mgt2.php">click to go to the page</a>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <p class="mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                            farm-to-table.
                                        </p>
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

<script src="assets/js/app.js"></script>

</body>

</html>
