<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
session_start();
<head>
    <title>SLG |Income Generating Activities</title>
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

        function bus_cat_name($link, $catID)
        {
        $cat_query = mysqli_query($link,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $cat = mysqli_fetch_array($cat_query);// fetch data
        return $cat['catname'];
        }
           
        $buscat = $_GET['buscat']; // get id through query string
       $district = $_GET["district"];
       $hhcode = $_GET["hhcode"];


       $query="select * from tblbeneficiaries where sppCode ='$hhcode'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $districtID= $row["districtID"];
                $cohort = $row["cohort"];
                $groupname = $row["groupID"];  
            }
            $result_set->close();
        }

        if(isset($_POST['Submit']))
            { 
            $groupID = $_POST["group_code"];
            $district= $_POST["district"];
            $buscat = $_POST['buscat'];
            $iga = $_POST['iga'];
            $males = $_POST["males"];
            $females = $_POST["females"];
            $amount = $_POST['amount_invested'];
                      
        
                $sql = "INSERT INTO tblgroup_iga (groupID,districtID,bus_category,type,no_male,no_female,amount_invested)
                VALUES ('$groupID','$district','$buscat','$iga','$males','$females','$amount')";
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
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary"></i>Business Type Search Filter</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mt-0"></h5>
                                <form class="row row-cols-lg-auto g-3 align-items-center">
                                    <div class="col-12">
                                        <label for="region" class="form-label">Business Category</label>
                                        <div>
                                            <select class="form-select" name="buscat" id="buscat" value ="<?php echo $buscat?>" required>
                                                <option selected value="<?php echo $buscat?>"><?php echo bus_cat_name($link,$buscat);?></option>
                                                    
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid Business Category.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="iga" class="form-label">IGA Type</label>
                                        <select class="form-select" name="iga" id="iga" value ="" required>
                                            <option></option>
                                            <?php                                                           
                                                    $iga_fetch_query = "SELECT ID,name FROM tbliga_types where categoryID = '$buscat'";                                                  
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
                                        <div class="invalid-feedback">
                                            Please select a valid Malawi IGA Type.
                                        </div>
                                    </div>

                                                                        
                                    <div class="col-12">
                                        <INPUT TYPE="button" class="btn btn-secondary w-md" style="width:170px;" VALUE="Back" onClick="history.go(-1);">
                                        
                                    </div>
                                </form>                                             
                                <!-- End Here -->
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">IGA Record for -Household- <?php echo $hhcode ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="insertSLGMember_IGA.php" method="POST">
                                       
                                        <div class="row mb-2">
                                            <label for="hhcode" class="col-sm-3 col-form-label">Household Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $hhcode; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <label for="buscat" class="col-sm-3 col-form-label">Business Category</label>
                                            <select class="form-select" name="buscat" id="buscat" value ="<?php echo $buscat;?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $buscat;?>" ><?php echo $buscat;?></option>
                                                
                                            </select>
                                        </div>
                                                                               
                                        <div class="row mb-2">
                                            <label for="iga" class="col-sm-3 col-form-label">Select IGA Type</label>
                                            <select class="form-select" name="iga" id="iga" value ="" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                    $iga_fetch_query = "SELECT ID,name FROM tbliga_types where categoryID = '$buscat'";                                                  
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
                                        
                                        <input type="hidden" class="form-control" id="groupid" name="groupid" value ="<?php echo $groupname ; ?>" style="max-width:30%;">

                                        
                                        <div class="row mb-2">
                                            <label for="amount_invested" class="col-sm-3 col-form-label">Amount Invested</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="amount_invested" name="amount_invested" value ="" style="max-width:30%;">
                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" style="width:170px;" name="Submit" value="Submit">Save New HH IGA </button>
                                                    <INPUT TYPE="button" class="btn btn-secondary w-md" style="width:170px;" VALUE="Back" onClick="history.go(-1);">
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
                            <h5 class="my-0 text-primary">IGA Record</h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                            
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>IGA ID</th>   
                                            <th>HH Code</th>
                                            <th>SLG</th>
                                            <th>District</th>
                                            <th>IGA Type</th>
                                            <th>Amount Invested</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            $hhcode = $_GET['hhcode'];
                                            $query="select * from tblmember_iga where sppCode ='$hhcode';";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                $group = grp_name($link, $row["groupID"]);
                                                $amount = number_format($row["amount_invested"],"2");

                                               
                                                $district_name = dis_name($link,$row["districtID"]);
                                                $ig_name = iga_name($link,$row["type"]);
                                        

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["recID"]."</td>\n";
                                                echo "\t\t<td>$hhcode</td>\n";
                                                echo "\t\t<td>$group</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                
                                                echo "\t\t<td>$amount</td>\n";
                                                
                                                echo "<td>
                                                    <a href=\"?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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