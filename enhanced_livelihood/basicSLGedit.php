<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>SLG | Edit SL Group</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    <?php
        include "../layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblgroup where groupID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["groupname"];
                $DateEstablished= $row["DateEstablished"];
                $regionID = $row["regionID"];
                $DistrictID= $row["DistrictID"];
                $TAID= $row["TAID"];
                $gvhID= $row["gvhID"];
                $MembersM= $row["MembersM"];
                $MembersF = $row["MembersF"];
                $clusterID = $row["clusterID"];
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

        function cls_name($link, $clscode)
        {
        $cls_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
        $cls = mysqli_fetch_array($cls_query);// fetch data
        return $cls['ClusterName'];
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

                        <?php include '../layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">Edit SLG: <?php echo $groupname; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="basicSLGedit_save.php" method="POST" >
                                        <div class="row mb-4">
                                            <label for="group_id" class="col-sm-3 col-form-label">Group ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="group_name" class="col-sm-3 col-form-label">SL Group Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="date_formed" class="col-sm-3 col-form-label">Date Formed</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="date_formed" name="date_formed" value ="<?php echo $DateEstablished ; ?>" style="max-width:30%;">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="region" id="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" required>
                                                    <option selected value="$region" ><?php echo r_name($link,$regionID) ; ?></option>
                                                        
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="district" id="district" value ="<?php echo $DistrictID ; ?>" style="max-width:30%;" required>
                                                    <option selected value="$DistrictID" ><?php echo dis_name($link,$DistrictID) ; ?></option>
                                                        
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="ta" class="col-sm-3 col-form-label">Traditional Authority</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="ta" id="ta" value ="<?php echo $TAID ; ?>" style="max-width:30%;" required>
                                                    <option selected value="$TAID" ><?php echo ta_name($link,$TAID) ; ?></option>
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
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="gvh" class="col-sm-3 col-form-label">Group Village Head</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" style="max-width:30%;" >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="no_males" class="col-sm-3 col-form-label">No. Of Males</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $MembersM ; ?>" style="max-width:30%;" >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="no_females" class="col-sm-3 col-form-label">No. Of Females</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $MembersF ; ?>" style="max-width:30%;">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="cluster" class="col-sm-3 col-form-label">Cluster Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="cluster" id="cluster" value ="<?php echo $clusterID ; ?>" style="max-width:30%;" required>
                                                    <option selected value="$clusterID" ><?php echo cls_name($link,$clusterID) ; ?></option>
                                                        <?php                                                           
                                                            $cls_fetch_query = "SELECT ClusterID,ClusterName FROM tblcluster where taID ='$TAID'";                                                  
                                                            $result_cls_fetch = mysqli_query($link, $cls_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_cls = mysqli_fetch_array($result_cls_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_cls["ClusterID"]; ?>">
                                                                <?php echo $DB_ROW_cls["ClusterName"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="cohort" class="col-sm-3 col-form-label">Cohort</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" >
                                            </div>
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