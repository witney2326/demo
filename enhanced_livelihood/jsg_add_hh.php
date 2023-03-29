<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>JSG |Add New Household</title>
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
              $groupID= $row["groupID"];
              $districtID= $row["districtID"];
              $jsg_name= $row["jsg_name"];
              $bus_category= $row["bus_category"];
              $type = $row["type"];
          }
          $result_set->close();
      }

      if(isset($_POST['Submit']))
      {    
          $groupID = $_POST['groupID'];
          $DistrictID = $_POST['district'];
          $jsgID = $_POST['jsg_id'];
          $hhcode = $_POST['hhcode'];

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
                            <h4 class="mb-sm-0 font-size-18">JSG New Member</h4>

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

                        <div class="card border border-success">
                            <div class="card-header bg-transparent border-success">
                                <h5 class="my-0 text-success">New Member for :<?php echo $jsg_name; ?></h5>
                            </div>
                            <div class="card-body">
                                
                                <form method="POST" action="jsg_add_hh_filter1.php">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="jsg_id" class="form-label">JSG ID</label>
                                                <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $id ; ?>"readonly>
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
                                                <label for="buscat" class="form-label">Business Category</label>
                                                <input type="text" class="form-control" id="buscat" name ="buscat" value = "<?php echo $bus_category; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="bustype" class="form-label">Business Type</label>
                                                <input type="text" class="form-control" id="bustype" name="bustype" value ="<?php echo $type ; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="hhcode" class="form-label">Household Code</label>
                                                
                                                <select class="form-select" name="hhcode" id="hhcode" required disabled>
                                                    <option></option>
                                                        <?php                                                           
                                                            $dis_fetch_query = "SELECT sppCode FROM tblbeneficiaries inner join tblgroup on tblbeneficiaries.groupID = tblgroup.groupID inner join
                                                            tblcluster on tblgroup.clusterID = tblcluster.ClusterID where tblcluster.ClusterID = $groupID";                                                  
                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_Dis["sppCode"]; ?>">
                                                                <?php echo $DB_ROW_Dis["sppCode"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px" name="Submit" value="Submit"><i class="fa fa-home"style="font-size:24px; color:brown"></i> <i class="fa fa-home"style="font-size:24px; color:black"></i> HH List</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px" name="Submit" value="Submit" disabled><i class="fa fa-save" style="font-size:24px; color:green"></i> Save Household </button>
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