<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>JSG | Edit Joint Skill Group</title>
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
    
      include "../layouts/config.php"; // Using database connection file here
      
      $id = $_GET['id']; // get id through query string
     $query="select * from tbljsg where recID='$id'";
      
      if ($result_set = $link->query($query)) {
          while($row = $result_set->fetch_array(MYSQLI_ASSOC))
          { 
              $jsg_name= $row["jsg_name"];
              $groupID= $row["groupID"];               
              $districtID= $row["districtID"];
              $bus_category= $row["bus_category"];
              $type= $row["type"];
              $no_male= $row["no_male"];
              $no_female = $row["no_female"]; 
              $initial_invest = $row["initial_invest"];               
          }
          $result_set->close();
      }

      
      function r_name($link, $rcode)
      {
      $region_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
      $dis = mysqli_fetch_array($region_query);// fetch data
      return $dis['name'];
      }

      

      function cls_name($link, $clscode)
      {
      $cls_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
      $cls = mysqli_fetch_array($cls_query);// fetch data
      return $cls['ClusterName'];
      }

      function grp_name($link, $grpcode)
      {
      $cls_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpcode'"); // select query
      $cls = mysqli_fetch_array($cls_query);// fetch data
      return $cls['groupname'];
      }

      function BusCat_name($link, $catID)
      {
      $BusCat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
      $BusCat = mysqli_fetch_array($BusCat_query);// fetch data
      return $BusCat['catname'];
      }
      function BusType_name($link, $typeID)
      {
      $BusType_query = mysqli_query($link,"select name from tbliga_types where ID='$typeID'"); // select query
      $BusType = mysqli_fetch_array($BusType_query);// fetch data
      return $BusType['name'];
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
                            <h4 class="mb-sm-0 font-size-18">Edit JSG</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="jsgs.php">JSG Management</a></li>
                                    <li class="breadcrumb-item active">JSG Members</li>
                                </ol>
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
                                    <h5 class="my-0 text-success">Edit Joint Skill Group: <?php echo $jsg_name; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="jsg_edit_save.php" method="POST" >
                                        <div class="row mb-1">
                                            <label for="jsg_id" class="col-sm-2 col-form-label">JSG ID</label>
                                            <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly>

                                            <label for="jsg_name" class="col-sm-2 col-form-label">JSG Name</label>
                                            <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $jsg_name ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="group_name" class="col-sm-2 col-form-label">Group Name</label>
                                            <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo grp_name($link,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                            
                                            <label for="cluster_name" class="col-sm-2 col-form-label">Cluster Name</label>
                                            <input type="text" class="form-control" id="cluster_name" name ="cluster_name" value = "<?php echo cls_name($link,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                                                                                                        
                                        <div class="row mb-1">
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <select class="form-select" name="district" id="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $districtID; ?>" ><?php echo dis_name($link,$districtID) ; ?></option>     
                                            </select>

                                            <label for="initialInvest" class="col-sm-2 col-form-label">Initial Invest</label>
                                            <input type="text" class="form-control" id="initialInvest" name ="initialInvest" value = "<?php echo $initial_invest; ?>" style="max-width:30%;">  
                                        </div>
                                        <div class="row mb-1">
                                            <label for="bus_category" class="col-sm-2 col-form-label">Bus Cat</label>
                                            <input type="text" class="form-control" id="bus_category" name="bus_category" value ="<?php echo BusCat_name($link,$bus_category); ?>" style="max-width:30%;" disabled ="True">
                                            
                                            <label for="type" class="col-sm-2 col-form-label">Bus Type</label>
                                            <input type="text" class="form-control" id="type" name="type" value ="<?php echo BusType_name($link,$type) ; ?>" disabled ="True" style="max-width:30%;" >
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="no_males" class="col-sm-2 col-form-label">No. Of Males</label>
                                            <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $no_male;?>" style="max-width:30%;">

                                            <label for="no_females" class="col-sm-2 col-form-label">No. Of Females</label>
                                            <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $no_female; ?>" style="max-width:30%;">
                                        </div>
                                        

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Edited Record</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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