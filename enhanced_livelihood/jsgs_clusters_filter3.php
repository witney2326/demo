<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>JSGs:Clusters</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
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

<?php include '../layouts/body.php'; ?>

<?php  
    if (($_SESSION["user_role"]== '05')) 
    {
        $region = $_SESSION["user_reg"];
        $district = $_SESSION["user_dis"];
        $ta = $_SESSION["user_ta"];   
    }
    else
    {
        $region = $_POST['region'];
        $district = $_POST['district'];
        $ta = $_POST['ta'];
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

        function ta_name($link, $tacode)
        {
        $ta_query = mysqli_query($link,"select TAName from tblta where TAID='$tacode'"); // select query
        $taname = mysqli_fetch_array($ta_query);// fetch data
        return $taname['TAName'];
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
                        <h4 class="mb-sm-0 font-size-18">Joint skill Groups - Clusters</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="jsg_formation_check.php">JSG Formation</a></li>
                                <li class="breadcrumb-item active">JSG Clusters</li>
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
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link "  href="jsg_formation_check" role="link">
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
                                        <a class="nav-link" data-bs-toggle="link" href="jsgs_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">JSGs(SLGs)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="javascript: void(0);" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">JSGs(Clusters)</span>
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
                                <!-- Tab panes -->
                                <div class="card border border-primary">
                                    
                                    <div class="card-body">
                                        
                                        <form class="row row-cols-lg-auto g-3 align-items-center" >
                                            <div class="col-12">
                                                <label for="region" class="form-label">Region</label>
                                                <div>
                                                    <select class="form-select" name="region" id="region" value ="$region" required>
                                                        <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="district" class="form-label">District</label>
                                                <div>
                                                    <select class="form-select" name="district" id="district" value ="$district" required>
                                                        <option selected value = "<?php echo $district;?>"><?php echo dis_name($link,$district);?></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="ta" class="form-label">Traditional Authority</label>
                                                <select class="form-select" name="ta" id="ta" required>
                                                    <option selected value = "<?php echo $ta;?>"><?php echo ta_name($link,$ta);?></option>
                                                    
                                                </select>
                                                
                                            </div>
                                            <div class="col-12">
                                                
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
                                            <h5 class="my-0 text-primary">Joint Skill Groups</h5>
                                        </div>
                                        <div class="card-body">
                                            <h7 class="card-title mt-0"></h7>
                                            
                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            
                                                <thead>
                                                    <tr>  
                                                        <th>JSG code</th>
                                                        <th>JSG Name</th>
                                                        <th>Cluster Name</th>
                                                        <th>Members</th>
                                                        <th>JSG Members-DB</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?Php
                                                        $query="select * from tbljsg inner join tblcluster on tbljsg.groupID = tblcluster.ClusterID where ((tblcluster.TAID = '$ta') and (tbljsg.deleted ='0'))";

                                                        //Variable $link is declared inside config.php file & used here
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        { $disname = (string) dis_name($link,$row["districtID"]);
                                                            $membership = $row["no_male"]+$row["no_female"];
                                                            $check = substr($row["groupID"], 5, 3);
                                                            
                                                            if (($check == "CLU") or ($check == "CLS")){
                                                            $gpID =   $row["groupID"];                                                  
                                                            $name_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$gpID'"); // select query
                                                            while($rg = mysqli_fetch_array($name_query)){
                                                            $clustername = $rg['ClusterName'];}} else{$clustername = "";}
                                                
                                                            if ($check == "SLG"){
                                                            $gpID =   $row["groupID"];
                                                            $grpname_query = mysqli_query($link,"select groupname from tblgroup where groupID='$gpID'"); // select query
                                                            while($rg = mysqli_fetch_array($grpname_query)){
                                                            $groupname = $rg['groupname'];}} else{$groupname ="";}

                                                            $DbMembers = mysqli_query($link, "SELECT COUNT(sppCode) AS HHs FROM tbljsg_hhs where groupID = '$gpID'"); 
                                                            $db = mysqli_fetch_assoc($DbMembers); 
                                                            $HHs = $db['HHs'];

                                                        echo "<tr>\n";
                                                            echo "<td>".$row["recID"]."</td>\n";
                                                            echo "<td>".$row["jsg_name"]."</td>\n";
                                                            echo "<td>\t\t$clustername</td>\n";
                                                            echo "<td>\t\t$membership</td>\n";
                                                            echo "<td>\t\t$HHs</td>\n";
                                                            
                                                            echo "<td>
                                                                <a href=\"jsg_view.php?id=".$row['recID']."\"><i class='far fa-eye' title='View JSG' style='font-size:18px;color:purple'></i></a>
                                                                <a href=\"jsg_edit.php?id=".$row['recID']."\"><i class='far fa-edit' title='Edit JSG Details' style='font-size:18px;color:green'></i></a>
                                                                <a href=\"jsg_add_hh.php?id=".$row['recID']."\"><i class='fas fa-user-alt' title='Add Beneficiary to JSG' style='font-size:18px;color:orange'></i></a> 
                                                                <a href=\"?".$row['recID']."\"><i class='fa fa-link' title='Link to COMSIV' style='font-size:18px;color:brown'></i></a> 
                                                                <a  onClick=\"javascript: return confirm('Are You Sure You want To Delete This JSG - You Must Be a Supervisor');\" href=\"jsg_delete.php?id=".$row['recID']."\"><i class='far fa-trash-alt' title='Delete JSG' style='font-size:18px;color:red'></i></a>    
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