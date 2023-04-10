<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>Household Graduation Tracking</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
<!-- DataTables -->
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    
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

    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
        var agree=confirm("Are you sure you want to RATE this Household?");
        if (agree)
        return true ;
        else
        return false ;
        }   
    </script>
</head>

<?php include '../layouts/body.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Household Graduation Tracking</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation.php">Graduation</a></li>
                                    <li class="breadcrumb-item active">Household Graduation Tracking</li>
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
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary">Household Search Filter</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="graduation_hh_tracking_filter1.php" method="POST">

                                            <div class="col-12">
                                                
                                                <label for="region" class="form-label">Region</label>
                                                <div>
                                                    <select class="form-select" name="region" id="region" required>
                                                        <option ></option>
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
                                                <label for="ta" class="form-label">SL Group</label>
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
                                                    Please select a valid SLG.
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="FormSubmit" value="Submit">Submit</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </form>                                             
                                        <!-- End Here -->
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-md-6">
                                        <div class="input-group" display="inline">
                                            <form action="graduation_beneficiary_searchN.php" method="post">
                                            Household Name <input type="text" name="search">
                                                <input type ="submit" name='Search_HH_Name' value='Search_Name'> 
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group" display="inline">
                                            <form action="graduation_beneficiary_searchC.php" method="post">
                                                Household Code <input type="text" name="search">
                                                <input type ="submit" name='Search_HH_Code' value='Search_Code'> 
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-default">Beneficiary Households</h5>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>                    
                                                            <th>HH Code</th>
                                                            <th>HH Head Name</th>
                                                            <th>Tracked?</th>
                                                            <th>Grad Score</th> 
                                                            <th>Grad. Status</th>
                                                            <th>Grad. Tracking</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?Php                                                                        
                                                            $query="select * from tblbeneficiaries where grad_status ='1'";
                                                        
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $sppCode = $row["sppCode"];
                                                                            
                                                                $check = mysqli_query($link, "SELECT id FROM tblbeneficiaries_graduating where sppCode ='$sppCode'"); 
                                                                $row_check = mysqli_fetch_assoc($check); 
                                                                $id_check = $row_check['id'];

                                                                $fs = mysqli_query($link, "SELECT Months_HH_FS+Meals_Per_Day+access_to_farming_land AS FS FROM tblbeneficiaries_graduating where sppCode ='$sppCode'"); 
                                                                $row_fs = mysqli_fetch_assoc($fs); 
                                                                $total_fs = (int)$row_fs['FS'];

                                                                $er = mysqli_query($link, "SELECT savings_level+highest_loan_accessed+loan_repayment+credit_worthiness+income_sorce+access_to_formal_financial_services+linked_to_service_provider+value_consuption_assets AS ER FROM tblbeneficiaries_graduating where sppCode ='$sppCode'"); 
                                                                $row_er = mysqli_fetch_assoc($er); 
                                                                $total_er = (int)$row_er['ER'];

                                                                $nhs = mysqli_query($link, "SELECT diet_diversification+vegitable_garden+small_livestock+pit_latrine+safe_drinking_water+Other_hygiene_behaviour+medical_health_care+Perceived_malnutrition AS NHS FROM tblbeneficiaries_graduating where sppCode ='$sppCode'"); 
                                                                $row_nhs = mysqli_fetch_assoc($nhs); 
                                                                $total_nhs = (int)$row_nhs['NHS'];

                                                                $se = mysqli_query($link, "SELECT Participating_in_community_forums+Children_of_school_going_age_attending_school+Decision_making_involves_head_spouse+Shared_ownership_and_access_to_resources+Improved_general_HH_wellness_and_happiness AS SE FROM tblbeneficiaries_graduating where sppCode ='$sppCode'"); 
                                                                $row_se = mysqli_fetch_assoc($se); 
                                                                $total_se = (int)$row_se['SE'];

                                                                
                                                                $current_grad_score = $total_fs+$total_er+$total_nhs+$total_se;
                                                                if ($current_grad_score>=0)
                                                                {$val = $current_grad_score;}else{$val = 'NA';}
                                                                
                                                                if ($id_check > 0){$found ="Yes";}else{$found = "No";}
                                                                
                                                                
                                                                if (($val>0) and ($val<30)){$status = "Slow Climber";}else{$status = "NA";}
                                                                if (($val>=30) and ($val<50)){$status = "On Track";}
                                                                if ($val>=50){$status = "Graduating";}
                                                                

                                                                echo "<tr>\n";
                                                                    echo "<td>".$row["sppCode"]."</td>\n";
                                                                    echo "<td>".$row["hh_head_name"]."</td>\n";
                                                                    echo "<td>\t$found</td>\n";
                                                                    echo "<td>\t\t$val</td>\n";
                                                                    echo "<td>\t$status</td>\n";
                                                                    echo "<td>\n";
                                                                    echo "<a href=\"graduation_hh_tracking_updateFS.php?id=".$row['sppCode']."\"><i class='fas fa-pizza-slice' title='Food_Security' style='font-size:18px;color:brown'></i></a>\n";
                                                                    echo "<a href=\"graduation_hh_tracking_updateER.php?id=".$row['sppCode']."\"><i class='fa fa-arrow-up' title='Econ. Resilience' style='font-size:18px;color:black' aria-hidden='true'></i> </a>\n";
                                                                    echo "<a href=\"graduation_hh_tracking_updateNHS.php?id=".$row['sppCode']."\"><i class='fa fa-toilet' title='Health Nutrition and Sanitation' style='font-size:18px;color:orange'></i></a>\n";
                                                                    echo "<a href=\"graduation_hh_tracking_updateSE.php?id=".$row['sppCode']."\"><i class='fa fa-power-off' title='Social.Empowerement' style='font-size:18px;color:green'></i></a>\n";
                                                                    
                                                                    echo "<td>\n";
                                                                        echo "<a href=\"../basicSLGMemberview.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px;color:purple'></i></a>\n";
                                                                        echo "<a href=\"../basicSLGMemberedit.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Household' style='font-size:18px;color:green'></i></a>\n";
                                                                        echo "<a onClick=\"javascript: return confirm('Are You Sure You Want To Track This Household On Graduation Path?- You Must Be a Supervisor');\" href=\"graduation_hh_tracking_addHH.php?id=".$row['sppCode']."\"\><i class='fa fa-compass' title='Track Household' style='font-size:18px;color:black'></i></a>\n";
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
<script src="../assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/libs/jszip/jszip.min.js"></script>
<script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="../assets/js/pages/datatables.init.js"></script>

</body>

</html>