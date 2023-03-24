<?php
include_once 'layouts/config.php';
include_once 'lib.php';

 
if(isset($_POST['Submit']))
    {    
        $hh_id = $_POST['hh_id'];
        $disID = dis_code($link,$_POST['district']);
        $year = $_POST['year'];
        $month = $_POST['month'];
        $amount = $_POST['amount'];
          
          
        $sql = "INSERT INTO tblslg_member_loans (districtID,hh_code,groupID,year,month,amount)
        VALUES ('$disID','$hh_id','$groupID','$year','$month','$amount')";
        if (mysqli_query($link, $sql)) 
        {
            echo '<script type="text/javascript">'; 
                echo 'if (confirm("Houehold Loans Record has been added successfully! Add another Loans Record For Household?"))';
                echo '{';
                    echo 'history.go(-1)';
                echo '}';
                echo 'else';
                echo '{';
                    //echo 'window.location.href = "basic_livelihood_slg_mgt_check.php";';
                    echo 'history.go(-2)';
                echo '}';
            echo '</script>';
          } else {
              echo "Error: " . $sql . ":-" . mysqli_error($link);
          }
          mysqli_close($link);
    }

?>