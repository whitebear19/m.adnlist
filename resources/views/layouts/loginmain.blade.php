<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="map_api_key" content="">
    <meta name="description" content="AdnList is the largest classifieds website where you can post your ad and get response.">
    <title>AdnList</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    
    <link href="{{ asset('assets/css/jquery-confirm.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}">
    
			
    @yield('style')
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>	
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>    
    <script>
        (function (factory) {
            if (typeof define === 'function' && define.amd) {
                define(['jquery'], factory);
            } else if (typeof exports === 'object') {
                module.exports = factory(require('jquery'));
            } else {
                factory(jQuery);
            }
        }(function ($) {

            var pluses = /\+/g;
            function encode(s) {
                return config.raw ? s : encodeURIComponent(s);
            }
            function decode(s) {
                return config.raw ? s : decodeURIComponent(s);
            }
            function stringifyCookieValue(value) {
                return encode(config.json ? JSON.stringify(value) : String(value));
            }
            function parseCookieValue(s) {
                if (s.indexOf('"') === 0) {                    
                    s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
                }
                try {
                    s = decodeURIComponent(s.replace(pluses, ' '));
                    return config.json ? JSON.parse(s) : s;
                } catch(e) {}
            }
            function read(s, converter) {
                var value = config.raw ? s : parseCookieValue(s);
                return $.isFunction(converter) ? converter(value) : value;
            }
            var config = $.cookie = function (key, value, options) {
                if (arguments.length > 1 && !$.isFunction(value)) {
                    options = $.extend({}, config.defaults, options);
                    if (typeof options.expires === 'number') {
                        var days = options.expires, t = options.expires = new Date();
                        t.setMilliseconds(t.getMilliseconds() + days * 864e+5);
                    }
                    return (document.cookie = [
                        encode(key), '=', stringifyCookieValue(value),
                        options.expires ? '; expires=' + options.expires.toUTCString() : '',
                        options.path    ? '; path=' + options.path : '',
                        options.domain  ? '; domain=' + options.domain : '',
                        options.secure  ? '; secure' : ''
                    ].join(''));
                }
                var result = key ? undefined : {},                    
                    cookies = document.cookie ? document.cookie.split('; ') : [],
                    i = 0,
                    l = cookies.length;

                for (; i < l; i++) {
                    var parts = cookies[i].split('='),
                        name = decode(parts.shift()),
                        cookie = parts.join('=');

                    if (key === name) {
                        result = read(cookie, value);
                        break;
                    }
                    if (!key && (cookie = read(cookie)) !== undefined) {
                        result[name] = cookie;
                    }
                }
                return result;
            };
            config.defaults = {};
            $.removeCookie = function (key, options) {                
                $.cookie(key, '', $.extend({}, options, { expires: -1 }));
                return !$.cookie(key);
            };
        }));
    </script>
    @yield('script')
</head>

<body>    
    <header id="header">
        <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="10">
            <div class="container">
                <div class="navbar-header">
					<div class="logo"> <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="image" /></a> </div>
                    <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            @if(Auth::check())
                                <a data-toggle="dropdown" href="#"><span class="change-text">Account</span> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu category-change">
                                    @if(Auth::user()->role == '0')		
                                        <li class="active"><a href="{{ route('user_profile') }}">Profile</a></li>
                                        <li class="active"><a href="{{ route('user_change_password') }}">Change Password</a></li>
                                        <li class="active"><a href="{{ route('user_messages','read') }}">Notifications</a></li>
                                        <li class="active"><a href="{{ route('user_advertisement') }}">Active Posts</a></li>                                        
                                        <li class="active"><a href="{{ route('user_pending_approval_ads') }}">Pending approval</a></li>
                                        <li class="active"><a href="{{ route('user_draft_ads') }}">Draft Posts</a></li>
                                        <li class="active"><a href="{{ route('user_expired_ads') }}">Expired</a></li>                                        
                                    @elseif(Auth::user()->role == '1')
                                        <li class="active"><a href="{{ route('user_profile') }}">Dashboard</a></li>
                                        <li class="active"><a href="{{ route('user_profile') }}">Messages</a></li>
                                        <li class="active"><a href="{{ route('user_profile') }}">Listing</a></li>
                                    @elseif(Auth::user()->role >= '2')
                                        <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
                                    @endif
                                        <li class="m-t-20">
                                            <a class="dropdown-item logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><label for="" class="btn-logout">Logout</label></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                </ul>
                            @else                                
                                         
                            @endif
                        </li>
                        
                        <li>
                            @if(Auth::check())
                                <a href="{{ route('create_post') }}" class="resp_padding_20_0">                               
                                    <span class="btn-postfreead">
                                        <span style="position:absolute;left:5px;"><svg aria-hidden="true" style="color:#ffffff;height:18px;width:15px;" focusable="false" data-prefix="fal" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-plus-circle fa-w-16 fa-3x"><path fill="currentColor" d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z" class=""></path></svg></span>
                                        <span style="color:#ffffff;">Post</span>
                                    </span>
                                </a>
                            @else                                
                                <a href="{{ url('/login') }}" class="change-text">                               
                                    <span class="btn-postfreead">
                                        <span style="position:absolute;left:5px;"><svg aria-hidden="true" style="color:#ffffff;height:18px;width:15px;" focusable="false" data-prefix="fal" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-plus-circle fa-w-16 fa-3x"><path fill="currentColor" d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z" class=""></path></svg></span>
                                        <span style="color:#ffffff;">Post</span>
                                    </span>
                                </a>    
                            @endif
                        </li>
                        <li class="mobile_hidden">
                            <a style="padding-top:17px;">
                                <select name="" id="" style="height: 25px;">
                                    <option value="">English</option>
                                </select>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
	@if(session('login_success'))
        <div class="alert alert-success alert-dismissible login_success_alert" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>SUCCESS!</strong> <span>You have been successfully logged in.</span>
        </div>
    @endif
	
		@yield('content') 
    
   
    <footer id="footer" class="secondary-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer_widgets">                        
                        <h6 class="fs-16 text-color-white">AdnList is the largest classifieds website where you can post your ad and get response.
                        </h6>
                        <ul class="footer_contact_ul m-t-10">                            
                            <li><a href="mailto:"><span class="footer_contact"><svg  style="width:20px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-3x"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" class=""></path></svg></span>
                            {{ session('email') }}</a> </li>
                            <li>
                                <div style="float:left;">
                                    <span class="footer_contact"><svg style="height:20px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-arrow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-location-arrow fa-w-16 fa-3x"><path fill="currentColor" d="M444.52 3.52L28.74 195.42c-47.97 22.39-31.98 92.75 19.19 92.75h175.91v175.91c0 51.17 70.36 67.17 92.75 19.19l191.9-415.78c15.99-38.39-25.59-79.97-63.97-63.97z" class=""></path></svg></span>
                                </div>
                                <div>
                                    <p style="line-height:23px;text-align:left;">{{ session('address') }}</p>
                                </div>
                                <div style="clear:both;"></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer_widgets">
                        <div class="line"></div>
                        <h5 class="footer_title quick_links">Quick Links</h5>

                        <div class="footer_nav">
                            <ul>                                
                                <li>
                                    <a href="{{ route('avoid_scam') }}">
                                        <span>
                                            <svg aria-hidden="true" style="width:15px;height:13px;" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-angle-right fa-w-8 fa-3x"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" class=""></path></svg>
                                        </span>
                                        <span>Avoid Scam & Safty tips</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('posting_tips') }}">
                                        <span>
                                            <svg aria-hidden="true" style="width:15px;height:13px;" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-angle-right fa-w-8 fa-3x"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" class=""></path></svg>
                                        </span>
                                        <span>Posting Tips</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report_scame') }}">
                                        <span>
                                            <svg aria-hidden="true" style="width:15px;height:13px;" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-angle-right fa-w-8 fa-3x"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" class=""></path></svg>
                                        </span>
                                        <span>Report Scam/issue</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('prohibited') }}">
                                        <span>
                                            <svg aria-hidden="true" style="width:15px;height:13px;" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-angle-right fa-w-8 fa-3x"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" class=""></path></svg>
                                        </span>
                                        <span>What is Prohibited</span>
                                    </a>
                                </li>                                                                
                            </ul>                            
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer_widgets">
                        
                        <div class="line"></div>
                        <h5 class="footer_title">Follow Us On</h5>
                        <div class="follow_us">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/adnlist/" target="_blank" style="background-color: #00acee;">
                                        <svg style="height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-facebook-f fa-w-10 fa-3x"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" class=""></path></svg>
                                    </a>
                                </li>
                                <li><a href="https://twitter.com/AdnList_2019" target="_blank" style="background-color: #3b5999;">
                                    <svg style="height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-twitter fa-w-16 fa-3x"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" class=""></path></svg>
                                </a></li>
                                <li><a href="https://www.linkedin.com/in/adnlist" target="_blank" style="background-color: #007bb6;">
                                    <svg style="height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-linkedin-in fa-w-14 fa-3x"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" class=""></path></svg>
                                </a></li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <span class="m-r-20">AdnList &copy; 2019 All rights reserved</span>
                        <ul class="footer_link">
                            <li><a href="{{ route('aboutus') }}">About Us</a></li>
                            <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                            <li><a href="{{ route('terms_use') }}">Terms of use</a></li>
                            <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>                                                                
                            <li><a href="{{ route('careers') }}">Careers</a></li>
                            <li><a href="{{ route('faqs') }}">FAQs</a></li>
                        </ul>
                    </div>                    
                </div>
            </div>
        </div>
    </footer>
    
    <input type="hidden" class="default_zipcode" value="{{ session('zipcode') }}">
    <div class="modal fade" id="signModal" role="dialog">
       
        <div class="modal_signup_form">  
            <div class="modal-dialog">
                <div class="modal-content">   
                    <div class="modal_border_warp">    
                        <div class=""> 
                            <button class="btn_view_login_list">
                                <svg style="width:20px;color:#37a000;height:20px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backward" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-backward fa-w-16 fa-3x"><path fill="currentColor" d="M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2zm256 0l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2z" class=""></path></svg>    
                            </button>
                        </div> 
                        <form  method="POST" id="signup-form-Modal" action="{{ route('register.custom') }}" accept-charset="utf-8" class="myform form" role="form">
                        @csrf
                            <div class="">                
                                <h4 class="modal-title text-center">Create a AdnList account</h4>
                            </div>
                            <div class="modal-body m-t-10">                            
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group has-feedback">
                                                <input id="fnameM" type="text" class="form-control login_input_style J_required_filed" name="fname" placeholder="First Name" autocomplete="off">
                                                <span class="form_icon_pos"><i class="fa fa-user"></i></span>
                                            </div>
                                            <span class="alert_fill_input text-color-red">Fill out this filed</span>
                                        </div>   
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group has-feedback">
                                                <input id="lnameM" type="text" class="form-control login_input_style J_required_filed" name="lname" placeholder="Last Name" autocomplete="off">
                                                <span class="form_icon_pos"><i class="fa fa-user-md"></i></span>
                                            </div>
                                            <span class="alert_fill_input text-color-red">Fill out this filed</span>
                                        </div>   
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-group has-feedback">
                                                <input id="emailMR" type="email" class="form-control J_required_filed @error('email') is-invalid @enderror login_input_style"  name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                                                <span class="form_icon_pos"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            <div class="text-center m-b-10" style="margin-top:0px;">
                                                <span class="invalid-feedback pb20 hide m-b-15 " style="margin-top:-25px;font-weight:600;" role="alert" id="register-email-err">Your email has been registered already. Please login.</span>
                                            </div>
                                            <span class="alert_fill_input email_alert text-color-red">Fill out this filed</span>
                                        </div>
                                    
                                    </div> 
                                        
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group has-feedback">
                                                <input id="passwordCreate" type="password" class="form-control login_input_style J_required_filed" name="password" placeholder="Choose Password" autocomplete="off">
                                                <span class="form_icon_pos"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <span class="alert_fill_input text-color-red">Fill out this filed</span>
                                        </div>   
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group has-feedback">
                                                <input id="passwordConfirm" type="password" class="form-control login_input_style J_required_filed" placeholder="Confirm Password" autocomplete="off">
                                                <span class="form_icon_pos"><i class="fa fa-sign-in"></i></span>
                                            </div>
                                            <span class="alert_fill_input text-color-red">Fill out this filed</span>
                                        </div>   
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"> 
                                            <span class="text-color-red" id="create-pwd-err" role="alert">
                                                <strong>Confirm password does not match!</strong>
                                            </span>
                                        </div>   
                                    </div>
                                </div>
                                <input type="hidden" name="current_page" id="current_page" value="">
                                <div class="checkbox1 text-center">
                                    <input type="checkbox" name="signing" id="signingM"><span class="fs-14">By clicking <b class="toggle_register_submit">Register</b>, <span class="toggle_register_submit_text">you are agree to AdnList</span>  <a href="{{ route('terms_use') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">Terms of use</a>  and <a href="{{ route('privacy_policy') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">Privacy Policies.</span></a>
                                </div>                                                       
                            </div>                        
                        </form>
                        <div class="modal-body m-t-10">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="button" id="btn_register_common_ajax" class="btn btn_green btn_register m-t-20" disabled><i class="fa fa-sign-out"></i>&nbsp; <span>{{ __('REGISTRATION') }}</span>
                                        
                                    </button>
                                     <button class="btn_no_border_style btn_view_signin">Already have account?<b class="text-color-blue">Login</b></button>
                                </div>
                                
                            </div>        
                        </div>
                    </div>
                </div>
                         
            </div>
        </div>
        <div class="modal_signin_form">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal_border_warp">
                        <div class="row">
                            <div class="col-md-6">
                                <form  method="POST" id="signin-form-Modal" action="{{ route('login.custom') }}" accept-charset="utf-8" class="myform form" role="form">
                                @csrf                    
                                    
                                    <div class="modal-body">
                                        
                                        <div class="form-group m-b-15">
                                            <div class="form-group has-feedback m-t-10">
                                                <label for="">Email address</label>                                                
                                                <input id="emailML" type="email" class="form-control @error('email') is-invalid @enderror login_input_style" name="email" required autocomplete="email" placeholder="Enter your email address" autofocus>
                                                <span class="form_icon_pos"><i class="fa fa-envelope"></i></span>
                                            </div>

                                            <span class="custom-invalid-feedback3" id="login-email-err" role="alert">
                                                <strong>User does not exist</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            @if (Route::has('password.request'))
                                                <a class="" style="float:right;" target="_blank" href="{{ route('password.request') }}">&nbsp;&nbsp;
                                                    <b class="text-color-blue">{{ __('Forgot your password?') }}</b>
                                                </a>
                                            @endif
                                            <div class="form-group has-feedback">
                                                <input id="passwordML" type="password" class="form-control login_input_style @error('email') is-invalid @enderror" name="password" required placeholder="Enter your password" autocomplete="current-password">
                                                <span class="form_icon_pos"><i class="fa fa-lock"></i></span>
                                            </div>

                                            <span class="custom-invalid-feedback3" id="login-pwd-err" role="alert">
                                                <strong>Password does not match with our records</strong>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-right">
                                    <button type="button" id="btn_login_common_ajax" href="#" class="btn">                                        
                                        <svg style="width:20px;height:14px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-in-alt fa-w-16 fa-3x"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z" class=""></path></svg>
                                        <span class="login_caption">LOGIN</span>
                                    </button>
                                </div>
                                 
                            </div>
                            
                            <div class="col-md-6">
                                <div class="text-center">
                                    <label for="">... Or sign in using</label>
                                </div>
                                <div class="login_list text-center m-t-10">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/redirect/google') }}">
                                                <span>
                                                    <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-3x"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" class=""></path></svg>
                                                </span>
                                            </a>
                                            <label for="">Gmail</label>
                                        </li>
                                        <li>
                                            <a href="{{ url('/redirect/facebook') }}">
                                            <span>
                                                <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-facebook-square fa-w-14 fa-3x"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z" class=""></path></svg>
                                            </span>                                            
                                            </a>
                                            <label for="">FB</label>
                                        </li>
                                        <li>
                                            <a href="{{ url('/redirect/linkedin') }}">
                                            <svg style="height:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-linkedin-in fa-w-14 fa-3x"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" class=""></path></svg>
                                            </a>
                                            <label for="">LinkedIn</label>
                                        </li>                                
                                    </ul>
                                </div>
                                <div class="user-option text-center">
                                    <label for="">Don't have AdnList account?</label>                                 
                                    <button class="btn_no_border_style btn_view_signup"><b class="text-color-blue">Sign up</b></button>                                                   
                                </div>
                                <br>
                                <div class="checkbox1 text-center">
                                    <span class="fs-14">By <b class="toggle_register_submit">Registering</b>, <span class="toggle_register_submit_text">you agree to AdnList</span>  <a href="{{ route('terms_use') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">Terms of use(TOU)</a>  and <a href="{{ route('privacy_policy') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">Privacy Policies.</span></a>
                                </div>                  
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div> 
        <div class="modal_signlist_form">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal_border_warp">                              
                        <div class="">                
                            <h4 class="modal-title text-center">Login</h4>
                        </div>
                        <br>        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 m-b-20">
                                    <a href="{{ url('/redirect/facebook') }}" class="btn_select_login_item">
                                        <span>
                                            <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-facebook-square fa-w-14 fa-3x"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z" class=""></path></svg>
                                        </span>
                                        &nbsp; 
                                        <span>FACEBOOK</span>
                                    </a>
                                </div>  
                                     
                                <div class="col-md-12 m-b-20">
                                    <a href="{{ url('/redirect/google') }}" class="btn_select_login_item">
                                        <span>
                                            <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" class="svg-inline--fa fa-google fa-w-16 fa-3x"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" class=""></path></svg>
                                        </span>
                                        &nbsp; 
                                        <span>GMAIL</span>
                                    </a>
                                </div>
                                    
                                <div class="col-md-12 m-b-20">
                                    <a href="{{ url('/redirect/twitter') }}" class="btn_select_login_item">
                                        <span>
                                            <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-twitter fa-w-16 fa-3x"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" class=""></path></svg>
                                        </span>
                                        &nbsp; 
                                        <span>TWITTER</span>
                                    </a>
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <a href="{{ url('/redirect/linkedin') }}" class="btn_select_login_item">
                                        <span>
                                            <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-linkedin-in fa-w-14 fa-3x"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" class=""></path></svg>
                                        </span>
                                        &nbsp; 
                                        <span>LINKEDIN</span>
                                    </a>
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <button type="button" id="btn_login_email" href="#" class="btn_select_login_item btn_select_login_item_email">
                                        <span>
                                            <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-3x"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" class=""></path></svg>
                                        </span>
                                        &nbsp; 
                                        <span>LOGIN WITH EMAIL</span>
                                    </button>
                                </div> 

                                <div class="col-md-12">
                                    <div class="checkbox1 text-center">
                                       <span class="fs-14">By  <b class="toggle_register_submit">Registering</b>, <span class="toggle_register_submit_text">you agree to AdnList</span>  <a href="{{ route('terms_use') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">Terms of use(TOU)</a>  and <a href="{{ route('privacy_policy') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">Privacy Policies.</span></a>
                                       <p class="text-center fs-12">
                                           * We do not share your personal information with anyone.
                                       </p>
                                    </div>                
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    <script>
        if(!$.cookie('agree'))
        {
            $(".cookie_warpper").animate({bottom:'0px'});
        }
        $(".btn_cookies_agree").on('click',function(){
            $.cookie('agree','true');
            $(".cookie_warpper").animate({bottom:'-150px'});
        });
        $(document).ready(function(){
            var w_height = $(window).height();
            var w_width = $(window).width();
            
			w_height -= 365;            
			$(".cs_home_border").css("min-height",w_height+"px");
            $("#main").css("min-height",($(window).height()-365)+"px");
            $(".auto_min_height").css("min-height",($(window).height()-350)+"px");
			$(window).on('resize', function()
			{
				var win = $(this);		
				w_width = $(this).width();				
                $("#main").css("min-height",(win.height()-365)+"px");
                // $(".auto_min_height").css("min-height",(w_height-350)+"px");
				if(win.width() >= 991)
				{					
					$(".cs_home_border").css("min-height",(win.height()-365)+"px");
				}
            });
            
            $(".login_success_alert").delay(5000).fadeOut("slow");
		});
    </script>   
   
    <script>
        if (typeof jQuery === "undefined") {
            throw new Error("jquery-confirm requires jQuery");
        }
        var jconfirm, Jconfirm;
        (function($, window) {
            $.fn.confirm = function(options, option2) {
                if (typeof options === "undefined") {
                    options = {};
                }
                if (typeof options === "string") {
                    options = {
                        content: options,
                        title: (option2) ? option2 : false
                    };
                }
                $(this).each(function() {
                    var $this = $(this);
                    if ($this.attr("jc-attached")) {
                        console.warn("jConfirm has already been attached to this element ", $this[0]);
                        return;
                    }
                    $this.on("click", function(e) {
                        e.preventDefault();
                        var jcOption = $.extend({}, options);
                        if ($this.attr("data-title")) {
                            jcOption.title = $this.attr("data-title");
                        }
                        if ($this.attr("data-content")) {
                            jcOption.content = $this.attr("data-content");
                        }
                        if (typeof jcOption.buttons == "undefined") {
                            jcOption.buttons = {};
                        }
                        jcOption["$target"] = $this;
                        if ($this.attr("href") && Object.keys(jcOption.buttons).length == 0) {
                            var buttons = $.extend(true, {}, jconfirm.pluginDefaults.defaultButtons, (jconfirm.defaults || {}).defaultButtons || {});
                            var firstBtn = Object.keys(buttons)[0];
                            jcOption.buttons = buttons;
                            jcOption.buttons[firstBtn].action = function() {
                                location.href = $this.attr("href");
                            };
                        }
                        jcOption.closeIcon = false;
                        var instance = $.confirm(jcOption);
                    });
                    $this.attr("jc-attached", true);
                });
                return $(this);
            };
            $.confirm = function(options, option2) {
                if (typeof options === "undefined") {
                    options = {};
                }
                if (typeof options === "string") {
                    options = {
                        content: options,
                        title: (option2) ? option2 : false
                    };
                }
                var putDefaultButtons = !(options.buttons == false);
                if (typeof options.buttons != "object") {
                    options.buttons = {};
                }
                if (Object.keys(options.buttons).length == 0 && putDefaultButtons) {
                    var buttons = $.extend(true, {}, jconfirm.pluginDefaults.defaultButtons, (jconfirm.defaults || {}).defaultButtons || {});
                    options.buttons = buttons;
                }
                return jconfirm(options);
            };
            $.alert = function(options, option2) {
                if (typeof options === "undefined") {
                    options = {};
                }
                if (typeof options === "string") {
                    options = {
                        content: options,
                        title: (option2) ? option2 : false
                    };
                }
                var putDefaultButtons = !(options.buttons == false);
                if (typeof options.buttons != "object") {
                    options.buttons = {};
                }
                if (Object.keys(options.buttons).length == 0 && putDefaultButtons) {
                    var buttons = $.extend(true, {}, jconfirm.pluginDefaults.defaultButtons, (jconfirm.defaults || {}).defaultButtons || {});
                    var firstBtn = Object.keys(buttons)[0];
                    options.buttons[firstBtn] = buttons[firstBtn];
                }
                return jconfirm(options);
            };
            $.dialog = function(options, option2) {
                if (typeof options === "undefined") {
                    options = {};
                }
                if (typeof options === "string") {
                    options = {
                        content: options,
                        title: (option2) ? option2 : false,
                        closeIcon: function() {}
                    };
                }
                options.buttons = {};
                if (typeof options.closeIcon == "undefined") {
                    options.closeIcon = function() {};
                }
                options.confirmKeys = [13];
                return jconfirm(options);
            };
            jconfirm = function(options) {
                if (typeof options === "undefined") {
                    options = {};
                }
                var pluginOptions = $.extend(true, {}, jconfirm.pluginDefaults);
                if (jconfirm.defaults) {
                    pluginOptions = $.extend(true, pluginOptions, jconfirm.defaults);
                }
                pluginOptions = $.extend(true, {}, pluginOptions, options);
                var instance = new Jconfirm(pluginOptions);
                jconfirm.instances.push(instance);
                return instance;
            };
            Jconfirm = function(options) {
                $.extend(this, options);
                this._init();
            };
            Jconfirm.prototype = {
                _init: function() {
                    var that = this;
                    if (!jconfirm.instances.length) {
                        jconfirm.lastFocused = $("body").find(":focus");
                    }
                    this._id = Math.round(Math.random() * 99999);
                    this.contentParsed = $(document.createElement("div"));
                    if (!this.lazyOpen) {
                        setTimeout(function() {
                            that.open();
                        }, 0);
                    }
                },
                _buildHTML: function() {
                    var that = this;
                    this._parseAnimation(this.animation, "o");
                    this._parseAnimation(this.closeAnimation, "c");
                    this._parseBgDismissAnimation(this.backgroundDismissAnimation);
                    this._parseColumnClass(this.columnClass);
                    this._parseTheme(this.theme);
                    this._parseType(this.type);
                    var template = $(this.template);
                    template.find(".jconfirm-box").addClass(this.animationParsed).addClass(this.backgroundDismissAnimationParsed).addClass(this.typeParsed);
                    if (this.typeAnimated) {
                        template.find(".jconfirm-box").addClass("jconfirm-type-animated");
                    }
                    if (this.useBootstrap) {
                        template.find(".jc-bs3-row").addClass(this.bootstrapClasses.row);
                        template.find(".jc-bs3-row").addClass("justify-content-md-center justify-content-sm-center justify-content-xs-center justify-content-lg-center");
                        template.find(".jconfirm-box-container").addClass(this.columnClassParsed);
                        if (this.containerFluid) {
                            template.find(".jc-bs3-container").addClass(this.bootstrapClasses.containerFluid);
                        } else {
                            template.find(".jc-bs3-container").addClass(this.bootstrapClasses.container);
                        }
                    } else {
                        template.find(".jconfirm-box").css("width", this.boxWidth);
                    }
                    if (this.titleClass) {
                        template.find(".jconfirm-title-c").addClass(this.titleClass);
                    }
                    template.addClass(this.themeParsed);
                    var ariaLabel = "jconfirm-box" + this._id;
                    template.find(".jconfirm-box").attr("aria-labelledby", ariaLabel).attr("tabindex", -1);
                    template.find(".jconfirm-content").attr("id", ariaLabel);
                    if (this.bgOpacity !== null) {
                        template.find(".jconfirm-bg").css("opacity", this.bgOpacity);
                    }
                    if (this.rtl) {
                        template.addClass("jconfirm-rtl");
                    }
                    this.$el = template.appendTo(this.container);
                    this.$jconfirmBoxContainer = this.$el.find(".jconfirm-box-container");
                    this.$jconfirmBox = this.$body = this.$el.find(".jconfirm-box");
                    this.$jconfirmBg = this.$el.find(".jconfirm-bg");
                    this.$title = this.$el.find(".jconfirm-title");
                    this.$titleContainer = this.$el.find(".jconfirm-title-c");
                    this.$content = this.$el.find("div.jconfirm-content");
                    this.$contentPane = this.$el.find(".jconfirm-content-pane");
                    this.$icon = this.$el.find(".jconfirm-icon-c");
                    this.$closeIcon = this.$el.find(".jconfirm-closeIcon");
                    this.$holder = this.$el.find(".jconfirm-holder");
                    this.$btnc = this.$el.find(".jconfirm-buttons");
                    this.$scrollPane = this.$el.find(".jconfirm-scrollpane");
                    that.setStartingPoint();
                    this._contentReady = $.Deferred();
                    this._modalReady = $.Deferred();
                    this.$holder.css({
                        "padding-top": this.offsetTop,
                        "padding-bottom": this.offsetBottom,
                    });
                    this.setTitle();
                    this.setIcon();
                    this._setButtons();
                    this._parseContent();
                    this.initDraggable();
                    if (this.isAjax) {
                        this.showLoading(false);
                    }
                    $.when(this._contentReady, this._modalReady).then(function() {
                        if (that.isAjaxLoading) {
                            setTimeout(function() {
                                that.isAjaxLoading = false;
                                that.setContent();
                                that.setTitle();
                                that.setIcon();
                                setTimeout(function() {
                                    that.hideLoading(false);
                                    that._updateContentMaxHeight();
                                }, 100);
                                if (typeof that.onContentReady === "function") {
                                    that.onContentReady();
                                }
                            }, 50);
                        } else {
                            that._updateContentMaxHeight();
                            that.setTitle();
                            that.setIcon();
                            if (typeof that.onContentReady === "function") {
                                that.onContentReady();
                            }
                        }
                        if (that.autoClose) {
                            that._startCountDown();
                        }
                    });
                    this._watchContent();
                    if (this.animation === "none") {
                        this.animationSpeed = 1;
                        this.animationBounce = 1;
                    }
                    this.$body.css(this._getCSS(this.animationSpeed, this.animationBounce));
                    this.$contentPane.css(this._getCSS(this.animationSpeed, 1));
                    this.$jconfirmBg.css(this._getCSS(this.animationSpeed, 1));
                    this.$jconfirmBoxContainer.css(this._getCSS(this.animationSpeed, 1));
                },
                _typePrefix: "jconfirm-type-",
                typeParsed: "",
                _parseType: function(type) {
                    this.typeParsed = this._typePrefix + type;
                },
                setType: function(type) {
                    var oldClass = this.typeParsed;
                    this._parseType(type);
                    this.$jconfirmBox.removeClass(oldClass).addClass(this.typeParsed);
                },
                themeParsed: "",
                _themePrefix: "jconfirm-",
                setTheme: function(theme) {
                    var previous = this.theme;
                    this.theme = theme || this.theme;
                    this._parseTheme(this.theme);
                    if (previous) {
                        this.$el.removeClass(previous);
                    }
                    this.$el.addClass(this.themeParsed);
                    this.theme = theme;
                },
                _parseTheme: function(theme) {
                    var that = this;
                    theme = theme.split(",");
                    $.each(theme, function(k, a) {
                        if (a.indexOf(that._themePrefix) === -1) {
                            theme[k] = that._themePrefix + $.trim(a);
                        }
                    });
                    this.themeParsed = theme.join(" ").toLowerCase();
                },
                backgroundDismissAnimationParsed: "",
                _bgDismissPrefix: "jconfirm-hilight-",
                _parseBgDismissAnimation: function(bgDismissAnimation) {
                    var animation = bgDismissAnimation.split(",");
                    var that = this;
                    $.each(animation, function(k, a) {
                        if (a.indexOf(that._bgDismissPrefix) === -1) {
                            animation[k] = that._bgDismissPrefix + $.trim(a);
                        }
                    });
                    this.backgroundDismissAnimationParsed = animation.join(" ").toLowerCase();
                },
                animationParsed: "",
                closeAnimationParsed: "",
                _animationPrefix: "jconfirm-animation-",
                setAnimation: function(animation) {
                    this.animation = animation || this.animation;
                    this._parseAnimation(this.animation, "o");
                },
                _parseAnimation: function(animation, which) {
                    which = which || "o";
                    var animations = animation.split(",");
                    var that = this;
                    $.each(animations, function(k, a) {
                        if (a.indexOf(that._animationPrefix) === -1) {
                            animations[k] = that._animationPrefix + $.trim(a);
                        }
                    });
                    var a_string = animations.join(" ").toLowerCase();
                    if (which === "o") {
                        this.animationParsed = a_string;
                    } else {
                        this.closeAnimationParsed = a_string;
                    }
                    return a_string;
                },
                setCloseAnimation: function(closeAnimation) {
                    this.closeAnimation = closeAnimation || this.closeAnimation;
                    this._parseAnimation(this.closeAnimation, "c");
                },
                setAnimationSpeed: function(speed) {
                    this.animationSpeed = speed || this.animationSpeed;
                },
                columnClassParsed: "",
                setColumnClass: function(colClass) {
                    if (!this.useBootstrap) {
                        console.warn("cannot set columnClass, useBootstrap is set to false");
                        return;
                    }
                    this.columnClass = colClass || this.columnClass;
                    this._parseColumnClass(this.columnClass);
                    this.$jconfirmBoxContainer.addClass(this.columnClassParsed);
                },
                _updateContentMaxHeight: function() {
                    var height = $(window).height() - (this.$jconfirmBox.outerHeight() - this.$contentPane.outerHeight()) - (this.offsetTop + this.offsetBottom);
                    this.$contentPane.css({
                        "max-height": height + "px"
                    });
                },
                setBoxWidth: function(width) {
                    if (this.useBootstrap) {
                        console.warn("cannot set boxWidth, useBootstrap is set to true");
                        return;
                    }
                    this.boxWidth = width;
                    this.$jconfirmBox.css("width", width);
                },
                _parseColumnClass: function(colClass) {
                    colClass = colClass.toLowerCase();
                    var p;
                    switch (colClass) {
                        case "xl":
                        case "xlarge":
                            p = "col-md-12";
                            break;
                        case "l":
                        case "large":
                            p = "col-md-8 col-md-offset-2";
                            break;
                        case "m":
                        case "medium":
                            p = "col-md-6 col-md-offset-3";
                            break;
                        case "s":
                        case "small":
                            p = "col-md-4 col-md-offset-4";
                            break;
                        case "xs":
                        case "xsmall":
                            p = "col-md-2 col-md-offset-5";
                            break;
                        default:
                            p = colClass;
                    }
                    this.columnClassParsed = p;
                },
                initDraggable: function() {
                    var that = this;
                    var $t = this.$titleContainer;
                    this.resetDrag();
                    if (this.draggable) {
                        $t.on("mousedown", function(e) {
                            $t.addClass("jconfirm-hand");
                            that.mouseX = e.clientX;
                            that.mouseY = e.clientY;
                            that.isDrag = true;
                        });
                        $(window).on("mousemove." + this._id, function(e) {
                            if (that.isDrag) {
                                that.movingX = e.clientX - that.mouseX + that.initialX;
                                that.movingY = e.clientY - that.mouseY + that.initialY;
                                that.setDrag();
                            }
                        });
                        $(window).on("mouseup." + this._id, function() {
                            $t.removeClass("jconfirm-hand");
                            if (that.isDrag) {
                                that.isDrag = false;
                                that.initialX = that.movingX;
                                that.initialY = that.movingY;
                            }
                        });
                    }
                },
                resetDrag: function() {
                    this.isDrag = false;
                    this.initialX = 0;
                    this.initialY = 0;
                    this.movingX = 0;
                    this.movingY = 0;
                    this.mouseX = 0;
                    this.mouseY = 0;
                    this.$jconfirmBoxContainer.css("transform", "translate(" + 0 + "px, " + 0 + "px)");
                },
                setDrag: function() {
                    if (!this.draggable) {
                        return;
                    }
                    this.alignMiddle = false;
                    var boxWidth = this.$jconfirmBox.outerWidth();
                    var boxHeight = this.$jconfirmBox.outerHeight();
                    var windowWidth = $(window).width();
                    var windowHeight = $(window).height();
                    var that = this;
                    var dragUpdate = 1;
                    if (that.movingX % dragUpdate === 0 || that.movingY % dragUpdate === 0) {
                        if (that.dragWindowBorder) {
                            var leftDistance = (windowWidth / 2) - boxWidth / 2;
                            var topDistance = (windowHeight / 2) - boxHeight / 2;
                            topDistance -= that.dragWindowGap;
                            leftDistance -= that.dragWindowGap;
                            if (leftDistance + that.movingX < 0) {
                                that.movingX = -leftDistance;
                            } else {
                                if (leftDistance - that.movingX < 0) {
                                    that.movingX = leftDistance;
                                }
                            }
                            if (topDistance + that.movingY < 0) {
                                that.movingY = -topDistance;
                            } else {
                                if (topDistance - that.movingY < 0) {
                                    that.movingY = topDistance;
                                }
                            }
                        }
                        that.$jconfirmBoxContainer.css("transform", "translate(" + that.movingX + "px, " + that.movingY + "px)");
                    }
                },
                _scrollTop: function() {
                    if (typeof pageYOffset !== "undefined") {
                        return pageYOffset;
                    } else {
                        var B = document.body;
                        var D = document.documentElement;
                        D = (D.clientHeight) ? D : B;
                        return D.scrollTop;
                    }
                },
                _watchContent: function() {
                    var that = this;
                    if (this._timer) {
                        clearInterval(this._timer);
                    }
                    var prevContentHeight = 0;
                    this._timer = setInterval(function() {
                        if (that.smoothContent) {
                            var contentHeight = that.$content.outerHeight() || 0;
                            if (contentHeight !== prevContentHeight) {
                                that.$contentPane.css({
                                    height: contentHeight
                                }).scrollTop(0);
                                prevContentHeight = contentHeight;
                            }
                            var wh = $(window).height();
                            var total = that.offsetTop + that.offsetBottom + that.$jconfirmBox.height() - that.$contentPane.height() + that.$content.height();
                            if (total < wh) {
                                that.$contentPane.addClass("no-scroll");
                            } else {
                                that.$contentPane.removeClass("no-scroll");
                            }
                        }
                    }, this.watchInterval);
                },
                _overflowClass: "jconfirm-overflow",
                _hilightAnimating: false,
                highlight: function() {
                    this.hiLightModal();
                },
                hiLightModal: function() {
                    var that = this;
                    if (this._hilightAnimating) {
                        return;
                    }
                    that.$body.addClass("hilight");
                    var duration = parseFloat(that.$body.css("animation-duration")) || 2;
                    this._hilightAnimating = true;
                    setTimeout(function() {
                        that._hilightAnimating = false;
                        that.$body.removeClass("hilight");
                    }, duration * 1000);
                },
                _bindEvents: function() {
                    var that = this;
                    this.boxClicked = false;
                    this.$scrollPane.click(function(e) {
                        if (!that.boxClicked) {
                            var buttonName = false;
                            var shouldClose = false;
                            var str;
                            if (typeof that.backgroundDismiss == "function") {
                                str = that.backgroundDismiss();
                            } else {
                                str = that.backgroundDismiss;
                            }
                            if (typeof str == "string" && typeof that.buttons[str] != "undefined") {
                                buttonName = str;
                                shouldClose = false;
                            } else {
                                if (typeof str == "undefined" || !!(str) == true) {
                                    shouldClose = true;
                                } else {
                                    shouldClose = false;
                                }
                            }
                            if (buttonName) {
                                var btnResponse = that.buttons[buttonName].action.apply(that);
                                shouldClose = (typeof btnResponse == "undefined") || !!(btnResponse);
                            }
                            if (shouldClose) {
                                that.close();
                            } else {
                                that.hiLightModal();
                            }
                        }
                        that.boxClicked = false;
                    });
                    this.$jconfirmBox.click(function(e) {
                        that.boxClicked = true;
                    });
                    var isKeyDown = false;
                    $(window).on("jcKeyDown." + that._id, function(e) {
                        if (!isKeyDown) {
                            isKeyDown = true;
                        }
                    });
                    $(window).on("keyup." + that._id, function(e) {
                        if (isKeyDown) {
                            that.reactOnKey(e);
                            isKeyDown = false;
                        }
                    });
                    $(window).on("resize." + this._id, function() {
                        that._updateContentMaxHeight();
                        setTimeout(function() {
                            that.resetDrag();
                        }, 100);
                    });
                },
                _cubic_bezier: "0.36, 0.55, 0.19",
                _getCSS: function(speed, bounce) {
                    return {
                        "-webkit-transition-duration": speed / 1000 + "s",
                        "transition-duration": speed / 1000 + "s",
                        "-webkit-transition-timing-function": "cubic-bezier(" + this._cubic_bezier + ", " + bounce + ")",
                        "transition-timing-function": "cubic-bezier(" + this._cubic_bezier + ", " + bounce + ")"
                    };
                },
                _setButtons: function() {
                    var that = this;
                    var total_buttons = 0;
                    if (typeof this.buttons !== "object") {
                        this.buttons = {};
                    }
                    $.each(this.buttons, function(key, button) {
                        total_buttons += 1;
                        if (typeof button === "function") {
                            that.buttons[key] = button = {
                                action: button
                            };
                        }
                        that.buttons[key].text = button.text || key;
                        that.buttons[key].btnClass = button.btnClass || "btn-default";
                        that.buttons[key].action = button.action || function() {};
                        that.buttons[key].keys = button.keys || [];
                        that.buttons[key].isHidden = button.isHidden || false;
                        that.buttons[key].isDisabled = button.isDisabled || false;
                        $.each(that.buttons[key].keys, function(i, a) {
                            that.buttons[key].keys[i] = a.toLowerCase();
                        });
                        var button_element = $('<button type="button" class="btn"></button>').html(that.buttons[key].text).addClass(that.buttons[key].btnClass).prop("disabled", that.buttons[key].isDisabled).css("display", that.buttons[key].isHidden ? "none" : "").click(function(e) {
                            e.preventDefault();
                            var res = that.buttons[key].action.apply(that, [that.buttons[key]]);
                            that.onAction.apply(that, [key, that.buttons[key]]);
                            that._stopCountDown();
                            if (typeof res === "undefined" || res) {
                                that.close();
                            }
                        });
                        that.buttons[key].el = button_element;
                        that.buttons[key].setText = function(text) {
                            button_element.html(text);
                        };
                        that.buttons[key].addClass = function(className) {
                            button_element.addClass(className);
                        };
                        that.buttons[key].removeClass = function(className) {
                            button_element.removeClass(className);
                        };
                        that.buttons[key].disable = function() {
                            that.buttons[key].isDisabled = true;
                            button_element.prop("disabled", true);
                        };
                        that.buttons[key].enable = function() {
                            that.buttons[key].isDisabled = false;
                            button_element.prop("disabled", false);
                        };
                        that.buttons[key].show = function() {
                            that.buttons[key].isHidden = false;
                            button_element.css("display", "");
                        };
                        that.buttons[key].hide = function() {
                            that.buttons[key].isHidden = true;
                            button_element.css("display", "none");
                        };
                        that["$_" + key] = that["$$" + key] = button_element;
                        that.$btnc.append(button_element);
                    });
                    if (total_buttons === 0) {
                        this.$btnc.hide();
                    }
                    if (this.closeIcon === null && total_buttons === 0) {
                        this.closeIcon = true;
                    }
                    if (this.closeIcon) {
                        if (this.closeIconClass) {
                            var closeHtml = '<i class="' + this.closeIconClass + '"></i>';
                            this.$closeIcon.html(closeHtml);
                        }
                        this.$closeIcon.click(function(e) {
                            e.preventDefault();
                            var buttonName = false;
                            var shouldClose = false;
                            var str;
                            if (typeof that.closeIcon == "function") {
                                str = that.closeIcon();
                            } else {
                                str = that.closeIcon;
                            }
                            if (typeof str == "string" && typeof that.buttons[str] != "undefined") {
                                buttonName = str;
                                shouldClose = false;
                            } else {
                                if (typeof str == "undefined" || !!(str) == true) {
                                    shouldClose = true;
                                } else {
                                    shouldClose = false;
                                }
                            }
                            if (buttonName) {
                                var btnResponse = that.buttons[buttonName].action.apply(that);
                                shouldClose = (typeof btnResponse == "undefined") || !!(btnResponse);
                            }
                            if (shouldClose) {
                                that.close();
                            }
                        });
                        this.$closeIcon.show();
                    } else {
                        this.$closeIcon.hide();
                    }
                },
                setTitle: function(string, force) {
                    force = force || false;
                    if (typeof string !== "undefined") {
                        if (typeof string == "string") {
                            this.title = string;
                        } else {
                            if (typeof string == "function") {
                                if (typeof string.promise == "function") {
                                    console.error("Promise was returned from title function, this is not supported.");
                                }
                                var response = string();
                                if (typeof response == "string") {
                                    this.title = response;
                                } else {
                                    this.title = false;
                                }
                            } else {
                                this.title = false;
                            }
                        }
                    }
                    if (this.isAjaxLoading && !force) {
                        return;
                    }
                    this.$title.html(this.title || "");
                    this.updateTitleContainer();
                },
                setIcon: function(iconClass, force) {
                    force = force || false;
                    if (typeof iconClass !== "undefined") {
                        if (typeof iconClass == "string") {
                            this.icon = iconClass;
                        } else {
                            if (typeof iconClass === "function") {
                                var response = iconClass();
                                if (typeof response == "string") {
                                    this.icon = response;
                                } else {
                                    this.icon = false;
                                }
                            } else {
                                this.icon = false;
                            }
                        }
                    }
                    if (this.isAjaxLoading && !force) {
                        return;
                    }
                    this.$icon.html(this.icon ? '<i class="' + this.icon + '"></i>' : "");
                    this.updateTitleContainer();
                },
                updateTitleContainer: function() {
                    if (!this.title && !this.icon) {
                        this.$titleContainer.hide();
                    } else {
                        this.$titleContainer.show();
                    }
                },
                setContentPrepend: function(content, force) {
                    if (!content) {
                        return;
                    }
                    this.contentParsed.prepend(content);
                },
                setContentAppend: function(content) {
                    if (!content) {
                        return;
                    }
                    this.contentParsed.append(content);
                },
                setContent: function(content, force) {
                    force = !!force;
                    var that = this;
                    if (content) {
                        this.contentParsed.html("").append(content);
                    }
                    if (this.isAjaxLoading && !force) {
                        return;
                    }
                    this.$content.html("");
                    this.$content.append(this.contentParsed);
                    setTimeout(function() {
                        that.$body.find("input[autofocus]:visible:first").focus();
                    }, 100);
                },
                loadingSpinner: false,
                showLoading: function(disableButtons) {
                    this.loadingSpinner = true;
                    this.$jconfirmBox.addClass("loading");
                    if (disableButtons) {
                        this.$btnc.find("button").prop("disabled", true);
                    }
                },
                hideLoading: function(enableButtons) {
                    this.loadingSpinner = false;
                    this.$jconfirmBox.removeClass("loading");
                    if (enableButtons) {
                        this.$btnc.find("button").prop("disabled", false);
                    }
                },
                ajaxResponse: false,
                contentParsed: "",
                isAjax: false,
                isAjaxLoading: false,
                _parseContent: function() {
                    var that = this;
                    var e = "&nbsp;";
                    if (typeof this.content == "function") {
                        var res = this.content.apply(this);
                        if (typeof res == "string") {
                            this.content = res;
                        } else {
                            if (typeof res == "object" && typeof res.always == "function") {
                                this.isAjax = true;
                                this.isAjaxLoading = true;
                                res.always(function(data, status, xhr) {
                                    that.ajaxResponse = {
                                        data: data,
                                        status: status,
                                        xhr: xhr
                                    };
                                    that._contentReady.resolve(data, status, xhr);
                                    if (typeof that.contentLoaded == "function") {
                                        that.contentLoaded(data, status, xhr);
                                    }
                                });
                                this.content = e;
                            } else {
                                this.content = e;
                            }
                        }
                    }
                    if (typeof this.content == "string" && this.content.substr(0, 4).toLowerCase() === "url:") {
                        this.isAjax = true;
                        this.isAjaxLoading = true;
                        var u = this.content.substring(4, this.content.length);
                        $.get(u).done(function(html) {
                            that.contentParsed.html(html);
                        }).always(function(data, status, xhr) {
                            that.ajaxResponse = {
                                data: data,
                                status: status,
                                xhr: xhr
                            };
                            that._contentReady.resolve(data, status, xhr);
                            if (typeof that.contentLoaded == "function") {
                                that.contentLoaded(data, status, xhr);
                            }
                        });
                    }
                    if (!this.content) {
                        this.content = e;
                    }
                    if (!this.isAjax) {
                        this.contentParsed.html(this.content);
                        this.setContent();
                        that._contentReady.resolve();
                    }
                },
                _stopCountDown: function() {
                    clearInterval(this.autoCloseInterval);
                    if (this.$cd) {
                        this.$cd.remove();
                    }
                },
                _startCountDown: function() {
                    var that = this;
                    var opt = this.autoClose.split("|");
                    if (opt.length !== 2) {
                        console.error("Invalid option for autoClose. example 'close|10000'");
                        return false;
                    }
                    var button_key = opt[0];
                    var time = parseInt(opt[1]);
                    if (typeof this.buttons[button_key] === "undefined") {
                        console.error("Invalid button key '" + button_key + "' for autoClose");
                        return false;
                    }
                    var seconds = Math.ceil(time / 1000);
                    this.$cd = $('<span class="countdown"> (' + seconds + ")</span>").appendTo(this["$_" + button_key]);
                    this.autoCloseInterval = setInterval(function() {
                        that.$cd.html(" (" + (seconds -= 1) + ") ");
                        if (seconds <= 0) {
                            that["$$" + button_key].trigger("click");
                            that._stopCountDown();
                        }
                    }, 1000);
                },
                _getKey: function(key) {
                    switch (key) {
                        case 192:
                            return "tilde";
                        case 13:
                            return "enter";
                        case 16:
                            return "shift";
                        case 9:
                            return "tab";
                        case 20:
                            return "capslock";
                        case 17:
                            return "ctrl";
                        case 91:
                            return "win";
                        case 18:
                            return "alt";
                        case 27:
                            return "esc";
                        case 32:
                            return "space";
                    }
                    var initial = String.fromCharCode(key);
                    if (/^[A-z0-9]+$/.test(initial)) {
                        return initial.toLowerCase();
                    } else {
                        return false;
                    }
                },
                reactOnKey: function(e) {
                    var that = this;
                    var a = $(".jconfirm");
                    if (a.eq(a.length - 1)[0] !== this.$el[0]) {
                        return false;
                    }
                    var key = e.which;
                    if (this.$content.find(":input").is(":focus") && /13|32/.test(key)) {
                        return false;
                    }
                    var keyChar = this._getKey(key);
                    if (keyChar === "esc" && this.escapeKey) {
                        if (this.escapeKey === true) {
                            this.$scrollPane.trigger("click");
                        } else {
                            if (typeof this.escapeKey === "string" || typeof this.escapeKey === "function") {
                                var buttonKey;
                                if (typeof this.escapeKey === "function") {
                                    buttonKey = this.escapeKey();
                                } else {
                                    buttonKey = this.escapeKey;
                                }
                                if (buttonKey) {
                                    if (typeof this.buttons[buttonKey] === "undefined") {
                                        console.warn("Invalid escapeKey, no buttons found with key " + buttonKey);
                                    } else {
                                        this["$_" + buttonKey].trigger("click");
                                    }
                                }
                            }
                        }
                    }
                    $.each(this.buttons, function(key, button) {
                        if (button.keys.indexOf(keyChar) != -1) {
                            that["$_" + key].trigger("click");
                        }
                    });
                },
                setDialogCenter: function() {
                    console.info("setDialogCenter is deprecated, dialogs are centered with CSS3 tables");
                },
                _unwatchContent: function() {
                    clearInterval(this._timer);
                },
                close: function(onClosePayload) {
                    var that = this;
                    if (typeof this.onClose === "function") {
                        this.onClose(onClosePayload);
                    }
                    this._unwatchContent();
                    $(window).unbind("resize." + this._id);
                    $(window).unbind("keyup." + this._id);
                    $(window).unbind("jcKeyDown." + this._id);
                    if (this.draggable) {
                        $(window).unbind("mousemove." + this._id);
                        $(window).unbind("mouseup." + this._id);
                        this.$titleContainer.unbind("mousedown");
                    }
                    that.$el.removeClass(that.loadedClass);
                    $("body").removeClass("jconfirm-no-scroll-" + that._id);
                    that.$jconfirmBoxContainer.removeClass("jconfirm-no-transition");
                    setTimeout(function() {
                        that.$body.addClass(that.closeAnimationParsed);
                        that.$jconfirmBg.addClass("jconfirm-bg-h");
                        var closeTimer = (that.closeAnimation === "none") ? 1 : that.animationSpeed;
                        setTimeout(function() {
                            that.$el.remove();
                            var l = jconfirm.instances;
                            var i = jconfirm.instances.length - 1;
                            for (i; i >= 0; i--) {
                                if (jconfirm.instances[i]._id === that._id) {
                                    jconfirm.instances.splice(i, 1);
                                }
                            }
                            if (!jconfirm.instances.length) {
                                if (that.scrollToPreviousElement && jconfirm.lastFocused && jconfirm.lastFocused.length && $.contains(document, jconfirm.lastFocused[0])) {
                                    var $lf = jconfirm.lastFocused;
                                    if (that.scrollToPreviousElementAnimate) {
                                        var st = $(window).scrollTop();
                                        var ot = jconfirm.lastFocused.offset().top;
                                        var wh = $(window).height();
                                        if (!(ot > st && ot < (st + wh))) {
                                            var scrollTo = (ot - Math.round((wh / 3)));
                                            $("html, body").animate({
                                                scrollTop: scrollTo
                                            }, that.animationSpeed, "swing", function() {
                                                $lf.focus();
                                            });
                                        } else {
                                            $lf.focus();
                                        }
                                    } else {
                                        $lf.focus();
                                    }
                                    jconfirm.lastFocused = false;
                                }
                            }
                            if (typeof that.onDestroy === "function") {
                                that.onDestroy();
                            }
                        }, closeTimer * 0.4);
                    }, 50);
                    return true;
                },
                open: function() {
                    if (this.isOpen()) {
                        return false;
                    }
                    this._buildHTML();
                    this._bindEvents();
                    this._open();
                    return true;
                },
                setStartingPoint: function() {
                    var el = false;
                    if (this.animateFromElement !== true && this.animateFromElement) {
                        el = this.animateFromElement;
                        jconfirm.lastClicked = false;
                    } else {
                        if (jconfirm.lastClicked && this.animateFromElement === true) {
                            el = jconfirm.lastClicked;
                            jconfirm.lastClicked = false;
                        } else {
                            return false;
                        }
                    }
                    if (!el) {
                        return false;
                    }
                    var offset = el.offset();
                    var iTop = el.outerHeight() / 2;
                    var iLeft = el.outerWidth() / 2;
                    iTop -= this.$jconfirmBox.outerHeight() / 2;
                    iLeft -= this.$jconfirmBox.outerWidth() / 2;
                    var sourceTop = offset.top + iTop;
                    sourceTop = sourceTop - this._scrollTop();
                    var sourceLeft = offset.left + iLeft;
                    var wh = $(window).height() / 2;
                    var ww = $(window).width() / 2;
                    var targetH = wh - this.$jconfirmBox.outerHeight() / 2;
                    var targetW = ww - this.$jconfirmBox.outerWidth() / 2;
                    sourceTop -= targetH;
                    sourceLeft -= targetW;
                    if (Math.abs(sourceTop) > wh || Math.abs(sourceLeft) > ww) {
                        return false;
                    }
                    this.$jconfirmBoxContainer.css("transform", "translate(" + sourceLeft + "px, " + sourceTop + "px)");
                },
                _open: function() {
                    var that = this;
                    if (typeof that.onOpenBefore === "function") {
                        that.onOpenBefore();
                    }
                    this.$body.removeClass(this.animationParsed);
                    this.$jconfirmBg.removeClass("jconfirm-bg-h");
                    this.$body.focus();
                    that.$jconfirmBoxContainer.css("transform", "translate(" + 0 + "px, " + 0 + "px)");
                    setTimeout(function() {
                        that.$body.css(that._getCSS(that.animationSpeed, 1));
                        that.$body.css({
                            "transition-property": that.$body.css("transition-property") + ", margin"
                        });
                        that.$jconfirmBoxContainer.addClass("jconfirm-no-transition");
                        that._modalReady.resolve();
                        if (typeof that.onOpen === "function") {
                            that.onOpen();
                        }
                        that.$el.addClass(that.loadedClass);
                    }, this.animationSpeed);
                },
                loadedClass: "jconfirm-open",
                isClosed: function() {
                    return !this.$el || this.$el.css("display") === "";
                },
                isOpen: function() {
                    return !this.isClosed();
                },
                toggle: function() {
                    if (!this.isOpen()) {
                        this.open();
                    } else {
                        this.close();
                    }
                }
            };
            jconfirm.instances = [];
            jconfirm.lastFocused = false;
            jconfirm.pluginDefaults = {
                template: '<div class="jconfirm"><div class="jconfirm-bg jconfirm-bg-h"></div><div class="jconfirm-scrollpane"><div class="jconfirm-row"><div class="jconfirm-cell"><div class="jconfirm-holder"><div class="jc-bs3-container"><div class="jc-bs3-row"><div class="jconfirm-box-container jconfirm-animated"><div class="jconfirm-box" role="dialog" aria-labelledby="labelled" tabindex="-1"><div class="jconfirm-closeIcon">&times;</div><div class="jconfirm-title-c"><span class="jconfirm-icon-c"></span><span class="jconfirm-title"></span></div><div class="jconfirm-content-pane"><div class="jconfirm-content"></div></div><div class="jconfirm-buttons"></div><div class="jconfirm-clear"></div></div></div></div></div></div></div></div></div></div>',
                title: "Hello",
                titleClass: "",
                type: "default",
                typeAnimated: true,
                draggable: true,
                dragWindowGap: 15,
                dragWindowBorder: true,
                animateFromElement: true,
                alignMiddle: true,
                smoothContent: true,
                content: "Are you sure to continue?",
                buttons: {},
                defaultButtons: {
                    ok: {
                        action: function() {}
                    },
                    close: {
                        action: function() {}
                    }
                },
                contentLoaded: function() {},
                icon: "",
                lazyOpen: false,
                bgOpacity: null,
                theme: "light",
                animation: "scale",
                closeAnimation: "scale",
                animationSpeed: 400,
                animationBounce: 1,
                escapeKey: true,
                rtl: false,
                container: "body",
                containerFluid: false,
                backgroundDismiss: false,
                backgroundDismissAnimation: "shake",
                autoClose: false,
                closeIcon: null,
                closeIconClass: false,
                watchInterval: 100,
                columnClass: "col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1",
                boxWidth: "50%",
                scrollToPreviousElement: true,
                scrollToPreviousElementAnimate: true,
                useBootstrap: true,
                offsetTop: 40,
                offsetBottom: 40,
                bootstrapClasses: {
                    container: "container",
                    containerFluid: "container-fluid",
                    row: "row"
                },
                onContentReady: function() {},
                onOpenBefore: function() {},
                onOpen: function() {},
                onClose: function() {},
                onDestroy: function() {},
                onAction: function() {}
            };
            var keyDown = false;
            $(window).on("keydown", function(e) {
                if (!keyDown) {
                    var $target = $(e.target);
                    var pass = false;
                    if ($target.closest(".jconfirm-box").length) {
                        pass = true;
                    }
                    if (pass) {
                        $(window).trigger("jcKeyDown");
                    }
                    keyDown = true;
                }
            });
            $(window).on("keyup", function() {
                keyDown = false;
            });
            jconfirm.lastClicked = false;
            $(document).on("mousedown", "button, a", function() {
                jconfirm.lastClicked = $(this);
            });
        })(jQuery, window);
    </script>
    <script src="{{ asset('assets/js/signup.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/jquery-confirm.min.js') }}"></script> --}}
    
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
    
    
</body>

</html>
