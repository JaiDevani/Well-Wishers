<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css2/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css2/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css2/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css2/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css2/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="css2/style.css">

    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
</head>
<body>
    <header class="site-header">
        <div class="top-header-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                    <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                        <div class="header-bar-email">
                            MAIL: <a href="#">contact@wellwishercom</a>
                        </div><!-- .header-bar-email -->

                        <div class="header-bar-text">
                            <p>PHONE: <span>+02228833661/ +56452 4567</span></p>
                        </div><!-- .header-bar-text -->


                    </div><!-- .col -->

                    <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                        <div class="donate-btn">
                        </div><!-- .donate-btn -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .top-header-bar -->

        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center" ">
                        
                           <a class="d-block" href="index.html" rel="home"><img class="d-block" src="images/olive.png"  height="40px;" alt="logo"></a>
                           <b style="font-size:25px;">WellWishers</b>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                <li class="current-menu-item"><a href="{{url('/')}}">Home</a></li>
                                @if(Auth::user())
                                    @if(Auth::user()->type == 'admin')
                                    <li><a href="{{url('/')}}/admin">{{Auth::user()->name}}</a></li>
                                    @elseif(Auth::user()->type == 'Donor')
                                    <li><a href="{{url('/')}}/viewdonations">View My Donations</a></li>
                                    <li><a href="{{url('/')}}/list" class="link-find-friend">Donate Now</a></li>
                                    <li><a href="{{url('/')}}">{{Auth::user()->name}}</a></li>
                                    @elseif(Auth::user()->type == 'Volunteer')
                                    <li><a href="{{url('/')}}/volunteercharts" class="link-find-friend">View Stats</a></li>
                                    <li><a href="{{url('/')}}">{{Auth::user()->name}}</a></li>
                                    @endif
                                    @else
                                    <li><a href="{{url('/')}}/login">LOGIN</a></li> 
                                @endif
                            </ul>
                        </nav><!-- .site-navigation -->

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->
    </header><!-- .site-header -->

    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-content-wrap">
                <img src="images/hero.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>Donate</h1>
                                    <h4>for a better world</h4>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Here we provide children the opportunity for integrated learning. We enable children to become independent thinkers, empathetic human beings and change-makers through our various programs.</p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

           

            <div class="swiper-slide hero-content-wrap">
                <img src="images/hero.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>Donate</h1>
                                    <h4>for a better world</h4>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus ullamcorper</p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->
        </div><!-- .swiper-wrapper -->

        

        <!-- Add Arrows -->
        
    </div><!-- .hero-slider -->

    <div class="home-page-icon-boxes">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0" style="margin-left: 100px;">
                    <div class="icon-box active">
                        <figure class="d-flex justify-content-center">
                      <img src="images/hands-gray.png" alt="">
                            <img src="images/hands-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                                <a href="{{url('/')}}/register">  <h3 class="entry-title">Become a Volunteer</h3></a>
                        </header>

                        <div class="entry-content">
                            <p>Be a small part of this kind deed by volunteering  with your excellent skills </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0" style="margin-left: 200px;">
                    <div class="icon-box">
                        <figure class="d-flex justify-content-center">
                                <img src="images/donation-gray.png" alt="">
                            <img src="images/donation-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                                <a href="{{url('/')}}/register"> <h3 class="entry-title" >Become a Donor</h3></a>
                        </header>

                        <div class="entry-content">
                            <p>Be a helping hand to these amazing projects and get lots blessings </p>
                        </div>
                    </div>
                </div>

               
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    <div class="home-page-welcome">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">
                        <header class="entry-header">
                            <h2 class="entry-title">Welcome!</h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            <p>WellWishers is an NGO in India directly benefitting over 600,000 children and their families every year, through more than 250 live welfare projects on education, healthcare, livelihood and women empowerment, in over 950 remote villages and slums across 25 states of India..</p>
                        </div><!-- .entry-content -->

                      
                    </div><!-- .welcome-content -->
                </div><!-- .col -->
               <!-- MAPS YAHA PE-->
                <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                    <div id='map' style='width: 600px; height: 300px;'></div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

   

                
    <div class="our-causes">
        <div class="container">
            <div class="row">
                <div class="coL-12">
                    <div class="section-heading">
                        <h2 class="entry-title">Our ongoing Projects</h2>
                    </div><!-- .section-heading -->
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="row">
                <div class="col-12">
                    <div class="swiper-container causes-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="images/cause-1.jpg" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="#">Womaniya</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">The project will create Economic independence for widow or abandoned women and then trains them and help them get employed</p>
                                        </div><!-- .entry-content -->

                                        
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="images/cause-2.jpg" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="#">Smiles 100</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">Smile 100 is a Scholarship Program for 100 parentless & single-parented kids who are from a place called 'Arni' in Tiruvannamalai Dt.</p>
                                        </div><!-- .entry-content -->

                                        
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="images/cause-3.jpg" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="#">Hello Nature</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">Wild Shaale is a unique environmental  program that aims to foster interest and build awareness in rural children living in proximity to wildlife.</p>
                                        </div><!-- .entry-content -->

                                        
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="images/cause-1.jpg" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="#">Team Change</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestib ulum mauris.</p>
                                        </div><!-- .entry-content -->

                                        <div class="fund-raised w-100">
                                            <div class="fund-raised-bar-4 barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div><!-- .tipWrap -->

                                                <span class="fill" data-percentage="83"></span>
                                            </div><!-- .fund-raised-bar -->

                                            <div class="fund-raised-details d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="fund-raised-total mt-4">
                                                    Raised: $56 880
                                                </div><!-- .fund-raised-total -->

                                                <div class="fund-raised-goal mt-4">
                                                    Goal: $70 000
                                                </div><!-- .fund-raised-goal -->
                                            </div><!-- .fund-raised-details -->
                                        </div><!-- .fund-raised -->
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="images/cause-2.jpg" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="#">Education for all</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestib ulum mauris.</p>
                                        </div><!-- .entry-content -->

                                        <div class="fund-raised w-100">
                                            <div class="fund-raised-bar-5 barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div><!-- .tipWrap -->

                                                <span class="fill" data-percentage="70"></span>
                                            </div><!-- .fund-raised-bar -->

                                            <div class="fund-raised-details d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="fund-raised-total mt-4">
                                                    Raised: $56 880
                                                </div><!-- .fund-raised-total -->

                                                <div class="fund-raised-goal mt-4">
                                                    Goal: $70 000
                                                </div><!-- .fund-raised-goal -->
                                            </div><!-- .fund-raised-details -->
                                        </div><!-- .fund-raised -->
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="images/cause-3.jpg" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="#">Bring water to the childrens</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestib ulum mauris.</p>
                                        </div><!-- .entry-content -->

                                        <div class="fund-raised w-100">
                                            <div class="fund-raised-bar-6 barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div><!-- .tipWrap -->

                                                <span class="fill" data-percentage="83"></span>
                                            </div><!-- .fund-raised-bar -->

                                            <div class="fund-raised-details d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="fund-raised-total mt-4">
                                                    Raised: $56 880
                                                </div><!-- .fund-raised-total -->

                                                <div class="fund-raised-goal mt-4">
                                                    Goal: $70 000
                                                </div><!-- .fund-raised-goal -->
                                            </div><!-- .fund-raised-details -->
                                        </div><!-- .fund-raised -->
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->
                        </div><!-- .swiper-wrapper -->

                    </div><!-- .swiper-container -->

                    <!-- Add Arrows -->
                    
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .our-causes -->

    <div class="home-page-limestone">
        <div class="container">
            <div class="row align-items-end">
                <div class="coL-12 col-lg-6">
                    <div class="section-heading">
                        <h2 class="entry-title">We love to help all the children that have problems in the world. After 15 years we have many goals achieved.</h2>

                        <p class="mt-5">Dolor sit amet, consectetur adipiscing elit. Mauris tempus vestib ulum mauris quis aliquam. Lorem ipsum dolor sit amet.</p>
                    </div><!-- .section-heading -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6">
                    <div class="milestones d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="images/teamwork.png" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="120" data-speed="2000"></div>
                                    
                                </div>

                                <h3 class="entry-title">Children helped</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->

                        

                        <div class="col-12 col-sm-4 mt-5 mt-lg-0">
                            <div class="counter-box">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="images/dove.png" alt="">
                                </div>

                                <div class="d-flex justify-content-center align-items-baseline">
                                    <div class="start-counter" data-to="25" data-speed="2000"></div>
                                </div>

                                <h3 class="entry-title">Volunteeres</h3><!-- entry-title -->
                            </div><!-- counter-box -->
                        </div><!-- .col -->
                    </div><!-- .milestones -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .our-causes -->

    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about" style="margin-left: 30px;">
                            <h2><a class="foot-logo" href="#"><img src="images/teamwork.png" alt=""></a></h2>

                            <p>Here we provide children the opportunity for integrated learning. We enable children to become independent thinkers, empathetic human beings and change-makers through our various programs.</p>

                            
                        </div><!-- .foot-about -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0" style="margin-left: 50px;">
                        <h2>Useful Links</h2>

                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                           
                        </ul>
                    </div><!-- .col -->

                    

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                        <div class="foot-contact">
                            <h2>Contact</h2>

                            <ul>
                                <li><i class="fa fa-phone"></i><span>+02228985581</span></li>
                                <li><i class="fa fa-envelope"></i><span>my@charity.com</span></li>
                                <li><i class="fa fa-map-marker"></i><span>Main Str. no 45-46, b3, 56832, India</span></li>
                            </ul>
                        </div><!-- .foot-contact -->

                    
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-widgets -->

        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <!--This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
 Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. </p>-->
                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-bar -->
    </footer><!-- .site-footer -->

    <script type='text/javascript' src='js2/jquery.js'></script>
    <script type='text/javascript' src='js2/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js2/swiper.min.js'></script>
    <script type='text/javascript' src='js2/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js2/circle-progress.min.js'></script>
    <script type='text/javascript' src='js2/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js2/jquery.barfiller.js'></script>
    <script type='text/javascript' src='js2/custom.js'></script>

    <script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoic2FydmVzaDEyazI2IiwiYSI6ImNqdDRsOWxmMTE0azc0NGx2aDNuMzI1OTkifQ.ntE6KcoglbREUqVMOQ02cQ';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [ 72.8679, 19.1551],
        zoom: 9
    });
    var marker = new mapboxgl.Marker()
        .setLngLat([72.84367, 19.163267])
        .addTo(map);
    console.log(marker.getLngLat());  
    var marker = new mapboxgl.Marker()
        .setLngLat([72.8347,19.1849])
        .addTo(map);
    console.log(marker.getLngLat());
    var marker = new mapboxgl.Marker()
        .setLngLat([72.8338,19.2361])
        .addTo(map);
    console.log(marker.getLngLat());
    var marker = new mapboxgl.Marker()
        .setLngLat([72.84476,19.01798])
        .addTo(map);
    console.log(marker.getLngLat());
    var marker = new mapboxgl.Marker()
        .setLngLat([72.8235,18.9757])
        .addTo(map);
    console.log(marker.getLngLat());  
    // map.on('click', function (e) {
    //     console.log(e.lngLat);

    //     var popup = new mapboxgl.Popup({ offset: 25 }).setText('Construction on the Washington Monument began in 1848.');


    //     var marker = new mapboxgl.Marker().setLngLat([e.lngLat.lng, e.lngLat.lat]).setPopup(popup).addTo(map);
    //     document.getElementById('info').innerHTML =
    //     // e.point is the x, y coordinates of the mousemove event relative
    //     // to the top-left corner of the map
    //     JSON.stringify(e.point) + '<br />' +
    //     // e.lngLat is the longitude, latitude geographical position of the event
    //     JSON.stringify(e.lngLat);
    // });
    </script>



</body>
</html>