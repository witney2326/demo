<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
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
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        }

        .active, .accordion:hover {
        background-color: #ccc; 
        }

        .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
        }
    </style>
</head>


<?php include 'layouts/body.php'; ?>


            

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
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">SLG Management</li>
                                </ol>
                            </div>

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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Home</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#newslg" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">New SLG</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reports" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Reports</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                
                                    <div class="tab-pane" id="home" role="tabpanel">
                                        <p class="mb-0">
                                            
                                                <!-- start -->
                                                <p class="mb-0">
                                            <form class="needs-validation" novalidate action="">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="mb-2">
                                                            <label for="region" class="form-label">Region</label>
                                                            <select class="form-select" name="region" id="region" required>
                                                                <option selected value = "$region">Select Region...</option>
                                                                <?php                                                           
                                                                        $dis_fetch_query = "SELECT name FROM tblregion";                                                  
                                                                        $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                        ?>
                                                                        <option>
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
                                                    <div class="col-md-2">
                                                        <div class="mb-2">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" required>
                                                                <option selected value="$district" >Select District</option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictName FROM tbldistrict";                                                  
                                                                        $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                        ?>
                                                                        <option>
                                                                            <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Malawi district.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-2">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required>
                                                                <option selected  value="$ta">Choose...</option>
                                                                <?php                                                           
                                                                        $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                                        $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                        ?>
                                                                        <option>
                                                                            <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid TA.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-2">
                                                            <label for="gvh" class="form-label">GVH</label>
                                                            <select class="form-select" name="gvh" id="gvh" required>
                                                                <option selected  value="$gvh">Choose...</option>
                                                                <option>...</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Group Village Head.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <label for="village" class="form-label">Village</label>
                                                            <select class="form-select" name="village" id="village" required>
                                                                <option selected disabled value="">Choose...</option>
                                                                <option>...</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid Village in Malawi.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">
                                                        Agree to terms and conditions
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" type="submit" name="FormSubmit" value="Submit">Submit form</button>
                                                </div>
                                            </form>
                                            <!-- start accordion -->
                                            
                                        <!-- end accordion -->
                                        </p>
                                        <!-- Start -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h6><p style="color: white; background: green; height:7mm">Savings and Loan Groups</p></h6>
                                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                        
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    
                                                                    <th>Groupcode</th>
                                                                    <th>Group Name</th>
                                                                    <th>Cluster Name</th>
                                                                    <th>Male Members</th>
                                                                    <th>Female Members</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>


                                                            <tbody>
                                                                <?Php
                                                                    
                                                                    $query="select * from tblgroup";

                                                                    //Variable $link is declared inside config.php file & used here
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    { 
                                                                    echo "<tr>\n";
                                                                        
                                                                       
                                                                        echo "<td>".$row["groupID"]."</td>\n";
                                                                        echo "<td>".$row["groupname"]."</td>\n";
                                                                        echo "<td>".$row["clusterID"]."</td>\n";
                                                                        echo "<td>".$row["MembersM"]."</td>\n";
                                                                        echo "<td>".$row["MembersF"]."</td>\n";
                                                                        
                                                                        echo "<td> <a href=\"basicmemberEdit.php?id=".$row['groupID']."\">View/Edit</a> </td>\n";
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

                                        <!-- End here -->
                                    </div>
                                    
                                    <div class="tab-pane" id="reports" role="tabpanel">
                                        <p class="mb-0">
                                            try
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="newslg" role="tabpanel">
                                        <p class="mb-0">
                                            <!-- start accordion -->
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="mt-4">
                                                        
                                                        <button class="accordion">Click to Add New SLG</button>
                                                        <div class="panel">
                                                        
                                                        <!-- start -->
                                                        <div class="wrapper">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="page-header">
                                                                            <h2>SLG Registration</h2>
                                                                        </div>
                                                                        <p>Please fill this form and submit to add New SLG to the database.</p>
                                                                        <form action="insertSLG.php" method="post">
                                                                            <!-- start here -->
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <label for="region" class="form-label">Region</label>
                                                                                        <select class="form-select" name="region" id="region" required>
                                                                                            <option selected value = "$region">Select Region...</option>
                                                                                            <?php                                                           
                                                                                                    $dis_fetch_query = "SELECT name FROM tblregion";                                                  
                                                                                                    $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                                    $i=0;
                                                                                                        while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                                                    ?>
                                                                                                    <option>
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
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <label for="district" class="form-label">District</label>
                                                                                        <select class="form-select" name="district" id="district" required>
                                                                                            <option selected value="$district" >Select District</option>
                                                                                                <?php
                                                                                                                                                        
                                                                                                    $dis_fetch_query = "SELECT DistrictName FROM tbldistrict";                                                  
                                                                                                    $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                                    $i=0;
                                                                                                        while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                                                    ?>
                                                                                                    <option>
                                                                                                        <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                                                        $i++;
                                                                                                            }
                                                                                                ?>
                                                                                        </select>
                                                                                        <div class="invalid-feedback">
                                                                                            Please select a valid Malawi district.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <label for="ta" class="form-label">TA</label>
                                                                                        <select class="form-select" name="ta" id="ta" required>
                                                                                            <option selected  value="$ta">Choose...</option>
                                                                                            <?php                                                           
                                                                                                    $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                                                                    $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                                                    $i=0;
                                                                                                        while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                                                    ?>
                                                                                                    <option>
                                                                                                        <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                                                        $i++;
                                                                                                            }
                                                                                                ?>
                                                                                        </select>
                                                                                        <div class="invalid-feedback">
                                                                                            Please select a valid TA.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <label for="gvh" class="form-label">GVH</label>
                                                                                        <input type="text" name="GVHID" class="form-control" required>              
                                                                                        <div class="invalid-feedback">
                                                                                            Please select a valid Group Village Head.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-3">
                                                                                        <label for="village" class="form-label">Village</label>
                                                                                        <input type="text" name="village" class="form-control" required>                                                  
                                                                                        <div class="invalid-feedback">
                                                                                            Please select a valid Village in Malawi.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <!-- End here -->
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <div class="form-group">
                                                                                            <label for="groupID" class="form-label">Group ID</label>
                                                                                            <input type="text" name="groupID" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <div class="form-group">
                                                                                            <label for="groupname" class="form-label">Group Name</label>
                                                                                            <input type="text" name="groupname" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <div class="form-group">
                                                                                            <label>Date Established</label>
                                                                                            <input type="date" name="DateEstablished" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <div class="form-group">
                                                                                            <label>Cluster Name</label>
                                                                                            <input type="text" name="clusterID" class="form-control">
                                                                                        </div>                                                                                                             
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <div class="form-group">
                                                                                            <label>No Males</label>
                                                                                            <input type="text" name="membersM" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <div class="form-group">
                                                                                        <label>No Females</label>
                                                                                            <input type="text" name="membersF" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                           <!-- <div class="form-group">
                                                                                <label>TA </label>
                                                                                <input type="text" name="TAID" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>GVH</label>
                                                                                <input type="text" name="GVHID" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>No Males</label>
                                                                                <input type="text" name="membersM" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>No Females</label>
                                                                                <input type="text" name="membersF" class="form-control">
                                                                            </div> -->
                                                                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                        </form>
                                                                    </div>
                                                                </div>        
                                                            </div>
                                                        </div>
                                                        <!--end -->
                                                        </div>

                                                        <script>
                                                            var acc = document.getElementsByClassName("accordion");
                                                            var i;

                                                            for (i = 0; i < acc.length; i++) {
                                                            acc[i].addEventListener("click", function() {
                                                                this.classList.toggle("active");
                                                                var panel = this.nextElementSibling;
                                                                if (panel.style.display === "block") {
                                                                panel.style.display = "none";
                                                                } else {
                                                                panel.style.display = "block";
                                                                }
                                                            });
                                                            }
                                                        </script>

                                                        <!-- end accordion -->
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        <!-- end row -->
                                        <!-- end accordion -->
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

<script src="assets/js/app.js"></script>

</body>

</html>
