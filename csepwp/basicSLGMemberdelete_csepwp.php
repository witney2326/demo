<?php 

    echo '<head>';
        echo '<title>Delete HH Record</title>';
    echo '</head>';


    include '../layouts/config2.php'; // Using database connection file here     

    $id = $_GET['id'];

    $sql = mysqli_query($link_cs,"delete from tblbeneficiaries where sppCode = '$id'");
    $sql2 = mysqli_query($link_cs,"delete from tblslg_member_savings where hh_code = '$id'");
    $sql3 = mysqli_query($link_cs,"delete from tblslg_member_loans where hh_code = '$id'");
    $sql4 = mysqli_query($link_cs,"delete from tblslg_member_iga where hh_code = '$id'");
            
    if ($sql and $sql2 and $sql3 and $sql4) {
        echo '<script type="text/javascript">'; 
        echo 'if (confirm("Household Record has been DELETED from Database Successfully!"))';
            echo '{';
               echo 'history.go(-1)';
            echo '}';
         echo 'else';
            echo '{';
               echo 'window.location.href = "basic_livelihood_member_mgt.php";';
        echo '}';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
    }
    mysqli_close($link_cs);
     
?>
    
    
