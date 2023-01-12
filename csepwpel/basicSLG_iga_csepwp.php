<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>SLG |Income Generating Activities</title>
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
               $districtID= $row["DistrictID"];
               $groupname = $row["groupname"];  
           }
           $result_set->close();
       }

       if(isset($_POST['Submit']))
           { 
           $groupID = $_POST["group_code"];
           $district= $_POST["district"];
           $iga = $_POST['iga'];
           $males = $_POST["males"];
           $females = $_POST["females"];
           $amount = $_POST['amount_invested'];
           
           $_SESSION['groupID'] = $groupID;

           
               $sql = "INSERT INTO tblgroup_iga (groupID,districtID,type,no_male,no_female,amount_invested)
               VALUES ('$groupID','$district','$iga','$males','$females','$amount')";
           if (mysqli_query($link_cs, $sql)) {
               echo '<script type="text/javascript">'; 
               echo 'alert("SLG IGA Record has been added successfully !");'; 
               echo 'window.location.href = "basic_livelihood_slg_mgt2.php";';
               echo '</script>';
           } else {
               echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
           }
           mysqli_close($link_cs);
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
                            <h4 class="mb-sm-0 font-size-18">CS-EPWP SLG IGAs</h4>
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
                                <h5 class="my-0 text-primary"></i>Business Type Search Filter</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mt-0"></h5>
                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basicSLG_iga_filter1_csepwp.php" method ="GET" >
                                    <div class="col-12">
                                        <label for="region" class="form-label">Business Category</label>
                                        <div>
                                            <select class="form-select" name="buscat" id="buscat" value ="" required>
                                                <option></option>
                                                    <?php                                                           
                                                        $cat_fetch_query = "SELECT categoryID,catname FROM tblbusines_category";                                                  
                                                        $result_cat_fetch = mysqli_query($link_cs, $cat_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_cat = mysqli_fetch_array($result_cat_fetch)) {
                                                        ?>
                                                        <option value="<?php echo $DB_ROW_cat["categoryID"]; ?>">
                                                            <?php echo $DB_ROW_cat["catname"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid Business Category.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="iga" class="form-label">Select IGA Type</label>
                                        <select class="form-select" name="iga" id="iga" value ="" required disabled>
                                            <option></option>
                                            <?php                                                           
                                                    $iga_fetch_query = "SELECT ID,name FROM tbliga_types";                                                  
                                                    $result_iga_fetch = mysqli_query($link_cs, $iga_fetch_query);                                                                       
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
                                            <input type="hidden" class="form-control" id="group_code" name = "group_code" value="<?php echo $id; ?>" style="max-width:60%;" readonly >    
                                            <input type="hidden" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                    </div>
                                                                        
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                    </div>
                                </form>                                             
                                <!-- End Here -->
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">IGA Record for -SLG- <?php echo $groupname ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
                                       
                                        <div class="row mb-1">
                                            <label for="group_code" class="col-sm-2 col-form-label">Group Code</label>
                                            <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $id; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                        
                                        
                                        <div class="row mb-1">
                                            <label for="buscat" class="col-sm-2 col-form-label">Bus Cat</label>
                                            <select class="form-select" name="buscat" id="buscat" value ="" style="max-width:30%;" disabled required>
                                                <option></option>                                  
                                            </select>

                                            <label for="iga" class="col-sm-2 col-form-label">IGA Type</label>
                                            <select class="form-select" name="iga" id="iga" value ="" style="max-width:30%;" disabled required>
                                                <option></option>
                                            </select>
                                        </div>
                                                                               
 
                                        <div class="row mb-4">
                                            <label for="males" class="col-sm-1 col-form-label">No.M</label>
                                            <input type="text" class="form-control" id="males" name="males" placeholder="males" style="max-width:10%;">
                                            
                                            <label for="females" class="col-sm-1 col-form-label">No.F</label>
                                            <input type="text" class="form-control" id="females" name="females" placeholder="females" style="max-width:10%;">

                                            <label for="amount_invested" class="col-sm-3 col-form-label">Amount Invested</label>
                                            
                                            <input type="text" class="form-control" id="amount_invested" name="amount_invested" value ="" style="max-width:20%;">
                                        </div>

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit" disabled>Save New SLG IGA Record</button>
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
                                            <th>SLG Name</th>
                                            <th>District</th>
                                            <th>IGA Type</th>
                                            <th>Males</th>
                                            <th>Females</th>
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
                                                $group = grp_name($link_cs, $id);
                                                $amount = number_format($row["amount_invested"],"2");

                                               
                                                $district_name = dis_name($link_cs,$row["districtID"]);
                                                $ig_name = iga_name($link_cs,$row["type"]);
                                        

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["recID"]."</td>\n";
                                                  
                                                echo "\t\t<td>$group</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                echo "<td>".$row["no_male"]."</td>\n";
                                                echo "<td>".$row["no_female"]."</td>\n";
                                                echo "\t\t<td>$amount</td>\n";
                                                
                                                echo "<td>
                                                    <a href=\"basicSLGMemberSavingsEdit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
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