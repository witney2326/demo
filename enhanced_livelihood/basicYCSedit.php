<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>YCS | Edit Youth</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
</head>

<?php include '../layouts/body.php'; ?>
<?php include '../lib.php'; ?>
<?php
  
      include "../layouts/config.php"; // Using database connection file here
      
      $id = $_GET['id']; // get id through query string
     $query="select * from tblycs where recID='$id'";
      
      if ($result_set = $link->query($query)) {
          while($row = $result_set->fetch_array(MYSQLI_ASSOC))
          { 
              $groupID= $row["groupID"];
              $hh_code= $row["hh_code"];
              $beneficiary= $row["beneficiary"];
              $voc_type = $row["voc_type"];
              $national_id= $row["national_id"];
              $gender= $row["gender"];
              $dob= $row["dob"];
              $vocSchoolLinked = $row["vocSchoolLinked"];
              $bus_concept_developed = $row["bus_concept_developed"];
              $bc_assesed = $row["bc_assesed"];
              $bc_assesed_result = $row["bc_assesed_result"];
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
                    <div class="col-12">

                        <?php include '../layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">Edit YCS Record: <?php echo $beneficiary; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="basicYCSedit_save.php" method="POST" >
                                        <div class="row mb-1">
                                            <label for="recid" class="col-sm-2 col-form-label">Record No</label>
                                            <input type="text" class="form-control" id="recid" name = "recid" value="<?php echo $id ; ?>" style="max-width:30%;">
                                            
                                            
                                        </div>
                                        <div class="row mb-1">
                                            <label for="hhcode" class="col-sm-2 col-form-label">HH Code</label>
                                            <input type="text" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $hh_code ; ?>" style="max-width:30%;">
                                            
                                            <label for="ben" class="col-sm-2 col-form-label">Beneficiary</label>
                                            <input type="text" class="form-control" id="ben" name ="ben" value = "<?php echo $beneficiary ; ?>" style="max-width:30%;">
                                        </div>
                                        <div class="row mb-1">
                                            <label for="voc_skill" class="col-sm-2 col-form-label">Voc Skill</label>
                                            <select class="form-select" name="voc_skill" id="voc_skill" value ="<?php echo $voc_type ; ?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $voc_type;?>" ><?php echo iga_name($link,$voc_type) ; ?></option>
                                                    <?php                                                           
                                                        $ta_fetch_query = "SELECT ID,name FROM tbliga_types";                                                  
                                                        $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                        ?>
                                                        <option value="<?php echo $DB_ROW_ta["ID"]; ?>">
                                                            <?php echo $DB_ROW_ta["name"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                            </select>
                                            
                                            <label for="natID" class="col-sm-2 col-form-label">Nat ID</label>
                                            <input type="text" class="form-control" id="natID" name="natID" value ="<?php echo $national_id ; ?>" style="max-width:30%;" >
                                        </div>
                                        <div class="row mb-1">
                                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                            <input type="text" class="form-control" id="gender" name="gender" value ="<?php echo $gender ; ?>" style="max-width:30%;" >
                                            
                                            <label for="dob" class="col-sm-2 col-form-label">DOB</label>
                                            <input type="date" class="form-control" id="dob" name="dob" value ="<?php echo $dob ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="voc" class="col-sm-2 col-form-label">Skills Linkage</label>
                                            <input type="text" class="form-control" id="voc" name="voc" value =" <?php echo $vocSchoolLinked ; ?>" style="max-width:30%;" >

                                            <label for="concept" class="col-sm-2 col-form-label">Bus Concept</label>
                                            <input type="text" class="form-control" id="concept" name="concept" value =" <?php echo $bus_concept_developed ; ?>" style="max-width:30%;" >
                                        </div>
                                        <div class="row mb-4">
                                            <label for="conc_assesed" class="col-sm-2 col-form-label">BC assesed</label>
                                            <input type="text" class="form-control" id="conc_assesed" name="conc_assesed" value =" <?php echo $bc_assesed ; ?>" style="max-width:30%;" >

                                            <label for="assess_result" class="col-sm-2 col-form-label">Ass. Rsult</label>
                                            <input type="text" class="form-control" id="assess_result" name="assess_result" value =" <?php echo $bc_assesed_result ; ?>" style="max-width:30%;" >
                                        </div>

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Edited Record</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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