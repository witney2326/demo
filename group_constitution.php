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
                            <h4 class="mb-sm-0 font-size-18">Group Constitution</h4>
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
                                                                $date = "";
                                                                $endosed = "";

                                                                if (isset($_POST['create'])) {
                                                                    $group_id = $_GET["id"];
                                                                    $date = $_POST['date'];
                                                                    if(isset($_POST['endosed'])){
                                                                        $endosed = $_POST['endosed'];
                                                                    }
                                                                    
                                                                    $sql21 = "INSERT INTO tblconstitution (group_id, date, endosed) VALUES ('$group_id', '$date', '$endosed')";
                                                                    
                                                                        $result21 =  $link->query($sql21);

                                                                        if ($result21 == TRUE) {
                                                                            // header('Location: basicSLGView.php'); 
                                                                            
                                                                        } else {
                                                                            
                                                                            // header('Location: basicSLGView.php');
                                                                        }
                                                                    
                                                                }
                                                                ?>


                                                            <form method="post"  action="">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sell">Was the consitution endosed by members?</label><br>
                                                                    <div style="display: flex;gap:20px;margin-bottom:20px">
                                                                        <div>
                                                                            <input type="radio" id="html" name="endosed" value="1">
                                                                            <label for="html">Yes</label><br>
                                                                        </div>
                                                                        <div>
                                                                            <input type="radio" id="css" name="endosed" value="0">
                                                                            <label for="css">No</label><br>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="form-label" for="sell">Date endosed:</label>
                                                                    <input type="date" name="date" class="form-control" id="date" style="width:200px" required>
                                                                </div>
                                                                <br>
                                                                <button type="submit" name="create" class="btn btn-primary mt-3">Submit</button>
                                                            </form>

                                                            <div class="card-body">              
                                                                
                                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                                
                                                                <thead>
                                                                    <tr>   
                                                                        <th>Group Code</th>                                              
                                                                        <th>Group Name</th>
                                                                        <th>Constitution Endosed</th>
                                                                        <th>Date</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    <?Php
                                                                        $id = $_GET['id'];
                                                                        $sql2 = "SELECT * FROM tblgroup WHERE groupID='$id'";
                                                                        $result2 = $link->query($sql2);

                                                                        $query="select * from tblconstitution where ((group_id ='$id'));";

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

                                                                        echo "<tr>\n";
                                                                          
                                                                            echo "<td>".$groupId."</td>\n";            
                                                                            echo "<td>".$groupName."</td>\n"; 
                                                                                                                  
                                                                            if($row["endosed"]=="1"){
                                                                                echo "<td>"."Yes"."</td>\n";
                                                                            } else {
                                                                                echo "<td>"."No"."</td>\n";
                                                                            }
                                                                            
                                                                            echo "<td>".$row["date"]."</td>\n"; 
                                                                            
                                                                            
                                                                            echo "<td>                                            
                                                                                 
                                                                                <a href=\"edit_constitution.php?id=".$row['id']."\"><i class='far fa-edit' title='Edit Member' style='font-size:18px;color:green'></i></a> 
                                                                                <a href=\"delete_constitution.php?id=".$row['id']."\"><i class='far fa-trash-alt' style='font-size:18px;color:red'></i></a>        
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