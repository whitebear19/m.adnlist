
@extends('errors::minimal')

@section('title', __('Not Found'))

@section('page_custom')
    <div>
        <h1 class="error_title">We looked really hard!</h1>
        <p class="error_content">500 Server Error!</p>
    </div>
    
@endsection
