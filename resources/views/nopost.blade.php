@extends('layouts.main')

@section('content')
<style>
    .error_text{padding: 200px;}
    .error_text h3{color:#0000ee;}
    @media(max-width:700px)
    {
        .error_text{
        text-align: center;
        padding: 200px 20px;        
    }
    }
</style>

<section id="error_page_banner" style="height:70vh;background-size:contain;">
    <div class="error_text">          
        <h3>Oops, post not found!</h3>        
    </div>
</section>   

@endsection
	
