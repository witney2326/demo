<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>ACSA Management</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config2.php'; 
          include '../lib2.php';
    ?>
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

<?php include '././../../layouts/body.php'; ?>

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

    <?php include '././../../layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP Actionable Climate Smart Agriculture</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="../csepwp_basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">ACSA</li>
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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#clusters" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                  
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="javascript:void(0);" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">ACSA Trained Groups</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">

                                    <div class="tab-pane active" id="clusters" role="tabpanel">
                                        <p class="mb-0">                                          
                                            <div class="row">                  
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                    
                                                            <div class="card border border-primary">
                                                                

                                                                <div class="card-body ">
                                                                    <h5 class="card-title mt-0"></h5>
                                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="csepwp_acsa_mgt_filter2.php" method ="POST" >
                                                                        <div class="col-12">
                                                                            <label for="region" class="form-label">Region</label>
                                                                            
                                                                                <select class="form-select" name="region" id="region" value ="<?php echo $region;?>"  required>
                                                                                    <option selected value = "<?php echo $region;?>"><?php echo get_rname($link_cs,$region);?></option>
                                                                                </select>
                                                                                
                                                                        </div>
                                                                        
                                                                        <div class="col-12">
                                                                            <label for="district" class="form-label">District</label>
                                                                            <select class="form-select" name="district" id="district" required >
                                                                                <option></option>
                                                                                    <?php                                                           
                                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict where regionID ='$region'";                                                  
                                                                                        $result_dis_fetch = mysqli_query($link_cs, $dis_fetch_query);                                                                       
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
                                                                                <option ></option>
                                                                                <?php                                                           
                                                                                        $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                                                        $result_ta_fetch = mysqli_query($link_cs, $ta_fetch_query);                                                                       
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

                                                                        <!-- start here -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border border-primary">
                                                                    <div class="card-header bg-transparent border-primary">
                                                                        
                                                                    </div>
                                                                    <div class="card-body">
                                                                    <h7 class="card-title mt-0"></h7>
                                                                        
                                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                            
                                                                                <thead>
                                                                                    <tr>                                                                                                                      
                                                                                        <th>Cluster code</th>
                                                                                        <th>Cluster Name</th>
                                                                                        <th>Lead Farmer Trained?</th>
                                                                                        <th>Demo Plot?</th>                                                         
                                                                                        <th>Action</th>                                                           
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?Php
                                                                                        $query="select * from tblcluster where regionID = '$region'";
                                                                                        
                                                                                        if ($result_set = $link_cs->query($query)) {
                                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                                        { 
                                                                                            $found = demo_plot_found($link_cs,$row["ClusterID"]);
                                                                                            if ($found > 0)
                                                                                            {$check = "Yes";}
                                                                                            else
                                                                                            {$check = "No";}

                                                                                            $found_lf = lf_found($link_cs,$row["ClusterID"]);
                                                                                            if ($found_lf > 0)
                                                                                            {$check1 = "Yes";}
                                                                                            else
                                                                                            {$check1 = "No";}

                                                                                        echo "<tr>\n";                                                                                          
                                                                                            echo "<td>".$row["ClusterID"]."</td>\n";
                                                                                            echo "<td>".$row["ClusterName"]."</td>\n";                                                                           
                                                                                            echo "<td>\t\t$check1</td>\n";
                                                                                            echo "<td>\t\t$check</td>\n";
                                                                                            echo "<td>
                                                                                                <a href=\"ACSADemoPlotView_csepwp.php?id=".$row['ClusterID']."\"><i class='far fa-eye' title ='View Status' style='font-size:18px;color:purple'></i></a>
                                                                                                <a href=\"ACSADemoPlotEdit_csepwp.php?id=".$row['ClusterID']."\"><i class='far fa-edit' title ='Edit Demo Plot' style='font-size:18px;color:cadetblue'></i></a>                                                                            
                                                                                                <a href=\"ACSADemoPlotAdd_csepwp.php?id=".$row['ClusterID']."\"><i class='fas fa-plus' title ='Add Demo Plot' style='font-size:18px;color:green'></i></a>                       
                                                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This Demo Plot Record - You Must Be a Supervisor!');\" href=\"ACSADemoPlotDelete_csepwp.php?id=".$row['ClusterID']."\"><i class='far fa-trash-alt' title ='Delete Demo Plot' style='font-size:18px;color:red'></i></a>
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