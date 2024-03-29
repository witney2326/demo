<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>Nutrition/WASH Management</title>
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

        function grp_name($link, $grpID)
        {
        $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['groupname'];
        }

        function prog_name($link, $progID)
        {
        $prog_query = mysqli_query($link,"select progName from tblspp where progID='$progID'"); // select query
        $prog = mysqli_fetch_array($prog_query);// fetch data
        return $prog['progName'];
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
                            <h4 class="mb-sm-0 font-size-18">Nutrition and WASH Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">Nutrition/WASH Management</li>
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
                                            <span class="d-none d-sm-block">Households</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="basicReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Nutrition Reports</span>
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
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Household Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_nutrition_mgt_filter1.php" method="GET">
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                            ?>
                                                                            <option value="<?php echo $DB_ROW_reg["regionID"];?>">
                                                                                <?php echo $DB_ROW_reg["name"];?>
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
                                                            <select class="form-select" name="district" id="district" required disabled>
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
                                                            <button type="submit" class="btn btn-primary w-md" name="FormSubmit" value="Submit">Submit</button>
                                                            <INPUT TYPE="button" class="btn btn-secondary w-md"  style ="width:120px" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Beneficiary Households</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>                    
                                                                        <th>hhcode</th>
                                                                        <th>Programme</th>  
                                                                        <th>Group</th> 
                                                                        <th>Cohort</th>
                                                                        <th>HH Approved?</th>
                                                                        <th>WASH Approved?</th>                                           
                                                                        <th>WASH Approval</th>
                                                                        
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        
                                                                        $query="select * from tblbeneficiaries where regionID ='0'";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                        $region = get_rname($link,$row["regionID"]);
                                                                        $district = dis_name($link,$row["districtID"]);
                                                                        $group = grp_name($link,$row["groupID"]);
                                                                        $prog = prog_name($link, $row["spProg"]);

                                                                        $hhstatus = $row["hhstatus"];

                                                                        if ($row["hhstatus"] == '1')
                                                                        {
                                                                            $hhstatus = 'Yes';}

                                                                        if ($row["hhstatus"] == '0')
                                                                        {
                                                                            $hhstatus = 'No';}    

                                                                       // nutrition
                                                                       $WASHstatus = $row["washstatus"];

                                                                        if ($row["washstatus"] == '1')
                                                                        {
                                                                            $WASHstatus = 'Yes';}

                                                                        if ($row["washstatus"] == '0')
                                                                        {
                                                                            $WASHstatus = 'No';}   
                                                                        

                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["sppCode"]."</td>\n";
                                                                        echo "\t\t<td>$prog</td>\n";
                                                                        echo "\t\t<td>$group</td>\n";
                                                                        echo "<td>".$row["cohort"]."</td>\n";
                                                                        echo "\t\t<td>$hhstatus</td>\n";
                                                                        echo "\t\t<td>$WASHstatus</td>\n";
                                                                        echo "<td> 
                                                                         <a onClick=\"javascript: return confirm('Are You Sure You want To APPROVE This HOUSEHOLD For Nutrition Suppliments - You Must Be a Supervisor');\" href=\"basicHHStatusApproval_WASH.php?id=".$row['sppCode']."\"><i class='far fa-thumbs-up' title='Approve Household' style='font-size:18px'></i></a>
                                                                         </td>";
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
                                    
                                    <!-- end here -->
                                    <!-- start new --> 
                                    
                                    <!-- end new -->
                                    <div class="tab-pane" id="slg-1" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>New SLG</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    
                                                    <form action="insertSLG.php" method="post">
                                                        <!-- start here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="region" class="form-label">Region</label>
                                                                    <select class="form-select" name="region" id="region" required>
                                                                        <option selected value = "$region">Select Region...</option>
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
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <select class="form-select" name="district" id="district" required>
                                                                        <option selected value="$district" >Select District</option>
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
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="ta" class="form-label">TA</label>
                                                                    <select class="form-select" name="ta" id="ta" required>
                                                                        <option selected  value="$ta">Choose...</option>
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
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="gvh" class="form-label">GVH</label>
                                                                    <input type="text" name="GVHID" class="form-control" required>              
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Group Village Head.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-3">
                                                                    <label for="village" class="form-label">Village</label>
                                                                    <input type="text" name="village" class="form-control" required>                                                  
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Village in Malawi.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- End here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupID" class="form-label">Group ID</label>
                                                                        <input type="text" name="groupID" class="form-control" disabled ="True">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupname" class="form-label">Group Name</label>
                                                                        <input type="text" name="groupname" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>Date Established</label>
                                                                        <input type="date" name="DateEstablished" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>Cluster Name</label>
                                                                        <input type="text" name="clusterID" class="form-control">
                                                                    </div>                                                                                                             
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>No Males</label>
                                                                        <input type="text" name="membersM" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                    <label>No Females</label>
                                                                        <input type="text" name="membersF" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="form-group">
                                                            <label>TA </label>
                                                            <input type="text" name="TAID" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>GVH</label>
                                                            <input type="text" name="GVHID" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Males</label>
                                                            <input type="text" name="membersM" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Females</label>
                                                            <input type="text" name="membersF" class="form-control">
                                                        </div> -->
                                                        <input type="submit" class="btn btn-success" name="submit" value="Compute GroupID">
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit New SLG">
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="hhreports" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Household Reports</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                </div>
                                                
                                                <script>
                                                    function getState() {
                                                            var str='';
                                                            var val=document.getElementById('country-list');
                                                            for (i=0;i< val.length;i++) { 
                                                                if(val[i].selected){
                                                                    str += val[i].value + ','; 
                                                                }
                                                            }         
                                                            var str=str.slice(0,str.length -1);
                                                            
                                                        $.ajax({          
                                                                type: "GET",
                                                                url: "get_state.php",
                                                                data:'country_id='+str,
                                                                success: function(data){
                                                                    $("#state-list").html(data);
                                                                }
                                                        });
                                                    }
                                                </script>
                                                <div class="frmDronpDown">
                                                
                                                    <label>Country:</label><br /> <select name="district[]"
                                                        id="country-list" class="demoInputBox"
                                                        onChange="getState();" multiple size=4>
                                                        <option value="">Select Country</option>
                                                            <?php
                                                            foreach ($countryResult as $country) {
                                                                ?>
                                                            <option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                </div>
                                                
                                                    <label>State:</label><br /> <select name="state[]"
                                                        id="state-list" class="demoInputBox" multiple size=5>
                                                        <option value="">Select State</option>
                                                    </select>
                                                
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <p class="mb-0">
                                            
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