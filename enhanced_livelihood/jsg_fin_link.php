<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>JSG |COMSIV Financial Linkage</title>
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

<script type = "text/javascript">  
    function getMonthDifference(startDate, endDate) 
    {
        return (
            endDate.getMonth() -
            startDate.getMonth() +
            12 * (endDate.getFullYear() - startDate.getFullYear())
        );
    }
</script>  
</head>

<?php include '../layouts/body.php'; ?>
<?php
      include "../layouts/config.php"; // Using database connection file here
        
      $id = $_GET['id']; // get id through query string
     $query="select * from tbljsg where recID='$id'";
      
      if ($result_set = $link->query($query)) {
          while($row = $result_set->fetch_array(MYSQLI_ASSOC))
          { 
              $jsg_name= $row["jsg_name"];
              $type= $row["type"];
              
              $districtID= $row["districtID"];
              $groupID = $row["groupID"];
              $cohort = $row["bus_category"];
          }
          $result_set->close();
      }

      
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '../layouts/vertical-menu.php'; ?>
    <?php include '../lib.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">JSG Financial Linkage - COMSIV</h4>
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

                <div class="row">
                    <div class="col-12">

                        <?php include '../layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                
                                <div class="card-body">
                                    
                                    <form method="POST" action="jsg_fin_link1.php" method="POST">
                                        <div class="row mb-1">
                                            <label for="jsg_id" class="col-sm-2 col-form-label">JSG ID</label>
                                            <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >

                                            <label for="jsg_name" class="col-sm-2 col-form-label">JSG Name</label>
                                            <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $jsg_name ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;" readonly >

                                            <label for="type" class="col-sm-2 col-form-label">Business Type</label>
                                            <input type="text" class="form-control" id="type" name="type" value ="<?php echo iga_type($link,$type) ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        <div class="row mb-1">
                                            <label for="ldate" class="col-sm-2 col-form-label">Date Taken</label>
                                            <input type="date" class="form-control" id="ldate" name="ldate"  style="max-width:30%;">

                                            <label for="rdate" class="col-sm-2 col-form-label">Return Date</label>
                                            <input type="date" class="form-control" id="rdate" name="rdate"  style="max-width:30%;"  >
                                        </div>

                                        <div class="row mb-4">
                                            <label for="lperiod" class="col-sm-2 col-form-label">Period</label>
                                            <input type="text" class="form-control" id="lperiod" name="lperiod"  style='max-width:30%;'>

                                            <label for="amount" class="col-sm-2 col-form-label">Loan Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount" value ="" style="max-width:30%;">
                                        </div>

                                        <div class="row justify-content-end">
                                                <div>
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Record</button>
                                                </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
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