<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>YCS |Add Beneficiary Youth</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // In your Javascript
        $(document).ready(function() {
            $('.js-single').select2();
        });
    </script>
</head>

<?php include '../layouts/body.php'; ?>
<?php
        
        
         include "../layouts/config.php"; // Using database connection file here
 
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
                            <h4 class="mb-sm-0 font-size-18">New YCS Record for -SLG- <?php echo grp_name($link,$groupID); echo" in "; echo dis_name($link,$districtID);?></h4>
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
                                
                                    <div class="col-lg-9">
                                        <div class="card border border-success">
                                            
                                            <div class="card-body">
                                                
                                                <form method="POST" action="ycs_ben_new.php" method="POST">
                                                
                                                    <div class="row mb-2">
                                                        <label for="group_code" class="col-sm-2 col-form-label">Group Code</label>
                                                        <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $groupID; ?>" style="max-width:30%;" readonly >
                                                        
                                                        <label for="district" class="col-sm-2 col-form-label">District</label>
                                                        <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" readonly style="max-width:30%;"> 
                                                    </div>
                                                    
                                                                                                                                                                        
                                                    <div class="row mb-2">
                                                        <label for="voc" class="col-sm-2 col-form-label">Voc Skill</label>
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

                                                        <label for="ml_code" class="col-sm-2 col-form-label">HH-Code</label>
                                                        
                                                        <select  name="ml_code" id="ml_code" class="js-single" style="max-width:30%;"required>
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
                                                        <label for="youth_NID" class="col-sm-2 col-form-label"> Nat. ID</label>
                                                        <input type="text" class="form-control" id="youth_NID" name="youth_NID" value ="" style="max-width:30%;">

                                                        <label for="youth_name" class="col-sm-2 col-form-label"> Name</label>
                                                        <input type="text" class="form-control" id="youth_name" name="youth_name" value ="" style="max-width:30%;"> 
                                                    </div>
                                                    
                                                    <div class="row mb-2">
                                                        <div class="col-sm-9">
                                                            <label for="gender" class="col-sm- col-form-label">Gender</label>
                                                        
                                                            <input type="radio" id="male" name="gender" value="M">
                                                            <label for="male">Male</label>
                                                            <input type="radio" id="female" name="gender" value="F">
                                                            <label for="female">Female</label>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <label for="ben_dob" class="col-sm-2 col-form-label">DOB</label>
                                                        <input type="date" class="form-control" id="ben_dob" name="ben_dob" value ="" style="max-width:30%;">
                                                        
                                                        <label for="females" class="col-sm-2 col-form-label">Mapped?</label>
                                                        <input type="text" class="form-control" id="mapped" name="mapped" value ="<?php echo $mapped;?>" readonly style="max-width:30%;">
                                                    </div>

                                                    <div class="row mb-2">
                                                        
                                                    </div>


                                                    <div class="row justify-content-end">
                                                        
                                                            <div>
                                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save New SLG YCS Record</button>
                                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                            </div>
                                                        
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        
                                        </div>                                   
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-9">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">YCS Beneficiary Record</h5>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" style=font-size:12px>
                                                
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
                                                                    
                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"../basicSLGMemberDelete.php?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
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

