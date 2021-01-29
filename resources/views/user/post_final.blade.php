@extends('layouts.main')
@section('style')    
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">   
@endsection
@section('content')
<section id="listing_category" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left m-t-5">                                
                <P class="category_detail"><a href="{{ url('/') }}" class="show_navigate_home"><span><i class="fa fa-home"></i></span></a><span class="show_navigate_status">{{ trans('cat.post_submitted') }}</span></P>            
            </div>
        </div>
    </div>
</section>

<section id="main" class="clearfix details-page">
    <div class="container">
        <div class="section slider">
            <div class="row">
                <div class="col-md-12 p-t-20">
                    <div class="final_part">
                        @if (Session::has('success'))
                            
                            <p class="text-color-blue"><b>{{ trans('cat.thankyou') }}! {{ Session::get('success') }}</b></p>
                            
                        @endif
                        @if(Auth::check())
                            @if(Auth::user()->email_verified_at)
                                <p class="final-text">
                                    {{ trans('cat.final_text1') }}
                                </p>                                                               
                            @else
                                <p class="final-text">
                                    {{ trans('cat.final_text2') }}
                                </p>
                                <p class="text-color-red"> {{ trans('cat.final_text3') }}</p>                            
                            @endif
                        @endif
                        <p class="final-text1">
                            {{ trans('cat.final_text4') }}
                        </p>
                        <br>
                        <ul>
                            <li>
                                <p> {{ trans('cat.final_text5') }}</p>
                            </li>
                            <li>
                                <p> {{ trans('cat.final_text6') }}</p>
                            </li>
                            <li>
                                <p> {{ trans('cat.final_text7') }}</p>
                            </li>
                            <li>
                                <p> {{ trans('cat.final_text8') }}</p>
                            </li>
                        </ul>
                        
                        @if(Auth::check())                                
                            <p class="final-text">
                                {{ trans('cat.final_text9') }}
                            </p>                           
                        @endif
                    </div>                        
                </div>	
            </div>				
        </div>
    </div>
</section>
<input type="hidden" class="current_page" value="final">
@endsection


