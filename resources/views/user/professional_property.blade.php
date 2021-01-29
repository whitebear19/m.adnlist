
@extends('layouts.main')
@section('script')    
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
@endsection
@section('style')    
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="auto_min_height" id="propertyDetail">
        <div class="container p-t-20">
            <div class="row">
                <div class="col-md-12">
                    <ul class="p-l-0 propertyDetail_ul">
                        <li class="propertyDetailimage">
                            <img src="{{ asset('/img/comingsoon.jpg') }}" alt="">
                        </li>
                        <li class="propertyDetailservices">
                            <div class="propertyDetailservices_content">
                                <h1 class="propertyDetailservices_content_title">Residential Plot for Sale in Dholera, Ahmedabad</h1>
                                <p>
                                    <span>(2435sweetwater road National city, CA, USA)</span>&nbsp;
                                    <span><svg aria-hidden="true" style="height:12px;" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-map-marker-alt fa-w-12 fa-3x"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" class=""></path></svg>&nbsp;View Map</span>
                                </p>
                                <div class="m-t-30">
                                    <ul class="propertyDetailservices_content_ul">
                                        <li>
                                            <div class="border-right">
                                                <span>Plot/Land Area</span>
                                                <p><label for="">102 Sq.Yards</label></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="border-right">
                                                <span>Ownership</span>
                                                <p><label for="">Builder</label></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="border-right">
                                                <span>Sale Type</span>
                                                <p><label for="">New</label></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span>Type</span>
                                                <p><label for="">Residential Plots</label></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <label for="" class="fs-18 text-left">Price: $350,000</label> &nbsp;&nbsp;&nbsp;
                                <a href="javascript:;" data-toggle="modal" data-value="login" data-target="#contact" class="contactnow">Contact Now</a>
                                <p><label for="">Seller: Mistry Johson(Sea Coast Inclusive properties)</label></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
                
            <div class="row m-t-20 m-b-20">
                <div class="col-md-7">
                    <label for="">About property</label>
                    <textarea name="" class="form-control propertyDetailcommonstyle"></textarea>
                </div>
                <div class="col-md-5">
                    <label for="">Short Info</label>
                    <div class="short_warp_style propertyDetailcommonstyle">
                        <label for="" class="fs-14 text-color-blue">Property amenities</label>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        </p>
                        <label for="" class="fs-14 text-color-blue">Property near to</label>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="text-color-blue">More Listings</label>
                    <ul class="p-l-0">
                        <li class="recentListingItem">
                            <a href="{{ url('/professional_property',['all']) }}">
                                <div class="result-image gallery">
                                    <img src="{{ asset('/img/comingsoon.jpg') }}" alt="">
                                    <span class="professional_title">Condo</span>
                                    <span class="professional_time">3HOURS AGE</span>
                                    <span class="professional_price">$439,900</span>
                                </div>
                            </a>
                            <div class="warp_text_area">
                                
                                <span class="username">3</span><span>bed</span>
                                <span class="username">1007</span><span>sqft</span>
                                <span class="username">8100</span><span>sqft lot</span>
                                <p class="fs-12">5519 Bolivar St, San Diego, CA 92139</p>
                                                               
                                <a href="" class="contactnow">Contact Now</a>
                                <span class="numberOflistings">Regency Realtor Inc</span>
                            </div>                            
                        </li>
                        <li class="recentListingItem">
                            <a href="{{ url('/professional_property',['all']) }}">
                                <div class="result-image gallery">
                                    <img src="{{ asset('/img/comingsoon.jpg') }}" alt="">
                                    <span class="professional_title">Condo</span>
                                    <span class="professional_time">3HOURS AGE</span>
                                    <span class="professional_price">$439,900</span>
                                </div>
                            </a>
                            <div class="warp_text_area">
                                
                                <span class="username">3</span><span>bed</span>
                                <span class="username">1007</span><span>sqft</span>
                                <span class="username">8100</span><span>sqft lot</span>
                                <p class="fs-12">5519 Bolivar St, San Diego, CA 92139</p>
                                                               
                                <a href="" class="contactnow">Contact Now</a>
                                <span class="numberOflistings">Regency Realtor Inc</span>
                            </div>                            
                        </li>
                        <li class="recentListingItem">
                            <a href="{{ url('/professional_property',['all']) }}">
                                <div class="result-image gallery">
                                    <img src="{{ asset('/img/comingsoon.jpg') }}" alt="">
                                    <span class="professional_title">Condo</span>
                                    <span class="professional_time">3HOURS AGE</span>
                                    <span class="professional_price">$439,900</span>
                                </div>
                            </a>
                            <div class="warp_text_area">
                                
                                <span class="username">3</span><span>bed</span>
                                <span class="username">1007</span><span>sqft</span>
                                <span class="username">8100</span><span>sqft lot</span>
                                <p class="fs-12">5519 Bolivar St, San Diego, CA 92139</p>
                                                               
                                <a href="" class="contactnow">Contact Now</a>
                                <span class="numberOflistings">Regency Realtor Inc</span>
                            </div>                            
                        </li>
                        <li class="recentListingItem">
                            <a href="{{ url('/professional_property',['all']) }}">
                                <div class="result-image gallery">
                                    <img src="{{ asset('/img/comingsoon.jpg') }}" alt="">
                                    <span class="professional_title">Condo</span>
                                    <span class="professional_time">3HOURS AGE</span>
                                    <span class="professional_price">$439,900</span>
                                </div>
                            </a>
                            <div class="warp_text_area">
                                
                                <span class="username">3</span><span>bed</span>
                                <span class="username">1007</span><span>sqft</span>
                                <span class="username">8100</span><span>sqft lot</span>
                                <p class="fs-12">5519 Bolivar St, San Diego, CA 92139</p>
                                                               
                                <a href="" class="contactnow">Contact Now</a>
                                <span class="numberOflistings">Regency Realtor Inc</span>
                            </div>                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="contact" role="dialog">
        <div class="modal_contact_form">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal_border_warp">
                        <button type="button" class="close" data-dismiss="modal" style="position: absolute;top: 5px;right: 5px;z-index:999;">
                            <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-times-circle fa-w-16 fa-3x"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z" class=""></path></svg>    
                        </button>   
                        <form action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Contact</label>
                                    <div class="form-group has-feedback">
                                        <input id="" type="text" class="form-control login_input_style J_required_filed" name="" placeholder="Name" autocomplete="off">                                   
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input id="" type="text" class="form-control login_input_style J_required_filed" name="" placeholder="Email" autocomplete="off">                                   
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input id="" type="text" class="form-control login_input_style J_required_filed" name="" placeholder="Phone" autocomplete="off">                                   
                                    </div>
                                    <div class="form-group has-feedback">
                                        <textarea id="" type="text" class="form-control login_input_style J_required_filed" name="" placeholder="" autocomplete="off"></textarea>                                   
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="checkbox"><label for="" class="text-color-blue">Request property tour</label>    
                                        <div>
                                            <input type="text" placeholder="Select date" style="width:160px;padding-left:10px;">    
                                            <input type="text" placeholder="Time" style="width:80px;padding-left:10px;">    
                                            <input type="text" placeholder="AM" style="width:45px;padding-left:10px;">    
                                        </div>                          
                                    </div>
                                    <div class="form-group text-center m-t-20">
                                        <button class="btn_green btn">Submit</button>
                                    </div>        
                                    </div>
                                </div>
                            </div>  
                        </form>      
                        
                    </div>
                </div>
            </div>
        </div>            
    </div>
@endsection
    
	