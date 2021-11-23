<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CIMIS| User Management</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <?php include 'layouts/config.php'; ?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Change password -->
    <script>
    function validatePassword() {
    var currentPassword,newPassword,confirmPassword,output = true;

    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;

    if(!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else if(!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "required";
        output = false;
    }
    else if(!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "required";
        output = false;
    }
    if(newPassword.value != confirmPassword.value) {
        newPassword.value="";
        confirmPassword.value="";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not same";
        output = false;
    } 	
    return output;
    }
</script>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
    if (count($_POST) > 0) {
        $result = mysqli_query($conn, "SELECT *from users WHERE userId='" . $_SESSION["userId"] . "'");
        $row = mysqli_fetch_array($result);
        if ($_POST["currentPassword"] == $row["password"]) {
            mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
            $message = "Password Changed";
        } else
            $message = "Current Password is not correct";
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
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">User Management</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">User Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Register User</span>
                                        </a>
                                    </li>
                                   
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Roles and Permissions</span>
                                        </a>
                                    </li>

                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages-2" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Password Maintainance</span>
                                        </a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <p class="mb-0">                                           
                                            <!--start here -->
                                            
                                                <div class="container">
                                                    <div class="row justify-content-left">
                                                        <div class="col-md-8 col-lg-6 col-xl-5">
                                                            <div class="card overflow-hidden">
                                                                
                                                                <div class="card-body pt-0">
                                                                    
                                                                    <div class="p-2">
                                                                        <form class="needs-validation" action="index.php">

                                                                            <div class="mb-3">
                                                                                <label for="useremail" class="form-label">User Email</label>
                                                                                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter email">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label for="username" class="form-label">Username</label>
                                                                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label for="userpassword" class="form-label">Initial Password</label>
                                                                                <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
                                                                            </div>

                                                                            <div class="mt-4 d-grid">
                                                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                                                            </div>

                                                                            
                                                                            
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            

                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            <!-- End Here --> 
                                        </p>
                                    </div>
                                    <!-- Here -->
                                    
                                    <!-- end here -->
                                    
                                    <div class="tab-pane" id="messages-1" role="tabpanel">
                                        <p class="mb-0">
                                        <div class="card border border-primary">
                                                <div class="card-header bg-transparent border-primary">
                                                    <h5 class="my-0 text-primary">Member Reports</h5>
                                                </div>
                                                <div class="card-body">
                                                </div>
                                        </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="messages-2" role="tabpanel">
                                        <p class="mb-0">
                                            <form name="frmChange" method="post" action=""
                                                onSubmit="return validatePassword()">
                                                <div style="width: 500px;">
                                                    <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                                                    <table border="0" cellpadding="10" cellspacing="0"
                                                        width="500" align="center" class="tblSaveForm">
                                                        <tr class="tableheader">
                                                            <td colspan="2">Change Password</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="40%"><label>Current Password</label></td>
                                                            <td width="60%"><input type="password"
                                                                name="currentPassword" class="txtField" /><span
                                                                id="currentPassword" class="required"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>New Password</label></td>
                                                            <td><input type="password" name="newPassword"
                                                                class="txtField" /><span id="newPassword"
                                                                class="required"></span></td>
                                                        </tr>
                                                        <td><label>Confirm Password</label></td>
                                                        <td><input type="password" name="confirmPassword"
                                                            class="txtField" /><span id="confirmPassword"
                                                            class="required"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><input type="submit" name="submit"
                                                                value="Submit" class="btnSubmit"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </form>
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