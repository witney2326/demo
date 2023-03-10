<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>Joint Skill Groups | View JSG</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    <?php include '././../../layouts/config2.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include '././../../layouts/body.php'; ?>

<?php 

        
$id = $_GET['id']; // get id through query string
$query="select * from tbljsg where recID='$id'";

if ($result_set = $link_cs->query($query)) {
    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
    { 
        $jsg_name= $row["jsg_name"];
        
        $groupID = $row["groupID"];
        $DistrictID= $row["districtID"];
        $bus_category= $row["bus_category"];
        $type= $row["type"];
        $no_male = $row["no_male"];
        $no_female = $row["no_female"];
        $initialInvest = $row["initial_invest"];
        $jsg_name = $row["jsg_name"];
    }
    $result_set->close();
}

function dis_name($link_cs, $disID)
{
$dis_query = mysqli_query($link_cs,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
$dis = mysqli_fetch_array($dis_query);// fetch data
return $dis['DistrictName'];
}

function group_name($link_cs, $gcode)
{
$region_query = mysqli_query($link_cs,"select groupname from tblgroup where groupID='$gcode'"); // select query
$rg = mysqli_fetch_array($region_query);// fetch data
return $rg['groupname'];
}

function BusCat_name($link_cs, $catID)
{
$BusCat_query = mysqli_query($link_cs,"select catname from tblbusines_category where categoryID='$catID'"); // select query
$BusCat = mysqli_fetch_array($BusCat_query);// fetch data
return $BusCat['catname'];
}
function BusType_name($link_cs, $typeID)
{
$BusType_query = mysqli_query($link_cs,"select name from tbliga_types where ID='$typeID'"); // select query
$BusType = mysqli_fetch_array($BusType_query);// fetch data
return $BusType['name'];
}

function cls_name($link_cs, $clscode)
{
$cls_query = mysqli_query($link_cs,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
$cls = mysqli_fetch_array($cls_query);// fetch data
return $cls['ClusterName'];
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
                        <h4 class="mb-sm-0 font-size-18">View JSG</h4>

                        <div class="page-title-right">
                            <div>
                                <p align="right">
                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                </p>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">

                        <?php include '././../../layouts/body.php'; ?>
                        <div class="col-lg-12">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">Joint Skill Group: - <?php echo $jsg_name ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-1">
                                            <label for="jsg_id" class="col-sm-2 col-form-label">JSG ID</label>
                                            <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="jsg_name" class="col-sm-2 col-form-label">JSG Name</label>
                                            <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $jsg_name ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                                                                
                                        <div class="row mb-1">
                                            <label for="group_id" class="col-sm-2 col-form-label">Group Name</label>
                                            <input type="text" class="form-control" id="group_id" name="group_id" value ="<?php echo group_name($link_cs,$groupID) ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="cluster_id" class="col-sm-2 col-form-label">Cluster Name</label>
                                            <input type="text" class="form-control" id="cluster_id" name="cluster_id" value ="<?php echo cls_name($link_cs,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link_cs,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="initialInvest" class="col-sm-2 col-form-label">Initial Invest</label>
                                            <input type="text" class="form-control" id="initialInvest" name="initialInvest" value ="<?php echo $initialInvest; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                        <div class="row mb-1">
                                            <label for="bus_category" class="col-sm-2 col-form-label">Bus Cat</label>
                                            <input type="text" class="form-control" id="bus_category" name="bus_category" value ="<?php echo BusCat_name($link_cs,$bus_category); ?>" style="max-width:30%;" disabled ="True">

                                            <label for="type" class="col-sm-2 col-form-label">Bus Type</label>
                                            <input type="text" class="form-control" id="type" name="type" value ="<?php echo BusType_name($link_cs,$type) ; ?>" disabled ="True" style="max-width:30%;" >
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="no_males" class="col-sm-2 col-form-label">No. Of Males</label>
                                            <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $no_male; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="no_females" class="col-sm-2 col-form-label">No. Of Females</label>
                                            <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $no_female; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                        
                                        <div class="row mb-1">
                                            
                                        </div>
                                    </form>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border border-primary">

                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary">JSG Members For <?php echo " "; echo $jsg_name;?></h5>
                                                </div>

                                                <div class="card-body">
                                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                    
                                                        <thead>
                                                            <tr>
                                                                <th>HH Code</th>
                                                                <th>Initial Invest</th> 
                                                                <th>Current Invest</th>
                                                                <th>Trained?</th>
                                                                <th>SS Linked?</th>
                                                                <th>Finance Linked?</th>
                                                                <th>JSG Mapped</th>
                                                                <th>Action</th>  
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                            <?Php
                                                                $query="select * from tbljsg_hhs where jsgID ='$id';";

                                                                //Variable $link_cs is declared inside config.php file & used here
                                                                
                                                                if ($result_set = $link_cs->query($query)) {
                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                { 
                                                                    $hh = $row["sppCode"];
                                                                    
                                                                    $query =mysqli_query($link_cs,"select jsg_mapped from tblbeneficiaries where sppCode='$hh'");
                                                                    $r_ow = mysqli_fetch_assoc($query); 
                                                                    $jsg_mapped = $r_ow['jsg_mapped'];

                                                                    if ($jsg_mapped =='1'){$mapped = "Yes";}else{$mapped = "No";}
                                                                    if ($row["jsg_skill_trained"] =='1'){$jsg_skill_trained = "Yes";}else{$jsg_skill_trained = "NA";}
                                                                    if ($row["service_linked"] =='1'){$service_linked = "Yes";}else{$service_linked = "NA";}
                                                                    if ($row["finance_linked"] =='1'){$finance_linked = "Yes";}else{$finance_linked = "NA";}
                                                                    if ($row["service_linked"] =='1'){$service_linked = "Yes";}else{$service_linked = "NA";}
                                                                    if ($row["finance_linked"] =='1'){$finance_linked = "Yes";}else{$finance_linked = "NA";}
                                                                    $initialInvest = number_format($row["initial_invest"],2);
                                                                    $currentInvest = number_format($row["current_invest"],2);
                                                                    echo "<tr>\n";                                           
                                                                        echo "<td>".$row["sppCode"]."</td>\n";
                                                                        
                                                                        echo "<td>\t\t$initialInvest</td>\n";
                                                                        echo "<td>\t\t$currentInvest</td>\n";
                                                                        echo "<td>\t\t$jsg_skill_trained</td>\n";
                                                                        echo "<td>\t\t$service_linked</td>\n";
                                                                        echo "<td>\t\t$finance_linked</td>\n";
                                                                        echo "<td>\t\t$mapped</td>\n";
                                                                        echo "<td>
                                                                        <a href=\"././../../basicSLGMemberview.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Household' style='font-size:18px;color:purple'></i></a>
                                                                            <a href=\"././../../basicSLGMemberedit.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Household' style='font-size:18px;color:green'></i></a>
                                                                            
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