<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>Clusters | View Cluster</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

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

<div id="layout-wrapper">

 

    <?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
       $query="select * from tblcluster where ClusterID='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $groupname= $row["ClusterName"];
                
                $regionID = $row["regionID"];
                $DistrictID= $row["districtID"];
                $TAID= $row["taID"];
                $gvhID= $row["gvhID"];
                $cohort = $row["cohort"];
            }
            $result_set->close();
        }

        function dis_name($link, $disID)
        {
        $dis_query = mysqli_query($link,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);// fetch data
        return $dis['DistrictName'];
        }

        function r_name($link, $rcode)
        {
        $region_query = mysqli_query($link,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($region_query);// fetch data
        return $rg['name'];
        }

        function ta_name($link, $tacode)
        {
        $region_query = mysqli_query($link,"select TAName from tblta where TAID='$tacode'"); // select query
        $ta = mysqli_fetch_array($region_query);// fetch data
        return $ta['TAName'];
        }

        function cls_name($link, $clscode)
        {
        $cls_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
        $cls = mysqli_fetch_array($cls_query);// fetch data
        return $cls['ClusterName'];
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
                                    <h5 class="my-0 text-success">Cluster - <?php echo $groupname ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form>
                                        
                                        <div class="row mb-1">
                                            <label for="group_id" class="col-sm-2 col-form-label">Cluster ID</label>                         
                                            <input type="text" class="form-control" id="group_id" name = "group_id" value="<?php echo $id ; ?>" style="max-width:30%;" disabled ="True">
                                            
                                            <label for="group_name" class="col-sm-2 col-form-label">Cluster Name</label>
                                            <input type="text" class="form-control" id="group_name" name ="group_name" value = "<?php echo $groupname ; ?>" style="max-width:30%;" disabled ="True">                           
                                        </div>
                                        
                                        
                                        <div class="row mb-1">
                                            <label for="region" class="col-sm-2 col-form-label">Region</label>
                                            
                                            <input type="text" class="form-control" id="region" name="region" value ="<?php echo r_name($link,$regionID) ; ?>" style="max-width:30%;" disabled ="True">
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo dis_name($link,$DistrictID) ; ?>" style="max-width:30%;" disabled ="True">
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="ta" class="col-sm-2 col-form-label">TA</label>             
                                            <input type="text" class="form-control" id="ta" name="ta" value ="<?php echo ta_name($link,$TAID) ; ?>" style="max-width:30%;" disabled ="True">

                                            <label for="gvh" class="col-sm-2 col-form-label">GVH</label>
                                            <input type="text" class="form-control" id="gvh" name="gvh" value ="<?php echo $gvhID ; ?>" disabled ="True" style="max-width:30%;" >
                                            
                                        </div>

                                        
                                        <div class="row mb-1">
                                            <label for="no_males" class="col-sm-2 col-form-label">No. Of Males</label>
                                            <?php 
                                                $result = mysqli_query($link, "SELECT SUM(MembersM) AS total_males FROM tblgroup where ClusterID = '$id'"); 
                                                $row = mysqli_fetch_assoc($result); 
                                                $total_males = $row['total_males'];
                                            ?>
                                            <input type="text" class="form-control" id="no_males" name="no_males" value ="<?php echo $total_males;?>" style="max-width:30%;" readonly>

                                            <label for="no_females" class="col-sm-2 col-form-label">No. Of Females</label>

                                            <?php 
                                                $result = mysqli_query($link, "SELECT SUM(MembersF) AS total_females FROM tblgroup where ClusterID = '$id'"); 
                                                $row = mysqli_fetch_assoc($result); 
                                                $total_females = $row['total_females'];
                                            ?>

                                            <input type="text" class="form-control" id="no_females" name="no_females" value ="<?php echo $total_females;?>" style="max-width:30%;" readonly >                             
                                            
                                        </div>

                                                                                
                                        <div class="row mb-1">
                                            <label for="cohort" class="col-sm-2 col-form-label">Cohort</label>
                                            
                                                <input type="text" class="form-control" id="cohort" name="cohort" value =" <?php echo $cohort ; ?>" style="max-width:30%;" disabled ="True">
                                            
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <p align="right">
                                                        <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                                    </p>
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
                            <h5 class="my-0 text-primary">SLGs in Cluster: <?php echo $groupname ?></h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>           
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">                                
                                    <thead>
                                        <tr>  
                                            <th>SLG Code</th>   
                                            <th>SLG Name</th>                                           
                                            <th>Males</th>
                                            <th>Females</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?Php
                                            $id = $_GET['id'];
                                            $query="select * from tblgroup where ClusterID ='$id';";
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                                                             
                                            $total_members= $row["MembersM"]+$row["MembersF"];
                                                
                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["groupID"]."</td>\n";                                                
                                                echo "<td>".$row["groupname"]."</td>\n";                                              
                                                echo "<td>".$row["MembersM"]."</td>\n";
                                                echo "<td>".$row["MembersF"]."</td>\n";
                                                echo "<td>\t\t$total_members</td>\n";
                                                
                                                echo "<td>
                                                    <a href=\"basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' style='font-size:18px;color:purple'></i></a>
                                                    
                                                    
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

                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-default">CF(s) in Cluster: <?php echo $groupname ?></h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>           
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">                                
                                    <thead>
                                        <tr>  
                                            <th>HH Code</th>   
                                            <th>CF Name</th>                                           
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?Php
                                            $query="select * from tblcfs where ClusterID ='$id';";
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                
                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["hhcode"]."</td>\n";                                                
                                                echo "<td>".$row["cfName"]."</td>\n";                                              
                                                echo "<td>".$row["gender"]."</td>\n";
                                                echo "<td>".$row["phone"]."</td>\n";
                                                
                                                echo "<td>
                                                    <a href=\"basicSLGMemberview.php?id=".$row['hhcode']."\"><i class='far fa-eye' style='font-size:18px;color:purple'></i></a>
                                                    
                                                    
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