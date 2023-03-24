<?php
include_once 'layouts/config.php';

     
$id = $_GET['id'];

$sql = "Delete from tblawareness_meetings where meetingID = '$id'";
if ($link->query($sql) === TRUE) {

    echo '<script type="text/javascript">'; 
    echo 'alert("Meeting record deleted successfully !");'; 
    echo 'window.location.href = "basic_livelihood_meetings.php";';
    echo '</script>';

} else {
    echo "Error: " . $sql . ":-" . mysqli_error($link);
}
mysqli_close($link);

?>