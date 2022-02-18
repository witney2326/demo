<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Savings Report</title>
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
    $region = $_GET['region'];
    $district = $_GET['district'];
    //$ta = $_GET['ta'];
    
    
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
                            <h4 class="mb-sm-0 font-size-18">SLG Saving Mobilisation</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basicReports.php">Basic Livelihood Reports</a></li>
                                    <li class="breadcrumb-item active">SLG Saving Mobilisation</li>
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

                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"></i>Savings Report Filter</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>

                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate >
                                            <div class="col-12">
                                                <label for="region" class="form-label">Region</label>
                                                <div>
                                                    <select class="form-select" name="region" id="region" value ="<?php echo $region; ?>"  required>
                                                        <option selected value="<?php echo $region; ?>"><?php echo get_rname($link,$region);?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <label for="district" class="form-label">District</label>
                                                <select class="form-select" name="district" id="district" value ="<?php echo $district; ?>" required>
                                                    <option selected value="<?php echo $district; ?>"><?php echo dis_name($link,$district);?></option>       
                                                </select>
                                            </div>
                        
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                <INPUT TYPE="button" class="btn btn-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </form>                                             
                                        <!-- End Here -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        
                                        <div class="card-body">
                                        <h7 class="card-title mt-0">Mobilised Savings per Case Worker</h7>
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                            
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Case Worker</th>
                                                        <th>District</th>
                                                        <th>No Of Groups</th>
                                                        <th>Cohort</th>
                                                        <th>Males</th>
                                                        <th>Females</th>
                                                        <th>Total Savings</th>
                                                        
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?Php
                                                        $query="SELECT tblcw.cwName,tblgroup.districtID,COUNT(tblgroup.groupname) as grps, tblgroup.cohort, sum(tblgroup.MembersM) as smales, sum(MembersF) as sfemales, SUM(tblgroupsavings.Amount) as sAmount
                                                        FROM tblgroup 
                                                        INNER JOIN tblcw on tblcw.cwID = tblgroup.cwID 
                                                        inner join tblgroupsavings on tblgroup.groupID = tblgroupsavings.GroupID where tblgroup.districtID ='$district'
                                                        GROUP BY tblcw.cwName";

                                                        //Variable $link is declared inside config.php file & used here
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $col_value = dis_name($link,$row["districtID"]);
                                                        echo "<tr>\n";
                                                            
                                                            echo "<td>".$row["cwName"]."</td>\n";
                                                            echo "\t\t<td>$col_value</td>\n";                                                                          
                                                            echo "<td>".$row["grps"]."</td>\n";
                                                            echo "<td>".$row["cohort"]."</td>\n";
                                                            echo "<td>".$row["smales"]."</td>\n";
                                                            echo "<td>".$row["sfemales"]."</td>\n";
                                                            echo "<td>".number_format($row["sAmount"],2)."</td>\n";
                                                            
                                                            
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