<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Basic Livelihood | View Meeting Details</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblawareness_meetings where meetingID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $hhname= $id;
                
                $regionID = $row["regionID"];
                $districtID= $row["DistrictID"];
                $sectorID = $row["sectorID"];
                $femalesNo = $row["femalesNo"];
                $malesNo = $row["malesNo"];
                $orientationDate = $row["orientationDate"];
            }
            $result_set->close();
        }

        function dis_name($link, $disID)
         {
         $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
         $dis = mysqli_fetch_array($dis_query);// fetch data
         return $dis['DistrictName'];
         }
 
         function sector_name($link, $progID)
         {
         $prog_query = mysqli_query($link,"select name from tblsector where id='$progID'"); // select query
         $prog = mysqli_fetch_array($prog_query);// fetch data
         return $prog['name'];
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
                                    <h5 class="my-0 text-success"> Sensitization Meeting/Orientation</h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-4">
                                            <label for="hh_id" class="col-sm-3 col-form-label">Meeting ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row mb-4">
                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                                                                                                       
                                        
                                        <div class="row mb-4">
                                            <label for="males" class="col-sm-3 col-form-label">No. Males </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="males" name="males" value =" <?php echo $malesNo ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="females" class="col-sm-3 col-form-label">No. Females </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="females" name="females" value =" <?php echo $femalesNo ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="sppname" class="col-sm-3 col-form-label">Sector Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="sppname" name="sppname" value =" <?php echo sector_name($link,$sectorID) ; ?>" style="max-width:30%;" disabled ="True">
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