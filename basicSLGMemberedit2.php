<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG Household Edit</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    

    <?php
        include "layouts/config.php"; // Using database connection file here
        
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
                $hhstatus = $row["hhstatus"];
                $natID = $row["nat_id"];
                
                if ($row["hhstatus"] == 1){$hhstatus = 'Approved';}
                if ($row["hhstatus"] == 0){$hhstatus = 'Not Approved';}
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

         function get_rname($link, $rcode)
         {
         $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['name'];
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
                                    <h5 class="my-0 text-success"> SLG Edit Member - <?php echo $hhname ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action ="basicSLGMemberedit_saveNI.php" method="POST"> 
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label>                                      
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;">

                                            <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>                           
                                            <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;">                       
                                        </div>
                                                                                
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>                       
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link,$regionID) ; ?>" style="max-width:30%;">
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;">
                                        </div>

                                                                             
                                        
                                        <div class="row mb-1">
                                            <label for="group" class="col-sm-2 col-form-label">SLG Name</label>               
                                            <input type="text" class="form-control" id="group" name="group" value ="<?php echo grp_name($link,$groupID) ; ?>" style="max-width:30%;">
                                            
                                            <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                            <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                        <div class="row mb-1">
                                            <label for="sppname" class="col-sm-2 col-form-label">SPP Name</label>                                  
                                            <input type="text" class="form-control" id="sppname" name="sppname" value =" <?php echo prog_name($link,$sppname) ; ?>" style="max-width:30%;">
                                            
                                            <label for="hstatus" class="col-sm-2 col-form-label">HH Status</label>
                                            <input type="text" class="form-control" id="hstatus" name="hstatus" value ="<?php echo $hhstatus;?>" style="max-width:30%;">
                                        </div>
                                        <div class="row mb-1">
                                            <label for="nat_ID" class="col-sm-2 col-form-label">National ID</label>                                  
                                            <input type="text" class="form-control" id="nat_ID" name="nat_ID" value =" <?php echo $natID; ?>" style="max-width:30%;">
                                            
                                            
                                        </div>
                                        
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    
                                                    <button type="submit" class="btn btn-btn btn-outline-secondary w-md" name="Submit" value="Submit">Update National_ID or HH Name</button>
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