<?php
include_once '././../../layouts/config.php';

     
$id = $_GET['id'];

$sql = "Delete from tblacsademoplot where cluster = '$id'";
if ($link->query($sql) === TRUE) {

    echo '<script type="text/javascript">'; 
    echo 'alert("Demo Plot record deleted successfully !");'; 
    echo 'window.location.href = "basic_livelihood_acsa_mgt.php";';
    echo '</script>';

} else {
    echo "Error: " . $sql . ":-" . mysqli_error($link);
}
mysqli_close($link);

?>