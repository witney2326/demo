<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | View Group Training</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
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
                <div class="row">
                    <div class="col-12">
                    <h5>Savings and Loan Group (SLG) Training Status</h5>
                        <?php include 'layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h6 class="my-0 text-primary"></i>SLG Name:- <?php echo $groupname ?> <?php echo "_"." "." "."Group ID:-"; echo " "; echo $id; echo "_"." "." "."District:-"; echo " "; echo dis_name($link,$DistrictID) ?> </h6>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row">
                                            <label for="no_males" class="col-sm-3 col-form-label">No. Of Males</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $MembersM ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>

                                            <label for="no_females" class="col-sm-3 col-form-label">No. Of Females</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $MembersF ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>

                                            <label for="cluster" class="col-sm-3 col-form-label">Cluster Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cluster" name="cluster" value ="<?php echo cls_name($link,$clusterID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>

                                            <label for="cohort" class="col-sm-3 col-form-label">Cohort</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                            
                                        </div>
                                        <div class="row mb-4">
                                            
                                        </div>
                                        <div class="row mb-4">
                                            <B>Training Status</B>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="gd" class="col-sm-3 col-form-label">Group Dynamics</label>
                                                
                                            <div class="col-sm-2">
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

                                            <label for="flt" class="col-sm-3 col-form-label">Financial Literacy</label>
                                                
                                            <div class="col-sm-2">
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

                                            <label for="bmt" class="col-sm-3 col-form-label">Business Management</label>
                                                
                                            <div class="col-sm-2">
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

                                            <label for="rk" class="col-sm-3 col-form-label">Record Keeping</label>
                                                
                                                <div class="col-sm-2">
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

                                                <label for="bk" class="col-sm-3 col-form-label">Book Keeping</label>
                                                
                                                <div class="col-sm-2">
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

                                                <label for="sg" class="col-sm-3 col-form-label">Safeguards</label>
                                                
                                                <div class="col-sm-2">
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

                                                <label for="gn" class="col-sm-3 col-form-label">Gender</label>
                                                
                                                <div class="col-sm-2">
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

                                                <label for="dra" class="col-sm-3 col-form-label">Disaster Risk Awareness</label>
                                                
                                                <div class="col-sm-2">
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
                                            <div class="col-sm-9">
                                                <div>
                                                
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