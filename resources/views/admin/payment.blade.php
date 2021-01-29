@extends('layouts.admin')

@section('content')

<style type="text/css">
    .panel-title {
    display: inline;
    font-weight: bold;
    }
    .display-table {
        display: table;
    }
    .display-tr {
        display: table-row;
    }
    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
        color: white;
    }
    .margin_top{margin-top:20px;}
    .margin_bottom{margin-bottom:30px;}
    /* -----------------------price_plan_page----------------------------- */
    .price_plan_ul{padding:0px;margin: 5px 10px;}
    .price_plan_ul li{list-style-type: none;width: 100px;display: inline-block;margin-right: 22px;}
    .price_plan_calander_img{width:50%;}
    .price_plan_item label{display: block;text-align: center;}        
    .price_plan_item_body{text-align: center;border: 1px solid #dedede;border-radius: 5px;}
    .price_plan_item_body:hover{cursor: pointer}
    .price_plan_item_title{font-weight: 600;color:black;}
    .price_plan_item_price{font-weight: 600;color:#08752c;font-size: 16px;}
    .price_plan_part{background: white;margin: 0px 0px;padding: 1px 1px;}
    .price_plan_ul li input{margin-top:5px;margin-bottom: 5px;}
    .selected_plan{border-color: #0011ee;}        
    .selected_plan_name {text-transform: capitalize;}
    .paid_plan{text-align: center;padding-bottom: 20px;}
    .stripe_card_info{display: none;}
    .final_part {background: #e3e3e3;padding: 30px;min-height: 521px;box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.5);margin-bottom: 20px;}
/* --------------------------------------------------------------------- */
    @media(max-width:991px)
    {
        .margin_top{margin-top:0px;}
        .margin_bottom{margin-bottom:0px;}
    }
</style>



<div class="">    
    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
    @csrf
        <input type="hidden" name="selected_plan" id="selected_plan" value="">
        <input type="hidden" name="post_id" value="{{ $cur_adn->id }}">
        <input type="hidden" name="which" value="admin">
        <div class=""> 
            <div class="row">
                <div class="col-md-6 p-t-20">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" style="background:#464646;width:100%;">
                            <div class="row display-tr" >
                                <h3 class="panel-title display-td" >Payment Details</h3>
                                <div class="display-td" >                            
                                    <img class="img-responsive pull-right" src="{{ asset('assets/images/accepted_c22e0.png') }}">
                                </div>
                            </div>                    
                        </div>
                        <div class="panel-body">
                            <div class="price_plan_part">
                                <label for="" class="text-color-blue">Select Plan</label>
                                <ul class="price_plan_ul">                                            
                                    <li>
                                        <div class="price_plan_item">
                                            <div class="align-center">
                                                <label for="" class="price_plan_item_title">Premium</label>
                                            </div>
                                            <div class="price_plan_item_body" data-title="premium" data-value="{{ $site_record->price_premium }}">
                                                <label for="" class="price_plan_item_title">15Days</label>
                                                <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                <label for="" class="price_plan_item_price">Price:{{ $site_record->price_premium }}$</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="price_plan_item">
                                            <div class="align-center">
                                                <label for="" class="price_plan_item_title">Platinum</label>
                                            </div>
                                            <div class="price_plan_item_body" data-title="platinum" data-value="{{ $site_record->price_platinum }}">
                                                <label for="" class="price_plan_item_title">30Days</label>
                                                <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                <label for="" class="price_plan_item_price">Price:{{ $site_record->price_platinum }}$</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="price_plan_item">
                                            <div class="align-center">
                                                <label for="" class="price_plan_item_title">Dimond</label>
                                            </div>
                                            <div class="price_plan_item_body" data-title="dimond" data-value="{{ $site_record->price_dimond }}">
                                                <label for="" class="price_plan_item_title">45Days</label>
                                                <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                <label for="" class="price_plan_item_price">Price:{{ $site_record->price_dimond }}$</label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="stripe_card_info">
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required '>
                                        <input class='form-control' size='4' placeholder="Name on Card" type='text'>
                                    </div>
                                </div>
            
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required '>
                                        <input autocomplete='off' placeholder="Card Number" class='form-control card-number' size='20'
                                            type='text'>
                                    </div>
                                </div>
            
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
            
            
                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>
                            </div>                                       
                            
                            <div class='form-row row'>
                                <div class='col-md-12 error form-group @if(!session('error')) hide @endif'>
                                    <div class='alert-danger alert'>@if(session('error')){{ session('error') }} @else{{__('Please correct the errors and try
                                        again.')}}@endif</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-t-20">                
                    <div class="final_part" style="min-height:425px;">
                        <h3 style="font-family: -WEBKIT-PICTOGRAPH;font-weight: 600;">Your order summary</h3>
                        <div class="payment_detail m-b-30">
                            
                            <div class="">
                                <label for="" class="text-color-blue">Business type:</label><label for="" style="font-size:18px;margin-left:20px;">{{ $cur_adn->type }}</label>
                            </div>                                        
                        
                            <div class="">
                                <label for="" class="text-color-blue">Your subject:</label><label for="" style="font-size:18px;margin-left:20px;">{{ $cur_adn->subject }}</label>
                            </div>                                        
                        
                            <div class="">
                                <label for="" class="text-color-blue">Total order cost:</label><label for="" style="font-size:26px;margin-left:20px;"><span class="selected_plan_price">0</span>$</label><span>(<span class="selected_plan_name">No selected</span>)</span>
                            </div>
                        </div>                  
                    </div> 
                                                            
                </div>	
            </div>
            <div class="row">
                <div class="col-md-12 m-t-20" style="text-align:center;">
                    <div class="checkbox" style="display:inline-block;">
                    <label class="pull-left" for="signing"><input type="checkbox" name="signing" id="signing">I understand any payments made for using AdnList services are non-refundable and I agree the AdnList <a href="{{ route('payment_policy') }}" target="_blank" class="text-color-blue" rel="noopener noreferrer"><b>payment policy</b></a>.</label>
                    </div>
                </div>                
                <div class="col-xs-12 pay_submit_btn_area paid_plan">
                    <button class="btn btn-primary btn_agree btn_submit_price" disabled type="submit" style="border:1px solid #337abb;"> <i class="fa fa-credit-card"></i> &nbsp; <span class="btn_price_type">Select plan</span></button>
                </div>                
            </div>
        </div>
    </form>          
      
</div>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {
var $form         = $(".require-validation");
$('form.require-validation').bind('submit', function(e) {
var $form         = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]',
                     'input[type=text]', 'input[type=file]',
                     'textarea'].join(', '),
    $inputs       = $form.find('.required_plan').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid         = true;
    $errorMessage.addClass('hide');

    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
    var $input = $(el);
    if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
    }
});

if (!$form.data('cc-on-file')) {
  e.preventDefault();
  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
  Stripe.createToken({
    number: $('.card-number').val(),
    cvc: $('.card-cvc').val(),
    exp_month: $('.card-expiry-month').val(),
    exp_year: $('.card-expiry-year').val()
  }, stripeResponseHandler);
}

});

function stripeResponseHandler(status, response) {
    if (response.error) {
        $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
    } else {
        // token contains id, last4, and card type
        var token = response['id'];
        // insert the token into the form so it gets submitted to the server
        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        $form.get(0).submit();
    }
}

});
</script>
<script>
$(document).ready(function()
{
    var title;
    var price;
    $(".price_plan_item_body").click(function(){
        $(".pay_submit_btn_area").css("display","block");
        $(".price_plan_item_body").each(function(){
            $(this).removeClass("selected_plan");
        });
        $(this).addClass("selected_plan");
        title = $(this).data("title");
        price = $(this).data("value");
        $("#selected_plan").val(title);
        
        if(title == "basic")
        {
            $(".stripe_card_info").css("display","none");
            $(".selected_plan_price").html("0");
            $(".btn_price_type").html("Free Submit");
            $(".required").removeClass("required_plan"); 
            $(".free_plan").css("display","block");   
            $(".paid_plan").css("display","none");             
        }
        else
        {
            $(".stripe_card_info").css("display","block");                
            
            $(".selected_plan_price").html(price);    
            var btn_price = "Pay Now $" + price;
            $(".btn_price_type").html(btn_price);
            $(".required").addClass("required_plan");
            $(".paid_plan").css("display","block"); 
            $(".free_plan").css("display","none");   

        }
        var whole_title = title + " plan selected.";
        $(".selected_plan_name").html(whole_title);

    });
    
    $("#signing").on('change',function()
        {
        var temp = $("#signing").prop("checked");
      
        if(temp)
        {
            $(".btn_agree").removeAttr("disabled");
            $(".btn_agree_post").css("display","inline-block");          
            $(".btn_unagree").css("display","none");          
        }
        else if(!temp){
            $(".btn_agree").attr("disabled","disabled");       
            $(".btn_agree_post").css("display","none");          
            $(".btn_unagree").css("display","inline-block");     
        }
        });


});
</script>

@endsection
