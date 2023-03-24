<?php
include_once 'layouts/config.php';

     
$id = $_GET['id'];

$sql = "Delete from tblclinics where clinicID = '$id'";
if ($link->query($sql) === TRUE) {

    echo '<script type="text/javascript">'; 
    echo 'alert("Clinic deleted successfully !");'; 
    echo 'window.location.href = "basic_livelihood_psychosocial_clinics.php";';
    echo '</script>';

} else {
    echo "Error: " . $sql . ":-" . mysqli_error($link);
}
mysqli_close($link);

?>