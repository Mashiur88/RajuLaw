<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr"
    data-theme="theme-default"data-assets-path="{{ asset('assets/backend/') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <x-title :title="$title ?? ''" />


    <meta name="description" content="" />
    <meta name="keywords" content="">
    <link rel="canonical" href="">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/img/favicons/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/typeahead-js/typeahead.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/select2/select2.css') }}" />
    
    <style>
    .red{
        color: red;
    }</style>
    <livewire:styles />
    @stack('css')laravel
    <script src="{{ asset('assets/backend/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/backend/js/config.js') }}"></script>
    {{-- @wireUiScripts
    <script src="//unpkg.com/alpinejs" defer></script> --}}
</head>

<body id="root">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.partials.sidebar')
            <div class="layout-page">
                @include('admin.partials.nav')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">


                        {{ $slot }}

                    </div>
                    {{-- @include('admin.partials.footer') --}}
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>

        <div class="drag-target"></div>
    </div>
    <script src="{{ asset('assets/backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>

    <script src="{{ asset('assets/backend/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <livewire:scripts />
    @stack('js')

</body>

</body>

</html>
