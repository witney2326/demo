<?php
    include 'layouts/session.php';
    
    if (($_SESSION["user_role"] == '05')) {
        header("location: index_cw.php");     
    }
    if (($_SESSION["user_role"] == '04')) {
        header("location: index_dc.php");     
    }
    if (($_SESSION["user_role"] == '03')) {
        header("location: index_pc.php");     
    }
    if (($_SESSION["user_role"] == '02')) {
        header("location: index.php");     
    }
    if (($_SESSION["user_role"] == '01')) {
        header("location: index.php");     
    }
    if (($_SESSION["user_role"] == '00')) {
        header("location: index.php");     
    }
    if (($_SESSION["user_role"] == '06')) {
        header("location: index.php");     
    }
    if (($_SESSION["user_role"] == '07')) {
        header("location: index.php");     
    }
    if (($_SESSION["user_role"] == '08')) {
        header("location: index.php");     
    }
?>
