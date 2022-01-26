<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CBDRA |Edit Adopt a Place</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here

        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }
        
        function cluster_name($link, $clsID)
        {
        $grp_query = mysqli_query($link,"select clustername from tblcluster where clusterID='$clsID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['clustername'];
        }

        function ta_name($link, $ID)
        {
        $grp_query = mysqli_query($link,"select TAName from tblta where TAID='$ID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['TAName'];
        }

        function purpose_name($link, $purposeid)
         {
         $rg_query = mysqli_query($link,"select purpose from tbladoptplacepurpose where id='$purposeid'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['purpose'];
         }

        $id = $_GET['id']; // get id through query string
       $query="select * from tbladoptplace where cluster='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            {   
                $PlaceNo = $row["id"];
                $districtID= $row["districtID"];
                $ta = $row["ta"];
                $place = $row["place"];
                $purpose = $row["purpose"]; 
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
                                    <h5 class="my-0 text-success">Adopt Place Record No. -- <?php if (isset($PlaceNo)) {echo $PlaceNo ;} else {echo "Not Set";} ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="CBDRAAdoptPlaceEditSav.php">
                                        
                                        
                                        <div class="row mb-4">
                                            <label for="rec_no" class="col-sm-3 col-form-label">Record No.</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="rec_no" name = "rec_no" value="<?php if (isset($PlaceNo)) echo $PlaceNo ; ?>" style="max-width:30%;" >
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="cluster_name" class="col-sm-3 col-form-label">Cluster Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cluster_name" name = "cluster_name" value="<?php echo cluster_name($link,$id) ; ?>" style="max-width:30%;"  >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php if (isset($districtID)) {echo dis_name($link,$districtID) ;} ?>" style="max-width:30%;"  >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="ta" class="col-sm-3 col-form-label">Trad. Authority</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ta" name="ta" value ="<?php if (isset($ta)) {echo ta_name($link,$ta) ;} ?>" style="max-width:30%;"  >
                                            </div>
                                        </div>
                                                                               
                                        <div class="row mb-4">
                                            <label for="place" class="col-sm-3 col-form-label">Place</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="place" id="place" value="<?php if (isset($place)) {echo $place ;} else {echo "";} ?>" style="max-width:40%;" required>
                                            </div>  
                                        </div>

                                        <div class="row mb-4">
                                            <label for="purpose" class="col-sm-3 col-form-label">Purpose For Adoption</label>
                                            <select class="form-select" name="purpose" id="purpose" style="max-width:30%;" required>
                                                <option value="<?php if (isset($purpose)) {echo $purpose;}?>"><?php if (isset($purpose)) {echo purpose_name($link,$purpose);} ?></option>
                                                <?php                                                           
                                                    $purpose_fetch_query = "SELECT id, purpose FROM tbladoptplacepurpose";                                                  
                                                    $result_purpose_fetch = mysqli_query($link, $purpose_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_purpose = mysqli_fetch_array($result_purpose_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_purpose["id"]; ?>">
                                                        <?php echo $DB_ROW_purpose["purpose"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>
                                        </div>

                                        
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" name="Update" id="Update" value="Update">Update Current Record</button>
                                                    
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