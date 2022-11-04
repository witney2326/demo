<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>YCS |COMSIV Financial Linkage</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../lib.php'; ?>
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
     $query="select * from tblbeneficiaries where sppCode='$id'";
      
      if ($result_set = $link->query($query)) {
          while($row = $result_set->fetch_array(MYSQLI_ASSOC))
          { 
              $hhname= $row["hh_head_name"];
              $sppname= $row["spProg"];
              $regionID = $row["regionID"];
              $districtID= $row["districtID"];
              $groupID = $row["groupID"];
              $cohort = $row["cohort"];
          }
          $result_set->close();
      }

      if(isset($_POST['Submit']))
          {    
          $hh_id = $_POST['hh_id'];
          $year = $_POST['year'];
          $month = $_POST['month'];
          $amount = $_POST['amount'];
          
          
              $sql = "INSERT INTO tblcomsiv_hh_fin_linkage (hh_code,ldate,rdate,period,amount)
              VALUES ('$hh_id','$groupID','$year','$month','$amount')";
          if (mysqli_query($link, $sql)) {
              echo '<script type="text/javascript">'; 
              echo 'alert("SLG Loan Record has been added successfully !");'; 
              echo 'window.location.href = "basic_livelihood_slg_mgt_check.php";';
              echo '</script>';
          } else {
              echo "Error: " . $sql . ":-" . mysqli_error($link);
          }
          mysqli_close($link);
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
                            <h4 class="mb-sm-0 font-size-18">YCS Financial Linkage - COMSIV</h4>
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

                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label>
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >

                                            <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>
                                            <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link,$regionID) ; ?>" style="max-width:30%;" readonly >

                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                        <div class="row mb-1">
                                            <label for="ldate" class="col-sm-2 col-form-label">Date Taken</label>
                                            <input type="date" class="form-control" id="ldate" name="ldate"  style="max-width:30%;">

                                            <label for="rdate" class="col-sm-2 col-form-label">Return Date</label>
                                            <input type="date" class="form-control" id="rdate" name="rdate"  style="max-width:30%;"  >
                                        </div>

                                        <div class="row mb-4">
                                            <label for="lperiod" class="col-sm-2 col-form-label">Period</label>
                                            <input type="text" class="form-control" id="lperiod" name="lperiod" value =<?php echo '<script type="text/javascript">jsFunction();</script>';?> style='max-width:30%;'>

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

</body>

</html>