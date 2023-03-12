<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>CBDRA |Edit Adopt a Place</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <?php
        include "layouts/config.php"; // Using database connection file here     

        if(isset($_POST['Update']))
            {    
            $Rec_ID = $_POST['rec_no'];
            $place = $_POST['place'];
            $purpose = $_POST['purpose'];
            
            
            
            $sql = mysqli_query($link,"update tbladoptplace  SET place = '$place', purpose ='$purpose' where id = '$Rec_ID'");
                  
            if ($sql) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Adopt a Place Record has been EDITED successfully !");'; 
                echo 'window.location.href = "basic_livelihood_CBDRA_adoptAPlace.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($link);
            }
            mysqli_close($link);
            }
               
    ?>
    
</div>