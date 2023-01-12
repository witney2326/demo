<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>Basic Livelihood | View Meeting Details</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    

    <?php
        include "././../../layouts/config2.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblawareness_meetings where meetingID='$id'";
        
        if ($result_set = $link_cs->query($query)) {
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

        function dis_name($link_cs, $disID)
         {
         $dis_query = mysqli_query($link_cs,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
         $dis = mysqli_fetch_array($dis_query);// fetch data
         return $dis['DistrictName'];
         }
 
         function sector_name($link_cs, $progID)
         {
         $prog_query = mysqli_query($link_cs,"select name from tblsector where id='$progID'"); // select query
         $prog = mysqli_fetch_array($prog_query);// fetch data
         return $prog['name'];
         }

         function get_rname($link_cs, $rcode)
         {
         $rg_query = mysqli_query($link_cs,"select name from tblregion where regionID='$rcode'"); // select query
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

                        <?php include '././../../layouts/body.php'; ?>
                        
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success"> Sensitization Meeting/Orientation</h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-1">
                                            <label for="hh_id" class="col-sm-2 col-form-label">Meeting ID</label>
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="sppname" class="col-sm-2 col-form-label">Sector Name</label>
                                            <input type="text" class="form-control" id="sppname" name="sppname" value =" <?php echo sector_name($link_cs,$sectorID) ; ?>" style="max-width:30%;" disabled ="True">

                                        </div>
                                        
                                        
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link_cs,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
 
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link_cs,$districtID) ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>
                                                                                                                                                             
                                        
                                        <div class="row mb-1">
                                            <label for="males" class="col-sm-2 col-form-label">No. Males </label>
                                            <input type="text" class="form-control" id="males" name="males" value =" <?php echo $malesNo ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="females" class="col-sm-2 col-form-label">No. Females </label>
                                            <input type="text" class="form-control" id="females" name="females" value =" <?php echo $femalesNo ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>

                                        <div class="row mb-3">
                                        </div>
                                        
                                        <div class="row justify-content-end"> 
                                            <div>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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