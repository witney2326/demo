<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>SLG | View Animator Training</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>

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

<?php include '././../../layouts/body.php'; 
      include '../lib2.php';
?>
<?php
        
       include "././../../layouts/config2.php"; // Using database connection file here
        
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblcluster where ClusterID='$id'";
        
        if ($result_set = $link_cs->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $ClusterName= $row["ClusterName"];
                $regionID = $row["regionID"];
                $DistrictID= $row["districtID"];
                $TAID= $row["taID"];
                $gvhID= $row["gvhID"];

            }
            
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
                    <div class="col-9">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP Animator Training</h4>
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
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row">
                                            
                                            

                                            <label for="cluster" class="col-sm-3 col-form-label">Cluster Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cluster" name="cluster" value ="<?php echo $ClusterName ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>

                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link_cs,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>

                                            
                                            
                                        </div>
                                        <div class="row mb-4">
                                            
                                        </div>
                                        <div class="row mb-4">
                                            <B>Training Status</B>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="gd" class="col-sm-3 col-form-label">Group Dynamics</label>
                                                
                                            <div class="col-sm-2">
                                            <?php
                                                    $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='01'))";
                                                    if ($result_set_GD = $link_cs->query($query_training)) {
                                                        while($row_GD = $result_set_GD->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $tGD = $row_GD["TrainingID"];
                                                            
                                                        } 
                                        
                                                    }     
                                                ?>

                                                <input type="checkbox"  id="gd" name="gd" <?php if (isset($tGD)){if($tGD  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                            </div>

                                            <label for="flt" class="col-sm-3 col-form-label">Financial Literacy</label>
                                                
                                            <div class="col-sm-2">
                                            <?php
                                                    $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='02'))";
                                                    if ($result_set_FLT = $link_cs->query($query_training)) {
                                                        while($row_FLT = $result_set_FLT->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $tFLT = $row_FLT["TrainingID"];
                                                            
                                                        } 
                                        
                                                    }     
                                                ?>

                                                <input type="checkbox"  id="flt" name="flt" <?php if (isset($tFLT)){if($tFLT  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                            </div>

                                            <label for="bmt" class="col-sm-3 col-form-label">Business Management</label>
                                                
                                            <div class="col-sm-2">
                                            <?php
                                                    $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='03'))";
                                                    if ($result_set_BMT = $link_cs->query($query_training)) {
                                                        while($row_BMT = $result_set_BMT->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $tBMT = $row_BMT["TrainingID"];
                                                            
                                                        } 
                                        
                                                    }     
                                                ?>

                                                <input type="checkbox"  id="bmt" name="bmt" <?php if (isset($tBMT)){if($tBMT  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                            </div>

                                            <label for="rk" class="col-sm-3 col-form-label">Record Keeping</label>
                                                
                                                <div class="col-sm-2">
                                                <?php
                                                        $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='04'))";
                                                        if ($result_set_RK = $link_cs->query($query_training)) {
                                                            while($row_RK = $result_set_RK->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tRK = $row_RK["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="rk" name="rk" <?php if (isset($tRK)){if($tRK  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="bk" class="col-sm-3 col-form-label">Book Keeping</label>
                                                
                                                <div class="col-sm-2">
                                                <?php
                                                        $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='05'))";
                                                        if ($result_set_BK = $link_cs->query($query_training)) {
                                                            while($row_BK = $result_set_BK->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tBK = $row_BK["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="bk" name="bk" <?php if (isset($tBK)){if($tBK  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="sg" class="col-sm-3 col-form-label">Safeguards</label>
                                                
                                                <div class="col-sm-2">
                                                <?php
                                                        $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='06'))";
                                                        if ($result_set_SG = $link_cs->query($query_training)) {
                                                            while($row_SG = $result_set_SG->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tSG = $row_SG["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="sg" name="sg" <?php if (isset($tSG)){if($tSG  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="gn" class="col-sm-3 col-form-label">Gender</label>
                                                
                                                <div class="col-sm-2">
                                                <?php
                                                        $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='07'))";
                                                        if ($result_set_GN = $link_cs->query($query_training)) {
                                                            while($row_GN = $result_set_GN->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tGN = $row_GN["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="gn" name="gn" <?php if (isset($tGN)){if($tGN  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="dra" class="col-sm-3 col-form-label">Disaster Risk Awareness</label>
                                                
                                                <div class="col-sm-2">
                                                <?php
                                                        $query_training="select TrainingID from tblanimatortrainings where ((clusterID='$id') and (TrainingTypeID ='08'))";
                                                        if ($result_set_DRA = $link_cs->query($query_training)) {
                                                            while($row_DRA = $result_set_DRA->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tDRA = $row_DRA["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="dra" name="dra" <?php if (isset($tDRA)){if($tDRA  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>


                                        </div>

                                        

                                        <div class="row justify-content-end">
                                            
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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

</body>

</html>