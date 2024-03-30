<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap.min.css')}}" >
<link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css>
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/admin/css/text.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/admin/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/admin/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/admin/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/admin/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/admin/css/monthly.')}}c{{('ss')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/admin/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/admin/js/raphael-min.js')}}"></script>
<script src="{{asset('public/admin/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/admin/images/2.png')}}">
                <span class="username">
                    <?php 
                    $name = Session::get('admin_name');
                    if($name){
                        echo $name;
                    }
                    ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-user"></i>
                        <span>Tài Khoản</span>
                    </a>
                    <ul class="sub">
						<li><a href="typography.html">Typography</a></li>
						<li><a href="glyphicon.html">glyphicon</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list-ul"></i>
                        <span>Danh Mục Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-products')}}">Thêm Danh Mục</a></li>
                        <li><a href="{{URL::to('/list-category-products')}}">Liệt Kê Danh Mục</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-briefcase"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-products')}}">Thêm Sản Phẩm</a></li>
                        <li><a href="{{URL::to('/list-products')}}">Liệt Kê Sản Phẩm</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-truck"></i>
                        <span>Vận Chuyển</span>
                    </a>
                    <ul class="sub">
                        <li><a href="form_component.html">Form Elements</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
						<li><a href="dropzone.html">Dropzone</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="form_component.html">Quản Lý Đơn Hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-solid fa-tags"></i>
                        <span>Mã Giảm Giá</span>
                    </a>
                    <ul class="sub">
                        <li><a href="mail.html">Thêm Mã Giảm Giá</a></li>
                        <li><a href="mail_compose.html">Sửa Mã Giảm Giá</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-users"></i>
                        <span>Khách Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="chartjs.html">Thông Tin Khách Hàng</a></li>
                        <li><a href="flot_chart.html">Tin Nhắn Khách Hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-dribbble"></i>
                        <span>Thông Tin Website</span>
                    </a>
                    <ul class="sub">
                        <li><a href="google_map.html">Google Map</a></li>
                        <li><a href="vector_map.html">Vector Map</a></li>
                    </ul>
                </li>
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('main')
		
	</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/admin/js/bootstrap.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/admin/js/scripts.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/admin/js/jquery.scrollTo.js')}}"></script>


</body>
</html>
