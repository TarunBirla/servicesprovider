<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/associate/assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('assets/associate/assets/css/styles.min.css') }}" />
</head>

<body>
    @include('associate.layout.navbar')
    @include('associate.layout.sidebar')
    @yield('content')
    @include('associate.layout.footer')

<script src="{{ asset('assets/associate/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/associate/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/associate/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/associate/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/associate/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/associate/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/associate/assets/js/dashboard.js') }} "></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>