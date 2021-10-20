<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CBDRA</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include 'layouts/body.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Community Based Disaster Risk Awareness</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">CBDRA</li>
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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#hotspots" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Disaster Hotspots</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#sensitization" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Trainer Of Trainers</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#clinics" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Pysochosocial Clinics</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#adoptplace" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Adopt a Place</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#treeplanting" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">National Tree Planting</span>
                                        </a>
                                    </li>
                                                                      
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">CBDRA Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    
                                    <!-- Here -->
                                    
                                    <!-- end here -->
                                    
                                    
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <p class="mb-0">
                                            
                                        
                                        </p>
                                    </div>

                                    <div class="tab-pane active" id="hotspots" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"></i>Hotspots</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_cbdra_add_hotspot.php" method ="POST" >
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="<?php if(isset($_POST['region'])) {echo $_POST['region'];} ?>" onChange="update()" required>
                                                                    <option></option>
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
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" value ="$district" required>
                                                                <option selected value="$district" ></option>
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
                                                            <label for="hotspot" class="form-label">Hotspot</label>
                                                            <input class="text" name="hotspot" id="hotspot" required>
                                                                
                                                            <div class="invalid-feedback">
                                                                Enter Valid Hotspot.
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="issue" class="form-label">Issue/Problem</label>
                                                            <select class="form-select" name="issue" id="issue" required>
                                                                
                                                                <?php                                                           
                                                                        $issue_fetch_query = "SELECT id, name FROM tblissues";                                                  
                                                                        $result_issue_fetch = mysqli_query($link, $issue_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_issue = mysqli_fetch_array($result_issue_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_issue["id"]; ?>">
                                                                            <?php echo $DB_ROW_issue["name"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Issue.
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="chance" class="form-label">Occurance Chance(Probability)</label>
                                                            <select class="form-select" name="chance" id="chance" required>
                                                                <option value="0">0%</option>
                                                                <option value="10">10%</option>
                                                                <option value="30">30%</option>
                                                                <option value="50">50%</option>
                                                                <option value="70">70%</option>
                                                                <option value="100">100%</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Occurance.
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Hotspots</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>S/N</th>
                                                                        <th>District</th>
                                                                        <th>Hotspot</th>
                                                                        <th>Issue</th>
                                                                        <th>Occurence Probability</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblhotspot";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                        echo "<tr>\n";
                                                                            
                                                                        
                                                                            echo "<td>".$row["id"]."</td>\n";
                                                                            echo "<td>".$row["districtID"]."</td>\n";
                                                                            echo "<td>".$row["place"]."</td>\n";
                                                                            echo "<td>".$row["issue"]."</td>\n";
                                                                            echo "<td>".$row["probability"]."</td>\n";
                                                                            
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