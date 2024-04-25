<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title') </title>

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png')}}">
<!-- All CSS is here
============================================ -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/signericafat.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/cerebrisans.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/simple-line-icons.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/elegant.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/linear-icon.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/nice-select.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/easyzoom.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/slick.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnific-popup.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/jquery-ui.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Lora:ital@1&family=Mystery+Quest&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Mystery+Quest&display=swap" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
{{-- font-awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<div class="main-wrapper">
{{-- @include('frontend.body.header') --}}

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
{{-- @include('frontend.body.footer') --}}

</div>

<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- All JS is here
============================================ -->
<script src="{{ asset('frontend/assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery-v3.6.0.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-v3.3.2.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/slick.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/jquery.instagramfeed.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/wow.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/sticky-sidebar.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/easyzoom.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{ asset('frontend/assets/js/main.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/sort.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{ asset('js/sort.js')}}"></script>
  <script>
   @if(Session::has('message'))
   var type = "{{ Session::get('alert-type','info') }}"
   switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;
      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;
      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;
      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break; 
   }
   @endif 
  </script>
</body>
</html>