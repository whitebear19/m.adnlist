@extends('layouts.loginmain')

@section('style')    
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="auto_min_height clearfix user-page">
    <div class="container">
        <div class="row text-center">
            
            <div class="col-sm-12">
            @if (session('error'))
                <div class="alert alert-warning alert-dismissible show align-center m-t-120" style="margin-bottom:-80px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong class="m-r-20" style="color:red;">Warning!</strong> <span>Your account on AdnList is deactivated . Please contact support at</span> &nbsp;&nbsp; <a href="mailto:"><span><b>{{ session('error') }}</b></span></a>&nbsp;&nbsp; <span>for any queries.</span>
                </div>
            @endif       
                <h2 class="fs-30">Login</h2> 
                <div class="modal_signin_form">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal_border_warp">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <form  method="POST" id="signin-form-Modal" action="{{ route('login') }}" accept-charset="utf-8" class="myform form" role="form">
                                        @csrf                    
                                            
                                            <div class="modal-body">
                                                
                                                <div class="form-group m-b-15 m-t-10">
                                                    <label for="">Email</label>
                                                    <div class="form-group has-feedback">
                                                        <input id="email" type="email" maxlength="60" class="form-control @error('email') is-invalid @enderror login_input_style" name="email" required autocomplete="email" placeholder="Enter your email" autofocus>
                                                        <span class="form_icon_pos"><i class="fa fa-envelope"></i></span>
                                                    </div>
                                                    @error('email')
                                                        <span class="invalid-feedback3" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    @if (Route::has('password.request'))
                                                        <a class="" style="float:right;" target="_blank" href="{{ route('password.request') }}">&nbsp;&nbsp;
                                                            <b class="text-color-blue">{{ __('Forgot your password?') }}</b>
                                                        </a>
                                                    @endif
                                                    <div class="form-group has-feedback">
                                                        <input id="password" type="password" maxlength="30" class="form-control login_input_style @error('email') is-invalid @enderror" name="password" required placeholder="Enter your password" autocomplete="current-password">
                                                        <span class="form_icon_pos"><i class="fa fa-lock"></i></span>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback3" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" id="btn_login_common_ajax" href="#" class="btn">                                        
                                                        <svg style="width:20px;height:14px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-in-alt fa-w-16 fa-3x"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z" class=""></path></svg>
                                                        <span class="login_caption">LOGIN</span>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
                                            
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
                                            <a href="{{ url('/register') }}" class="btn_no_border_style btn_view_signup"><b class="text-color-blue">Sign up</b></a>                                                   
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
        </div>
    </div>
</section>

@endsection
