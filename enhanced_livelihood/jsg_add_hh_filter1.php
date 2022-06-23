<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>JSG |Add New Household</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        // get id through query string
        $jsg_id = $_POST['jsg_id'];
        $groupID = $_POST['groupID'];
        $GroupName = $_POST['GroupName'];
        
        $district = $_POST['district'];
        $buscat = $_POST['buscat'];
        $bustype = $_POST['bustype'];
        

       

            $check = substr($groupID, 5, 3);
            
            if ($check == "CLU"){
                $rg_query = mysqli_query($link,"select regionID from tblcluster where ClusterID='$groupID'"); // select query
                while($rg = mysqli_fetch_array($rg_query)){
                $regionID = $rg['regionID'];}

                $name_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$groupID'"); // select query
                while($rg = mysqli_fetch_array($name_query)){
                $ClusterName = $rg['ClusterName'];}

            }
            if ($check == "SLG"){
                $rg_query = mysqli_query($link,"select regionID from tblgroup where groupID='$groupID'"); // select query
                while($rg = mysqli_fetch_array($rg_query)){
                $regionID = $rg['regionID'];}

                $grpname_query = mysqli_query($link,"select groupname from tblgroup where groupID='$groupID'"); // select query
                while($rg = mysqli_fetch_array($grpname_query)){
                $groupname = $rg['groupname'];}
            }

        
            function get_rname($link, $rcode)
            {
            $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
            while($rg = mysqli_fetch_array($rg_query)){
               return $rg['name'];
            };// fetch data
            
            }
    
            function dis_name($link, $disID)
            {
                $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
                while($dis = mysqli_fetch_array($dis_query)){
                return $dis['DistrictName'];
                };
            }

            function bus_cat($link, $catID)
            {
            $cat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
            $name = mysqli_fetch_array($cat_query);// fetch data
            return $name['catname'];
            }

            function bus_type($link, $typeID)
            {
            $cat_query = mysqli_query($link,"select name from tbliga_types where ID='$typeID'"); // select query
            $cat_name = mysqli_fetch_array($cat_query);// fetch data
            return $cat_name['name'];
            }

    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php include 'layouts/body.php'; ?>
    
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">JSG New Member</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_slg_mgt2.php">SLG Management</a></li>
                                    <li class="breadcrumb-item active">JSG Members</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">

                        <div class="card border border-success">
                            <div class="card-header bg-transparent border-success">
                                <h5 class="my-0 text-success">New Member for JSG : <?php echo $GroupName; ?></h5>
                            </div>
                            <div class="card-body">
                                
                                <form method="POST" action="jsg_add_hh_save.php">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="jsg_id" class="form-label">JSG ID</label>
                                                <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $jsg_id ; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="groupID" class="form-label">Group ID</label>
                                                <input type="text" class="form-control" id="groupID" name ="groupID" value = "<?php echo $groupID ; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="GroupName" class="form-label">SLG Name</label>
                                                <input type="text" class="form-control" id="GroupName" name="GroupName" value ="<?php if (isset($groupname)){echo $groupname;} ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="ClusterName" class="form-label">Cluster Name</label>
                                                <input type="text" class="form-control" id="ClusterName" name="ClusterName" value ="<?php if (isset($ClusterName)){echo $ClusterName;} ?>" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="district" class="form-label">District</label>
                                                <input type="text" class="form-control" id="district" name = "district" value="<?php echo $district; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="buscat" class="form-label">Business Category</label>
                                                <input type="text" class="form-control" id="buscat" name ="buscat" value = "<?php echo bus_cat($link,$buscat); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="bustype" class="form-label">Business Type</label>
                                                <input type="text" class="form-control" id="bustype" name="bustype" value ="<?php echo bus_type($link,$bustype); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hhcode" class="form-label">Household Code</label>
                                                
                                                <select class="form-select" name="hhcode" id="hhcode" required>
                                                    <option></option>
                                                        <?php
                                                        if (isset($groupname))
                                                            {
                                                                $dis_fetch_query = "SELECT sppCode FROM tblbeneficiaries where groupID = '$groupID'";                                                  
                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                $i=0;
                                                                    while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                ?>
                                                                <option value="<?php echo $DB_ROW_Dis["sppCode"]; ?>">
                                                                    <?php echo $DB_ROW_Dis["sppCode"]; ?></option><?php
                                                                    $i++;
                                                                    }
                                                            } else
                                                            {                                                           
                                                                $dis_fetch_query = "SELECT sppCode FROM tblbeneficiaries inner join tblgroup on tblbeneficiaries.groupID = tblgroup.groupID inner join
                                                                tblcluster on tblgroup.clusterID = tblcluster.ClusterID where tblcluster.ClusterID = '$groupID'";                                                  
                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                $i=0;
                                                                    while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                ?>
                                                                <option value="<?php echo $DB_ROW_Dis["sppCode"]; ?>">
                                                                    <?php echo $DB_ROW_Dis["sppCode"]; ?></option><?php
                                                                    $i++;
                                                                        }}
                                                        ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px" name="Submit" value="Submit" disabled><i class="fa fa-home"style="font-size:24px; color:brown"></i><i class="fa fa-home"style="font-size:24px; color:black"></i> HH List</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" name="Submit" value="Submit" ><i class="fa fa-save" style="font-size:24px; color:green"></i> Save Household </button>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-3">
                                            <div class="mb-0">
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px"  VALUE="Back"  onClick="history.go(-1);">
 
                                            </div>
                                        </div>
                                    </div>

                                    
                                </form>

                                
                                
                            </div>
                        </div>
                        
                    </div>
                </div>

                

                
            </div>
        </div>
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
    </div>
</div>