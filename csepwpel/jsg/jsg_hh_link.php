<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>JSG Household Link|Approval</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>  
</head>

<div id="layout-wrapper">

    <?php
        include "././../../layouts/config2.php"; // Using database connection file here     
        
        $Rec_ID = $_GET['id']; 

        $query="select jsg_mapped from tblbeneficiaries where sppCode='$Rec_ID'";
        
        if ($result_set = $link_cs->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $jsg_mapped= $row["jsg_mapped"];}
            $result_set->close();
        }
 
        if ($jsg_mapped =='1')
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("Household Already Linked !");'; 
            echo 'window.location.href = "jsgs.php";';
            echo '</script>';
        } 
        else
        {
            $sql = mysqli_query($link_cs,"update tblbeneficiaries  SET jsg_mapped = '1' where sppCode = '$Rec_ID'");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Household Linked Successfully !");'; 
                echo 'window.location.href = "jsgs.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
            }
        }
        
        mysqli_close($link_cs);
            
               
    ?>
    
</div>