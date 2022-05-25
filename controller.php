<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
class Controller
{
    function __construct() 
    {
        $this->processMobileVerification();
    }
    function processMobileVerification()
    {
        switch ($_POST["action"]) 
        {
                        
            case "save_into_db":

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $password = md5($password);
                $db = mysqli_connect('server-name', 'user-name', 'password', 'database-name');
                $query1 = "SELECT fname FROM test WHERE email='$email'";
                $result1 = mysqli_query($db, $query1);
                $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                if($row){
                        echo json_encode(array( "type" =>"error", "message" => "Email id already exist."));
                        exit();
                }
                else{
                        $query = "INSERT INTO testdemo (fname,lname,email,mobile,address,password) VALUES ('$fname','$lname','$email','$mobile','$address','$password')";
                        $result = mysqli_query($db, $query);
                        if ($result == FALSE) 
                        {
                                die(mysqli_error());
                                echo json_encode(array( "type" =>"error", "message" => "Error."));
                                exit();
                        }
                        else
                               
                             echo json_encode(array( "type" =>"success", "message" => "Successfully inserted."));
                    }
                
                break;
    }
}
}
$controller = new Controller();
?>