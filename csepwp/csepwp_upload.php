<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>Household Savings Files csepwp</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config2.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    
</head>

<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: auto;
}
</style>





<?php include '../layouts/body.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Household Savings</h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1)";>
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
                                
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    
                                    <div class="tab-pane active" id="hotspots" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                    <p><center><h5 class="my-0 text-primary">Savings Per Household For Climate Smart Enhanced Public Works Program</h5></p></center>
                                                    </div>

                                                    

                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100" width="100%">
                                                                
                                                                <img src="assets/images/logo-dark.png" alt="" height="64" class="center">
                                                                
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>District</th>
                                                                        <th>Household Code</th>
                                                                        <th>Household Name</th>
                                                                        <th>Savings Amount</th>
                                                                        <th>Group Code</th>
                                                                        <th>Date</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?Php
                                                                        $query = "SELECT * FROM csepwp_tblhousehold_savings order by id";
                                                                        $result = mysqli_query($link_cs, $query);
                                                                        
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result = $link_cs->query($query)) {
                                                                        while($row = mysqli_fetch_assoc($result))
                                                                        { 
                                                                                                                                             
                                                                            
                                                                            echo "<td>".$row["id"]."</td>\n";
                                                                            echo "<td>".$row["district"]."</td>\n";
                                                                            echo "<td>".$row["household_code"]."</td>\n";
                                                                            echo "<td>".$row["household_name"]."</td>\n";
                                                                            echo "<td>".$row["savings_amount"]."</td>\n";
                                                                            echo "<td>".$row["group_code"]."</td>\n";
                                                                            echo "<td>".$row["date"]."</td>\n";
                                                                            echo "<td><a onClick=\"javascript: return confirm('Are You Sure You want To Delete This Record? - You Must Be a Supervisor');\" href=\"csepwp_basic_svngs_delete.php?id=".$row['id']."\"><i class='far fa-trash-alt' title='Delete Savings Record' style='font-size:15px;color:Red'></i></a>
                                                                            </td>
                                                                            \n";

                                                                        

                                                                            
                                                                        echo "</tr>\n";
                                                                        }
                                                                        // Close the database connection
                                                                        mysqli_close($link_cs);
                                                                        }  
                                                                    
                                                                                           
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            </p>
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