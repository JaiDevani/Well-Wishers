<?php use App\User; use App\subscription; ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!---->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
    <script src="{{asset('js1/webfontloader.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.css' rel='stylesheet' />

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
<body>
    <div id="app">
            <!-- Header-BP -->
            <header class="header" id="site-header">
            
                <div class="page-title">
                    <h6>WellWishers</h6>
                </div>
                
                <div class="header-content-wrapper">
                
                    @if(Auth::User()->type == 'admin')
                        <a href="{{url('/')}}/" class="link-find-friend">Home</a>
                        <a href="{{url('/')}}/admin" class="link-find-friend">Root</a>
                        <a href="{{url('/')}}/verified" class="link-find-friend">Verified Users</a>
                        <a href="{{url('/')}}/school" class="link-find-friend">Add School</a>
                        <a href="{{url('/')}}/addteachers" class="link-find-friend">Add Teacher</a>
                        <a href="{{url('/')}}/addproject" class="link-find-friend">Add Project</a>
                        <a href="{{url('/')}}/projectlist" class="link-find-friend">View Projects</a>
                        <a href="{{url('/')}}/volunteers" class="link-find-friend">Active volunteers</a>
                        <a href="{{url('/')}}/autofill" class="link-find-friend">Scan Image</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="99_headerAndFooter.html#">Profile Page</a>
                            <a class="dropdown-item" href="{{url('/')}}/newsfeed">Newsfeed</a>
                         <!---IF DONOR LOGGED IN ADD VIEW MY DONATIONS LINK IN NAVBAR-->  
                         {{-- <a class="dropdown-item" href="{{url('/viewdonations')}}">My Donations</a> --}}
                        </div>
                    @elseif(Auth::User()->type == 'Member')
                        <a href="{{url('/')}}/" class="link-find-friend">Home</a>
                        <a href="{{url('/')}}/projectlist" class="link-find-friend">View Projects</a>
                        <a href="{{url('/')}}/admin" class="link-find-friend">Root</a>
                        <a href="{{url('/')}}/verified" class="link-find-friend">Verified Users</a>
                        <a href="{{url('/')}}/school" class="link-find-friend">Add School</a>
                    @elseif(Auth::User()->type == 'Donor')
                        <a href="{{url('/')}}/" class="link-find-friend">Home</a>
                        <a href="{{url('/')}}/viewdonations" class="link-find-friend">View My Transactions</a>
                        <a href="{{url('/')}}/list" class="link-find-friend">Donate Now</a>
                        <a href="{{url('/')}}/projectlist" class="link-find-friend">View Projects</a>
                    @elseif(Auth::User()->type == 'Volunteer')
                        <a href="{{url('/')}}/" class="link-find-friend">Home</a>
                        <a href="{{url('/')}}/volreg">Register for Projects<a>
                        <a href="{{url('/')}}/addteachers" class="link-find-friend">Add Teacher</a>
                        <a href="{{url('/')}}/projectlist" class="link-find-friend">View Projects</a>
                        <a href="{{url('/')}}/uploadstudent" class="link-find-friend">Add Student Data</a>
                        <a href="{{url('/')}}/volunteercharts" class="link-find-friend">View Stats</a>
                    @endif
                    <div class="control-block">
            
                        <div class="author-page author vcard inline-items more">
                            <div class="author-thumb">
                                
                                <span class="icon-status online"></span>
                                <div class="more-dropdown more-with-triangle">
                                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                                        <div class="ui-block-title ui-block-title-small">
                                            <h6 class="title">Your Account</h6>
                                        </div>
            
                                        <ul class="account-settings">
                                            
                                           
                                            <li>
                                                <div>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                                    <svg class="olymp-logout-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-logout-icon')}}"></use></svg>
                                                    <span>Log Out</span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                </div>
                                            </li>
                                        </ul>
                                       
                                    </div>
            
                                </div>
                            </div>
                            @if(Auth::id())
                            <a href="#" class="author-name fn">
                                    <div class="author-title">
                                        {{Auth::user()->name}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </div>
                                    
                                </a>
                            @else 
                            <a href="02-ProfilePage.html" class="author-name fn">
                                    <div class="author-title">
                                        Spacie <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </div>
                               
                                </a>
                            @endif
                        </div>
            
                    </div>
                </div>
            </header>
            
            <!-- ... end Header-BP -->
            
            
            <!-- Responsive Header-BP -->
            
            <header class="header header-responsive" id="site-header-responsive">
            
                <div class="header-content-wrapper">
                    <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="99_headerAndFooter.html#request" role="tab">
                                <div class="control-icon has-items">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                    <div class="label-avatar bg-blue">6</div>
                                </div>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="99_headerAndFooter.html#chat" role="tab">
                                <div class="control-icon has-items">
                                    <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                                    <div class="label-avatar bg-purple">2</div>
                                </div>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="99_headerAndFooter.html#notification" role="tab">
                                <div class="control-icon has-items">
                                    <svg class="olymp-thunder-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-thunder-icon')}}"></use></svg>
                                    <div class="label-avatar bg-primary">8</div>
                                </div>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="99_headerAndFooter.html#search" role="tab">
                                <svg class="olymp-magnifying-glass-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}"></use></svg>
                                <svg class="olymp-close-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <!-- Tab panes -->
                <div class="tab-content tab-content-responsive">
            
                    <div class="tab-pane " id="request" role="tabpanel">
            
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">FRIEND REQUESTS</h6>
                                <a href="99_headerAndFooter.html#">Find Friends</a>
                                <a href="99_headerAndFooter.html#">Settings</a>
                            </div>
                            <ul class="notification-list friend-requests">
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar55-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="99_headerAndFooter.html#" class="h6 notification-friend">Tamara Romanoff</a>
                                        <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
                                    </div>
                                                <span class="notification-icon">
                                                    <a href="99_headerAndFooter.html#" class="accept-request">
                                                        <span class="icon-add without-text">
                                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                        </span>
                                                    </a>
            
                                                    <a href="99_headerAndFooter.html#" class="accept-request request-del">
                                                        <span class="icon-minus">
                                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                        </span>
                                                    </a>
            
                                                </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                    </div>
                                </li>
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar56-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="99_headerAndFooter.html#" class="h6 notification-friend">Tony Stevens</a>
                                        <span class="chat-message-item">4 Friends in Common</span>
                                    </div>
                                                <span class="notification-icon">
                                                    <a href="99_headerAndFooter.html#" class="accept-request">
                                                        <span class="icon-add without-text">
                                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                        </span>
                                                    </a>
            
                                                    <a href="99_headerAndFooter.html#" class="accept-request request-del">
                                                        <span class="icon-minus">
                                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                        </span>
                                                    </a>
            
                                                </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                    </div>
                                </li>
                                <li class="accepted">
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar57-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        You and <a href="99_headerAndFooter.html#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="99_headerAndFooter.html#" class="notification-link">her wall</a>.
                                    </div>
                                                <span class="notification-icon">
                                                    <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                        <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                                    </div>
                                </li>
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar58-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="99_headerAndFooter.html#" class="h6 notification-friend">Stagg Clothing</a>
                                        <span class="chat-message-item">9 Friends in Common</span>
                                    </div>
                                                <span class="notification-icon">
                                                    <a href="99_headerAndFooter.html#" class="accept-request">
                                                        <span class="icon-add without-text">
                                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                        </span>
                                                    </a>
            
                                                    <a href="99_headerAndFooter.html#" class="accept-request request-del">
                                                        <span class="icon-minus">
                                                            <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                        </span>
                                                    </a>
            
                                                </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                    </div>
                                </li>
                            </ul>
                            <a href="99_headerAndFooter.html#" class="view-all bg-blue">Check all your Events</a>
                        </div>
            
                    </div>
            
                    <div class="tab-pane " id="chat" role="tabpanel">
            
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Chat / Messages</h6>
                                <a href="99_headerAndFooter.html#">Mark all as read</a>
                                <a href="99_headerAndFooter.html#">Settings</a>
                            </div>
            
                            <ul class="notification-list chat-message">
                                <li class="message-unread">
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar59-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="99_headerAndFooter.html#" class="h6 notification-friend">Diana Jameson</a>
                                        <span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                    </div>
                                                <span class="notification-icon">
                                                    <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                                                </span>
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                    </div>
                                </li>
            
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar60-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="99_headerAndFooter.html#" class="h6 notification-friend">Jake Parker</a>
                                        <span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                    </div>
                                                <span class="notification-icon">
                                                    <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                                                </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                    </div>
                                </li>
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar61-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="99_headerAndFooter.html#" class="h6 notification-friend">Elaine Dreyfuss</a>
                                        <span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
                                    </div>
                                                    <span class="notification-icon">
                                                        <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                                                    </span>
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                    </div>
                                </li>
            
                                <li class="chat-group">
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar11-sm.jpg')}}" alt="author">
                                        <img src="{{asset('img/avatar12-sm.jpg')}}" alt="author">
                                        <img src="{{asset('img/avatar13-sm.jpg')}}" alt="author">
                                        <img src="{{asset('img/avatar10-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="99_headerAndFooter.html#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
                                        <span class="last-message-author">Ed:</span>
                                        <span class="chat-message-item">Yeah! Seems fine by me!</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
                                    </div>
                                                    <span class="notification-icon">
                                                        <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                                                    </span>
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                    </div>
                                </li>
                            </ul>
            
                            <a href="99_headerAndFooter.html#" class="view-all bg-purple">View All Messages</a>
                        </div>
            
                    </div>
            
                    <div class="tab-pane " id="notification" role="tabpanel">
            
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Notifications</h6>
                                <a href="99_headerAndFooter.html#">Mark all as read</a>
                                <a href="99_headerAndFooter.html#">Settings</a>
                            </div>
            
                            <ul class="notification-list">
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar62-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <div><a href="99_headerAndFooter.html#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="99_headerAndFooter.html#" class="notification-link">profile status</a>.</div>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                    </div>
                                                    <span class="notification-icon">
                                                        <svg class="olymp-comments-post-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg>
                                                    </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                        <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                                    </div>
                                </li>
            
                                <li class="un-read">
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar63-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <div>You and <a href="99_headerAndFooter.html#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="99_headerAndFooter.html#" class="notification-link">his wall</a>.</div>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
                                    </div>
                                                    <span class="notification-icon">
                                                        <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                    </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                        <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                                    </div>
                                </li>
            
                                <li class="with-comment-photo">
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar64-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <div><a href="99_headerAndFooter.html#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="99_headerAndFooter.html#" class="notification-link">photo</a>.</div>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                                    </div>
                                                    <span class="notification-icon">
                                                        <svg class="olymp-comments-post-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg>
                                                    </span>
            
                                    <div class="comment-photo">
                                        <img src="{{asset('img/comment-photo1.jpg')}}" alt="photo">
                                        <span>“She looks incredible in that outfit! We should see each...”</span>
                                    </div>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                        <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                                    </div>
                                </li>
            
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar65-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <div><a href="99_headerAndFooter.html#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="99_headerAndFooter.html#" class="notification-link">Gotham Bar</a>.</div>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
                                    </div>
                                                    <span class="notification-icon">
                                                        <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                                    </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                        <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                                    </div>
                                </li>
            
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar66-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <div><a href="99_headerAndFooter.html#" class="h6 notification-friend">James Summers</a> commented on your new <a href="99_headerAndFooter.html#" class="notification-link">profile status</a>.</div>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
                                    </div>
                                                    <span class="notification-icon">
                                                        <svg class="olymp-heart-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-heart-icon')}}"></use></svg>
                                                    </span>
            
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                        <svg class="olymp-little-delete"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                                    </div>
                                </li>
                            </ul>
            
                            <a href="99_headerAndFooter.html#" class="view-all bg-primary">View All Notifications</a>
                        </div>
            
                    </div>
            
                    <div class="tab-pane " id="search" role="tabpanel">
            
            
                            <form class="search-bar w-search notification-list friend-requests">
                                <div class="form-group with-button">
                                    <input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
                                </div>
                            </form>
            
            
                    </div>
            
                </div>
                <!-- ... end  Tab panes -->
            
            </header>
            
            <!-- ... end Responsive Header-BP -->
            
            <div class="header-spacer"></div>
            
            <div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
            
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="icon-status online"></span>
                        <h6 class="title" >Chat</h6>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                            <svg class="olymp-little-delete js-chat-open"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mCustomScrollbar">
                            <ul class="notification-list chat-message chat-message-field">
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar14-sm.jpg')}}" alt="author" class="mCS_img_loaded">
                                    </div>
                                    <div class="notification-event">
                                        <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                                    </div>
                                </li>
            
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/author-page.jpg')}}" alt="author" class="mCS_img_loaded">
                                    </div>
                                    <div class="notification-event">
                                        <span class="chat-message-item">Don’t worry Mathilda!</span>
                                        <span class="chat-message-item">I already bought everything</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
                                    </div>
                                </li>
            
                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar14-sm.jpg')}}" alt="author" class="mCS_img_loaded">
                                    </div>
                                    <div class="notification-event">
                                        <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="author-thumb">
                                        <img src="{{asset('img/avatar14-sm.jpg')}}" alt="author" class="mCS_img_loaded">
                                    </div>
                                    <div class="notification-event">
                                        <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
            
                        <form class="need-validation">
            
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Press enter to post...</label>
                        <textarea class="form-control" placeholder=""></textarea>
                        <div class="add-options-message">
                            <a href="99_headerAndFooter.html#" class="options-message">
                                <svg class="olymp-computer-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                            </a>
                            <div class="options-message smile-block">
            
                                <svg class="olymp-happy-sticker-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-sticker-icon')}}"></use></svg>
            
                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat1.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat2.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat3.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat4.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat5.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat6.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat7.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat8.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat9.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat10.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat11.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat12.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat13.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat14.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat15.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat16.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat17.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat18.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat19.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat20.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat21.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat22.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat23.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat24.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat25.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat26.png')}}" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="99_headerAndFooter.html#">
                                            <img src="{{asset('img/icon-chat27.png')}}" alt="icon">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            
                </form>
                    </div>
                </div>
            
            </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
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

<script src="{{asset('js1/base-init.js')}}"></script>
<script defer src="{{asset('fonts/fontawesome-all.js')}}"></script>
<script src="{{asset('Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
    <script>
        var url="{!! url('/') !!}";
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var set=0;
        function search_func(u_id)
        {
            var element=document.getElementById('div_search').innerHTML;
            element="";
            var inp=String(document.getElementById('search_user').value);
            //console.log(inp);
            $.ajax({
                url: url+'/search/user',
                type: 'POST',
                data: {user_id:u_id,chr:inp,'_token': csrf},
                dataType: 'json',
                success: function( data ) {
                    var len=data.length;
                    for(var i=0;i<len;i++)
                    {
                        //console.log(data[i].name);
                        element+='<a href="'+url+'/user/'+data[i].mobile_no+'"><div class="inline-items" data-selectable="" data-value="'+data[i].name+'">'+
                        '<div class="author-thumb">'+
                            '<img src="'+url+'/storage/images/'+data[i].profile_pic+'" alt="avatar" width="50" height="50">'+
                        '</div>'+
                        '<div class="notification-event">'+
                            '<span class="h6 notification-friend">'+data[i].name+'</span>'+
                        '</div>'+
                        '<span class="notification-icon">'+
                            '<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>'+
                        '</span>'+
                        '</div></a>'
                        ;
                    }
                    document.getElementById('div_search').innerHTML=element;
                },
                fail: function(data){
                                alert('Please try again later!');
                            }          
            });
            document.getElementById('main_search').style.display="block";
        }
        function drop_sear()
        {
            var drop=document.getElementsByClassName('selectize-dropdown multi form-control');
            console.log(document.activeElement);
            if(set==1)
            {
            }
            else{
                drop[0].style.display="none";
            }
        }
        function set_sear()
        {
            set=1;
           // var drop=document.getElementsByClassName('selectize-dropdown multi form-control');
           // drop[0].style.display="block";
        }

        function reset_sear()
        {
            set=0;
            //var drop=document.getElementsByClassName('selectize-dropdown multi form-control');
           // drop[0].style.display="block";
        }
</script>
</body>
</html>