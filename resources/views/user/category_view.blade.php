
@extends('layouts.main')
@section('script')
    <script src="{{ asset('assets/js/address_autofill.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>    
    <script src="{{ asset('assets/js/slick.js') }}"></script>
@endsection
@section('style')   
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">    
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section id="listing_category" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-left m-t-5">                    
                    <P class="category_detail"><a href="{{ url('/') }}" class="show_navigate_home"><span><i class="fa fa-home"></i></span></a><span class="show_navigate_status">@if(!empty($cur_category) && ($cur_category != "all")){{ $cur_category->name }}@else All Categories @endif</span></P>
                    <div class="accordion">                        
                        <div class="panel-group" id="accordion">
                            <div class="panel-default panel-faq">                                
                                <div class="panel-heading active-faq">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-one"
                                        aria-expanded="true" class="">
                                        <h4 class="panel-title">What are you looking for?
                                            <span class="pull-right"><i class="fa fa-minus"></i></span>
                                        </h4>
                                    </a>
                                </div>

                                <div id="accordion-one" class="panel-collapse collapse in" tabindex="0"
                                    aria-expanded="true" style="">
                                    
                                    <div class="panel-body custom_scroll" id="cat-scroll">                                        
                                        @if(!empty($all_category))
                                            <ul role="tablist" class="cs_category_view_list">
                                                    <li>                                                        
                                                        <div class="all_category_view">
                                                            <span data-id="all" class="category_list_item fs-16 p-l-30 
                                                            @if ($cur_category == "all")
                                                                selected
                                                            @endif
                                                            "><b>All Categories</b></span>                                    
                                                        </div>
                                                    </li>
                                                @foreach($all_category as $item)
                                                    <li>
                                                        <a href="#"><span class="select cat_icon_style">
                                                            <img class="category_view_image" src="{{ asset($item->image) }}" alt="Images"></span>
                                                            @if($cur_category =="all")
                                                                <span class="category_list_item" data-id="{{ $item->id }}">{{ $item->name }}</span>
                                                            @else
                                                                @if($cur_category->slug == $item->slug) <span data-id="{{ $item->id }}" class="category_list_item selected checked" style="letter-spacing:-0.2px">{{ $item->name }}</span> @else <span data-id="{{ $item->id }}" class="category_list_item">{{ $item->name }}</span> @endif 
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-9 m-t-5">                    
                    <div class="search_form_listing intro_text_wrap">                        
                        <form action="" class="search-form" method='get'>                        
                            <div class="row">
                                <div class="col-sm-4 search_p_r_0">
                                    <div class="m-t-5">                                                
                                        <input type="text" id="welcomelocation" class="form-control text-color-blue" name="location" value="@if(!empty($city)){{ $city }}, {{ $state }},{{ "US" }} @endif">
                                        <input type="hidden" name="autofill_city" class="autofill_city" value="">
                                        <input type="hidden" name="search_city" class="search_city" value="{{ $city }}">
                                        <input type="hidden" name="search_county" class="search_county" value="{{ $county }}">
                                        <input type="hidden" name="search_state" class="search_state" value="{{ $state }}">   
                                        <input type="hidden" name="sub_category" class="sub_category" value="">   
                                        <input type="hidden" name="category_id" class="category_id" value="{{ $category_id }}">   
                                        <input type="hidden" name="sub_cat_id" class="sub_cat_id" value="">   
                                        <p class="show_cur_location_in_view"><span class="sel_address_with_count">{{ $county }}&nbsp;County,{{ $state }}</span> Classifieds</p>                                  
                                    </div>
                                </div>    
                                <div class="col-sm-5">                                            
                                    <div class="m-t-4">                                                
                                        <input type="text" class="form-control auto_submit" name="search" placeholder="eg.cars" value="{{ $search }}">
                                    </div>
                                </div>    
                                  
                                <div class="col-sm-3">
                                    <div class="m-t-4">                                               
                                        <div class="text-center">
                                            <div class="m-t-0" style="display:inline-block;">
                                                <button type="button" class="btn_search_view">Search</button>
                                                <button class="tablinks view_list text-color-green" type="button" data-value="list"><i class="fa fa-th-list"></i> </button>
                                                <button class="tablinks view_grid" type="button" data-value="grid"><i class="fa fa-th-large"></i> </button>
                                                <button class="tablinks view_col" type="button" data-value="col"><i class="fa fa-align-justify"></i> </button>                                                
                                            </div>                                            
                                        </div>                                                
                                    </div>
                                </div>
                            </div>                                                           
                        </form>
                    </div>  
                    
                    <div class="m-t-20 area_subcategory">
                        <div class="area_subcategory_ul">
                                                         
                        </div>
                    </div>
                
                    <div class="">                               
                        <div id="Grid" class="tabcontent grid m-t-15" style="display:none;">
                            <div class="row post_grid">
                                
                            </div>
                        </div>

                        <div id="List" class="tabcontent m-t-15" style="">
                            <div class="">
                                <ul class="p-l-0 post_list">
                                
                                </ul>                            
                            </div>
                            
                        </div>
                        <div id="Col" class="tabcontent  m-t-15" style="display:none;">
                            <!-- ad-item -->
                            <div class="row table-responsive resp_margin_auto" style="min-height: 100px">
                                <div class="col-md-12">                                                           
                                    <ul class="normal_ul post_col">
                                                                        
                                    </ul>  
                                </div>
                            </div>
                        </div>
                       

                        <div class="row">
                            <div class="col-md-12 m-t-20">
                                <div class="logo_loading">
                                    <img class="" src="{{ asset('assets/images/logo_loading.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="listing_banner" class="section_padding m-t-30">
        <div class="container-fluid fluid-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="m-b-20">Do you have something to post?</h2>
                    <h5 class="m-b-20">Post your ad for free on adnlist.com</h5>
                    @if(Auth::check())
                        <a href="{{ route('create_post') }}" class="btn">Post Your Ad</a>
                    @else
                        <a href="javascript:;" data-toggle="modal" data-value="login" data-target="#signModal" class="btn">Post Your Ad</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script>
        var pagenum_cur = 1;
        var pagenum_max = 1;
        var autocomplete;        
        var needSetSlick = true;
        function setSlick()
        {
            $(".area_subcategory_ul").slick({
                dots: false,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                centerMode: false,
                variableWidth: true
            });
            var right_arrow = `
                <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-circle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-chevron-circle-right fa-w-16 fa-3x"><path fill="currentColor" d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z" class=""></path></svg>
            `;
            $(".slick-next").html(right_arrow);
            var left_arrow = `
                <svg style="width:20px;height:20px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-circle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-chevron-circle-left fa-w-16 fa-2x"><path fill="currentColor" d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z" class=""></path></svg>
            `;
            $(".slick-prev").html(left_arrow);
            needSetSlick = false;
        }
        function get_posts_view()
        {
            $(".logo_loading").css("display","block");
            var data = $(".search-form").serialize();
            $.ajax({
                url: '/api/get_posts_view?page='+pagenum_cur,
                type: 'get',
                dataType: 'json',
                data: data,
                success : function(data) {
                    $(".logo_loading").css("display","none");
                    var results = data.results;
                    pagenum_max = data.pagenum_max;
                    var sub_list = data.sub_list;
                    console.log(data);                    
                    if(results.length > 0)
                    {
                        for (let index = 0; index < results.length; index++) {
                            var htmlgrid = `
                            <div class="col-sm-4">
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
                            $(".post_grid").append(htmlgrid);

                            var htmllist = `
                                <li style="list-style-type:none;">
                                    <div class="" style="border: 1px solid #e3e3e3; ">
                                        <div class="item-image">
                                            <a href="/category_view/detail/${results[index].id}/all" class="post_url get_pid" data_pid="${results[index].id}">
                                                <img src="${results[index].img}" alt="Image"
                                                    class="img-responsive">
                                            </a>                                                    
                                        </div> 
                                        <div class="ad-info"> 
                                            <h4 class="item-title"><a data_pid="${results[index].id}" class="post_url get_pid" href="/category_view/detail/${results[index].id}/all"><span class="common_post_title">${results[index].title}</span></a></h4>
                                            <div class="item-cat">
                                                <span>${results[index].cat_name}</span>                                
                                            </div>
                                            <div class="item-cat location_time">
                                                <span class="m-r-20"><i class="fa fa-dot-circle-o m-r-5"></i>${results[index].created_at}</span> 
                                                <span><i class="fa fa-map-marker m-r-5"></i>${results[index].location}</span>                                   
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            `;
                            $(".post_list").append(htmllist);

                            var htmlcol = `
                                <li>
                                    <a href="/category_view/detail/${results[index].id}/all" data_pid="${results[index].id}" class="get_pid text-justify M_disp_flex normal-title">
                                        <div class="item-image"><label class="col-black m-r-10 fs-14">${results[index].created_at}</label></div>
                                        <div class="ad-info">
                                            <p class="col-title common_post_title" style="line-height:25px;">${results[index].title}</p>
                                            <p class="left fs-14 text-color-grey location_time" style="line-height:12px;font-weight:400;"><span><i class="fa fa-map-marker price"></i></span> <span>${results[index].location}</span></p>
                                        </div>                                                    
                                    </a>
                                </li>
                            `;
                            $(".post_col").append(htmlcol);
                        }
                    }
                    else
                    {
                        var html = `
                            <div class="row">                                    
                                <div class="col-sm-12">
                                    <p class="text-color-blue" style="text-align:center;"><b>No post</b></p>
                                </div>
                            </div>
                        `;
                        $(".post_grid").append(html);
                        $(".post_list").append(html);
                        $(".post_col").append(html);
                    }
                    if(needSetSlick)
                    {
                        if(sub_list.length>0)
                        {
                            var html = `
                                <div class="item-subcat">
                                    <button data-value="all" class="btn_subcat_item selected">
                                        All
                                    </button>
                                </div>      
                            `;
                            $(".area_subcategory_ul").append(html);

                            for (let index = 0; index < sub_list.length; index++) {
                                var name = '';
                                if(sub_list[index].is_main == "1")
                                {
                                    name = "All " + sub_list[index].name;
                                }
                                else
                                {
                                    name = sub_list[index].name;
                                }
                                var html = `
                                    <div class="item-subcat">
                                        <button data-value="${sub_list[index].id}" class="btn_subcat_item">
                                            ${name}
                                        </button>
                                    </div>      
                                `;
                                $(".area_subcategory_ul").append(html);
                            }   
                            setSlick();
                        }
                    }                    

                },
                error: function(data) {
                    $(".logo_loading").css("display","none");
                }
            });
        }
        function init_post_area()
        {
            $(".post_grid").html("");
            $(".post_list").html("");
            $(".post_col").html("");        
            pagenum_cur = 1;   
        }
        function init_sub_area()
        {            
            $(".area_subcategory_ul").html("");                         
            $(".area_subcategory_ul").removeClass("slick-initialized slick-slider");   
            needSetSlick = true;   
            $(".sub_cat_id").val("");
        }        
        $(document).ready(function()
        {
            get_posts_view();
            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() == $(document).height()) {
                    if(pagenum_cur >= pagenum_max)
                    {
                        return false;
                    }
                    else
                    {
                        pagenum_cur +=1;
                        get_posts_view();
                    }
                }
            });
            $(document).on('click','.btn_subcat_item',function(){            
                $(".btn_subcat_item").removeClass("selected");
                $(this).addClass("selected");
                var value = $(this).data("value");
                $(".sub_cat_id").val(value);
                init_post_area();
                get_posts_view();
            });
            $(document).on('click','.category_list_item',function(){            
                $(".category_list_item").removeClass("selected");
                $(this).addClass("selected");
                var id = $(this).data("id");
                $(".category_id").val(id);
                var content = $(this).html();
                $(".show_navigate_status").html(content);
                init_post_area();
                init_sub_area();
                get_posts_view();
            });                      

            $(document).on("click",".btn_search_view",function(){
                init_post_area();
                get_posts_view();
            });
                     
        });
    </script>
@endsection
    
	