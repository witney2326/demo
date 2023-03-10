<?php
include_once 'layouts/config.php';

     
$id = $_GET['id'];

$sql = "Delete from tbladoptplace where cluster = '$id'";
if ($link->query($sql) === TRUE) {

    echo '<script type="text/javascript">'; 
    echo 'alert("Adopted Place record deleted successfully !");'; 
    echo 'window.location.href = "basic_livelihood_CBDRA_adoptAPlace.php";';
    echo '</script>';

} else {
    echo "Error: " . $sql . ":-" . mysqli_error($link);
}
mysqli_close($link);

?>