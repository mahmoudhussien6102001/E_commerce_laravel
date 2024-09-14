<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- cdn & link Assets Dashboard--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicons -->
  <link href="{{asset('dashboard/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('dashboard/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->


<!-- Bootstrap JavaScript and Popper.js -->



  <!-- Template Main CSS File -->
  <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/css/custom-css/main.css') }}" rel="stylesheet" >
<style>
  .cutom-marign{
    margin-right: 3rem;
  }
  </style>
    <title>@yield('title')</title>

    {{-- ar --}}
   @if(app()->getLocale() == 'ar')
   <link rel="stylesheet" href="{{asset('dashboard/assets/css/rtl.css')}}">
   @endif
</head>
<body>

    {{-- top-bar --}}
    @include('dashboard.includes.top-bar')

    {{-- side-bar --}}
    @include('dashboard.includes.side-bar') 

    {{-- content --}}
    @section('main-content')
    @show


    {{-- footer  --}}
    @include('dashboard.includes.footer')









     <!-- Vendor JS Files -->
  <script src="{{asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/chart.js')}}/chart.umd.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="{{asset('dashboard/assets/js/main.js')}}"></script>

    
</body>
</html>