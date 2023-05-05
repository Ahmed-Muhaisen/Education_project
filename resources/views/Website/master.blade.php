
@extends('Website/header')



@section('master')


<body id="top-header">



    @if(app()->CurrentLocale()=='ar')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');

        body {
            direction: rtl;
            text-align: right;
            font-family: 'Cairo', sans-serif;
        }

        .header-form i,
        .topbar-search label {
            left: 14px;
            right: auto;
        }
    </style>
    @endif



    <header>
        <!-- Main Menu Start -->
        <div class="site-navigation main_menu menu-2" id="mainmenu-area">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid" style="width:95%; ">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{asset('website/assets/images/logo-dark.png')}}" alt="Edutim" class="img-fluid">
                    </a>

                    <!-- Toggler -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="navbarMenu">

                        <div class="category-menu d-none d-lg-block">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-grip-horizontal"></i>{{ __('trans.Categoris') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    @foreach (App\Models\Category::all() as $item )
                                    <a class="dropdown-item " href="{{ route('Website.Category',$item->sluge) }}">
                                        {{$item->L_Name}}
                                    </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <form action="#" class="header-form">
                            <input type="text" class="form-control" placeholder="search">
                            <i class="fa fa-search"></i>
                        </form>

                        <ul class="navbar-nav ml-auto">


                            <li class="nav-item ">
                                <a href="{{ route('index') }}" class="nav-link js-scroll-trigger">
                                    {{ __('trans.Home') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('Website.About') }}" class="nav-link js-scroll-trigger">
                                    {{ __('trans.About') }}
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a href="{{ route('Website.Courses') }}" class="nav-link js-scroll-trigger">
                                    {{ __('trans.Courses') }}
                                </a>
                            </li>



                            <li class="nav-item ">
                                <a href="{{ route('Website.Contact') }}" class="nav-link">
                                    {{ __('trans.Contact') }}
                                </a>
                            </li>




                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if ($localeCode != app()->currentLocale() )
                            <a class="nav-link "
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                <img width="35" src="{{asset('flags/'.$properties['flag'] )}}" alt="">
                            </a>
                            @endif
                            @endforeach

                            @if(Auth::id())

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="{{ route('Website.My_Courses') }}">
                                        MY COURSES
                                    </a>
                                    <a class="dropdown-item" href="" onclick="event.preventDefault();
        document.getElementById('Form_Logout').submit();
        ">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>


                            <form id="Form_Logout" action="http://localhost:8000/logout" method="POST">
                               @csrf
                            </form>




                            @else
                            <a href="{{ route('login') }}" class="btn btn-main btn-small m-auto"><i
                                    class="fa fa-sign-in-alt mr-2"></i>{{ __('trans.Login') }}</a>



                            @endif





                            </li>
                        </ul>






                    </div> <!-- / .navbar-collapse -->
                </div> <!-- / .container -->
            </nav>
        </div>
    </header>


@section('master')

 <!--search overlay start-->
 <div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="{{asset('website/assets/images/close.png')}}" srcset="assets/images/close@2x.png')}} 2x" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@yield('content')



<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3>Join our community of students</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">About Us</h5>
					<p class="mt-3">Veniam Sequi molestias aut necessitatibus optio magni at natus accusamus.Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt .</p>
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Company</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">About us</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Terms & Condition</a></li>
						<li><a href="#">Privacy policy</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Courses</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">SEO Business</a></li>
						<li><a href="#">Digital Marketing</a></li>
						<li><a href="#">Graphic Design</a></li>
						<li><a href="#">Site Development</a></li>
						<li><a href="#">Social Marketing</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">Contact </h5>

					<ul class="list-unstyled">
						<li><i class="bi bi-headphone"></i>
							<div>
								<strong>Phone number</strong>
								(68) 345 5902
							</div>

						</li>
						<li> <i class="bi bi-envelop"></i>
							<div>
								<strong>Email Address</strong>
								info@yourdomain.com
							</div>
						</li>
						<li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Office Address</strong>
								Moon Street Light Avenue
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="{{asset('website/assets/images/logo-white.png')}}" alt="Edutim" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<p>@ Copyright reserved to Edutim.Proudly Crafted by <a href="https://themeturn.com">Dreambuzz</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>



@endsection



