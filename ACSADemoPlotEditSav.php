
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
                    echo 'history.go(-2)';
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
                            echo 'history.go(-2)';
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
                    echo 'history.go(-2)';
                    echo '</script>';
                }
                mysqli_close($link);
                }
            }
               
    ?>
    
