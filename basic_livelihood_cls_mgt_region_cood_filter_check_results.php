<?php
  session_start();
  // var_dump($_SESSION);
  // die();

  $region = $_SESSION["user_reg"];
  $district = $_POST["district"];
  $ta = $_POST["ta"];
  $cw = $_POST["cw"];

  $_SESSION["region-9-10"] = $_SESSION["user_reg"];
  $_SESSION["district-9-10"] = $_POST["district"];
  $_SESSION["ta-9-10"] = $_POST["ta"];
  $_SESSION["cw-9-10"] = $_POST["cw"];

  if(($_SESSION["region-9-10"] !== "00") && ($_SESSION["district-9-10"] !== "00") && ($_SESSION["ta-9-10"] !== "0000") && ($_SESSION["cw-9-10"] !== "00")){
    header("location: basic_livelihood_cls_mgt_region_cood_filter4_results.php");
  }
  else if(($_SESSION["region-9-10"] !== "00") && ($_SESSION["district-9-10"] !== "00") && ($_SESSION["ta-9-10"] !== "0000") && ($_SESSION["cw-9-10"] == "00")){
    header("location: basic_livelihood_cls_mgt_region_cood_filter3_results.php");
  }
  else if(($_SESSION["region-9-10"] !== "00") && ($_SESSION["district-9-10"] !== "00") && ($_SESSION["ta-9-10"] == "0000") && ($_SESSION["cw-9-10"] == "00")){
    header("location: basic_livelihood_cls_mgt_region_cood_filter2_results.php");
  }
  else if(($_SESSION["region-9-10"] !== "00") && ($_SESSION["district-9-10"] == "00") && ($_SESSION["ta-9-10"] == "0000") && ($_SESSION["cw-9-10"] == "00")){
    header("location: basic_livelihood_cls_mgt_region_cood_filter1_results.php");
  }
  else if(($_SESSION["region-9-10"] == "00") && ($_SESSION["district-9-10"] == "00") && ($_SESSION["ta-9-10"] == "0000") && ($_SESSION["cw-9-10"] == "")){
    header("location: basic_livelihood_cls_mgt_region_cood_filter_results.php");
  } 
?>