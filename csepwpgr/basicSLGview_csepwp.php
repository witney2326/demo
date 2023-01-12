<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>View SLG</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
  <!--jQuery library file -->
  <script type="text/javascript" 
      src="https://code.jquery.com/jquery-3.5.1.js">
  </script>

  <!--Datatable plugin JS library file -->
  <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
</head>

<?php include '../layouts/body.php'; ?>
<?php
        include '../layouts/config2.php'; // Using database connection file here
        include 'lib2.php';

        $id = $_GET['id']; // get id through query string
       $query="select * from tblgroup where groupID='$id'";
        
        if ($result_set = $link_cs->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["groupname"];
                $DateEstablished= $row["DateEstablished"];
                $regionID = $row["regionID"];
                $DistrictID= $row["DistrictID"];
                $TAID= $row["TAID"];
                $gvhID= $row["gvhID"];
                $MembersM= $row["MembersM"];
                $MembersF = $row["MembersF"];
                $clusterID = $row["clusterID"];
            }
            $result_set->close();
        }      
    ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include '../layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP View Savings and Loan Group</h4>
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
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Group Details</a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Savings</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">IGA/Investments</a>
                                            <a class="nav-link mb-2" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Membership</a>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <p>
                                                    <div class="row"> 
                                                        <div class="card border border-success">
                                                            <div class="col-lg-9">
                                                                <div class="row mb-1">
                                                                    <label for="group_id" class="col-sm-2 col-form-label">Group ID</label>                   
                                                                    <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="group_name" class="col-sm-2 col-form-label">Group Name</label>
                                                                    <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>
                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="date_formed" class="col-sm-2 col-form-label">Date Formed</label>
                                                                    <input type="text" class="form-control" id="date_formed" name="date_formed" value ="<?php echo $DateEstablished ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="region" class="col-sm-2 col-form-label">Region</label>
                                                                    <input type="text" class="form-control" id="region" name="region" value ="<?php echo r_name($link_cs,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>

                                                                        
                                                                <div class="row mb-1">
                                                                    <label for="district" class="col-sm-2 col-form-label">District</label>                                           
                                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link_cs,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="ta" class="col-sm-2 col-form-label">TA</label>
                                                                    <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo ta_name($link_cs,$TAID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>

                                                                
                                                                <div class="row mb-1">
                                                                    <label for="gvh" class="col-sm-2 col-form-label">GVH</label>                   
                                                                    <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" disabled ="True" style="max-width:30%;" >                                       

                                                                          
                                                                </div>

                                                                <div class="row mb-1">
                                                                    <label for="no_males" class="col-sm-2 col-form-label">No. Males</label>                         
                                                                    <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $MembersM ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    <label for="no_females" class="col-sm-2 col-form-label">No. Females</label>
                                                                    <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $MembersF ; ?>" style="max-width:30%;" disabled ="True">
                                                                </div>

                                                                
                                                                <div class="row mb-1">
                                                                    <label for="cluster" class="col-sm-2 col-form-label">Cluster Name</label>                        
                                                                    <input type="text" class="form-control" id="cluster" name="cluster" value ="<?php echo cls_name($link_cs,$clusterID) ; ?>" style="max-width:30%;" disabled ="True">
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <p>
                                                    <div class="card border border-success">
                                                        <div class="row mb-1">
                                                        
                                                                <div class="card-header bg-transparent border-primary">
                                                                    <?php
                                                                        $result = mysqli_query($link_cs, "SELECT SUM(Amount) AS value_total FROM tblgroupsavings where groupID ='$id'"); 
                                                                        $row = mysqli_fetch_assoc($result); 
                                                                        $total_savings = $row['value_total'];

                                                                        $result2 = mysqli_query($link_cs, "SELECT COUNT(savingID) AS total_ts FROM tblslg_member_savings where groupID ='$id'"); 
                                                                        $row = mysqli_fetch_assoc($result2); 
                                                                        $total_transactions = $row['total_ts'];

                                                                    ?>
                                                                    <h6 class="my-0 text-primary">Savings Details:</h6>
                                                                    <h7 class="my-0 text-secondary">Cumulated transactions: <?php echo number_format($total_transactions); echo" "; echo ";"; ?> </h7>
                                                                    <h7 class="my-0 text-secondary">Cumulated savings: MK<?php echo number_format($total_savings,2); ?> </h7>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <p>
                                                    <div class="row mb-1">
                                                        <div class="card border border-primary">
                                                            <div class="card-header bg-transparent border-primary">
                                                                <h6 class="my-0 text-primary">IGA Summary: </h6>
                                                            </div>
                                                            <div class="card-body">
                                                            <h5 class="card-title mt-0"></h5>
                                                            
                                                                <div class="table-responsive">
                                                                                    
                                                                    <table class="table table-striped mb-0">
                                                                    
                                                                        <thead>
                                                                            <tr>   
                                                                                <th>IGA ID</th>                                              
                                                                                <th>IGA Type</th>
                                                                                <th>Households</th>                                          
                                                                                <th>Amount Invested</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>


                                                                        <tbody>
                                                                            <?Php
                                                                                    $id = $_GET['id'];
                                                                                $query="select * from tblgroup_iga where groupID ='$id';";

                                                                                //Variable $link is declared inside config.php file & used here
                                                                                
                                                                                if ($result_set = $link_cs->query($query)) {
                                                                                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                                {                                                
                                                                                    $amount = number_format($row["amount_invested"],"2");
                                    
                                                                                    $ig_name = iga_name($link_cs,$row["type"]);
                                                                                    $households = $row["no_male"]+$row["no_female"];
                                                                            
                                                                                echo "<tr>\n";                                           
                                                                                    echo "<td>".$row["recID"]."</td>\n";
                                                                                    echo "\t\t<td>$ig_name</td>\n";
                                                                                    echo "<td>\t\t$households</td>\n";
                                                                                    
                                                                                    echo "\t\t<td>$amount</td>\n";
                                                                                    
                                                                                    echo "<td>
                                                                                        <a href=\".php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                                                        <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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
                                                </p>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                <p>
                                                    <div class="row">
                                                        <div class="card border border-primary">
                                                            <div class="card-header bg-transparent border-primary">
                                                                <?php
                                                                    $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_total FROM tblbeneficiaries where groupID ='$id'"); 
                                                                    $row = mysqli_fetch_assoc($result); 
                                                                    $total = $row['value_total'];
                                                                ?>
                                                                <h5 class="my-0 text-primary">Households In SLG: <?php echo $groupname; ?> </h5>
                                                                <h7 class="my-0 text-secondary">Captured Households: <?php echo $total; ?> </h7>
                                                            </div>
                                                            <div class="card-body">              
                                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" style ="font-size: 10px;">
                                                                
                                                                    <thead>
                                                                        <tr>   
                                                                            <th>HH-Code</th>                                              
                                                                            <th>SP-Prog</th>
                                                                            <th>Cohort</th>
                                                                            <th>HH-Status</th>
                                                                            <th>JSG-Mapped?</th>
                                                                            <th>YCS-Mapped?</th>
                                                                            <th>Graduation?</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>


                                                                    <tbody>
                                                                        <?Php
                                                                                $id = $_GET['id'];
                                                                            $query="select * from tblbeneficiaries where groupID ='$id';";

                                                                            //Variable $link is declared inside config.php file & used here
                                                                            
                                                                            if ($result_set = $link_cs->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            {                                                
                                                                                if ($row["hhstatus"] == 1){$hh_status = "Yes";}else{$hh_status = "N/A";}
                                                                                if ($row["jsg_mapped"] == 1){$jsg_status = "Yes";}else{$jsg_status = "N/A";}
                                                                                if ($row["ycs_mapped"] == 1){$ycs_status = "Yes";}else{$ycs_status = "N/A";}
                                                                                if ($row["grad_status"] == 1){$graduation_status = "Yes";}else{$graduation_status = "N/A";}

                                                                                if ($row["spProg"]==1){$spProg = "SCT";}if ($row["spProg"]==2){$spProg = "EPWP";}if ($row["spProg"]==3){$spProg = "PWP";}if ($row["spProg"]==4){$spProg = "CSPWP";}if ($row["spProg"]== 5){$spProg = "Masaf 4";}

                                                                            echo "<tr>\n";                                           
                                                                                echo "<td>".$row["sppCode"]."</td>\n";
                                                                                echo "<td>\t\t$spProg</td>\n";
                                                                                echo "<td>".$row["cohort"]."</td>\n";                                               
                                                                                echo "\t\t<td>$hh_status</td>\n";
                                                                                echo "\t\t<td>$jsg_status</td>\n";
                                                                                echo "\t\t<td>$ycs_status</td>\n";
                                                                                echo "\t\t<td>$graduation_status</td>\n";
                                                                                
                                                                                echo "<td>                                            
                                                                                    <a href=\"basicSLGMemberview_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px;color:purple'></i></a>   
                                                                                    <a href=\"basicSLGMemberedit_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px;color:green'></i></a> 
                                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['sppCode']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
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

                                            <div class="tab-pane fade" id="v-pills-settings2" role="tabpanel" aria-labelledby="v-pills-settings2-tab">
                                                <p>
                                                    <div class="row">
                                                        <div class="card border border-primary">
                                                                
                                                             
                                                             <div class="card-header bg-transparent border-primary">
                                                                <?php
                                                                    $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_total FROM tblbeneficiaries where ((groupID ='$id') and (ycs_mapped ='1')) "); 
                                                                    $row = mysqli_fetch_assoc($result); 
                                                                    $total = $row['value_total'];
                                                                ?>
                                                                <h5 class="my-0 text-primary">Youths in YCS Intervention in Group: <?php echo $groupname; ?> </h5>
                                                                <h7 class="my-0 text-secondary">Captured Households: <?php echo $total; ?> </h7>
                                                            </div>
                                                            <div class="card-body">              
                                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                                    <thead>
                                                                        <tr>   
                                                                            <th>HH-Code</th>                                              
                                                                            <th>SP-Prog</th>
                                                                            <th>Cohort</th>
                                                                            <th>HH-Status</th>
                                                                            
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>


                                                                    <tbody>
                                                                        <?Php
                                                                                $id = $_GET['id'];
                                                                            $query="select * from tblbeneficiaries where ((groupID ='$id') and (ycs_mapped ='1'));";

                                                                            //Variable $link is declared inside config.php file & used here
                                                                            
                                                                            if ($result_set = $link_cs->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            {                                                
                                                                                if ($row["hhstatus"] == 1){$hh_status = "Yes";}else{$hh_status = "N/A";}
                                                                                if ($row["jsg_mapped"] == 1){$jsg_status = "Yes";}else{$jsg_status = "N/A";}
                                                                                if ($row["ycs_mapped"] == 1){$ycs_status = "Yes";}else{$ycs_status = "N/A";}
                                                                                if ($row["grad_status"] == 1){$graduation_status = "Yes";}else{$graduation_status = "N/A";}

                                                                                if ($row["spProg"]==1){$spProg = "SCT";}if ($row["spProg"]==2){$spProg = "EPWP";}if ($row["spProg"]==3){$spProg = "PWP";}if ($row["spProg"]==4){$spProg = "CSPWP";}if ($row["spProg"]== 5){$spProg = "Masaf 4";}

                                                                            echo "<tr>\n";                                           
                                                                                echo "<td>".$row["sppCode"]."</td>\n";
                                                                                echo "<td>\t\t$spProg</td>\n";
                                                                                echo "<td>".$row["cohort"]."</td>\n";                                               
                                                                                echo "\t\t<td>$hh_status</td>\n";
                                                                                
                                                                                
                                                                                echo "<td>                                            
                                                                                    <a href=\"basicSLGMemberview_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px;color:purple'></i></a>   
                                                                                    <a href=\"basicSLGMemberedit_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px;color:green'></i></a> 
                                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"basicSLGMemberdelete_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
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

                                            <div class="tab-pane fade" id="v-pills-settings3" role="tabpanel" aria-labelledby="v-pills-settings3-tab">
                                                <p>
                                                    <div class="row">
                                                        <div class="card border border-primary">
                                                                
                                                             
                                                             <div class="card-header bg-transparent border-primary">
                                                                <?php
                                                                    $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_total FROM tblbeneficiaries where ((groupID ='$id') and (jsg_mapped ='1')) "); 
                                                                    $row = mysqli_fetch_assoc($result); 
                                                                    $total = $row['value_total'];
                                                                ?>
                                                                <h5 class="my-0 text-primary">Households in JSG Intervention in Group: <?php echo $groupname; ?> </h5>
                                                                <h7 class="my-0 text-secondary">Captured Households: <?php echo $total; ?> </h7>
                                                            </div>
                                                            <div class="card-body">              
                                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                                    <thead>
                                                                        <tr>   
                                                                            <th>HH-Code</th>                                              
                                                                            <th>SP-Prog</th>
                                                                            <th>Cohort</th>
                                                                            <th>HH-Status</th>
                                                                            
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>


                                                                    <tbody>
                                                                        <?Php
                                                                                $id = $_GET['id'];
                                                                            $query="select * from tblbeneficiaries where ((groupID ='$id') and (jsg_mapped ='1'));";

                                                                            //Variable $link is declared inside config.php file & used here
                                                                            
                                                                            if ($result_set = $link_cs->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            {                                                
                                                                                if ($row["hhstatus"] == 1){$hh_status = "Yes";}else{$hh_status = "N/A";}
                                                                                if ($row["jsg_mapped"] == 1){$jsg_status = "Yes";}else{$jsg_status = "N/A";}
                                                                                if ($row["ycs_mapped"] == 1){$ycs_status = "Yes";}else{$ycs_status = "N/A";}
                                                                                if ($row["grad_status"] == 1){$graduation_status = "Yes";}else{$graduation_status = "N/A";}

                                                                                if ($row["spProg"]==1){$spProg = "SCT";}if ($row["spProg"]==2){$spProg = "EPWP";}if ($row["spProg"]==3){$spProg = "PWP";}if ($row["spProg"]==4){$spProg = "CSPWP";}if ($row["spProg"]== 5){$spProg = "Masaf 4";}

                                                                            echo "<tr>\n";                                           
                                                                                echo "<td>".$row["sppCode"]."</td>\n";
                                                                                echo "<td>\t\t$spProg</td>\n";
                                                                                echo "<td>".$row["cohort"]."</td>\n";                                               
                                                                                echo "\t\t<td>$hh_status</td>\n";
                                                                                
                                                                                
                                                                                echo "<td>                                            
                                                                                    <a href=\"basicSLGMemberview_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px;color:purple'></i></a>   
                                                                                    <a href=\"basicSLGMemberedit_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px;color:green'></i></a> 
                                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['sppCode']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
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

                                            <div class="tab-pane fade" id="v-pills-settings4" role="tabpanel" aria-labelledby="v-pills-settings4-tab">
                                                <p>
                                                    <div class="row">
                                                        <div class="card border border-primary">
                                                                
                                                                        
                                                             <div class="card-header bg-transparent border-primary">
                                                                <?php
                                                                    $result = mysqli_query($link_cs, "SELECT COUNT(sppCode) AS value_total FROM tblbeneficiaries where ((groupID ='$id') and (grad_status ='1')) "); 
                                                                    $row = mysqli_fetch_assoc($result); 
                                                                    $total = $row['value_total'];
                                                                ?>
                                                                <h5 class="my-0 text-primary">Households Mapped For Graduation in Group: <?php echo $groupname; ?> </h5>
                                                                <h7 class="my-0 text-secondary">Captured Households: <?php echo $total; ?> </h7>
                                                            </div>
                                                            <div class="card-body">              
                                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                                    <thead>
                                                                        <tr>   
                                                                            <th>HH-Code</th>                                              
                                                                            <th>SP-Prog</th>
                                                                            <th>Cohort</th>
                                                                            <th>HH-Status</th>
                                                                            
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>


                                                                    <tbody>
                                                                        <?Php
                                                                                $id = $_GET['id'];
                                                                            $query="select * from tblbeneficiaries where ((groupID ='$id') and (grad_status ='1'));";

                                                                            //Variable $link is declared inside config.php file & used here
                                                                            
                                                                            if ($result_set = $link_cs->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            {                                                
                                                                                if ($row["hhstatus"] == 1){$hh_status = "Yes";}else{$hh_status = "N/A";}
                                                                                if ($row["jsg_mapped"] == 1){$jsg_status = "Yes";}else{$jsg_status = "N/A";}
                                                                                if ($row["ycs_mapped"] == 1){$ycs_status = "Yes";}else{$ycs_status = "N/A";}
                                                                                if ($row["grad_status"] == 1){$graduation_status = "Yes";}else{$graduation_status = "N/A";}

                                                                                if ($row["spProg"]==1){$spProg = "SCT";}if ($row["spProg"]==2){$spProg = "EPWP";}if ($row["spProg"]==3){$spProg = "PWP";}if ($row["spProg"]==4){$spProg = "CSPWP";}if ($row["spProg"]== 5){$spProg = "Masaf 4";}

                                                                            echo "<tr>\n";                                           
                                                                                echo "<td>".$row["sppCode"]."</td>\n";
                                                                                echo "<td>\t\t$spProg</td>\n";
                                                                                echo "<td>".$row["cohort"]."</td>\n";                                               
                                                                                echo "\t\t<td>$hh_status</td>\n";
                                                                                
                                                                                
                                                                                echo "<td>                                            
                                                                                    <a href=\"basicSLGMemberview_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px;color:purple'></i></a>   
                                                                                    <a href=\"basicSLGMemberedit_csepwp.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px;color:green'></i></a> 
                                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['sppCode']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
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
        <?php include '../layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include '../layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include '../layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>