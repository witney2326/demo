<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Business Concept Development</title>
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

<script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
        var agree=confirm("Are you sure you want to RATE this Cluster?");
        if (agree)
        return true ;
        else
        return false ;
        }   
    </script>
</head>

<?php include 'layouts/body.php'; ?>
<?php include '../lib.php'; ?>
<?php 
    if (($_SESSION["user_role"]== '04')) 
    {
        $region = $_SESSION["user_reg"];
        $district = $_SESSION["user_dis"];  
    }
    else
    {
        $region = $_POST['region'];
        $district = $_POST['district'];
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
                        <h4 class="mb-sm-0 font-size-18">Business Concept Development</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="ycs.php">YCS Management</a></li>
                                <li class="breadcrumb-item active">Concept Development</li>
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
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link " data-bs-toggle="link" href="ycs_concept_devt.php" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block"> Beneficiaries</span>
                                        </a>
                                    </li>
                                                                       
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Business Concept Submission & Assesment</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" href="youths_bus_concept_devt_selected_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Selected Concepts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link" href="enhancedReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">YCS Business Concept Reports</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <!--start here -->
                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="youths_bus_concept_devt_filter3.php" method ="POST">
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="$region" required>
                                                                    <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <div>
                                                                <select class="form-select" name="district" id="district" value ="$district" required>
                                                                    <option selected value = "<?php echo $district;?>"><?php echo dis_name($link,$district);?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required >
                                                                <option></option>
                                                                <?php                                                           
                                                                        $ta_fetch_query = "SELECT TAID,TAName FROM tblta where DistrictID = $district";                                                  
                                                                        $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_ta["TAID"]; ?>">
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
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                   
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"style=font-size:10px>
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>Rec ID</th>
                                                                        <th>HH code</th>
                                                                        <th>Group ID</th>
                                                                        <th>Name</th>
                                                                        <th>Bus.Cpt</th>
                                                                        <th>Cpt Rating</th>                                                                 
                                                                        <th>Cpt Assessed?</th>
                                                                        <th>Ass. Reslt</th>  
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblycs where districtID = '$district'";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            $disname = (string) dis_name($link,$row["districtID"]);
                                                                            if ($row["bus_concept_developed"]== '0'){$bc = "No";}
                                                                            if ($row["bus_concept_developed"]== '1'){$bc = "Yes";}

                                                                            if ($row["bc_assesed"]== '0'){$bc_assessed = "No";}
                                                                            if ($row["bc_assesed"]== '1'){$bc_assessed = "Yes";}

                                                                            if ($row["bc_assesed_result"]== '0'){$bc_assesed_result = "N/A";}
                                                                            if ($row["bc_assesed_result"]== '1'){$bc_assesed_result = "Good";}
                                                                            if ($row["bc_assesed_result"]== '2'){$bc_assesed_result = "Poor";}

                                                                            $hhID = $row["hh_code"];
                                                                        echo "<tr>\n";
                                                                            echo "<td>".$row["recID"]."</td>\n";
                                                                            echo "<td>".$row["hh_code"]."</td>\n";
                                                                            echo "<td>".$row["groupID"]."</td>\n";
                                                                            echo "<td>".$row["beneficiary"]."</td>\n";
                                                                            echo "<td>\t\t$bc</td>\n";
                                                                            echo "<td>";
                                                                            echo "<form action = 'youths_rateycs_bc.php' method ='POST'>";
                                                                                echo '<select id="rating"  name="rating">';
                                                                                    
                                                                                    echo '<option value="0">NA</option>';
                                                                                    echo '<option value="1">Good</option>';
                                                                                    echo '<option value="2">Poor</option>';
                                                                                echo "</select>";
                                                                                echo "<input type='hidden' id='hhID' name='hhID' value='$hhID'>";
                                                                                echo "<button type='submit' class='btn-outline-success' name='FormSubmit' value='Submit' onClick='return confirmSubmit()'>Rate</button>";
                                                                                echo "</form>";
                                                                            echo "</td>";
                                                                            echo "<td>\t\t$bc_assessed</td>\n";
                                                                             echo "<td>\t\t$bc_assesed_result</td>\n";
                                                                            echo "<td>
                                                                                <a href=\"../basicSLGMemberview?id=".$row['hh_code']."\"><i class='far fa-eye' title='View Household' style='font-size:18px;color:purple'></i></a>
                                                                                
                                                                                <a href=\".php?id=".$row['recID']."\"><i class='far fa-trash-alt' title='Delete YCS Record' style='font-size:18px;color:red'></i></a>    
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
                                </div>
                                    <!-- Here -->
                                    
                                    <!-- end here -->
                                    
                                   
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