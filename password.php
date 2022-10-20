

<?php
session_start();

if(isset($_POST['submit_pass']) && $_POST['pass'])
{
 $pass=$_POST['pass'];
 if($pass=="123")
 {
  $_SESSION['password']=$pass;
 }
 else
 {
  $error="Incorrect Password";
 }
}

if(isset($_POST['page_logout']))
{
 unset($_SESSION['password']);
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="password_style.css">

</head>
<body>
<div id="wrapper">

<?php
if(isset($_SESSION['password'])=="123")
{
 ?>
 <h2>Systems Administration</h2>

 header_register_callback

 

 header_register_callback
 
 <form method="post" action="" id="logout_form">
    <div>
        <input type="submit" name="page_logout" value="LOGOUT">
    </div>
 </form>
 <?php
}
else
{
 ?>
 <form method="post" action="" id="login_form">
  <h1>LOGIN TO PROCEED</h1>
  <input type="password" name="pass" placeholder="*******">
  <input type="submit" name="submit_pass" value="DO SUBMIT">
  
  
 </form>
 <?php	
}
?>

</div>
</body>
</html>

