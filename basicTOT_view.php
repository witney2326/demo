<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Training Management</title>
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
      
        $id = $_GET['id'];
        
     
    
    
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
                            <h4 class="mb-sm-0 font-size-18">Trainer Of Trainers</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_training.php">Training Management</a></li>
                                    <li class="breadcrumb-item active">Trainer Of Trainers</li>
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

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!--start here -->
                                            

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                        <div class="card-header bg-transparent border-primary">
                                                            <h5 class="my-0 text-primary">Trainer Of Trainers Status In</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        <th>Rec No.</th>
                                                                        <th>First Name</th>
                                                                        <th>Surname</th>
                                                                        <th>Gender</th>
                                                                        <th>Position</th>
                                                                        <th>Training Type</th>
                                                                        <th>Start Date</th>
                                                                        <th>Finish Date</th>
                                                                        
                                                                        <th>Action</th>
                                                                        
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tbltottraining where districtID = '$id'";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                         
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            
                                                                        echo "<tr>\n";
                                                                            
                                                                            echo "<td>".$row["TrainID"]."</td>\n";
                                                                            echo "<td>".$row["fname"]."</td>\n";
                                                                            echo "<td>".$row["lname"]."</td>\n";
                                                                            echo "<td>".$row["gender"]."</td>\n";
                                                                            echo "<td>".$row["title"]."</td>\n";
                                                                            echo "<td>".$row["TrainingTypeID"]."</td>\n";
                                                                            echo "<td>".$row["StartDate"]."</td>\n";
                                                                            echo "<td>".$row["FinishDate"]."</td>\n";
                                                                            echo "<td>
                                                                                <a href=\" ?id=".$row['TrainID']."\"><i class='far fa-eye' title ='Training Status' style='font-size:18px'></i></a>                                                                      
                                                                                <a href=\" ?id=".$row['TrainID']."\" ><i class='fas fa-pen' title ='Record TOT Training' style='font-size:18px'></i></a>                                                                           
                                                                                <a href=\" ?id=".$row['TrainID']."\" ><i class='fas fa-poll' title = 'Training Reports' style='font-size:18px'></i></a>       
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
                                                    <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">     
                                                </div>            
                                            </div>  
                                        </p>
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