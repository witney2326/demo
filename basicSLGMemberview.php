<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG | View Member</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<div id="layout-wrapper">


    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblbeneficiaries where sppCode='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $hhname= $id;
                $sppname= $row["spProg"];
                $regionID = $row["regionID"];
                $districtID= $row["districtID"];
               
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
                                    <h5 class="my-0 text-success"> SLG Member - <?php echo $hhname ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
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

                        <div class="row mb-1">
                            <div class="col-lg-9">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <?php
                                            $result = mysqli_query($link, "SELECT SUM(amount) AS value_total FROM tblslg_member_savings where hh_code ='$id'"); 
                                            $row = mysqli_fetch_assoc($result); 
                                            $total_savings = $row['value_total'];
                                        ?>
                                        <h6 class="my-0 text-default">Household Savings Summary: MK<?php echo number_format($total_savings,2); ?> </h6>
                                        
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

                        <div class="row mb-1">
                            <div class="col-lg-9">
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
                                                        $query="select * from tblslg_member_iga where hh_code ='$id';";

                                                        //Variable $link is declared inside config.php file & used here
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        {                                                
                                                            $amount = number_format($row["amount"],"2");
            
                                                            $ig_name = iga_name($link,$row["igaID"]);
                                                            
                                                    
                                                        echo "<tr>\n";                                           
                                                            echo "<td>".$row["igaID"]."</td>\n";
                                                            echo "\t\t<td>$ig_name</td>\n";
                                                            
                                                            
                                                            echo "\t\t<td>$amount</td>\n";
                                                            
                                                            echo "<td>
                                                                <a href=\".php?id=".$row['igaID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                                <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\".php?id=".$row['igaID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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
        </div>
    </div>
</div>