<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Household Status|Approval</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>  
</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $query="select prog_status_check,prog_status_verified,hhstatus from tblbeneficiaries where sppCode='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $prog_status_check= $row["prog_status_check"];$prog_status_verified = $row["prog_status_verified"];$hhstatus = $row["hhstatus"];}
            $result_set->close();
        }
 
        if (($prog_status_check =='1') && ($prog_status_verified =='1') && ($hhstatus == '0'))
        {
            $sql = mysqli_query($link,"update tblbeneficiaries  SET hhstatus = '1' where sppCode = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Approved successfully !");'; 
                echo 'window.location.href = "basic_livelihood_hh_mgt.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Approved OR Household is (SCT/CSPWP) Unverified !");'; 
            echo 'window.location.href = "basic_livelihood_hh_mgt.php";';
            echo '</script>';
        }
        mysqli_close($link);
            
               
    ?>
    
</div>