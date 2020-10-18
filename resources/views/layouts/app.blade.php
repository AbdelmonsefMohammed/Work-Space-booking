<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Work Space') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/revolution-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('style')

</head>

<body>
    <div id="app">
        

        <main>
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/revolution.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/scrolling-nav.js') }}"></script>
    <script src="/bower_components/moment/min/moment.min.js"></script>
    <script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
    <script>
    $(document).ready(function() {

        $('.datetime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'en',
            sideBySide: true,
            icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
            },
            stepping: 15
        })
        if (window.location.href.indexOf("start_time") > -1) {
            $('html, body').animate({
                scrollTop: $("#here").offset().top
            }, 2000);
        }
    });
</script>

</body>

</html>
