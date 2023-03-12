<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>View SLG</title>
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

<?php include 'layouts/body.php'; ?>
<?php
        include "layouts/config.php"; // Using database connection file here
        
        $id = $_GET['id']; // get id through query string
        $id = $_SESSION["id"];
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
                            <h4 class="mb-sm-0 font-size-18">Group Functional Committee</h4>
                            <div class="page-title-right">
                                    <!-- <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        </p>
                                    </div> -->
                                    <button type="button" class="btn btn-primary">
                                      <a style="color: white;" href="set_bl_el_criteria.php?id=<?php echo $_GET["id"]; ?>">Back</a>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <div class="row">

                    <div class="col-xl-12">
                        
                                                            <?php
                                                                $group_id = "";
                                                                $committee_id = "";

                                                                if (isset($_POST['create'])) {
                                                                    $group_id = $_GET["id"];
                                                                    $committee_id = $_POST['committee_id'];

                                                                    
                                                                    $sql21 = "INSERT INTO  tblfunctional_committees (group_id, committee_id) VALUES ('$group_id', '$committee_id')";
                                                                    
                                                                        $result21 =  $link->query($sql21);

                                                                        if ($result21 == TRUE) {
                                                                            // header('Location: basicSLGView.php'); 
                                                                            
                                                                        } else {
                                                                            
                                                                            // header('Location: basicSLGView.php');
                                                                        }
                                                                    
                                                                }
                                                                ?>

                                                            <?php
                                                                $sql20 = "SELECT * FROM  tblcommittees";
                                                                $result20 = $link->query($sql20);
                                                            ?>
                                                            <form method="post"  action="">
                                                            <label for="sel1" class="form-label">Select functional committee</label>
                                                                <select class="form-select" id="committee_id" name="committee_id">
                                                                <?php while ($row20 = mysqli_fetch_array($result20)) { ?>
                                                                <option value="<?php echo $row20["id"] ?>">
                                                                    <?php echo $row20["name"] ?>
                                                                </option>
                                                                <?php } ?>
                                                                </select>
                                                                <br>
                                                                <button type="submit" name="create" class="btn btn-primary mt-3">Submit</button>
                                                            </form>

                                                            <div class="card-body">              
                                                                
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                                <thead>
                                                                    <tr>   
                                                                        <th>Group Code</th>                                              
                                                                        <th>Group Name</th>
                                                                        <th>Commitee</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $id = $_GET['id'];
                                                                        $sql2 = "SELECT * FROM tblgroup WHERE groupID='$id'";
                                                                        $result2 = $link->query($sql2);

                                                                        $query="select * from tblfunctional_committees where ((group_id ='$id'));";

                                                                        //Variable $link is declared inside config.php file & used here
                                                                        
                                                                        $groupId = "";
                                                                        $groupName = "";

                                                                        while($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                                                                            $groupId = $row2["groupID"];
                                                                            $groupName = $row2["groupname"];
                                                                        }


                                                                        if ($result_set = $link->query($query)) {
                                                                        while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                                                                        {
                                                                        
                                                                        $commId = (int)$row["committee_id"];
                                                                        
                                                                        $sql5 = "SELECT * FROM tblcommittees WHERE id='$commId'";
                                                                        $result5 = $link->query($sql5);
                                                                        $row5 = $result5->fetch_array(MYSQLI_ASSOC);
                                                                        if(isset($row5["name"])) {
                                                                            echo "<tr>\n";
                                                                          
                                                                            echo "<td>".$groupId."</td>\n";            
                                                                            echo "<td>".$groupName."</td>\n"; 
                                                                                                                    
                                                                            
                                                                            echo "<td>".$row5["name"]."</td>\n";
                                                                            
                                                                            
                                                                            echo "<td>                                            
                                                                                 
                                                                                <a href=\"edit_functional_committe.php?id=".$row['id']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px;color:green'></i></a> 
                                                                                <a href=\"delete_functional_committee.php?id=".$row['id']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
                                                                            </td>\n";
                                                                        echo "</tr>\n";
                                                                        }
                                                                        
                                                                        }
                                                                        $result_set->close();
                                                                        }                          
                                                                    ?>
                                                                </tbody>
                                                            </table>    
                                                                
                                                            </div>                 
                                                                
                                                        </div>            
                                                    </div> 
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
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

</body>

</html>