<?php
    
    function dis_code($link_cs, $disname)
    {
        $dis_query = mysqli_query($link_cs,"select DistrictID from tbldistrict where DistrictName='$disname'"); // select query
        $dis = mysqli_fetch_array($dis_query);
        return $dis['DistrictID'];
    }

    function r_code($link_cs, $rname)
    {
        $rg_query = mysqli_query($link_cs,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);
        return $rg['regionID'];
    }

    function dis_name($link_cs, $disID)
    {
        $dis_query = mysqli_query($link_cs,"select DistrictName from tbldistrict where DistrictID='$disID'"); // select query
        $dis = mysqli_fetch_array($dis_query);
        return $dis['DistrictName'];
    }

    function cls_name($link_cs, $clID)
    {
        $rg_query = mysqli_query($link_cs,"select ClusterName from tblcluster where ClusterID='$clID'"); // select query
        $rg = mysqli_fetch_array($rg_query);
        return $rg['ClusterName'];
    }
    function grp_name($link_cs, $clID)
    {
        $rg_query = mysqli_query($link_cs,"select groupname from tblgroup where groupID='$clID'"); // select query
        $rg = mysqli_fetch_array($rg_query);
        return $rg['groupname'];
    }
    function jsg_name($link_cs, $jsgID)
    {
        $rg_query = mysqli_query($link_cs,"select jsg_name from tbljsg where recID='$jsgID'"); // select query
        $rg = mysqli_fetch_array($rg_query);
        return $rg['jsg_name'];
    }

    function r_name($link_cs, $rcode)
    {
        $rg_query = mysqli_query($link_cs,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
    }

    function tname($link_cs, $tcode)
    {
        $rg_query = mysqli_query($link_cs,"select TAName from tblta where TAID='$tcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAName'];
    }

    function bdsname($link_cs, $bdscode)
    {
        $rg_query = mysqli_query($link_cs,"select bdsname from tblbds where bdsID='$bdscode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['bdsname'];
    }

    function tcode($link_cs, $tname)
    {
        $rg_query = mysqli_query($link_cs,"select TAID from tblta where TAName='$tname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['TAID'];
    }

    function get_rname($link_cs, $rcode)
        {
        $rg_query = mysqli_query($link_cs,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
    }

    function iga_name($link_cs, $igaID)
         {
         $iga_query = mysqli_query($link_cs,"select name from tbliga_types where ID='$igaID'"); // select query
         $iga = mysqli_fetch_array($iga_query);// fetch data
         return $iga['name'];
         }

    function iga_type($link_cs, $name)
         {
         $iga_query = mysqli_query($link_cs,"select ID from tbliga_types where name='$name'"); // select query
         $iga = mysqli_fetch_array($iga_query);// fetch data
         return $iga['ID'];
         }
    
    function ta_name($link_cs, $taID)
        {
        $ta_query = mysqli_query($link_cs,"select TAName from tblta where TAID='$taID'"); // select query
        $taname = mysqli_fetch_array($ta_query);// fetch data
        return $taname['TAName'];
    }
    
        function prog_name($link_cs, $progID)
        {
        $prog_query = mysqli_query($link_cs,"select progName from tblspp where progID='$progID'"); // select query
        $prog = mysqli_fetch_array($prog_query);// fetch data
        return $prog['progName'];
        }

        
        function bus_cat_name($link_cs, $catID)
        {
        $cat_query = mysqli_query($link_cs,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $cat = mysqli_fetch_array($cat_query);// fetch data
        return $cat['catname'];
        }

         function clsname($link_cs, $clscode)
         {
         $rg_query = mysqli_query($link_cs,"select ClusterName from tblcluster where ClusterID='$clscode'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['ClusterName'];
         }

         function purpose_name($link_cs, $purposeid)
         {
         $rg_query = mysqli_query($link_cs,"select purpose from tbladoptplacepurpose where id='$purposeid'"); // select query
         $rg = mysqli_fetch_array($rg_query);// fetch data
         return $rg['purpose'];
         }

         function cluster_name($link_cs, $clsID)
        {
        $grp_query = mysqli_query($link_cs,"select clustername from tblcluster where clusterID='$clsID'"); // select query
        $grp = mysqli_fetch_array($grp_query);// fetch data
        return $grp['clustername'];
        }

        function region_code($link_cs, $rname)
        {
        $rg_query = mysqli_query($link_cs,"select regionID from tblregion where name='$rname'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['regionID'];
        }

        function rname($link_cs, $rcode)
        {
        $rg_query = mysqli_query($link_cs,"select name from tblregion where regionID='$rcode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }

        function cat_name($link_cs, $catID)
        {
        $cat_query = mysqli_query($link_cs,"select catname from tblbusines_category where categoryID='$catID'"); // select query
        $cat = mysqli_fetch_array($cat_query);// fetch data
        return $cat['catname'];
        }

        function activity_name($link_cs, $activityID)
        {
        $act_query = mysqli_query($link_cs,"select action from tblsafeguards_mitigation_activity where activityID='$activityID'"); // select query
        $act = mysqli_fetch_array($act_query);// fetch data
        return $act['action'];
        }

        function indicator_name($link_cs, $indicatorID)
        {
        $indi_query = mysqli_query($link_cs,"select indicator from tblsafeguard_indicators where indicatorID='$indicatorID'"); // select query
        $indi = mysqli_fetch_array($indi_query);// fetch data
        return $indi['indicator'];
        }

        function user_position($link_cs, $roleID)
        {
        $role_query = mysqli_query($link_cs,"select rolename as position from userroles where roleid='$roleID'"); // select query
        $position = mysqli_fetch_array($role_query);// fetch data
        return $position['position'];
        }

        function BusCat($link_cs, $typeID)
        {
        $BusCat_query = mysqli_query($link_cs,"select categoryID from tbliga_types where ID='$typeID'"); // select query
        $BusCat = mysqli_fetch_array($BusCat_query);// fetch data
        return $BusCat['categoryID'];
        }
        
        function slg_name($link_cs, $ID)
        {
        $ta_query = mysqli_query($link_cs,"select groupname from tblgroup where groupID='$ID'"); // select query
        $prog = mysqli_fetch_array($ta_query);// fetch data
        return $prog['groupname'];
        }
        function cw_name($link_cs, $cwcode)
        {
        $cw_query = mysqli_query($link_cs,"select cwName from tblcw where cwID='$cwcode'"); // select query
        $cwname = mysqli_fetch_array($cw_query);// fetch data
        return $cwname['cwName'];
        }
        function training_type($link_cs, $trcode)
        {
        $cw_query = mysqli_query($link_cs,"select training_name from tbltraining_types where trainingTypeID='$trcode'"); // select query
        $trname = mysqli_fetch_array($cw_query);// fetch data
        return $trname['training_name'];
        }
        function tr_facilitator($link_cs, $fcode)
        {
        $cw_query = mysqli_query($link_cs,"select title from tblfacilitator where facilitatorID='$fcode'"); // select query
        $fac = mysqli_fetch_array($cw_query);// fetch data
        return $fac['title'];
        }

        function issue_name($link, $icode)
        {
        $rg_query = mysqli_query($link,"select name from tblissues where id='$icode'"); // select query
        $rg = mysqli_fetch_array($rg_query);// fetch data
        return $rg['name'];
        }
    
        function demo_plot_found($link, $clsID)
        {
        $place_query = mysqli_query($link,"select id from tblacsademoplot where cluster='$clsID'"); // select query
        $place = mysqli_fetch_array($place_query);// fetch data
        return $place['id'];
        }

        function lf_found($link, $clsID)
        {
        $place_query = mysqli_query($link,"select TrainingID from tblanimatortrainings where (clusterID='$clsID' and animatorType ='06')"); // select query
        $lf = mysqli_fetch_array($place_query);// fetch data
        return $lf['TrainingID'];
        }

        function s_name($link_cs, $scode)
        {
        $sector_query = mysqli_query($link_cs,"select name from tblsector where id='$scode'"); // select query
        $dis = mysqli_fetch_array($sector_query);// fetch data
        return $dis['name'];
    }

    ?>
    
</div>