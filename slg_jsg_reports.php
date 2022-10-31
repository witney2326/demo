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
                            <h4 class="mb-sm-0 font-size-18">JSG and Membership Report</h4>

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
                                            <h5 class="my-0 text-primary">JSG Summary</h5>
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
                                                            <th>No Of JSGs</th>
                                                            
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?Php
                                                            if (($_SESSION["user_role"]== '03')) 
                                                            {
                                                                $region = $_SESSION["user_reg"]; 

                                                                $query="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs
                                                                FROM tbljsg inner join tblgroup on tbljsg.groupID = tblgroup.groupID 
                                                                where ((tblgroup.regionID = '$region') and (tblgroup.deleted = '0')) GROUP BY tblgroup.districtID";
                                                            } else if (($_SESSION["user_role"]== '04'))
                                                            {
                                                                $district = $_SESSION["user_dis"]; 

                                                                $query="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs
                                                                FROM tbljsg inner join tblgroup on tbljsg.groupID = tblgroup.groupID 
                                                                where ((tblgroup.DistrictID = '$district') and (tblgroup.deleted = '0')) GROUP BY tblgroup.districtID";
                                                            }else if (($_SESSION["user_role"]== '05'))
                                                            {
                                                                $ta = $_SESSION["user_ta"]; 

                                                                $query="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs
                                                                FROM tbljsg inner join tblgroup on tbljsg.groupID = tblgroup.groupID 
                                                                where ((tblgroup.TAID = '$ta') and (tblgroup.deleted = '0')) GROUP BY tblgroup.districtID";
                                                            }else
                                                            {
                                                                $query="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs
                                                                FROM tbljsg inner join tblgroup on tbljsg.groupID = tblgroup.groupID 
                                                                where ((tblgroup.deleted = '0')) GROUP BY tblgroup.districtID";
                                                            }

                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            {   
                                                            echo "<tr>\n";
                                                                echo "<td>".dis_name($link,$row["districtID"])."</td>\n";                                                                         
                                                                echo "<td>".number_format($row["jsgs"])."</td>\n";  
                                                            echo "</tr>\n";
                                                            }}
                                                            
                                                            if (($_SESSION["user_role"]== '03')) 
                                                            {
                                                                $region = $_SESSION["user_reg"]; 
                                                                $query2="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs2
                                                                FROM tbljsg inner join tblcluster on tbljsg.groupID = tblcluster.ClusterID 
                                                                where ((tblcluster.regionID = '$region') and (tblcluster.deleted = '0')) GROUP BY tblcluster.districtID";
                                                            } else if (($_SESSION["user_role"]== '04'))
                                                            {
                                                                $district = $_SESSION["user_dis"]; 
                                                                $query2="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs2
                                                                FROM tbljsg inner join tblcluster on tbljsg.groupID = tblcluster.ClusterID 
                                                                where ((tblcluster.districtID = '$district') and (tblcluster.deleted = '0')) GROUP BY tblcluster.districtID";
                                                            } else if (($_SESSION["user_role"]== '05'))
                                                            {
                                                                $ta = $_SESSION["user_ta"]; 
                                                                $query2="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs2
                                                                FROM tbljsg inner join tblcluster on tbljsg.groupID = tblcluster.ClusterID 
                                                                where ((tblcluster.taID = '$ta') and (tblcluster.deleted = '0')) GROUP BY tblcluster.districtID";
                                                            } else
                                                            {
                                                                $query2="SELECT tbljsg.districtID,COUNT(tbljsg.recID) as jsgs2
                                                                FROM tbljsg inner join tblcluster on tbljsg.groupID = tblcluster.ClusterID 
                                                                where ((tblcluster.deleted = '0')) GROUP BY tblcluster.districtID";
                                                            }
                                                            if ($result_set2 = $link->query($query2)) {
                                                            while($row2 = $result_set2->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                             $jsgs = $row2['jsgs2'];

                                                            echo "<tr>\n";
                                                                echo "<td>".dis_name($link,$row2["districtID"])."</td>\n";                                                                         
                                                                echo "<td>\t\t$jsgs</td>\n";  
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