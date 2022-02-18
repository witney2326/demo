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
                            <h4 class="mb-sm-0 font-size-18">SLG Member Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">SLG Member Reports</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#hotspots" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Households in SLGs</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#savings" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Summary Per CaseWorker</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#nutrition-promotor" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Nutrition Promotors</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#iga" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">National Summary</span>
                                        </a>
                                    </li>
   
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                
                                    <div class="tab-pane active" id="savings" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"></i>Savings Report Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_cbdra_add_hotspot.php" method ="POST" >
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="<?php if(isset($_POST['region'])) {echo $_POST['region'];} ?>" onChange="update()" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                            ?>
                                                                            <option value ="<?php
                                                                                    echo $DB_ROW_reg["regionID"];?>">
                                                                                <?php
                                                                                    echo $DB_ROW_reg["name"];
                                                                                ?>
                                                                            </option>
                                                                            <?php
                                                                                $i++;
                                                                                    }
                                                                        ?>
                                                                        
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid Malawi region.
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" value ="$district" required>
                                                                <option selected value="$district" ></option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
                                                                        $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_Dis["DistrictID"]; ?>">
                                                                            <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Malawi district.
                                                            </div>
                                                        </div>
                                    
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Savings and Loan Groups Per Case Worker</h5>
                                                    </div>

                                                    

                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>

                                                        

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
                                                                        FROM cimis_sql.tblgroup 
                                                                        INNER JOIN cimis_sql.tblcw on cimis_sql.tblcw.cwID = cimis_sql.tblgroup.cwID 
                                                                        inner join cimis_sql.tblgroupsavings on cimis_sql.tblgroup.groupID = cimis_sql.tblgroupsavings.GroupID
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
                                                                            echo "<td>".$row["sAmount"]."</td>\n";
                                                                            
                                                                            
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

                                    <div class="tab-pane active" id="nutrition-promotor" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"></i>Savings Report Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_cbdra_add_hotspot.php" method ="POST" >
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="<?php if(isset($_POST['region'])) {echo $_POST['region'];} ?>" onChange="update()" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                            ?>
                                                                            <option value ="<?php
                                                                                    echo $DB_ROW_reg["regionID"];?>">
                                                                                <?php
                                                                                    echo $DB_ROW_reg["name"];
                                                                                ?>
                                                                            </option>
                                                                            <?php
                                                                                $i++;
                                                                                    }
                                                                        ?>
                                                                        
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid Malawi region.
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" value ="$district" required>
                                                                <option selected value="$district" ></option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
                                                                        $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_Dis["DistrictID"]; ?>">
                                                                            <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Malawi district.
                                                            </div>
                                                        </div>
                                    
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Savings and Loan Groups Per Case Worker</h5>
                                                    </div>

                                                    

                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>

                                                        

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
                                                                        FROM cimis_sql.tblgroup 
                                                                        INNER JOIN cimis_sql.tblcw on cimis_sql.tblcw.cwID = cimis_sql.tblgroup.cwID 
                                                                        inner join cimis_sql.tblgroupsavings on cimis_sql.tblgroup.groupID = cimis_sql.tblgroupsavings.GroupID
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
                                                                            echo "<td>".$row["sAmount"]."</td>\n";
                                                                            
                                                                            
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
<script>
        /* Initialization of datatables */
        $(document).ready(function () {
            $('table.display').DataTable();
        });
    </script>

</body>

</html>