<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG | Edit SL Group</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

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
      include "../layouts/config2.php"; // Using database connection file here
        
      $id = $_GET['id']; // get id through query string
     $query="select * from tblgroup where groupID='$id'";
      
      if ($result_set = $link_cs->query($query)) {
          while($row = $result_set->fetch_array(MYSQLI_ASSOC))
          { 
              $groupname= $row["groupname"];
              $DateEstablished= $row["DateEstablished"];
              $regionID = $row["regionID"];
              $DistrictID= $row["DistrictID"];
              $TAID= $row["TAID"];
              $gvhID= $row["gvhID"];
              $MembersM= $row["MembersM"];
              $MembersF = $row["MembersF"];
              $clusterID = $row["clusterID"]; 
              $catchment = $row["catchment"]; 

          }
          $result_set->close();
      }
      include "lib2.php";
           
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
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP SLG Edit</h4>
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

                        <?php include '../layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">Edit SLG: <?php echo $groupname; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="basicSLGedit_save_csepwp.php" method="POST" >

                                        <div class="row mb-1">
                                            <label for="group_id" class="col-sm-2 col-form-label">Group ID</label>
                                            <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;">

                                            <label for="group_name" class="col-sm-2 col-form-label">SL Group Name</label>
                                            <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;">   
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="date_formed" class="col-sm-2 col-form-label">Date Formed</label>
                                            <input type="text" class="form-control" id="date_formed" name="date_formed" value ="<?php echo $DateEstablished ; ?>" style="max-width:30%;">

                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                            <select class="form-select" name="region" id="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" required>
                                                    <option selected value="$region" ><?php echo r_name($link_cs,$regionID) ; ?></option>       
                                            </select>
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <select class="form-select" name="district" id="district" value ="<?php echo $DistrictID ; ?>" style="max-width:30%;" required>
                                                <option selected value="$DistrictID" ><?php echo dis_name($link_cs,$DistrictID) ; ?></option>      
                                            </select>
                                              
                                            <label for="ta" class="col-sm-2 col-form-label">TA</label>
                                            <select class="form-select" name="ta" id="ta" value ="<?php echo $TAID ; ?>" style="max-width:30%;" required>
                                                <option selected value="$TAID" ><?php echo ta_name($link_cs,$TAID) ; ?></option>
                                                    <?php                                                           
                                                        $ta_fetch_query = "SELECT TAID,TAName FROM tblta where DistrictID ='$DistrictID'";                                                  
                                                        $result_ta_fetch = mysqli_query($link_cs, $ta_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                        ?>
                                                        <option value="<?php echo $DB_ROW_ta["TAID"]; ?>">
                                                            <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                            </select>                                          
                                        </div>
                                       
                                        <div class="row mb-1">
                                            <label for="gvh" class="col-sm-2 col-form-label">GVH</label>
                                            <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" style="max-width:30%;" >
                                            <label for="catchment" class="col-sm-2 col-form-label">Catchment</label>
                                            <input type="text" class="form-control" id="catchment" name="catchment" value ="<?php echo $catchment ; ?>" style="max-width:30%;" >

                                                   
                                        </div>

                                        <div class="row mb-1">
                                            <label for="no_males" class="col-sm-2 col-form-label">No. Of Males</label>
                                            <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $MembersM ; ?>" style="max-width:30%;" >
                                            
                                            <label for="no_females" class="col-sm-2 col-form-label">No. Of Females</label>
                                            <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $MembersF ; ?>" style="max-width:30%;">
                                        </div>

                                        <div class="row mb-1">
                                            <label for="cluster" class="col-sm-2 col-form-label">Cluster Name</label>
                                            <select class="form-select" name="cluster" id="cluster" value ="<?php echo $clusterID ; ?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $clusterID ; ?>" ><?php echo cls_name($link_cs,$clusterID) ; ?></option>
                                                    <?php                                                           
                                                        $cls_fetch_query = "SELECT ClusterID,ClusterName FROM tblcluster where taID ='$TAID'";                                                  
                                                        $result_cls_fetch = mysqli_query($link_cs, $cls_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_cls = mysqli_fetch_array($result_cls_fetch)) {
                                                        ?>
                                                        <option value="<?php echo $DB_ROW_cls["ClusterID"]; ?>">
                                                            <?php echo $DB_ROW_cls["ClusterName"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                            </select>
                                               
                                            

                                            <label for="clusterID" class="col-sm-2 col-form-label">Cluster ID</label>
                                            <input type="text" class="form-control" id="clusterID" name="clusterID" value =" <?php echo $clusterID ; ?>" style="max-width:30%;" readonly>
                                        </div>

                                        <div class="row mb-2">

                                        </div>
                                        <div class="row justify-content-end">
                                            
                                                <div >
                                                    <button type="submit" class="btn btn-btn btn-outline-success w-md" name="Submit" value="Submit">Save Edited Record</button>
                                                    
                                                </div>
                                            
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

</body>

</html>