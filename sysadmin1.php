<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>System Management</title>
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
                            <h4 class="mb-sm-0 font-size-18">System Management</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">users</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link"  href="sysadmin1_roles.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">roles</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link"  href="sysadmin1_regions.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Region</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link"  href="sysadmin1_districts.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Districts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link"  href="sysadmin1_tas.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">TAs</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link"  href="sysadmin1_buscats.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Bus Cats</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link"  href="sysadmin1_bustypes.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Bus Types</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="sysadmin1_maintanance.php" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">DB Maintainance</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="sysadmin1_other.php" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Other Settings</span>
                                        </a>
                                    </li>
                                    
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!--start here -->
                                            
                                            <div class="row mb-1">
                                                <div class="col-md-6">
                                                    <div class="input-group" display="inline">
                                                        <form action="phpSearch.php" method="post">
                                                            username <input type="text" name="search">
                                                            <input type ="submit" name='Search_Group_Name' value='Search_Name'> 
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group" display="inline">
                                                        <form action="phpSearchgc.php" method="post">
                                                            userID <input type="text" name="search">
                                                            <input type ="submit" name='Search_Group_Code' value='Search_Code'> 
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>uName</th>
                                                                        <th>Email</th>
                                                                        <th>Role</th>
                                                                        <th>Status</th>
                                                                        <th>Reg</th>
                                                                        <th>Dis</th>
                                                                        <th>TA</th> 
                                                                        <th>Action</th>                                                              
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query = "SELECT * FROM users where deleted = '0' ORDER by id";

                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            echo "<tr>";
                                                                            echo "<td>".$row['id']."</td>";
                                                                            echo "<td>".$row['username']."</td>";
                                                                            echo "<td>".$row['useremail']."</td>";                                                       
                                                                            echo "<td>".$row['userrole']."</td>";
                                                                            echo "<td>".$row['ustatus']."</td>";
                                                                            echo "<td>".$row['userreg']."</td>";
                                                                            echo "<td>".$row['userdis']."</td>";
                                                                            echo "<td>".$row['userta']."</td>";

                                                                            echo "<td>
                                                                                <a href=\"sysadmin_userview.php?id=".$row['id']."\"><i class='far fa-eye' title='View User' style='font-size:18px;color:purple'></i></a>
                                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Activate This User');\" href=\"sysadmin_useractivate.php?id=".$row['id']."\"><i class='fa  fa-check' title='Activate User' style='font-size:18px;color:green'></i></a>
                                                                                <a href=\"sysadmin1_mail.php?id=".$row['id']."\"><i class='fa fa-ban' title='Deactivate User' style='font-size:18px'></i></a>
                                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This User - You Must Be a Supervisor');\" href=\"app_user_delete.php?id=".$row['id']."\"><i class='far fa-trash-alt' title='Delete User' style='font-size:18px;color:Red'></i></a>
                                                                             </td>\n";
                                                                            echo "</tr>";
                                                                        }
                                                                        $result_set->close();
                                                                        }  
                                                                                           
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            </p>
                                                        </div>
                                                    </div>     
                                                </div>            
                                            </div>  
                                        </p>
                                    </div>
                                    <!-- Here -->
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