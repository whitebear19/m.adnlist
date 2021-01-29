@extends('errors::minimal')

@section('title', __('Not Found'))

@section('page_custom')
    <div>
        <h1 class="error_title">Oops, looks like the page is lost.</h1>
        <p class="error_content">This is not a fault, just an accident that was not intentional.</p>
    </div>
    
@endsection
