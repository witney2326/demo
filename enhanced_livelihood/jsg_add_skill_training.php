<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>SLG Management</title>
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
<?php include '../lib.php'; ?>
<?php

// do check
if (($_SESSION["user_role"]== '05')) {
    $region = $_SESSION["user_reg"];
    $ta = $_SESSION["user_ta"];
    $district = $_SESSION["user_dis"];
     
} else if (($_SESSION["user_role"]== '04')) {
    $region = $_SESSION["user_reg"];
    $district = $_SESSION["user_dis"];
}else if (($_SESSION["user_role"]== '03')) {
    $region = $_SESSION["user_reg"];
}
?>
<?php   

$id = $_GET['id']; 

$query="select * from tbljsg where recID='$id'";
    
if ($result_set = $link->query($query)) {
    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
    { 
        $jsg_name= $row["jsg_name"];
        $groupID= $row["groupID"];
        $no_male = $row["no_male"];
        $no_female = $row["no_female"];
        $bds=$row["bds"];
        $bustype = $row["type"];
    }
    $result_set->close();
}
    $q2="select * from tbljsg_training_plan where jsgID='$id'";
    
if ($result_set = $link->query($q2)) {
    while($rw = $result_set->fetch_array(MYSQLI_ASSOC))
    { 
        $StartDate= $rw["StartDate"];
        $FinishDate= $rw["FinishDate"];
        
    }
    $result_set->close();

}  
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '../layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Skills Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_training.php">SLG Training Management</a></li>
                                    <li class="breadcrumb-item active">JSG Skills Training</li>
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
                                            <h5 class="my-0 text-default">Update JSG Training Record </h5>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form method="POST" action="jsg_training_add1.php">
                                                <div class="row mb-1">
                                                    <label for="jsg_id" class="col-sm-2 col-form-label">JSG ID</label>
                                                    <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                                    
                                                    <label for="jsg_name" class="col-sm-2 col-form-label">JSG Name</label>
                                                    <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $jsg_name ; ?>" style="max-width:30%;" readonly >
                                                </div>
                                                <div class="row mb-1">
                                                    <label for="groupid" class="col-sm-2 col-form-label">Group ID</label>
                                                    <input type="text" class="form-control" id="groupid" name="groupid" value ="<?php echo $groupID ; ?>" style="max-width:30%;" readonly >
                                                    
                                                    <label for="trainingtype" class="col-sm-2 col-form-label">Skill Type</label>
                                                    <select class="form-select" name="trainingtype" id="trainingtype" style="max-width:30%;" required>
                                                        <option selected value="<?php echo $bustype;?>"><?php echo iga_name($link,$bustype);?></option>
                                                    </select>
                                                </div>

                                                
                                                <div class="row mb-1">
                                                    <label for="trainedby" class="col-sm-2 col-form-label">Facilitated By</label>
                                                    <select class="form-select" name="trainedby" id="trainedby" style="max-width:30%;" required>
                                                        <option selected value="<?php echo $bds;?>"><?php echo bdsname($link,$bds)?></option>
                                                    </select>
                                                </div>

                                                <div class="row mb-1">
                                                    <label for="malesn" class="col-sm-2 col-form-label">Males Trained</label>
                                                    <input type="number" class="form-control" id="malesn" name="malesn" min="0" max="300" value ="<?php echo $no_male;?>" style="max-width:30%;">
                                                
                                                    <label for="femalesn" class="col-sm-2 col-form-label">Females</label>
                                                    <input type="number" class="form-control" id="femalesn" name="femalesn" min="0" max="300" value ="<?php echo $no_female;?>" style="max-width:30%;"> 
                                                </div>

                                            

                                                <div class="row mb-4">
                                                    <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>   
                                                    <input type="date" class="form-control" id="startdate" name="startdate" value ="<?php echo $StartDate;?>" style="max-width:30%;">
                                                    
                                                    <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>                              
                                                    <input type="date" class="form-control" id="finishdate" name="finishdate" value ="<?php echo $FinishDate;?>" style="max-width:30%;"> 
                                                </div>

                                                
                                                <div class="row justify-content-end">
                                                    
                                                        <div>
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