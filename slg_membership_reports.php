<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Reports</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include 'layouts/body.php'; 
      include 'lib.php';

      if (($_SESSION["user_role"]== '03')) {$region = $_SESSION["user_reg"]; } else{$region = $_POST["region"];}
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
                            <h4 class="mb-sm-0 font-size-18">SLG and Membership Report</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    
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

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">SLG Summary</h5>
                                        </div>

                                        <form action="exporttoexcel2.php">
                                            <div class="btn-group" role="group" aria-label="Basic example" style{"50"}>
                                                <button type="button" class="btn btn-secondary">Copy</button>
                                                <button type="submit" class="btn btn-secondary" value="Export to Excel" name="btn">Excel</button>
                                                <button type="button" class="btn btn-secondary">PDF</button>
                                                <button type="button" class="btn btn-secondary">Column Visibility</button>   
                                            </div>
                                        </form>

                                        <div class="card-body">
                                        <h7 class="card-title mt-0"></h7>

                                            

                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>
                                                            <th>District</th>
                                                            <th>No Of Groups</th>
                                                            <th>No.Males</th>
                                                            <th>No.Females</th>
                                                            <th>Total Members</th> 
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?Php
                                                            $query="SELECT DistrictID,COUNT(groupname) as grps, sum(MembersM) as smales, sum(MembersF) as sfemales
                                                            FROM tblgroup where ((regionID = '$region') and (deleted = '0')) GROUP BY DistrictID";

                                                            //Variable $link is declared inside config.php file & used here
                                                            
                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $total = number_format($row["smales"]+$row["sfemales"]);
                                                            echo "<tr>\n";

                                                                echo "<td>".dis_name($link,$row["DistrictID"])."</td>\n";                                                                         
                                                                echo "<td>".number_format($row["grps"])."</td>\n";
                                                                echo "<td>".number_format($row["smales"])."</td>\n";
                                                                echo "<td>".number_format($row["sfemales"])."</td>\n";
                                                                echo "<td>\t\t$total</td>\n";
                                                                
                                                                
                                                            echo "</tr>\n";
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