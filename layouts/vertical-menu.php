<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <nav class="navbar navbar-light bg-transparent">
                <nav class="navbar navbar-expand-sm py-5">
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
                    <div>
                        <span><h3><b>COMSIP Intergrated MIS</h3></b></span>
                    </div>
                </nav>
            </nav>
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

            <div class="d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"><?php echo $_SESSION["username"]; ?></span>
                    <i class="d-none d-xl-inline-block"></i>
                </button>

                <div class="d-inline-block">
                    <form method="post" action="logout.php">
                        <button type ="submit" class="btn btn-btn btn-outline-danger w-md">Logout</button>
                    </form>
                </div>
                
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-outline-info w-md header-item noti-icon right-bar-toggle waves-effect">
                        <i class="bx bx-cog bx"></i>
                        <h7>View Settings</h7>
                    </button>
                </div> 
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
                    <a href="index.php" class="waves-effect">
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
                            <a href="basic_livelihood.php" class="has-arrow" key="t-vertical">Basic Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="./enhanced_livelihood/enhanced_livelihood.php" class="has-arrow" key="t-horizontal">Enhanced Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="graduation/graduation.php" class="has-arrow" key="t-horizontal">Graduation</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-line-chart"></i>
                        <span key="t-layouts">Monitoring</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                    
                        <li>
                            <a href="basicReports.php" class="has-arrow waves-effect" key="t-vertical">Basic Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="enhanced_livelihood/enhancedReports.php" class="has-arrow" key="t-horizontal">Enhanced Livelihood</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="graduationReports.php" class="has-arrow" key="t-horizontal">Graduation</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
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
                            
                            	
                            <a href='new_user.php' class='has-arrow' key='t-vertical'>User Management></a>	
                                
                                  
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="cimis-page-coming-soon.php" class="has-arrow" key="t-horizontal">Module Configuration</a>
                            <ul class="sub-menu" aria-expanded="true">
                            </ul>
                        </li>

                        <li>
                            <a href="new_user_requests.php" class="has-arrow" key="t-horizontal">Systems Maintainance</a>
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
