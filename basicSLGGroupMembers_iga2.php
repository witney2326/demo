<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>SLG |Member IGAs</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

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
       $query="select * from tblbeneficiaries where sppCode='$id'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { 
                $districtID= $row["districtID"];
                $cohort = $row["cohort"];
                $groupname = $row["groupID"];  
            }
            $result_set->close();
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

                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary"></i>Business Type Search Filter</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mt-0"></h5>
                                <form class="row row-cols-lg-auto g-3 align-items-center" novalidate action="basicSLGGroupMembers_iga_filter1.php" method ="GET" >
                                    <div class="col-12">
                                        <label for="region" class="form-label">Business Category</label>
                                        <div>
                                            <select class="form-select" name="buscat" id="buscat" value ="" required>
                                                <option></option>
                                                    <?php                                                           
                                                        $cat_fetch_query = "SELECT categoryID,catname FROM tblbusines_category";                                                  
                                                        $result_cat_fetch = mysqli_query($link, $cat_fetch_query);                                                                       
                                                        $i=0;
                                                            while($DB_ROW_cat = mysqli_fetch_array($result_cat_fetch)) {
                                                        ?>
                                                        <option value="<?php echo $DB_ROW_cat["categoryID"]; ?>">
                                                            <?php echo $DB_ROW_cat["catname"]; ?></option><?php
                                                            $i++;
                                                                }
                                                    ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid Business Category.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="iga" class="form-label">Select IGA Type</label>
                                        <select class="form-select" name="iga" id="iga" value ="" required disabled>
                                            <option></option>
                                            <?php                                                           
                                                    $iga_fetch_query = "SELECT ID,name FROM tbliga_types";                                                  
                                                    $result_iga_fetch = mysqli_query($link, $iga_fetch_query);                                                                       
                                                    $i=0;
                                                        while($DB_ROW_iga = mysqli_fetch_array($result_iga_fetch)) {
                                                    ?>
                                                    <option value="<?php echo $DB_ROW_iga["ID"]; ?>">
                                                        <?php echo $DB_ROW_iga["name"]; ?></option><?php
                                                        $i++;
                                                            }
                                                ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid Malawi IGA Type.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                            <input type="hidden" class="form-control" id="hhcode" name = "hhcode" value="<?php echo $id; ?>" style="max-width:60%;" readonly >    
                                            <input type="hidden" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                            
                                    </div>
                                                                        
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-btn btn-outline-primary w-md" name="Submit" value="Submit">Submit</button>
                                    </div>
                                </form>                                             
                                <!-- End Here -->
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">IGA Record for -Household- <?php echo $id ; ?></h5>
                                </div>
                                <div class="card-body">
                                    
                                    <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
                                       
                                        <div class="row mb-1">
                                            <label for="group_code" class="col-sm-2 col-form-label">HH Code</label>
                                            <input type="text" class="form-control" id="group_code" name = "group_code" value="<?php echo $id; ?>" style="max-width:30%;" readonly >
                                            
                                            <label for="district" class="col-sm-2 col-form-label">District</label>
                                            <input type="text" class="form-control" id="district" name="district" value ="<?php echo $districtID ; ?>" style="max-width:30%;">
                                        </div>
                                        
                                                                                
                                        <div class="row mb-1">
                                            <label for="buscat" class="col-sm-2 col-form-label">Bus Cat</label>
                                            <select class="form-select" name="buscat" id="buscat" value ="" style="max-width:30%;" disabled required>
                                                <option></option>    
                                            </select>

                                            <label for="iga" class="col-sm-2 col-form-label">IGA Type</label>
                                            <select class="form-select" name="iga" id="iga" value ="" style="max-width:30%;" disabled required>
                                                <option></option>
                                            </select>
                                        </div>
                                                                                                                                            
                                        <div class="row mb-4">
                                            <label for="amount_invested" class="col-sm-2 col-form-label">Initial Invest</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="amount_invested" name="amount_invested" value ="" style="max-width:30%;">
                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-btn btn-outline-primary w-md" style="width:170px;" name="Submit" value="Submit" disabled>Save New HH IGA</button>
                                                <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" style="width:170px;" VALUE="Back" onClick="history.go(-1);">
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
                            <h5 class="my-0 text-primary">IGA Record</h5>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title mt-0"></h5>
                            
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>IGA ID</th>   
                                            <th>HH Code</th>
                                            <th>SLG</th>
                                            <th>District</th>
                                            <th>IGA Type</th>
                                            <th>Amount Invested</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?Php
                                                $id = $_GET['id'];
                                            $query="select * from tblmember_iga where sppCode ='$id';";

                                            //Variable $link is declared inside config.php file & used here
                                            
                                            if ($result_set = $link->query($query)) {
                                            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                            { 
                                                $group = grp_name($link, $row["groupID"]);
                                                $amount = number_format($row["amount_invested"],"2");

                                               
                                                $district_name = dis_name($link,$row["districtID"]);
                                                $ig_name = iga_name($link,$row["type"]);
                                        

                                            echo "<tr>\n";                                           
                                                echo "<td>".$row["recID"]."</td>\n";
                                                echo "\t\t<td>$id</td>\n";  
                                                echo "\t\t<td>$group</td>\n";
                                                echo "\t\t<td>$district_name</td>\n";
                                                echo "\t\t<td>$ig_name</td>\n";
                                                
                                                echo "\t\t<td>$amount</td>\n";
                                                
                                                echo "<td>
                                                    <a href=\"basicSLGMemberIGAEdit.php?id=".$row['recID']."\"><i class='far fa-edit' style='font-size:18px'></i></a> 
                                                    <a onClick=\"javascript: return confirm('Are You Sure You want To DELETE This Record');\" href=\"?id=".$row['recID']."\"><i class='far fa-trash-alt' style='font-size:18px'></i></a>        
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