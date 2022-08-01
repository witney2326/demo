<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Graduation Tracking |Social Empowerment Update</title>
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
    font-family: aerial;
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
            $se_1 = $_POST['se_1'];
            $se_2 = $_POST['se_2'];
            $se_3 = $_POST['se_3'];
            $se_4 = $_POST['se_4'];
            $se_5 = $_POST['se_5_1']+$_POST['se_5_2']+$_POST['se_5_3'];
            $se_6 = $_POST['se_6'];

            $check = mysqli_query($link, "SELECT id FROM tblbeneficiaries_graduating where sppCode ='$id'"); 
            $row_check = mysqli_fetch_assoc($check); 
            $id_check = $row_check['id'];

            if  (empty($id_check))
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household NOT BEING TRACKED !");'; 
                echo 'window.location.href = "graduation_hh_tracking.php";';
                echo '</script>';
            }
            else
            {    
                $sql = "UPDATE tblbeneficiaries_graduating SET Participating_in_community_forums ='$se_1' ,Children_of_school_going_age_attending_school ='$se_2' ,Decision_making_involves_head_spouse ='$se_3', Shared_ownership_and_access_to_resources ='$se_4', State_of_dwelling_structure ='$se_5', Improved_general_HH_wellness_and_happiness ='$se_6' where sppCode =$id ";
                mysqli_query($link,$sql);  
            }
            if  (isset($id_check))
            {
                $sql2 = "INSERT INTO tblbeneficiaries_graduating_se (sppCode,Children_of_school_going_age_attending_school,Decision_making_involves_head_spouse,Shared_ownership_and_access_to_resources,State_of_dwelling_structure,Improved_general_HH_wellness_and_happiness)
                VALUES ('$id','$se_1','$se_2','$se_3','$se_4','$se_5','$se_6')";
                 
                if (mysqli_query($link, $sql2)) 
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Social Empowerement Record Updated Successfully!");'; 
                    echo 'window.location.href = "graduation_hh_tracking.php";';
                    echo '</script>';  
                } else {echo "Error: " . $sql . ":-" . mysqli_error($link);}
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

            function grp_name($link, $grp)
            {
                $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grp'"); // select query
                $gpname = mysqli_fetch_array($grp_query);// fetch data
                return $gpname['groupname'];
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
                            <h4 class="mb-sm-0 font-size-18">Graduation Tracking: Social Empowerment </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation_hh_tracking.php">graduation Tracking</a></li>
                                    <li class="breadcrumb-item active">Social Empowerment </li>
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
                                
                                <form method="POST" action="">

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
                                                <input type="text" class="form-control" id="GroupName" name="GroupName" value = "<?php echo grp_name($link,$groupID) ; ?>" readonly>
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
                                            <h5 class="my-0 text-success">Update Social Empowerment  For :<?php echo $hh_head_name; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="se_1" class="my-0 text-primary"><b>1. Participating in community groups/forums?</b></label>
                                                <input type="radio" name="se_1"
                                                value="0"> No<br>
                                                <input type="radio" name="se_1"
                                                value="2"> Yes      
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="se_2" class="my-0 text-primary"><b>2. Children of school going age attending school ?</b></label>
                                                <input type="radio" name="se_2"
                                                value="1"> None<br>
                                                <input type="radio" name="se_2"
                                                value="0"> No<br>
                                                <input type="radio" name="se_2"
                                                value="1"> Yes
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="se_3" class="my-0 text-primary"><b>3. Decision making involves both HH head and spouse?</b></label>
                                                <input type="radio" name="se_3"
                                                value="0"> One ONLY<br>
                                                <input type="radio" name="se_3"
                                                value="2"> Both<br>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="se_4" class="my-0 text-primary"><b>4. Shared ownership and access to resources</b></label>
                                                <input type="radio" name="se_4"
                                                value="0"> No<br>
                                                <input type="radio" name="se_4"
                                                value="2"> Yes<br>  
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="se_5" class="my-0 text-primary"><b>5. State of dwelling structure</b></label>
                                                <input type="checkbox" name="se_5_1"
                                                value="2"> Permanent roof <br>
                                                <input type="checkbox" name="se_5_2"
                                                value="1"> Permanent wall<br>
                                                <input type="checkbox" name="se_5_3"
                                                value="2"> Solid floor    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="se_6" class="my-0 text-primary"><b>6. Improved general HH wellness and happiness</b></label>
                                                <input type="radio" name="se_6"
                                                value="0"> Not Happy<br>
                                                <input type="radio" name="se_6"
                                                value="2"> Moderate<br>
                                                <input type="radio" name="se_6"
                                                value="4"> Very Happy
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px" name="Submit" value="Submit" ><i class="fa fa-save" style="font-size:24px; color:green"></i> Update SE</button>
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