<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>YCS IGP Projects</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>
    <?php include '../layouts/config.php'; ?>
    <?php include '../lib.php'; ?>
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

// do check
//if (($_SESSION["user_role"]== '05')) {$region = $_SESSION["user_reg"];$ta = $_SESSION["user_ta"];$district = $_SESSION["user_dis"]; } else{$region = $_POST['region'];$district = $_POST['district'];$ta = $_POST['ta'];}
//if (($_SESSION["user_role"]== '04')) {$region = $_SESSION["user_reg"];$district = $_SESSION["user_dis"];}
//if (($_SESSION["user_role"]== '03')) {$region = $_SESSION["user_reg"];}
//if (($_SESSION["user_role"]== '02') or ($_SESSION["user_role"]== '01')){$region = $_POST['region'];$district = $_POST['district'];$ta = $_POST['ta'];}
?>
<?php   

$id = $_GET['id']; // get id through query string
       $query="select * from tblycs where recID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $districtID= $row["districtID"];
                $voc_type = $row["voc_type"];
                $hh_code = $row["hh_code"];
                $igp = $row["igp"];
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
                            <h4 class="mb-sm-0 font-size-18">Income Generating Projects</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="ycs.php">YCS Dashboard</a></li>
                                    <li class="breadcrumb-item active">IGP</li>
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
                                <!-- main content -->
                                


                                <div class="col-lg-9">
                                    <div class="card border border-success">
                                        <div class="card-header bg-transparent border-success">
                                            <h5 class="my-0 text-success"><?php if ($igp == "1"){echo 'Household Already Has an IGP Recorded!';}else{echo 'YCS IGP For -Household- ';echo $hh_code;}?></h5>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form method="POST" action="ycs_igp_projects_save.php">
                                            
                                                <div class="row mb-2">
                                                    <label for="hh_code" class="col-sm-2 col-form-label">HH Code</label>           
                                                    <input type="text" class="form-control" id="hh_code" name = "hh_code" value="<?php echo $hh_code; ?>" style="max-width:30%;" readonly >
                                                    
                                                    <label for="district" class="col-sm-2 col-form-label">District</label>
                                                    <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$districtID) ; ?>" style="max-width:30%;" readonly>                               
                                                </div>
                                                                                    
                                                <div class="row mb-2">
                                                    <label for="buscat1" class="col-sm-2 col-form-label">Bus Cat</label>
                                                    <select class="form-select" name="buscat1" id="buscat1" value ="" style="max-width:30%;" required disabled>
                                                        <option></option>
                                                        <?php                                                           
                                                            $cat_fetch_query = "SELECT bus_category FROM tblgroup_iga where groupID = '$id'";                                                  
                                                            $result_cat_fetch = mysqli_query($link, $cat_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_cat = mysqli_fetch_array($result_cat_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_cat["bus_category"]; ?>">
                                                                <?php echo cat_name($link,$DB_ROW_cat["bus_category"]); ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                    </select>

                                                    <label for="btype" class="col-sm-2 col-form-label">Voc Type</label>
                                                    <input type="text" class="form-control" id="btype" name="btype" value ="<?php echo iga_name($link,$voc_type) ; ?>" style="max-width:30%;" readonly>                               
                                                </div>

                                                <div class="row mb-2">
                                                    <label for="igp_name" class="col-sm-2 col-form-label">IGP Name</label>
                                                    <input type="text" class="form-control" id="igp_name" name="igp_name" value ="" style="max-width:30%;">

                                                    <label for="capital" class="col-sm-2 col-form-label">IGP Capital</label>
                                                    <input type="text" class="form-control" id="capital" name="capital" value ="" style="max-width:30%;">
                                                </div>

                                                <div class="row mb-2">
                                                    <label for="sdate" class="col-sm-2 col-form-label">Start Date</label>
                                                    <input type="date" class="form-control" id="sdate" name="sdate" value ="" style="max-width:30%;">

                                                    <label for="fdate" class="col-sm-2 col-form-label">Completion Date</label>
                                                    <input type="date" class="form-control" id="fdate" name="fdate" value ="" style="max-width:30%;">
                                                </div>

                                                <div class="row mb-2">
                                                    
                                                </div>

                                                <div class="row justify-content-end">
                                                    
                                                        <div>
                                                            <?php
                                                            if ($igp == "1")
                                                            {echo '<button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit" disabled>Save New YCS IGP Record</button>';}
                                                            else
                                                            {echo '<button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Save New YCS IGP Record</button>';}
                                                            ?>
                                                            
                                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-primary">
                                        <div class="card-header bg-transparent border-primary">
                                            <h5 class="my-0 text-primary">Income Generating Projects</h5>
                                        </div>
                                        <div class="card-body">
                                        <h5 class="card-title mt-0"></h5>
                                            
                                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                
                                                <thead>
                                                        <tr>
                                                            <th>IGP ID</th>   
                                                            <th>HH Code</th>
                                                            <th>Bus Type</th>
                                                            <th>IGP Name</th>
                                                            <th>S Date</th>
                                                            <th>F Date</th>
                                                            <th>Required Capital</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?Php
                                                            $id = $_GET['id'];
                                                            if (($_SESSION["user_role"] == "01") or ($_SESSION["user_role"] == "02"))
                                                            {
                                                                $query="select * from tblycs_igp;";
                                                            }
                                                            if (($_SESSION["user_role"] == "03"))
                                                            {
                                                                $region = $_SESSION["user_reg"];
                                                                $query="select * from tblycs_igp inner join tblbeneficiaries on tblycs_igp.hh_code = tblbeneficiaries.sppCode 
                                                                where tblbeneficiaries.regionID = '$region';";
                                                            }
                                                            if (($_SESSION["user_role"] == "04"))
                                                            {
                                                                $dis = $_SESSION["user_dis"];
                                                                $query="select * from tblycs_igp inner join tblycs on tblycs_igp.hh_code = tblycs.hh_code 
                                                                where tblycs.districtID = '$dis';";
                                                            }
                                                            if (($_SESSION["user_role"] == "05"))
                                                            {
                                                                $ta = $_SESSION["user_ta"];
                                                                $query="select distinct(tblycs_igp.recID),tblycs_igp.hh_code,tblycs_igp.btype,tblycs_igp.igp_name,tblycs_igp.sdate,tblycs_igp.fdate,tblycs_igp.capital 
                                                                from tblycs_igp inner join tblycs on tblycs_igp.hh_code = tblycs.hh_code inner join tblgroup on tblycs.groupID = tblgroup.groupID 
                                                                where tblgroup.TAID = '$ta';";
                                                            }

                                                            if ($result_set = $link->query($query)) {
                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                            { 
                                                                

                                                            echo "<tr>\n";                                           
                                                                echo "<td>".$row["recID"]."</td>\n";
                                                                echo "<td>".$row["hh_code"]."</td>\n";
                                                                echo "<td>".$row["btype"]."</td>\n";
                                                                echo "<td>".$row["igp_name"]."</td>\n";
                                                                echo "<td>".$row["sdate"]."</td>\n";
                                                                echo "<td>".$row["fdate"]."</td>\n";
                                                                echo "<td>".$row["capital"]."</td>\n";
                                                                echo "<td>
                                                                    <a href=\"basicCLSESMPPlansEdit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This ESMP Record');\" href=\"basicCLSESMPPlansDelete.php?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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
                                <!-- main content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

</body>

</html>