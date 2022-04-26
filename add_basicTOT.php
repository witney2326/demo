<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CIMIS | Trainer of Trainer Training</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    

</head>

<div id="layout-wrapper">

   

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       

        if(isset($_POST['Submit']))
            { 
            $trainingtype = $_POST['trainingtype'];
            $startdate = $_POST['startdate'];
            $finishdate = $_POST['finishdate'];
            $title = $_POST['title'];
            $trainedby = $_POST['trainedby'];
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name']; 
            $gender = $_POST['gender'];
            $region = rcode($link,$id);
            
            
            $sql = "INSERT INTO tbltottraining (regionID,districtID,fname,lname,gender,title,TrainingTypeID,StartDate,FinishDate,trainedBy)
            VALUES ('$region ','$id','$fname','$lname','$gender','$title','$trainingtype','$startdate','$finishdate','$trainedby')";
            
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Training Record has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_tot.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            }
              
            function get_rname($link, $rcode)
            {
            $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
            while($rg = mysqli_fetch_array($rg_query)){
               return $rg['name'];
            };// fetch data
            
            }

            function rcode($link, $discode)
            {
            $rg_query = mysqli_query($link,"select regionID from tbldistrict where DistrictID='$discode'"); // select query
            while($rg = mysqli_fetch_array($rg_query)){
               return $rg['regionID'];
            };
            }
    
            function dis_name($link, $disID)
            {
            $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
            while($dis = mysqli_fetch_array($dis_query)){
               return $dis['DistrictName'];
            };
            }

            
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">

                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h6 class="my-0 text-primary">TOT Training Update ;  <?php echo dis_name($link,$id);  ?> District</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        <div class="row mb-4">

                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link,rcode($link,$id)); ?>" style="max-width:30%;" >
                                            </div>

                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$id); ?>" style="max-width:30%;" >
                                            </div>

                                            <label for="first_name" class="col-sm-3 col-form-label">Trainer First Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="first_name" name ="first_name" value = "" style="max-width:30%;" >
                                            </div>

                                            <label for="last_name" class="col-sm-3 col-form-label">Trainer Last Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="last_name" name ="last_name" value = "" style="max-width:30%;"  >
                                            </div>

                                            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                
                                                <input type="radio" id="male" name="gender" value="M">
                                                <label for="male">Male</label><br>
                                                <input type="radio" id="female" name="gender" value="F">
                                                <label for="female">Female</label><br>
                                            </div>

                                        </div>
                                        
                                        

                                        <div class="row mb-4">
                                            <label for="trainingtype" class="col-sm-3 col-form-label">Select Training Type</label>
                                            <select class="form-select" name="trainingtype" id="trainingtype" style="max-width:20%;" required>
                                                <option></option>
                                                <?php                                                           
                                                   $tt_fetch_query = "SELECT trainingTypeID, training_name FROM tbltraining_types";                                                  
                                                   $result_tt_fetch = mysqli_query($link, $tt_fetch_query);                                                                       
                                                   $i=0;
                                                      while($DB_ROW_tt = mysqli_fetch_array($result_tt_fetch)) {
                                                   ?>
                                                   <option value ="<?php
                                                         echo $DB_ROW_tt["trainingTypeID"];?>">
                                                      <?php
                                                         echo $DB_ROW_tt["training_name"];
                                                      ?>
                                                   </option>
                                                   <?php
                                                      $i++;
                                                         }
                                                ?>
                                            </select>

                                            <label for="trainedby" class="col-sm-3 col-form-label">Facilitated By</label>
                                            <select class="form-select" name="trainedby" id="trainedby" style="max-width:20%;" required>
                                                <option></option>
                                                <?php                                                           
                                                   $fc_fetch_query = "SELECT facilitatorID, title FROM tblfacilitator";                                                  
                                                   $result_fc_fetch = mysqli_query($link, $fc_fetch_query);                                                                       
                                                   $i=0;
                                                      while($DB_ROW_fc = mysqli_fetch_array($result_fc_fetch)) {
                                                   ?>
                                                   <option value ="<?php
                                                         echo $DB_ROW_fc["facilitatorID"];?>">
                                                      <?php
                                                         echo $DB_ROW_fc["title"];
                                                      ?>
                                                   </option>
                                                   <?php
                                                      $i++;
                                                         }
                                                ?>
                                            </select>

                                            <label for="title" class="col-sm-3 col-form-label">Trainee Title</label>
                                            <select class="form-select" name="title" id="title" style="max-width:20%;" required>
                                                <option></option>
                                                <?php                                                           
                                                   $an_fetch_query = "SELECT trainerID, title FROM tbltot";                                                  
                                                   $result_an_fetch = mysqli_query($link, $an_fetch_query);                                                                       
                                                   $i=0;
                                                      while($DB_ROW_an = mysqli_fetch_array($result_an_fetch)) {
                                                   ?>
                                                   <option value ="<?php echo $DB_ROW_an["trainerID"];?>">
                                                      <?php echo $DB_ROW_an["title"];?></option>
                                                   <?php
                                                      $i++;
                                                         }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="row mb-4">
                                            <label for="startdate" class="col-sm-3 col-form-label">Start Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;">
                                            </div>

                                            <label for="finishdate" class="col-sm-3 col-form-label">Finish Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;">
                                            </div>

                                        </div>

                                        
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Save TOT Record</button>
                                                    <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>