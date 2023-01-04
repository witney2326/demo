<?php include '././../../layouts/session.php'; ?>
<?php include '././../../layouts/head-main.php'; ?>

<head>
    <title>ACSA |Edit Demo Plot</title>
    <?php include '././../../layouts/head.php'; ?>
    <?php include '././../../layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php include '././../../layouts/vertical-menu.php'; ?>

    <?php
        include "././../../layouts/config2.php"; // Using database connection file here     

        if(isset($_POST['Update']))
            {    
            $Rec_ID = $_POST['rec_no'];
            $plot = $_POST['plot'];
            $acreage = $_POST['acreage'];
            
            if (($Rec_ID =='') or (empty($Rec_ID)))
            {
                echo '<script type="text/javascript">'; 
                    echo 'alert("No Demo Plot, Please Set Plot First");'; 
                    echo 'history.go(-2);';
                    echo '</script>';
            } else
            {        
                if (isset($plot) and ($acreage > 0)) 
                {
                
                    $sql = mysqli_query($link_cs,"update tblacsademoplot  SET plot = '$plot', acreage ='$acreage' where id = '$Rec_ID'");
                        
                    if ($sql) 
                        {
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Demo Plot Record has been EDITED successfully !");'; 
                            echo 'history.go(-2);';
                            echo '</script>';
                        } 
                    else 
                        {
                            echo "Error: " . $sql . ":-" . mysqli_error($link_cs);
                        }
                }
                else 
                {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Acreage cannot be ZERO OR Plot is unset!");'; 
                    echo 'history.go(-1);';
                    echo '</script>';
                }
                mysqli_close($link_cs);
                }
            }
               
    ?>
    
</div>