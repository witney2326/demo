<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG Management</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
    <?php include 'lib.php'; ?>
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
if (($_SESSION["user_role"]= '05')) {
    $region = $_SESSION["user_reg"];
    $ta = $_SESSION["user_ta"];
    $district = $_SESSION["user_dis"];
     
} else
{
    $region = $_POST['region'];
    $district = $_POST['district'];
    $ta = $_POST['ta'];
}
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
        echo 'history.go(-2)';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
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
                            <h4 class="mb-sm-0 font-size-18">Training Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_training.php">SLG Training Management</a></li>
                                    <li class="breadcrumb-item active">SLG Training</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-lg-9">
                                    <div class="card border border-success">
                                        <div class="card-header bg-transparent border-success">
                                            <h5 class="my-0 text-default">Update Training Record </h5>
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
                                                        <option></option>
                                                        <?php                                                           
                                                        $tt_fetch_query = "SELECT trainingTypeID, training_name FROM tbltraining_types";                                                  
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
                                                        <option></option>
                                                        <?php                                                           
                                                        $fc_fetch_query = "SELECT facilitatorID, title FROM tblfacilitator";                                                  
                                                        $result_fc_fetch = mysqli_query($link, $fc_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_fc = mysqli_fetch_array($result_fc_fetch)) {
                                                        ?>
                                                        <option value ="<?php
                                                                echo $DB_ROW_fc["facilitatorID"];?>">
                                                            <?php
                                                                echo $DB_ROW_fc["title"];
                                                            ?>
                                                        </option>
                                                        <?php
                                                            $i++;
                                                                }
                                                        ?>
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
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Record</button>
                                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>

                                    <div class="card border border-success">
                                        <div class="card-header bg-transparent border-success">
                                            <h5 class="my-0 text-default">Training Record For <?php echo $groupname ; ?></h5>
                                        </div>
                                        <div class="card-body">

                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                <thead>
                                                    <tr>
                                                        <th>Training code</th>
                                                        <th>Training Type</th>
                                                        <th>Males</th>
                                                        <th>Females</th>
                                                        <th>SDate</th>
                                                        <th>FDate</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?Php
                                                        $query="select * from tblgrouptrainings where (groupID ='$id ')";
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                          
                                                        echo "<tr>\n";
                                                            echo "<td>".$row["TrainingID"]."</td>\n";
                                                            echo "<td>".training_type($link,$row["TrainingTypeID"])."</td>\n";
                                                            echo "<td>".$row["Males"]."</td>\n";
                                                            echo "<td>".$row["Females"]."</td>\n";
                                                            echo "<td>".$row["StartDate"]."</td>\n";
                                                            echo "<td>".$row["FinishDate"]."</td>\n";

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