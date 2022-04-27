<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>JSG | Edit Joint Skill Group </title>
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
                $groupID= $row["groupID"];               
                $districtID= $row["districtID"];
                $bus_category= $row["bus_category"];
                $type= $row["type"];
                $no_male= $row["no_male"];
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

        function grp_name($link, $grpcode)
        {
        $cls_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpcode'"); // select query
        $cls = mysqli_fetch_array($cls_query);// fetch data
        return $cls['groupname'];
        }

        function BusCat_name($link, $catID)
        {
        $BusCat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $BusCat = mysqli_fetch_array($BusCat_query);// fetch data
        return $BusCat['catname'];
        }
        function BusType_name($link, $typeID)
        {
        $BusType_query = mysqli_query($link,"select name from tbliga_types where ID='$typeID'"); // select query
        $BusType = mysqli_fetch_array($BusType_query);// fetch data
        return $BusType['name'];
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
                                    <h5 class="my-0 text-success">Edit Joint Skill Group: <?php echo $jsg_name; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="jsg_edit_save.php" method="POST" >
                                        <div class="row mb-1">
                                            <label for="jsg_id" class="col-sm-3 col-form-label">JSG ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jsg_id" name = "jsg_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="jsg_name" class="col-sm-3 col-form-label">JSG Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $jsg_name ; ?>" style="max-width:30%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="group_name" class="col-sm-3 col-form-label">Group Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo grp_name($link,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="cluster_name" class="col-sm-3 col-form-label">Cluster Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cluster_name" name ="cluster_name" value = "<?php echo cls_name($link,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                                                                
                                        <div class="row mb-1">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="district" id="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;" required>
                                                    <option selected value="<?php echo $districtID; ?>" ><?php echo dis_name($link,$districtID) ; ?></option>
                                                        
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="bus_category" class="col-sm-3 col-form-label">Business Category</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="bus_category" name="bus_category" value ="<?php echo BusCat_name($link,$bus_category); ?>" style="max-width:50%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="type" class="col-sm-3 col-form-label">Business Type</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="type" name="type" value ="<?php echo BusType_name($link,$type) ; ?>" disabled ="True" style="max-width:50%;" >
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="no_males" class="col-sm-3 col-form-label">No. Of Males</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_males" name="no_males" value ="" style="max-width:30%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="no_females" class="col-sm-3 col-form-label">No. Of Females</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_females" name="no_females" value ="" style="max-width:30%;">
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