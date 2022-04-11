<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                        
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                        
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-light.svg" alt="" height="22">
                        
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="70">
                        
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="<?php echo $language["Search"]; ?>">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

            
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"><?php echo $_SESSION["username"]; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="cimis-user-profile.php"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile"><?php echo $language["Profile"]; ?></span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo $language["Logout"]; ?></span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo $language["Menu"]; ?></li>

                <li>
                    <a href="../index.php" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">CIMIS Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span key="t-layouts">Programs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="../basic_livelihood.php" class="has-arrow" key="t-vertical">Basic Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="../enhanced_livelihood/enhanced_livelihood.php" class="has-arrow" key="t-horizontal">Enhanced Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="graduation.php" class="has-arrow" key="t-horizontal">Graduation</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-walk"></i>
                        <span key="t-layouts">Monitoring</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Basic Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Enhanced Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Graduation</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-line-chart"></i>
                        <span key="t-layouts">Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <!-- start here -->
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-line-chart"></i>
                                    <span key="t-layouts">Basic </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Beneficiary</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Mobilisation</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">SLGs</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Training</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">CBDRA</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Nutrition</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">ACSA</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Safeguards</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- End here -->
                        </li>

                        <li>
                           <!-- Start here --> 
                           <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-line-chart"></i>
                                    <span key="t-layouts">Enhanced </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Joint Skill Grps</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Youth Support</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">LESP</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Production VC</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Coop Devt</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- End here -->
                        </li>

                        <li>
                            <!-- start here -->
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-line-chart"></i>
                                    <span key="t-layouts">Graduation</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-vertical">Beneficiary</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Asset Transfer</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Status</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- end Here -->
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end" key="t-new"></span>
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication">Citizen Engagement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login-1.php" key="t-login"><?php echo $language["Login"]; ?></a></li>
                        <li><a href="auth-login-2.php" key="t-login-2"><?php echo $language["Login"]; ?> 2</a></li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-report"></i>
                        <span key="t-layouts">Case Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="case-register.php" class="has-arrow" key="t-vertical">Case Register</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Case Status</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                       
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-building"></i>
                        <span key="t-layouts">System Administration</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            
                            <a href="user-mgt.php" class="has-arrow" key="t-vertical">User Management</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Module Configuration</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Systems Maintainance</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>
                    </ul>
                </li>

                
 

               

                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
