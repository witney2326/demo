<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>Youths Sensitization Meetings</title>
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

<?php include '../layouts/body.php'; 

    function dis_name($link, $discode)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$discode'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
    }
    function r_name($link, $rcode)
        {
        $region_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $dis = mysqli_fetch_array($region_query);// fetch data
        return $dis['name'];
    }

    function s_name($link, $scode)
        {
        $sector_query = mysqli_query($link,"select name from tblsector where id='$scode'"); // select query
        $dis = mysqli_fetch_array($sector_query);// fetch data
        return $dis['name'];
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
                            <h4 class="mb-sm-0 font-size-18">YCS Sensitization and Awareness Meetings</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="ycs.php">Youth Challenge Support</a></li>
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
                                        <a class="link"  href="enhancedReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block"> Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">

                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!--start here -->   
                                            <!-- here -->
                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="ycs_meetings_filter1.php" method ="GET" >
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
                                                            <select class="form-select" name="district" id="district" value ="$district" required disabled>
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
                                                            <h5 class="my-0 text-primary">YCS Meetings Conducted</h5>
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
                                                                        
                                                                            $query="select * from tblawareness_meetings where sectorID ='13'";

                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                        $district = dis_name($link,$row["DistrictID"]);
                                                                        $region = r_name($link,$row["regionID"]);
                                                                        $sector = s_name($link,$row["sectorID"]);
                                                                        echo "<tr>\n";
                                                                            echo "<td>".$row["meetingID"]."</td>\n";
                                                                            echo "\t\t<td>$region</td>\n";
                                                                            echo "\t\t<td>$district</td>\n";
                                                                            echo "\t\t<td>$sector</td>\n";
                                                                            echo "<td>".$row["orientationDate"]."</td>\n";
                                                                            echo "<td>".number_format($row["femalesNo"])."</td>\n";
                                                                            echo "<td>".number_format($row["malesNo"])."</td>\n";
                                                                            echo "<td>
                                                                            <a href=\"../basicAwarenessMeetingview.php?id=".$row['meetingID']."\"><i class='far fa-eye' title='Meeting Details' style='font-size:18px;color:purple'></i></a>
                                                                            <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This Meeting Record - You Must Be a Supervisor');\" href=\"../basicAwarenessMeetingDelete.php?id=".$row['meetingID']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>    
                                                                                
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
                                                <!-- end here -->


                                        </p>
                                    </div>
                                    <!-- Here -->
                                
                                    <div class="tab-pane" id="new-meeting" role="tabpanel">
                                        <p class="mb-0">

                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="ycs_new_meeting_filter1.php" method ="GET" >
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
                                                            <select class="form-select" name="district" id="district" value ="$district" required disabled>
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
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            
                                            <!-- end here -->
                                            
                                        </p>
                                    </div>

                                    <div class="tab-pane" id="reports" role="tabpanel">
                                        <p class="mb-0">
                                           
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