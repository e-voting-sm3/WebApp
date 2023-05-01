<template>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="top-menu ms-auto">
                    </div>
                    <div class="user-box dropdown border-light-2">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret text-white show" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            <img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">Pauline Seitz</p>
                                <p class="designattion mb-0">Web Designer</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end show" data-bs-popper="none">
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user-profile"><i class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/ecommerce-orders"><i class="bx bx-cog"></i><span>Orders</span></a>
                            </li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/index"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                            </li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/earnings"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/downloads"><i class='bx bx-download'></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/authentication-signin"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
</template>