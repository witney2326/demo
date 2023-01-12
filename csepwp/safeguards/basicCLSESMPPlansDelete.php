<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>Delete SLG ESMP Record</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include '././../../layouts/vertical-menu.php'; ?>

    <?php
        include "././../../layouts/config2.php";     

        $id = $_GET['id'];

        $sql = mysqli_query($link_cs,"delete from tblsafeguard_group_plans where planID = '$id'");
                
        if ($sql) {
            echo '<script type="text/javascript">'; 
                echo 'alert("Safeguard Plan DELETED Successfully !");'; 
                echo 'history.go(-1);';
            echo '</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
        }
        mysqli_close($link_cs);
            
               
    ?>
    
</div>