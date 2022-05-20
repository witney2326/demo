<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | Edit Cluster</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblcluster where ClusterID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $ClusterName= $row["ClusterName"];               
                $regionID = $row["regionID"];
                $districtID= $row["districtID"];
                $taID= $row["taID"];
                $gvhID= $row["gvhID"];               
                $cohort = $row["cohort"];
            }
            $result_set->close();
        }

        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }

        function r_name($link, $rcode)
        {
        $region_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $dis = mysqli_fetch_array($region_query);// fetch data
        return $dis['name'];
        }

        function ta_name($link, $tacode)
        {
        $ta_query = mysqli_query($link,"select TAName from tblta where TAID='$tacode'"); // select query
        $ta = mysqli_fetch_array($ta_query);// fetch data
        return $ta['TAName'];
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
                                    <h5 class="my-0 text-success">Edit Cluster: <?php echo $ClusterName; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="basicCLSedit_save.php" method="POST" >
                                        <div class="row mb-1">
                                            <label for="cluster_id" class="col-sm-2 col-form-label">Cluster ID</label>                       
                                            <input type="text" class="form-control" id="cluster_id" name = "cluster_id" value="<?php echo $id ; ?>" style="max-width:30%;">

                                            <label for="cluster_name" class="col-sm-2 col-form-label">Cluster Name</label>
                                            <input type="text" class="form-control" id="cluster_name" name ="cluster_name" value = "<?php echo $ClusterName ; ?>" style="max-width:30%;">
                                            
                                        </div>
                                       
                                        
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                            
                                            <select class="form-select" name="region" id="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $regionID; ?>" ><?php echo r_name($link,$regionID) ; ?></option>
                                            </select>
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <select class="form-select" name="district" id="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $districtID; ?>" ><?php echo dis_name($link,$districtID) ; ?></option>                   
                                            </select>
                                        </div>

                                       
                                        <div class="row mb-1">
                                            <label for="ta" class="col-sm-2 col-form-label">TA</label>
                                            
                                            <select class="form-select" name="ta" id="ta" value ="<?php echo $taID ; ?>" style="max-width:30%;" required>
                                                <option selected value="$taID" ><?php echo ta_name($link,$taID) ; ?></option>
                                                    <?php                                                           
                                                        $ta_fetch_query = "SELECT TAID,TAName FROM tblta where DistrictID ='$DistrictID'";                                                  
                                                        $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                        ?>
                                                        <option value="<?php echo $DB_ROW_ta["TAID"]; ?>">
                                                            <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                            </select>
                                            
                                            <label for="gvh" class="col-sm-2 col-form-label">GVH</label>
                                            <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" style="max-width:30%;" >
                                        </div>

                                                                                
                                        <div class="row mb-1">
                                            <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                            
                                            <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" >
                                            
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save Edited Record</button>
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