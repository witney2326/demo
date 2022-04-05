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
           
       
       $groupID = $_GET["id"];
       $mapped = $_GET["mapped"];
       

       $query="select * from tblgroup where groupID='$groupID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $districtID= $row["DistrictID"];
                $cohort = $row["cohort"];
                $groupname = $row["groupname"];  
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
                                    <h6 class="my-0 text-success">New Youth Challenge Support Record for -SLG- <?php echo grp_name($link,$groupID); echo" in "; echo dis_name($link,$districtID);?></h6>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="ycs_ben_new.php" method="POST">
                                       
                                        <div class="row mb-2">
                                            <label for="group_code" class="col-sm-3 col-form-label">Group Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $groupID; ?>" style="max-width:30%;" readonly >
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <label for="district" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" readonly style="max-width:30%;">
                                            </div>
                                        </div>
                                                                                                                    
                                        <div class="row mb-2">
                                            <label for="voc" class="col-sm-3 col-form-label">Vocational Training</label>
                                            <select class="form-select" name="voc" id="voc" value ="" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                    $iga_fetch_query = "SELECT ID,name FROM tbliga_types ";                                                  
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

                                        <div class="row mb-2">
                                            <label for="ml_code" class="col-sm-3 col-form-label">Beneficiary ML-Code</label>
                                            <select class="form-select" name="ml_code" id="ml_code" value ="" style="max-width:30%;" required>
                                                <option></option>
                                                <?php                                                           
                                                    $code_fetch_query = "SELECT sppCode FROM tblbeneficiaries where groupID = '$groupID' ";                                                  
                                                    $result_code_fetch = mysqli_query($link, $code_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_code = mysqli_fetch_array($result_code_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_code["sppCode"]; ?>">
                                                        <?php echo $DB_ROW_code["sppCode"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="youth_NID" class="col-sm-3 col-form-label"> National ID NO.</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="youth_NID" name="youth_NID" value ="" style="max-width:40%;">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <label for="youth_name" class="col-sm-3 col-form-label">Beneficiary Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="youth_name" name="youth_name" value ="" style="max-width:40%;">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="gender" class="col-sm-3 col-form-label">Beneficiary Gender</label>
                                            <div class="col-sm-9">
                                                <input type="radio" id="male" name="gender" value="M">
                                                <label for="male">Male</label><br>
                                                <input type="radio" id="female" name="gender" value="F">
                                                <label for="female">Female</label><br>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="ben_dob" class="col-sm-3 col-form-label">Date Of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="ben_dob" name="ben_dob" value ="" style="max-width:30%;">
                                            </div>
                                        </div>

                                        
                                        <div class="row mb-2">
                                            <label for="females" class="col-sm-3 col-form-label">Group Mapped?</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="mapped" name="mapped" value ="<?php echo $mapped;?>" readonly style="max-width:30%;">
                                            </div>
                                        </div>


                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save New SLG YCS Record</button>
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
                            <h5 class="my-0 text-primary">YCS Beneficiary Record</h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                            
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>HH Code</th>   
                                            <th>Beneficiary Name</th>
                                            <th>District</th>
                                            <th>Vocational Type</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            
                                            $query="select * from tblycs where groupID ='$groupID';";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                $group = grp_name($link, $groupID);
   
                                                $district_name = dis_name($link,$row["districtID"]);
                                                $ig_name = iga_name($link,$row["voc_type"]);
                                        

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["hh_code"]."</td>\n";
                                                  
                                                echo "<td>".$row["beneficiary"]."</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                echo "<td>".$row["gender"]."</td>\n";
                                                
                                                
                                                
                                                echo "<td>
                                                    <a href=\"basicSLGMemberSavingsEdit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                    <a href=\"basicSLGAddMember.php?id=".$row['groupID']."\"><i class='fas fa-user-alt' title='Add Beneficiary to JSG' style='font-size:18px'></i></a>  
                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"basicSLGMemberSavingsDelete.php?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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