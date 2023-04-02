<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>SLG Management</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
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

<?php include 'layouts/body.php'; 
include 'lib.php';
?>

<?php
/*
var_dump($_POST);
die();

?>

<?php
/*
if(!$_SESSION["user_role"] == "03" || !$_SESSION["user_role"] == "04"){
    if($_POST["region"] == '' && $_POST["district"] == '00' && $_POST["ta"] == "0000" && $_POST["cw"] == "00") {
        header("location: basic_livelihood_slg_mgt2.php");
      } 
      else if($_POST["region"] !== '00' && $_POST["district"] == "00" && $_POST["ta"] == "0000" && $_POST["cw"] == "00"){
        $region = $_POST["region"];
        $district = $_POST["district"];
        $ta = $_POST["ta"];
        $cw = $_POST["cw"];
        
      }
      else if($_POST["region"] !== '00' && $_POST["district"] !== '00' && $_POST["ta"] == "0000" && $_POST["cw"] == "00"){
        $_SESSION["region"] = $_POST["region"];
        $_SESSION["district"] = $_POST["district"];
        header("location: basic_livelihood_slg_mgt_filter2_results.php");
      }
      else if($_POST["region"] !== '00' && $_POST["district"] !== '00' && $_POST["ta"] !== "0000" && $_POST["cw"] == "00"){
        $_SESSION["region"] = $_POST["region"];
        $_SESSION["district"] = $_POST["district"];
        $_SESSION["ta"] = $_POST["ta"];
        header("location: basic_livelihood_slg_mgt_filter3_results.php");
      } 
      else if($_POST["region"] !== '00' && $_POST["district"] !== '00' && $_POST["ta"] !== "0000" && $_POST["cw"] !== "00"){
        $_SESSION["region"] = $_POST["region"];
        $_SESSION["district"] = $_POST["district"];
        $_SESSION["ta"] = $_POST["ta"];
        $_SESSION["cw"] = $_POST["cw"];
        header("location: basic_livelihood_slg_mgt_filter4_results.php");
      }   
  } else {
     $region = $_SESSION["user_reg"];
     $district = $_SESSION["user_dis"];
     $ta = $_SESSION["user_ta"];
  }
*/
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
                            <h4 class="mb-sm-0 font-size-18">SLG Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">SLG Management</a></li>
                                    <li class="breadcrumb-item active">SLG Management</li>
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

                                
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <?php
                                       if($_SESSION["user_role"] == '03'){ ?>
                                          <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" href="basic_livelihood_slg_mgt_region_cood_filter_results.php" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">SL Groups</span>
                                            </a>
                                         </li>
                                       <?php } else { ?>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">SL Groups</span>
                                            </a>
                                         </li>
                                       <?php } ?>
                                    
                                    <?php 
                                      if($_SESSION["user_role"] == '03'){ ?>
                                          <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="basic_livelihood_cls_mgt_region_cood_filter_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                        <?php } else { ?>
                                            <li class="nav-item waves-effect waves-light">
                                            <a class="link"  href="basic_livelihood_clusters.php" role="link">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Clusters</span>
                                            </a>
                                       </li>
                                      <?php }?>
                                    
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="basic_livelihood_slg_mgt_new_cls_filter1_results.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Cluster!</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" href="basic_livelihood_slg_mgt_new_slg_filter1_results.php" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">New SLG!</span>
                                        </a>
                                    </li>
                                    
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <!--start here -->
                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_slg_mgt_cood_filter2_results.php" method ="POST">
                                                        
                                                    <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" value ="" onChange="getDistrict5(this.value);" required>
                                                                    <option selected value = "<?php echo $_SESSION["user_reg"];?>"><?php echo get_rname($link,$_SESSION["user_reg"]);?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" onChange="getTa(this.value);" required>
                                                                <option selected value="<?php echo $_SESSION["district-9-10"];?>"><?php echo dis_name($link,$_SESSION["district-9-10"]);?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" onChange="getCw(this.value)" required >
                                                                <option selected value="<?php echo $_SESSION["ta-9-10"];?>"><?php echo tname($link,$_SESSION["ta-9-10"]);?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <?php 
                                                              $cwID = $_SESSION["cw-9-10"];
                                                              $sqlCw = "SELECT * FROM tblcw WHERE cwID='$cwID'";
                                                              $sqlCwResult = $link->query($sqlCw);
                                                              $sqlCwResultRow = mysqli_fetch_array($sqlCwResult);
                                                              
                                                            ?>
                                                            <label for="cw" class="form-label">Caseworker</label>
                                                            <select class="form-select" name="cw" id="cw" required >
                                                                <option selected value="<?php echo $_SESSION["cw-9-10"];?>"><?php echo $sqlCwResultRow["cwName"];?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <!-- <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button> -->
                                                            <!-- <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);"> -->
                                                            <a href="basic_livelihood_slg_mgt_region_cood_filter_results.php">
                                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back">
                                                            </a>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row mb-1">
                                                <div class="col-md-6">
                                                    <div class="input-group" display="inline">
                                                        <form action="phpSearch.php" method="post">
                                                            Group Name <input type="text" name="search">
                                                            <input type ="submit" name='Search_Group_Name' value='Search_Name'> 
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group" display="inline">
                                                        <form action="phpSearchgc.php" method="post">
                                                            Group Code <input type="text" name="search">
                                                            <input type ="submit" name='Search_Group_Code' value='Search_Code'> 
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary">Savings and Loan Groups in <?php echo get_rname($link,$_SESSION["user_role"]);?> Region</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        
                                                                        <th>SLG code</th>
                                                                        <th>SLG Name</th>
                                                                        <th>cohort</th>
                                                                        <th><i class="fas fa-male" style="font-size:18px"></i></th>
                                                                        <th><i class="fas fa-female" style="font-size:18px"></i></th>
                                                                        <th><i class="fas fa-male" style="font-size:18px"></i>+<i class="fas fa-female" style="font-size:18px"></i></th>
                                                                        <th>Total-DB</th>
                                                                        <th>Action On SLG</th>
                                                                        
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $ta = $_SESSION["ta-9-10"];
                                                                        $cw = $_SESSION["cw-9-10"];
                                                                        $query="select * from tblgroup where ((TAID = '$ta') and (cwID = '$cw') and (deleted = '0'))";
 
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            $grpID = $row["groupID"];
                                                                            $result = mysqli_query($link, "SELECT COUNT(sppCode) AS value_count FROM tblbeneficiaries where groupID = '$grpID'"); 
                                                                            $row2 = mysqli_fetch_assoc($result); 
                                                                            $count = $row2['value_count'];

                                                                            $total = $row["MembersM"]+$row["MembersF"];
                                                                            echo "<tr>\n";
                                                                            
                                                                        
                                                                            echo "<td>".$row["groupID"]."</td>\n";
                                                                            echo "<td>".$row["groupname"]."</td>\n";
                                                                            echo "<td>".$row["cohort"]."</td>\n";
                                                                            echo "<td>".$row["MembersM"]."</td>\n";
                                                                            echo "<td>".$row["MembersF"]."</td>\n";
                                                                            echo "<td>\t\t$total</td>\n";
                                                                            echo "<td>\t\t$count</td>\n";
                                                                            
                                                                            echo "<td>
                                                                            <a href=\"basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' title='View SLG' style='font-size:18px; color:purple'></i></a>
                                                                            <a href=\"basicSLGedit.php?id=".$row['groupID']."\"><i class='far fa-edit' title='Edit SLG Details' style='font-size:18px;color:orange'></i></a>
                                                                            <a href=\"basicSLGsavings.php?id=".$row['groupID']."\"><i class='fas fa-hand-holding-usd' title='Add SLG Savings' style='font-size:18px;color:brown'></i></a>
                                                                            
                                                                            <a href=\"basicSLG_iga.php?id=".$row['groupID']."\"><i class='fas fa-balance-scale' title='Add SLG IGAs' style='font-size:18px;color:cadetgreen'></i></a> 
                                                                            <a href=\"basicSLGAddMember.php?id=".$row['groupID']."\"><i class='fas fa-user-alt' title='Add Beneficiary to SLG' style='font-size:18px;color:brown'></i></a> 
                                                                            <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This SLG - You Must Be a Supervisor');\" href=\"basicSLGdelete.php?id=".$row['groupID']."\"><i class='far fa-trash-alt' title='Delete SLG' style='font-size:18px;color:Red'></i></a>
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
                                        </p>
                                    </div>
                                    <!-- Here -->
        
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                

                    

               


                <!-- Collapse -->
                

                
                <!-- end row -->

                
                <!-- end row -->

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
<script>
      function getDistrict(val) 
        {
            $.ajax({
            type: "POST",
            url: "get_district.php",
            data:'regID='+val,
            success: function(data)
                    {
                    $("#district").html(data);
                    }
                });
        }

        function getTa(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_ta.php",
                data:'disid='+val,
                success: function(data){
                $("#ta").html(data);
                }
                });
            }
        
            function getCw(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_cw.php",
                data:'disid='+val,
                success: function(data){
                $("#cw").html(data);
                }
                });
            }

    </script>

</body>

</html>