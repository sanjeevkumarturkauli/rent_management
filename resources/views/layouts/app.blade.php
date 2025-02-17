<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-no-customizer"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>

    <meta name="description" content="" />

    {{-- Base Assets Url --}}
    <base href="{{ url('public/') }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/css/self.style.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/toastr/toastr.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />

    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <script src="/assets/js/config.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    @livewireStyles

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <x-aside />

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <x-nav />

                <!-- / Navbar -->

                <!-- Content wrapper -->
                {{ $slot }}
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
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-crm.js"></script>
    {{-- datatable --}}
    <script src="/assets/js/tables-datatables-advanced.js"></script>
    <script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/toastr/toastr.js"></script>
    <script src="/assets/js/ui-toasts.js"></script>
    <script src="/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/js/forms-selects.js"></script>
    @livewireScripts
</body>
<script>
    window.addEventListener('notify', (event) => {
        notify();
    });

    function notify(type = 'success', msg = '!Oops wen,t wrong') {
        var shortCutFunction = type,
            msg = msg,
            title = type || '!OOps',
            prePositionClass = 'toast-top-right';


        toastr.options = {
            maxOpened: 1,
            autoDismiss: true,
            closeButton: true,
            progressBar: true,
            onclick: null,
            showDuration: 200,
            hideDuration: 2000,
            timeOut: 2000,
            extendedTimeOut: 2000,
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        var $toast = toastr[shortCutFunction](msg, title);
    }

    window.addEventListener('closeModal', (event) => {
        $(event.detail[0].modalId).modal('hide');
    });
</script>
