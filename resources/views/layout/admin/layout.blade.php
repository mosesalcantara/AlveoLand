<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>


    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a051b84b57.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css"></script> --}}
    {{-- <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script> --}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AdminLTE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <script src="{{ asset('js/ph-address-selector.js') }}"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper ">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Add your navbar content here -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add your sidebar content here -->
                        <li class="nav-item">
                            <a href="{{ '/admin/dashboard' }}"
                                class="nav-link {{ Request::url() == url('/admin/dashboard') ? 'active' : '' }}">
                                <i class="fa-solid fa-chart-line nav-icon"></i>
                                <p>Dashboard</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/admin/appointments' }}"
                                class="nav-link {{ Request::url() == url('/admin/appointments') ? 'active' : '' }}">
                                <i class="fa-solid fa-calendar-days nav-icon"></i>
                                <p>Appointments</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/admin/inquiry' }}"
                                class="nav-link {{ Request::url() == url('/admin/inquiry') ? 'active' : '' }}">
                                <i class="fa-solid fa-quote-left nav-icon"></i>
                                <p>Inquiry</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/admin/submitted-properties' }}"
                                class="nav-link {{ Request::url() == url('/admin/submitted-properties') ? 'active' : '' }}">
                                <i class="fa-solid fa-users nav-icon"></i>
                                <p>Clients</p>

                            </a>
                        </li>

                        <li
                            class="nav-item has-treeview {{ in_array(Request::url(), [url('/admin/projects'), url('/admin/project/units')]) ? 'menu-open' : '' }} ">
                            <a href="#"
                                class="nav-link {{ in_array(Request::url(), [url('/admin/projects'), url('/admin/project/units')]) ? 'active' : '' }}">
                                <i class="fa-solid fa-building nav-icon"></i>
                                <p>Properties<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview  ">
                                <li class="nav-item">
                                    <a href="{{ '/admin/projects' }}"
                                        class="nav-link {{ Request::url() == url('/admin/projects') ? 'active' : '' }}">
                                        <i class="fa-solid fa-bars-progress nav-icon"></i>
                                        <p>Projects</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ '/admin/project/units' }}"
                                        class="nav-link {{ Request::url() == url('/admin/project/units') ? 'active' : '' }}">
                                        <i class="fa-solid fa-building-un nav-icon"></i>
                                        <p>Units</p>

                                    </a>
                                </li>
                                <!-- Add more dropdown items as needed -->
                            </ul>
                        </li>

                        <li
                            class="nav-item has-treeview {{ in_array(Request::url(), [url('/admin/about'), url('/admin/awards')]) ? 'menu-open active' : '' }}">
                            <a href="#"
                                class="nav-link {{ in_array(Request::url(), [url('/admin/about'), url('/admin/awards')]) ? 'active' : '' }}">
                                <i class="fa-solid fa-circle-info nav-icon"></i>
                                <p>Information<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ '/admin/awards' }}"
                                        class="nav-link {{ Request::url() == url('/admin/awards') ? 'active' : '' }}">
                                        <i class="fa-solid fa-award nav-icon"></i>
                                        <p>Awards</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ '/admin/about' }}"
                                        class="nav-link {{ Request::url() == url('/admin/about') ? 'active' : '' }}">
                                        <i class="fa-solid fa-sitemap nav-icon"></i>
                                        <p>About</p>

                                    </a>
                                </li>
                                <!-- Add more dropdown items as needed -->
                            </ul>
                        </li>





                        <li class="nav-item">
                            <a href="{{ '/admin/pages/integrations' }}"
                                class="nav-link {{ Request::url() == url('/admin/pages/integrations') ? 'active' : '' }}">
                                <i class="nav-icon fa-brands fa-stack-overflow"></i>
                                <p>Settings</p>

                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content p-2 ">
                @yield('projects')
                @yield('project_units')
                @yield('appointments')
                @yield('submitted')
                @yield('inquiry')
                @yield('index')
                @yield('property')
                @yield('prospects')
                @yield('awards')
                @yield('about_company')
                @yield('integrations')
                @yield('landing_page')
                @yield('aboutus')
                @yield('properties')
                @yield('locations')
                @yield('gallery')
                @yield('property_main_view')
            </section>
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="toasMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto" id="toast-header"></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <span id="toast-content"></span>
                    </div>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <footer class="main-footer">
            <!-- Add footer content here -->
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

</body>

</html>
