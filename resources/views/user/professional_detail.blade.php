
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
    <section class="auto_min_height" id="profileDetail">
        <div class="container p-t-20">
            <div class="row">
                <div class="col-md-3">
                    <div class="">
                        <a href="">
                            <div class="result-image gallery">
                                <img src="{{ asset('/img/comingsoon.jpg') }}" alt="">
                            </div>
                        </a>
                        <div class="warp_text_area">
                            <span>
                                <span class="username">Slavisa B.</span>
                                <span class="">
                                    <div class="Rating Rating--labeled info-card-rating" data-star_rating="4.8">
                                        <span class="Rating-total">
                                            <span class="Rating-progress"></span>
                                        </span>
                                    </div>
                                    <span class="numberOfreview">(78 reviews)</span>                                                
                                </span>
                            </span>
                            <p class="userlocation">2435 sweetwater road, San Diego, CA, 91950</p>
                            <p class="userdetail_line">
                                <label for="" class="text-color-blue">License:</label><label for="">California bar</label>
                            </p>
                            <p class="userdetail_line">
                                <label for="" class="text-color-blue">Licensed in:</label><label for="">CA,AL,MN</label>
                            </p>
                            <p class="userdetail_line">
                                <label for="" class="text-color-blue">Experience:</label><label for="">8years 7months</label>
                            </p>
                            <p class="userdetail_line">
                                <label for="" class="text-color-blue">Brokerage:</label><label for="" class="text-color-purple">Coldwell banker Resi.Co</label>
                            </p>
                            <p class="userdetail_line">
                                <label for="" class="text-color-blue">Areas serve:</label><br>
                                <label for="">San Diego, San Mareos</label>
                            </p>
                            <p class="userdetail_line">
                                <label for="" class="text-color-blue">Specializations:</label><br>
                            </p>
                            <br>
                            <p class="userdetail_line">
                                <label for="" class="text-color-blue">Profiles & URLs:</label><br>
                                
                            </p>
                        </div>                        
                    </div>
                </div>
                <div class="col-md-9">
                    <ul class="p-l-0">
                        <li class="wrap_aboutMe">
                            <div>
                                <label for="">About me</label>
                                <textarea name="" class="form-control" id="detail_aboutMe"></textarea>
                            </div>
                        </li>
                        <li class="wrap_contactMe">                            
                            <label for="" class="text-color-blue">Contact me</label>
                            <div class="wrap_contactMe_inner">
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" maxlength="50" class="form-control" name="name" required autocomplete="off" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" maxlength="50" class="form-control" name="email" required autocomplete="off" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" maxlength="11" class="form-control" name="phone" required autocomplete="off" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" maxlength="30" class="form-control" name="message" required autocomplete="off" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="checkbox"><label for="" class="text-color-blue">Request property tour</label>    
                                        <div>
                                            <input type="text" placeholder="Select date" style="width:140px;padding-left:10px;">    
                                            <input type="text" placeholder="Time" style="width:80px;padding-left:10px;">    
                                            <input type="text" placeholder="AM" style="width:45px;padding-left:10px;">    
                                        </div>                          
                                    </div>
                                    <div class="form-group text-center m-t-20">
                                        <button class="btn_green btn">Submit</button>
                                    </div>        
                                </form>
                            </div>                            
                        </li>
                    </ul>
                    <label for="" style="border-bottom:2px solid #0000ee" class="text-color-blue">My Recent Listings</label>
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
                    </ul>
                    <div style="clear:both;"></div>
                    <div class="professional_reviews">
                        <label for="" style="border-bottom:2px solid #0000ee" class="text-color-blue">Reviews</label>
                        <ul class="p-l-0 m-t-20">
                            <li>
                                <div class="review_content">
                                    <div class="reivew_title">
                                        <p>"Great realtor in San Diego County ever I met and have lot of local knowledge."</p>
                                    </div>
                                    <div class="review_user">
                                        <p>"Johe Moore"</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="review_content">
                                    <div class="reivew_title">
                                        <p>"Experties with local lands and homes and cheap rates brokarage Great realtor in San Diego County ever I met and have lot of local knowledge."</p>
                                    </div>
                                    <div class="review_user">
                                        <p>"Johe Moore"</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    
	