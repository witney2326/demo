<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Joint Skill Groups | View JSG</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tbljsg where recID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $jsg_name= $row["jsg_name"];
                
                $groupID = $row["groupID"];
                $DistrictID= $row["districtID"];
                $bus_category= $row["bus_category"];
                $type= $row["type"];
                $no_male = $row["no_male"];
                $no_female = $row["no_female"];
            }
            $result_set->close();
        }

        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }

        function group_name($link, $gcode)
        {
        $region_query = mysqli_query($link,"select groupname from tblgroup where groupID='$gcode'"); // select query
        $rg = mysqli_fetch_array($region_query);// fetch data
        return $rg['groupname'];
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
                                    <h5 class="my-0 text-success">Joint Skill Groups - <?php echo $jsg_name ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-4">
                                            <label for="jsg_id" class="col-sm-3 col-form-label">JSG ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="jsg_name" class="col-sm-3 col-form-label">JSG Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $jsg_name ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="group_id" class="col-sm-3 col-form-label">Group Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_id" name="group_id" value ="<?php echo group_name($link,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="bus_category" class="col-sm-3 col-form-label">Business Category</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bus_category" name="bus_category" value ="<?php echo $bus_category; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="type" class="col-sm-3 col-form-label">Business Type</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="type" name="type" value ="<?php echo $type ; ?>" disabled ="True" style="max-width:30%;" >
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