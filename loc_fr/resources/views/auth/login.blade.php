<!DOCTYPE html>
<html lang="en">
<head>

	<title>Landing Page</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
	<script src="{{asset('js1/webfontloader.min.js')}}"></script>

	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('Bootstrap/dist/css/bootstrap-reboot.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Bootstrap/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Bootstrap/dist/css/bootstrap-grid.css')}}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('css1/main.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css1/fonts.min.css')}}">



</head>

<body class="landing-page">

<div class="content-bg-wrap"></div>


<!-- Header Standard Landing  -->

<div class="header--standard header--standard-landing" id="header--standard">
	<div class="container">
		<div class="header--standard-wrap">

			<a href="http://localhost:8080/loc_fr/public/" class="logo">
				<div class="img-wrap">
					<img src="{{asset('img/logo.png')}}" alt="Olympus">
					<img src="{{asset('img/logo-colored-small.png')}}" alt="Olympus" class="logo-colored">
				</div>
				<div class="title-block">
					<h6 class="logo-title">Well Wishers</h6>
					<div class="sub-title">We Care</div>
				</div>
			</a>

			<a href="01-LandingPage.html#" class="open-responsive-menu js-open-responsive-menu">
				<svg class="olymp-menu-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
			</a>

			<div class="nav nav-pills nav1 header-menu">
				<div class="mCustomScrollbar">
					<ul>
						<li class="nav-item">
							<a href="01-LandingPage.html#" class="nav-link">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="01-LandingPage.html#" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profile</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
								<a class="dropdown-item" href="01-LandingPage.html#">Newsfeed</a>
								<a class="dropdown-item" href="01-LandingPage.html#">Post Versions</a>
							</div>
						</li>
						<li class="nav-item dropdown dropdown-has-megamenu">
							<a href="01-LandingPage.html#" class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Forums</a>
							<div class="dropdown-menu megamenu">
								<div class="row">
									<div class="col col-sm-3">
										<h6 class="column-tittle">Main Links</h6>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page<span class="tag-label bg-blue-light">new</span></a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
									</div>
									<div class="col col-sm-3">
										<h6 class="column-tittle">BuddyPress</h6>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page<span class="tag-label bg-primary">HOT!</span></a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
									</div>
									<div class="col col-sm-3">
										<h6 class="column-tittle">Corporate</h6>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
									</div>
									<div class="col col-sm-3">
										<h6 class="column-tittle">Forums</h6>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
										<a class="dropdown-item" href="01-LandingPage.html#">Profile Page</a>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a href="01-LandingPage.html#" class="nav-link">Terms & Conditions</a>
						</li>
						<li class="nav-item">
							<a href="01-LandingPage.html#" class="nav-link">Events</a>
						</li>
						<li class="nav-item">
							<a href="01-LandingPage.html#" class="nav-link">Privacy Policy</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>

<div class="container">
	<div class="row display-flex">
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="landing-content">
			
				<p>WellWishers is an NGO in India directly benefitting over 600,000 children and their families every year, through more than 250 live welfare projects on education, healthcare, livelihood and women empowerment, in over 950 remote villages and slums across 25 states of India.
				</p>
			</div>
		</div>

		<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
			
			<!-- Login-Registration Form  -->
			
			<div class="registration-login-form" style="padding-left: 0px;">
				
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="profile" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Login to your Account</div>
						<form class="content" method="POST" action="{{ route('login') }}">
                            @csrf
							<div class="row">
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
									<div class="form-group label-floating is-empty">
										<label class=
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										"control-label"></label>
										<input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Your Password" type="password" name="password" required>
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
			
									<div class="remember">
			
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
												Remember Me
											</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="forgot" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
									</div>
            
                                    <button type="submit" class="btn btn-lg btn-primary full-width">
                                        {{ __('Login') }}
                                    </button>
			
									<div class="or"></div>
			
									<p>Don’t you have an account?<a href="{{url('/')}}/register">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<!-- ... end Login-Registration Form  -->		</div>
	</div>
</div>

<!-- JS Scripts -->
<script src="{{asset('js1/jquery-3.2.1.js')}}"></script>
<script src="{{asset('js1/jquery.appear.js')}}"></script>
<script src="{{asset('js1/jquery.mousewheel.js')}}"></script>
<script src="{{asset('js1/perfect-scrollbar.js')}}"></script>
<script src="{{asset('js1/jquery.matchHeight.js')}}"></script>
<script src="{{asset('js1/svgxuse.js')}}"></script>
<script src="{{asset('js1/imagesloaded.pkgd.js')}}"></script>
<script src="{{asset('js1/Headroom.js')}}"></script>
<script src="{{asset('js1/velocity.js')}}"></script>
<script src="{{asset('js1/ScrollMagic.js')}}"></script>
<script src="{{asset('js1/jquery.waypoints.js')}}"></script>
<script src="{{asset('js1/jquery.countTo.js')}}"></script>
<script src="{{asset('js1/popper.min.js')}}"></script>
<script src="{{asset('js1/material.min.js')}}"></script>
<script src="{{asset('js1/bootstrap-select.js')}}"></script>
<script src="{{asset('js1/smooth-scroll.js')}}"></script>
<script src="{{asset('js1/selectize.js')}}"></script>
<script src="{{asset('js1/swiper.jquery.js')}}"></script>
<script src="{{asset('js1/moment.js')}}"></script>
<script src="{{asset('js1/daterangepicker.js')}}"></script>
<script src="{{asset('js1/simplecalendar.js')}}"></script>
<script src="{{asset('js1/fullcalendar.js')}}"></script>
<script src="{{asset('js1/isotope.pkgd.js')}}"></script>
<script src="{{asset('js1/ajax-pagination.js')}}"></script>
<script src="{{asset('js1/Chart.js')}}"></script>
<script src="{{asset('js1/chartjs-plugin-deferred.js')}}"></script>
<script src="{{asset('js1/circle-progress.js')}}"></script>
<script src="{{asset('js1/loader.js')}}"></script>
<script src="{{asset('js1/run-chart.js')}}"></script>
<script src="{{asset('js1/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js1/jquery.gifplayer.js')}}"></script>
<script src="{{asset('js1/mediaelement-and-player.js')}}"></script>
<script src="{{asset('js1/mediaelement-playlist-plugin.min.js')}}"></script>

<script src="{{asset('js11/base-init.js')}}"></script>
<script defer src="{{asset('fonts/fontawesome-all.js')}}"></script>
<script src="{{asset('Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>

</body>
</html>
