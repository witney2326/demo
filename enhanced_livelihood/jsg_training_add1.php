<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>YCS|Mapping</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

}
    
</head>

<div id="layout-wrapper">

    <?php
        include "layouts/config.php"; // Using database connection file here     
        
        if(isset($_POST['Submit']))
    {
        
    $jsg_id = $_POST['jsg_id'];
    $jsg_name = $_POST['jsg_name'];
    $groupid = $_POST['groupid'];
    $trainingtype = $_POST['trainingtype'];
    $trainedby = $_POST['trainedby'];
    $startdate = $_POST['startdate'];
    $finishdate = $_POST['finishdate'];
    $malesn = $_POST['malesn'];
    $femalesn = $_POST['femalesn'];
   

        $sql = "INSERT INTO tbljsg_trainings (jsgID,groupID,skillTypeID,StartDate,FinishDate,trainedBy,Males,Females)
        VALUES ('$jsg_id ','$groupid','$trainingtype','$startdate','$finishdate','$trainedby','$malesn','$femalesn')";
    if (mysqli_query($link, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("JSG Training Record has been added successfully !");'; 
        echo 'window.location.href = "jsg_training_check.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
    }
    mysqli_close($link);
    }
               
    ?>
    
</div>