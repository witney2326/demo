<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Member Reports</title>
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

<?php 
    if(isset($_GET['Submit']))
    {   
        $region = $_GET['region'];
        $district = $_GET['district'];
        $ta = $_GET['ta'];
     
    }
    
    function get_rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
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
                            <h4 class="mb-sm-0 font-size-18">SLG Savings Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basicReports.php">Basic Livelihood Reports</a></li>
                                    <li class="breadcrumb-item active">SLG Savings Reports</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary">Summary Per Region</h5>
                        </div>

                        

                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                            
                                <thead>
                                    <tr>
                                        <th>Region</th>
                                        <th>#Districts</th>
                                        <th>#Groups</th>
                                        <th>No.Males</th>
                                        <th>No.Females</th>
                                        <th>T_Members</th>
                                        <th>Total Savings</th> 
                                    </tr>
                                </thead>


                                <tbody>
                                    <?Php
                                        $query="SELECT cimis_sql.tblregion.name, COUNT(Distinct tbldistrict.DistrictName) as NoOfDistricts,COUNT(tblgroup.groupname) as NoGroups, sum(tblgroup.MembersM) as NoMales, sum(MembersF) as NoFemales, SUM(tblgroupsavings.Amount) as AmountSaved
                                        FROM cimis_sql.tblgroup 
                                        INNER JOIN cimis_sql.tblcw on cimis_sql.tblcw.cwID = cimis_sql.tblgroup.cwID 
                                        inner join cimis_sql.tblgroupsavings on cimis_sql.tblgroup.groupID = cimis_sql.tblgroupsavings.GroupID
                                        inner join cimis_sql.tbldistrict on cimis_sql.tblgroupsavings.DistrictID = cimis_sql.tbldistrict.DistrictID
                                        inner join cimis_sql.tblregion on cimis_sql.tbldistrict.regionID = cimis_sql.tblregion.regionID
                                        GROUP BY cimis_sql.tblregion.name";

                                        //Variable $link is declared inside config.php file & used here
                                        
                                        if ($result_set = $link->query($query)) {
                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                        { 
                                            $tMembers = number_format($row["NoMales"]+$row["NoFemales"]);
                                        echo "<tr>\n";

                                            echo "<td>".$row["name"]."</td>\n";                                                                         
                                            echo "<td>".$row["NoOfDistricts"]."</td>\n";
                                            echo "<td>".number_format($row["NoGroups"])."</td>\n";
                                            echo "<td>".number_format($row["NoMales"])."</td>\n";
                                            echo "<td>".number_format($row["NoFemales"])."</td>\n";
                                            echo "<td>\t\t$tMembers</td>\n";
                                            echo "<td>".number_format($row["AmountSaved"],2)."</td>\n";
                                            
                                            
                                        echo "</tr>\n";
                                        }
                                        $result_set->close();
                                        }  
                                                            
                                    ?>
                                </tbody>
                            </table>
                            
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