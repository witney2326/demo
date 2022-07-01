<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | View Group Training</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

   

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        
        $id = $_GET['id']; // get id through query string

        $check = substr($id, 5, 3);
                                                                
        //if (($check == "CLU") or ($check == "CLS"))
        
        if (($check == "SLG"))
        {
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
                    $type = "SL Group";
                }
                
            }
        }
        if (($check == "CLU") or ($check == "CLS"))
        {
            
                $resultM = mysqli_query($link, "SELECT SUM(MembersM) AS total_males FROM tblgroup where ClusterID = '$id'"); 
                $rowM = mysqli_fetch_assoc($resultM); 
                $total_males = $rowM['total_males'];

                $resultF = mysqli_query($link, "SELECT SUM(MembersF) AS total_females FROM tblgroup where ClusterID = '$id'"); 
                $rowF = mysqli_fetch_assoc($resultF); 
                $total_females = $rowF['total_females'];

           
            $query="select * from tblcluster where ClusterID='$id'";
                
            if ($result_set = $link->query($query)) {
                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                { 
                    $groupname= $row["ClusterName"];
                    $DateEstablished= date('Y/m/d' );
                    $regionID = $row["regionID"];
                    $DistrictID= $row["districtID"];
                    $TAID= $row["taID"];
                    $gvhID= $row["gvhID"];
                    $MembersM= $total_males;
                    $MembersF = $total_females;
                    $clusterID = $row["ClusterID"];
                    $cohort = $row["cohort"];
                    $type = "Cluster";
                }
                
            }
        }

        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        } 

        function cls_name($link, $clsID)
        {
        $cls_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clsID'"); // select query
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
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Group Training Status</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_training.php">Training Management</a></li>
                                    <li class="breadcrumb-item active">Trained SLGs</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-4">
                                            <B>Group Profile</B>
                                        </div>
                                        <div class="row mb-1">
                                            <label for="groupID" class="col-sm-2 col-form-label">Group Code</label>
                                            <input type="text" class="form-control" id="groupID" name="groupID" value ="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                            
                                            <label for="groupname" class="col-sm-2 col-form-label">Group Name</label>
                                            <input type="text" class="form-control" id="groupname" name="groupname" value ="<?php echo $groupname ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                        <div class="row mb-1">
                                            <label for="type" class="col-sm-2 col-form-label">Group Type</label>
                                            <input type="text" class="form-control" id="type" name="type" value ="<?php echo $type ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                        <div class="row mb-1">
                                            <label for="no_males" class="col-sm-2 col-form-label">No. Of Males</label>
                                            <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $MembersM ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="no_females" class="col-sm-2 col-form-label">No. Of Females</label>
                                            <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $MembersF ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                        <div class="row mb-1">
                                            <label for="cluster" class="col-sm-2 col-form-label">Cluster Name</label>
                                            <input type="text" class="form-control" id="cluster" name="cluster" value ="<?php echo cls_name($link,$clusterID) ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                            <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                            
                                        
                                        <div class="row mb-4">
                                            
                                        </div>
                                        <div class="row mb-4">
                                            <B>Training Status</B>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="gd" class="col-sm-1 col-form-label">GD</label>
                                                
                                            <div class="col-sm-1">
                                            <?php
                                                    $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='01'))";
                                                    if ($result_set_GD = $link->query($query_training)) {
                                                        while($row_GD = $result_set_GD->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $tGD = $row_GD["TrainingID"];
                                                            
                                                        } 
                                        
                                                    }     
                                                ?>

                                                <input type="checkbox"  id="gd" name="gd" <?php if (isset($tGD)){if($tGD  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                            </div>

                                            <label for="flt" class="col-sm-1 col-form-label">FLT</label>
                                                
                                            <div class="col-sm-1">
                                            <?php
                                                    $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='02'))";
                                                    if ($result_set_FLT = $link->query($query_training)) {
                                                        while($row_FLT = $result_set_FLT->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $tFLT = $row_FLT["TrainingID"];
                                                            
                                                        } 
                                        
                                                    }     
                                                ?>

                                                <input type="checkbox"  id="flt" name="flt" <?php if (isset($tFLT)){if($tFLT  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                            </div>

                                            <label for="bmt" class="col-sm-1 col-form-label">BMT</label>
                                                
                                            <div class="col-sm-1">
                                            <?php
                                                    $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='03'))";
                                                    if ($result_set_BMT = $link->query($query_training)) {
                                                        while($row_BMT = $result_set_BMT->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            $tBMT = $row_BMT["TrainingID"];
                                                            
                                                        } 
                                        
                                                    }     
                                                ?>

                                                <input type="checkbox"  id="bmt" name="bmt" <?php if (isset($tBMT)){if($tBMT  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                            </div>

                                            <label for="rk" class="col-sm-1 col-form-label">RK</label>
                                                
                                                <div class="col-sm-1">
                                                    <?php
                                                        $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='04'))";
                                                        if ($result_set_RK = $link->query($query_training)) {
                                                            while($row_RK = $result_set_RK->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tRK = $row_RK["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="rk" name="rk" <?php if (isset($tRK)){if($tRK  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="bk" class="col-sm-1 col-form-label">BK</label>
                                                
                                                <div class="col-sm-1">
                                                    <?php
                                                        $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='05'))";
                                                        if ($result_set_BK = $link->query($query_training)) {
                                                            while($row_BK = $result_set_BK->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tBK = $row_BK["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="bk" name="bk" <?php if (isset($tBK)){if($tBK  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>


                                        </div>

                                        <div class="row mb-4">

                                                <label for="sg" class="col-sm-1 col-form-label">SG</label>
                                                
                                                <div class="col-sm-1">
                                                <?php
                                                        $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='06'))";
                                                        if ($result_set_SG = $link->query($query_training)) {
                                                            while($row_SG = $result_set_SG->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tSG = $row_SG["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="sg" name="sg" <?php if (isset($tSG)){if($tSG  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="gn" class="col-sm-1 col-form-label">Gend</label>
                                                
                                                <div class="col-sm-1">
                                                <?php
                                                        $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='07'))";
                                                        if ($result_set_GN = $link->query($query_training)) {
                                                            while($row_GN = $result_set_GN->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tGN = $row_GN["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="gn" name="gn" <?php if (isset($tGN)){if($tGN  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="dra" class="col-sm-1 col-form-label">DRA</label>
                                                
                                                <div class="col-sm-1">
                                                <?php
                                                        $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='08'))";
                                                        if ($result_set_DRA = $link->query($query_training)) {
                                                            while($row_DRA = $result_set_DRA->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tDRA = $row_DRA["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="dra" name="dra" <?php if (isset($tDRA)){if($tDRA  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="dra" class="col-sm-1 col-form-label">CME</label>
                                                <div class="col-sm-1">
                                                    <?php
                                                        $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='08'))";
                                                        if ($result_set_DRA = $link->query($query_training)) {
                                                            while($row_DRA = $result_set_DRA->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tDRA = $row_DRA["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="dra" name="dra" <?php if (isset($tDRA)){if($tDRA  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                                <label for="dra" class="col-sm-1 col-form-label">CMT</label>
                                                
                                                <div class="col-sm-1">
                                                    <?php
                                                        $query_training="select TrainingID from tblgrouptrainings where ((groupID='$id') and (TrainingTypeID ='08'))";
                                                        if ($result_set_DRA = $link->query($query_training)) {
                                                            while($row_DRA = $result_set_DRA->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                $tDRA = $row_DRA["TrainingID"];
                                                                
                                                            } 
                                            
                                                        }     
                                                    ?>
    
                                                    <input type="checkbox"  id="dra" name="dra" <?php if (isset($tDRA)){if($tDRA  > 0){ echo "checked='checked'";}} ?> disabled ="True">
                                                </div>

                                        </div>

                                        <div class="row justify-content-end">
                                            <p align="right">                                              
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </p>
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