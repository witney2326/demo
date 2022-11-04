<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>YCS|FinLink</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
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

<?php include '../layouts/body.php'; 
      include '../lib.php'; 
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
                            <h4 class="mb-sm-0 font-size-18">YCS Financial Linkage - COMSIV</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="ycs.php">YCS Dashboard</a></li>
                                    <li class="breadcrumb-item active">FinLink</li>
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
                                        <a class="nav-link" data-bs-toggle="tab" href="#home-1" role="link">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Selected Concepts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="ycs_igp_plan_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block"> IGP and Plans</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active"  href="javascript: void(0);" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block"> Financial Linkage</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="enhancedReports.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block"> IGP Progress and Reports</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">Income Generating Projects</h5>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                <thead>
                                                        <tr>
                                                            <th>IGP ID</th>   
                                                            <th>HH Code</th>
                                                            <th>Bus Type</th>
                                                            <th>Linked Capital</th>
                                                            <th>Disbursed?</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?Php
                                                            $id = $_GET['id'];
                                                            if (($_SESSION["user_role"] == "01") or ($_SESSION["user_role"] == "02"))
                                                            {
                                                                $query="select * from tblycs_igp;";
                                                            }
                                                            if (($_SESSION["user_role"] == "03"))
                                                            {
                                                                $region = $_SESSION["user_reg"];
                                                                $query="select * from tblycs_igp inner join tblbeneficiaries on tblycs_igp.hh_code = tblbeneficiaries.sppCode 
                                                                where tblbeneficiaries.regionID = '$region';";
                                                            }
                                                            if (($_SESSION["user_role"] == "04"))
                                                            {
                                                                $dis = $_SESSION["user_dis"];
                                                                $query="select * from tblycs_igp inner join tblycs on tblycs_igp.hh_code = tblycs.hh_code 
                                                                where tblycs.districtID = '$dis';";
                                                            }
                                                            if (($_SESSION["user_role"] == "05"))
                                                            {
                                                                $ta = $_SESSION["user_ta"];
                                                                $query="select distinct(tblycs_igp.recID),tblycs_igp.hh_code,tblycs_igp.btype,tblycs_igp.igp_name,tblycs_igp.sdate,tblycs_igp.fdate,tblycs_igp.capital 
                                                                from tblycs_igp inner join tblycs on tblycs_igp.hh_code = tblycs.hh_code inner join tblgroup on tblycs.groupID = tblgroup.groupID 
                                                                where tblgroup.TAID = '$ta';";
                                                            }

                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                
                                                            echo "<tr>\n";                                           
                                                                echo "<td>".$row["recID"]."</td>\n";
                                                                echo "<td>".$row["hh_code"]."</td>\n";
                                                                echo "<td>".$row["btype"]."</td>\n";
                                                                echo "<td>".$row["capital"]."</td>\n";
                                                                echo "<td></td>\n";
                                                                echo "<td>
                                                                <a href=\"../basicSLGMemberview.php?id=".$row['hh_code']."\"><i class='fas fa-eye' title='COMSIV Link' style='font-size:18px;color:purple'></i></a>
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