<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- admin.blade.php  26 Aug 2022 17:54:50 GMT +5 -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset("/assets/css/app.min.css") }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset("/assets/css/style.css") }}">
  @yield('css')
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset("/assets/css/custom.css") }}">
  <link rel="stylesheet" href="{{ asset("/assets/css/components.css") }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset("/assets/img/favicon.ico") }}' />
    {{-- <style> .error{border :2px solid red}    </style> --}}
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      {{-- Navbar --}}
      <x-admin.navbar></x-admin.navbar>
      
      {{-- Main Sidebar --}}
      <x-admin.main-sidebar></x-admin>

        
      <!-- Main Content -->
      <div class="main-content">

        @yield('content')

        {{-- Setting sidebar --}}
        <x-admin.setting-sidebar></x-admin>

      </div>

      {{-- Footer --}}
      <x-admin.footer></x-admin>

    </div>

  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/index.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/page/ion-icons.js') }}"></script>
  @yield('scripts')
</body>


<!-- admin.blade.php  26 Aug 2022 17:54:50 GMT +5 -->
</html>

