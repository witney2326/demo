<?php
  session_start();
  var_dump($_POST);

  $region = $_SESSION["user_reg"];
  $district = $_POST["district"];
  $ta = $_POST["ta"];
  $cw = $_POST["cw"];

  $_SESSION["region-9-10"] = $_SESSION["user_reg"];
  $_SESSION["district-9-10"] = $_POST["district"];
  $_SESSION["ta-9-10"] = $_POST["ta"];
  $_SESSION["cw-9-10"] = $_POST["cw"];

  header("location: basic_livelihood_slg_mgt_region_cood_filter4_results.php");
?>