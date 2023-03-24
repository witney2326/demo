
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'vendor/autoload.php';
    include "layouts/config.php"; 
//send confirmation mail
$Rec_ID = $_GET['id'];

$result = mysqli_query($link, "SELECT useremail FROM users WHERE id = '$Rec_ID'"); 
$row = mysqli_fetch_assoc($result); 
$usermail = $row['useremail'];

        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 2;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'mail.comsip.org.mw';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'wkabango@comsip.org.mw';                 
            $mail->Password   = 'G08N6aXLN%Gu';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
        
            $mail->setFrom('wkabango@comsip.org.mw', 'Witney Kabango');           
            $mail->addAddress($usermail);
            
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'CIMIS User Status';
            $mail->Body    = 'Your CIMIS User Status has been Activated, You can now login to CIMIS on http://cimis.tech';
            
            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
// end here

//update status
         
    
        
    $sql = mysqli_query($link,"update users  SET ustatus = '1' where id = '$Rec_ID'");
            
    if ($sql) {
        echo '<script type="text/javascript">'; 
        echo 'alert("User Activated successfully !");'; 
        echo 'window.location.href = "sysadmin1.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
            
               
    ?>
    
