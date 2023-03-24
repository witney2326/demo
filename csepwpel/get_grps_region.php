<?php
include('../layouts/config2.php');
if(!empty($_POST["region"])) 
{
 $id=$_POST['region'];
 

 $query="select * from tblgroup where ((regionID ='$id') and (deleted ='0'))";
    //Variable $link is declared inside config.php file & used here
    
    if ($result_set = $link_cs->query($query)) {
    while($row = $result_set->fetch_array(MYSQLI_ASSOC))
    { 
        $totalAdult =  $row["MembersM"]+ $row["MembersF"];
    echo "<tr>\n";
        
    
        echo "<td>".$row["groupID"]."</td>\n";
        echo "<td>".$row["groupname"]."</td>\n";
        echo "<td>".$row["cohort"]."</td>\n";
        
        
        echo "<td>".$row["MembersM"]."</td>\n";
        echo "<td>".$row["MembersF"]."</td>\n";
        echo "\t\t<td>$totalAdult</td>\n";

        
        echo "<td>
            <a href=\"basicSLGview.php?id=".$row['groupID']."\"><i class='far fa-eye' title='View SLG' style='font-size:18px'></i></a>
            <a href=\"basicSLGedit.php?id=".$row['groupID']."\"><i class='far fa-edit' title='Edit SLG Details' style='font-size:18px'></i></a>
            <a href=\"basicSLGsavings.php?id=".$row['groupID']."\"><i class='fas fa-hand-holding-usd' title='Add SLG Savings' style='font-size:18px'></i></a>
            <a href=\"basicSLGloans.php?id=".$row['groupID']."\"><i class='fas fa-book' title='Add SLG Loans' style='font-size:18px'></i></a> 
            <a href=\"basicSLG_iga.php?id=".$row['groupID']."\"><i class='fas fa-balance-scale' title='Add SLG IGAs' style='font-size:18px'></i></a> 
            <a href=\"basicSLGAddMember.php?id=".$row['groupID']."\"><i class='fas fa-user-alt' title='Add Beneficiary to SLG' style='font-size:18px'></i></a>     
            <a onClick=\"javascript: return confirm('Are You Sure You want To Delete This SLG - You Must Be a Supervisor');\" href=\"basicSLGdelete.php?id=".$row['groupID']."\"><i class='far fa-trash-alt' title='Delete SLG' style='font-size:18px;color:Red'></i></a>
        </td>\n";

    echo "</tr>\n";
    }
    $result_set->close();
    }  


}
?>