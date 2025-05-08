<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ReEarth-Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/ionicons.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('assets')}}/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="{{asset('assets')}}/css/skin-blue.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/css/addCategories.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--

|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div style="background-color: #cef5ed;" class="wrapper">


  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Re</b>Earth</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Home Link -->
          <li>
            <a href="{{route('User.home')}}">Home</a>
          </li>
    
        </ul>
        <ul class="nav navbar-nav">
          <!-- Home Link -->
          <li>
            <a href="{{route('User.product')}}">Product</a>
          </li>
    
        </ul>
        <ul class="nav navbar-nav">

    
        </ul>
        <ul class="nav navbar-nav">
          <!-- Home Link -->
          <li>
            <a href="{{route('User.contact')}}">Contact</a>
          </li>
    
        </ul>
        <ul class="nav navbar-nav">
          <li>
       
        <div class="cart" style="margin-top: 1.5rem;color: #fff">
              
              

         
          <a href="{{route('cart.index')}}" id="cart-shop">
              <i style="color: #fff" class="fas fa-shopping-cart"></i>
          </a>
          <span style="font-size: 1rem; margin-right: 2rem" id="cart-quantity">{{\App\Http\Controllers\User\CartControllerUs::countCart()}}</span>
         
      </div>
      </li>
        </ul>
        
      </div>
      
      <!-- Navbar Right Menu -->
   
    </nav>
  </header>
  <div class="blur-bg-overlay"></div>
          
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          @if (auth()->check())
          <img style="width: 35px; height: 35px; border-radius: 50%" src="{{asset('assets')}}/images/{{Auth::user()->avatar}}" >
          @endif
        
        </div>
        <div class="pull-left info">
          @if (auth()->check())
         <p style="color: #fff; font-weight: 700; font-size: 1.4vw" >{{Auth::user()->name}}</p>
          @endif

          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="{{route('Admin.information')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Information</span></a></li>
        <li class=""><a href="{{route('YourOrder.index')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Your order</span></a></li>
      
        @if (Auth::user()->role_id==1)
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Website management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{route('user.index')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Users</span></a></li>
            <li class=""><a href="{{route('category.index')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Categories</span></a></li>
            <li class=""><a href="{{route('product.index')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Product</span></a></li>
            <li class=""><a href="{{route('order.index')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Order List</span></a></li>
            <li class=""><a href="{{route('review.index')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Review List</span></a></li>
            <li class=""><a href="{{route('contact.index')}}"><i class="fa fa-link"></i> <span style="color: #fff; font-weight: 600" >Contact List</span></a></li>
          </ul>
        </li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  @yield('container')
  <script src="{{asset('assets')}}/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/js/adminlte.min.js"></script>
<script>
  function displayImage() {
      var imageFile = document.forms["myForm"]["imageFile"].files[0];

      if (imageFile) {
          var fileNameElement = document.getElementById('fileName');
         

          var reader = new FileReader();
          reader.onload = function (e) {
              var previewImage = document.getElementById('previewImage');
              previewImage.src = e.target.result;
              previewImage.style.display = 'block';
          };
          reader.readAsDataURL(imageFile);
      }
  }

  function submitForm() {
      // Thực hiện xử lý khi nhấn nút Submit (bạn có thể thêm mã xử lý của bạn tại đây)
      document.forms["myForm"].submit();
  }
</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>