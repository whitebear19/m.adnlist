@extends('layouts.main')
@section('style')    
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">   
@endsection
@section('script')
    <script src="{{ asset('assets/js/autosize.js') }}"></script>
@endsection
@section('content')
<section id="listing_category" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left m-t-5">                                
                <P class="category_detail"><a href="{{ url('/') }}" class="show_navigate_home"><span><i class="fa fa-home"></i></span></a><span class="show_navigate_status">Post Details</span></P>            
            </div>
        </div>
    </div>
</section>

<section id="main" class="clearfix details-page">
    <div class="container">
        <div class="section slider">
            <div class="final_part">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-color-blue fs-20">{{ $selected_news->subject }}</h3>
                        <span class="detail_business">
                            {{ $selected_news->type }}
                        </span>
                    </div>
                    @if(!empty($selected_news->image))
                        <div class="col-md-6">
                            <textarea style="border:none;box-shadow:none;outline:none;font-family:Arial;line-height:25px;background:#e3e3e1;" id="post_detail" readonly>{{ $selected_news->body }}</textarea>
                        </div>  
                        <div class="col-md-6">
                            <img src="{{ asset('upload/img/ads/'.$selected_news->image) }}" style="width:100%;"  alt="">
                            @if(!empty($selected_news->link))
                                <a target="_blank" class="btn btn-blue" style="float:right;margin-top:20px;" href="@if(substr($selected_news->link,0,4) == "http"){{ $selected_news->link }}@else{{ "http://" }}{{ $selected_news->link }}@endif">Click for more</a>
                            @endif
                        </div>                 
                    @else
                        <div class="col-md-12 p-t-20">
                            <textarea style="border:none;box-shadow:none;outline:none;font-family:Arial;line-height:25px;background:#e3e3e1;" id="post_detail" readonly>{{ $selected_news->body }}</textarea>
                            
                            @if(!empty($selected_news->link))
                                <a target="_blank" class="btn btn-blue" style="float:right;margin-top:20px;" href="@if(substr($selected_news->link,0,4) == "http"){{ $selected_news->link }}@else{{ "http://" }}{{ $selected_news->link }}@endif">Click for more</a>
                            @endif
                        </div>                
                    @endif                  
                </div>	
            </div>				
        </div>
    </div>
</section>

<script>
    autosize(document.getElementById("post_detail"));
</script>
@endsection


