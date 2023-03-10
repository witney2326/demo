<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household List</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    
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





<?php include 'layouts/body.php'; ?>

<?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblgroup where groupID='$id'";
        
        if ($result = $link->query($query)) {
            while($row = $result->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["groupname"];
                
            }
            $result->close();
        }  

        
        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
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
                            <h4 class="mb-sm-0 font-size-18">Download Household List</h4>
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
                                                                <?php
                                                                    $result = mysqli_query($link, "SELECT COUNT(sppCode) AS value_total FROM tblbeneficiaries where groupID ='$id'"); 
                                                                    $row = mysqli_fetch_assoc($result); 
                                                                    $total = $row['value_total'];
                                                                   
                                                                ?>
                                                                <h5 class="my-0 text-primary">Download Household List For <?php echo $groupname; ?> Group </h5>
                                                                
                                                                <h7 class="my-0 text-secondary">Captured Households: <?php echo $total; ?> </h7>
                                                                
                                                                
                                                                
                                                            </div>

                                                    

                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                    <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100" width="100%">
                                                                
                                                                <thead>

                                                                   <tr>CWI: 
                                                                        <?php 
                                                                                $result = mysqli_query($link, "SELECT cwName from caseworkers where groupID ='$id'"); 
                                                                                $row = mysqli_fetch_assoc($result); 
                                                                                $name = $row['cwName']; 

                                                                                echo $name;
                                                                        ?>
                                                                        
                                                                    </tr>

                                                                    <tr>
                                                                        
                                                                        <th>ID</th>
                                                                        <th>Household Code</th>
                                                                        <th>Household Name</th>
                                                                        <th>District</th>
                                                                        <th>Savings Amount</th>
                                                                        <th>Group Code</th>
                                                                        <th>Date</th>
                                                                        
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?Php
                                                                            $id = $_GET['id'];
                                                                            $query="select * from caseworkers where groupID ='$id';";
                                                                            
                                                                            
                                                                            

                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result = $link->query($query)) {
                                                                        while($row = $result->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                                                                                             
                                                                            
                                                                            
                                                                            
                                                                            echo "<td></td>\n";
                                                                            echo "<td>".$row["sppCode"]."</td>\n";
                                                                            echo "<td></td>\n";
                                                                            echo "<td>".dis_name($link, $row["districtID"])."</td>\n";
                                                                            echo "<td></td>\n";
                                                                            echo "<td>".$row["groupID"]."</td>\n";
                                                                            echo "<td></td>\n";
                                                                            
                                                                            
                                                                            
                                                                        echo "</tr>\n";
                                                                        }
                                                                        // Close the database connection
                                                                        $result->close();
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