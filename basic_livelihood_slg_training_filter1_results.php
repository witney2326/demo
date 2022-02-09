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

</head>

<?php include 'layouts/body.php'; ?>

<?php 
        $region = $_GET['region'];
        //$district = $_GET['district'];
        //$ta = $_GET['ta'];
    
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
                            <h4 class="mb-sm-0 font-size-18">Training Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood_training.php">SLG Training Management</a></li>
                                    <li class="breadcrumb-item active">SLG Training</li>
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
                                
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">
                                            

                                            <!--start here -->
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary">Training Search Filter</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_slg_training_filter2_results.php" method ="GET">
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region" required >
                                                                    <option selected value = "<?php echo $region;?>"><?php echo get_rname($link,$region);?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" required>
                                                                <option></option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict where regionID = $region";                                                  
                                                                        $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                        ?>
                                                                        <option value="<?php echo $DB_ROW_Dis["DistrictID"]; ?>">
                                                                            <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required disabled>
                                                                <option></option>
                                                                <?php                                                           
                                                                        $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                                        $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                        $i=0;
                                                                            while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                        ?>
                                                                        <option>
                                                                            <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                            $i++;
                                                                                }
                                                                    ?>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a valid TA.
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        </div>
                                                        <div class="col-12">
                                                            <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                        <h5 class="my-0 text-primary"><i class="mdi mdi-book-clock"></i>Savings and Loan Groups</h5>
                                                    <div class="card-body">
                                                    
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th>Groupcode</th>
                                                                        <th>Group Name</th>
                                                                        <th>District</th>
                                                                        <th>Action</th>
                                                                       
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        if (isset($region))
                                                                        {
                                                                            $query="select * from tblgroup where (regionID = '0')";
                                                                        
                                                                        
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                            { 
                                                                                $dis = dis_name($link,$row["DistrictID"]);
                                                                            echo "<tr>\n";
                                                                                
                                                                            
                                                                                echo "<td>".$row["groupID"]."</td>\n";
                                                                                echo "<td>".$row["groupname"]."</td>\n";
                                                                                echo "\t\t<td>$dis</td>\n";
                                                                                echo "<td>
                                                                                    <a href=\"basicSLGTraining_view.php?id=".$row['groupID']."\"><i class='far fa-eye' title='Training Status' style='font-size:18px'></i></a>                                                                           
                                                                                    <a href=\"add_basicTrainingGD.php?id=".$row['groupID']."\" ><i class='fas fa-pen' title='Record Training' style='font-size:18px'></i></a>                                                                            
                                                                                    <a href=\"basicSLGTrainingReport.php?id=".$row['groupID']."\" ><i class='far fa-folder-open' title='Training Report' style='font-size:18px'></i></a>    
                                                                                </td>\n";
                                                                            echo "</tr>\n";
                                                                            }
                                                                            $result_set->close();
                                                                            }  
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
                                    <div class="tab-pane" id="messages-2" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>New SLG Cluster</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    
                                                    <form action="insertSLG.php" method="post">
                                                        <!-- start here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="region" class="form-label">Region</label>
                                                                    <select class="form-select" name="region" id="region" required>
                                                                        <option selected value = "$region">Select Region...</option>
                                                                        <?php                                                           
                                                                                $dis_fetch_query = "SELECT name FROM tblregion";                                                  
                                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php
                                                                                        echo $DB_ROW_reg["name"];
                                                                                    ?>
                                                                                </option>
                                                                                <?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Malawi region.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <select class="form-select" name="district" id="district" required>
                                                                        <option selected value="$district" >Select District</option>
                                                                            <?php
                                                                                                                                    
                                                                                $dis_fetch_query = "SELECT DistrictName FROM tbldistrict";                                                  
                                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Malawi district.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="ta" class="form-label">TA</label>
                                                                    <select class="form-select" name="ta" id="ta" required>
                                                                        <option selected  value="$ta">Choose...</option>
                                                                        <?php                                                           
                                                                                $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                                                $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid TA.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="gvh" class="form-label">GVH</label>
                                                                    <input type="text" name="GVHID" class="form-control" required>              
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Group Village Head.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-3">
                                                                    <label for="village" class="form-label">Village</label>
                                                                    <input type="text" name="village" class="form-control" required>                                                  
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Village in Malawi.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- End here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupID" class="form-label">Group ID</label>
                                                                        <input type="text" name="groupID" class="form-control" disabled ="True">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupname" class="form-label">Group Name</label>
                                                                        <input type="text" name="groupname" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>Date Established</label>
                                                                        <input type="date" name="DateEstablished" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>Cluster Name</label>
                                                                        <input type="text" name="clusterID" class="form-control">
                                                                    </div>                                                                                                             
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>No Males</label>
                                                                        <input type="text" name="membersM" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                    <label>No Females</label>
                                                                        <input type="text" name="membersF" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit New SLG Cluster">
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <!-- end here -->
                                    <div class="tab-pane" id="slg-1" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>New SLG</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    
                                                    <form action="insertSLG.php" method="post">
                                                        <!-- start here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="region" class="form-label">Region</label>
                                                                    <select class="form-select" name="region" id="region" required>
                                                                        <option selected value = "$region">Select Region...</option>
                                                                        <?php                                                           
                                                                                $dis_fetch_query = "SELECT name FROM tblregion";                                                  
                                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php
                                                                                        echo $DB_ROW_reg["name"];
                                                                                    ?>
                                                                                </option>
                                                                                <?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Malawi region.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="district" class="form-label">District</label>
                                                                    <select class="form-select" name="district" id="district" required>
                                                                        <option selected value="$district" >Select District</option>
                                                                            <?php
                                                                                                                                    
                                                                                $dis_fetch_query = "SELECT DistrictName FROM tbldistrict";                                                  
                                                                                $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Malawi district.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="ta" class="form-label">TA</label>
                                                                    <select class="form-select" name="ta" id="ta" required>
                                                                        <option selected  value="$ta">Choose...</option>
                                                                        <?php                                                           
                                                                                $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                                                $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                                                ?>
                                                                                <option>
                                                                                    <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid TA.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="gvh" class="form-label">GVH</label>
                                                                    <input type="text" name="GVHID" class="form-control" required>              
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Group Village Head.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-3">
                                                                    <label for="village" class="form-label">Village</label>
                                                                    <input type="text" name="village" class="form-control" required>                                                  
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Village in Malawi.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- End here -->
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupID" class="form-label">Group ID</label>
                                                                        <input type="text" name="groupID" class="form-control" disabled ="True">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label for="groupname" class="form-label">Group Name</label>
                                                                        <input type="text" name="groupname" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>Date Established</label>
                                                                        <input type="date" name="DateEstablished" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>Cluster Name</label>
                                                                        <input type="text" name="clusterID" class="form-control">
                                                                    </div>                                                                                                             
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="spp" class="form-label">SP Program</label>
                                                                    <select class="form-select" name="spp" id="spp" required>
                                                                        <option >Choose...</option>
                                                                        <?php                                                           
                                                                                $spp_fetch_query = "SELECT pID,pName FROM tblprogram";                                                  
                                                                                $result_spp_fetch = mysqli_query($link, $spp_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_spp = mysqli_fetch_array($result_spp_fetch)) {
                                                                                ?>
                                                                                <option value="<?php echo $DB_ROW_spp["pID"]; ?>">
                                                                                    <?php echo $DB_ROW_spp["pName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Program.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                        <label>No Males</label>
                                                                        <input type="text" name="membersM" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <div class="form-group">
                                                                    <label>No Females</label>
                                                                        <input type="text" name="membersF" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="Cohort" class="form-label">Cohort</label>
                                                                    <select class="form-select" name="Cohort" id="Cohort" required>
                                                                        <option value ="1">1</option>
                                                                        <option value ="2">2</option>
                                                                        <option value ="3">3</option>
                                                                        <option value ="4">4</option>                                                                    
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Cohort.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-2">
                                                                    <label for="cw" class="form-label">Case Worker</label>
                                                                    <select class="form-select" name="cw" id="cw" required>
                                                                        
                                                                        <?php                                                           
                                                                                $cw_fetch_query = "SELECT cwID,cwName FROM tblcw";                                                  
                                                                                $result_cw_fetch = mysqli_query($link, $cw_fetch_query);                                                                       
                                                                                $i=0;
                                                                                    while($DB_ROW_cw = mysqli_fetch_array($result_cw_fetch)) {
                                                                                ?>
                                                                                <option value="<?php echo $DB_ROW_cw["cwID"]; ?>">
                                                                                    <?php echo $DB_ROW_cw["cwName"]; ?></option><?php
                                                                                    $i++;
                                                                                        }
                                                                            ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid Case Worker.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit New SLG">
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="messages-1" role="tabpanel">
                                        <p class="mb-0">
                                            Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                            sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                            farm-to-table readymade. Messenger bag gentrify pitchfork
                                            tattooed craft beer, iphone skateboard locavore carles etsy
                                            salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                            mi whatever gluten-free.
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <p class="mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                            farm-to-table.
                                        </p>
                                    </div>
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

</body>

</html>