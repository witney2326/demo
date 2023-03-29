<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>Graduation: Selected Groups</title>
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

<?php include '../layouts/body.php'; 
include '../lib.php';

if (($_SESSION["user_role"]== '05')) 
   {$region = $_SESSION["user_reg"];$district = $_SESSION["user_dis"];$ta = $_SESSION["user_ta"];}
   else{$region = $_POST['region'];$district = $_POST['district'];$ta = $_POST['ta'];}
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
                            <h4 class="mb-sm-0 font-size-18">Asset Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation_livelihood_promotion.php">Livelihood Promotion</a></li>
                                    <li class="breadcrumb-item active">Selected Groups</li>
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
                                

                                <!-- Tab panes -->
                   
                                            <!--start here -->
                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate>

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
                                                            <select class="form-select" name="district" id="district" required>
                                                                <option selected value = "<?php echo $district;?>"><?php echo dis_name($link,$district);?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required>
                                                                <option selected value = "<?php echo $ta;?>"><?php echo ta_name($link,$ta);?></option>
                                                            </select>
                                                        </div>

                                                                                                               
                                                        
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="FormSubmit" value="Submit">Submit</button>
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
                                                        <h5 class="my-0 text-default">Selected Groups: Asset Management Status</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>                    
                                                                        <th>Group Code</th>
                                                                        <th>Group Name</th>                                                                                                                                    
                                                                        <th>Grad.Status</th>
                                                                        <th>AMC Trained?</th>
                                                                        <th>KP Trained?</th>
                                                                        <th>CW Trained?</th>                                     
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        
                                                                        $query="select * from tblgroup where ((grad_status ='1') and (TAID = '$ta'))";

                                                                        if ($result_set = $link->query($query)) 
                                                                        {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            { 
                                                                            if ($row["grad_assesed"] == 1){$grad_assesed = "Yes";}else{$grad_assesed = "No";} 
                                                                            if ($row["grad_assesed_result"] == 1){$grad_assesed_result = "Good";}if ($row["grad_assesed_result"] == 2){$grad_assesed_result = "Poor";}if ($row["grad_assesed_result"] == 0){$grad_assesed_result = "NA";}
                                                                            if ($row["grad_status"] == 1){$grad_status = "On GP";}else{$grad_status = "N/A";}

                                                                            if ($row["amc_trained"] == 1){$amc_trained = "Yes";}else{$amc_trained = "No";}
                                                                            if ($row["kp_trained"] == 1){$kp_trained = "Yes";}else{$kp_trained = "No";}
                                                                            if ($row["cw_trained"] == 1){$cw_trained = "Yes";}else{$cw_trained = "No";}

                                                                            echo "<tr>\n";
                                                                                echo "<td>".$row["groupID"]."</td>\n";
                                                                                echo "<td>".$row["groupname"]."</td>\n";
                                                                                echo "\t\t<td>$grad_status</td>\n";
                                                                                echo "\t\t<td>$amc_trained</td>\n";
                                                                                echo "\t\t<td>$kp_trained</td>\n";
                                                                                echo "\t\t<td>$cw_trained</td>\n";
                                                                                echo "<td> <a href=\"../basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' title='View SLG' style='font-size:18px;color:purple'></i></a>\n";
                                                                                echo "<a href=\"../basicSLGedit.php?id=".$row['groupID']."\"><i class='far fa-edit' title='Edit SLG' style='font-size:18px;color:green'></i></a>\n";
                                                                                echo "<a href=\"?id=".$row['groupID']."\"><i class='fas fa-chalkboard-teacher' title='Record Training' style='font-size:18px;color:orange'></i></a>\n";
                                                                            echo "</tr>\n";
                                                                            }
                                                                        }

                                                                        $query="select * from tblcluster where ((grad_status ='1') and (taID = '$ta'))";

                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                        if ($row["grad_assesed"] == 1){$grad_assesed = "Yes";}else{$grad_assesed = "No";} 
                                                                        if ($row["grad_assesed_result"] == 1){$grad_assesed_result = "Good";}if ($row["grad_assesed_result"] == 2){$grad_assesed_result = "Poor";}if ($row["grad_assesed_result"] == 0){$grad_assesed_result = "NA";}
                                                                        if ($row["grad_status"] == 1){$grad_status = "On GP";}else{$grad_status = "N/A";}
                                                                        if ($row["amc_trained"] == 1){$amc_trained = "Yes";}else{$amc_trained = "No";}
                                                                        if ($row["kp_trained"] == 1){$kp_trained = "Yes";}else{$kp_trained = "No";}
                                                                        if ($row["cw_trained"] == 1){$cw_trained = "Yes";}else{$cw_trained = "No";}

                                                                        echo "<tr>\n";
                                                                            echo "<td>".$row["ClusterID"]."</td>\n";
                                                                            echo "<td>".$row["ClusterName"]."</td>\n";
                                                                            echo "\t\t<td>$grad_status</td>\n";
                                                                            echo "\t\t<td>$amc_trained</td>\n";
                                                                            echo "\t\t<td>$kp_trained</td>\n";
                                                                            echo "\t\t<td>$cw_trained</td>\n";
                                                                            echo "<td> <a href=\"../basicCLSview.php?id=".$row['ClusterID']."\"><i class='far fa-eye' title='View Cluster' style='font-size:18px;color:purple'></i></a>\n";
                                                                            echo "<a href=\"../basicCLSedit.php?id=".$row['ClusterID']."\"><i class='far fa-edit' title='Edit Clluster' style='font-size:18px;color:green'></i></a>\n";
                                                                            echo "<a href=\"?id=".$row['ClusterID']."\"><i class='fas fa-chalkboard-teacher' title='Record Training' style='font-size:18px;color:orange'></i></a>\n";
                                                                            
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