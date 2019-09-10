
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{asset('js/main_admin.js')}}"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
     <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <!-- Fonts -->

    <link rel="dns-prefetch" href="{{url('//fonts.gstatic.com')}}">
    <link href="{{url('https://fonts.googleapis.com/css?family=Nunito')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
  
<!-- Styles -->
   <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Styles -->
</head>
<body class="app sidebar-mini rtl">
 <main class="py-4">
     @yield('content')
 </main>
 