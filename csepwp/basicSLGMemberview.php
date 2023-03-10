<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG | View Member</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
</head>

<?php include '../layouts/body.php'; ?>
<?php include '../layouts/config2.php'; ?>
<?php include '../lib.php'; ?>
<?php
        $id = $_GET['id']; // get id through query string
        $query="select * from tblbeneficiaries where sppCode='$id'";
         if ($result_set = $link_cs->query($query)) {
             while($row = $result_set->fetch_array(MYSQLI_ASSOC))
             { 
                 $hhname= $row["hh_head_name"];
                 $regionID = $row["regionID"];
                 $districtID= $row["districtID"];
                 $nat_id= $row["nat_id"];
                 $groupID = $row["groupID"];
                 
                 
             }
             $result_set->close();
         }
 
             

         function month_name($month)
     {
         if($month == 1){
             $mname ='Jan';
         }
         if($month == 2){
             $mname ='Feb';
         }
         if($month == 3){
             $mname ='Mar';
         }
         if($month == 4){
             $mname ='Apr';
         }
         if($month == 5){
             $mname ='May';
         }
         if($month == 6){
             $mname ='Jun';
         }
         if($month == 7){
             $mname ='Jul';
         }
         if($month == 8){
             $mname ='Aug';
         }
         if($month == 9){
             $mname ='Sep';
         }
         if($month == 10){
             $mname ='Oct';
         }
         if($month == 11){
             $mname ='Nov';
         }
         if($month == 12){
             $mname ='Dec';
         }
         return $mname;
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
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP View Member</h4>
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

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Member Details</a>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card border border-success">
                                                        <h5 class="card-title mt-0"> Member Details</h5>   
                                                            <div class="col-lg-9">
                                                                <div class="row mb-1">
                                                                    <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label> 
                                                                    <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>
                                                                    <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="region" class="col-sm-2 col-form-label">Region</label>              
                                                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link_cs,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="district" class="col-sm-2 col-form-label">District</label>
                                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link_cs,$districtID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                                                    
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="group" class="col-sm-2 col-form-label">Group Name</label>              
                                                                    <input type="text" class="form-control" id="group" name="group" value ="<?php echo grp_name($link_cs,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="nat_id" class="col-sm-2 col-form-label">National ID</label>
                                                                    <input type="text" class="form-control" id="nat_id" name="nat_id" value =" <?php echo $nat_id ; ?>" style="max-width:30%;" disabled ="True">                                           
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
                        <!-- end card -->
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