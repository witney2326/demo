<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Clusters</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
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
   /*
    if (($_SESSION["user_role"]== '05')) 
    {
        header('Location: basic_livelihood_cls_mgt_filter_cw_results.php');
    } else if($_SESSION["user_role"]== '03'){
        header('Location: basic_livelihood_cls_mgt_cood_filter1_results.php');
    }
    */
    
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
                            <h4 class="mb-sm-0 font-size-18">SLG Clusters</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_slg_mgt2.php">SLG Mgt</a></li>
                                    <li class="breadcrumb-item active">SLG Clusters</li>
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
     
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                
                            <?php
                            /*
                                      if($_SESSION["user_role"] == '04'){ ?>
                                          <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="basic_livelihood_slg_mgt_region_cood_filter_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">SL Groups</span>
                                        </a>
                                    </li>
                                      <?php } else { ?>
                                        <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="basic_livelihood_slg_mgt_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">SL Groups</span>
                                        </a>
                                    </li>
                                      <?php }?>
                                    <?php 
                                      if($_SESSION["user_role"] == '04'){ ?>
                                          <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="basic_livelihood_cls_mgt_region_cood_filter_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                      <?php } else { ?>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="link"  href="basic_livelihood_clusters.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Clusters</span>
                                            </a>
                                       </li>
                                      <?php }
                                        */
                                      ?>
                                    <?php
                                       if($_SESSION["user_role"] == '03'){ ?>
                                          <li class="nav-item waves-effect waves-light">
                                            <a class="link" href="basic_livelihood_slg_mgt_region_cood_filter_results.php" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">SL Groups</span>
                                            </a>
                                         </li>
                                       <?php } else { ?>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">SL Groups</span>
                                            </a>
                                         </li>
                                       <?php } ?>
                                    <?php 
                                      if($_SESSION["user_role"] == '03'){ ?>
                                          <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active"  href="basic_livelihood_cls_mgt_region_cood_filter_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                      <?php } else { ?>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="link"  href="basic_livelihood_clusters.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Clusters</span>
                                            </a>
                                       </li>
                                      <?php }?>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="basic_livelihood_slg_mgt_new_cls_filter1_results.php" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Cluster!</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="basic_livelihood_slg_mgt_new_slg_filter1_results.php" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">New SLG!</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" href="basicReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">SLG Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <div class="card border border-primary">
                                    

                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_cls_mgt_region_cood_filter_check_results.php" method ="POST" >
                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region"  onChange="getDistrict(this.value);" required>
                                                                    <option></option>
                                                                    <?php   
                                                                            $regionId = $_SESSION["user_reg"];                                                        
                                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion WHERE regionID='$regionId'";                                                  
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
                                                            <select class="form-select" name="district" id="district" onChange="getTa(this.value);" required>
                                                                <option selected value="00">Select District</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" onChange="getCw(this.value)" required >
                                                                <option selected value="0000">Select TA</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Case Worker</label>
                                                            <select class="form-select" name="cw" id="cw"  required >
                                                                <option selected value="00">Select Caseworker</option>
                                                            </select>
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
                                <div class="row mb-1">
                                    <div class="col-md-6">
                                        <div class="input-group" display="inline">
                                            <form action="phpSearchClusterN.php" method="post">
                                                Cluster Name <input type="text" name="search">
                                                <input type ="submit" name='Search_Group_Name' value='Search_Name'> 
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group" display="inline">
                                            <form action="phpSearchClusterC.php" method="post">
                                                Cluster Code <input type="text" name="search">
                                                <input type ="submit" name='Search_Group_Code' value='Search_Code'> 
                                            </form>
                                        </div>
                                    </div>
                                </div>                                    
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">SLG Clusters</h5>
                                        </div>
                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            
                                                            
                                                            <th>Cluster code</th>
                                                            <th>Cluster Name</th>
                                                            <th>cohort</th>
                                                            <th>GVH</th>
                                                            <th>SP Programme</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?Php
                                                            $query="select * from tblcluster where ((regionID = '0') and (deleted = '0'))";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                            echo "<tr>\n";
                                                                
                                                            
                                                                echo "<td>".$row["ClusterID"]."</td>\n";
                                                                echo "<td>".$row["ClusterName"]."</td>\n";
                                                                echo "<td>".$row["cohort"]."</td>\n";                                                                            
                                                                echo "<td>".$row["gvhID"]."</td>\n";
                                                                echo "<td>".$row["programID"]."</td>\n";
                                                                
                                                                echo "<td>
                                                                    <a href=\"basicCLSview.php?id=".$row['ClusterID']."\"><i class='far fa-eye' title='View Cluster' style='font-size:18px'></i></a>\n";
                                                                    echo
                                                                        "<a href=\"basicCLSedit.php?id=".$row['ClusterID']."\"><i class='far fa-edit' title='Edit Cluster Details' style='font-size:18px'></i></a>\n";
                                                                    echo 
                                                                    
                                                                    "<a onClick=\"javascript: return confirm('Are You Sure You want To Delete This Cluster - You Must Be a Supervisor');\" href=\"basicCLSdelete.php?id=".$row['ClusterID']."\"><i class='far fa-trash-alt' title='Delete Cluster' style='font-size:18px;color:Red'></i></a>
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
<script>
      function getDistrict(val) 
        {
            console.log("value", val);
            $.ajax({
            type: "POST",
            url: "get_district.php",
            data:'regID='+val,
            success: function(data)
                    {
                    $("#district").html(data);
                    }
                });
        }
        function getTa(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_ta.php",
                data:'disid='+val,
                success: function(data){
                $("#ta").html(data);
                }
                });
            }
        
        function getCw(val) 
            {

                $.ajax({
                type: "POST",
                url: "get_cw.php",
                data:`disid=${val}`,
                
                success: function(data){
                $("#cw").html(data);
                }
                });
            }

    </script>

</body>

</html>