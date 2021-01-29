@extends('layouts.main')

@section('style')    
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-confirm.min.css') }}" rel="stylesheet">
@endsection

@section('script')   
    <script src="{{ asset('assets/js/jquery-confirm.min.js') }}"></script>
@endsection
@section('content')

<section class="auto_min_height clearfix user-page">
    <div class="container">
        <div class="row text-center">            
            <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">           
                <div class="user-account">
                    <h4 class="modal-title text-center fs-16 text-color-green">{{ trans('cat.post_stored') }}</h4>
                </div>                
            </div>		
        </div>
    </div>
</section>