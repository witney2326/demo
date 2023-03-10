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
                            <h4 class="mb-sm-0 font-size-18">Edit Group Sanitation</h4>
                            <div class="page-title-right">
                                    <!-- <div>
                                        <p align="right">
                                            <INPUT TYPE="button" class="btn btn-btn btn-outline-secondary w-md" VALUE="Back" onClick="history.go(-1);">
                                        </p>
                                    </div> -->
                                    <button type="button" class="btn btn-primary">
                                      <a style="color: white;" href="sanitation.php?id=<?php echo $_SESSION["id"]; ?>">Back</a>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <div class="row">

                    <div class="col-xl-12">
                        
                                                            <?php

                                                                if (isset($_POST['edit'])) {
                                                                    $on_sanitation = $_POST['on_sanitation'];
                                                                    $id = $_POST['id'];

                                                                    
                                                                    $sql21 = "UPDATE tblsanitation SET on_sanitation='$on_sanitation' WHERE id='$id'";
                                                                    
                                                                        $result21 =  $link->query($sql21);

                                                                        if ($result21 == TRUE) {
                                                                            
                                                                            $groupid = $_SESSION["id"];
                                                                            $baseUrl = "sanitation.php?id=".$groupid;
                                                                            $trimmedUrl = trim($baseUrl, '"');

                                                                            echo "<script>
                                                                            window.location = '$trimmedUrl';
                                                                            </script>";
                                                                        } else {
                                                                            
                                                                            // header('Location: basicSLGView.php');
                                                                        }
                                                                    
                                                                }

                                                                if (isset($_GET['id'])) {
                                                                    $id = $_GET['id'];
                                                                    $sql = "SELECT * FROM tblsanitation WHERE id = $id";
                                                                    $result = $link->query($sql);
                                                                
                                                                    if ($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            $id = $row['id'];
                                                                            $on_sanitation = $row['on_sanitation'];
                                                                            
                                                                        }
                                                                    }
                                                                }
                                                                ?>

                                                            <form method="post"  action="" name="myForm" name="myForm" onsubmit="return validateInput()">
                                                                <input value="<?php echo $id ?>" type="hidden" name="id" />
                                                           
                                                                <div class="form-group">
                                                                    <label class="form-label" for="sell">How many members adopted atleast three sanitary interventions?</label>
                                                                    <input value="<?php echo $on_sanitation; ?>" type="text" name="on_sanitation" class="form-control" id="date">
                                                                </div>
                                                                <br>
                                                                <button type="submit" name="edit" class="btn btn-primary mt-3">Submit</button>
                                                            </form>             
                                                                
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
<!-- Data Validation -->
<script>
  function validateInput(){
    var number = document.forms["myForm"]["on_sanitation"].value;
    if(number >= 1 && number <= 100){
        
    } else{
        
        alert("Type a number between 1 and 100");
        return false;
    }

  }
</script>

</body>

</html>