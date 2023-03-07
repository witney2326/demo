<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG |Edit Household IGA</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here

        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }
        
        function grp_name($link, $grpID)
        {
        $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['groupname'];
        }
        
        function bus_cat_name($link, $catID)
        {
        $cat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $cat = mysqli_fetch_array($cat_query);// fetch data
        return $cat['catname'];
        }

        function iga_name($link, $igaID)
        {
        $iga_query = mysqli_query($link,"select name from tbliga_types where ID='$igaID'"); // select query
        $iga = mysqli_fetch_array($iga_query);// fetch data
        return $iga['name'];
        }

        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblmember_iga where recID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                
                
                $districtID= $row["districtID"];
                $hh_code = $row["sppCode"];
                $groupID = $row["groupID"];
                $bus_category = $row["bus_category"];
                $type = $row["type"];
                $amount = $row["amount_invested"];
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
                                    <h5 class="my-0 text-success">Edit IGA Record No. -- <?php echo $id ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="basicSLGMemberIGAEditSav.php">
                                        
                                        <div class="row mb-1">
                                            <label for="Rec_ID" class="col-sm-2 col-form-label">Rec ID</label>
                                            <input type="text" class="form-control" id="Rec_ID" name = "Rec_ID" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >

                                            <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label>
                                            <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $hh_code ; ?>" style="max-width:30%;" readonly >
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="group_code" class="col-sm-2 col-form-label">Group Name</label>
                                            <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo grp_name($link,$groupID) ; ?>" style="max-width:30%;" readonly >

                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;" readonly >
                                        </div>
                                                                            
                                        <div class="row mb-1">
                                            <label for="buscat" class="col-sm-2 col-form-label">Bus Cat</label>
                                            <select class="form-select" name="buscat" id="buscat" style="max-width:30%;" required>
                                                <option value="<?php echo $bus_category;?>"><?php echo bus_cat_name($link,$bus_category);?></option>
                                            </select>

                                            <label for="igatype" class="col-sm-2 col-form-label">IGA Type</label>
                                            <select class="form-select" name="igatype" id="igatype" style="max-width:30%;" required>
                                                <option value="<?php echo $type;?>"><?php echo iga_name($link,$type);?></option>
                                                <?php                                                           
                                                    $iga_fetch_query = "SELECT ID,name FROM tbliga_types where categoryID ='$bus_category'";                                                  
                                                    $result_iga_fetch = mysqli_query($link, $iga_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_iga = mysqli_fetch_array($result_iga_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_iga["ID"]; ?>">
                                                        <?php echo $DB_ROW_iga["name"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="amount" class="col-sm-2 col-form-label">Investment</label>
                                            <input type="text" class="form-control" id="amount" name="amount" value ="<?php echo $amount;?>" style="max-width:30%;">
                                        </div>

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn btn-outline-primary w-md" name="Update" value="Update">Update Current Record</button>
                                                <INPUT TYPE="button" class="btn btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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