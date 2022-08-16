<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>View SLG</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>
<?php
        

        include "layouts/config.php"; // Using database connection file here

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
                            <h4 class="mb-sm-0 font-size-18">YCS Beneficiaries</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="ycs.php">YCS Management</a></li>
                                    <li class="breadcrumb-item active">YCS Beneficiaries</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div><!-- end page title -->

                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-primary">YCS Record for: <?php echo $groupname;?> </h5>
                </div>
                
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                    <thead>
                        <tr>                          
                            <th>ID</th>   
                            <th>Name</th>
                            <th>SLG Name</th>
                            <th>District</th>
                            <th>Vocational Type</th>
                            <th>Age</th>
                            <th>Voc Scool Linked</th>                                        
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?Php
                                $id = $_GET['id'];
                            $query="select * from tblycs where groupID ='$id';";

                            //Variable $link is declared inside config.php file & used here
                            
                            if ($result_set = $link->query($query)) {
                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                            { 
                                $group = grp_name($link, $id);
                                
                                $district_name = dis_name($link,$row["districtID"]);
                                $ig_name = iga_name($link,$row["voc_type"]);
                        

                            echo "<tr>\n";                                           
                                echo "<td>".$row["recID"]."</td>\n";
                                echo "<td>".$row["beneficiary"]."</td>\n";
                                echo "<td>\t\t$group</td>\n";
                                echo "\t\t<td>$district_name</td>\n";
                                echo "\t\t<td>$ig_name</td>\n";
                                echo "<td>".$row["dob"]."</td>\n";
                                echo "<td>".$row["vocSchoolLinked"]."</td>\n";
                                echo "<td>
                                    <a href=\"?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px;color:purple'></i></a>
                                    <a href=\"?id=".$row['recID']."\"><i class='fa fa-users' title='Link Beneficiary to Voc School' style='font-size:18px;color:brown'></i></a>  
                                    
                                </td>\n";
                            echo "</tr>\n";
                            }
                            $result_set->close();
                            }                          
                        ?>
                    </tbody>
                </table>

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

</body>

</html>