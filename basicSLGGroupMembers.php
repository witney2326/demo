<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Group Members</title>
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
     

    if(isset($_POST['Update_Group_Membership']))
    {   
        $ID = $_POST['group_id']; 
    }
    
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

        function group_name($link, $grpID)
        {
        $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['groupname'];
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
                            <h4 class="mb-sm-0 font-size-18"> SLG Member Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_slg_mgt2.php">SLG Management</a></li>
                                    <li class="breadcrumb-item active">SLG Member Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
               
                <div class="row">
                    <div class="col-12">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary">SLG Members for: <?php echo group_name($link,$ID);?></h5>
                                </div>
                                <div class="card-body">
                                    <h7 class="card-title mt-0"></h7>
                            
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    
                                        <thead>
                                            <tr>
                                                <th>HH code</th>                                           
                                                <th>SLG Name</th>
                                                <th>Cohort</th>
                                                <th>Action</th>
                                
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?Php
                                                
                                                $query="select * from tblbeneficiaries where groupID = '$ID'";

                                                //Variable $link is declared inside config.php file & used here
                                                
                                                if ($result_set = $link->query($query)) {
                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                    $groupname = group_name($link, $ID);
                                                    echo "<td>".$row["sppCode"]."</td>\n";
                                                    
                                                    echo "\t\t<td>$groupname</td>\n";
                                                    echo "<td>".$row["cohort"]."</td>\n";
                    
                                                    echo "<td>
                                                    
                                                        <a href=\"basicSLGMemberview.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px'></i></a>   
                                                        <a href=\"basicSLGMemberedit.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px'></i></a> 
                                                        <a href=\"basicSLGMembersavings.php?id=".$row['sppCode']."\"><i class='fas fa-hand-holding-usd' title='Update Member Savings' style='font-size:18px'></i></a>
                                                        <a href=\"basicSLGMemberloans.php?id=".$row['sppCode']."\"><i class='fas fa-book' title='Update Member Loans' style='font-size:18px'></i></a> 
                                                        <a href=\"basicSLGGroupMembers_iga.php?id=".$row['sppCode']."\"><i class='fas fa-balance-scale' title='Update Member IGAs' style='font-size:18px'></i></a> 
                                                        <a href=\"basicSLGGroupMembersTraining.php?id=".$row['sppCode']."\"><i class='fas fa-school' title='Update Member Training' style='font-size:18px'></i></a> 
                                                        <a href=\"basicSLGGroupMembersTrainingStatus.php?id=".$row['sppCode']."\"><i class='fas fa-user-graduate' title='HH Training Status' style='font-size:18px'></i></a> 
                                                        <a href=\"basicSLGMemberNutritionSupplements.php?id=".$row['sppCode']."\"><i class='fas fa-stroopwafel fa-lg' title='Nutrition Suppliments' style='font-size:18px'></i></a> 
                                                        
                                                        <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This HOUSEHOLD');\" href=\"basicSLGMemberdelete.php?id=".$row['sppCode']."\"><i class='far fa-trash-alt' title='Delete Member' style='font-size:18px'></i></a>    
                                                        
                                                    </td>\n";

                                                echo "</tr>\n";
                                                }
                                                $result_set->close();
                                                }  
                                                                    
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"> 
                             
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