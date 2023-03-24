<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php'; ?>

<head>
    <title>Register User| CIMIS</title>
    <?php include 'layouts/head.php'; ?>

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <?php include 'layouts/head-style.php'; ?>
</head>


<?php
// Include config file
require_once "layouts/config.php";

// Define variables and initialize with empty values
$useremail = $username =  $password = $confirm_password = "";
$useremail_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if (isset($_POST["Submit"])) {

    $region = $_POST["region"];
    $district = $_POST["district"];
    $ta = $_POST["ta"];
    $position = $_POST["position"];

    // Validate useremail
    if (empty(trim($_POST["useremail"]))) {
        $useremail_err = "Please enter a useremail.";
    } elseif (!filter_var($_POST["useremail"], FILTER_VALIDATE_EMAIL)) {
        $useremail_err = "Invalid email format";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE useremail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);

            // Set parameters
            $param_useremail = trim($_POST["useremail"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $useremail_err = "This useremail is already taken.";
                } else {
                    $useremail = trim($_POST["useremail"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
        $ustatus = '0';
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please enter a confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if (empty($useremail_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (useremail, username, ustatus, userrole, userreg, userdis, userta, password, token) VALUES (?, ?, ?, ?,?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_useremail, $param_username, $param_ustatus, $param_userrole, $param_userreg, $param_userdis, $param_userta, $param_password, $param_token);

            // Set parameters
            $param_useremail = $useremail;
            $param_username = $username;
            $param_ustatus = $ustatus;

            $param_userrole = $position;
            $param_userreg = $region;
            $param_userdis = $district;
            $param_userta = $ta;

            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_token = bin2hex(random_bytes(50)); // generate unique token

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo '<script type="text/javascript">'; 
                echo 'alert("Successfully Registered, Wait for email confirmation before login!");'; 
                echo 'window.location.href = "auth-login.php";';
                echo '</script>';
                //header("location: auth-login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary"></h4>

                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Comsip Intergrated Management Information System "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary"></h4>
                                                                    <p class="font-size-14 mb-0"></p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Livelihoods Management Information System: Supporting Livelihoods Interventions in Malawi "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary"></h4>
                                                                    <p class="font-size-14 mb-0"></p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                    <a href="index.php" class="d-block auth-logo">
                                        <img src="assets/images/logo-dark.png" alt="" height="64" class="auth-logo-dark">
                                        <img src="assets/images/logo-light.png" alt="" height="64" class="auth-logo-light">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 class="text-primary">Register account</h5>
                                        <p class="text-muted">If Livelihoods Stakeholder in Malawi GET your account now.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                                            <div class="mb-1">
                                                <label for="position" class="form-label">Position</label>
                                                <select class="form-select" name="position" id="position" required>
                                                    <option</option>
                                                    <option value="00">Guest</option>
                                                    <option value="02">Data Clerk</option>
                                                    <option value="03">Regional Cordinator</option>
                                                    <option value="04">District Cordinator</option>
                                                    <option value="05">Case Worker</option>
                                                    <option value="06">Comsip: Managers</option>
                                                    <option value="07">Comsip: Others</option>
                                                    <option value="08">Livelihood Stakeholders</option>
 
                                                </select>
                                                
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($useremail_err)) ? 'has-error' : ''; ?>">
                                                <label for="useremail" class="form-label">email address</label>
                                                <input type="email" class="form-control" id="useremail" name="useremail"  value="<?php echo $useremail; ?>">
                                                <span class="text-danger"><?php echo $useremail_err; ?></span>
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                                <label for="username" class="form-label">Enter Username</label>
                                                <input type="text" class="form-control" id="username" name="username"  value="<?php echo $username; ?>">
                                                <span class="text-danger"><?php echo $username_err; ?></span>
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                <label for="userpassword" class="form-label">Enter Password</label>
                                                <input type="password" class="form-control" id="userpassword" name="password"  value="<?php echo $password; ?>">
                                                <span class="text-danger"><?php echo $password_err; ?></span>
                                            </div>

                                            <div class="mb-1 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                <label for="confirm_password" class="form-label">Confirm Your Password</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password"  value="<?php echo $confirm_password; ?>">
                                                <span class="text-danger"><?php echo $confirm_password_err; ?></span>
                                            </div>
                                            
                                            <input type="hidden" id="region" name="region" value="<?php echo $_POST["region"];?>">
                                            <input type="hidden" id="district" name="district" value="<?php echo $_POST["district"];?>">
                                            <input type="hidden" id="ta" name="ta" value="<?php echo $_POST["ta"];?>">

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit"name="Submit" value="Submit">Submit Registration</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Copyright<i class="mdi mdi-heart text-danger"></i> COMSIP</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- owl.carousel js -->
    <script src="assets/libs/owl.carousel/owl.carousel.min.js"></script>

    <!-- validation init -->
    <script src="assets/js/pages/validation.init.js"></script>

    <!-- auth-2-carousel init -->
    <script src="assets/js/pages/auth-2-carousel.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>