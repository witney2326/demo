<?php  include "layouts/config.php"; ?>
<?php 
  $id = $_GET["id"];

  $sql = "DELETE FROM tblconstitution WHERE id='$id'";
  $result = $link->query($sql);

  if($result == TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {

  }
?>