<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG |Add New Beneficiary</title>
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
        
        $clusterID = $_POST["cluster_id"];
        $clusterName = $_POST["cluster_name"];
        $region = $_POST["region"];
        $district = $_POST["district"];
        $ta = $_POST["ta"];
        $gvh = $_POST["gvh"];
        $cfgender = $_POST["cfgender"];
        $cfName = $_POST["cfName"];
        $cfgrp = $_POST["cfgrp"];
        $phone = $_POST["phone"];
        
              

        if(isset($_POST['Submit']))
            {    
                $cf_gender = $_POST['cfgender'];
                $cluster_id = $_POST['cluster_id'];
                $cf_Name = $_POST['cfName'];
                $hhcode = $_POST['hhcode'];
                $cf_phone = $_POST['phone'];

                if  (empty($hhcode))
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Please Enter CF Household code !");'; 
                    echo 'window.location.href = "graduation_cluster_cf_identification.php";';
                    echo '</script>';
                }
                else
                {
                    $sql = "INSERT INTO tblcfs (hhcode,cfName,clusterID,gender,phone,deleted)
                    VALUES ('$hhcode','$cf_Name','$cluster_id','$cf_gender','$cf_phone','0')";
                    if (mysqli_query($link, $sql)) {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("NEW CF Record has been added successfully !");'; 
                        echo 'window.location.href = "graduation_cluster_cf_identification.php";';
                        echo '</script>';
                    } else {
                        echo "Error: " . $sql . ":-" . mysqli_error($link);
                    }
                    mysqli_close($link);
                }
            }
        
            function get_rname($link, $rcode)
                {
                    $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
                    while($rg = mysqli_fetch_array($rg_query)){
                    return $rg['name'];
                    };
                }

            function get_clustername($link, $rcode)
                {
                    $rg_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$rcode'"); // select query
                    while($rg = mysqli_fetch_array($rg_query)){
                    return $rg['ClusterName'];
                    };
                }

            function get_groupname($link, $rcode)
            {
                $rg_query = mysqli_query($link,"select groupname from tblgroup where groupID='$rcode'"); // select query
                while($rg = mysqli_fetch_array($rg_query)){
                return $rg['groupname'];
                };
            }

            function get_disID($link, $code)
                {
                    $rg_query = mysqli_query($link,"select districtID from tblcluster where ClusterID='$code'"); // select query
                    while($rg = mysqli_fetch_array($rg_query)){
                    return $rg['districtID'];
                    };
                }

            function get_regionID($link, $code)
                {
                    $rg_query = mysqli_query($link,"select regionID from tblcluster where ClusterID='$code'"); // select query
                    while($rg = mysqli_fetch_array($rg_query)){
                    return $rg['regionID'];
                    };
                }

            function get_gvhID($link, $code)
                {
                    $rg_query = mysqli_query($link,"select gvhID from tblcluster where ClusterID='$code'"); // select query
                    while($rg = mysqli_fetch_array($rg_query)){
                    return $rg['gvhID'];
                    };
                }
    
            function get_taID($link, $code)
                {
                    $rg_query = mysqli_query($link,"select taID from tblcluster where ClusterID='$code'"); // select query
                    while($rg = mysqli_fetch_array($rg_query)){
                    return $rg['taID'];
                    };
                }

            function dis_name($link, $disID)
                {
                $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
                    while($dis = mysqli_fetch_array($dis_query)){
                    return $dis['DistrictName'];
                    };// fetch data
                }

            function ta_name($link, $taID)
            {
            $dis_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
            $tame = mysqli_fetch_array($dis_query);// fetch data
            return $tame['TAName'];
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
                            <h4 class="mb-sm-0 font-size-18">Cluster New Community Facilitator</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation_cluster_cf_identification.php">Graduation CF Identification</a></li>
                                    <li class="breadcrumb-item active">Graduation</li>
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
                                <h5 class="my-0 text-success">New CF for :<?php echo $clusterName; ?> Cluster</h5>
                            </div>
                            <div class="card-body">
                                
                                <form method="POST" action="">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="cluster_id" class="form-label">Cluster ID</label>
                                                <input type="text" class="form-control" id="cluster_id" name = "cluster_id" value="<?php echo $clusterID ; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="cluster_name" class="form-label">Cluster Name</label>
                                                <input type="text" class="form-control" id="cluster_name" name ="cluster_name" value = "<?php echo $clusterName ; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="region" class="form-label">Region</label>
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo $region ; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="district" class="form-label">District</label>
                                                <input type="text" class="form-control" id="district" name = "district" value="<?php echo $district; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ta" class="form-label">Traditional Authority</label>
                                                <input type="text" class="form-control" id="ta" name ="ta" value = "<?php echo ta_name($link,$ta); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="gvh" class="form-label">Group Village Head</label>
                                                <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvh ; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="cfgender" class="form-label">Gender</label>
                                                 <select class="form-select" id="cfgender" name ="cfgender" required>
                                                     <option selected value="<?php echo $cfgender;?>"><?php echo $cfgender;?></option>
                                                 </select>   
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="spp_programme" class="form-label">CF Name</label>
                                                <input type="text" class="form-control" id="cfName" name="cfName" value = "<?php echo $cfName;?>" readonly>                              
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="cfgrp" class="form-label">CF Group</label>
                                                <select class="form-select" id="cfgrp" name ="cfgrp" required>
                                                    <option selected value="<?php echo $cfgrp;?>"><?php echo get_groupname($link,$cfgrp);?></option>                                               
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">CF Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value = "<?php echo $phone;?>" required readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hhcode" class="form-label">CF HH Code</label>
                                                <select class="form-select" id="hhcode" name ="hhcode" >
                                                    <?php                                                           
                                                        $spp_fetch_query = "SELECT sppCode FROM tblbeneficiaries where groupID = '$cfgrp'";                                                  
                                                        $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                        ?>
                                                        <option value ="<?php echo $DB_ROW_spp["sppCode"]; ?>">
                                                            <?php echo $DB_ROW_spp["sppCode"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                                </select>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-0">
                                        <div class="mb-3">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-success w-md" style="width:170px" name="Submit" value="Submit">Save New CF</button>   
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px" VALUE="Back" onClick="history.go(-1);"> 
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