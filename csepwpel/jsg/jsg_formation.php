<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>JSG Formation</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config2.php'; ?>
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
    if(isset($_GET['Submit']))
    {   
        $region = $_GET['region'];
        $district = $_GET['district'];
        $ta = $_GET['ta'];
     
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
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP Joint Skill Group Formation</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="jsg.php">JSG Management</a></li>
                                    <li class="breadcrumb-item active">JSG Formation</li>
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
                                            <span class="d-none d-sm-block">Savings and Loan Groups</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="jsg_clusters_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="link" href="jsgs.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Joint Skill Groups</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" href="enhancedReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Joint Skill Group Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!--start here -->
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary">SLG Search Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="jsg_mgt_filter1.php" method ="POST" >
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="<?php if(isset($_GET['region'])) {echo $_GET['region'];} ?>" required>
                                                                    <option selected value = "$region"></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch = mysqli_query($link_cs, $dis_fetch_query);                                                                       
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
                                                            <select class="form-select" name="district" id="district" value ="$district" required disabled>
                                                                <option selected value="$district" ></option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
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
                                                                <option selected  value="$ta"></option>
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

                                            <div class="row mb-1">
                                                <div class="col-md-6">
                                                    <div class="input-group" display="inline">
                                                        <form action="././../../phpSearch.php" method="post">
                                                            Group Name <input type="text" name="search">
                                                            <input type ="submit" name='Search_Group_Name' value='Search_Name'> 
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group" display="inline">
                                                        <form action="././../../phpSearchgc.php" method="post">
                                                            Group Code <input type="text" name="search">
                                                            <input type ="submit" name='Search_Group_Code' value='Search_Code'> 
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Savings and Loan Groups</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>SLG code</th>
                                                                        <th>SLG Name</th>
                                                                        <th>cohort</th>
                                                                        <th>M</th>
                                                                        <th>F</th>
                                                                        <th>Mapped?</th>
                                                                        <th>No. JSGs</th>
                                                                        <th>Action On SLG</th> 
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblgroup where regionID ='0'";
 
                                                                        //Variable $link_cs is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link_cs->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            $db_mapped = (string) $row["jsg_mapped"];
                                                                            if ($db_mapped =='1'){$mapped = 'Yes';}
                                                                            if ($db_mapped =='0'){$mapped = 'No';}

                                                                            $grp = $row["groupID"];

                                                                            $result1 = mysqli_query($link_cs, "SELECT COUNT(recID) AS value_sum FROM tbljsg WHERE groupID = '$grp'"); 
                                                                            $row2 = mysqli_fetch_assoc($result1); 
                                                                            $jsgs = $row2['value_sum'];

                                                                        echo "<tr>\n";
                                                                            echo "<td>".$row["groupID"]."</td>\n";
                                                                            echo "<td>".$row["groupname"]."</td>\n";
                                                                            echo "<td>".$row["cohort"]."</td>\n";
                                                                            echo "<td>".$row["MembersM"]."</td>\n";
                                                                            echo "<td>".$row["MembersF"]."</td>\n";
                                                                            echo "<td>\t\t$mapped</td>\n";
                                                                            echo "<td>\t\t$jsgs</td>\n";
                                                                            echo "<td>
                                                                                <a href=\"././../../basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' title='View SLG' style='font-size:18px;color:purple'></i></a>                                                                           
                                                                                <a href=\"view_JSG.php?id=".$row['groupID']."\"><i class='fas fa-balance-scale' title='View JSGs For the Group' style='font-size:18px;color:orange'></i></a> 
                                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Map This Group For JSGs Interventions? ');\" href=\"slg_JSG_Map.php?id=".$row['groupID']."\"><i class='fas fa-stamp' title='Map SLG For JSG Intervention' style='font-size:18px;color:green'></i></a>
                                                                                <a href=\"add_JSG.php?id=".$row['groupID']."&mapped=".$row['jsg_mapped']."\"><i class='fa fa-users' title='Add JSG to SLG' style='font-size:18px;color:cadetblue'></i></a> 
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