<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Add JSG |Joint Skill Groups</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<div id="layout-wrapper">

    

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

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

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
                                            <th>District</th>
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
                                        

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["recID"]."</td>\n";
                                                  
                                                echo "<td>".$row["jsg_name"]."</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                echo "<td>".$row["no_male"]."</td>\n";
                                                echo "<td>".$row["no_female"]."</td>\n";
                                                echo "<td>
                                                    <a href=\"jsg_edit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px;color:purple'></i></a>
                                                    <a href=\"jsg_add_hh.php?id=".$row['recID']."\"><i class='fa fa-users' title='Add Beneficiary to JSG' style='font-size:18px;color:brown'></i></a>  
                                                    
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
                            <div class="col-12">
                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                            </div> 
                        </div>     
                    </div>            
                </div>
                

            </div>
        </div>
    </div>
</div>