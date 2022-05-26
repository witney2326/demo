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

        function activity_name($link, $activityID)
        {
        $act_query = mysqli_query($link,"select action from tblsafeguards_mitigation_activity where activityID='$activityID'"); // select query
        $act = mysqli_fetch_array($act_query);// fetch data
        return $act['action'];
        }

        function indicator_name($link, $indicatorID)
        {
        $indi_query = mysqli_query($link,"select indicator from tblsafeguard_indicators where indicatorID='$indicatorID'"); // select query
        $indi = mysqli_fetch_array($indi_query);// fetch data
        return $indi['indicator'];
        }
           
       $id = $_GET['id']; // get id through query string
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

                        

                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">ESS Safeguards Plan -SLG- <?php echo $groupname ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                       
                                        <div class="row mb-2">
                                            <label for="group_code" class="col-sm-3 col-form-label">Group Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $id; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                            </div>
                                        </div>
      
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    
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
                                            $id = $_GET['id'];
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
                                                    <a href=\"basicCLSESMPPlansProgressTrack.php?id=".$row['planID']."\"><i class='fas fa-chart-line' title='Safeguard Implimentation Progress' style='font-size:18px'></i></a> 
                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This ESMP Record');\" href=\"basicCLSESMPPlansDelete.php?id=".$row['planID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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