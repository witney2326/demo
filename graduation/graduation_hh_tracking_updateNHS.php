<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Graduation Tracking |Nutrition Health & Sanitation Update</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

<style>
    .container {
    max-width: 300px;
    margin: 50px auto;
    text-align: left;
    font-family: sans-serif;
}
select {
    width: 100%;
    min-height: 150px;
    margin-bottom: 20px;
}
label,input[type="radio"] {
    position: relative;
    padding-left: 50px;
display:inline-block;
}
label {
    display: block;
    position: relative;
    cursor: pointer;
    font-size: 12px;
    padding-left: 30px;
    margin-bottom: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
label input {
    position: absolute;
    opacity: 0;
    
    cursor: pointer;
}

</style>
</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; 
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblbeneficiaries where sppCode='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupID= $row["groupID"];               
                $regionID= $row["regionID"];
                $districtID= $row["districtID"];
                $hh_head_name= $row["hh_head_name"];
                //$sex= $row["sex"];
               
            }
            $result_set->close();
        }

        if(isset($_POST['Submit']))
        {    
            $groupID = $_POST['groupID'];
            $DistrictID = $_POST['district'];
            $groupID = $_POST['groupID'];
            $sppCode = $_POST['sppCode'];

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
            }

            if  (empty($hhcode))
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Please Enter Household code !");'; 
                echo 'window.location.href = "jsg_clusters.php";';
                echo '</script>';
            }
            else
            {
                $sql = "INSERT INTO tbljsg_hhs (sppCode,jsgID,regionID,districtID,groupID)
                VALUES ('$hhcode','$jsgID','$regionID','$DistrictID','$groupID')";
                if (mysqli_query($link, $sql)) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("JSG Member Record has been added successfully !");'; 
                    echo 'window.location.href = "jsg_clusters.php";';
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
            };// fetch data
            
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
                            <h4 class="mb-sm-0 font-size-18">Graduation Tracking: Nutrition Health & Sanitation</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation_hh_tracking.php">graduation Tracking</a></li>
                                    <li class="breadcrumb-item active">Nutrition Health & Sanitation</li>
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
                                
                            </div>
                            <div class="card-body">
                                
                                <form method="POST" action="jsg_add_hh_filter1.php">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="sppCode" class="form-label">Household Code</label>
                                                <input type="text" class="form-control" id="sppCode" name = "sppCode" value="<?php echo $id ; ?>"readonly>
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
                                                <input type="text" class="form-control" id="GroupName" name="GroupName"  readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="ClusterName" class="form-label">Cluster Name</label>
                                                <input type="text" class="form-control" id="ClusterName" name="ClusterName"  readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="district" class="form-label">District</label>
                                                <input type="text" class="form-control" id="district" name = "district" value="<?php echo $districtID; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Household Head Sex</label>
                                                <input type="text" class="form-control" id="gender" name ="gender" value = "" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hhage" class="form-label">Household Head Age</label>
                                                <input type="text" class="form-control" id="hhage" name="hhage" value ="" readonly>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h5 class="my-0 text-success">Update Nutrition and Health For :<?php echo $hh_head_name; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_1" class="my-0 text-primary"><b>1. Food groups consumed over past 7 days( dietary diversification)</b></label>
                                                <input type="radio" name="nh_1"
                                                    <?php if (isset($nh_1) && $nh_1=="0") echo "checked";?>
                                                    value="0"> less than 4<br>
                                                    <input type="radio" name="nh_1"
                                                    <?php if (isset($nh_1) && $nh_1=="2") echo "checked";?>
                                                    value="2"> 4<br>
                                                    <input type="radio" name="nh_1"
                                                    <?php if (isset($nh_1) && $nh_1=="4") echo "checked";?>
                                                    value="4"> above 4
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_2" class="my-0 text-primary"><b>2. Availability of vegetable garden ?</b></label>
                                                <input type="radio" name="nh_2"
                                                    <?php if (isset($nh_2) && $er_2=="0") echo "checked";?>
                                                    value="0"> No<br>
                                                    <input type="radio" name="nh_2"
                                                    <?php if (isset($nh_2) && $nh_2=="2") echo "checked";?>
                                                    value="2"> Yes<br>
                                                    
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_3" class="my-0 text-primary"><b>3. Availability of small livestock?</b></label>
                                                <input type="radio" name="nh_3"
                                                    <?php if (isset($nh_3) && $nh_3=="0") echo "checked";?>
                                                    value="0"> No <br>
                                                    <input type="radio" name="nh_3"
                                                    <?php if (isset($nh_3) && $nh_3=="2") echo "checked";?>
                                                    value="2"> Yes<br>
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_4" class="my-0 text-primary"><b>4. Availability of pit latrine</b></label>
                                                <input type="radio" name="nh_4"
                                                    <?php if (isset($er_4) && $nh_4=="0") echo "checked";?>
                                                    value="0"> No<br>
                                                    <input type="radio" name="nh_4"
                                                    <?php if (isset($nh_4) && $nh_4=="2") echo "checked";?>
                                                    value="2"> Yes<br>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_5" class="my-0 text-primary"><b>5. Access to safe drinking water</b></label>
                                                <input type="radio" name="nh_5"
                                                    <?php if (isset($nh_5) && $nh_5=="0") echo "checked";?>
                                                    value="0"> No <br>
                                                    <input type="radio" name="nh_5"
                                                    <?php if (isset($nh_5) && $nh_5=="2") echo "checked";?>
                                                    value="2"> Yes<br>
                                                    
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_6" class="my-0 text-primary"><b>6. Other hygiene behaviour- mponda-gear, mosquito nets</b></label>
                                                <input type="radio" name="nh_6"
                                                    <?php if (isset($nh_6) && $nh_6=="0") echo "checked";?>
                                                    value="0"> No<br>
                                                    <input type="radio" name="nh_6"
                                                    <?php if (isset($nh_6) && $nh_6=="2") echo "checked";?>
                                                    value="2"> Yes
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_7" class="my-0 text-primary"><b>7. Access to medical health  care</b></label>
                                                <input type="radio" name="nh_7"
                                                    <?php if (isset($nh_7) && $nh_7=="0") echo "checked";?>
                                                    value="0"> No <br>
                                                    <input type="radio" name="nh_7"
                                                    <?php if (isset($nh_7) && $er_5=="2") echo "checked";?>
                                                    value="2"> Yes<br>  
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nh_8" class="my-0 text-primary"><b>8. Perceived malnutrition</b></label>
                                                <input type="radio" name="nh_8"
                                                    <?php if (isset($nh_8) && $nh_8=="0") echo "checked";?>
                                                    value="0"> No<br>
                                                    <input type="radio" name="nh_8"
                                                    <?php if (isset($nh_8) && $nh_8=="2") echo "checked";?>
                                                    value="2"> Yes
                                                    
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px" name="Submit" value="Submit" disabled><i class="fa fa-save" style="font-size:24px; color:green"></i> Update ER</button>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-2">
                                            <div class="mb-3">
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