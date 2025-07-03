        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="user_dashboard.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="40">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="user_dashboard.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
    
            <div id="scrollbar">
                <div class="container-fluid">


                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <!-- <li class="menu-title"><span data-key="t-menu">Menu</span></li> -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="user_dashboard.php" class="nav-link" data-key="t-analytics"> Home </a>
                                    </li>
                             
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
            

                        
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="profile.php">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">User Register Details</span>
                            </a>
                        </li>


                  
                        
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="order_show.php">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">Order Placed</span>
                            </a>
                        </li>


                        
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Others</span></li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="../index.php">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">Back</span>
                            </a>
                        </li>


                     

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>