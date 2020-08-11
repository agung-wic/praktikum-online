<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow" style="background-color: rgba(256,256,256,0);">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <p class="mr-2 d-lg-inline" style="color:#FFFFFF"><strong><?= $user['name']; ?></strong></p>
                    </a>
                    <!-- Dropdown - User Information -->
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:#FFFFFF" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        Logout
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->