<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>View User</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

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
        include "layouts/config.php"; // Using database connection file here
        include "lib.php";

        $id = $_GET['id']; // get id through query string
       $query="select * from users where id='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["username"];
                $email= $row["useremail"];
                $regionID = $row["userreg"];
                $DistrictID= $row["userdis"];
                $TAID= $row["userta"];
                $userrole= $row["userrole"];
                $ustatus= $row["ustatus"];
                
            }
            $result_set->close();
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
                            <h4 class="mb-sm-0 font-size-18">View Application User</h4>
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

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User Details</a>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card border border-success">
                                                            <div class="col-lg-9">
                                                                <div class="row mb-1">
                                                                    <label for="group_id" class="col-sm-4 col-form-label">User ID</label>                   
                                                                    <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:45%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">    
                                                                    <label for="group_name" class="col-sm-4 col-form-label">uName</label>
                                                                    <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:45%;" disabled ="True">
                                                                </div>
                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="date_formed" class="col-sm-4 col-form-label">email address</label>
                                                                    <input type="text" class="form-control" id="date_formed" name="date_formed" value ="<?php echo $email ; ?>" style="max-width:45%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="region" class="col-sm-4 col-form-label">Region</label>
                                                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo r_name($link,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>

                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="district" class="col-sm-4 col-form-label">District</label>                                           
                                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="ta" class="col-sm-4 col-form-label">Traditional Authority</label>
                                                                    <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo ta_name($link,$TAID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>

                                                                
                                                                <div class="row mb-1">
                                                                    <label for="gvh" class="col-sm-4 col-form-label">Position</label>                   
                                                                    <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo user_position($link,$userrole) ; ?>" disabled ="True" style="max-width:30%;" >
                                                                </div>
                                                                <div class="row mb-1">
                                                                    <label for="ustatus" class="col-sm-4 col-form-label">User Status</label>                   
                                                                    <input type="text" class="form-control" id="ustatus" name="ustatus" value ="<?php if ($ustatus == '0'){echo "Not Activated";} else{echo "Active";} ?>" disabled ="True" style="max-width:30%;" >
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>
                                                
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
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

</body>

</html>