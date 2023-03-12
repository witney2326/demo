<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG Management</title>
    <?php include 'layouts/head.php';?>
    <?php include 'layouts/head-style.php';?>
    <?php include 'layouts/config.php';?>
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

<script>
      function getDistrict(val) 
        {
            $.ajax({
            type: "POST",
            url: "get_district.php",
            data:'regID='+val,
            success: function(data)
                    {
                    $("#district").html(data);
                    }
                });
        }
        function getTa(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_ta.php",
                data:'disid='+val,
                success: function(data){
                $("#ta").html(data);
                }
                });
            }

    </script>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">SLG Qualification Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood to Enhanced Livelihood Criteria</a></li>
                                    <li class="breadcrumb-item active">Set Criteria</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <?php
                  $previous = "javascript:history.go(-1)";
                  if(isset($_SERVER['HTTP_REFERER'])) {
                      $previous = $_SERVER['HTTP_REFERER'];
                  }
                ?>
                
                <div style="margin-bottom:20px">
                  <a href="basic_enhanced_criteria.php"><button type="button" class="btn btn-primary">Back</button></a>
                </div>
                
                <div class="row">
                    <div class="col-xl-4">
                            <div class="card" style="width:250px;margin-left:0px;">
                                <div class="card-head" style="background:#6b4cf2;color:white;height:50px">
                                    <h4 style="color:white;text-align:center;padding-top:13px;">Sellect Criteria Setting</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="group_records.php?id=<?php echo $_GET["id"]; ?>">Records Keeping</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="group_constitution.php?id=<?php echo $_GET["id"]; ?>">Group Constitution</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="functional_committees.php?id=<?php echo $_GET["id"]; ?>">Functional Committees</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="businesses.php?id=<?php echo $_GET["id"]; ?>">Individual Businesses</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="sanitation.php?id=<?php echo $_GET["id"]; ?>">Sanitary Interventions</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                        </div>

                        <div class="col-xl-8">
                        <div class="card" style="width:100%;margin-left:0px;">
                                <div class="card-head" style="background:#61C274;color:white;height:50px">
                                    <h4 style="color:white;text-align:center;padding-top:13px;">View Group Details</h4>
                                </div>
                                <div class="card-body">
                                    <?php 
                                    $id = $_GET["id"];
                                    $sql40 = "SELECT * FROM bl_el_criteria WHERE groupID='$id'";
                                    $result40 = $link->query($sql40);
                                    while($row40 = $result40->fetch_array(MYSQLI_ASSOC)){ ?>
                                        <div style="display:grid;grid-template-columns: 1fr 1fr 1fr 1fr">
                                        <div>
                                            <h4>Region</h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["regionName"] ?></p>
                                        </div>
                                        <div>
                                            <h4>District</h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["DistrictName"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Ta</h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["TAName"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Group ID </h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["groupID"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Group Name </h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["groupname"] ?></p>
                                        </div>
                                        <?php 
                                          $cid = $row40["clusterID"];
                                          
                                          $sql41 = "SELECT * FROM tblcluster WHERE ClusterID='$cid'";
                                          $result41 = $link->query($sql41);
                                          $row41 = $result41->fetch_array(MYSQLI_ASSOC);
                                        ?>
                                        <div>
                                            <h4>Cluster</h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row41["ClusterName"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Gvh</h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["gvhID"] ?></p>
                                        </div>
                                        <?php 
                                          $pid = $row40["programID"];
                                          
                                          $sql42 = "SELECT * FROM tblprogram WHERE pID='$pid'";
                                          $result42 = $link->query($sql42);
                                          $row42 = $result42->fetch_array(MYSQLI_ASSOC);
                                        ?>
                                        <div>
                                            <h4>Program </h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row42["pName"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Cohort </h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["cohort"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Males </h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["MembersM"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Females </h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["MembersF"] ?></p>
                                        </div>
                                        <div>
                                            <h4>Members </h4>
                                            <hr style="height:3px;background:green">
                                            <p><?php echo $row40["MembersM"] + $row40["MembersF"] ?></p>
                                        </div>
                                    </div>
                                    <?php }
                                    ?>
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
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

</body>

</html>