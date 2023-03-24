<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>Beneficiary Household Assesment|Approval</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>
    
</head>

<div id="layout-wrapper">

    <?php
        include "././../../layouts/config.php";     
        
        $Rec_ID = $_GET['id']; 

        $query="select id from tblbeneficiaries_graduating where sppCode='$Rec_ID'";
        
        if ($result_set = $link->query($query)) {
            while($row = $result_set->fetch_array(MYSQLI_ASSOC))
            { $id= $row["id"];}
            $result_set->close();
        }
 
        if (isset($id))
        { 
            echo '<script type="text/javascript">'; 
            echo 'alert("Beneficiary Household Already Added!");'; 
            echo 'window.location.href = "graduation_hh_tracking.php";';
            echo '</script>';
        }
        else
        $sql = mysqli_query($link,"insert into tblbeneficiaries_graduating (sppCode,deleted) values ('$Rec_ID','0')");
                    
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Beneficiary Household Successfully Added!");'; 
                echo 'window.location.href = "graduation_hh_tracking.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
        mysqli_close($link);
            
               
    ?>
    
</div>