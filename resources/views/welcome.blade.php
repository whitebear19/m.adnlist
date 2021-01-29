@extends('layouts.main')

@section('content')


<section id="banner" class="parallex-bg">
	<div class="container cs_home_border">		
		<div class="row">
			<div class="col-md-12">
				<div class="intro_text intro_text_wrap div_zindex">	
					<h1 class="cs_home_main_title">{{ trans('message.home_title') }}</h1>
					<div class="search_form_warp">
						<form action="/category_views" class="homesearchTolist" method="">
							<ul>
								<li class="cs_home_search_location_fixed_width">
									<div class="form-group m_resp_mb_25">						
									<input type="text" class="form-control" id="welcomelocation" name="location" placeholder="{{ trans('message.home_placeholder_entercity') }}" value="@if(session('city') == "all" || session('city') == "") {{ "All cities" }} @else {{ session('city') }}, {{ session('state_a') }} , {{ session('country') }} @endif">										
									<p class="cs_home_added_county" style="font-weight:600;"><span class="cs_home_show_county">@if(!empty(session('county'))) {{ session('county') }} {{ trans('message.county') }} , {{ session('state_a') }} @endif</span><span>&nbsp;{{ trans('message.classifieds') }}</span></p>

										<input type="hidden" name="homepage" value="home">
										<input type="hidden" name="search_city" class="search_city" value="@if(!empty(session('city'))) {{ session('city') }}@endif">
                                        <input type="hidden" name="search_county" class="search_county" value="@if(!empty(session('county'))) {{ session('county') }} @else {{ $county }}@endif">
										<input type="hidden" name="search_state" class="search_state" value="@if(!empty(session('state_a'))) {{ session('state_a') }} @else {{ $state }}@endif">   
										<input type="hidden" name="category_id" class="category_id" value="all">          
									</div>		
								</li>
								<li class="cs_home_search_width">
									<div class="form-group">
									<input type="text" class="form-control" name="search" placeholder="{{ trans('message.home_enter_searchword') }}">
									</div>
								</li>
								<li>
									<div class="form-group search_btn">
										<input type="button" value="Search" style="height:38px;" class="btn btn-block btn-green btn-home-search">
									</div>
								</li>
							</ul>							
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8 m-t-20">				
				<div class="cs_home_category_warp">	
					<ul>
						@if(empty(!$all_category))
							@foreach($all_category as $item)
								<li>									
									<a href="#" class="category_item_home" data-id="{{ $item['0'] }}">
										<div class="category_icon">
											<div class="category_icon_area category_icon_position{{ $item['0'] }}">
												<div class="category_icon_background">
												</div>												
											</div>											
											<div class="category_name_area">
												<p class="" title="{{ $item['1'] }}"><b>{{ $item['1'] }}</b></p>
											</div>																			
										</div>											
									</a>									
								</li>
							@endforeach
						@endif				
					</ul>	
				</div>
			</div>
			<div class="col-md-4 m-t-20">
				
				@if (session('sentlink'))
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>{{ trans('message.alert_warning') }}!</strong> <span>{{ session('sentlink') }}</span>
					</div>
				@endif
				<div class="cs_home_download_warp text-left">	
					<h3 class="fs-16">Download on</h3>
					<ul>
						<li>
							<a href="">
								<img src="{{ asset('assets/images/icon_appstore.png') }}" alt="">
							</a>
						</li>
						<li>
							<a href="">
								<img src="{{ asset('assets/images/icon_googleplay.png') }}" alt="">
							</a>
						</li>
					</ul>
					<div class="cs_home_download_warp_sel">
						<ul>
							<li>
								<label class="radio_container">Phone number
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="radio_container">Email address
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
							</li>
						</ul>
						<div>
							<div class="input_group">
								<span class="form_prepend">
									<svg style="width: 20px;height:20px;color:#707070;" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="mobile-android-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-mobile-android-alt fa-w-10 fa-3x"><path fill="currentColor" d="M224 96v240H96V96h128m48-96H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM48 480c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h224c8.8 0 16 7.2 16 16v416c0 8.8-7.2 16-16 16H48zM244 64H76c-6.6 0-12 5.4-12 12v280c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12zm-48 352h-72c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h72c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12z" class=""></path></svg>
								</span>
								<input class="form-control" type="text" name="" id="">
								<button class="btn_send btn_form_afterpend">
									send
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="row d-none">
			<div class="col-md-6">
				<p class="text-center fs-14"><b>
					<span>{{ trans('business.hometext1') }}</span>
					<a href="" class="text-color-blue">{{ trans('business.registernow') }}</a></b>
				</p>
				<a href="" class="text-color-blue fs-16"><b>{{ trans('business.findbusiness') }}</b></a>
			</div>
			<div class="col-md-6">

			</div>
		</div>		
		<div class="row d-none">
			<div class="col-md-12">
				<div class="business_item">
					<ul>
						<li>
							<a href="{{ url('professional_view/1/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Real Estate</p>
									<p class="business_detail">buy,sell,rent</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/2/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Home Improvement</p>
									<p class="business_detail">Contractors Interior</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/3/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Pets</p>
									<p class="business_detail">cat,dog</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/4/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Lawyers/ Attorny Services</p>
									<p class="business_detail">buy,sell,rent</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/1/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Baby care</p>
									<p class="business_detail">apparels, gear, toys</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/2/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Event</p>
									<p class="business_detail">party</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/3/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Pets</p>
									<p class="business_detail">salons grooming, wets</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/4/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Lawyers/ Attorny Services</p>
									<p class="business_detail">buy,sell,rent</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/1/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Baby care</p>
									<p class="business_detail">apparels, gear, toys</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/2/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Event</p>
									<p class="business_detail">birthday, wedding</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/3/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Pets</p>
									<p class="business_detail">salons grooming, wets</p>
								</div>
							</a>
						</li>
						<li>
							<a href="{{ url('professional_view/4/1') }}">
								<img src="{{ asset('upload/img/business/1.png') }}" alt="">
								<div class="business_note">
									<p class="business_title">Lawyers/ Attorny Services</p>
									<p class="business_detail">buy,sell,rent</p>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="advertise_column">
					<div class="advertise_column_item">
						<label for="">Advertise here...</label>
						<p class="text-color-blue">Contact: promote@adnlist.com</p>
					</div>
					<br>
					<div class="advertise_column_item">
						<label for="">Advertise here...</label>
						<p class="text-color-blue">Contact: promote@adnlist.com</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">		
			<div class="col-md-12 text-center">
				<h4 class="fs-18 selected m-t-20 m-b-20">Recent updates</h4>
			</div>						
		</div>
		<div class="row post_area">

		</div>
		<div class="row">
			<div class="col-md-12 m-t-20">
				<div class="logo_loading">
					<img class="" src="{{ asset('assets/images/logo_loading.png') }}" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid m-t-5 fluid_padding">
		
	</div>
	
</section>


<script>
	var pagenum_cur = 1;
	var pagenum_max = 1;
	var autocomplete;
	function get_posts_home()
	{
		$(".logo_loading").css("display","block");
		$.ajax({
			url: '/api/get_posts_home?page='+pagenum_cur,
			type: 'get',
			dataType: 'json',
			
			success : function(data) {
				$(".logo_loading").css("display","none");
				var results = data.results;
				pagenum_max = data.pagenum_max;
				console.log(results);
				console.log(pagenum_max);
				for (let index = 0; index < results.length; index++) {
					var html = `
					<div class="col-6 col-sm-3">
						<div class="post_wrap">
							<div class="post_img">
								<span class="like_post">${results[index].cat_name}</span>
								<a class="get_pid" data_pid="${results[index].id}" href="/category_view/detail/${results[index].id}/all"><img style="width:100%;" class="" src="${results[index].img}" alt="image"></a>
							</div>
							<div class="post_info">
								<div class="post_info_title">
									<h4><a class="get_pid" data_pid="${results[index].id}" href="/category_view/detail/${results[index].id}/all"> <span class="common_post_title">${results[index].title}</span> </a></h4>
								</div>
								<div class="post_meta">                                                    
									<p class="left"><span><i class="fa fa-map-marker m-r-5"></i></span> <span class="location_time">${results[index].location}</span></p>
									<p class="right location_time"> <i class="fa fa-dot-circle-o m-r-5"></i>${results[index].created_at}</p>
								</div>	
							</div>
						</div>
					</div>
					
					`;
					$(".post_area").append(html);
				}

			},
			error: function(data) {
				$(".logo_loading").css("display","none");
			}
		});
	}

	$(document).ready(function(){		
		$(".btn-home-search").click(function(){			
			$(".homesearchTolist").submit();
		})
		$(".category_item_home").click(function(){
			var id = $(this).data("id");
			$(".category_id").val(id);
			$(".homesearchTolist").submit();
		});
		get_posts_home();
		$(window).scroll(function() {
			if($(window).scrollTop() + $(window).height() == $(document).height()) {
				if(pagenum_cur >= pagenum_max)
				{
					return false;
				}
				else
				{
					pagenum_cur +=1;
					get_posts_home();
				}
			}
		});
	});

	function fillInAddress()
	{ 		
		var place = autocomplete.getPlace();		
		var address_components = place.address_components;        
            
        $.each(address_components, function(index, component){
            var types = component.types;			 
            $.each(types, function(index, type){
                if(type == 'locality') {
                    city = component.long_name;                
                }
                if(type == 'administrative_area_level_1') {
                    state = component.short_name;
                }
                if(type == 'administrative_area_level_2') {
                    county = component.short_name;
                    county = county.replace(' County','');
                }
            });
        });
    
        $(".search_city").val(city);
        $(".search_state").val(state);        
        $(".search_county").val(county);
	
		if(county != "")
		{			
			$(".cs_home_show_county").html(county+' County, '+state);
		}
		else
		{
			$(".cs_home_show_county").html("");
		}

		$.ajax({
			url: "/register_position",
			data: {county: county,state: state,city: city},
			dataType: "json",
			type: "get",
			success: function(data)
			{
				location.reload();				
			}
		});
	}
	function initMap() 
	{ 		 
		autocomplete = new google.maps.places.Autocomplete(document.getElementById('welcomelocation'), {types: ['(cities)'],componentRestrictions: {country: "us"}}); 
		autocomplete.addListener('place_changed', fillInAddress);
	}
	
</script>
@endsection
	
