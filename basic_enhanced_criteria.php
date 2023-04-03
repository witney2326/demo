<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php header("Cache-Control: max-age=300, must-revalidate"); ?>
<?php 
 require 'assets/vendor/autoload.php';

 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 use PhpOffice\PhpSpreadsheet\Writer\Xls;
 use PhpOffice\PhpSpreadsheet\Writer\Csv;
?>
<head>
    <title>SLG Management</title>
    <?php include 'layouts/head.php';?>
    <?php include 'layouts/head-style.php';?>
    <?php include 'layouts/config.php';?>
<!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Datatable plugin CSS file -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  
  <!--jQuery library file -->
  <script type="text/javascript" 
      src="https://code.jquery.com/jquery-3.5.1.js">
  </script>

  <!--Datatable plugin JS library file -->
  <script type="text/javascript" 
src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
  </script>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'lib.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>
    

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div id="preloader" style="background:white;width:100%;height:100vh">
           
           <img class="loader-image" style="display:block;margin-left: auto;margin-right: auto;margin-top:200px;margin-bottom:auto;width:200px;" src="assets/images/spinner-5.gif" alt="Loading...">
           
        </div>
        <div class="page-content">
            <div class="container-fluid">
                 
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">LIST OF SAVINGS AND LOAN GROUPS</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">SLG Management</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div style="display:flex">
                    <div class="container">
                            <form method="post" action="excel.php">
                                <div style="display:flex;gap:10px">
                                    <div class="form-group">
                                        <select class="form-control" id="sel1" name="export_file_type" style="width:100px">
                                            <option value="xlsx">Xlsx</option>
                                            <option value="xls">Xls</option>
                                            <option value="csv">Csv</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="export_excel_btn" class="btn btn-primary">Excel</button>
                                </div>
                            </form>
                    </div>
                     
                    <?php 
                       if($_SESSION["user_role"] == "03"){ ?>
                          <div style="margin-bottom:20px">
                             <a href="basic_livelihood_slg_mgt_region_cood_filter_results.php"><button type="button" class="btn btn-primary">Back</button></a>
                          </div>
                       <?php } else if($_SESSION["user_role"] == "04"){ ?>
                        <div style="margin-bottom:20px">
                             <a href="basic_livelihood_slg_mgt_district_cood_filter_results.php"><button type="button" class="btn btn-primary">Back</button></a>
                          </div>
                       <?php } else if($_SESSION["user_role"] == "05"){ ?>
                        <div style="margin-bottom:20px">
                             <a href="basic_livelihood_slg_mgt_filter_cw_results.php"><button type="button" class="btn btn-primary">Back</button></a>
                          </div>
                       <?php }
                        else { ?>
                          <div style="margin-bottom:20px">
                             <a href="basic_livelihood_slg_mgt2.php"><button type="button" class="btn btn-primary">Back</button></a>
                          </div>
                       <?php } ?>
                    
                </div>
                
                
                <div class="row">
                    <div class="col-xl-12">
                    <div class="container">
                        <table class="table table-striped" id="myTable">
                            <thead>
                            <tr>
                                <th>Region</th>
                                <th>District</th>
                                <th>Ta</th>
                                <th>Group ID</th>
                                <th>Group Name</th>
                                <th>Scores</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $sql = "SELECT * FROM bl_el_criteria";
                              $result = $link->query($sql);
                            ?>
                            <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                // Start of score variables
                                $amount = $row["amount"];
                                
                                $members = $row["members"];
                                $group_records = $row["group_records"];
                                $functional_committees = $row["functional_committees"];
                                $constitution = $row["constitution"];
                                $esmps = $row["esmps"];
                                $on_sanitation = $row["on_sanitation"];
                                $on_businesses = $row["on_businesses"];
                                try{
                                    $average = $amount / $members;
                                } catch(DivisionByZeroError $e){

                                }
                                
                                
                                // End of score variables

                                // Start of score amount
                                $scoreAmount = "";
                                if($amount >= 1000000){
                                    $scoreAmount = 4;
                                } elseif($amount >= 500000 && $amount < 1000000){
                                    $scoreAmount = 2;
                                } else{
                                    $scoreAmount = 0;
                                }

                                // End of score variable
                                
                                // Start of score average
                                $scoreAverage = "";
                                if($average >= 20000){
                                    $scoreAverage = 4;
                                } elseif($average >= 8000 && $average < 20000){
                                    $scoreAverage = 2;
                                } else{
                                    $scoreAverage = 0;
                                }

                                // End of average score
                                
                                // Start of score members
                                $scoreMembers = "";
                                if($members >= 25){
                                    $scoreMembers = 2;
                                } else{
                                    $scoreMembers = 0;
                                }
                                // End of score members

                                // Start of score constitution
                                $scoreConstitution = "";
                                if($constitution >= 1){
                                    $scoreConstitution = 2;
                                } else{
                                    $scoreConstitution = 0;
                                }
                                // End of score constitution
                                
                                // Start of score committees
                                $scoreCommittees = "";
                                if($functional_committees >= 1){
                                    $scoreCommittees = 2;
                                } else{
                                    $scoreCommittees = 0;
                                }
                                // End of score committees

                                // Start of score records
                                $scoreRecords = "";
                                if($group_records >= 3){
                                    $scoreRecords = 4;
                                } elseif($group_records == 2){
                                    $scoreRecords = 2;
                                } else{
                                    $scoreRecords = 0;
                                }

                                // End of score records

                                // Start of score esmps
                                $scoreEsmps = "";
                                if($esmps >= 1){
                                    $scoreEsmps = 2;
                                } else{
                                    $scoreEsmps = 0;
                                }
                                // End of score esmps

                                // Start of score sanitation
                                $scoreSanitation = "";
                                try{
                                    $percentageSanitation = ((int)$on_sanitation / (int)$members) * 100;
                                } catch(DivisionByZeroError $e){

                                }
                                
                                if($percentageSanitation >= 80){
                                    $scoreSanitation = 4;
                                } elseif($percentageSanitation > 50 && $percentageSanitation < 80){
                                    $scoreSanitation = 2;
                                } else{
                                    $scoreSanitation = 0;
                                }
                                
                                // End of score sanitation

                                // Start of score business
                                $scoreBusiness = "";
                                try{
                                    $percentageBusiness = ((int)$on_businesses / (int)$members) * 100;
                                } catch(DivisionByZeroError $e){

                                }
                                
                                if($percentageBusiness >= 80){
                                    $scoreBusiness = 4;
                                } elseif($percentageBusiness > 50 && $percentageBusiness < 80){
                                    $scoreBusiness = 2;
                                } else{
                                    $scoreBusiness = 0;
                                }
                                // End of score business

                                // Start calculating total group scores
                                 $totalGroupScores = $scoreAmount + $scoreAverage + $scoreMembers + $scoreConstitution + $scoreCommittees + $scoreRecords + $scoreEsmps + $scoreSanitation + $scoreBusiness;
                                // End calculating total group scores
                                
                                ?>
                                <tr>
                                <td><?php echo $row["regionName"]; ?></td>
                                <td><?php echo $row["DistrictName"]; ?></td>
                                <td><?php echo $row["TAName"]; ?></td>
                                <td><?php echo $row["groupID"]; ?></td>
                                <td><?php echo $row["groupname"]; ?></td>
                                <td><?php echo $totalGroupScores;  ?></td>
                                <td>
                                    <?php 
                                       if($totalGroupScores >= 24){
                                          echo "<p style='color:green;'>Qualifies</p>";
                                       } elseif($totalGroupScores >=16 && $totalGroupScores <= 23){
                                        echo "<p style='color:#FFBF00;'>May be Considered</p>";
                                       } else{
                                        echo "<p style='color:red;'>Does not Qualify</p>";
                                       }
                                    ?>
                                </td>
                                <td><a href="set_bl_el_criteria.php?id=<?php echo $row["groupID"]; ?>">view</a></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <!-- Collapse -->
                
                <!-- end row -->
   
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<script>
    var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
        loader.style.display = "none";
    });
</script>

</body>

</html>