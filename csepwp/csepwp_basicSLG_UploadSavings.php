<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG | Upload Savings</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

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


<?php include '../layouts/body.php'; ?>
<?php
       include '../layouts/config2.php';
       include 'lib2.php';
       

       $id = $_GET['id']; // get id through query string
       $query="select groupname from tblgroup where groupID='$id'";

        if ($result_set = $link_cs->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["groupname"];
                
            }
            $result_set->close();
        }
           
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '../layouts/vertical-menu.php'; ?>
   
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12" text-align: center;>
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Upload Household Savings for Climate Smart Enhanced Public Works Program</h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                    <div class="col-12" text-align="center">

                        <div class="card border border-success">
                            <div class="card-header bg-transparent border-success">
                                <h5 class="my-0 text-success">Upload Savings For: <?php echo $groupname; ?> Group</h5>
                            </div>
                            <div class="card-body">

                                
                            <form method="POST" action="csepwp_excelUpload.php" enctype="multipart/form-data">

		                        <div class="form-group">
                                    <div class="col-12" text-align="center">
                                        <div class="mb-3">
			                        <label>Upload Excel File</label>
			                        <input type="file" name="file" class="form-control" style="width: 400px;">
                                        </div>
                                    </div>
		                        </div>
                                    
		                                <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-9">
			                                        <button type="submit" name="Submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px">Upload Savings</button>
                                                </div>
                                            </div>
                                        </div>

                                        
                                 
	                        </form>
                            </div>
                        </div>
                        
                    </div>
               


                    </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php include '../layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include '../layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include '../layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>