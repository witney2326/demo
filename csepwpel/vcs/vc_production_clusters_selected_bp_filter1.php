<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>VC Production Clusters</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config.php'; ?>
    <?php include '././../../lib.php'; ?>
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
                            <h4 class="mb-sm-0 font-size-18">VC Selected Proposals</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="vc_production_clusters.php">VC Production</a></li>
                                    <li class="breadcrumb-item active">VC Production Clusters</li>
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
                                        <a class="nav-link" data-bs-toggle="tab" href="#home1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link  " data-bs-toggle="link" href="vc_mapped_clusters_check.php" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Mapped Groups- BP Evaluation</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="link" href="javascript:void(0);" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Selected Business Proposals</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">VC Capacity Building</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Matching Grants</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Hub Construction</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end menu -->
                <div class="row">
                    
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">                                           
                                            <!--start here -->
                                <div class="card border border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="vc_production_clusters_filter2.php" method ="POST">
                                            <div class="col-12">
                                                <label for="region" class="form-label">Region</label>
                                                <div>
                                                    <select class="form-select" name="region" id="region" required>
                                                        <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="district" class="form-label">District</label>
                                                <select class="form-select" name="district" id="district" value ="" required>
                                                    <option></option>
                                                        <?php                                                           
                                                            $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict where regionID =$region";                                                  
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
                                                    <option ></option>
                                                    
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
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">Clusters in <?php echo get_rname($link,$region); ?> Region</h5>
                                        </div>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th>Cluster code</th>
                                                            <th>Cluster Name</th>                                           
                                                            <th>Evaluate Proposal</th>
                                                            <th>P.Submitted</th> 
                                                            <th>P.Evaluation Rslt</th>                                                      
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?Php
                                                            $query="select * from tblcluster where ((regionID = '$region') and (vc_mapped = '1'))";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                { 
                                                                    $grpID = $row["ClusterID"];
                                                                    $vc_p_submitted = (string) $row["vc_p_submitted"];
                                                                    if ($vc_p_submitted =='1'){$psubmitted = 'Yes';}
                                                                    if ($vc_p_submitted =='0'){$psubmitted = 'No';}
    
                                                                    $vc_p_result = (string) $row["vc_p_result"];
                                                                    if ($vc_p_result =='0'){$p_result = 'Not_Rated';}
                                                                    if ($vc_p_result =='1'){$p_result = 'Fail';}
                                                                    if ($vc_p_result =='2'){$p_result = 'Pass';}
    
                                                                    
                                                                echo "<tr>\n";
                                                                                                                               
                                                                    echo "<td>".$row["ClusterID"]."</td>\n";
                                                                    echo "<td>".$row["ClusterName"]."</td>\n";                                                                                                                                          
                                                                    echo "<td>";
                                                                        echo "<form action = 'vc_ratecls.php' method ='POST'>";
                                                                            echo '<select id="rating"  name="rating">';
                                                                                
                                                                                echo '<option value="0">Not_Rated</option>';
                                                                                echo '<option value="1">Fail</option>';
                                                                                echo '<option value="2">Pass</option>';
                                                                            echo "</select>";
                                                                            echo "<input type='hidden' id='grpID' name='grpID' value='$grpID'>";
                                                                            echo "<button type='submit' class='btn-outline-primary' name='FormSubmit' value='Submit' onClick='return confirmSubmit()'>Evaluate</button>";
                                                                        echo "</form>";
                                                                    echo "</td>";
                                                                    echo "<td>\t\t$psubmitted</td>\n";
                                                                    echo "<td>\t\t$p_result</td>\n";
                                                                    
                                                                    
                                                                    echo "<td>
                                                                        <a onClick=\"javascript: return confirm('Are You In Receipt Of VC Business Proposal for The Cluster? ');\" href=\"vc_submit_proposal.php?id=".$row['ClusterID']."\"><i class='fas fa-hands' title='Receive Cluster VC Proposal' style='font-size:18px'></i></a>\n 
                                                                        
                                                                         
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
                                <!-- start Here -->
                            
                        </div>
                    </div>
                </div>


                

                    

               


                <!-- Collapse -->
                

                
                <!-- end row -->

                
                <!-- end row -->

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