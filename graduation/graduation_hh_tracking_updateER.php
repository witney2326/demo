<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Graduation Tracking |Economic Resilience Update</title>
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
            $er_1 = $_POST['er_1'];
            $er_2 = $_POST['er_2'];
            $er_3 = $_POST['er_3'];
            $er_4 = $_POST['er_4'];
            $er_5 = $_POST['er_5'];
            $er_6 = $_POST['er_6'];
            $er_7 = $_POST['er_7'];
            $er_8 = $_POST['er_8'];
            $er_9 = $_POST['er_9'];

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
                $sql = "UPDATE tblbeneficiaries_graduating SET savings_level = '$er_1',highest_loan_accessed = '$er_2',loan_repayment ='$er_3',credit_worthiness ='$er_4',income_sorce ='$er_5',access_to_formal_financial_services ='$er_6',value_productive_assets ='$er_7',value_consuption_assets ='$er_8',linked_to_service_provider ='$er_9'  where sppCode = '$id'";
                mysqli_query($link, $sql);
            }

            if  (isset($id_check))
            {
                $sql2 = "INSERT INTO tblbeneficiaries_graduating_er (sppCode,savings_level,highest_loan_accessed,loan_repayment,credit_worthiness,income_sorce,access_to_formal_financial_services,value_productive_assets,value_consuption_assets,linked_to_service_provider)
                VALUES ('$id','$er_1','$er_2','$er_3','$er_4','$er_5','$er_6','$er_7','$er_8','$er_9')";
                if (mysqli_query($link, $sql2)){
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Economic Resillience Record Updated Successfully!");'; 
                    echo 'window.location.href = "graduation_hh_tracking.php";';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
            }

                mysqli_close($link);
            
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
                            <h4 class="mb-sm-0 font-size-18">Graduation Tracking: Economic Resilience</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation_hh_tracking.php">graduation Tracking</a></li>
                                    <li class="breadcrumb-item active">Economic Resilience</li>
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
                                                <input type="text" class="form-control" id="district" name = "district" value="<?php echo dis_name($link,$districtID); ?>"readonly>
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
                                            <h5 class="my-0 text-success">Update Economic Resilience For :<?php echo $hh_head_name; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_1" class="my-0 text-primary"><b>1. Level of savings over past 12 months?</b></label>
                                                <input type="radio" name="er_1"    
                                                value="0"> 0 to K39,999.00<br>
                                                <input type="radio" name="er_1"
                                                value="2"> K40,000.00 to K59,999.00<br>
                                                <input type="radio" name="er_1"
                                                value="4"> K60,0000.00 and above
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_2" class="my-0 text-primary"><b>2. Highest loan accessed over past 12 months ?</b></label>
                                                <input type="radio" name="er_2"
                                                value="0"> 0 to K39,999.00<br>
                                                <input type="radio" name="er_2"
                                                value="2"> K40,000.00 to K59,999.00<br>
                                                <input type="radio" name="er_2"
                                                value="4"> K60,0000.00 and above
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_3" class="my-0 text-primary"><b>3. Loan Repayment?</b></label>
                                                <input type="radio" name="er_3"
                                                value="0"> 0 to 49.9% <br>
                                                <input type="radio" name="er_3"
                                                value="2"> 50% to 70%<br>
                                                <input type="radio" name="er_3"
                                                value="4"> above 70%
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_4" class="my-0 text-primary"><b>4. Credit worthiness</b></label>
                                                <input type="radio" name="er_4"
                                                value="0"> Defaulter<br>
                                                <input type="radio" name="er_4"
                                                value="4"> Non Defaulter<br>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_5" class="my-0 text-primary"><b>5. Sources of Income</b></label>
                                                <input type="radio" name="er_5"
                                                value="0"> Ganyu/SCT <br>
                                                <input type="radio" name="er_5"
                                                value="2"> 1<br>
                                                <input type="radio" name="er_5"
                                                value="4"> More than 2  
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_6" class="my-0 text-primary"><b>6. Accessing formal financial services</b></label>
                                                <input type="radio" name="er_6"
                                                value="0"> No<br>
                                                <input type="radio" name="er_6"
                                                value="2"> Yes                                                   
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_7" class="my-0 text-primary"><b>7. Value of productive assets</b></label>
                                                <input type="radio" name="er_7"
                                                value="0"> Less than K200,000.00 <br>
                                                <input type="radio" name="er_7"
                                                value="4"> Greater than or equal to K200,000.00   
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_8" class="my-0 text-primary"><b>8. Value of consumption assets-domestic items</b></label>
                                                <input type="radio" name="er_8"
                                                value="0"> Less than K50,000.00 <br>
                                                <input type="radio" name="er_8"
                                                value="4"> Greater than or equal to K200,000.00     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="er_9" class="my-0 text-primary"><b>9. HH linked to service provider</b></label>
                                                <input type="radio" name="er_9"
                                                value="0"> No <br>
                                                <input type="radio" name="er_9"
                                                value="2"> Yes<br>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px" name="Submit" value="Submit" ><i class="fa fa-save" style="font-size:24px; color:green"></i> Update ER</button>
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