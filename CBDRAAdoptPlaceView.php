<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CBDRA | View Adopted Place</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tbladoptplace where cluster='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
               
                $regionID = $row["region"];
                $districtID= $row["districtID"];
                $ta = $row["ta"];
                
                $place = $row["place"];
                $purpose = $row["purpose"];
                
            }
            $result_set->close();
        }

        function dis_name($link, $disID)
         {
         $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
         $dis = mysqli_fetch_array($dis_query);// fetch data
         return $dis['DistrictName'];
         }
 
         function ta_name($link, $ID)
         {
         $prog_query = mysqli_query($link,"select TAName from tblta where TAID='$ID'"); // select query
         $prog = mysqli_fetch_array($prog_query);// fetch data
         return $prog['TAName'];
         }

         function get_rname($link, $rcode)
         {
         $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['name'];
         }

         function clsname($link, $clscode)
         {
         $rg_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['ClusterName'];
         }

         function purpose_name($link, $purposeid)
         {
         $rg_query = mysqli_query($link,"select purpose from tbladoptplacepurpose where id='$purposeid'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['purpose'];
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
                                    <h5 class="my-0 text-success"> CBDRA Adopt a Place: <?php echo clsname($link,$id);?> Cluster</h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        <div class="row mb-4">
                                            <label for="clinic_id" class="col-sm-3 col-form-label">Cluster ID.</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="clinic_id" name = "clinic_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="row mb-4">
                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php if (isset($regionID)) {echo get_rname($link,$regionID);} else {echo "Region Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php if (isset($districtID)) {echo dis_name($link,$districtID) ;} else {echo "District Not Set";} ?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="ta" class="col-sm-3 col-form-label">TA</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ta" name="ta" value ="<?php if (isset($ta)) {echo ta_name($link,$ta);} else {echo "TA Not Set";}?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>
                                                    
                                                                                
                                        <div class="row mb-4">
                                            <label for="place" class="col-sm-3 col-form-label">Adopted Place </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="place" name="place" value =" <?php if (isset($place)) {echo $place ;} else {echo "No Adopted Place";}?>" style="max-width:30%;" disabled ="True">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="purpose" class="col-sm-3 col-form-label">Purpose </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="purpose" name="purpose" value =" <?php if (isset($purpose)) {echo purpose_name($link,$purpose) ;} else {echo "Purpose Not Set";} ?>" style="max-width:30%;" disabled ="True">
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