<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG |Household IGAs</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    

</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

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

        if(isset($_POST['Submit']))
            {    
            $groupID = $_POST['group_id'];
            $DistrictID = $_POST['district'];
            $year = $_POST['year'];
            $iga = $_POST['iga'];
            $month = $_POST['month'];
            $amount = $_POST['amount'];
            
            
                $sql = "INSERT INTO tblslg_member_iga (districtID,hh_code,groupID,igaID,year,month,amount)
                VALUES ('$districtID','$id','$groupID','$iga','$year','$month','$amount')";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Member IGA Record has been added successfully !");'; 
                echo 'window.location.href = "basic_livelihood_member_mgt.php";';
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
                                    <h5 class="my-0 text-success">Household Update IGA Record for -- <?php echo $hhname ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="">
                                        <div class="row mb-4">
                                            <label for="hh_id" class="col-sm-3 col-form-label">Household Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="hh_name" class="col-sm-3 col-form-label">Household Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="hh_name" name ="hh_name" value = "<?php echo $hhname ; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="region" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="region" name="region" value ="<?php echo get_rname($link,$regionID) ; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row mb-4">
                                            <label for="cohort" class="col-sm-3 col-form-label">Cohort</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="cohort" name="cohort" value ="<?php echo $cohort ; ?> " style="max-width:30%;" readonly >
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="year" class="col-sm-3 col-form-label">Select Year</label>
                                            <select class="form-select" name="year" id="year" style="max-width:20%;" required>
                                                <option></option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="month" class="col-sm-3 col-form-label">Select Month</label>
                                            <select class="form-select" name="month" id="month" style="max-width:20%;" required>
                                                <option></option>
                                                <option value='01'>January</option>
                                                <option value='02'>February</option>
                                                <option value='03'>March</option>
                                                <option value='04'>April</option>
                                                <option value='05'>May</option>
                                                <option value='06'>June</option>
                                                <option value='07'>July</option>
                                                <option value='08'>August</option>
                                                <option value='09'>September</option>
                                                <option value='10'>October</option>
                                                <option value='11'>November</option>
                                                <option value='12'>December</option>
                                            </select>  
                                        </div>

                                        <div class="row mb-4">
                                            <label for="iga" class="col-sm-3 col-form-label">Select IGA</label>
                                            <select class="form-select" name="iga" id="iga" style="max-width:20%;" required>
                                                <option></option>
                                                <?php                                                           
                                                    $dis_fetch_query = "SELECT ID,name FROM tblslg_iga";                                                  
                                                    $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                    ?>
                                                    <option value =<?php echo $DB_ROW_Dis["ID"]; ?>>
                                                        <?php echo $DB_ROW_Dis["name"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>  
                                        </div>

                                        <div class="row mb-4">
                                            <label for="amount" class="col-sm-3 col-form-label"> Amount Invested</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="amount" name="amount" value ="" style="max-width:30%;">
                                            </div>
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