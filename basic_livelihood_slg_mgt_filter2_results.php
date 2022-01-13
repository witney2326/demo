<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Management</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<?php include 'layouts/body.php'; ?>

<?php 
    if(isset($_GET['Submit']))
    {   
        $district = $_GET['district'];
        
     
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
                            <h4 class="mb-sm-0 font-size-18">SLG Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_slg_mgt2.php">SLG Management</a></li>
                                    <li class="breadcrumb-item active">SLG Management</li>
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

                                
                                <!-- Nav tabs -->
                                
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <!--start here -->
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"></i>SLG Search Results</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_slg_mgt_filter3_results.php" method ="GET">
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="$region" required disabled>
                                                                    <option selected value = "$region"><?php echo get_rname($link,$_GET['region']);?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" value ="$district" required>
                                                                <option selected value = "$district"><?php echo dis_name($link,$district);?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required >
                                                                <option selected  value="$ta"></option>
                                                                <?php                                                           
                                                                        $ta_fetch_query = "SELECT TAID,TAName FROM tblta where DistrictID = '$district'";                                                  
                                                                        $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                        ?>
                                                                        <option value ="<?php echo $DB_ROW_ta["TAID"]; ?>">
                                                                            <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid TA.
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                            <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Savings and Loan Groups in <?php echo dis_name($link,$district);?> District</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        
                                                                        <th>SLG code</th>
                                                                        <th>SLG Name</th>
                                                                        <th>cohort</th>
                                                                        
                                                                        
                                                                        <th>M</th>
                                                                        <th>F</th>
                                                                        <th>Action On SLG</th>
                                                                        
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblgroup where DistrictID = '$district'";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                        echo "<tr>\n";
                                                                            
                                                                        
                                                                            echo "<td>".$row["groupID"]."</td>\n";
                                                                            echo "<td>".$row["groupname"]."</td>\n";
                                                                            echo "<td>".$row["cohort"]."</td>\n";
                                                                            
                                                                            
                                                                            echo "<td>".$row["MembersM"]."</td>\n";
                                                                            echo "<td>".$row["MembersF"]."</td>\n";
                                                                            
                                                                            echo "<td>
                                                                                <a href=\"basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' title='View SLG' style='font-size:18px'></i></a>
                                                                                <a href=\"basicSLGedit.php?id=".$row['groupID']."\"><i class='far fa-edit' title='Edit SLG Details' style='font-size:18px'></i></a>
                                                                                <a href=\"basicSLGsavings.php?id=".$row['groupID']."\"><i class='fas fa-hand-holding-usd' title='Add SLG Savings' style='font-size:18px'></i></a>
                                                                                <a href=\"basicSLGloans.php?id=".$row['groupID']."\"><i class='fas fa-book' title='Add SLG Loans' style='font-size:18px'></i></a> 
                                                                                <a href=\"basicSLGiga.php?id=".$row['groupID']."\"><i class='fas fa-balance-scale' title='Add SLG IGAs' style='font-size:18px'></i></a> 
                                                                                <a href=\"basicSLGAddMember.php?id=".$row['groupID']."\"><i class='fas fa-user-alt' title='Add Beneficiary to SLG' style='font-size:18px'></i></a> 
                                                                                <a href=\"basicSLGdelete.php?id=".$row['groupID']."\"><i class='far fa-trash-alt' title='Delete SLG' style='font-size:18px'></i></a>    
                                                                            </td>\n";

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
                                        </p>
                                    </div>
                                    <!-- Here -->
        
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