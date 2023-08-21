<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/frontend/img/favicons/favicon.ico') }}">

    <x-title :title="$title ?? ''" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animated-headline.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/jquery-jvectormap-2.0.5.css') }}">
    @stack('css')
    <livewire:styles />
</head>

<body>
    @include('frontend.pertial.header')
    <!-- Mobile Menu Overlay -->
    <div class="overlay-inn"></div>

    <main>
        {{ $slot }}
    </main>

    @include('frontend.pertial.footer')

    <!-- ==================== Scripts ==================== -->
    <!------------------------------------------------------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('assets/frontend/js/vendor/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/animated-headline.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/tiny-slider.js') }}"></script>
    <!-- Main script-->
    <script src="{{ asset('assets/frontend/js/main-script.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <livewire:scripts />
    @stack('js')
</body>

</html>
