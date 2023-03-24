<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>Add JSG |Joint Skill Groups</title>
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
           
        $buscat = $_GET['buscat']; // get id through query string
       $district = $_GET["district"];
       $groupID = $_GET["group_code"];
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

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Add JSG</h4>
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
                    <div class="col-12">

                        <?php include '../layouts/body.php'; ?>

                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary"></i>Business Type Filter</h5>
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
                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        
                                    </div>
                                </form>                                             
                                <!-- End Here -->
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">JSG Record for -SLG- <?php echo grp_name($link,$groupID) ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="jsg_new_clusters.php" method="POST">
                                       
                                        <div class="row mb-1">
                                            <label for="group_code" class="col-sm-2 col-form-label">Group Code</label>
                                            <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $groupID; ?>" style="max-width:30%;" readonly >

                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo $district ; ?>" readonly style="max-width:30%;">
                                        </div>
                                        
                                                                                
                                        <div class="row mb-1">
                                            <label for="buscat" class="col-sm-2 col-form-label">Bus Cat</label>
                                            <select class="form-select" name="buscat" id="buscat" value ="<?php echo $buscat;?>" style="max-width:30%;" required>
                                                <option selected value="<?php echo $buscat;?>" ><?php echo bus_cat_name($link,$buscat);?></option>
                                            </select>

                                            <label for="iga" class="col-sm-2 col-form-label">Select IGA Type</label>
                                            <select class="form-select" name="iga" id="iga" value ="" style="max-width:30%;" required>
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
                                                                               
                                                                                
                                        <div class="row mb-1">
                                            <label for="jsg_name" class="col-sm-2 col-form-label">JSG Name</label>
                                            <input type="text" class="form-control" id="jsg_name" name="jsg_name" placeholder="Enter JSG Name" style="max-width:30%;" required>

                                            <label for="females" class="col-sm-2 col-form-label">Mapped?</label>
                                            <input type="text" class="form-control" id="mapped" name="mapped" value ="<?php echo $mapped;?>" readonly style="max-width:30%;">
                                        </div>

                                        <div class="row mb-4">
                                            <label for="males" class="col-sm-2 col-form-label">No. Of Males</label>
                                            <input type="number" class="form-control" id="males" name="males" min="0" max="30" style="max-width:30%;">

                                            <label for="females" class="col-sm-2 col-form-label">No. Of Females</label>
                                            <input type="number" class="form-control" id="females" name="females" min="0" max="30" style="max-width:30%;">
                                        </div>
                                        
                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save New Cluster JSG Record</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-9">
                        <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary">JSG Record</h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                            
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>JSG ID</th>   
                                            <th>JSG Name</th>
                                            <th>District</th>
                                            <th>IGA Type</th>
                                            <th>Males</th>
                                            <th>Females</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                            $groupID = $_GET['group_code'];
                                            $query="select * from tbljsg where groupID ='$groupID';";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                $group = grp_name($link, $groupID);
   
                                                $district_name = dis_name($link,$row["districtID"]);
                                                $ig_name = iga_name($link,$row["type"]);
                                        

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["recID"]."</td>\n";
                                                  
                                                echo "<td>".$row["jsg_name"]."</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                echo "<td>".$row["no_male"]."</td>\n";
                                                echo "<td>".$row["no_female"]."</td>\n";
                                                
                                                
                                                echo "<td>
                                                    <a href=\"jsg_edit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px;color:green'></i></a> 
                                                    <a href=\"jsg_add_hh.php?id=".$row['recID']."\"><i class='fas fa-user-alt' title='Add Beneficiary to JSG' style='font-size:18px;color:orange'></i></a>  
                                                    
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