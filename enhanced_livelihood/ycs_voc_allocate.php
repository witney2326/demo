<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>YCS | Vocational School Allocate</title>
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
       include "../layouts/config.php"; // Using database connection file here
       include "../lib.php";

       $id = $_GET['id']; // get id through query string
       $query="select * from tblycs where recID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $ben= $row["beneficiary"];
               
                $DistrictID= $row["districtID"];
                $bus_category= buscat($link,$row["voc_type"]);
                $type= $row["voc_type"];
                
            }
            
        }
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Vocational School Allocation</h4>
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
                                <div class="card-header bg-transparent border-success">
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="jsg_TrainingPlan.php">
                                        <div class="row mb-1">
                                            <label for="group_id" class="col-sm-2 col-form-label">YCS RecID</label>
                                            <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="jsg_name" class="col-sm-2 col-form-label">Beneficiary</label>
                                            <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $ben ; ?>" style="max-width:30%;" readonly >
                                        </div>

                                                                                                       
                                        <div class="row mb-2">
                                            <?php 
                                                function Buscat1_name($link, $catID)
                                                {
                                                    $BusCat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
                                                    $BusCat = mysqli_fetch_array($BusCat_query);// fetch data
                                                    return $BusCat['catname'];
                                                }
                                                
                                            ?>
                                            <label for="buscat" class="col-sm-2 col-form-label">Category</label>
                                            <select class="form-select" name="buscat" id="buscat" style="max-width:30%;" required>
                                                <option selected value="<?php echo $bus_category;?>"><?php echo Buscat1_name($link,$bus_category);?></option>
                                            </select>

                                            <label for="bustype" class="col-sm-2 col-form-label">Vocational Type</label>
                                            <?php
                                            function BusType_name($link, $typeID)
                                                {
                                                    $BusType_query = mysqli_query($link,"select name from tbliga_types where ID='$typeID'"); // select query
                                                    $BusType = mysqli_fetch_array($BusType_query);// fetch data
                                                    return $BusType['name'];
                                                }
                                                ?>
                                            <select class="form-select" name="bustype" id="bustype" style="max-width:30%;" required>
                                                <option selected value="<?php echo $type;?>"><?php echo BusType_name($link,$type);?></option>
                                            
                                            </select>

                                        </div>

                                        <div class="row mb-4">
                                            <label for="bds" class="col-sm-2 col-form-label"> Voc School</label>
                                            
                                            
                                                <select class="form-select" name="bds" id="bds" style="max-width:30%;" required>
                                                    <option ></option>
                                                        <?php                                                           
                                                            $slg_fetch_query = "SELECT bdsID,bdsname FROM tblbds where ((districtID = '$DistrictID') )";                                                  
                                                            $result_slg_fetch = mysqli_query($link, $slg_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_slg = mysqli_fetch_array($result_slg_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_slg["bdsID"]; ?>">
                                                                <?php echo $DB_ROW_slg["bdsname"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                            

                                            
                                        </div>

                                       
                                        <div class="row mb-4"><h6 class="my-0 text-primary">Allocate and Schedule Voc School</h6></div>
                                        <div class="row mb-4">
                                            <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                            <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;">

                                            <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>
                                            <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;">
                                        </div>

                                        
                                        <div class="row justify-content-end">
                                            <div>
                                                
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Allocate" value="Allocate">Allocate Beneficiary to Vocational School</button>
                                                
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