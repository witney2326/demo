<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | View Member</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'layouts/config.php'; ?>
<?php
        $id = $_GET['id']; // get id through query string
        $query="select * from tblbeneficiaries where sppCode='$id'";
         if ($result_set = $link->query($query)) {
             while($row = $result_set->fetch_array(MYSQLI_ASSOC))
             { 
                 $hhname= $row["hh_head_name"];;
                 $sppname= $row["spProg"];
                 $regionID = $row["regionID"];
                 $districtID= $row["districtID"];
                 $nat_id= $row["nat_id"];
                 $groupID = $row["groupID"];
                 
                 $cohort = $row["cohort"];
                 
             }
             $result_set->close();
         }
 
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
  
          function prog_name($link, $progID)
          {
          $prog_query = mysqli_query($link,"select progName from tblspp where progID='$progID'"); // select query
          $prog = mysqli_fetch_array($prog_query);// fetch data
          return $prog['progName'];
          }
 
          function get_rname($link, $rcode)
          {
          $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
          $rg = mysqli_fetch_array($rg_query);// fetch data
          return $rg['name'];
          }
 
         function iga_name($link, $igaID)
         {
         $iga_query = mysqli_query($link,"select name from tbliga_types where ID='$igaID'"); // select query
         $iga = mysqli_fetch_array($iga_query);// fetch data
         return $iga['name'];
         }
 
         function month_name($month)
     {
         if($month == 1){
             $mname ='Jan';
         }
         if($month == 2){
             $mname ='Feb';
         }
         if($month == 3){
             $mname ='Mar';
         }
         if($month == 4){
             $mname ='Apr';
         }
         if($month == 5){
             $mname ='May';
         }
         if($month == 6){
             $mname ='Jun';
         }
         if($month == 7){
             $mname ='Jul';
         }
         if($month == 8){
             $mname ='Aug';
         }
         if($month == 9){
             $mname ='Sep';
         }
         if($month == 10){
             $mname ='Oct';
         }
         if($month == 11){
             $mname ='Nov';
         }
         if($month == 12){
             $mname ='Dec';
         }
         return $mname;
     }
                
     ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">View Member</h4>
                            <div class="page-title-right">
                                    <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Member Details</a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Member Savings</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Member IGAs</a>
                                            <a class="nav-link mb-2" id="v-pills-mycs-tab" data-bs-toggle="pill" href="#v-pills-mycs" role="tab" aria-controls="v-pills-mycs" aria-selected="false">YCS Involvement</a>
                                            <a class="nav-link mb-2" id="v-pills-mjsg-tab" data-bs-toggle="pill" href="#v-pills-mjsg" role="tab" aria-controls="v-pills-mjsg" aria-selected="false">JSG Involvement</a>
                                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Graduation FS</a>
                                            <a class="nav-link" id="v-pills-gradmember-tab" data-bs-toggle="pill" href="#v-pills-gradmember" role="tab" aria-controls="v-pills-gradmember" aria-selected="false">Graduation ER</a>
                                            <a class="nav-link" id="v-pills-gradmemberNHS-tab" data-bs-toggle="pill" href="#v-pills-gradmemberNHS" role="tab" aria-controls="v-pills-gradmemberNHS" aria-selected="false">Graduation NHS</a>
                                            <a class="nav-link" id="v-pills-gradmemberNHS-tab" data-bs-toggle="pill" href="#v-pills-gradmemberSE" role="tab" aria-controls="v-pills-gradmemberSE" aria-selected="false">Graduation SE</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card border border-success">
                                                        <h5 class="card-title mt-0"> Member Details</h5>   
                                                            <div class="col-lg-9">
                                                                <div class="row mb-1">
                                                                    <label for="hh_id" class="col-sm-2 col-form-label">HH Code</label> 
                                                                    <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="hh_name" class="col-sm-2 col-form-label">HH Name</label>
                                                                    <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="region" class="col-sm-2 col-form-label">Region</label>              
                                                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="district" class="col-sm-2 col-form-label">District</label>
                                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                                                    
                                                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="group" class="col-sm-2 col-form-label">Group Name</label>              
                                                                    <input type="text" class="form-control" id="group" name="group" value ="<?php echo grp_name($link,$groupID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                                                    <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                
                                                                <div class="row mb-1">
                                                                    <label for="sppname" class="col-sm-2 col-form-label">SPP Name</label>                          
                                                                    <input type="text" class="form-control" id="sppname" name="sppname" value =" <?php echo prog_name($link,$sppname) ; ?>" style="max-width:30%;" disabled ="True">

                                                                    <label for="nat_id" class="col-sm-2 col-form-label">National ID</label>
                                                                    <input type="text" class="form-control" id="nat_id" name="nat_id" value =" <?php echo $nat_id ; ?>" style="max-width:30%;" disabled ="True">                                           
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card border border-success">
                                                            <div class="col-lg-9">

                                                                <div class="card-header bg-transparent border-primary">
                                                                    <?php
                                                                        $result = mysqli_query($link, "SELECT SUM(amount) AS value_total FROM tblslg_member_savings where hh_code ='$id'"); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $total_savings = $row['value_total'];
                                                                    ?>
                                                                    <h5 class="my-0 text-default">Household Savings Summary: MK<?php echo number_format($total_savings,2); ?> </h5>
                                                                    
                                                                </div>
                                                                <div class="card-body">
                                                                <h5 class="card-title mt-0"></h5>
                                                                
                                                                    <div class="table-responsive">
                                                                                        
                                                                        <table class="table table-striped mb-0">
                                                                        
                                                                            <thead>
                                                                                <tr>   
                                                                                    <th>Savings ID</th>                                              
                                                                                    <th>Year</th>                                                                                               
                                                                                    <th>Month</th>
                                                                                    <th>Amount Saved</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>


                                                                            <tbody>
                                                                                <?Php
                                                                                        $id = $_GET['id'];
                                                                                    $query="select * from tblslg_member_savings where hh_code ='$id';";

                                                                                    //Variable $link is declared inside config.php file & used here
                                                                                    
                                                                                    if ($result_set = $link->query($query)) {
                                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                                    {                                                
                                                                                        $amount = number_format($row["amount"],"2");
                                        
                                                                                        $month = month_name($row["month"]);
                                                                                        
                                                                                
                                                                                    echo "<tr>\n";                                           
                                                                                        echo "<td>".$row["savingID"]."</td>\n";
                                                                                        echo "<td>".$row["year"]."</td>\n";
                                                                                        echo "\t\t<td>$month</td>\n";
                                                                                        echo "\t\t<td>$amount</td>\n";
                                                                                        
                                                                                        echo "<td>
                                                                                            <a href=\".php?id=".$row['savingID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                                                            <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['savingID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <p>
                                                    <div class="card border border-primary">
                                                        <div class="card-header bg-transparent border-primary">
                                                            <?php
                                                                $result = mysqli_query($link, "SELECT SUM(amount) AS value_total FROM tblslg_member_iga where hh_code ='$id'"); 
                                                                $row = mysqli_fetch_assoc($result); 
                                                                $total_investment = $row['value_total'];
                                                            ?>
                                                            <h6 class="my-0 text-default">Household Investments Summary: MK<?php echo number_format($total_investment,2); ?> </h6>
                                                        </div>
                                                        <div class="card-body">
                                                        <h5 class="card-title mt-0"></h5>
                                                        
                                                            <div class="table-responsive">
                                                                                
                                                                <table class="table table-striped mb-0">
                                                                
                                                                    <thead>
                                                                        <tr>   
                                                                            <th>IGA ID</th>                                              
                                                                            <th>IGA Type</th>
                                                                                                                    
                                                                            <th>Amount Invested</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>


                                                                    <tbody>
                                                                        <?Php
                                                                                $id = $_GET['id'];
                                                                            $query="select * from tblmember_iga where sppCode ='$id';";

                                                                            //Variable $link is declared inside config.php file & used here
                                                                            
                                                                            if ($result_set = $link->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            {                                                
                                                                                $amount = number_format($row["amount_invested"],"2");
                                
                                                                                $ig_name = iga_name($link,$row["type"]);
                                                                                
                                                                        
                                                                            echo "<tr>\n";                                           
                                                                                echo "<td>".$row["recID"]."</td>\n";
                                                                                echo "\t\t<td>$ig_name</td>\n";
                                                                                
                                                                                
                                                                                echo "\t\t<td>$amount</td>\n";
                                                                                
                                                                                echo "<td>
                                                                                    <a href=\"basicSLGMemberIGAEdit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
                                                                                </td>\n";
                                                                            echo "</tr>\n";
                                                                            }
                                                                            $result_set->close();
                                                                            }                          
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                                
                                                            </div>
                                                        </div>     
                                                    </div>
                                                </p> 
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-mycs" role="tabpanel" aria-labelledby="v-pills-mycs-tab">
                                                <p>
                                                    <div class="card border border-primary">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> Member YCS Involvement</h5>

                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        
                                                                        <th>HH Code</th>   
                                                                        <th>Name</th>
                                                                        <th>Gender</th>
                                                                        <th>Voc Type</th>
                                                                        <th>Age</th>
                                                                        <th>Voc School Linkd</th>                                        
                                                                        <th>Action</th>

                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblycs where hh_code ='$id';";

                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            $group = grp_name($link, $id);
                                                                            
                                                                            $district_name = dis_name($link,$row["districtID"]);
                                                                            $ig_name = iga_name($link,$row["voc_type"]);
                                                                    
                                                                            $dateOfBirth = $row["dob"];
                                                                            $today = date("Y-m-d");
                                                                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                                                            $age = $diff->format('%y');

                                                                        echo "<tr>\n";                                           
                                                                            echo "<td>".$row["hh_code"]."</td>\n";
                                                                            echo "<td>".$row["beneficiary"]."</td>\n";
                                                                            echo "<td>".$row["gender"]."</td>\n";
                                                                            echo "\t\t<td>$ig_name</td>\n";
                                                                            echo "<td>\t\t$age</td>\n";
                                                                            echo "<td>".$row["vocSchoolLinked"]."</td>\n";
                                                                            echo "<td>
                                                                                <a href=\"?id=".$row['hh_code']."\"><i class='far fa-edit' style='font-size:18px;color:purple'></i></a>
                                                                                <a href=\"?id=".$row['hh_code']."\"><i class='fa fa-users' title='Add Beneficiary to JSG' style='font-size:18px;color:brown'></i></a>  
                                                                                
                                                                            </td>\n";
                                                                        echo "</tr>\n";
                                                                        }
                                                                        $result_set->close();
                                                                        }                          
                                                                    ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-mjsg" role="tabpanel" aria-labelledby="v-pills-mjsg-tab">
                                                <p>
                                                    <div class="card border border-primary">
                                                        <div class="card-body">
                                                            <h5 class="card-title mt-0"> Member Joint Skill Group Involvement</h5>
                                                              
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        
                                                                        <th>JSG ID</th>   
                                                                        <th>Skills Trained</th>
                                                                        <th>Service Linked</th>
                                                                        <th>Finance Linked</th>
                                                                        <th>Initial Invest</th>
                                                                        <th>Current Investment</th>                                        
                                                                        <th>Action</th>

                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tbljsg_hhs where sppCode ='$id';";

                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            $group = grp_name($link, $id);
                                                                            
                                                                            $district_name = dis_name($link,$row["districtID"]);
                                                                            $ig_name = iga_name($link,$row["voc_type"]);
                                                                    

                                                                        echo "<tr>\n";                                           
                                                                            echo "<td>".$row["jsgID"]."</td>\n";
                                                                            echo "<td>".$row["jsg_skill_trained"]."</td>\n";
                                                                            echo "<td>".$row["service_linked"]."</td>\n";
                                                                            echo "<td>".$row["finance_linked"]."</td>\n";
                                                                            echo "<td>".$row["initial_invest"]."</td>\n";
                                                                            echo "<td>".$row["current_invest"]."</td>\n";
                                                                            echo "<td>
                                                                                <a href=\"?id=".$row['jsgID']."\"><i class='far fa-edit' style='font-size:18px;color:purple'></i></a>
                                                                                <a href=\"?id=".$row['jsgID']."\"><i class='fa fa-users' title='Add Beneficiary to JSG' style='font-size:18px;color:brown'></i></a>  
                                                                                
                                                                            </td>\n";
                                                                        echo "</tr>\n";
                                                                        }
                                                                        $result_set->close();
                                                                        }                          
                                                                    ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </p>
                                            </div>


                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                <p>
                                                    <div class="card border border-primary">
                                                        <div class="card-body">
                                                        <h5 class="card-title mt-0"> Graduation Tracking: Food Security</h5>
                                                        
                                                            <div class="table-responsive">
                                                                                
                                                                <table class="table table-striped mb-0">
                                                                
                                                                    <thead>
                                                                        <tr>   
                                                                            <th>Entry Date</th>                                              
                                                                            <th>Household Code</th>                                                                                               
                                                                            <th>Score:Food Secure (Months)</th>
                                                                            <th>Score:Meals/Day</th>
                                                                            <th>Score:Acces To Farmland</th>
                                                                            <th>Total Score:Food Security</th>
                                                                        </tr>
                                                                    </thead>


                                                                    <tbody>
                                                                        <?Php
                                                                            $id = $_GET['id'];
                                                                            $query="select * from tblbeneficiaries_graduating_fs where sppCode ='$id';";
                                                                            
                                                                            if ($result_set = $link->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            {                                                
                                                                                $fs = $row["Months_HH_FS"]+$row["Meals_Per_Day"]+$row["access_to_farming_land"];
                                                                                //$er = $row["savings_level"]+$row["highest_loan_accessed"]+$row["loan_repayment"]+$row["credit_worthiness"]+$row["income_sorce"]+$row["access_to_formal_financial_services"]+$row["value_productive_assets"]+$row["value_consuption_assets"]+$row["linked_to_service_provider"];
                                                                                //$nh = $row["diet_diversification"]+$row["vegitable_garden"]+$row["small_livestock"]+$row["pit_latrine"]+$row["safe_drinking_water"]+$row["Other_hygiene_behaviour"]+$row["medical_health_care"]+$row["Perceived_malnutrition"];
                                                                                //$se = $row["Participating_in_community_forums"]+$row["Children_of_school_going_age_attending_school"]+$row["Decision_making_involves_head_spouse"]+$row["Shared_ownership_and_access_to_resources"]+$row["State_of_dwelling_structure"]+$row["Improved_general_HH_wellness_and_happiness"];
                                                                        
                                                                            echo "<tr>\n";                                           
                                                                                echo "<td>".$row["entry_date"]."</td>\n";
                                                                                echo "<td>".$row["sppCode"]."</td>\n";
                                                                                echo "<td>".$row["Months_HH_FS"]."</td>\n";
                                                                                echo "<td>".$row["Meals_Per_Day"]."</td>\n";
                                                                                echo "<td>".$row["access_to_farming_land"]."</td>\n";
                                                                                echo "<td>\t\t$fs</td>\n";
                                                                            echo "</tr>\n";
                                                                            }
                                                                            $result_set->close();
                                                                            }                          
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>    
                                                        </div>
                                                    </div>  
                                                
                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-gradmember" role="tabpanel" aria-labelledby="v-pills-gradmember-tab">
                                                    <p>

                                                        <div class="card border border-primary">
                                                            <div class="card-body">
                                                            <h5 class="card-title mt-0"> Graduation Tracking: Economic Resillience</h5>
                                                            
                                                                <div class="table-responsive">
                                                                                    
                                                                    <table class="table table-striped mb-0">
                                                                    
                                                                        <thead>
                                                                            <tr>   
                                                                                <th>Entry Date</th>                                              
                                                                                <th>Household Code</th>                                                                                               
                                                                                <th>Saving-Level</th>
                                                                                <th>Highest Loan</th>
                                                                                <th>Repayment</th>
                                                                                <th>Credit Worth</th>                                              
                                                                                <th>Income Source</th>                                                                                               
                                                                                <th>Access FS</th>
                                                                                <th>productive assets</th>
                                                                                <th>consuption assets</th>
                                                                                <th>linked SP</th>
                                                                                <th>Total Score:ER</th>
                                                                            </tr>
                                                                        </thead>


                                                                        <tbody>
                                                                            <?Php
                                                                                $id = $_GET['id'];
                                                                                $query="select * from tblbeneficiaries_graduating_er where sppCode ='$id';";
                                                                                
                                                                                if ($result_set = $link->query($query)) {
                                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                                {                                                
                                                                                    
                                                                                    $er = $row["savings_level"]+$row["highest_loan_accessed"]+$row["loan_repayment"]+$row["credit_worthiness"]+$row["income_sorce"]+$row["access_to_formal_financial_services"]+$row["value_productive_assets"]+$row["value_consuption_assets"]+$row["linked_to_service_provider"];
                                                                                    //$nh = $row["diet_diversification"]+$row["vegitable_garden"]+$row["small_livestock"]+$row["pit_latrine"]+$row["safe_drinking_water"]+$row["Other_hygiene_behaviour"]+$row["medical_health_care"]+$row["Perceived_malnutrition"];
                                                                                    //$se = $row["Participating_in_community_forums"]+$row["Children_of_school_going_age_attending_school"]+$row["Decision_making_involves_head_spouse"]+$row["Shared_ownership_and_access_to_resources"]+$row["State_of_dwelling_structure"]+$row["Improved_general_HH_wellness_and_happiness"];
                                                                            
                                                                                echo "<tr>\n";                                           
                                                                                    echo "<td>".$row["entry_date"]."</td>\n";
                                                                                    echo "<td>".$row["sppCode"]."</td>\n";
                                                                                    echo "<td>".$row["savings_level"]."</td>\n";
                                                                                    echo "<td>".$row["highest_loan_accessed"]."</td>\n";
                                                                                    echo "<td>".$row["loan_repayment"]."</td>\n";
                                                                                    echo "<td>".$row["credit_worthiness"]."</td>\n";
                                                                                    echo "<td>".$row["income_sorce"]."</td>\n";
                                                                                    echo "<td>".$row["access_to_formal_financial_services"]."</td>\n";
                                                                                    echo "<td>".$row["value_productive_assets"]."</td>\n";
                                                                                    echo "<td>".$row["value_consuption_assets"]."</td>\n";
                                                                                    echo "<td>".$row["linked_to_service_provider"]."</td>\n";
                                                                                    echo "<td>\t\t$er</td>\n";
                                                                                echo "</tr>\n";
                                                                                }
                                                                                $result_set->close();
                                                                                }                          
                                                                            ?>
                                                                        </tbo>
                                                                    </table>
                                                                    </p>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                    </p>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-gradmemberNHS" role="tabpanel" aria-labelledby="v-pills-gradmemberNHS-tab">
                                                    <p>

                                                        <div class="card border border-primary">
                                                            <div class="card-body">
                                                            <h5 class="card-title mt-0">Graduation Tracking: Nutrition Health and Sanitation</h5>
                                                            
                                                                <div class="table-responsive">
                                                                                    
                                                                    <table class="table table-striped mb-0">
                                                                    
                                                                        <thead>
                                                                            <tr>   
                                                                                <th>Entry Date</th>                                              
                                                                                <th>Household Code</th>                                                                                               
                                                                                <th>diet diversification</th>
                                                                                <th>vegitable garden</th>
                                                                                <th>small livestock</th>
                                                                                <th>pit latrine</th>                                              
                                                                                <th>safe drinking water</th>                                                                                               
                                                                                <th>Other hygiene behaviour</th>                                 
                                                                                <th>Total Score:NHS</th>
                                                                            </tr>
                                                                        </thead>


                                                                        <tbody>
                                                                            <?Php
                                                                                $id = $_GET['id'];
                                                                                $query="select * from tblbeneficiaries_graduating_nh where sppCode ='$id';";
                                                                                
                                                                                if ($result_set = $link->query($query)) {
                                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                                {                                                
                                                                                    $nh = $row["diet_diversification"]+$row["vegitable_garden"]+$row["small_livestock"]+$row["pit_latrine"]+$row["safe_drinking_water"]+$row["Other_hygiene_behaviour"]+$row["medical_health_care"]+$row["Perceived_malnutrition"];
                                                                                    //$se = $row["Participating_in_community_forums"]+$row["Children_of_school_going_age_attending_school"]+$row["Decision_making_involves_head_spouse"]+$row["Shared_ownership_and_access_to_resources"]+$row["State_of_dwelling_structure"]+$row["Improved_general_HH_wellness_and_happiness"];
                                                                            
                                                                                echo "<tr>\n";                                           
                                                                                    echo "<td>".$row["entry_date"]."</td>\n";
                                                                                    echo "<td>".$row["sppCode"]."</td>\n";
                                                                                    echo "<td>".$row["diet_diversification"]."</td>\n";
                                                                                    echo "<td>".$row["vegitable_garden"]."</td>\n";
                                                                                    echo "<td>".$row["small_livestock"]."</td>\n";
                                                                                    echo "<td>".$row["pit_latrine"]."</td>\n";
                                                                                    echo "<td>".$row["safe_drinking_water"]."</td>\n";
                                                                                    echo "<td>".$row["Other_hygiene_behaviour"]."</td>\n";
                                                                                
                                                                                    echo "<td>\t\t$nh</td>\n";
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
                                                    </p>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-gradmemberSE" role="tabpanel" aria-labelledby="v-pills-gradmemberSE-tab">
                                                    <p>

                                                        <div class="card border border-primary">
                                                            <div class="card-body">
                                                            <h5 class="card-title mt-0">Graduation Tracking: Social Empowerment</h5>
                                                            
                                                                <div class="table-responsive">
                                                                                    
                                                                    <table class="table table-striped mb-0">
                                                                    
                                                                        <thead>
                                                                            <tr>   
                                                                                <th>Entry Date</th>                                              
                                                                                <th>Household Code</th>                                                                                               
                                                                                <th>Participating community forums</th>
                                                                                <th>Children school going age attending school</th>
                                                                                <th>Decision making involves head and spouse</th>
                                                                                <th>Shared ownership and access to resources</th>                                              
                                                                                <th>State dwelling structure</th>                                                                                               
                                                                                <th>Improved general wellness and happiness</th>                                 
                                                                                <th>Total Score:SE</th>
                                                                            </tr>
                                                                        </thead>


                                                                        <tbody>
                                                                            <?Php
                                                                                $id = $_GET['id'];
                                                                                $query="select * from tblbeneficiaries_graduating_se where sppCode ='$id';";
                                                                                
                                                                                if ($result_set = $link->query($query)) {
                                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                                {                                                
                                                                                    
                                                                                    $se = $row["Participating_in_community_forums"]+$row["Children_of_school_going_age_attending_school"]+$row["Decision_making_involves_head_spouse"]+$row["Shared_ownership_and_access_to_resources"]+$row["State_of_dwelling_structure"]+$row["Improved_general_HH_wellness_and_happiness"];
                                                                            
                                                                                echo "<tr>\n";                                           
                                                                                    echo "<td>".$row["entry_date"]."</td>\n";
                                                                                    echo "<td>".$row["sppCode"]."</td>\n";
                                                                                    echo "<td>".$row["Participating_in_community_forums"]."</td>\n";
                                                                                    echo "<td>".$row["Children_of_school_going_age_attending_school"]."</td>\n";
                                                                                    echo "<td>".$row["Decision_making_involves_head_spouse"]."</td>\n";
                                                                                    echo "<td>".$row["Shared_ownership_and_access_to_resources"]."</td>\n";
                                                                                    echo "<td>".$row["State_of_dwelling_structure"]."</td>\n";
                                                                                    echo "<td>".$row["Improved_general_HH_wellness_and_happiness"]."</td>\n";
                                                                                
                                                                                    echo "<td>\t\t$se</td>\n";
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

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>

                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>