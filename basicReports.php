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

        $result = mysqli_query($link, 'SELECT SUM(amount) AS recorded_savings FROM tblslg_member_savings'); 
        $row = mysqli_fetch_assoc($result); 
        $hh_savings = $row['recorded_savings'];

        $result = mysqli_query($link, 'SELECT SUM(Amount) AS grp_savings FROM tblgroupsavings'); 
        $row = mysqli_fetch_assoc($result); 
        $grp_savings = $row['grp_savings'];

        $result = mysqli_query($link, 'SELECT SUM(Males) AS males_trained FROM tblgrouptrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $males_trained = $row['males_trained'];

        $result = mysqli_query($link, 'SELECT SUM(Females) AS females_trained FROM tblgrouptrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $females_trained = $row['females_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(distinct sppCode) AS households_trained FROM tblmembertrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $households_trained = $row['households_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(clusterID) AS animators_trained FROM tblanimatortrainings'); 
        $row = mysqli_fetch_assoc($result); 
        $animators_trained = $row['animators_trained'];
        
        $result = mysqli_query($link, 'SELECT COUNT(TrainingID) AS animators_trained_acsa  FROM tblanimatortrainings where (TrainingTypeID = "13" and animatorType = "06")'); 
        $row = mysqli_fetch_assoc($result); 
        $animators_trained_acsa = $row['animators_trained_acsa'];

        $result = mysqli_query($link, 'SELECT COUNT(sppCode) AS members_trained_acsa  FROM tblmembertrainings where (TrainingTypeID = "13")'); 
        $row = mysqli_fetch_assoc($result); 
        $members_trained_acsa = $row['members_trained_acsa'];
        
        $result = mysqli_query($link, 'SELECT COUNT(TrainID) AS male_trainers_trained  FROM tbltottraining where (gender = "M")'); 
        $row = mysqli_fetch_assoc($result); 
        $male_trainers_trained = $row['male_trainers_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(TrainID) AS female_trainers_trained  FROM tbltottraining where (gender = "F")'); 
        $row = mysqli_fetch_assoc($result); 
        $female_trainers_trained = $row['female_trainers_trained'];

        $result = mysqli_query($link, 'SELECT COUNT(id) AS adopted_places  FROM tbladoptplace'); 
        $row = mysqli_fetch_assoc($result); 
        $adopted_places = $row['adopted_places'];

        $result = mysqli_query($link, 'SELECT COUNT(id) AS hotspots  FROM tblhotspot'); 
        $row = mysqli_fetch_assoc($result); 
        $hotspots = $row['hotspots'];

        $result = mysqli_query($link, 'SELECT COUNT(distinct groupID) AS esmps  FROM tblsafeguard_group_plans'); 
        $row = mysqli_fetch_assoc($result); 
        $esmps = $row['esmps'];

        $result = mysqli_query($link, 'SELECT COUNT( planID) AS esmps_with_issues  FROM tblsafeguard_group_plans where (achieved_date > finishdate)'); 
        $row = mysqli_fetch_assoc($result); 
        $esmps_with_issues = $row['esmps_with_issues'];


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
                                                <th scope="row">3</th>
                                                <td>Savings Mobilisation</td>
                                                <td>Savings and Loan Groups</td>
                                                <td><a href="basic_livelihood_savings_CW_summary_reports.php">Savings Summary per Case Worker</a></td>
                                                <td><?php echo 'MK'; echo number_format($grp_savings,2); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_savings_dis_summary_reports.php">SLG Savings Summary per District</a></td>
                                                <td><?php echo 'MK'; echo number_format($grp_savings,2); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_savings_nat_summary_reports.php">SLG Savings National Summary</a></td>
                                                <td><?php echo 'MK'; echo number_format($grp_savings,2); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td><a href="basic_livelihood_savings_members_reports.php">Household Recorded Savings District Summary</a></td>
                                                <td><?php echo 'MK'; echo number_format($hh_savings,2); ?></td>
                                                
                                            </tr>
                                            
                                            
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Training</td>
                                                <td>Savings and Loan Groups</td>
                                                <td><a href="basic_livelihood_SLG_training_reports.php">SLGs trained</a></td>
                                                <td><?php echo number_format($males_trained); echo ' males;'; echo" "; echo number_format($females_trained); echo ' females'; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td>Households Trained</td>
                                                <td><?php echo number_format($households_trained);  echo ' Household(s)';  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td>Animators Trained</td>
                                                <td><?php echo number_format($animators_trained);  echo ' Animators';  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td>Lead Farmers trained in ACSA</td>
                                                <td><?php echo number_format($animators_trained_acsa);  echo ' Lead Farmer(s)';  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td>Members Trained in ACSA</td>
                                                <td><?php echo number_format($members_trained_acsa);  echo ' Ordinary Member(s)';  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td>Trainer Of Trainer</td>
                                                <td>Trainers trained</td>female_trainers_trained
                                                <td><?php echo number_format($male_trainers_trained); echo" "; echo 'Male(s)'; echo "; "; echo number_format($female_trainers_trained); echo " "; echo 'Female(s)';?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Community Based Disaster Risk Awareness</td>
                                                <td>CBDRA</td>
                                                <td>Adopt a Place</td>
                                                <td><?php echo number_format($adopted_places);  echo ' Adopted Place(s)';  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td>Disaster Hotspots</td>
                                                <td><?php echo number_format($hotspots);  echo ' Hotspot(s)';  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Environmental and Social Safeguards</td>
                                                <td>ESMPs</td>
                                                <td>Safeguard Plans</td>
                                                <td><?php echo number_format($esmps);  echo ' ESMP(s)';  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td>Implimentation Progress</td>
                                                <td><?php echo number_format($esmps_with_issues);  echo ' ESMP(s) Out of Schedule';  ?></td>
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