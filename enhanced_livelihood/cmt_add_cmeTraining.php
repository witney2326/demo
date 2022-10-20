<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Training Management</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
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

?>
<?php   

$id = $_GET['id']; 

$check = substr($id, 5, 3);
                                                        
//if (($check == "CLU") or ($check == "CLS"))

if (($check == "SLG"))
{
    $query="select * from tblgroup where groupID='$id'";
        
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { 
            $groupname= $row["groupname"];
            $regionID = $row["regionID"];
            $DistrictID= $row["DistrictID"];
            $TAID= $row["TAID"];
            $gvhID= $row["gvhID"];
            $cohort = $row["cohort"];
            $type = "SL Group";
        }
        $result_set->close();
    }
    
}

if (($check == "CLU") or ($check == "CLS"))
{
    $query="select * from tblcluster where ClusterID='$id'";
        
    if ($result_set = $link->query($query)) {
        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
        { 
            $groupname= $row["ClusterName"];
            $regionID = $row["regionID"];
            $DistrictID= $row["districtID"];
            $TAID= $row["taID"];
            $gvhID= $row["gvhID"];
            $cohort = $row["cohort"];
            $type = "Cluster";
        }
        $result_set->close();
    }
    
}

if(isset($_POST['reg']))
{
    if (($check == "CLU") or ($check == "CLS"))
    {
        $sql_cls_update = "UPDATE tblcluster SET cmt_cme_trained ='1' WHERE ClusterID=$id";
        $link->query($sql_cls_update);
    }else
    {
        $sql_grp_update = "UPDATE tblgroup SET cmt_cme_trained='1' WHERE groupID=$id";
        $link->query($sql_grp_update);
    }

}

if(isset($_POST['Submit']))
    {
        
    $groupID = $_POST['group_id'];
    $DistrictID = $_POST['district'];
    $trainingtype = $_POST['trainingtype'];
    $startdate = $_POST['startdate'];
    $finishdate = $_POST['finishdate'];
    $malesn = $_POST['malesn'];
    $femalesn = $_POST['femalesn'];
    $trainedby = $_POST['trainedby'];

        $sql = "INSERT INTO tblgrouptrainings (regionID,districtID,groupID,TrainingTypeID,StartDate,FinishDate,trainedBy,Males,Females)
        VALUES ('$regionID ','$DistrictID','$id','$trainingtype','$startdate','$finishdate','$trainedby','$malesn','$femalesn')";
    if (mysqli_query($link, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("SLG Training Record has been added successfully !");'; 
        echo 'window.location.href = "cmt_training_registration_check.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
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

    function ta_name($link, $taID)
    {
    $dis_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
    $tame = mysqli_fetch_array($dis_query);// fetch data
    return $tame['TAName'];
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
                            <h4 class="mb-sm-0 font-size-18">CME Training Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="cmt_training_registration_check.php">CME Training Management</a></li>
                                    <li class="breadcrumb-item active">SLG Training</li>
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
                                
                                <div class="col-lg-9">
                                    <div class="card border border-success">
                                        <div class="card-header bg-transparent border-success">
                                            <h5 class="my-0 text-default">CME Training Record </h5>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form method="POST" action="">
                                                <div class="row mb-1">
                                                    <label for="group_id" class="col-sm-2 col-form-label">Group ID</label>
                                                    <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                                    
                                                    <label for="group_name" class="col-sm-2 col-form-label">SL Group Name</label>
                                                    <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;" readonly >
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="region" class="col-sm-2 col-form-label">Region</label>
                                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" readonly >
                                                    
                                                    <label for="district" class="col-sm-2 col-form-label">District</label>
                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php echo $DistrictID ; ?>" style="max-width:30%;" readonly >
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                                    <input type="text" class="form-control" id="cohort" name="cohort" value ="<?php echo $cohort ; ?> " style="max-width:30%;" readonly >
                                                    
                                                    <label for="trainingtype" class="col-sm-2 col-form-label">Training Type</label>
                                                    <select class="form-select" name="trainingtype" id="trainingtype" style="max-width:30%;" required>
                                                       
                                                        <?php                                                           
                                                        $tt_fetch_query = "SELECT trainingTypeID, training_name FROM tbltraining_types where trainingTypeID = '14'";                                                  
                                                        $result_tt_fetch = mysqli_query($link, $tt_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_tt = mysqli_fetch_array($result_tt_fetch)) {
                                                        ?>
                                                        <option value ="<?php
                                                                echo $DB_ROW_tt["trainingTypeID"];?>">
                                                            <?php
                                                                echo $DB_ROW_tt["training_name"];
                                                            ?>
                                                        </option>
                                                        <?php
                                                            $i++;
                                                                }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="trainedby" class="col-sm-2 col-form-label">Facilitated By</label>
                                                    <select class="form-select" name="trainedby" id="trainedby" style="max-width:30%;" required>
                                                        <option selected value="05">Min Of Trade</option>
                                                    </select>

                                                    <label for="type" class="col-sm-2 col-form-label">Group Type</label>
                                                    <input type="text" class="form-control" id="type" name="type" value ="<?php echo $type ; ?>" style="max-width:30%;" readonly >

                                                </div>

                                                <div class="row mb-1">
                                                    <label for="malesn" class="col-sm-2 col-form-label">Males Trained</label>
                                                    <input type="number" class="form-control" id="malesn" name="malesn" min="0" max="300" value ="" style="max-width:30%;">
                                                
                                                    <label for="femalesn" class="col-sm-2 col-form-label">Females</label>
                                                    <input type="number" class="form-control" id="femalesn" name="femalesn" min="0" max="300" value ="" style="max-width:30%;"> 
                                                </div>

                                            

                                                <div class="row mb-4">
                                                    <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>   
                                                    <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;">
                                                    
                                                    <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>                              
                                                    <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;"> 
                                                </div>

                                                
                                                <div class="row justify-content-end">
                                                    
                                                        <div>
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="reg" value="reg">Register Group</button>
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Record</button>
                                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    
                                                </div>
                                            </form>
                                            
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