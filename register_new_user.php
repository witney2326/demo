<?php
  // Include db config
  require_once 'layouts/config.php';

  // Init vars
  $name = $email = $password = $confirm_password = '';
  $name_err = $email_err = $password_err = $confirm_password_err = '';

  // Process form when post submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Put post vars in regular vars
    $name =  trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);
    $title = trim($_POST['title']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate email

    
    if(empty($email)){
      $email_err = 'Please enter email';
    } 
    else 
        {
        $rg_query = mysqli_query($link,"select id from users where useremail='$email'");
        $rg = mysqli_fetch_array($rg_query);

            if (isset($rg))
                {
                echo '<script type="text/javascript">'; 
                echo 'alert("email already taken !");'; 
                echo 'window.location.href = "login-new.php";';
                echo '</script>';
            } 
    }

    // Validate name
    if(empty($name)){$name_err = 'Please enter name';}

    // Validate password
    if(empty($password)){$password_err = 'Please enter password';} elseif(strlen($password) < 6){$password_err = 'Password must be at least 6 characters ';}

    // Validate Confirm password
    if(empty($confirm_password)){$confirm_password_err = 'Please confirm password';} else {if($password !== $confirm_password){$confirm_password_err = 'Passwords do not match';}}

    // Make sure errors are empty
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
      // Hash password
      $password = password_hash($password, PASSWORD_DEFAULT);

      // Prepare insert query
      $sql = "INSERT INTO users ( useremail,username, password) VALUES ('$email','$name','$password')";

      if(mysqli_query($link, $sql))
        {
          echo '<script type="text/javascript">'; 
          echo 'alert("User Successfuly Registered !");'; 
          echo 'window.location.href = "login-new.php";';
          echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
}
?>