<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | ESS Safeguard Plans</title>
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
        
        function grp_name($link, $grpID)
        {
        $grp_query = mysqli_query($link,"select groupname from tblgroup where groupID='$grpID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['groupname'];
        }

        function iga_name($link, $igaID)
        {
        $iga_query = mysqli_query($link,"select name from tbliga_types where ID='$igaID'"); // select query
        $iga = mysqli_fetch_array($iga_query);// fetch data
        return $iga['name'];
        }

        function cat_name($link, $catID)
        {
        $cat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $cat = mysqli_fetch_array($cat_query);// fetch data
        return $cat['catname'];
        }

        function indicator_name($link, $indiID)
        {
        $indi_query = mysqli_query($link,"select indicator from tblsafeguard_indicators where indicatorID='$indiID'"); // select query
        $indi = mysqli_fetch_array($indi_query);// fetch data
        return $indi['indicator'];
        }

        function activity_name($link, $activityID)
        {
        $act_query = mysqli_query($link,"select action from tblsafeguards_mitigation_activity where activityID='$activityID'"); // select query
        $act = mysqli_fetch_array($act_query);// fetch data
        return $act['action'];
        }

        

        $districtID = $_GET["district"]; 
        $groupname = grp_name($link,$_GET["group_code"]); 
        $buscat = $_GET["buscat"];

        
        $id = $_GET['group_code']; // get id through query string
        $query="select * from tblgroup where groupID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $districtID= $row["DistrictID"];
                $cohort = $row["cohort"];
                $groupname = $row["groupname"];  
            }
            $result_set->close();
        }

        if(isset($_POST['Submit']))
            { 
            $groupID = $_POST["group_code"];
            $district= $_POST["district"];
            $iga = $_POST['iga'];
            $males = $_POST["males"];
            $females = $_POST["females"];
            $amount = $_POST['amount_invested'];
            
            
                $sql = "INSERT INTO tblgroup_iga (groupID,districtID,type,no_male,no_female,amount_invested)
                VALUES ('$groupID','$district','$iga','$males','$females','$amount')";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG IGA Record has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
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

                        <div class="card border border-primary">
                            
                            <div class="card-body">
                                <h5 class="card-title mt-0"></h5>
                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="" method ="GET" >
                                    <div class="col-12">
                                        <label for="region" class="form-label">Business Category</label>
                                        <div>
                                            <select class="form-select" name="buscat" id="buscat" value ="<?php echo $buscat; ?>" required>
                                                <option selected value="<?php echo $buscat; ?>"><?php echo cat_name($link,$buscat); ?></option>       
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid Business Category.
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        
                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                    </div>
                                </form>                                             
                                <!-- End Here -->
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">ESS Safeguards Plan -SLG- <?php echo $groupname ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="insertSLGSafeguardPlan.php">
                                       
                                        <div class="row mb-2">
                                            <label for="group_code" class="col-sm-2 col-form-label">Group Code</label>
                                            <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $id; ?>" style="max-width:30%;" readonly >

                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                                                                                                       
                                        <div class="row mb-2">
                                            <label for="buscat1" class="col-sm-2 col-form-label">Bus Cat</label>
                                            <select class="form-select" name="buscat1" id="buscat1" value ="<?php echo $buscat; ?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $buscat; ?>"><?php echo cat_name($link,$buscat); ?></option>   
                                            </select>

                                            <label for="bustype" class="col-sm-2 col-form-label">Bus Type</label>
                                            <select class="form-select" name="bustype" id="bustype" value ="" style="max-width:30%;" required >
                                                <option></option>
                                                <?php                                                           
                                                    $type_fetch_query = "SELECT type FROM tblgroup_iga where ((groupID = '$id') and (bus_category='$buscat'))";                                                  
                                                    $result_type_fetch = mysqli_query($link, $type_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_type = mysqli_fetch_array($result_type_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_type["type"]; ?>">
                                                        <?php echo iga_name($link,$DB_ROW_type["type"]); ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="row mb-2">
                                            <label for="sactivity" class="col-sm-2 col-form-label">Activity</label>
                                            <select class="form-select" name="sactivity" id="sactivity" value ="" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                    $act_fetch_query = "SELECT activityID,action FROM tblsafeguards_mitigation_activity where categoryID = '$buscat'";                                                  
                                                    $result_act_fetch = mysqli_query($link, $act_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_act = mysqli_fetch_array($result_act_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_act["activityID"]; ?>">
                                                        <?php echo $DB_ROW_act["action"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>

                                            <label for="indicator" class="col-sm-2 col-form-label">Indicator</label>
                                            <select class="form-select" name="indicator" id="indicator" value ="" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                    $indi_fetch_query = "SELECT distinct indicatorID FROM tblsafeguards_mitigation_activity where categoryID = '$buscat'";                                                  
                                                    $result_indi_fetch = mysqli_query($link, $indi_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_indi = mysqli_fetch_array($result_indi_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_indi["indicatorID"]; ?>">
                                                        <?php echo indicator_name($link,$DB_ROW_indi["indicatorID"]); ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>
                                        </div>

                                        
                                        <div class="row mb-2">
                                            <label for="target" class="col-sm-2 col-form-label">Target</label>
                                            <input type="text" class="form-control" id="target" name="target"  style="max-width:30%;">

                                            <label for="amount_invested" class="col-sm-2 col-form-label">Invested</label>
                                            <input type="text" class="form-control" id="amount_invested" name="amount_invested"  style="max-width:30%;">
                                        </div>

                                        <div class="row mb-2">
                                            <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                                            <input type="date" class="form-control" id="startdate" name="startdate"  style="max-width:30%;">

                                            <label for="finishdate" class="col-sm-2 col-form-label">Finish Date</label>
                                            <input type="date" class="form-control" id="finishdate" name="finishdate"  style="max-width:30%;">
                                        </div>

                                        <div class="row mb-2">
                                            
                                        </div>

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save New SLG Safeguard Plan Record</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary">ESS Safeguard Plans</h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                            
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            <th>Plan ID</th>   
                                            <th>SLG Name</th>
                                            <th>District</th>
                                            <th>IGA Type</th>
                                            <th>Planned Activity</th>
                                            <th>Indicator</th>
                                            <th>Target</th>
                                            <th>Due Date</th>
                                            <th>Budget</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            $id = $_GET['group_code'];
                                            $query="select * from tblsafeguard_group_plans where groupID ='$id';";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                $group = grp_name($link, $id);
                                                $amount = number_format(0,"2");

                                               
                                                $district_name = dis_name($link,$row["districtID"]);
                                                $ig_name = iga_name($link,$row["busTypeID"]);
                                                $activity = activity_name($link,$row["activityID"]);
                                                $indicator = indicator_name($link,$row["indicator"]);

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["planID"]."</td>\n";
                                                  
                                                echo "\t\t<td>$group</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                echo "\t\t<td>$activity</td>\n";
                                                echo "\t\t<td>$indicator</td>\n";
                                                echo "<td>".$row["target"]."</td>\n";
                                                echo "<td>".$row["finishdate"]."</td>\n";
                                                echo "\t\t<td>$amount</td>\n";
                                                
                                                echo "<td>
                                                    <a href=\"basicCLSESMPPlansEdit.php?id=".$row['planID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"basicSLGMemberSavingsDelete.php?id=".$row['planID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
                                                </td>\n";
                                            echo "</tr>\n";
                                            }
                                            $result_set->close();
                                            }                          
                                        ?>
                                    </tbody>
                                </table>
                                </p>
                            </div>
                        </div>     
                    </div>            
                </div> 

            </div>
        </div>
    </div>
</div>