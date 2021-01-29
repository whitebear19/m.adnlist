@extends('layouts.admin')

@section('content')

 
 <div class="content-wrapper">
     
      <section class="content-header">
        <h3>Manage price plan</h3>        
      </section>      
      <section class="content">        
        <div class="row">          
            <div class="col-xs-12">
                <div class="normal_border">
                    <form action="{{ route('admin_price') }}" class="plan_update_form" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">Category</label>
                            </div>
                            <div class="col-xs-10">
                                <select type="text" name="selected_category_slug" class="form-control selected_category" required>
                                    <option value=""></option>
                                    @foreach ($all_category as $item)
                                        <option @if(($cur_category !="") && ($item->slug == $cur_category->slug)) selected @endif value="{{ $item->slug }}">{{ $item->name }}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-2">                            
                            </div>
                            <div class="col-xs-10">
                                <div class="price_plan_part">
                                    <ul class="price_plan_ul">
                                        <li>
                                            <div class="price_plan_item">
                                                <div class="align-center">
                                                    <label for="" class="price_plan_item_title">Basic</label>
                                                </div>
                                                <div class="price_plan_item_body">
                                                    <label for="" class="price_plan_item_title">7Days</label>
                                                    <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                    <label for="" class="price_plan_item_price">Free</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="price_plan_item">
                                                <div class="align-center">
                                                    <label for="" class="price_plan_item_title">Premium</label>
                                                </div>
                                                <div class="price_plan_item_body">
                                                    <label for="" class="price_plan_item_title">15Days</label>
                                                    <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                    @if($cur_category != "")
                                                        <label for="" class="price_plan_item_price">Price:{{ $cur_category->premium }}$</label>
                                                    @else
                                                        <label for="" class="price_plan_item_price">No select</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="price_plan_item">
                                                <div class="align-center">
                                                    <label for="" class="price_plan_item_title">Platinum</label>
                                                </div>
                                                <div class="price_plan_item_body">
                                                    <label for="" class="price_plan_item_title">30Days</label>
                                                    <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                    @if($cur_category != "")
                                                        <label for="" class="price_plan_item_price">Price:{{ $cur_category->platinum }}$</label>
                                                    @else
                                                        <label for="" class="price_plan_item_price">No select</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="price_plan_item">
                                                <div class="align-center">
                                                    <label for="" class="price_plan_item_title">Dimond</label>
                                                </div>
                                                <div class="price_plan_item_body">
                                                    <label for="" class="price_plan_item_title">45Days</label>
                                                    <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                    @if($cur_category != "")
                                                        <label for="" class="price_plan_item_price">Price:{{ $cur_category->dimond }}$</label>
                                                    @else
                                                        <label for="" class="price_plan_item_price">No select</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>                            
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">Change</label>
                            </div>
                            <div class="col-xs-10">
                                <div style="border:1px solid #616161;">
                                    <ul class="price_plan_ul">
                                        <li>
                                            <input type="text" name="price_basic" placeholder="Free" disabled class="form-control">
                                        </li>
                                        <li>
                                            <input type="text" name="price_premium" placeholder="New price" class="form-control">
                                        </li>
                                        <li>
                                            <input type="text" name="price_platinum" placeholder="New price" class="form-control">
                                        </li>
                                        <li>
                                            <input type="text" name="price_dimond" placeholder="New price" class="form-control">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-10 text-center">
                                <button class="add_newaccount_btn btn_search m-t-10">Update</button>
                            </div>
                        </div>
                    </form>                        
                </div>
            </div> 
        </div>
      </section>

      <section class="content-header">
        <h3>Manage price plan for third party advertisements</h3>        
      </section>      
      <section class="content">        
        <div class="row">          
            <div class="col-xs-12">
                <div class="normal_border">
                    <form action="{{ route('admin_price') }}" class="" method="POST">
                    @csrf
                        <input type="hidden" name="which" value="adv">
                        <div class="row">
                            <div class="col-xs-2">                            
                            </div>
                            <div class="col-xs-10">
                                <div class="price_plan_part">
                                    <ul class="price_plan_ul">                                        
                                        <li>
                                            <div class="price_plan_item">
                                                <div class="align-center">
                                                    <label for="" class="price_plan_item_title">Premium</label>
                                                </div>
                                                <div class="price_plan_item_body">
                                                    <label for="" class="price_plan_item_title">15Days</label>
                                                    <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                    @if($site_record != "")
                                                        <label for="" class="price_plan_item_price">Price:{{ $site_record->price_premium }}$</label>
                                                    @else
                                                        <label for="" class="price_plan_item_price">No price</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="price_plan_item">
                                                <div class="align-center">
                                                    <label for="" class="price_plan_item_title">Platinum</label>
                                                </div>
                                                <div class="price_plan_item_body">
                                                    <label for="" class="price_plan_item_title">30Days</label>
                                                    <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                    @if($site_record != "")
                                                        <label for="" class="price_plan_item_price">Price:{{ $site_record->price_platinum }}$</label>
                                                    @else
                                                        <label for="" class="price_plan_item_price">No price</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="price_plan_item">
                                                <div class="align-center">
                                                    <label for="" class="price_plan_item_title">Dimond</label>
                                                </div>
                                                <div class="price_plan_item_body">
                                                    <label for="" class="price_plan_item_title">45Days</label>
                                                    <img class="price_plan_calander_img" src="{{ asset('assets/images/calander.png') }}" alt="" srcset="">
                                                    @if($site_record != "")
                                                        <label for="" class="price_plan_item_price">Price:{{ $site_record->price_dimond }}$</label>
                                                    @else
                                                        <label for="" class="price_plan_item_price">No price</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>                            
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">Change</label>
                            </div>
                            <div class="col-xs-10">
                                <div style="border:1px solid #616161;">
                                    <ul class="price_plan_ul">                                       
                                        <li>
                                            <input type="text" name="price_premium" placeholder="New price" class="form-control">
                                        </li>
                                        <li>
                                            <input type="text" name="price_platinum" placeholder="New price" class="form-control">
                                        </li>
                                        <li>
                                            <input type="text" name="price_dimond" placeholder="New price" class="form-control">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-10 text-center">
                                <button class="add_newaccount_btn btn_search m-t-10">Update</button>
                            </div>
                        </div>
                    </form>                        
                </div>
            </div> 
        </div>
      </section>
    </div>    
    <script>    
        $(document).ready(function(){
            $(".selected_category").change(function(){
                $(".plan_update_form").submit();
            });
        });
    </script>
@endsection
