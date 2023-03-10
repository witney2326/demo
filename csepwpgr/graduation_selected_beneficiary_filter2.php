<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>Household Graduation Assesment</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
<!-- DataTables -->
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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

    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
        var agree=confirm("Are you sure you want to RATE this Household?");
        if (agree)
        return true ;
        else
        return false ;
        }   
    </script>

</head>

<?php include '../layouts/body.php'; ?>

<?php

if (($_SESSION["user_role"]== '04') or ($_SESSION["user_role"]== '05')) 
   {
       $region = $_SESSION["user_reg"];
       $district = $_SESSION["user_dis"];  
   }
   else
   {
       $region = $_POST['region'];
       $district = $_POST['district'];
   }
     
     


         function get_rname($link, $rcode)
         {
         $rg_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['name'];
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
                            <h4 class="mb-sm-0 font-size-18">Households Graduation Assesment</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="graduation.php">Graduation</a></li>
                                    <li class="breadcrumb-item active">Households Graduation Assesment</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                        <!--start here -->
                                <div class="card border border-primary">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                        
                                        <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="graduation_selected_beneficiary_filter3.php" method="POST">
                                            <div class="col-12">
                                                <label for="region" class="form-label">Region</label>
                                                <div>
                                                    <select class="form-select" name="region" id="region" required>
                                                        <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="district" class="form-label">District</label>
                                                <select class="form-select" name="district" id="district" required>
                                                    <option selected value = "<?php echo $district;?>"><?php echo dis_name($link,$district);?></option>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="slg" class="form-label">SL Group</label>
                                                <select class="form-select" name="slg" id="slg" required>
                                                    <option></option>
                                                    <?php   
                                                                                                          
                                                            $slg_fetch_query = "SELECT groupID,groupname FROM tblgroup where ((DistrictID = '$district') and (grad_status = '1'))";                                                  
                                                            $result_slg_fetch = mysqli_query($link, $slg_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_slg = mysqli_fetch_array($result_slg_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_slg["groupID"]; ?>">
                                                                <?php echo $DB_ROW_slg["groupname"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid SLG.
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="FormSubmit" value="Submit">Submit</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                            </div>
                                        </form>                                             
                                        <!-- End Here -->
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-md-6">
                                        <div class="input-group" display="inline">
                                            <form action="graduation_beneficiary_searchN.php" method="post">
                                            Household Name <input type="text" name="search">
                                                <input type ="submit" name='Search_HH_Name' value='Search_Name'> 
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group" display="inline">
                                            <form action="graduation_beneficiary_searchC.php" method="post">
                                                Household Code <input type="text" name="search">
                                                <input type ="submit" name='Search_HH_Code' value='Search_Code'> 
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <?php 
                                            $q1="select count(sppCode) as bens from tblbeneficiaries where ((districtID = '$district') and (grad_status = '1'))";
                                            if ($result_set1 = $link->query($q1)) {
                                                while($rw = $result_set1->fetch_array(MYSQLI_ASSOC))
                                                { 
                                                    $beneficiaries = $rw["bens"];
                                                }
                                            }
                                            ?>
                                            <h5 class="my-0 text-default"><?php echo $beneficiaries; echo" ";?>Selected Households in <?php echo dis_name($link,$district); ?> District</h5>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                    <thead>
                                                        <tr>                    
                                                            <th>HH Code</th>
                                                            <th>HH Head Name</th>                                                                                                                                                                               
                                                            <th>Grad.Status</th>                                           
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?Php
                                                            
                                                            $query="select * from tblbeneficiaries where ((districtID = '$district') and (grad_status = '1'))";

                                                        //Variable $link is declared inside config.php file & used here
                                                        
                                                        if ($result_set = $link->query($query)) {
                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                        { 
                                                            if ($row["grad_assesed"] == 1){$grad_assesed = "Yes";}else{$grad_assesed = "No";} 
                                                                       if ($row["grad_assesed_result"] == 1){$grad_assesed_result = "Good";}if ($row["grad_assesed_result"] == 2){$grad_assesed_result = "Poor";}if ($row["grad_assesed_result"] == 0){$grad_assesed_result = "NA";}
                                                                       if ($row["grad_status"] == 1){$grad_status = "On GP";}else{$grad_status = "N/A";}

                                                                       $sppCode = $row["sppCode"];

                                                                    echo "<tr>\n";
                                                                        echo "<td>".$row["sppCode"]."</td>\n";
                                                                        echo "<td>".$row["hh_head_name"]."</td>\n";                                                      
                                                                        echo "\t\t<td>$grad_status</td>\n";
                                                                        echo "<td> <a href=\"../basicSLGMemberview.php?id=".$row['sppCode']."\"><i class='far fa-eye' title='View Member' style='font-size:18px;color:purple'></i></a>\n";
                                                                        echo "<a href=\"../basicSLGMemberedit.php?id=".$row['sppCode']."\"><i class='far fa-edit' title='Edit Household' style='font-size:18px;color:green'></i></a>\n";
                                                                        
                                                                        
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
<script src="../assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/libs/jszip/jszip.min.js"></script>
<script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="../assets/js/pages/datatables.init.js"></script>

</body>

</html>