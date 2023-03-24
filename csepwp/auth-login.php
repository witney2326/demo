<?php
// Initialize the session
session_start();



// Check if the user is already logged in, if yes then redirect him to index page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index_check.php");
    exit;
}
// Include config file
require_once "../layouts/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
        
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, userrole,userreg,userdis,userta,ustatus, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username );
            

            // Set parameters
            $param_username = $username;
            
            
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username,$userrole,$userreg,$userdis,$userta,$ustatus,$hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ((password_verify($password, $hashed_password)) and ($ustatus == "1")) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["user_reg"] = $userreg;
                            $_SESSION["user_dis"] = $userdis;
                            $_SESSION["user_ta"] = $userta;
                            $_SESSION["user_role"] = $userrole;

                            // Redirect user to welcome page
                            header("location: index_check.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid, Or User NOT Yet Approved!";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Login | Comsip Intergrated MIS</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-4">
                                    <div class="text-primary p-4">
                                        <h6 class="text-default">COMSIP Intergrated MIS</h6>
                                        
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <div class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="64">
                                        </span>
                                    </div>
                                </div>

                                <div class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="64">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                    <div class="row mb-1 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="" name="username" style="max-width:40%;">
                                        <span class="text-danger"><?php echo $username_err; ?></span>
                                    </div>

                                    <div class="row mb-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        
                                        <label class="col-sm-4 col-form-label"> Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="" aria-label="Password" aria-describedby="password-addon" style="max-width:40%;">
                                        <button class="btn btn-light " type="button" id="password-addon" style="max-width:10%;"><i class="mdi mdi-eye-outline"></i></button>
                                        
                                        <span class="text-danger"><?php echo $password_err; ?></span>
                                    </div>

                                    <div class="g-recaptcha brochure__form__captcha" data-sitekey="YOUR SITE KEY"></div>

                                    <div class="row mb-1">
                                        <div class="text-center">
                                            <button class="btn btn btn-outline-success waves-effect waves-light" type="submit" value="Login" style="width:30%">Log In</button>
                                            <a href="" class="text-muted"style="width:70%"></a>

                                            <div class="mt-2 text-right"> 
                                                <a href="auth-login1.php" class="text-muted"style="width:60%"><h6 class="text-default">No Credentials? Sign In as Guest</h6></a>
                                            </div>
                                        </div>                                     
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>
</html>