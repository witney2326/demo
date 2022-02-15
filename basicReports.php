<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Basic Reports | Basic Livelihood</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php   include 'layouts/menu.php'; 
            include 'layouts/config.php';
    
        $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS value_sum FROM tblbeneficiaries'); 
        $row = mysqli_fetch_assoc($result); 
        $hh_beneficiaries = $row['value_sum'];

        $result = mysqli_query($link, 'SELECT COUNT(groupID) AS grps FROM tblgroup WHERE deleted = 0'); 
        $row = mysqli_fetch_assoc($result); 
        $number_grps = $row['grps'];

        $result = mysqli_query($link, 'SELECT COUNT(ClusterID) AS clusters FROM tblcluster WHERE deleted = 0'); 
        $row = mysqli_fetch_assoc($result); 
        $number_cls = $row['clusters'];

        $result = mysqli_query($link, 'SELECT COUNT(meetingID) AS meetings FROM tblawareness_meetings'); 
        $row = mysqli_fetch_assoc($result); 
        $number_meetings = $row['meetings'];
    ?>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Basic Livelihood Reports</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="basic_livelihood.php">Basic Livelihood</a></li>
                                    <li class="breadcrumb-item active">Basic Livelihood Reports</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>S/N</th>
                                                <th>Report Category</th>
                                                <th>Report Subcategory</th>
                                                <th>Report Detail</th>
                                                <th>Statistics</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Sensitization and Awareness</td>
                                                <td>Programme</td>
                                                <td><a href="basic_livelihood_sensitization_reports.php">Sensitization reports</a></td>
                                                <td><?php echo number_format($number_meetings); ?> Meeting(s)</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Group Mobilisation</td>
                                                <td>Savings and Loan Groups</td>
                                                <td><a href="basic_livelihood_SLG_reports1.php">Savings and Loan Groups mobilised</a></td>
                                                <td><?php echo number_format($number_grps); ?> SLGs</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_HH_CW_reports.php">SLGs Mobilised Per Case Worker Summary</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_HH_Dis_reports.php">SLGs Mobilised Per District Summary</a></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_HH_Nat_reports.php">SLGs National Summary</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_CLS_reports1.php">Clusters mobilised</a></td>
                                                <td><?php echo number_format($number_cls); ?> Cluster(s)</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_CLS_Summary_reports.php">Clusters mobilised Summary CW</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href=".php">Clusters mobilised Summary National</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_HH_Ben_reports.php">Households mobilised</a></td>
                                                <td><?php echo number_format($hh_beneficiaries); ?> Household(s)</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Savings Mobilisation</td>
                                                <td>Savings and Loan Groups</td>
                                                <td><a href="basic_livelihood_savings_CW_summary_reports.php">Savings Summary per Case Worker</a></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_savings_dis_summary_reports.php">SLG Savings Summary per District</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_savings_nat_summary_reports.php">SLG Savings National Summary</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td></td>
                                                <td></td>
                                                <td>Member Savings</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td></td>
                                                <td></td>
                                                <td>Cluster Savings</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Income Generating Activities</td>
                                                <td>Savings and Loan Groups</td>
                                                <td>Group IGAs</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td></td>
                                                <td></td>
                                                <td>Household IGAs</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td></td>
                                                <td></td>
                                                <td>Common Household IGAs</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11</th>
                                                <td>Training</td>
                                                <td>Savings and Loan Groups</td>
                                                <td>SLGs Trained</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12</th>
                                                <td></td>
                                                <td></td>
                                                <td>Members Trained</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">13</th>
                                                <td></td>
                                                <td></td>
                                                <td>Animators Trained</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">14</th>
                                                <td></td>
                                                <td></td>
                                                <td>Lead Farmers trained in ACSA</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">15</th>
                                                <td></td>
                                                <td></td>
                                                <td>Members Trained in ACSA</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">16</th>
                                                <td></td>
                                                <td>Trainer Of Trainer</td>
                                                <td>Trainers trained</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">17</th>
                                                <td>Community Based Disaster Risk Awareness</td>
                                                <td>CBDRA</td>
                                                <td>Adopt a Place</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">18</th>
                                                <td></td>
                                                <td></td>
                                                <td>Disaster Hotspots</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">19</th>
                                                <td>Environmental and Social Safeguards</td>
                                                <td>ESMPs</td>
                                                <td>Safeguard Plans</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">20</th>
                                                <td></td>
                                                <td></td>
                                                <td>Implimentation Progress</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    
                </div>
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

<script src="assets/js/app.js"></script>

</body>

</html>