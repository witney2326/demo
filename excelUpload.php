<?php


require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
include "layouts/config.php"; // Using database connection file here


if(isset($_POST['Submit'])){

  $mimes = ['application/vnd.ms-excel','text/csv','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());


    echo "You have total ".$totalSheet." sheets".


    $html="<table border='1'>";
    $html.="<tr><th>id</th><th>District</th><th>hhcode</th><th>hhname</th><th>hhname</th><th>savings</th><th>gc</th><th>Date</th></tr>";


    /* For Loop for all sheets */
    
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);

      
      
      foreach ($Reader as $Row)
      {
        foreach ($Reader as $i => $Row) {
          if ($i === 0) {
              continue;
          }
      
          // process $Row
      

                
        $id = isset($Row[0]) ? $Row[0] : '';
        $household_code = isset($Row[1]) ? $Row[1] : '';
        $household_name = isset($Row[2]) ? $Row[2] : '';
        $district = isset($Row[3]) ? $Row[3] : '';
        $savings_amount = isset($Row[4]) ? $Row[4] : '';
        $group_code = isset($Row[5]) ? $Row[5] : '';
        $date = isset($Row[6]) ? $Row[6] : '';
        $html.="<td>".$id."</td>";
        $html.="<td>".$household_code."</td>";
        $html.="<td>".$household_name."</td>";
        $html.="<td>".$district."</td>";
        $html.="<td>".$savings_amount."</td>";
        $html.="<td>".$group_code."</td>";
        $html.="<td>".$date."</td>";
        
        $query = "INSERT INTO tblhousehold_savings (id,household_code,household_name,district,savings_amount,group_code,date) 
			    VALUES ('".$id."','".$household_code."','".$household_name."','".$district."','".$savings_amount."', '".$group_code."', '".$date."')";



        $link->query($query);
       }
      }

    }


  }else { 
    die("<br/>No file selected or invalid file type. Only csv files are allowed."); 
  }


}


?>
<?php
header("Location: http://localhost/CIMIS/upload.php");
exit();
?>