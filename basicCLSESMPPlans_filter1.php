<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>ESS Safeguard Plans</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>
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

// do check
$buscat = $_GET["buscat"];
?>
<?php   

$id = $_GET['group_code']; // get id through query string
        $query="select * from tblgroup where groupID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $districtID= $row["DistrictID"];
                $cohort = $row["cohort"];
                $groupname = $row["groupname"];  
            }
            $result_set->close();
        }

        if(isset($_POST['Submit']))
            { 
            $groupID = $_POST["group_code"];
            $district= $_POST["district"];
            $iga = $_POST['iga'];
            $males = $_POST["males"];
            $females = $_POST["females"];
            $amount = $_POST['amount_invested'];
            
            
                $sql = "INSERT INTO tblgroup_iga (groupID,districtID,type,no_male,no_female,amount_invested)
                VALUES ('$groupID','$district','$iga','$males','$females','$amount')";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG IGA Record has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_slg_mgt_check.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
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
                            <h4 class="mb-sm-0 font-size-18">Environmental and Social Safeguards Plans</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_safeguards_mgt.php">Safeguards Management</a></li>
                                    <li class="breadcrumb-item active">ESS Safeguard Plans</li>
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
                                <!-- main content -->
                                
                                <div class="card border border-primary">
                            
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="" method ="GET" >
                                            <div class="col-12">
                                                <label for="region" class="form-label">Business Category</label>
                                                <div>
                                                    <select class="form-select" name="buscat" id="buscat" value ="<?php echo $buscat; ?>" required>
                                                        <option selected value="<?php echo $buscat; ?>"><?php echo cat_name($link,$buscat); ?></option>       
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a valid Business Category.
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-12">
                                                
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </form>                                             
                                        <!-- End Here -->
                                    </div>
                                </div>

                                <div class="col-lg-9">
                                    <div class="card border border-success">
                                        <div class="card-header bg-transparent border-success">
                                            <h5 class="my-0 text-success">ESS Safeguards Plan -SLG- <?php echo $groupname ; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form method="POST" action="insertSLGSafeguardPlan.php">
                                            
                                                <div class="row mb-2">
                                                    <label for="group_code" class="col-sm-2 col-form-label">Group Code</label>
                                                    <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $id; ?>" style="max-width:30%;" readonly >

                                                    <label for="district" class="col-sm-2 col-form-label">District</label>
                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                                </div>
                                                
                                                                                                                            
                                                <div class="row mb-2">
                                                    <label for="buscat1" class="col-sm-2 col-form-label">Bus Cat</label>
                                                    <select class="form-select" name="buscat1" id="buscat1" value ="<?php echo $buscat; ?>" style="max-width:30%;" required>
                                                        <option selected value="<?php echo $buscat; ?>"><?php echo cat_name($link,$buscat); ?></option>   
                                                    </select>

                                                    <label for="bustype" class="col-sm-2 col-form-label">Bus Type</label>
                                                    <select class="form-select" name="bustype" id="bustype" value ="" style="max-width:30%;" required >
                                                        <option></option>
                                                        <?php                                                           
                                                            $type_fetch_query = "SELECT type FROM tblgroup_iga where ((groupID = '$id') and (bus_category='$buscat'))";                                                  
                                                            $result_type_fetch = mysqli_query($link, $type_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_type = mysqli_fetch_array($result_type_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_type["type"]; ?>">
                                                                <?php echo iga_name($link,$DB_ROW_type["type"]); ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                                
                                                <div class="row mb-2">
                                                    <label for="sactivity" class="col-sm-2 col-form-label">Activity</label>
                                                    <select class="form-select" name="sactivity" id="sactivity" value ="" style="max-width:30%;" required>
                                                        <option></option>
                                                        <?php                                                           
                                                            $act_fetch_query = "SELECT activityID,action FROM tblsafeguards_mitigation_activity where categoryID = '$buscat'";                                                  
                                                            $result_act_fetch = mysqli_query($link, $act_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_act = mysqli_fetch_array($result_act_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_act["activityID"]; ?>">
                                                                <?php echo $DB_ROW_act["action"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                    </select>

                                                    <label for="indicator" class="col-sm-2 col-form-label">Indicator</label>
                                                    <select class="form-select" name="indicator" id="indicator" value ="" style="max-width:30%;" required>
                                                        <option></option>
                                                        <?php                                                           
                                                            $indi_fetch_query = "SELECT distinct indicatorID FROM tblsafeguards_mitigation_activity where categoryID = '$buscat'";                                                  
                                                            $result_indi_fetch = mysqli_query($link, $indi_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_indi = mysqli_fetch_array($result_indi_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_indi["indicatorID"]; ?>">
                                                                <?php echo indicator_name($link,$DB_ROW_indi["indicatorID"]); ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                    </select>
                                                </div>

                                                
                                                <div class="row mb-2">
                                                    <label for="target" class="col-sm-2 col-form-label">Target</label>
                                                    <input type="text" class="form-control" id="target" name="target"  style="max-width:30%;">

                                                    <label for="amount_invested" class="col-sm-2 col-form-label">Invested</label>
                                                    <input type="text" class="form-control" id="amount_invested" name="amount_invested"  style="max-width:30%;">
                                                </div>

                                                <div class="row mb-2">
                                                    <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                                    <input type="date" class="form-control" id="startdate" name="startdate"  style="max-width:30%;">

                                                    <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>
                                                    <input type="date" class="form-control" id="finishdate" name="finishdate"  style="max-width:30%;">
                                                </div>

                                                <div class="row mb-2">
                                                    
                                                </div>

                                                <div class="row justify-content-end">
                                                    <div>
                                                        <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save New SLG Safeguard Plan Record</button>
                                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">ESS Safeguard Plans</h5>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th>Plan ID</th>   
                                                            <th>SLG Name</th>
                                                            <th>District</th>
                                                            <th>IGA Type</th>
                                                            <th>Planned Activity</th>
                                                            <th>Indicator</th>
                                                            <th>Target</th>
                                                            <th>Due Date</th>
                                                            <th>Budget</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?Php
                                                            $id = $_GET['group_code'];
                                                            $query="select * from tblsafeguard_group_plans where groupID ='$id';";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $group = grp_name($link, $id);
                                                                $amount = number_format(0,"2");

                                                            
                                                                $district_name = dis_name($link,$row["districtID"]);
                                                                $ig_name = iga_name($link,$row["busTypeID"]);
                                                                $activity = activity_name($link,$row["activityID"]);
                                                                $indicator = indicator_name($link,$row["indicator"]);

                                                            echo "<tr>\n";                                           
                                                                echo "<td>".$row["planID"]."</td>\n";
                                                                
                                                                echo "\t\t<td>$group</td>\n";
                                                                echo "\t\t<td>$district_name</td>\n";
                                                                echo "\t\t<td>$ig_name</td>\n";
                                                                echo "\t\t<td>$activity</td>\n";
                                                                echo "\t\t<td>$indicator</td>\n";
                                                                echo "<td>".$row["target"]."</td>\n";
                                                                echo "<td>".$row["finishdate"]."</td>\n";
                                                                echo "\t\t<td>$amount</td>\n";
                                                                
                                                                echo "<td>
                                                                    <a href=\"basicCLSESMPPlansEdit.php?id=".$row['planID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"basicSLGMemberSavingsDelete.php?id=".$row['planID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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
                                
                                <!-- main content -->
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