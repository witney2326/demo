
<?php require_once "layouts/config.php" ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Comsip Cooperative Union Limited" />
    <meta property="og:title" content="Comsip..." />
    <meta property="og:description" content="Comsip..." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://" />
    <meta property="og:url" content="https://comsip.com" />
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css3/normalize3.css" />
    <link rel="stylesheet" href="assets/css3/styles3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #dashboard-summary-items {
            width: 100%;
            height: 400px;
            white-space: nowrap;
            overflow-x: auto;
            width: calc(40px * 3);
            height: 100%;
            overflow: hidden; /* or any clear-fix snippet */
        }

        .dashboard-summary-card {
            display: inline-block;
            width: 400px;
            height: 100%;
            background-color: pink;
        }
        .dashboard-summary-card2 {
            display: inline-block;
            width: 400px;
            height: 100%;
            background-color: gray;
        }
        .dashboard-summary-card3 {
            display: inline-block;
            width: 400px;
            height: 100%;
            background-color: yellowgreen;
        }

        .dashboard-summary-card4 {
            display: inline-block;
            width: 400px;
            height: 100%;
            background-color: blueviolet;
        }
        
        h1 {text-align: center;}
        h2 {text-align: center;}
        h2 {color: blue;}
        h3 {text-align: center;}
        p {text-align: center;}
        p {color:default;}

        

    </style>
</head>

<body style="background:#f6f4ff">
    <nav class="top-navigation-dashboard-nav">
        <h1 class="company-label">COMSIP Intergrated Management Information System (CIMIS)</h1>
        <a href="index.php">
            <!-- <li class="top-navigation-dashboard-list">Website</li> -->
        </a>
    </nav>

    <!-- Dashboard Summary Section -->
    <div class="mySlides">
        <div class="dashboard-summary-section">
            <section class="cimis-dashboard-1" id="cimis-dashboard-1">
                <!-- <div class="dashboard-heading-title">CIMIS DASHBOARD</div> -->

                <h2 class="dashboard-summary-label">Livelihoods Intervention Summary</h2>
                <!-- -->
                <div class="dashboard-summary-items">
                    <?php
                    $sql = "SELECT COUNT(sppCode) AS count FROM tblbeneficiaries";
                    $result = $link->query($sql);
                    ?>

                        <div class="dashboard-summary-card">
                            
                            <div><h3 class="dashboard-summary-label">Households Reached</h3></div>
                            <?php if ($result->num_rows > 0) ?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <p class="dashboard-summary-number"><?php echo number_format($row["count"]) ?></p>
                            <?php } ?>
                            <?php if ($result->num_rows == 0) { ?>
                                <p class="dashboard-summary-number">0</p>
                            <?php } ?>
                        </div>

                        

                        <div class="dashboard-summary-card">
                            <?php
                            $sql1 = "SELECT COUNT(recID) AS count FROM tbljsg";
                            $result1 = $link->query($sql1);
                            ?>
                            
                            <h3 class="dashboard-summary-label">Joint Skill Groups</h3>
                            <?php if ($result1->num_rows > 0) ?>
                            <?php while ($row1 = $result1->fetch_assoc()) { ?>
                                <p class="dashboard-summary-number"><?php echo number_format($row1["count"]) ?></p>
                            <?php } ?>
                            <?php if ($result1->num_rows == 0) { ?>
                                <p class="dashboard-summary-number">0</p>
                            <?php } ?>
                        </div>
                        
                    <div class="dashboard-summary-card">
                        <?php
                        $sql3 = 'SELECT COUNT(groupID) AS count FROM tblgroup WHERE grad_status="1"';
                        $result3 = $link->query($sql3);
                        $row3 = $result3->fetch_assoc();

                        $sql4 = 'SELECT COUNT(ClusterID) AS count FROM tblcluster WHERE grad_status="1"';
                        $result4 = $link->query($sql4);
                        $row4 = $result4->fetch_assoc();
                        ?>
                        
                        <h3 class="dashboard-summary-label">SLGs In Graduation</h3>
                        <?php if ($result3->num_rows > 0 || $result4->num_rows > 0) ?>

                        <p class="dashboard-summary-number"><?php echo number_format($row3["count"] + $row4["count"]) ?></p>

                        <?php if ($result3->num_rows == 0 && $result4->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                    <div class="dashboard-summary-card2">
                        <?php
                        $sql5 = 'SELECT COUNT(groupID) AS count FROM tblgroup WHERE deleted = 0';
                        $result5 = $link->query($sql5);
                        ?>
                        
                        <h3 class="dashboard-summary-label">SLGs Formed</h3>
                        <?php if ($result5->num_rows > 0) ?>
                        <?php while ($row5 = $result5->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row5["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result5->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>


                    <div class="dashboard-summary-card2">
                        <?php
                        $sql2 = "SELECT COUNT(recID) AS count FROM tblycs";
                        $result2 = $link->query($sql2);
                        ?>
                        
                        <h3 class="dashboard-summary-label">Youths Linked</h3>
                        <?php if ($result2->num_rows > 0) ?>
                        <?php while ($row2 = $result2->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row2["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result2->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                    

                    <div class="dashboard-summary-card2">
                        <?php
                        $sql8 = 'SELECT COUNT(sppCode) AS count FROM tblbeneficiaries WHERE grad_status ="1"';
                        $result8 = $link->query($sql8);
                        ?>
                        
                        <h3 class="dashboard-summary-label">Graduating Households</h3>
                        <?php if ($result8->num_rows > 0) ?>
                        <?php while ($row8 = $result8->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row8["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result8->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                    

                    <div class="dashboard-summary-card3">
                        <?php
                        $sql_1 = 'SELECT COUNT(groupID) AS count FROM tblgroup where deleted = "0"';
                        $result7 = $link->query($sql_1);
                        ?>
                        
                        <h3 class="dashboard-summary-label">SLGs Trained</h3>
                        <?php if ($result7->num_rows > 0) ?>
                        <?php while ($row7 = $result7->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row7["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result7->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                    
                    <div class="dashboard-summary-card3">
                        <?php
                        $sql_1 = 'SELECT COUNT(groupID) AS count FROM tblgroup where deleted = "0"';
                        $result7 = $link->query($sql_1);
                        ?>
                        
                        <h3 class="dashboard-summary-label">Youths IGPs</h3>
                        <?php if ($result7->num_rows > 0) ?>
                        <?php while ($row7 = $result7->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row7["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result7->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                    

                    <div class="dashboard-summary-card3">
                        <?php
                        $sql7 = 'SELECT COUNT(groupID) AS count FROM tblgroup where vc_status = "1"';
                        $result7 = $link->query($sql7);
                        ?>
                        
                        <h3 class="dashboard-summary-label">SLGs in Production VC</h3>
                        <?php if ($result7->num_rows > 0) ?>
                        <?php while ($row7 = $result7->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row7["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result7->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                    <div class="dashboard-summary-card4">
                        <?php
                        $sql7 = 'SELECT COUNT(groupID) AS count FROM tblgroup where vc_status = "1"';
                        $result7 = $link->query($sql7);
                        ?>
                        
                        <h3 class="dashboard-summary-label">ESMP Submitted</h3>
                        <?php if ($result7->num_rows > 0) ?>
                        <?php while ($row7 = $result7->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row7["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result7->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card4">
                        <?php
                        $sql8 = 'SELECT COUNT(sppCode) AS count FROM tblbeneficiaries WHERE grad_status ="1"';
                        $result8 = $link->query($sql8);
                        ?>
                        
                        <h3 class="dashboard-summary-label">SLGs With Business Plans</h3>
                        <?php if ($result8->num_rows > 0) ?>
                        <?php while ($row8 = $result8->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row8["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result8->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                    <div class="dashboard-summary-card4">
                        <?php
                        $sql6 = 'SELECT COUNT(groupID) AS count FROM tblgroup WHERE registered_group = "1"';
                        $result6 = $link->query($sql6);
                        ?>
                        
                        <h3 class="dashboard-summary-label">SLGs Registered as Coops</h3>
                        <?php if ($result6->num_rows > 0) ?>
                        <?php while ($row6 = $result6->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row6["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result6->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- End of Dashboard Summary -->

    <!-- Dashboard Charts -->
    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title"></div>

            <div class="one-column">
                <?php
                $sql9 = 'SELECT COUNT(groupID) AS count FROM tblgroup';
                $result9 = $link->query($sql9);
                ?>
                <div class="dashboard-charts-card">
                    <?php if ($result9->num_rows > 0) ?>
                    <?php while ($row9 = $result9->fetch_assoc()) { ?>
                        
                    <?php } ?>
                    <?php if ($result9->num_rows == 0) { ?>
                        
                    <?php } ?>

                    <h2 class="chart-heading-title">Savings and Loan Groups Per District</h2>

                    <?php
                    $sql10 = 'SELECT d.DistrictName AS district_name, COUNT(g.groupID) AS groups FROM  tblgroup g, tbldistrict d WHERE d.DistrictID = g.DistrictID GROUP BY g.DistrictID';
                    $result10 = $link->query($sql10);
                    ?>

                    <?php $json_array_districts = array(); ?>
                    <?php $json_array_groups = array(); ?>

                    <?php if ($result10->num_rows > 0) ?>
                    <?php while ($row10 = $result10->fetch_assoc()) { ?>
                        <?php $json_array_districts[] = $row10["district_name"]; ?>
                        <?php $json_array_groups[] = $row10["groups"]; ?>
                    <?php } ?>
                    <div class="chart-content">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title"></div>

            <div class="one-column">
                <div class="dashboard-charts-card">
                    <?php
                    $sql11 = 'SELECT SUM(Amount) AS sum FROM  tblgroupsavings';
                    $result11 = $link->query($sql11);
                    ?>

                    <h2 class="chart-heading-title">Groups Savings</h2>

                    <?php if ($result11->num_rows > 0) ?>
                    <?php while ($row11 = $result11->fetch_assoc()) { ?>
                        
                    <?php } ?>
                    <?php if ($result11->num_rows == 0) { ?>
                        
                    <?php } ?>

                    
                    <?php
                    $sql12 = "SELECT d.DistrictName AS district_name, SUM(gs.Amount) AS group_savings FROM tblgroupsavings gs, tbldistrict d WHERE d.DistrictID = gs.DistrictID GROUP BY(gs.DistrictID)";
                    $result12 = $link->query($sql12);
                    ?>

                    <?php $json_array_districts2 = array(); ?>
                    <?php $json_array_group_savings2 = array(); ?>

                    <?php if ($result12->num_rows > 0) ?>
                    <?php while ($row12 = $result12->fetch_assoc()) { ?>
                        <?php $json_array_districts2[] = $row12["district_name"]; ?>
                        <?php $json_array_group_savings2[] = $row12["group_savings"]; ?>
                    <?php } ?>
                    <div class="chart-content">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title"></div>

            <div class="one-column">
                <?php
                $sql3 = 'SELECT SUM(amount) AS sum FROM  tblslg_member_savings';
                $result13 = $link->query($sql3);
                ?>
                <div class="dashboard-charts-card">
                    <?php if ($result13->num_rows > 0) ?>
                    <?php while ($row13 = $result13->fetch_assoc()) { ?>
                        
                    <?php } ?>
                    <?php if ($result13->num_rows == 0) { ?>
                        
                    <?php } ?>

                    <h2 class="chart-heading-title">Member Savings</h2>

                    <?php
                    $sql13 = 'SELECT d.DistrictName AS district_name, SUM(ms.amount) AS member_savings FROM tbldistrict d, tblslg_member_savings ms WHERE ms.districtID = d.DistrictID GROUP BY(ms.districtID)';
                    $result13 = $link->query($sql13);
                    ?>

                    <?php $json_array_districts3 = array(); ?>
                    <?php $json_array_member_savings3 = array(); ?>

                    <?php if ($result13->num_rows > 0) ?>
                    <?php while ($row13 = $result13->fetch_assoc()) { ?>
                        <?php $json_array_districts3[] = $row13["district_name"]; ?>
                        <?php $json_array_member_savings3[] = $row13["member_savings"]; ?>
                    <?php } ?>
                    <div class="chart-content">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title"></div>

            <div class="one-column">
                <?php
                $sql14 = 'SELECT SUM(Amount) AS sum FROM  tblgroupsavings';
                $result14 = $link->query($sql14);
                ?>
                <div class="dashboard-charts-card">
                    <?php if ($result14->num_rows > 0) ?>
                    <?php while ($row14 = $result14->fetch_assoc()) { ?>
                        
                    <?php } ?>
                    <?php if ($result14->num_rows == 0) { ?>
                        
                    <?php } ?>

                    <h2 class="chart-heading-title">Groups Savings Per Year</h2>

                    <?php
                    $sql15 = 'SELECT Yr AS year, SUM(Amount) AS sum FROM tblgroupsavings  GROUP BY(Yr)';
                    $result15 = $link->query($sql15);
                    ?>

                    <?php $json_array_years4 = array(); ?>
                    <?php $json_array_group_savings4 = array(); ?>

                    <?php if ($result15->num_rows > 0) ?>
                    <?php while ($row15 = $result15->fetch_assoc()) { ?>
                        <?php $json_array_years4[] = $row15["year"]; ?>
                        <?php $json_array_group_savings4[] = $row15["sum"]; ?>
                    <?php } ?>
                    <div class="chart-content">
                        <canvas id="myChart4"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title"></div>

            <div class="one-column">
                <?php
                $sql16 = 'SELECT COUNT(sppCode) AS count FROM  tblbeneficiaries';
                $result16 = $link->query($sql16);
                ?>
                <div class="dashboard-charts-card">
                    <div class="two-column-grid">
                        <div>
                            <?php if ($result16->num_rows > 0) ?>
                            <?php while ($row16 = $result16->fetch_assoc()) { ?>
                                
                            <?php } ?>

                            <?php if ($result16->num_rows == 0) { ?>
                                
                            <?php } ?>

                            <?php
                            $sql17 = 'SELECT d.DistrictName AS district_name, COUNT(b.sppCode) AS count FROM  tblbeneficiaries b, tbldistrict d WHERE d.DistrictID = b.districtID GROUP BY(b.districtID)';
                            $result17 = $link->query($sql17);
                            ?>

                            <div class="line-chart-details-grid">
                                <?php
                                while ($row17 = $result17->fetch_assoc()) { ?>

                                    <div class="line-details-card">
                                        <p class="district-name-label">
                                            
                                        </p>
                                        <p class="households-value">
                                            
                                        </p>
                                    </div>

                                <?php } ?>
                            </div>

                        </div>

                        <div>
                            <h2 class="chart-heading-title">Actual Households </h2>

                            <?php
                            $sql17 = 'SELECT d.DistrictName AS district_name, COUNT(b.sppCode) AS count FROM  tblbeneficiaries b, tbldistrict d WHERE d.DistrictID = b.districtID GROUP BY(b.districtID)';
                            $result17 = $link->query($sql17);
                            ?>

                            <?php $json_array_districts5 = array(); ?>
                            <?php $json_array_groups5 = array(); ?>

                            <?php if ($result17->num_rows > 0) ?>
                            <?php while ($row17 = $result17->fetch_assoc()) { ?>
                                <?php $json_array_districts5[] = $row17["district_name"]; ?>
                                <?php $json_array_groups5[] = $row17["count"]; ?>
                            <?php } ?>
                            <div class="">
                                <canvas id="myChart5" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title"></div>

            <div class="one-column">
                <?php
                $sql18 = 'SELECT SUM(MembersM)+SUM(MembersF) AS sum FROM  tblgroup where deleted ="0"';
                $result18 = $link->query($sql18);
                ?>
                <div class="dashboard-charts-card">
                    <div class="row">
                        <div>
                            <?php if ($result18->num_rows > 0) ?>
                            <?php while ($row18 = $result18->fetch_assoc()) { ?>
                                <h2><label for="" class="summary-figure">Expected Household Distribution (BL): <?php echo number_format($row18["sum"]) ?></label></h2>
                            <?php } ?>

                            <?php if ($result18->num_rows == 0) { ?>
                               <h2> <label for="" class="summary-figure">Expected Household Distribution (BL): 0</label></h2>
                            <?php } ?>

                            <?php
                            $sql19 = 'SELECT d.DistrictName AS district_name, SUM(g.MembersM)+SUM(g.MembersF) AS sum FROM  tblgroup g, tbldistrict d WHERE d.DistrictID = g.DistrictID GROUP BY(g.DistrictID)';
                            $result19 = $link->query($sql19);
                            ?>

                            
                            

                        </div>

                        <div>
                            <?php
                            $sql19 = 'SELECT d.DistrictName AS district_name, SUM(g.MembersM)+SUM(g.MembersF) AS sum FROM  tblgroup g, tbldistrict d WHERE d.DistrictID = g.DistrictID GROUP BY(g.DistrictID)';
                            $result19 = $link->query($sql19);
                            ?>

                            <?php $json_array_districts6 = array(); ?>
                            <?php $json_array_membership6 = array(); ?>

                            <?php if ($result19->num_rows > 0) ?>
                            <?php while ($row19 = $result19->fetch_assoc()) { ?>
                                <?php $json_array_districts6[] = $row19["district_name"]; ?>
                                <?php $json_array_membership6[] = $row19["sum"]; ?>
                            <?php } ?>
                            <div class="">
                                <canvas id="myChart6" height="450"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End of Dashboard Charts -->

    <!-- Basic Livelihood Summary -->
    <div class="mySlides">
        <div class="dashboard-summary-section" id="dashboard-summary-section">
            <section class="cimis-dashboard-1" id="cimis-dashboard-1">
                <div class="dashboard-heading-title">BASIC LIVELIHOOD STATISTICS</div>

                <div class="dashboard-summary-items">
                    <?php
                    $sql21 = "SELECT COUNT(sppCode) AS count FROM tblbeneficiaries";
                    $result21 = $link->query($sql21);
                    ?>
                    <div class="dashboard-summary-card">
                        <i class="fa fa-home dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">Enrolled Households</h4>
                        <?php if ($result21->num_rows > 0) ?>
                        <?php while ($row21 = $result21->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row21["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result21->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <?php
                        $sql22 = 'SELECT COUNT(groupID) AS count FROM tblgroup WHERE deleted = 0';
                        $result22 = $link->query($sql22);
                        ?>
                        <i class="fa fa-object-group dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">SLGs Formed</h4>
                        <?php if ($result22->num_rows > 0) ?>
                        <?php while ($row22 = $result22->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row22["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result22->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <?php
                        $sql23 = "SELECT COUNT(groupID) AS count FROM tblgrouptrainings";
                        $result23 = $link->query($sql23);
                        ?>
                        <i class="fa fa-users dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">SLGs Trained</h4>
                        <?php if ($result23->num_rows > 0) ?>
                        <?php while ($row23 = $result23->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row23["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result23->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <?php
                        $sql24 = 'SELECT COUNT(sppCode) AS count FROM tblbeneficiaries WHERE prog_status_verified = 1';
                        $result24 = $link->query($sql24);
                        $row24 = $result24->fetch_assoc();
                        ?>
                        <i class="fa fa-graduation-cap dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">SCT/PWP Verified Households</h4>
                        <?php if ($result24->num_rows > 0) ?>

                        <p class="dashboard-summary-number"><?php echo number_format($row24["count"]) ?></p>

                        <?php if ($result24->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- End of Basic Livelihood  Summary -->

    <!-- Basic Livelihood Charts -->
    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title">BASIC LIVELIHOOD STATISTICS</div>

            <div class="one-column">
                <div class="dashboard-charts-card">
                    <label for="" class="summary-figure">CBDRA Adopted Places Per District</label>

                    <div>
                        <?php
                        $sql25 = 'SELECT d.DistrictName AS district_name, COUNT(ap.planID) AS adopted_places FROM  tblsafeguard_group_plans ap, tbldistrict d WHERE d.DistrictID = ap.districtID GROUP BY(ap.districtID)';
                        $result25 = $link->query($sql25);
                        ?>

                        <?php $json_array_districts25 = array(); ?>
                        <?php $json_array_adopted_places25 = array(); ?>

                        <?php if ($result25->num_rows > 0) ?>
                        <?php while ($row25 = $result25->fetch_assoc()) { ?>
                            <?php $json_array_districts25[] = $row25["district_name"]; ?>
                            <?php $json_array_adopted_places25[] = $row25["adopted_places"]; ?>
                        <?php } ?>
                        <div class="">
                            <canvas id="myChart7" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <div class="mySlides">
        <section class="cimis-dashboard-2" id="cimis-dashboard-2">
            <div class="dashboard-heading-title">BASIC LIVELIHOOD STATISTICS</div>

            <div class="one-column">
                <div class="dashboard-charts-card">
                    <label for="" class="summary-figure">Savings Mobilisation</label>

                    <div>
                        <?php
                        $sql26 = 'SELECT SUM(Amount) AS sum, Yr AS year FROM tblgroupsavings  GROUP BY(Yr)';
                        $result26 = $link->query($sql26);
                        ?>

                        <?php $json_array_years26 = array(); ?>
                        <?php $json_array_sum26 = array(); ?>

                        <?php if ($result26->num_rows > 0) ?>
                        <?php while ($row26 = $result26->fetch_assoc()) { ?>
                            <?php $json_array_years26[] = $row26["year"]; ?>
                            <?php $json_array_sum26[] = $row26["sum"]; ?>
                        <?php } ?>
                        <div class="">
                            <canvas id="myChart8" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <!-- End of Basic Livelihood Charts -->

    <!-- Enhanced Livelihood Stats -->
    <div class="mySlides">
        <div class="dashboard-summary-section" id="dashboard-summary-section">
            <section class="cimis-dashboard-1" id="cimis-dashboard-1">
                <div class="dashboard-heading-title">ENHANCED LIVELIHOOD STATISTICS</div>

                <div class="dashboard-summary-items">
                    <?php
                    $sql27 = "SELECT COUNT(hh_code) AS count FROM tblycs";
                    $result27 = $link->query($sql27);
                    ?>
                    <div class="dashboard-summary-card">
                        <i class="fa fa-child dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">Youths Linked</h4>
                        <?php if ($result27->num_rows > 0) ?>
                        <?php while ($row27 = $result27->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row27["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result27->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <?php
                        $sql28 = 'SELECT COUNT(recID) AS count FROM tbljsg';
                        $result28 = $link->query($sql28);
                        ?>
                        <i class="fa fa-object-group dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">JSGs Formed</h4>
                        <?php if ($result28->num_rows > 0) ?>
                        <?php while ($row28 = $result28->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row28["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result28->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <?php
                        $sql29 = 'SELECT COUNT(groupID) AS count FROM tblgroup WHERE registered_group = "1"';
                        $result29 = $link->query($sql29);
                        ?>
                        <i class="fa fa-users dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">Cooperatives Formed</h4>
                        <?php if ($result29->num_rows > 0) ?>
                        <?php while ($row29 = $result29->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row29["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result29->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <?php
                        $sql30 = 'SELECT COUNT(groupID) AS count FROM tblgroup where vc_status = "1"';
                        $result30 = $link->query($sql30);
                        $row30 = $result30->fetch_assoc();
                        ?>
                        <i class="fa fa-industry dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">Groups in Production VC</h4>
                        <?php if ($result30->num_rows > 0) ?>

                        <p class="dashboard-summary-number"><?php echo number_format($row30["count"]) ?></p>

                        <?php if ($result30->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- End of Enhanced Livelihood Stats -->

    <!-- Graduation Stats -->
    <div class="mySlides">
        <div class="dashboard-summary-section" id="dashboard-summary-section">
            <section class="cimis-dashboard-1" id="cimis-dashboard-1">
                <div class="dashboard-heading-title">GRADUATION STATISTICS</div>

                <div class="dashboard-summary-items">
                    <?php
                    $sql31 = "SELECT COUNT(groupID) AS count FROM tblgroup where grad_status = 1";
                    $result31 = $link->query($sql31);
                    ?>
                    <div class="dashboard-summary-card">
                        <i class="fa fa-users dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">Selected SLGs</h4>
                        <?php if ($result31->num_rows > 0) ?>
                        <?php while ($row31 = $result31->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row31["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result31->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <?php
                        $sql32 = 'SELECT COUNT(sppCode) AS count FROM tblbeneficiaries where grad_status ="1"';
                        $result32 = $link->query($sql32);
                        ?>
                        <i class="fa fa-home dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">Selected Households</h4>
                        <?php if ($result32->num_rows > 0) ?>
                        <?php while ($row32 = $result32->fetch_assoc()) { ?>
                            <p class="dashboard-summary-number"><?php echo number_format($row32["count"]) ?></p>
                        <?php } ?>
                        <?php if ($result32->num_rows == 0) { ?>
                            <p class="dashboard-summary-number">0</p>
                        <?php } ?>
                    </div>
                    <div class="dashboard-summary-card">
                        <i class="fa fa-layer-group dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">AMCs Formed</h4>

                        <p class="dashboard-summary-number">0</p>

                    </div>
                    <div class="dashboard-summary-card">
                        <i class="fa fa-home dashboard-icon"></i>
                        <h4 class="dashboard-summary-label">HHs Trained in Asset Mgt</h4>

                        <p class="dashboard-summary-number">0</p>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- End of Graduation Stats -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="charts/chart1.js"></script> -->
    <script type="text/javascript">
        var districtsArray = <?php echo json_encode($json_array_districts); ?>;
        var groupsArray = <?php echo json_encode($json_array_groups); ?>;
        console.log("districts", districtsArray);
        console.log("groups", groupsArray);

        const labels1 = districtsArray;

        const data1 = {
            labels: labels1,
            datasets: [{
                label: 'Groups per District',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: groupsArray,
                datalabels: {
                    color: 'blue',
                    anchor: 'end',
                    align: 'top',
                    offset: 5,
                },
            }]
        };

        const config = {
            type: 'bar',
            data: data1,
            options: {
                maintainAspectRatio: false,
            },
            plugins: [ChartDataLabels],
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script type="text/javascript">
        var districtsArray2 = <?php echo json_encode($json_array_districts2); ?>;
        var groupSavingsArray2 = <?php echo json_encode($json_array_group_savings2); ?>;

        const labels2 = districtsArray2;

        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'District Savings',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: groupSavingsArray2,
                datalabels: {
                    color: 'blue',
                    anchor: 'end',
                    align: 'top',
                    offset: 5,
                },
            }]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            return "MK" + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        }
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels],
        };

        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>

    <script type="text/javascript">
        var districtsArray3 = <?php echo json_encode($json_array_districts3); ?>;
        var memberSavingsArray3 = <?php echo json_encode($json_array_member_savings3); ?>;
        console.log(memberSavingsArray3);

        const labels3 = districtsArray3;

        const data3 = {
            labels: labels3,
            datasets: [{
                label: 'Member Savings',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: memberSavingsArray3,
                datalabels: {
                    color: 'blue',
                    anchor: 'end',
                    align: 'top',
                    offset: 5,
                },
            }]
        };

        const config3 = {
            type: 'bar',
            data: data3,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            return "MK" + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        }
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels],
        };

        const myChart3 = new Chart(
            document.getElementById('myChart3'),
            config3
        );
    </script>

    <script type="text/javascript">
        var yearsArray4 = <?php echo json_encode($json_array_years4); ?>;
        var groupSavingsArray4 = <?php echo json_encode($json_array_group_savings4); ?>;

        const labels4 = yearsArray4;

        const data4 = {
            labels: labels4,
            datasets: [{
                label: 'Group Savings Per Year',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: groupSavingsArray4,
                datalabels: {
                    color: 'blue',
                    anchor: 'end',
                    align: 'top',
                    offset: 5,
                },
            }]
        };

        const config4 = {
            type: 'bar',
            data: data4,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            return "MK" + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        }
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels],
        };

        const myChart4 = new Chart(
            document.getElementById('myChart4'),
            config4
        );
    </script>

    <script type="text/javascript">
        var districtsArray5 = <?php echo json_encode($json_array_districts5); ?>;
        var groupsArray5 = <?php echo json_encode($json_array_groups5); ?>;

        const data5 = {
            labels: districtsArray5,
            datasets: [{
                label: 'Actual Households Per District',
                data: groupsArray5,
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)',
                    'rgba(243, 102, 175, 0.8)',
                    'rgba(233, 221, 56, 0.8)',
                    'rgba(203, 187, 229, 0.8)',
                    'rgba(71, 177, 220, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(243, 102, 175, 0.8)',
                    'rgba(233, 221, 56, 0.8)',
                    'rgba(203, 187, 229, 0.8)',
                    'rgba(71, 177, 220, 0.8)'
                ],
                borderWidth: 1
            }]
        };

        // config 
        const config5 = {
            type: 'bar',
            data: data5,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        align: 'center',
                        formatter: (value, context) => {
                            const datapoints = context.chart.data.datasets[0].data;

                            function totalSum(total, datapoint) {
                                return total + datapoint;
                            }

                            function sumOfValues() {
                                let sum = 0;
                                for (let i = 0; i < groupsArray5.length; i++) {
                                    sum += parseInt(groupsArray5[i]);
                                }
                                return sum;
                            }

                            const totalvalue = datapoints.reduce(totalSum, 0);
                            const percentageValue = (value / sumOfValues() * 100).toFixed(1);
                            const display = [`${percentageValue}%`]
                            return display;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        // render init block
        const myChart5 = new Chart(
            document.getElementById('myChart5'),
            config5
        );
    </script>

    <script type="text/javascript">
        var districtsArray6 = <?php echo json_encode($json_array_districts6); ?>;
        var membershipArray6 = <?php echo json_encode($json_array_membership6); ?>;

        const data6 = {
            labels: districtsArray6,
            datasets: [{
                label: 'Expected Household Members Per District',
                data: membershipArray6,
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)',
                    'rgba(243, 102, 175, 0.8)',
                    'rgba(233, 221, 56, 0.8)',
                    'rgba(203, 187, 229, 0.8)',
                    'rgba(71, 177, 220, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(243, 102, 175, 0.8)',
                    'rgba(233, 221, 56, 0.8)',
                    'rgba(203, 187, 229, 0.8)',
                    'rgba(71, 177, 220, 0.8)'
                ],
                borderWidth: 1
            }]
        };

        // config 
        const config6 = {
            type: 'bar',
            data: data6,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        align: 'center',
                        formatter: (value, context) => {
                            const datapoints = context.chart.data.datasets[0].data;

                            function totalSum(total, datapoint) {
                                return total + datapoint;
                            }

                            function sumOfValues() {
                                let sum = 0;
                                for (let i = 0; i < membershipArray6.length; i++) {
                                    sum += parseInt(membershipArray6[i]);
                                }
                                return sum;
                            }
                            console.log("dduuu>>>", sumOfValues())

                            const totalvalue = datapoints.reduce(totalSum, 0);
                            const percentageValue = (value / sumOfValues() * 100).toFixed(1);
                            const display = [`${percentageValue}%`]
                            return display;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        // render init block
        const myChart6 = new Chart(
            document.getElementById('myChart6'),
            config6
        );
    </script>

    <script type="text/javascript">
        var districtsArray7 = <?php echo json_encode($json_array_districts25); ?>;
        var adoptedPlacesArray7 = <?php echo json_encode($json_array_adopted_places25); ?>;

        const labels7 = districtsArray7;

        const data7 = {
            labels: labels7,
            datasets: [{
                label: 'Adopted Places',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: adoptedPlacesArray7,
                datalabels: {
                    color: 'blue',
                    anchor: 'end',
                    align: 'bottom',
                    offset: 5,
                },
            }]
        };

        const config7 = {
            type: 'bar',
            data: data7,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        }
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels],
        };

        const myChart7 = new Chart(
            document.getElementById('myChart7'),
            config7
        );
    </script>

    <script type="text/javascript">
        var yearsArray8 = <?php echo json_encode($json_array_years26); ?>;
        var sumArray8 = <?php echo json_encode($json_array_sum26); ?>;

        const labels8 = yearsArray8;

        const data8 = {
            labels: labels8,
            datasets: [{
                label: 'Savings Mobilisation',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: sumArray8,
                datalabels: {
                    color: 'blue',
                    anchor: 'end',
                    align: 'top',
                    offset: 5,
                },
            }]
        };

        const config8 = {
            type: 'bar',
            data: data8,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            return "MK" + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        }
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels],
        };

        const myChart8 = new Chart(
            document.getElementById('myChart8'),
            config8
        );
    </script>
    <!-- <script src="charts/chart2.js"></script>
    <script src="charts/chart3.js"></script> -->
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 40000); // Change image every 2 seconds
        }
    </script>
</body>

</html>

<?php require_once "layouts/config.php" ?>