<?php include '../layouts/session.php'; ?>
<?php include '../layouts/head-main.php'; ?>
<?php 
header("Cache-Control: max-age=300, must-revalidate"); 
?>

<head>
    <title>SLG |Income Generating Activities</title>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/head-style.php'; ?>

</head>

<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

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
       
               
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                

                <?php include '../layouts/body.php'; ?>



                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">

                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary">IGA Record(s) for SLG: <?php echo " "; echo grp_name($link,$id);?></h5>
                            </div>

                            <div class="card-body">
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
                                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                                $id = $_GET['id'];
                                            $query="select * from tblgroup_iga where groupID ='$id';";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                $group = grp_name($link, $id);
                                                $amount = number_format($row["amount_invested"],"2");

                                               
                                                $district_name = dis_name($link,$row["districtID"]);
                                                $ig_name = iga_name($link,$row["type"]);
                                        

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["recID"]."</td>\n";
                                                  
                                                echo "\t\t<td>$group</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                echo "<td>".$row["no_male"]."</td>\n";
                                                echo "<td>".$row["no_female"]."</td>\n";
                                                echo "\t\t<td>$amount</td>\n";
                                                
                                                
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