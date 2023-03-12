<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>ESMP | Track Progress</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblsafeguard_group_plans where planID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                
                $groupID= $row["groupID"];
                $districtID = $row["districtID"];
                $taID= $row["taID"];
               
                $busTypeID = $row["busTypeID"];
                
                $activityID = $row["activityID"];
                $indicator = $row["indicator"];
                $target = $row["target"];
                $startdate = $row["startdate"];
                $finishdate = $row["finishdate"];

            }
            $result_set->close();
        }

        function dis_name($link, $disID)
         {
         $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
         $dis = mysqli_fetch_array($dis_query);// fetch data
         return $dis['DistrictName'];
         }
 
         function grp_name($link, $grpID)
         {
         $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
         $grp = mysqli_fetch_array($grp_query);// fetch data
         return $grp['groupname'];
         }
 
         function prog_name($link, $progID)
         {
         $prog_query = mysqli_query($link,"select progName from tblspp where progID='$progID'"); // select query
         $prog = mysqli_fetch_array($prog_query);// fetch data
         return $prog['progName'];
         }

         function ta_name($link, $tacode)
         {
         $ta_query = mysqli_query($link,"select TAName from tblta where TAID='$tacode'"); // select query
         $tta = mysqli_fetch_array($ta_query);// fetch data
         return $tta['TAName'];
         }

         function iga_name($link, $igaID)
         {
         $iga_query = mysqli_query($link,"select name from tbliga_types where ID='$igaID'"); // select query
         $iga = mysqli_fetch_array($iga_query);// fetch data
         return $iga['name'];
         }

         function activity_name($link, $activityID)
        {
        $act_query = mysqli_query($link,"select action from tblsafeguards_mitigation_activity where activityID='$activityID'"); // select query
        $act = mysqli_fetch_array($act_query);// fetch data
        return $act['action'];
        }

        function indicator_name($link, $indicatorID)
        {
        $indi_query = mysqli_query($link,"select indicator from tblsafeguard_indicators where indicatorID='$indicatorID'"); // select query
        $indi = mysqli_fetch_array($indi_query);// fetch data
        return $indi['indicator'];
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
                                    <h5 class="my-0 text-success">ESMP Progress Update for: <?php echo grp_name($link, $groupID);?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action ="basicCLSESMPPlansProgressUpdate" method="POST"> 
                                        <div class="row mb-1">
                                            <label for="plan_id" class="col-sm-2 col-form-label">Plan ID</label>
                                            <input type="text" class="form-control" id="plan_id" name = "plan_id" value="<?php echo $id ; ?>" style="max-width:30%;">

                                            <label for="group" class="col-sm-2 col-form-label">SLG</label>
                                            <input type="text" class="form-control" id="group" name="group" value ="<?php echo grp_name($link,$groupID) ; ?>" style="max-width:30%;">
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;">

                                            <label for="ta" class="col-sm-2 col-form-label">Trad. Authority</label>
                                            <input type="text" class="form-control" id="ta" name ="ta" value = "<?php echo ta_name($link,$taID); ?>" style="max-width:30%;">
                                        </div>

                                                                                                                        
                                        <div class="row mb-1">
                                            <label for="bustype" class="col-sm-2 col-form-label">Bus Type</label>
                                            <input type="text" class="form-control" id="bustype" name="bustype" value ="<?php echo iga_name($link,$busTypeID); ?>" style="max-width:30%;">

                                            <label for="sactivity" class="col-sm-2 col-form-label">P Activity</label>
                                            <input type="text" class="form-control" id="sactivity" name="sactivity" value =" <?php echo activity_name($link,$activityID) ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                                                               
                                        <div class="row mb-1">
                                            <label for="indicator" class="col-sm-2 col-form-label">Indicator</label>
                                            <input type="text" class="form-control" id="indicator" name="indicator" value =" <?php echo indicator_name($link,$indicator) ; ?>" style="max-width:30%;">

                                            <label for="hstatus" class="col-sm-2 col-form-label">Target</label>
                                            <input type="text" class="form-control" id="hstatus" name="hstatus" value ="<?php echo $target;?>" style="max-width:30%;">
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="achieved" class="col-sm-2 col-form-label">Achieved</label>
                                            <input type="number" step ="any" class="form-control" id="achieved" name="achieved"  style="max-width:30%;">

                                            <label for="achieved_date" class="col-sm-2 col-form-label">Achievement Date</label>
                                            <input type="date" class="form-control" id="achieved_date" name="achieved_date"  style="max-width:30%;">
                                        </div>

                                                                               

                                        <div class="row justify-content-end">
                                            
                                            <div>
                                                
                                                <button type="submit" class="btn btn-primary w-md" name="Update" value="Update" >Update ESMP Record</button>
                                                <INPUT TYPE="button" class="btn btn-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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