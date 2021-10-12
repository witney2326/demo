<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | View Member</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblbasic_beneficiary where hhcode='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $hhname= $row["hhname"];
                $hhdob= $row["hhdob"];
                $regionID = $row["regionID"];
                $districtID= $row["districtID"];
                $taID= $row["taID"];
                $gvhID= $row["gvhID"];
                $nationalID= $row["nationalID"];
                $village = $row["village"];
                $clusterID = $row["clusterID"];
                $groupID = $row["groupID"];
                $sppname = $row["sppname"];
                $cohort = $row["cohort"];
                
            }
            $result_set->close();
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
                                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i> SLG Member - <?php echo $hhname ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-4">
                                            <label for="hh_id" class="col-sm-3 col-form-label">Household Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="hh_name" class="col-sm-3 col-form-label">HH Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="date_Of_Birth" class="col-sm-3 col-form-label">Date Of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="date_Of_Birth" name="date_of_Birth" value ="<?php echo $hhdob ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo $regionID ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="ta" class="col-sm-3 col-form-label">Traditional Authority</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo $taID ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="gvh" class="col-sm-3 col-form-label">Group Village Head</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="village" class="col-sm-3 col-form-label">Village</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="village" name="village" value ="<?php echo $village ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="nationalID" class="col-sm-3 col-form-label">National ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nationalID" name="nationalID" value ="<?php echo $nationalID ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="cluster" class="col-sm-3 col-form-label">Cluster Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cluster" name="cluster" value ="<?php echo $clusterID ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="group" class="col-sm-3 col-form-label">Group Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group" name="group" value ="<?php echo $groupID ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="cohort" class="col-sm-3 col-form-label">Cohort</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="sppname" class="col-sm-3 col-form-label">SPP Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="sppname" name="sppname" value =" <?php echo $sppname ; ?>" style="max-width:30%;" disabled ="True">
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