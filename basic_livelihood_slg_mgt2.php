<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG Management</title>
    <?php include 'layouts/head.php';?>
    <?php include 'layouts/head-style.php';?>
    <?php include 'layouts/config.php';?>
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
                data:`disid=${val}`,
                
                success: function(data){
                $("#cw").html(data);
                }
                });
            }

            function getDistrict2(val) 
        {
            $.ajax({
            type: "POST",
            url: "get_district.php",
            data:'regID='+val,
            success: function(data)
                    {
                    $("#district2").html(data);
                    }
                });
        }

        function getTa2(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_ta.php",
                data:'disid='+val,
                success: function(data){
                $("#ta2").html(data);
                }
                });
            }
        
            function getDistrict3(val) 
        {
            $.ajax({
            type: "POST",
            url: "get_district.php",
            data:'regID='+val,
            success: function(data)
                    {
                    $("#district3").html(data);
                    }
                });
        }

        function getTa3(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_ta.php",
                data:'disid='+val,
                success: function(data){
                $("#ta3").html(data);
                }
                });
            }

            function getDistrict4(val) 
        {
            $.ajax({
            type: "POST",
            url: "get_district.php",
            data:'regID='+val,
            success: function(data)
                    {
                    $("#district4").html(data);
                    }
                });
        }

        function getTa4(val) 
            {
                $.ajax({
                type: "POST",
                url: "get_ta.php",
                data:'disid='+val,
                success: function(data){
                $("#ta4").html(data);
                }
                });
            }

    </script>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<?php
    if (($_SESSION["user_role"] == '05')) {
        header("location: basic_livelihood_slg_mgt_filter3_results.php");   
    }
    if (($_SESSION["user_role"] == '04')) {
        header("location: basic_livelihood_slg_mgt_filter2_results.php");   
    }
    if (($_SESSION["user_role"] == '03')) {
        header("location: basic_livelihood_slg_mgt_filter1_results.php");   
    }

    if (($_SESSION["user_role"]== '06')) {
        header("location: basic_livelihood_HH_Dis_reports.php");
    }
    if (($_SESSION["user_role"]== '08')) {
        header("location: basic_livelihood_HH_Dis_reports.php");
    }
?>

<?php 
    if(isset($_GET['Submit']))
    {   
        $region = $_GET['region'];
        $district = $_GET['district'];
        $ta = $_GET['ta'];
        $cw = $_GET['cw'];
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
                            <h4 class="mb-sm-0 font-size-18">SLG Management</h4>

                            <div class="page-title-right">

                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">SLG Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div style="margin-bottom:10px;margin-top:0px">
                    <a href="basic_enhanced_criteria.php"><button type="button" class="btn btn-primary">Basic to Enhanced Livelihood Criteria</button></a> 
                </div>
                
                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">SL Groups</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="link"  href="basic_livelihood_clusters_check.php" role="link">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Clusters</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#cls-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">New Cluster!</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#slg-1" role="tab">
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
                                                    
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_slg_mgt_filter_results.php" method ="POST" >
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region" id="region"  onChange="getDistrict(this.value);" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                            ?>
                                                                            <option value ="<?php
                                                                                    echo $DB_ROW_reg["regionID"];?>">
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
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" onChange="getTa(this.value);" required>
                                                                <option selected value="00">Select District</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" onChange="getCw(this.value)" required >
                                                                <option selected value="0000">Select TA</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Case Worker</label>
                                                            <select class="form-select" name="cw" id="cw"  required >
                                                                <option selected value="00">Select Caseworker</option>
                                                            </select>
                                                        </div>

                                                        
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
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
                                                        <h5 class="my-0 text-default">Savings and Loan Groups</h5>
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
                                                                        
                                                                        <th>Actions On SLG</th>
                                                                       
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblgroup where ((regionID ='0') and (deleted ='0'))";
                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                            $totalAdult =  $row["MembersM"]+ $row["MembersF"];
                                                                        echo "<tr>\n";
                                                                            
                                                                        
                                                                            echo "<td>".$row["groupID"]."</td>\n";
                                                                            echo "<td>".$row["groupname"]."</td>\n";
                                                                            echo "<td>".$row["cohort"]."</td>\n";
                                                                            
                                                                            
                                                                            echo "<td>".$row["MembersM"]."</td>\n";
                                                                            echo "<td>".$row["MembersF"]."</td>\n";
                                                                            echo "\t\t<td>$totalAdult</td>\n";

                                                                            
                                                                            echo "<td>
                                                                                <a href=\"basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' title='View SLG' style='font-size:18px'></i></a>
                                                                                <a href=\"basicSLGedit.php?id=".$row['groupID']."\"><i class='far fa-edit' title='Edit SLG Details' style='font-size:18px'></i></a>
                                                                                <a href=\"basicSLGsavings.php?id=".$row['groupID']."\"><i class='fas fa-hand-holding-usd' title='Add SLG Savings' style='font-size:18px'></i></a>
                                                                                <a href=\"basicSLGloans.php?id=".$row['groupID']."\"><i class='fas fa-book' title='Add SLG Loans' style='font-size:18px'></i></a> 
                                                                                <a href=\"basicSLG_iga.php?id=".$row['groupID']."\"><i class='fas fa-balance-scale' title='Add SLG IGAs' style='font-size:18px'></i></a> 
                                                                                <a href=\"basicSLGAddMember.php?id=".$row['groupID']."\"><i class='fas fa-user-alt' title='Add Beneficiary to SLG' style='font-size:18px'></i></a>
                                                                                <a href=\"basicSLG_UploadSavings.php?id=".$row['groupID']."\"><i class='fas fa-upload' title='Upload Household Savings' style='font-size:18px;color:brown'></i></a>     
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
                                    <div class="tab-pane" id="cls-1" role="tabpanel">
                                        <p class="mb-0">
                                            <!-- here -->
                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_slg_mgt_new_cls_filter2_results.php" method ="POST" >
                                                    
                                                    <div class="col-12">
                                                            <label for="region2" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region2" id="region2"  onChange="getDistrict2(this.value);" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query2 = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch2 = mysqli_query($link, $dis_fetch_query2);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg2 = mysqli_fetch_array($result_dis_fetch2)) {
                                                                            ?>
                                                                            <option value ="<?php
                                                                                    echo $DB_ROW_reg2["regionID"];?>">
                                                                                <?php
                                                                                    echo $DB_ROW_reg2["name"];
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
                                                        
                                                        <div class="col-12">
                                                            <label for="district2" class="form-label">District</label>
                                                            <select class="form-select" name="district2" id="district2" onChange="getTa2(this.value);" required>
                                                                <option selected value="00">Select District</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta2" id="ta2" onChange="getCw2(this.value)" required >
                                                                <option selected value="0000">Select TA</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>
                                            <!-- end here -->        
                                        </p>
                                    </div>
                                    <!-- end here -->
                                    <div class="tab-pane" id="slg-1" role="tabpanel">
                                        <p class="mb-0">

                                            <!--start here -->
                                            <div class="card border border-primary">
                                                
                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_slg_mgt_new_slg_filter3_results.php" method ="POST" >
                                                    <div class="col-12">
                                                            <label for="region2" class="form-label">Region</label>
                                                            <div>
                                                                <select class="form-select" name="region4" id="region4"  onChange="getDistrict4(this.value);" required>
                                                                    <option></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query2 = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch2 = mysqli_query($link, $dis_fetch_query2);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg2 = mysqli_fetch_array($result_dis_fetch2)) {
                                                                            ?>
                                                                            <option value ="<?php
                                                                                    echo $DB_ROW_reg2["regionID"];?>">
                                                                                <?php
                                                                                    echo $DB_ROW_reg2["name"];
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
                                                        
                                                        <div class="col-12">
                                                            <label for="district2" class="form-label">District</label>
                                                            <select class="form-select" name="district4" id="district4" onChange="getTa4(this.value);" required>
                                                                <option selected value="00">Select District</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta4" id="ta4" onChange="getCw4(this.value)" required >
                                                                <option selected value="0000">Select TA</option>
                                                            </select>
                                                        </div>

                                                        
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary w-md" name="Submit" value="Submit">Submit</button>
                                                        </div>
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                           
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="clusters" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"></i>Cluster Search Filter</h5>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title mt-0"></h5>
                                                    <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basic_livelihood_slg_mgt_cls_filter1_results.php" method ="GET" >
                                                        <div class="col-12">
                                                            <label for="region" class="form-label">Region</label>
                                                            
                                                                <select class="form-select" name="region" id="region"  required>
                                                                    <option ></option>
                                                                    <?php                                                           
                                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                                            $i=0;
                                                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                                            ?>
                                                                            <option value ="<?php
                                                                                    echo $DB_ROW_reg["regionID"];?>">
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
                                                        
                                                        <div class="col-12">
                                                            <label for="district" class="form-label">District</label>
                                                            <select class="form-select" name="district" id="district" value ="$district" required disabled>
                                                                <option selected value="$district" ></option>
                                                                    <?php                                                           
                                                                        $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
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
                                                            <div class="invalid-feedback">
                                                                Please select a valid Malawi district.
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                            <select class="form-select" name="ta" id="ta" required disabled>
                                                                <option selected  value="$ta"></option>
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
                                                    </form>                                             
                                                    <!-- End Here -->
                                                </div>
                                            </div>

                                            <!-- start here -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border border-primary">
                                                    <div class="card-header bg-transparent border-primary">
                                                        <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>SLG Clusters</h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <h7 class="card-title mt-0"></h7>
                                                        
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        
                                                                        <th>Cluster code</th>
                                                                        <th>Cluster Name</th>
                                                                        <th>cohort</th>
                                                                        <th>GVH</th>
                                                                        <th>SP Programme</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?Php
                                                                        $query="select * from tblcluster ";

                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        { 
                                                                        echo "<tr>\n";
                                                                            
                                                                        
                                                                            echo "<td>".$row["ClusterID"]."</td>\n";
                                                                            echo "<td>".$row["ClusterName"]."</td>\n";
                                                                            echo "<td>".$row["cohort"]."</td>\n";                                                                            
                                                                            echo "<td>".$row["gvhID"]."</td>\n";
                                                                            echo "<td>".$row["programID"]."</td>\n";
                                                                            
                                                                            echo "<td>
                                                                            <a href=\"basicCLSview.php?id=".$row['ClusterID']."\">view</a>\n";
                                                                            echo
                                                                                "<a href=\"basicCLSedit.php?id=".$row['ClusterID']."\">edit</a>\n";
                                                                            
                                                                            echo 
                                                                            "<a href=\"basicCLSdelete.php?id=".$row['ClusterID']."\">del</a>    
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
                                            <!-- end here -->
 
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="slg-reports" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary"><a href="basic_livelihood_SLG_reports.php">SLG Reports</a></h5>
                                                </div>
                                                <div class="card-body">
                                                </div>
                                            </div>
                                        
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