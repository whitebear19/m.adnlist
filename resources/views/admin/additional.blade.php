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
                    <form action="{{ route('admin_addtional') }}" class="plan_update_form" method="POST">
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
                    <br>
                        <div class="row">
                            <div class="col-xs-2">
                                <label for="">Additional text</label>
                            </div>
                            <div class="col-xs-10">
                                <textarea name="additional_text" class="form-control additional_text">@if($cur_category != ""){{ $cur_category->additional_text }}@endif</textarea>
                            </div>
                            <div class="col-xs-12 text-center">
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
            $(".additional_text").summernote('code');
            $(".selected_category").change(function(){
                
                var selected_category_slug =  $(".selected_category").val();
                if(selected_category_slug == "")
                {
                    $(".additional_text").html(""); 
                    return false;
                }
                var formdata = new FormData;
                formdata.append('selected_category_slug',selected_category_slug);
                formdata.append('_token',$('input[name=_token]').val());    
                $.ajax({
                    url: "/getadditionaltext",
                    type: "post",
                    dataType: "json",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(result){                         
                        $(".additional_text").summernote("code", result);                                             
                    }
                });
            });
        });
    </script>
@endsection
