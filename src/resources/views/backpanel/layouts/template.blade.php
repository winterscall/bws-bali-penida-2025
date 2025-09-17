<!doctype html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('bp-assets/') }}"
    data-template="vertical-menu-template-no-customizer" data-style="light">

<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('page_title') | {{ config('app.name') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    {{-- @include('global.favicon') --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('bp-assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('bp-assets/vendor/libs/toastr/toastr.css') }}" />

    @stack('css')

    <!-- Helpers -->
    <script src="{{ asset('bp-assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('bp-assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('backpanel.layouts.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('backpanel.layouts.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('backpanel.layouts.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('bp-assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('bp-assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('bp-assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('bp-assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('bp-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('bp-assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('bp-assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendor JS -->
    <script src="{{ asset('bp-assets/vendor/libs/toastr/toastr.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('bp-assets/js/main.js') }}"></script>

    @stack('js')

    <script>
        @if (Session::has('message-type'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
            }

            @if (session('message-type') == 'success')
                toastr.success("{{ session('message-body') }}");
            @elseif (session('message-type') == 'info')
                toastr.info("{{ session('message-body') }}");
            @elseif (session('message-type') == 'warning')
                toastr.warning("{{ session('message-body') }}");
            @elseif (session('message-type') == 'error')
                toastr.error("{{ session('message-body') }}");
            @endif
        @endif

        @if (request()->has('gt'))
            $(document).ready(function() {
                document.getElementById('{{ request()->gt }}').scrollIntoView();
            })
        @endif
    </script>

    @stack('scripts')
</body>

</html>
