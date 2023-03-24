<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

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
if (($_SESSION["user_role"]= '05')) {
    $region = $_SESSION["user_reg"];
    $ta = $_SESSION["user_ta"];
    $district = $_SESSION["user_dis"];
     
} else
{
    $region = $_POST['region'];
    $district = $_POST['district'];
    $ta = $_POST['ta'];
}
?>
<?php   

$id = $_GET['id']; // get id through query string
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
                echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
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
                            <h4 class="mb-sm-0 font-size-18">ESS Safeguard Plans</h4>

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
                                <div>
                                    <p align="right">
                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                    </p>
                                </div>
                                

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">ESS Safeguard Plans</h5>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" style="font-size:12px ;">
                                                
                                                <thead>
                                                        <tr>
                                                            <th>Plan ID</th>   
                                                          
                                                        
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
                                                            $id = $_GET['id'];
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
                                                                
                                                                
                                                               
                                                                echo "\t\t<td>$ig_name</td>\n";
                                                                echo "\t\t<td>$activity</td>\n";
                                                                echo "\t\t<td>$indicator</td>\n";
                                                                echo "<td>".$row["target"]."</td>\n";
                                                                echo "<td>".$row["finishdate"]."</td>\n";
                                                                echo "\t\t<td>$amount</td>\n";
                                                                
                                                                echo "<td>
                                                                    <a href=\"basicCLSESMPPlansEdit.php?id=".$row['planID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                                    <a href=\"basicCLSESMPPlansProgressTrack.php?id=".$row['planID']."\"><i class='fas fa-chart-line' title='Safeguard Implimentation Progress' style='font-size:18px'></i></a> 
                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This ESMP Record');\" href=\"basicCLSESMPPlansDelete.php?id=".$row['planID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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