<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG |Household Savings</title>
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
                
                $regionID = $row["regionID"];
                $districtID= $row["districtID"];
                $cohort = $row["cohort"];
                $groupID = $row["groupID"];
            }
            $result_set->close();
        }

        if(isset($_POST['Submit']))
            {    
            $hh_ID = $_POST["hh_id"];
            $districtID = $_POST['district'];
            $year = $_POST['year'];
            $month = $_POST['month'];
            $amount = $_POST['amount'];
            $groupID = $_POST["group_code"];
            
            
                $sql = "INSERT INTO tblslg_member_savings (districtID,hh_code,groupID,year,month,amount)
                VALUES ('$districtID','$hh_ID','$groupID','$year','$month','$amount')";
            if (mysqli_query($link, $sql)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("SLG Savings Record has been added successfully !");'; 
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
                                    <h5 class="my-0 text-success">Household Update Savings Record for -- <?php echo $id ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
                                        <div class="row mb-4">
                                            <label for="hh_id" class="col-sm-3 col-form-label">Household Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="hh_id" name = "hh_id" value="<?php echo $id ; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="group_code" class="col-sm-3 col-form-label">Group Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $groupID ; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;" readonly >
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
                                            <label for="amount" class="col-sm-3 col-form-label">Amount Saved</label>
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