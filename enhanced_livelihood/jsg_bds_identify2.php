<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>JSG | BDS Identification</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

}
    

</head>

<div id="layout-wrapper">

    <?php
        include "../layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tbljsg where recID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $jsg_name= $row["jsg_name"];
               
                $DistrictID= $row["districtID"];
                $bus_category= $row["bus_category"];
                $type= $row["type"];
                
            }
            
        }

            function get_rname($link, $rcode)
            {
            $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
            while($rg = mysqli_fetch_array($rg_query)){
               return $rg['name'];
            };// fetch data
            
            }
    
            function dis_name($link, $disID)
            {
            $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
            while($dis = mysqli_fetch_array($dis_query)){
               return $dis['DistrictName'];
            };// fetch data
            
            function BusCat_name($link, $catID)
            {
            $BusCat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
            $BusCat = mysqli_fetch_array($BusCat_query);// fetch data
            return $BusCat['catname'];
            }


            function ta_name($link, $taID)
            {
            $dis_query = mysqli_query($link,"select TAName from tblta where TAID='$taID'"); // select query
            $tame = mysqli_fetch_array($dis_query);// fetch data
            return $tame['TAName'];
            }
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

                        <?php include '../layouts/body.php'; ?>
                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h6 class="my-0 text-primary">Identify BDS For JSG:<?php echo" ". $jsg_name; ?><?php echo ";"." "." "."JSG ID:-"; echo " "; echo $id; echo ";"." "." "."District:-"; echo " "; echo dis_name($link,$DistrictID) ?></h6>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        <div class="row mb-1">
                                            <label for="group_id" class="col-sm-3 col-form-label">JSG ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            </div>

                                            <label for="jsg_name" class="col-sm-3 col-form-label">SL Group Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jsg_name" name ="jsg_name" value = "<?php echo $jsg_name ; ?>" style="max-width:30%;" readonly >
                                            </div>

                                            
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo $DistrictID ; ?>" style="max-width:30%;" readonly >
                                            </div>

                                        </div>
                                        
                                        

                                        <div class="row mb-4">
                                            <?php 
                                                function Buscat1_name($link, $catID)
                                                {
                                                    $BusCat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
                                                    $BusCat = mysqli_fetch_array($BusCat_query);// fetch data
                                                    return $BusCat['catname'];
                                                }
                                                
                                            ?>
                                            <label for="buscat" class="col-sm-3 col-form-label">Business Category</label>
                                            <select class="form-select" name="buscat" id="buscat" style="max-width:30%;" required>
                                                <option selected value="<?php echo $bus_category;?>"><?php echo Buscat1_name($link,$bus_category);?></option>
                                            </select>

                                            <label for="bustype" class="col-sm-2 col-form-label">Business Type</label>
                                            <?php
                                            function BusType_name($link, $typeID)
                                                {
                                                    $BusType_query = mysqli_query($link,"select name from tbliga_types where ID='$typeID'"); // select query
                                                    $BusType = mysqli_fetch_array($BusType_query);// fetch data
                                                    return $BusType['name'];
                                                }
                                                ?>
                                            <select class="form-select" name="bustype" id="bustype" style="max-width:25%;" required>
                                                <option selected value="<?php echo $type;?>"><?php echo BusType_name($link,$type);?></option>
                                                
                                            </select>

                                        </div>

                                        <div class="row mb-4">
                                            <label for="bds" class="col-sm-3 col-form-label">Available BDS</label>
                                            
                                            <div class="col-sm-9">
                                                <select class="form-select" name="slg" id="slg" style="max-width:40%;" required>
                                                    <option ></option>
                                                        <?php                                                           
                                                            $slg_fetch_query = "SELECT bdsID,bdsname FROM tblbds where ((districtID = '01') and (bustypeID = '$type'))";                                                  
                                                            $result_slg_fetch = mysqli_query($link, $slg_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_slg = mysqli_fetch_array($result_slg_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_slg["bdsID"]; ?>">
                                                                <?php echo $DB_ROW_slg["bdsname"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                            </div>

                                            
                                        </div>

                                       
                                        <h6 class="my-0 text-primary">Allocate and Schedule BDS</h6>
                                        <div class="row mb-4">
                                            <label for="startdate" class="col-sm-3 col-form-label">Start Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="startdate" name="startdate" value ="" style="max-width:30%;">
                                            </div>

                                            <label for="finishdate" class="col-sm-3 col-form-label">Finish Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="finishdate" name="finishdate" value ="" style="max-width:30%;">
                                            </div>

                                        </div>

                                        
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Link BDS to JSG</button>
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Allocate" value="Allocate">Allocate BDS to JSG</button>
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