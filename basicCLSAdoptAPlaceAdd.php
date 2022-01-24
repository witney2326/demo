<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CBDRA |Adopt a Place</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>


    

</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

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

        if(isset($_POST['Submit']))
            {    
            $clusterID = $_POST['group_id'];
            $DistrictID = dis_code($link,$_POST['district']);
            $region = region_code($link,$_POST['region']);
            $ta = tcode($link,$_POST['ta']);
            $place = $_POST['place'];
            $purpose = $_POST['purpose'];
            
                $sql = "INSERT INTO tbladoptplace (region,districtID,ta,cluster,place,purpose)
                VALUES ('$region','$DistrictID','$ta','$clusterID','$amount','$place','$purpose')";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("CBDRA Adopt a place Record has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            }
        
        function dis_code($link, $disname)
        {
        $dis_query = mysqli_query($link,"select DistrictID from tbldistrict where DistrictName='$disname'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictID'];
        }

        function region_code($link, $rname)
        {
        $rg_query = mysqli_query($link,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['regionID'];
        }


            
        function dis_name($link, $disID)
        {
            $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
            $dis = mysqli_fetch_array($dis_query);
            return $dis['DistrictName'];
        }

        function cls_name($link, $clID)
        {
            $rg_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clID'"); // select query
            $rg = mysqli_fetch_array($rg_query);
            return $rg['ClusterName'];
        }

        function rname($link, $rcode)
        {
        $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }

        function tname($link, $tcode)
        {
        $rg_query = mysqli_query($link,"select TAName from tblta where TAID='$tcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAName'];
        }

        function tcode($link, $tname)
        {
        $rg_query = mysqli_query($link,"select TAID from tblta where TAName='$tname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAID'];
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
                                    <h5 class="my-0 text-success">Add Adopted Place for Cluster: <?php echo cls_name($link,$id);?> </h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        <div class="row mb-4">
                                            <label for="group_id" class="col-sm-3 col-form-label">Cluster ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;"  >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="group_name" class="col-sm-3 col-form-label">SL Cluster Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;"  >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo rname($link,$regionID) ; ?>" style="max-width:30%;"  >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$DistrictID) ; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="ta" class="col-sm-3 col-form-label">Traditional Authority</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo tname($link,$TAID) ; ?>" style="max-width:30%;"  >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="gvh" class="col-sm-3 col-form-label">Group Village Head</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" style="max-width:40%;"  >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="cohort" class="col-sm-3 col-form-label">Cohort</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cohort" name="cohort" value ="<?php echo $cohort ; ?> " style="max-width:30%;"  >
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="place" class="col-sm-3 col-form-label">Adopted Place</label>
                                            <input type="text" class="form-control" name="place" id="place" style="max-width:40%;" required>
                                                
                                        </div>

                                        <div class="row mb-4">
                                            <label for="purpose" class="col-sm-3 col-form-label">Purpose</label>
                                            <select class="form-select" name="purpose" id="purpose" style="max-width:20%;" required>
                                                <option></option>
                                                <option value='01'>Afforestation</option>
                                                <option value='02'>Sanitation</option>
                                                <option value='03'>???</option>
                                                <option value='04'>????</option>
                                                
                                            </select>
                                        </div>

                                        

                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Save Record</button>
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