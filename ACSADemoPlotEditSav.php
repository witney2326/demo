<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>ACSA |Edit Demo Plot</title>
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
            $plot = $_POST['plot'];
            $acreage = $_POST['acreage'];
            
            if (($Rec_ID =='') or (empty($Rec_ID)))
            {
                echo '<script type="text/javascript">'; 
                    echo 'alert("No Demo Plot, Please Set Plot First");'; 
                    echo 'window.location.href = "basic_livelihood_acsa_mgt.php";';
                    echo '</script>';
            } else
            {        
                if (isset($plot) and ($acreage > 0)) 
                {
                
                    $sql = mysqli_query($link,"update tblacsademoplot  SET plot = '$plot', acreage ='$acreage' where id = '$Rec_ID'");
                        
                    if ($sql) 
                        {
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Demo Plot Record has been EDITED successfully !");'; 
                            echo 'window.location.href = "basic_livelihood_acsa_mgt.php";';
                            echo '</script>';
                        } 
                    else 
                        {
                            echo "Error: " . $sql . ":-" . mysqli_error($link);
                        }
                }
                else 
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Acreage cannot be ZERO OR Plot is unset!");'; 
                    echo 'window.location.href = "basic_livelihood_acsa_mgt.php";';
                    echo '</script>';
                }
                mysqli_close($link);
                }
            }
               
    ?>
    
</div>