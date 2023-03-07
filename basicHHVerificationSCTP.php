<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<head>
    <title>Household Status|SCT Verification</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>  
</head>

<div id="layout-wrapper">
    <?php
        include "layouts/config.php";   
        
        $Rec_ID = $_GET['id']; 

        $query1="select prog_status_check from tblbeneficiaries where sppCode='$Rec_ID'";
        if ($result_set = $link->query($query1)) {
            while($row0 = $result_set->fetch_array(MYSQLI_ASSOC))
            {$prog_status_check = $row0["prog_status_check"];}  
        }

        if ($prog_status_check == '0')
        {
            $query="select formNumber from tblcz_beneficiary where hhcode='$Rec_ID'";
            
            if ($result_set = $link->query($query)) {
                while($row = $result_set->fetch_array(MYSQLI_ASSOC))
                {   $formNumber = $row["formNumber"];
                    if (isset($formNumber)){$found = 1;}else{$found = 0;}
                }  
            }
    
            if (isset($found) == 1) 
            {
                $sql = mysqli_query($link,"update tblbeneficiaries  SET prog_status_verified = '1', prog_status_check = '1' where sppCode = '$Rec_ID'");
                        
                if ($sql) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Household Verified against SCT Database Successfully !");'; 
                    echo 'window.location.href = "basic_livelihood_hh_mgt.php";';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($link);
                }
            }
            if (isset($found) == 0) 
            {
                $sql2 = mysqli_query($link,"update tblbeneficiaries  SET prog_status_check = '1' where sppCode = '$Rec_ID'");
                        
                if ($sql2) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Household Checked -- NOT Verified as SCT Beneficiary!");'; 
                    echo 'window.location.href = "basic_livelihood_hh_mgt.php";';
                    echo '</script>';}
            }
        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Processed -- Check Current Status!");'; 
            echo 'window.location.href = "basic_livelihood_hh_mgt.php";';
            echo '</script>';
        }
        mysqli_close($link);        
    ?>
</div>