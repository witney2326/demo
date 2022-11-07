<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>

<head>
    <title>View JSG</title>
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
           
        $id = $_GET['id']; // get id through query string

        $check = substr($id, 5, 3);
            
            if ($check == "CLU"){
                $name_query = mysqli_query($link,"select ClusterName from tblcluster where ClusterID='$id'"); // select query
                while($rg = mysqli_fetch_array($name_query)){
                $groupname = $rg['ClusterName'];}
                $groupname = $groupname ." ". "Cluster";

            }
            if ($check == "SLG"){
                $grpname_query = mysqli_query($link,"select groupname from tblgroup where groupID='$id'"); // select query
                while($rg = mysqli_fetch_array($grpname_query)){
                $groupname = $rg['groupname'];}
                $groupname = $groupname ." ". "SLG";
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
                            <h4 class="mb-sm-0 font-size-18">View JSG Record(s)</h4>
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
                        <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary">JSG Record for: <?php echo $groupname;?> </h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mt-0"></h5>
                            
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            
                                <thead>
                                    <tr>
                                        <th>JSG ID</th>   
                                        <th>JSG Name</th>
                                        <th>IGA Type</th>
                                        <th>Males</th>
                                        <th>Females</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?Php
                                            $id = $_GET['id'];
                                        $query="select * from tbljsg where groupID ='$id';";

                                        //Variable $link is declared inside config.php file & used here
                                        
                                        if ($result_set = $link->query($query)) {
                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                        { 
                                            $group = grp_name($link, $id);
                                            
                                            $district_name = dis_name($link,$row["districtID"]);
                                            $ig_name = iga_name($link,$row["type"]);
                                            $jsg_name = $row["jsg_name"];
                                            $jsgid = $row["recID"];

                                        echo "<tr>\n";                                           
                                            echo "<td>".$row["recID"]."</td>\n";
                                                
                                            echo "<td>".$row["jsg_name"]."</td>\n";
                                            echo "\t\t<td>$ig_name</td>\n";
                                            echo "<td>".$row["no_male"]."</td>\n";
                                            echo "<td>".$row["no_female"]."</td>\n";
                                            echo "<td>
                                                <a href=\"jsg_view.php?id=".$row['recID']."\"><i class='far fa-eye' style='font-size:18px;color:purple'></i></a>
                                                <a href=\"jsg_edit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px;color:green'></i></a>
                                                <a href=\"jsg_add_hh.php?id=".$row['recID']."\"><i class='fa fa-users' title='Add Beneficiary to JSG' style='font-size:18px;color:brown'></i></a>  
                                                
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