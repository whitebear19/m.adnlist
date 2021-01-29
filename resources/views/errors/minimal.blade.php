
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="map_api_key" content="">
    <meta name="description" content="AdnList is the largest classifieds website where you can post your ad and get response.">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" type="text/css">
    
    
    <link href="{{ asset('assets/css/util.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}">
	
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>	
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>   
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script> 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                /* display: flex; */
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
            .error_page{
                /* margin-top: 150px;
                margin-left: 150px; */
                position: fixed;
                bottom: 10px;
                left: 0px;
                width: 100%;
                text-align: center;
            }
            .error_title{
                font-size: 34px;
                color: #717171;
            }
            .error_content{
                font-size: 26px;
                color: #717171;
                margin-top: 20px;
                margin-left: 90px;
                font-weight: 500;
                text-align: center;
            }
            @media(max-width:767px)
            {
                .error_page {margin-top: 100px;margin-left: 0px;text-align: center;}
                .error_content {
                    font-size: 25px;
                    color: #000;
                    margin-top: 40px;
                    margin-left: 0px;
                    font-weight: 600;
                    text-align: center;
                }
                .error_title {
                    font-size: 28px;
                    color: #1b48c7;
                }
                #error_page_banner {
                    background-size: contain;
                    width: 100%;
                }
                .full-height {height: 65vh;}
            }
        </style>
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
                                <a href="{{ route('login') }}" class="change-text btn_auth_new">Login</a>                                
                            @endif
                        </li>
                        
                        <li>
                            @if(Auth::check())
                                <a href="{{ route('create_post') }}" class="resp_padding_20_0">                               
                                    <span class="btn-postfreead">                                       
                                        <span style="color:#ffffff;">Post</span>
                                    </span>
                                </a>
                            @else                                
                                <a href="{{ route('login') }}" class="change-text" >                               
                                    <span class="btn-postfreead">                                       
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
		
    <section id="error_page_banner">
        <div class="flex-center position-ref full-height">           
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
            <div class="error_page">
                @yield('page_custom')
            </div>
        </div>
    </section>   
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
                            <button type="button" class="close" data-dismiss="modal" style="position: absolute;top: 5px;right: 5px;">
                                <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-times-circle fa-w-16 fa-3x"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z" class=""></path></svg>    
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
                                    <button type="button" id="btn_register_common_ajax" class="btn btn_green btn_register m-t-20" disabled><i class="fa fa-sign-out"></i>&nbsp; <span>{{ __('REGISTER') }}</span>
                                        
                                    </button>
                                     <button class="btn_no_border_style btn_view_signin">Already have an account?&nbsp;&nbsp;<b class="text-color-blue">Login</b></button>
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
                        <button type="button" class="close" data-dismiss="modal" style="position: absolute;top: 5px;right: 5px;z-index:999;">
                            <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-times-circle fa-w-16 fa-3x"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z" class=""></path></svg>    
                        </button>         
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
                                                    <svg style="width:20px;height:20px;margin-top:5px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-3x"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" class=""></path></svg>
                                                </span>
                                            </a>
                                            <label for="">Gmail</label>
                                        </li>
                                        <li>
                                            <a href="{{ url('/redirect/facebook') }}">
                                            <span>
                                                <svg style="width:20px;height:20px;margin-top:5px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-facebook-square fa-w-14 fa-3x"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z" class=""></path></svg>
                                            </span>                                            
                                            </a>
                                            <label for="">FB</label>
                                        </li>
                                        <li>
                                            <a href="{{ url('/redirect/linkedin') }}">
                                            <svg style="height:20px;height:20px;margin-top:5px;" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-linkedin-in fa-w-14 fa-3x"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" class=""></path></svg>
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
       
    </div>
    <script src="{{ asset('assets/js/signup.js') }}"></script>
    
</body>

</html>
