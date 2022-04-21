<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CIMIS | Group Training</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    

</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblgroup where groupID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["groupname"];
                $regionID = $row["regionID"];
                $DistrictID= $row["DistrictID"];
                $TAID= $row["TAID"];
                $gvhID= $row["gvhID"];
                $cohort = $row["cohort"];
            }
            $result_set->close();
        }

        if(isset($_POST['Submit']))
            {
              
            $groupID = $_POST['group_id'];
            $DistrictID = $_POST['district'];
            $trainingtype = $_POST['trainingtype'];
            $startdate = $_POST['startdate'];
            $finishdate = $_POST['finishdate'];
            $malesn = $_POST['malesn'];
            $femalesn = $_POST['femalesn'];
            $trainedby = $_POST['trainedby'];

            
            
                $sql = "INSERT INTO tblgrouptrainings (regionID,districtID,groupID,TrainingTypeID,StartDate,FinishDate,trainedBy,Males,Females)
                VALUES ('$regionID ','$DistrictID','$id','$trainingtype','$startdate','$finishdate','$trainedby','$malesn','$femalesn')";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Training Record has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_training.php";';
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
    
            function dis_name($link, $disID)
            {
            $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
            while($dis = mysqli_fetch_array($dis_query)){
               return $dis['DistrictName'];
            };// fetch data
            
            
            }

            function ta_name($link, $taID)
            {
            $dis_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
            $tame = mysqli_fetch_array($dis_query);// fetch data
            return $tame['TAName'];
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
                                    <h6 class="my-0 text-primary">Update Training Record For SLG:<?php echo" ". $groupname; ?><?php echo ";"." "." "."Group ID:-"; echo " "; echo $id; echo ";"." "." "."District:-"; echo " "; echo dis_name($link,$DistrictID) ?></h6>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        <div class="row mb-4">
                                            <label for="group_id" class="col-sm-3 col-form-label">Group ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            </div>

                                            <label for="group_name" class="col-sm-3 col-form-label">SL Group Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;" readonly >
                                            </div>

                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" readonly >
                                            </div>

                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo $DistrictID ; ?>" style="max-width:30%;" readonly >
                                            </div>

                                            

                                            

                                            <label for="cohort" class="col-sm-3 col-form-label">Cohort</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cohort" name="cohort" value ="<?php echo $cohort ; ?> " style="max-width:30%;" readonly >
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

                                        </div>

                                        <div class="row mb-4">
                                            <label for="malesn" class="col-sm-3 col-form-label">No. Males Trained</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="malesn" name="malesn" min="0" max="300" value ="" style="max-width:30%;">
                                            </div>

                                            <label for="femalesn" class="col-sm-3 col-form-label">No. Females Trained</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="femalesn" name="femalesn" min="0" max="300" value ="" style="max-width:30%;">
                                            </div>
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
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Record</button>
                                                    <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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