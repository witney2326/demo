<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | View Group</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">


    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblgroup where groupID='$id'";
        
        if ($result_set = $link->query($query)) {
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

        function r_name($link, $rcode)
        {
        $region_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($region_query);// fetch data
        return $rg['name'];
        }

        function ta_name($link, $tacode)
        {
        $region_query = mysqli_query($link,"select TAName from tblta where TAID='$tacode'"); // select query
        $ta = mysqli_fetch_array($region_query);// fetch data
        return $ta['TAName'];
        }

        function cls_name($link, $clscode)
        {
        $cls_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
        $cls = mysqli_fetch_array($cls_query);// fetch data
        return $cls['ClusterName'];
        }

        function iga_name($link, $igaID)
        {
        $iga_query = mysqli_query($link,"select name from tbliga_types where ID='$igaID'"); // select query
        $iga = mysqli_fetch_array($iga_query);// fetch data
        return $iga['name'];
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
                                    <h5 class="my-0 text-success"><i class="fa fa-binoculars" aria-hidden="true" style="font-size:28px;color:black"></i>
                                        SLG - <?php echo $groupname ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
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
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo r_name($link,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="district" class="col-sm-2 col-form-label">District</label>                                           
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                            
                                            <label for="ta" class="col-sm-2 col-form-label">TA</label>
                                            <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo ta_name($link,$TAID) ; ?>" style="max-width:30%;" disabled ="True">
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
                                            <input type="text" class="form-control" id="cluster" name="cluster" value ="<?php echo cls_name($link,$clusterID) ; ?>" style="max-width:30%;" disabled ="True">
                                            
                                            <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                            <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>

                                        <div class="row mb-1">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT SUM(amount) AS value_total FROM tblslg_member_savings where groupID ='$id'"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $total_savings = $row['value_total'];

                                                        $result2 = mysqli_query($link, "SELECT COUNT(savingID) AS total_ts FROM tblslg_member_savings where groupID ='$id'"); 
                                                        $row = mysqli_fetch_assoc($result2); 
                                                        $total_transactions = $row['total_ts'];

                                                    ?>
                                                    <h6 class="my-0 text-primary">Savings Details:</h6>
                                                    <h7 class="my-0 text-secondary">Cumulated transactions: <?php echo number_format($total_transactions); echo" "; echo ";"; ?> </h7>
                                                    <h7 class="my-0 text-secondary">Cumulated savings: MK<?php echo number_format($total_savings,2); ?> </h7>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <?php
                                                        $result = mysqli_query($link, "SELECT COUNT(sppCode) AS value_total FROM tblbeneficiaries where groupID ='$id'"); 
                                                        $row = mysqli_fetch_assoc($result); 
                                                        $total = $row['value_total'];
                                                    ?>
                                                    <h6 class="my-0 text-primary">Membership Summary:</h6>
                                                    <h7 class="my-0 text-secondary">CIMIS Captured Households/Members: <?php echo $total; ?> </h7>
                                                </div>
                                            </div>
                                        </div>

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
                                                                    
                                                                    if ($result_set = $link->query($query)) {
                                                                    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                    {                                                
                                                                        $amount = number_format($row["amount_invested"],"2");
                        
                                                                        $ig_name = iga_name($link,$row["type"]);
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
                                <?php
                                    $result = mysqli_query($link, "SELECT COUNT(sppCode) AS value_total FROM tblbeneficiaries where groupID ='$id'"); 
                                    $row = mysqli_fetch_assoc($result); 
                                    $total = $row['value_total'];
                                ?>
                                <h5 class="my-0 text-primary">Households In SLG: <?php echo $groupname; ?> </h5>
                                <h7 class="my-0 text-secondary">Captured Households: <?php echo $total; ?> </h7>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mt-0"></h5>
                                <div class="table-responsive">
                                                    
                                    <table class="table table-striped mb-0">
                                    
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
                                                
                                                if ($result_set = $link->query($query)) {
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
                                                        <a href=\"basicSLGMemberview.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px;color:purple'></i></a>   
                                                        <a href=\"basicSLGMemberedit.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px;color:green'></i></a> 
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
                </div> 



            </div>
        </div>
    </div>
</div>