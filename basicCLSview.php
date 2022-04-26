<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Clusters | View Cluster</title>
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
                $groupname= $row["ClusterName"];
                
                $regionID = $row["regionID"];
                $DistrictID= $row["districtID"];
                $TAID= $row["taID"];
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
        $rg = mysqli_fetch_array($region_query);// fetch data
        return $rg['name'];
        }

        function ta_name($link, $tacode)
        {
        $region_query = mysqli_query($link,"select TAName from tblta where TAID='$tacode'"); // select query
        $ta = mysqli_fetch_array($region_query);// fetch data
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

                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">Cluster - <?php echo $groupname ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-4">
                                            <label for="group_id" class="col-sm-3 col-form-label">Cluster ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="group_name" class="col-sm-3 col-form-label">Cluster Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo r_name($link,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="ta" class="col-sm-3 col-form-label">Traditional Authority</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo ta_name($link,$TAID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="gvh" class="col-sm-3 col-form-label">Group Village Head</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" disabled ="True" style="max-width:30%;" >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="no_males" class="col-sm-3 col-form-label">No. Of Males</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_males" name="no_males" value ="" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="no_females" class="col-sm-3 col-form-label">No. Of Females</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_females" name="no_females" value ="" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="cohort" class="col-sm-3 col-form-label">Cohort</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
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