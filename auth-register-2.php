<?php
require_once 'layouts/config.php'; 
?>
<head>
    <title>Register User | CIMIS</title>

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <?php include 'layouts/head-style.php'; ?>
</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary"></h4>

                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Comsip Intergrated Management Information System "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary"></h4>
                                                                    <p class="font-size-14 mb-0"></p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Livelihoods Management Information System: Supporting Livelihoods Interventions in Malawi "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary"></h4>
                                                                    <p class="font-size-14 mb-0"></p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                    <a href="" class="d-block auth-logo">
                                        <img src="assets/images/logo-dark.png" alt="" height="64" class="auth-logo-dark">
                                        <img src="assets/images/logo-light.png" alt="" height="64" class="auth-logo-light">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 class="text-primary">Register account</h5>
                                        <p class="text-muted">If Livelihoods Stakeholder in Malawi GET your account now.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form class="needs-validation"  action="auth-register-2d.php" method="POST">

                                            <div class="mb-1">
                                            <label for="region" class="form-label">Region</label>
                                                                            
                                                <select class="form-select" name="region" id="region"  required>
                                                    <option></option>
                                                    <option value="00">NA</option>
                                                    <?php                                                           
                                                            $dis_fetch_query = "SELECT regionID, name FROM tblregion";                                                  
                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_reg = mysqli_fetch_array($result_dis_fetch)) {
                                                            ?>
                                                            <option value ="<?php
                                                                    echo $DB_ROW_reg["regionID"];?>">
                                                                <?php
                                                                    echo $DB_ROW_reg["name"];
                                                                ?>
                                                            </option>
                                                            <?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Malawi region.
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                            <label for="district" class="form-label">District</label>
                                                <select class="form-select" name="district" id="district"  required disabled>
                                                    <option  ></option>
                                                        <?php                                                           
                                                            $dis_fetch_query = "SELECT DistrictID,DistrictName FROM tbldistrict";                                                  
                                                            $result_dis_fetch = mysqli_query($link, $dis_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_Dis = mysqli_fetch_array($result_dis_fetch)) {
                                                            ?>
                                                            <option value="<?php echo $DB_ROW_Dis["DistrictID"]; ?>">
                                                                <?php echo $DB_ROW_Dis["DistrictName"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Malawi district.
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                            <label for="ta" class="form-label">Traditional Authority</label>
                                                <select class="form-select" name="ta" id="ta" required disabled>
                                                    <option ></option>
                                                    <?php                                                           
                                                            $ta_fetch_query = "SELECT TAName FROM tblta";                                                  
                                                            $result_ta_fetch = mysqli_query($link, $ta_fetch_query);                                                                       
                                                            $i=0;
                                                                while($DB_ROW_ta = mysqli_fetch_array($result_ta_fetch)) {
                                                            ?>
                                                            <option>
                                                                <?php echo $DB_ROW_ta["TAName"]; ?></option><?php
                                                                $i++;
                                                                    }
                                                        ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid TA.
                                                </div>
                                            </div>

                                            

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Submit Region</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                

                                            </div>

                                        </form>

                                        <div class="mt-5 text-center">
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>
    <!-- owl.carousel js -->
    <script src="assets/libs/owl.carousel/owl.carousel.min.js"></script>
    <!-- validation init -->
    <script src="assets/js/pages/validation.init.js"></script>
    <!-- auth-2-carousel init -->
    <script src="assets/js/pages/auth-2-carousel.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>