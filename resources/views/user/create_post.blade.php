
@extends('layouts.main')
@section('style')    	
	<link href="{{ asset('assets/css/muliselect.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('assets/css/pgwslider.min.css') }}" rel="stylesheet">
@endsection
@section('script')	
	<script src="{{ asset('assets/js/location.js') }}"></script>    
    <script src="{{ asset('assets/js/muliselect.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>    
    <script src="{{ asset('assets/js/autosize.js') }}"></script>
    <script src="{{ asset('assets/js/pgwslider.min.js') }}"></script>    
@endsection
@section('content')
<section id="listing_category" class="">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-left m-t-10">
				
				<ul class="post_StepbyStep">
					<li>
						<span class="post_input_step_nav selected_nav" id="nav_SelectCategory">{{ trans('message.cp_selectcategory') }}</span>
					</li>
					<li>
					<span class="post_input_step_nav post_input_step_nav_B" id="nav_PostDetail">{{ trans('message.cp_postdetail') }}</span>
					</li>
					<li>
						<span class="post_input_step_nav post_input_step_nav_B" id="nav_ShortInfo">{{ trans('message.cp_shortinfo') }}</span>
					</li>
					<li>
						<span class="post_input_step_nav post_input_step_nav_B" id="nav_YourLocation">{{ trans('message.cp_yourlocation') }}</span>
					</li>
					<li>
						<span class="post_input_step_nav post_input_step_nav_B last_nav" id="nav_PreviewSubmit">{{ trans('message.cp_previewsubmit') }}</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<form action="{{ route('poster_store') }}" class="form_post_detail" method="post">
	@csrf
	<section id="step_select_category_content" class="scroll_top_position clearfix ad-post-page p-t-5 setp_sub_page">
		<div class="container">			
			<div class="row category-tab">	
				<div class="col-md-4 col-sm-6">
					<div class="section cat-option select-category post-option" id="scroll-cat" style="max-height:838px;overflow-y:auto;">
						<div class="accordion">								
							<div class="panel-group" id="accordion">							
								<div class="panel-default panel-faq">										
									<div class="panel-heading active-faq">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-one"
											aria-expanded="true" class="">
											<h4 class="panel-title">{{ trans('message.cp_selectcategory') }}
												<span class="pull-right"><i
														class="fa fa-minus"></i></span></h4>
										</a>
									</div>
	
									<div id="accordion-one" class="panel-collapse collapse in" tabindex="0"
										aria-expanded="true" style="">
										
										<div class="panel-body custom_scroll" id="categoryList">											
											@if(!empty($all_category))
												<ul role="tablist" class="cs_category_view_list">
													@foreach($all_category as $item)
														<li>
															<a href="javascript:;" data-value="{{$item->id}}" data-price="{{ $item->price }}" data-slug="{{ $item->slug }}"><span class="select cat_icon_style">
																<img class="img-" src="{{ asset($item->image) }}" alt="Images"></span>
																<span class=""><b>{{ $item->name }}</b></span>
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
				</div>
						
				<input type="hidden" name="categoryID" class="cur_categoryID" value="">
				<div class="col-md-4 col-sm-6">							
					<div class="section tab-content subcategory post-option">
						
						<div class="accordion_sub">								
							<div class="panel-group" id="accordion">
								
								<div class="panel-default panel-faq">										
									<div class="panel-heading active-faq">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-two"
											aria-expanded="true" class="">
										<h4 class="panel-title">{{ trans('message.cp_selectsubcategory') }}<span class="pull-right"><i
												class="fa fa-minus"></i></span></h4>
										</a>
									</div>
	
									<div id="accordion-two" class="panel-collapse collapse in" tabindex="0"
										aria-expanded="true" style="">
										
										<div class="panel-body custom_scroll" id="cat-scroll">	
										<label for="" class="alert-red p-l-20">*{{ trans('message.cp_selectsubcategory_l') }}</label>	
											<ul role="tablist" id="subcategoryList">
												
											</ul>
										</div>
									</div>									
								</div>			
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="post_free_ad_next">
					<h4 class="text-white"><b>{{ trans('message.cp_postjust') }}<span class="text-black">2 {{ trans('message.cp_minutes') }}</span></b></h4>
						<p class="text-white fs-16"><b>{{ trans('message.cp_postguide') }}</b></p>
						<div class="btn-section m-t-20">
						<button type="button" class="classified_details m-r-20" disabled>{{ trans('message.cp_next') }}</button>
						<a href="{{ url('/') }}" class=""><button type="button" class="btn-info classified_details_cancel">{{ trans('message.cancel') }}</button></a>
						</div>
						<div class="total_section m-t-20">
							
						</div>
						
					</div>						
				</div>
				
			</div>
		</div>
	</section> 
	<section id="step_post_details" class="scroll_top_position setp_sub_page">
		<div class="container">
			<div class="adpost-details">
				<div class="row">	
					<div class="col-md-9">
						<fieldset>
							<input type="hidden" class="cur_category_price" value="">
							<input type="hidden" name="cur_category_id" value="">
							
							<div class="section postdetails" style="padding: 25px 25px 56px;">
								<h4><b>{{ trans('message.cp_postdetails') }} </b></h4>
								<div class="form-group">
								<label for="title" class="text-color-blue"><b>{{ trans('message.cp_posttitle') }}</b><span class="required alert-red">*({{ trans('message.cp_max80') }})</span></label>
									<input type="text" class="form-control required_field" maxlength="80" id="title" name="title" placeholder="Enter Subject/Title" required>
								</div>                                   
								<div class="form-group">
									<label class="label-title text-color-blue" for="body"><b>{{ trans('message.cp_postdescription') }}</b><span class="required alert-red">*</span></label>
									<textarea class="form-control post_description required_field" id="body" rows="8" name="classifiedbody" placeholder="explain details here"  required></textarea>
								</div>
								<div class="row form-group add-title" style="margin-bottom:0px;">
									<label class="col-sm-10 label-title text-color-blue"><b>{{ trans('message.cp_uploadimages') }}</b><span style="color:#222;">({{ trans('message.cp_checkour') }} <a href="{{ route('posting_tips') }}" target="_blank" class="text-color-blue">{{ trans('message.cp_guidelines') }}</a>  {{ trans('message.cp_formoreinformation') }})</span> </label>
								</div>
								<div class="row form-group add-image">
									<div class="col-sm-12">
										<span class="alert-red">{{ trans('message.cp_uptophotos') }}</span><br>
										 
										<div class="upload-section m-t-20">                                            
											<div class="row">												
												<div class="col-sm-3">
													<div>
														<label class="tg-fileuploadlabel p-t-5 p-b-4" style="width:75px;position:relative;" for="tg-photogallery1">                                                       
															<span style="line-height:10px;">
																<svg style="width:25px;height:15px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="upload" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-upload fa-w-18 fa-3x"><path fill="currentColor" d="M528 288H384v-32h64c42.6 0 64.2-51.7 33.9-81.9l-160-160c-18.8-18.8-49.1-18.7-67.9 0l-160 160c-30.1 30.1-8.7 81.9 34 81.9h64v32H48c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V336c0-26.5-21.5-48-48-48zm-400-80L288 48l160 160H336v160h-96V208H128zm400 256H48V336h144v32c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48v-32h144v128zm-40-64c0 13.3-10.7 24-24 24s-24-10.7-24-24 10.7-24 24-24 24 10.7 24 24z" class=""></path></svg>
															</span>
															<span class="text-color-green" style="line-height:15px;"><b>{{ trans('message.cp_max') }}: 2MB</b></span>
															<input id="tg-photogallery1" class="tg-fileinput" type="file" name="" autocomplete="off" multiple accept=".jpg, .jpeg, .png">
															<span style="position:absolute;right:-75px;top:10px;">({{ trans('message.cp_optional') }})</span>
														</label>														
													</div>											
												</div> 
											</div>
											<div class="" style="padding:10px;">
												<ul class="upload_post_image">
	
												</ul>
											</div>                                            
										</div>	
									</div>
								</div>
	
								<div class="row form-group add-title" style="margin-bottom:8px;">
									<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('message.cp_howgetresponse') }}</b></label>
								</div>
								<div class="reply_frame">
										<div class="row" style="margin-bottom:8px;">
										<div class="col-md-12">
											<span class="required  alert-red">*{{ trans('message.cp_replyemailnote') }}</span>
										</div>
										<div class="col-sm-4">
											<div class="form-group add-title" id="verify-btn">
												<span class=""><input type="checkbox" name="preferred_email" class="reply_check reply_check_on" id="preferred_email" style="display:inline-block;font-size:14px;" checked><b>{{ trans('message.cp_replyemail') }}</b></span>
												<input type="text" class="form-control reply_input_field required_field check_reply_item" id="contact_email" maxlength="50" placeholder="user@mail.com" autocomplete="off" value="@if(Auth::check()){{ Auth::user()->email }}@endif" name="contact_email" requried>
												<span class="required  alert-red contact_email_alert">{{ trans('message.cp_emailtypeerr') }}</span>
											</div>
										</div>
	
										<div class="col-sm-4">
											<div class="form-group add-title" id="verified-btn">                                            
												<span class=""><input type="checkbox" name="preferred_phone"  class="reply_check reply_check_on" id="preferred_phone" style="display:inline-block;font-size:14px;"><b>{{ trans('message.cp_showmyphone') }}</b></span>
												<input type="text" class="form-control reply_input_field check_reply_item" id="contact_phone" maxlength="15" placeholder="eg. 000-000-0000" autocomplete="off" name="contact_phone" disabled>
											
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group add-title" id="verified-btn">                                            
												<span class=""><input type="checkbox" name="preferred_url" class="reply_check reply_check_on" id="preferred_url" style="display:inline-block;font-size:14px;"><b>{{ trans('message.cp_showmyweburl') }}</b></span>
												<input type="url" class="form-control reply_input_field check_reply_item" id="contact_url" maxlength="50" placeholder="eg. https://www.yoursite.com" autocomplete="off" name="contact_url"  disabled>
												<span class="required  alert-red">* {{ trans('message.cp_longurlerr') }}</span>
											</div>
										</div>
										<div class="col-sm-12">               
											<span class=""><input type="checkbox" name="dont_reply" class="reply_check" id="dont_reply" style="display:inline-block;font-size:14px;"> {{ trans('message.cp_dontreply') }}</span>
										</div>
									</div>
								</div>							
														
							<div class="m-t-20">
								<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_details">{{ trans('message.cp_next') }}</button>
							</div>
							</div>
							
						</fieldset>					
					</div>
				
					<div class="col-md-3">
						@include('layouts.posting_tips')
					</div>
				</div>			
			</div>	
		</div>
	</section>
	<section id="step_post_short_info" class="scroll_top_position setp_sub_page">
		<div class="container">
			<div class="adpost-details">
				<div class="row">	
					<div class="col-md-9">
						<fieldset>
							<div class="section postdetails" style="padding: 25px 25px 56px;">
								<div class="mainCategory mainCategoryServices">
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.services_provider_label') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										<input type="text" class="form-control" id="provider_name" name="provider_name" maxlength="80" placeholder="">
									</div>    
	
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.services_provide_addlabel') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
										<div class="normal-border">
											<div>
												<input type="text" class="add_provider add_provider_Services" maxlength="40" placeholder="{{ trans('cat.services_dont_duplicate_placeholder') }}" style="padding-left:10px;">
											    <button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.add') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
											</div>
											<div class="row added_provider_Services m-t-20">
												
											</div>
										</div>
									</div>   
	
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.businesshours') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" id="estimated_rent" rows="2" name="estimated_rent" maxlength="100" placeholder="{{ trans('cat.services_businesshours_placeholder') }}"></textarea>
											</div>
										</div>
									</div> 	
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>						
								</div>
								<div class="mainCategory mainCategorySale">
									<div class="row form-group add-title" style="margin-bottom:8px;">
										<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.sale_item_details') }}</b></label>
									</div>
									<div class="where_address">
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.sale_condition') }}</b> </label>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="form-group add-title">
													<select class="form-control" id="condition_sale" rows="4" name="condition" required>
														<option value=""></option>
														<option value="{{ trans('cat.sale_condition_average') }}">{{ trans('cat.sale_condition_average') }}</option>
														<option value="{{ trans('cat.sale_condition_likenew') }}">{{ trans('cat.sale_condition_likenew') }}</option>
														<option value="{{ trans('cat.sale_condition_new') }}">{{ trans('cat.sale_condition_new') }}</option>
														<option value="{{ trans('cat.sale_condition_good') }}">{{ trans('cat.sale_condition_good') }}</option>
														<option value="{{ trans('cat.sale_condition_excellent') }}">{{ trans('cat.sale_condition_excellent') }}</option>
													</select>
												</div>                                            
											</div>
										</div>
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.sale_saleby') }}</b></label>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="form-group add-title">
													<select class="form-control" id="listedby_sale" name="listedby" required>
														<option value=""></option>
														<option value="{{ trans('cat.sale_saleby_individual') }}">{{ trans('cat.sale_saleby_individual') }}</option>
														<option value="{{ trans('cat.sale_saleby_dealer') }}">{{ trans('cat.sale_saleby_dealer') }}</option>
													</select>
												</div>                                            
											</div>
										</div>
										<div class="row" > 
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.sale_price') }}</b> <span class="required alert-red"></span></label>
												</div>												
											</div>
											<div class="col-sm-9">
												<textarea class="form-control" id="utilities_sale" rows="2" name="utilities" maxlength="100" placeholder="{{ trans('cat.sale_price_placeholder') }}"></textarea>
											</div>
										</div>
									</div>
                                    
                                    
                                    
                                    <div class="row form-group add-title" style="margin-bottom:8px;">
                                        <label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.sale_additional_details') }}</b><span class="required alert-red">({{ trans('cat.sale_additional_details_note') }})</span></label>
                                    </div>
                                    <div class="where_address">
                                        <div class="row" style="margin-bottom:8px;">
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.sale_make') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <input type="text" class="form-control short_jobs_make" maxlength="20" placeholder="{{ trans('cat.sale_make_placeholder') }}" name="sale_make" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>                                           
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.sale_model') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <input type="text" class="form-control short_jobs_model" maxlength="20" placeholder="{{ trans('cat.sale_model_placeholder') }}" name="sale_model" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>            
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.sale_year') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <input type="text" class="form-control number_field short_jobs_year" maxlength="4" placeholder="{{ trans('cat.sale_year_placeholder') }}" name="year" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>    
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.sale_color') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <input type="text" class="form-control short_jobs_color" maxlength="20" placeholder="{{ trans('cat.sale_color_placeholder') }}" name="color" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>   
                                            <div class="col-sm-8 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.sale_other_details') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control short_jobs_other" maxlength="150" placeholder="{{ trans('cat.sale_other_details_placeholder') }}" maxlength="100" name="sale_detail" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>                       
                                        </div> 
                                        
                                    </div>                                    
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>					
								</div>
								<div class="mainCategory mainCategoryJobs">
									<label for="" class="label-title text-color-blue"><b>{{ trans('cat.job_key_details') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                    <div class="where_address">
                                        <div class="row m-b-15">                                            
                                            <div class="col-sm-4">
                                                <label class="label-title text-color-blue"><b>{{ trans('cat.job_client_name') }}</b></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class="form-control normal_input Jobs_client_recruiter" maxlength="30" name="job_level"> 
                                            </div> 
                                        </div>


                                        <div class="row" style="margin-bottom:8px;">
                                            <div class="col-sm-4">
                                                <div class="form-group add-title">
                                                    <label class="label-title text-color-blue"><b>{{ trans('cat.job_employment_type') }}:</b> </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group add-title">
                                                    <select class="form-control required_field" id="multiselect" name="conditionM[]" style="height:38px;" multiple required>
                                                        <option value="{{ trans('cat.job_employment_type_option1') }}">{{ trans('cat.job_employment_type_option1') }}</option>
                                                        <option value="{{ trans('cat.job_employment_type_option2') }}">{{ trans('cat.job_employment_type_option2') }}</option>
                                                        <option value="{{ trans('cat.job_employment_type_option3') }}">{{ trans('cat.job_employment_type_option3') }}</option>
                                                        <option value="{{ trans('cat.job_employment_type_option4') }}">{{ trans('cat.job_employment_type_option4') }}</option>
                                                        <option value="{{ trans('cat.job_employment_type_option5') }}">{{ trans('cat.job_employment_type_option5') }}</option>
                                                        <option value="{{ trans('cat.job_employment_type_option6') }}">{{ trans('cat.job_employment_type_option6') }}</option>
                                                        <option value="{{ trans('cat.job_employment_type_option7') }}">{{ trans('cat.job_employment_type_option7') }}</option>                                                       
                                                        <option value="{{ trans('cat.job_employment_type_option8') }}">{{ trans('cat.job_employment_type_option8') }}</option>
                                                    </select>
                                                </div>
                                            </div>
										</div>

										<div class="row m-b-15">                                            
											<div class="col-sm-7">
												<div class="add-title">
                                                    <label class="label-title text-color-blue">
														<b>{{ trans('cat.job_telecommuting') }}</b>
														<input type="checkbox" class="Jobs_telecommuting" style="display:inline-block;" name="post_image2" class="sub_category_check" value="on">
													</label>
                                                </div>
											</div>
											<div class="col-sm-5">
												<div class="add-title">
                                                    <label class="label-title text-color-blue">
														<b>{{ trans('cat.job_travel_required') }}</b>
														<input type="checkbox" class="Jobs_travel" style="display:inline-block;" name="events_tickets" class="sub_category_check" value="on">
													</label>
                                                </div>
											</div> 
										</div>

										<div class="row m-b-15">                                            
											<div class="col-sm-4">
												<label class="label-title text-color-blue"><b>{{ trans('cat.job_interview_mode') }}</b></label>
											</div>
											<div class="col-sm-8">
												<input class="form-control normal_input" maxlength="30" id="Jobs_inderview_mode" name="provider_name"> 
											</div> 
										</div>
										<div class="row">                                            
											<div class="col-sm-4">
												<label class="label-title text-color-blue"><b>{{ trans('cat.job_compensation') }}</b></label>
											</div>
											<div class="col-sm-8">
												<textarea class="form-control required_field" id="Jobs_utilities" rows="1" name="utilities" placeholder="{{ trans('cat.job_compensation_placeholder') }}" maxlength="100" required></textarea>
											</div>                                                                           
										</div>
										<div class="row m-t-20 m-b-20">
											
											<div class="col-sm-4">
												<label class="label-title text-color-blue"><b>{{ trans('cat.job_postedby') }}</b></label>
											</div>
											<div class="col-sm-8">
												<select type="text" name="listedby" class="form-control required_field Jobs_postedby" required>
													<option value=""></option>
													<option value="{{ trans('cat.job_postedby_option1') }}">{{ trans('cat.job_postedby_option1') }}</option>
													<option value="{{ trans('cat.job_postedby_option2') }}">{{ trans('cat.job_postedby_option2') }}</option>
													<option value="{{ trans('cat.job_postedby_option3') }}">{{ trans('cat.job_postedby_option3') }}</option>
													<option value="{{ trans('cat.job_postedby_option4') }}">{{ trans('cat.job_postedby_option4') }}</option>
												</select>
											</div>                                                  
										</div>                                        
                                    </div>
									<div>
										<div class="row form-group add-title m-t-15" style="margin-bottom:8px;">
											<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.job_employment_benefits') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										</div>
										<div class="where_address">
											<div class="row" style="margin-bottom:8px;">
												<div class="col-sm-5">
													<div class="normal-border">
														<p><span class="fs-14">{{ trans('cat.job_add_benefits_here') }}</span></p>
														<div class="row">
															<div class="col-xs-7">
																<input type="text" maxlength="16" class="form-control benefit_name add_provider1">
															</div>
															<div class="col-xs-5">
																<button type="button" class="btn-benefit m-t-5">{{ trans('cat.job_add_more') }}</button>
															</div>
														</div>
													</div>
												</div> 
												<div class="col-sm-7">
													<div class="form-group add-title">
														<div class="row add_benefit_group">
															<div class="col-xs-6">
																<p class=""><input type="checkbox" class="benefit_check" data-benefit="{{ trans('cat.job_benefits_item1') }}" style="display:inline-block;margin-right:5px;"><span class="fs-13 f-w-600">{{ trans('cat.job_benefits_item1') }}</span> <input type="hidden" value="{{ trans('cat.job_benefits_item1') }}" name="benefit_name[]"><input type="hidden" class="benefit_default" name="benefit_default[]" value="1" ><input type="hidden" class="benefit_checked" name="benefit_checked[]" value="0"></p>
															</div>
															<div class="col-xs-6">
																<p class=""><input type="checkbox" class="benefit_check" data-benefit="{{ trans('cat.job_benefits_item2') }}" style="display:inline-block;margin-right:5px;"><span class="fs-13 f-w-600">{{ trans('cat.job_benefits_item2') }}</span><input type="hidden" value="{{ trans('cat.job_benefits_item2') }}"  name="benefit_name[]"><input type="hidden" class="benefit_default" name="benefit_default[]" value="1"><input type="hidden" class="benefit_checked" name="benefit_checked[]" value="0"></p>
															</div>
															<div class="col-xs-6">
																<p class=""><input type="checkbox" class="benefit_check" data-benefit="{{ trans('cat.job_benefits_item3') }}" style="display:inline-block;margin-right:5px;"><span class="fs-13 f-w-600">{{ trans('cat.job_benefits_item3') }}</span><input type="hidden" value="{{ trans('cat.job_benefits_item3') }}"  name="benefit_name[]"><input type="hidden" class="benefit_default" name="benefit_default[]" value="1"><input type="hidden" class="benefit_checked" name="benefit_checked[]" value="0"></p>
															</div>
															<div class="col-xs-6">
																<p class=""><input type="checkbox" class="benefit_check" data-benefit="{{ trans('cat.job_benefits_item4') }}" style="display:inline-block;margin-right:5px;"><span class="fs-13 f-w-600">{{ trans('cat.job_benefits_item4') }}</span><input type="hidden" value="{{ trans('cat.job_benefits_item4') }}"  name="benefit_name[]"><input type="hidden" class="benefit_default" name="benefit_default[]" value="1"><input type="hidden" class="benefit_checked" name="benefit_checked[]" value="0"></p>
															</div>
															<div class="col-xs-6">
																<p class=""><input type="checkbox" class="benefit_check" data-benefit="{{ trans('cat.job_benefits_item5') }}" style="display:inline-block;margin-right:5px;"><span class="fs-13 f-w-600">{{ trans('cat.job_benefits_item5') }}</span><input type="hidden" value="{{ trans('cat.job_benefits_item5') }}" name="benefit_name[]"><input type="hidden" class="benefit_default" name="benefit_default[]" value="1"><input type="hidden" class="benefit_checked" name="benefit_checked[]" value="0"></p>
															</div>
															<div class="col-xs-6">
																<p class=""><input type="checkbox" class="benefit_check" data-benefit="{{ trans('cat.job_benefits_item6') }}" style="display:inline-block;margin-right:5px;"><span class="fs-13 f-w-600">{{ trans('cat.job_benefits_item6') }}</span><input type="hidden" value="{{ trans('cat.job_benefits_item6') }}" name="benefit_name[]"><input type="hidden" class="benefit_default" name="benefit_default[]" value="1"><input type="hidden" class="benefit_checked" name="benefit_checked[]" value="0"></p>
															</div>
														</div>                                                        
													</div>
												</div>                                                     
											</div> 
										</div>                                    
									</div>

									<div>
										<div class="row form-group add-title m-t-15" style="margin-bottom:0px;">
											<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.job_work_accept') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										</div>
										<div class="where_address">
											<div class="row" style="margin-bottom:8px;">
												<div>
													<ul class="ul_work_authorization">
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_any" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item1') }}" checked>{{ trans('cat.job_work_accept_item1') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_citizen" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item2') }}">{{ trans('cat.job_work_accept_item2') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_green" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item3') }}">{{ trans('cat.job_work_accept_item3') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_ead" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item4') }}">{{ trans('cat.job_work_accept_item4') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_h1b" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item5') }}">{{ trans('cat.job_work_accept_item5') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_h4" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item6') }}">{{ trans('cat.job_work_accept_item6') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_l1" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item7') }}">{{ trans('cat.job_work_accept_item7') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_l2" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item8') }}">{{ trans('cat.job_work_accept_item8') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_opt" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item9') }}">{{ trans('cat.job_work_accept_item9') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_m1" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item10') }}">{{ trans('cat.job_work_accept_item10') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_j1" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item11') }}">{{ trans('cat.job_work_accept_item11') }}</span>
															</div>
														</li>
														<li>
															<div class="form-group add-title">
																<span class=""><input type="checkbox" name="work_auth_other" class="Jobs_work_authorization" style="display:inline-block;font-size:14px;margin-right:5px;" data-value="{{ trans('cat.job_work_accept_item12') }}">{{ trans('cat.job_work_accept_item12') }}</span>
															</div>
														</li>
													</ul>
												</div>												
											</div> 
										</div>                                    
									</div>

                                    <div class="where_address m-t-30">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="add-title">
                                                    <label><input type="checkbox" class="Jobs_subcategory_check_item" style="display:inline-block;" name="sale_model" checked="checked" class="sub_category_check" value="EOE" data-text="{{ trans('cat.job_add_check1') }}">{{ trans('cat.job_add_check1') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="add-title">
                                                    <label><input type="checkbox" class="Jobs_subcategory_check_item" style="display:inline-block;" name="sale_make" class="sub_category_check" value="Work" data-text="{{ trans('cat.job_add_check2') }}">{{ trans('cat.job_add_check2') }}</label>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="add-title">
                                                    <label><input type="checkbox" class="Jobs_subcategory_check_item" style="display:inline-block;" name="sale_detail" class="sub_category_check" value="Invite" data-text="{{ trans('cat.job_add_check3') }}">{{ trans('cat.job_add_check3') }}</label>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>                
                                   
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>					
								</div>

								<div class="mainCategory mainCategoryAcco">
									<div class="row add-title m-t-20">
										<label class="col-sm-12 label-title"><b>{{ trans('cat.acco_details') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
									</div>

									<div class="reply_frame">
										<div class="row">
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group add-title">
															<label class="label-title text-color-blue"><b>{{ trans('cat.acco_type') }}</b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group add-title">
															<input class="form-control required_field" id="Acco_condition" name="condition" maxlength="30" placeholder="{{ trans('cat.acco_type_placeholder') }}" required>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row" style="margin-bottom:8px;">
													<div class="col-md-6">
														<div class="form-group add-title">
															<label class="label-title text-color-blue"><b>{{ trans('cat.acco_postedby') }}</b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group add-title">
															<select type="text" name="listedby" class="Acco_listedby form-control">
																<option value=""></option>
																<option value="{{ trans('cat.acco_postedby_option1') }}">{{ trans('cat.acco_postedby_option1') }}</option>
																<option value="{{ trans('cat.acco_postedby_option2') }}">{{ trans('cat.acco_postedby_option2') }}</option>
																<option value="{{ trans('cat.acco_postedby_option3') }}">{{ trans('cat.acco_postedby_option3') }}</option>
																<option value="{{ trans('cat.acco_postedby_option4') }}">{{ trans('cat.acco_postedby_option4') }}</option>
																<option value="{{ trans('cat.acco_postedby_option5') }}">{{ trans('cat.acco_postedby_option5') }}</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" style="margin-bottom:8px;">
											<div class="col-md-6">
												<div class="row">
													<div class="col-sm-6">
														<label class="label-title text-color-blue" style="line-height:18px;"><b>{{ trans('cat.acco_no_rooms') }}</b></label>
													</div>
													<div class="col-sm-6">
														<input type="text" class="form-control Acco_BedRooms" placeholder="{{ trans('cat.acco_no_rooms_placeholder') }}" maxlength="10" name="min_exp">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row">
													<div class="col-sm-6">
														<label class="label-title text-color-blue" style="line-height:18px;"><b>{{ trans('cat.acco_no_bathrooms') }}</b></label>
													</div>
													<div class="col-sm-6">
														<input type="text" class="form-control Acco_BathRooms" placeholder="{{ trans('cat.acco_no_rooms_placeholder') }}" maxlength="10" name="max_exp">
													</div>
												</div>
											</div>                                        
										</div>

										<div class="row m-t-10 m-b-10">
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.acco_property_furnished') }}</b></label>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="form-group add-title">
													<select class="form-control Acco_sale_detail" id="sale_detail" name="sale_detail" required>
														<option value=""></option>
														<option value="{{ trans('cat.acco_property_furnished_option1') }}">{{ trans('cat.acco_property_furnished_option1') }}</option>
														<option value="{{ trans('cat.acco_property_furnished_option2') }}">{{ trans('cat.acco_property_furnished_option2') }}</option>
														<option value="{{ trans('cat.acco_property_furnished_option3') }}">{{ trans('cat.acco_property_furnished_option3') }}</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-12">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.acco_estimated') }}</b> <span class="required alert-red">({{ trans('cat.acco_max200') }})</span></label>
													<textarea class="form-control" id="Acco_utilities" rows="1" maxlength="200" placeholder="{{ trans('cat.acco_estimated_placeholder') }}" name="utilities"></textarea>
												</div>                                            
											</div>
										</div>
									</div>                                    
									
									<div class="row add-title m-t-20">
										<label class="col-sm-12 label-title"><b>{{ trans('cat.acco_stay_availability') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
									</div>
                                    
									<div class="reply_frame">
										
										<div class="row  m-t-10 m-b-10">
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.acco_stay_availability_for') }}</b></label>
												</div>
											</div>
											<div class="col-sm-9">
												<label for="" class="m-r-10"><input type="radio" class="stay_avail" style="display:inline-block;" name="sale_model" class="sub_category_check" value="{{ trans('cat.acco_stay_availability_for_radio1') }}" ><b>{{ trans('cat.acco_stay_availability_for_radio1') }}</b></label>
												<label for="" class="m-r-10"><input type="radio" class="stay_avail" style="display:inline-block;" name="sale_model" class="sub_category_check" value="{{ trans('cat.acco_stay_availability_for_radio2') }}" ><b>{{ trans('cat.acco_stay_availability_for_radio2') }}</b></label>
												<label for="" class="m-r-10"><input type="radio" class="stay_avail" style="display:inline-block;" name="sale_model" class="sub_category_check" value="{{ trans('cat.acco_stay_availability_for_radio3') }}" ><b>{{ trans('cat.acco_stay_availability_for_radio3') }}</b></label>
												<label for="" class="m-r-10"><input type="radio" class="stay_avail stay_until" style="display:inline-block;" name="sale_model" class="sub_category_check" value="{{ trans('cat.acco_stay_availability_for_radio4') }}" ><b>{{ trans('cat.acco_stay_availability_for_radio4') }}</b></label>
												<input type="date" name="s_date" class="stay_until_date" disabled>
											</div>
										</div>

										<div class="row m-t-10 m-b-10">
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.acco_early_avail_date') }}</b></label>
												</div>
											</div>
											<div class="col-sm-9">                                           
												<input type="text" maxlength="100" name="e_date" class="Acco_EarlyAvailable">
											</div>
										</div>										
									</div>

									<div class="row add-title m-t-20">
										<label class="col-sm-12 label-title"><b>{{ trans('cat.acco_preferences') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
									</div>
									<div class="reply_frame">
										<div class="row m-t-10 m-b-10">
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.acco_smoking_allowed') }}</b></label>
												</div>
											</div>
											<div class="col-sm-9">                                           
												<label for="" class="m-r-10"><input type="radio" class="subcategory_check_item Acco_Smoking" style="display:inline-block;" name="provider_name" class="sub_category_check" value="{{ trans('cat.acco_smoking_allowed_radio1') }}" ><b>{{ trans('cat.acco_smoking_allowed_radio1') }}</b></label>
												<label for="" class="m-r-10"><input type="radio" class="subcategory_check_item Acco_Smoking" style="display:inline-block;" name="provider_name" class="sub_category_check" value="{{ trans('cat.acco_smoking_allowed_radio2') }}" ><b>{{ trans('cat.acco_smoking_allowed_radio2') }}</b></label>
												<label for="" class="m-r-10"><input type="radio" class="subcategory_check_item Acco_Smoking" style="display:inline-block;" name="provider_name" class="sub_category_check" value="{{ trans('cat.acco_smoking_allowed_radio3') }}" ><b>{{ trans('cat.acco_smoking_allowed_radio3') }}</b></label>
											</div>
										</div>

										<div class="row m-t-10 m-b-10">
											<div class="col-sm-3">
												<div class="form-group add-title">
													<label class="label-title text-color-blue"><b>{{ trans('cat.acco_pets_allowed') }}</b></label>
												</div>
											</div>
											<div class="col-sm-9">                                           
												<label for="" class="m-r-10"><input type="radio" class="subcategory_check_item Acco_PetsAllowed" style="display:inline-block;" name="sale_make" class="sub_category_check" value="{{ trans('cat.acco_pets_allowed_radio1') }}" ><b>{{ trans('cat.acco_pets_allowed_radio1') }}</b></label>
												<label for="" class="m-r-10"><input type="radio" class="subcategory_check_item Acco_PetsAllowed" style="display:inline-block;" name="sale_make" class="sub_category_check" value="{{ trans('cat.acco_pets_allowed_radio2') }}" ><b>{{ trans('cat.acco_pets_allowed_radio2') }}</b></label>
											</div>
										</div>
									</div>

									<div class="row add-title m-t-20">
										<label class="col-sm-12 label-title"><b>{{ trans('cat.acco_property_features') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
									</div>
									<div class="reply_frame">
										<div class="form-group">
											<label for="title" class="text-color-blue"><b>{{ trans('cat.acco_additional_amenities') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
											<div class="normal-border">
												<div>
													<input type="text" class="add_provider add_provider_Acco"  style="padding-left:10px;" placeholder="{{ trans('cat.acco_provider_placeholder') }}"  maxlength="20">
													<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												</div>
												<div class="row added_provider_Acco m-t-20">
													
												</div>
											</div>
										</div>   

										<div class="form-group">
											<label for="title" class="text-color-blue"><b>{{ trans('cat.acco_near_to') }}</b></label>
											<div class="normal-border">
												<div>
													<input type="text" class="add_position_Acco height-28" placeholder="{{ trans('cat.acco_near_to_placeholder1') }}" maxlength="20" style="padding-left:10px;">
													<input type="text" class="add_distance_Acco height-28" placeholder="{{ trans('cat.acco_near_to_placeholder2') }}" maxlength="10" style="padding-left:10px;">
													<button type="button" class="btn-custom btn-add-position"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												</div>
												<div class="row added_complex_Acco m-t-20">
													
												</div>
											</div>
										</div>
									</div>

									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>			 
								</div>

								<div class="mainCategory mainCategoryReal">
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.real_listedby') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
											</div>
										</div>
										<div class="col-sm-9">
											<div class="form-group add-title">
												<select class="form-control required_field" id="Real_listedby" rows="4" name="listedby" required>
													<option value=""></option>
													<option value="{{ trans('cat.real_listedby_option1') }}">{{ trans('cat.real_listedby_option1') }}</option>
													<option value="{{ trans('cat.real_listedby_option2') }}">{{ trans('cat.real_listedby_option2') }}</option>
													<option value="{{ trans('cat.real_listedby_option3') }}">{{ trans('cat.real_listedby_option3') }}</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row" style="margin-bottom:8px;">                                      

										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.real_property_type') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
											</div>
										</div>
										<div class="col-sm-9">
											<div class="form-group add-title">
												<input class="form-control required_field" id="Real_condition" placeholder="{{ trans('cat.real_property_type_placeholder') }}" maxlength="30" name="condition" required>
											</div>
										</div>
									</div>
									<div class="row" style="margin-bottom:8px;">                                      

										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.real_price') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" id="Real_utilities" rows="1" name="utilities" maxlength="200" placeholder="{{ trans('cat.real_price_placeholder') }}"></textarea>
											</div>
											
										</div>
									</div> 
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.acco_near_to') }}</b><span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
										<div class="normal-border">
											<div>
												<input type="text" class="add_position_Real height-28" placeholder="{{ trans('cat.acco_near_to_placeholder1') }}" maxlength="20" style="padding-left:10px;">
												<input type="text" class="add_distance_Real height-28" placeholder="{{ trans('cat.acco_near_to_placeholder2') }}" maxlength="10" style="padding-left:10px;">
											<button type="button" class="btn-custom btn-add-position"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
											</div>
											<div class="row added_complex_Real m-t-20">
												
											</div>
										</div>
									</div>   

									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.real_property_amenities') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
										<div class="normal-border">
											<div>
												<input type="text" class="add_provider_Real height-28" style="padding-left:10px;" placeholder="{{ trans('cat.real_provider_placeholder') }}"  maxlength="20">
												<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
											</div>
											<div class="row added_provider_Real m-t-20">
												
											</div>
										</div>
									</div> 
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>	 
								</div>

								<div class="mainCategory mainCategoryContractors">
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.contractor_business_name') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										<input type="text" class="form-control" id="Contractors_provider_name" name="provider_name"  maxlength="80" placeholder="">
									</div>  

									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.contractor_provide') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
										<div class="normal-border">
											<div>
												<input type="text" class="add_provider1 add_provider_Contractors" placeholder="service name" style="padding-left:10px;"  maxlength="40">
												<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
											</div>
											<div class="row added_provider_Contractors m-t-20">
												
											</div>
										</div>
									</div>   
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.contractor_hours') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" maxlength="100" id="Contractors_estimated_rent" rows="2" name="estimated_rent" placeholder="{{ trans('cat.contractor_hours_placeholder') }}"></textarea>
											</div>
										</div>
									</div>
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>	     
								</div>

								<div class="mainCategory mainCategoryRepairs">
									<div class="form-group">
                                        <label for="title" class="text-color-blue"><b>{{ trans('cat.repairs_business_name') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                        <input type="text" class="form-control" id="Repairs_provider_name"  maxlength="80" name="provider_name" placeholder="">
                                    </div>    

                                    <div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.repairs_provide') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
                                        <div class="normal-border">
                                            <div>
                                                <input type="text" class="add_provider1 add_provider_Repairs" style="padding-left:10px;"  maxlength="40">
												<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
                                            </div>
                                            <div class="row added_provider_Repairs m-t-20">
                                                
                                            </div>
                                        </div>
                                    </div>   

                                    
                                    <div class="row" style="margin-bottom:8px;">
                                        <div class="col-sm-12">
                                            <div class="form-group add-title">
                                                <label class="label-title text-color-blue"><b>{{ trans('cat.businesshours') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                                <textarea class="form-control" id="Repairs_estimated_rent" rows="2" name="estimated_rent" placeholder="{{ trans('cat.repairs_hours_placeholder') }}" maxlength="100"></textarea>
                                            </div>
                                        </div>
									</div>
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>	  
								</div>
								
								<div class="mainCategory mainCategoryCommunity">
									<div class="row" > 
                                        <div class="col-sm-12">
                                            <div class="form-group add-title">
                                                <label class="label-title text-color-blue"><b>{{ trans('cat.community_event_fair') }}</b> <span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                                <textarea class="form-control" id="Community_utilities" rows="2" name="utilities" maxlength="100" placeholder="{{ trans('cat.community_event_fair_placeholder') }}"></textarea>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                    
                                    <div class="row">                                      

                                        <div class="col-sm-6">
                                            <div class="form-group add-title">
                                                <label class="label-title text-color-blue"><b>{{ trans('cat.community_start_date') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                                <input type="text" maxlength="20" placeholder="mm/dd/yyyy" class="m-l-10 normal_input Community_event_start_date" name="s_date">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group add-title">
                                                <label class="label-title text-color-blue"><b>{{ trans('cat.community_end_date') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                                <input type="text" maxlength="20" placeholder="mm/dd/yyyy" class="m-l-10 normal_input Community_event_end_date" name="e_date">
                                            </div>
                                        </div>
                                    </div>                   
                                    <div class="row" > 
                                        <div class="col-sm-12">
                                            <div class="form-group add-title">
                                                <label class="label-title text-color-blue"><b>{{ trans('cat.community_special_guests') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                                <textarea class="form-control Community_special_guests_attending" rows="2" name="events_attending" maxlength="100" placeholder="{{ trans('cat.community_event_fair_placeholder') }}"></textarea>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                    <div class="row" > 
                                        <div class="col-sm-12">
                                            <div class="form-group add-title">
                                                <label class="label-title text-color-blue"><b>{{ trans('cat.community_tickets') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                                <textarea class="form-control Community_eventfair_tickets" rows="2" name="events_tickets" maxlength="100" placeholder="{{ trans('cat.community_tickets_placeholder') }}"></textarea>
                                            </div>                                            
                                        </div>
									</div>
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>	
								</div>

								<div class="mainCategory mainCategoryLegal">
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.lega_name') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										<input type="text" class="form-control" id="Legal_firm_name" name="provider_name"  maxlength="80" placeholder="" required>
									</div>

									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.legal_provide') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
										<div class="normal-border">
											<div>
												<input type="text" class="add_provider_Legal" style="padding-left:10px;"  maxlength="40">
												<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
											</div>
											<div class="row added_provider_Legal m-t-20">
												
											</div>
										</div>
									</div> 

									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.businesshours') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" id="Legal_estimated_rent" rows="2" name="estimated_rent" maxlength="100" placeholder="{{ trans('message.legal_hours_placeholder') }}"></textarea>
											</div>
										</div>                                        
									</div>    

									
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>	  
								</div>

								<div class="mainCategory mainCategoryTutoring">
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.tutoring_name') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										<input type="text" class="form-control" id="Tutoring_provider_name" name="provider_name"  maxlength="40" placeholder="{{ trans('cat.tutoring_name_placeholder') }}">
									</div>    
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.tutoring_provide') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										<div class="normal-border">
											<div>
												<input type="text" class="height-28 add_provider_Tutoring" style="padding-left:10px;"  maxlength="20">
												<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
											</div>
											<div class="row added_provider_Tutoring m-t-20">
												
											</div>
										</div>
									</div> 

									<div>
										<div class="row form-group add-title" style="margin-bottom:8px;">
											<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.tutoring_mode') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										</div>
										<div class="where_address">
											<div class="row" style="margin-bottom:8px;">
												<div class="col-sm-4">
													<div class="add-title">
														<label><input type="checkbox" class="Tutoring_subcategory_check_item" style="display:inline-block;" name="sale_model" value="{{ trans('cat.tutoring_mode_item1') }}">{{ trans('cat.tutoring_mode_item1') }}</label>
													</div>
												</div>

												<div class="col-sm-4">
													<div class="add-title">
														<label><input type="checkbox" class="Tutoring_subcategory_check_item" style="display:inline-block;" name="sale_make" value="{{ trans('cat.tutoring_mode_item2') }}">{{ trans('cat.tutoring_mode_item2') }}</label>
													</div>                                                
												</div>

												<div class="col-sm-4">
													<div class="add-title">
														<label><input type="checkbox" class="Tutoring_subcategory_check_item" style="display:inline-block;" name="sale_detail" value="{{ trans('cat.tutoring_mode_item3') }}">{{ trans('cat.tutoring_mode_item3') }}</label>
													</div>
												</div>
											</div> 
										</div>                                    
									</div>
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.tutoring_hours') }}</b> <span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" id="Tutoring_estimated_rent" rows="2" name="estimated_rent" maxlength="150" placeholder="{{ trans('cat.legal_hours_placeholder') }}"></textarea>
											</div>
										</div>                                        
									</div>    
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.tutoring_fee') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" id="Tutoring_utilities" rows="2" name="utilities" maxlength="200" placeholder="{{ trans('cat.tutoring_fee_placeholder') }}"></textarea>
											</div>
										</div>                                        
									</div>  

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<div class="row">
													<div class="col-sm-6">
														<label class="label-title text-color-blue" style="line-height:20px;"><b>{{ trans('cat.tutoring_duration') }}</b><br><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
													</div>
													<div class="col-sm-6">
														<input type="text" class="form-control Tutoring_duration" maxlength="15" placeholder="{{ trans('cat.tutoring_duration_placeholder') }}" name="min_exp">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group add-title">
												<div class="row">
													<div class="col-sm-6">
														<label class="label-title text-color-blue" style="line-height:20px;"><b>{{ trans('cat.tutoring_start_date') }}</b><br><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
													</div>
													<div class="col-sm-6">
														<input type="text" name="s_date" maxlength="20" placeholder="mm/dd/yyyy" class="form-control normal_input Tutoring_start_date">
													</div>
												</div>
											</div>
										</div>
									</div>       
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.tutoring_any') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control Tutoring_required" id="required" rows="2" name="required" maxlength="200" placeholder="{{ trans('cat.tutoring_any_placeholder') }}"></textarea>
											</div>
										</div>                                        
									</div> 
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>	
								</div>
								
								<div class="mainCategory mainCategoryRent">
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-6">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.rent_provider') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group add-title">
												<input type="text"  maxlength="40" name="provider_name" placeholder="" class="Rent_provider_name form-control">
											</div>
											
										</div>
									</div>
									
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.rent_cost') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" id="Rent_utilities" rows="3" name="utilities" maxlength="200"></textarea>
											</div>
											
										</div>
									</div> 
									<div class="row" style="margin-bottom:8px;">                                      

										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.rent_ready') }}</b> <span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
											</div>
										</div>
										<div class="col-sm-9">
											<div class="form-group add-title">
												<select class="form-control" id="Rent_condition" name="condition" required>
													<option value=""></option>
													<option value="{{ trans('cat.rent_ready_option1') }}">{{ trans('cat.rent_ready_option1') }}</option>
													<option value="{{ trans('cat.rent_ready_option2') }}">{{ trans('cat.rent_ready_option2') }}</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.rent_listedby') }}</b> <span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
											</div>
										</div>
										<div class="col-sm-9">
											<div class="form-group add-title">
												<select class="form-control" id="Rent_listedby" rows="4" name="listedby" required>
													<option value=""></option>
													<option value="{{ trans('cat.rent_listedby_option1') }}">{{ trans('cat.rent_listedby_option1') }}</option>
													<option value="{{ trans('cat.rent_listedby_option2') }}">{{ trans('cat.rent_listedby_option2') }}</option>
													<option value="{{ trans('cat.rent_listedby_option3') }}">{{ trans('cat.rent_listedby_option3') }}</option>
													<option value="{{ trans('cat.rent_listedby_option4') }}">{{ trans('cat.rent_listedby_option4') }}</option>
													<option value="{{ trans('cat.rent_listedby_option5') }}">{{ trans('cat.rent_listedby_option5') }}</option>
												</select>
											</div>
										</div>
									</div>

									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>
								</div>
								
								<div class="mainCategory mainCategoryMatrimonies">
									<div class="row add-title m-t-20">
										<div class="col-sm-6">
											<label class="label-title text-color-blue"><b>{{ trans('cat.mat_select_option') }}</b></label>
										</div>
										<div class="col-sm-6">
											<select type="text" name="work_auth_other" class="form-control Matrimonies_select_option">
												<option value=""></option>
												<option value="{{ trans('cat.mat_select_option_item1') }}">{{ trans('cat.mat_select_option_item1') }}</option>
												<option value="{{ trans('cat.mat_select_option_item2') }}">{{ trans('cat.mat_select_option_item2') }}</option>
												<option value="{{ trans('cat.mat_select_option_item3') }}">{{ trans('cat.mat_select_option_item3') }}</option>
												<option value="{{ trans('cat.mat_select_option_item4') }}">{{ trans('cat.mat_select_option_item4') }}</option>
											</select>
										</div>                                    
									</div>
	
									<div class="row add-title m-t-20">
										<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.mat_basic_information') }}</b></label>
									</div>
									<div class="reply_frame">                                    
										<div class="row">
											<div class="col-sm-6">
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_profile_created_by') }}</label>
													</div>
													<div class="col-xs-7">                                                    
														<select type="text" name="provider_name" class="Matrimonies_createdby form-control">
															<option value=""></option>
															<option value="{{ trans('cat.mat_profile_created_by_option1') }}">{{ trans('cat.mat_profile_created_by_option1') }}</option>
															<option value="{{ trans('cat.mat_profile_created_by_option2') }}">{{ trans('cat.mat_profile_created_by_option2') }}</option>
															<option value="{{ trans('cat.mat_profile_created_by_option3') }}">{{ trans('cat.mat_profile_created_by_option3') }}</option>
															<option value="{{ trans('cat.mat_profile_created_by_option4') }}">{{ trans('cat.mat_profile_created_by_option4') }}</option>
														</select>
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_fullname') }}</label>
													</div>
													<div class="col-xs-7">
														<input type="text" name="condition" maxlength="30" placeholder="{{ trans('cat.mat_fullname_placeholder') }}" class="Matrimonies_name form-control">
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_age') }}</label>
													</div>
													<div class="col-xs-7">
														<input type="text" name="sale_make" maxlength="30" placeholder="{{ trans('cat.mat_age_placeholder') }}" class="Matrimonies_age form-control">
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_sex') }}</label>
													</div>
													<div class="col-xs-7">                                                    
														<select type="text" name="sale_model" class="Matrimonies_sex form-control">
															<option value=""></option>
															<option value="{{ trans('cat.mat_sex_option1') }}">{{ trans('cat.mat_sex_option1') }}</option>
															<option value="{{ trans('cat.mat_sex_option2') }}">{{ trans('cat.mat_sex_option2') }}</option>
															<option value="{{ trans('cat.mat_sex_option3') }}">{{ trans('cat.mat_sex_option3') }}</option>
														</select>
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>Marital Status</label>
													</div>
													<div class="col-xs-7">                                                    
														<select type="text" name="sale_detail" class="Matrimonies_marital_status form-control">
															<option value=""></option>
															<option value="{{ trans('cat.mat_status_option1') }}">{{ trans('cat.mat_status_option1') }}</option>
															<option value="{{ trans('cat.mat_status_option2') }}">{{ trans('cat.mat_status_option2') }}</option>
															<option value="{{ trans('cat.mat_status_option3') }}">{{ trans('cat.mat_status_option3') }}</option>
															<option value="{{ trans('cat.mat_status_option4') }}">{{ trans('cat.mat_status_option4') }}</option>
															<option value="{{ trans('cat.mat_status_option5') }}">{{ trans('cat.mat_status_option5') }}</option>
															<option value="{{ trans('cat.mat_status_option6') }}">{{ trans('cat.mat_status_option6') }}</option>
														</select>
													</div>                                                
												</div>
											</div>
											<div class="col-sm-6">
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_weight') }}</label>
													</div>
													<div class="col-xs-7">
														<input type="text" name="job_level" maxlength="30" placeholder="{{ trans('cat.mat_weight_placeholder') }}" class="Matrimonies_weight form-control">
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_height') }}</label>
													</div>
													<div class="col-xs-7">
														<input type="text" name="job_industry" maxlength="30" placeholder="{{ trans('cat.mat_height_placeholder') }}" class="Matrimonies_height form-control">
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_skin_color') }}</label>
													</div>
													<div class="col-xs-7">
														<input type="text" name="color" maxlength="30" placeholder="{{ trans('cat.mat_skin_color_placeholder') }}" class="Matrimonies_skin_color form-control">
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_hair_color') }}</label>
													</div>
													<div class="col-xs-7">
														<input type="text" name="open_position" maxlength="30" placeholder="{{ trans('cat.mat_hair_color_placeholder') }}" class="Matrimonies_hair_color form-control">
													</div>                                                
												</div>
												<div class="row add-title m-b-10">
													<div class="col-xs-5">
														<label>{{ trans('cat.mat_body_style') }}</label>
													</div>
													<div class="col-xs-7">                                                   
														<select type="text" name="work_auth_any" class="Matrimonies_body_style form-control">
															<option value=""></option>
															<option value="{{ trans('cat.mat_body_style_option1') }}">{{ trans('cat.mat_body_style_option1') }}</option>
															<option value="{{ trans('cat.mat_body_style_option2') }}">{{ trans('cat.mat_body_style_option2') }}</option>
															<option value="{{ trans('cat.mat_body_style_option3') }}">{{ trans('cat.mat_body_style_option3') }}</option>
															<option value="{{ trans('cat.mat_body_style_option4') }}">{{ trans('cat.mat_body_style_option4') }}</option>
														</select>
													</div>                                                
												</div>                                      
											</div>                      
										</div>
									</div>
	
									<div class="row add-title m-t-20">
										<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.mat_professional_details') }}</b></label>
									</div>
									<div class="reply_frame">
										<label class="label-title text-color-blue"><b>{{ trans('cat.mat_occupation') }}</b></label>
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-4">
												<div class="add-title p-l-20">
													<label>{{ trans('cat.mat_employedin') }}</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="add-title">                                                
													<select type="text" name="work_auth_citizen" class="Matrimonies_employedin form-control">
														<option value=""></option>
														<option value="{{ trans('cat.mat_employedin_option1') }}">{{ trans('cat.mat_employedin_option1') }}</option>
														<option value="{{ trans('cat.mat_employedin_option2') }}">{{ trans('cat.mat_employedin_option2') }}</option>
														<option value="{{ trans('cat.mat_employedin_option3') }}">{{ trans('cat.mat_employedin_option3') }}</option>
														<option value="{{ trans('cat.mat_employedin_option4') }}">{{ trans('cat.mat_employedin_option4') }}</option>
														<option value="{{ trans('cat.mat_employedin_option5') }}">{{ trans('cat.mat_employedin_option5') }}</option>
													</select>
												</div>                                            
											</div>                      
										</div>
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-4">
												<div class="add-title p-l-20">
													<label>{{ trans('cat.mat_employment_status') }}</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="add-title">                                                
													<select type="text" name="work_auth_green" class="Matrimonies_employment_status form-control">
														<option value=""></option>
														<option value="{{ trans('cat.mat_employment_status_option1') }}">{{ trans('cat.mat_employment_status_option1') }}</option>
														<option value="{{ trans('cat.mat_employment_status_option2') }}">{{ trans('cat.mat_employment_status_option2') }}</option>
														<option value="{{ trans('cat.mat_employment_status_option3') }}">{{ trans('cat.mat_employment_status_option3') }}</option>
														<option value="{{ trans('cat.mat_employment_status_option4') }}">{{ trans('cat.mat_employment_status_option4') }}</option>
														<option value="{{ trans('cat.mat_employment_status_option5') }}">{{ trans('cat.mat_employment_status_option5') }}</option>
													</select>
												</div>                                            
											</div>                      
										</div>           
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-4">
												<div class="add-title p-l-20">
													<label>{{ trans('cat.mat_working_field') }}</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="add-title">
													<input type="text" name="work_auth_ead" maxlength="30" placeholder="{{ trans('cat.mat_working_field_placeholder') }}" class="Matrimonies_working_field form-control">
												</div>                                            
											</div>                      
										</div>
										
										<label class="label-title text-color-blue"><b>{{ trans('cat.mat_education') }}</b></label>
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-4">
												<div class="add-title p-l-20">
													<label>{{ trans('cat.mat_heducation') }}</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="add-title">
													<input type="text" maxlength="50" name="work_auth_h1b" placeholder="{{ trans('cat.mat_heducation_placeholder') }}" class="Matrimonies_education form-control">
												</div>                                            
											</div>                      
										</div>
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-4">
												<div class="add-title p-l-20">
													<label>{{ trans('cat.mat_specialization') }}</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="add-title">
													<input type="text" maxlength="50" name="work_auth_h4" placeholder="{{ trans('cat.mat_specialization_placeholder') }}" class="Matrimonies_specialization form-control">
												</div>                                            
											</div>                      
										</div>           
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-4">
												<div class="add-title p-l-20">
													<label>{{ trans('cat.mat_school') }}</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="add-title">
													<input type="text" maxlength="50" name="work_auth_l1" placeholder="{{ trans('cat.mat_school_placeholder') }}" class="Matrimonies_school form-control">
												</div>                                            
											</div>                      
										</div>  
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-4">
												<div class="add-title p-l-20">
													<label>{{ trans('cat.mat_graduatedin') }}</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="row add-title">
													<div class="col-xs-6">
														<input type="text" maxlength="50" name="work_auth_l2" placeholder="{{ trans('cat.mat_graduatedin_month') }}" class="Matrimonies_month form-control">
													</div>
													<div class="col-xs-6">
														<input type="text" maxlength="50" name="work_auth_opt" placeholder="{{ trans('cat.mat_graduatedin_year') }}" class="Matrimonies_year form-control">
													</div>
												</div>                                            
											</div>                      
										</div>                                                              
									</div>
	
									<div class="row add-title m-t-20">
										<div class="col-sm-12">
											<label class="label-title text-color-blue"><b>{{ trans('cat.mat_lifestyle') }}</b></label>
											<p class="alert-red fs-12">*{{ trans('cat.mat_lifestyle_text') }}</p>
										</div>
									</div>
									<div class="reply_frame">
										
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-12">
												<div class="normal-border">  
													<label for="title"><span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>                                              
													<div>
														<input type="text" class="add_provider_life add_provider_life_Matrimonies" maxlength="20" placeholder="eg.vegiterian" style="padding-left:10px;">
														<button type="button" class="btn-custom btn-add-life"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
													</div>
													<div class="row added_life_Matrimonies m-t-20">
														
													</div>
												</div>      
											</div>                                                                 
										</div>                                     
									</div>
	
	
									<div class="row add-title m-t-20">
										<div class="col-sm-12">
											<label class="label-title text-color-blue"><b>{{ trans('cat.mat_interest_hobbies') }}</b></label>
											<p class="alert-red fs-12">*{{ trans('cat.mat_interest_text') }}</p>
										</div>
									</div>
									<div class="reply_frame">
										
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-12">
												<div class="normal-border">  
													<label for="title" class="text-color-blue"><b>{{ trans('cat.mat_interest') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>                                              
													<div>
														<input type="text" class="add_provider_Matrimonies height-28" maxlength="20" placeholder="{{ trans('cat.mat_interest_placeholder') }}" style="padding-left:10px;">
														<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
													</div>
													<div class="row added_provider_Matrimonies m-t-20">
														
													</div>
												</div>      
											</div> 
											<div class="col-sm-12 m-t-15">
												
												<div class="normal-border">
													<label for="title" class="text-color-blue"><b>{{ trans('cat.mat_hobbies') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
													<div>
														<input type="text" class="add_position_Matrimonies height-28" placeholder="{{ trans('cat.mat_hobbies_placeholder') }}" maxlength="20" style="padding-left:10px;">
														<button type="button" class="btn-custom btn-add-position"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
													</div>
													<div class="row added_complex_Matrimonies m-t-20">
														
													</div>
												</div>               
											</div>
																														
										</div>                                     
									</div>
	
									<div class="row add-title m-t-20">
										<label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.mat_religion') }}</b></label>
									</div>
									<div class="reply_frame">
										<div class="row" style="margin-bottom:8px;">
											<div class="col-sm-3">
												<div class="add-title">
													<label><input type="radio" class="subcategory_check_item Matrimonies_religion" style="display:inline-block;" name="conditionM[]"  value="{{ trans('cat.mat_religion_radio1') }}">{{ trans('cat.mat_religion_radio1') }}</label>
												</div>
											</div>
	
											<div class="col-sm-3">
												<div class="add-title">
													<label><input type="radio" class="subcategory_check_item Matrimonies_religion" style="display:inline-block;" name="conditionM[]" value="{{ trans('cat.mat_religion_radio2') }}">{{ trans('cat.mat_religion_radio2') }}</label>
												</div>                                            
											</div>
	
											<div class="col-sm-3">
												<div class="add-title">
													<label><input type="radio" class="subcategory_check_item Matrimonies_religion" style="display:inline-block;" name="conditionM[]" value="{{ trans('cat.mat_religion_radio3') }}">{{ trans('cat.mat_religion_radio3') }}</label>
												</div>
											</div>
	
											<div class="col-sm-3">
												<div class="add-title">
													<label><input type="radio" class="subcategory_check_item Matrimonies_religion" style="display:inline-block;" name="conditionM[]" value="{{ trans('cat.mat_religion_radio4') }}">{{ trans('cat.mat_religion_radio4') }}</label>
												</div>
											</div> 
											<div class="col-sm-3">
												<div class="add-title">
													<label><input type="radio" class="subcategory_check_item Matrimonies_religion" style="display:inline-block;" name="conditionM[]" value="{{ trans('cat.mat_religion_radio5') }}">{{ trans('cat.mat_religion_radio5') }}</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="add-title">
													<label><input type="radio" class="subcategory_check_item Matrimonies_religion" style="display:inline-block;" name="conditionM[]" value="{{ trans('cat.mat_religion_radio6') }}">{{ trans('cat.mat_religion_radio6') }}</label>
												</div>
											</div>     
											<div class="col-sm-3">
												<div class="add-title">
													<label><input type="radio" class="subcategory_check_item Matrimonies_religion" style="display:inline-block;" name="conditionM[]" value="{{ trans('cat.mat_religion_radio7') }}">{{ trans('cat.mat_religion_radio7') }}</label>
												</div>
											</div>                                                         
										</div>                                     
									</div>
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>
								</div>

								<div class="mainCategory mainCategoryMissing">
									<div class="form-group add-title">
										<label class="label-title text-color-blue"><b>{{ trans('cat.missing_title') }}</b> <span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										<div class="">
											<div class="">
												<table>
													<tbody>
														<tr>
															<td style="padding:10px;" width="18%" align="center">
																<label for="">{{ trans('cat.missing_select') }}</label>
																<select type="text" class="form-control common_change item_sel">
																	<option value=""></option>
																	<option value="{{ trans('cat.missing_lost') }}">{{ trans('cat.missing_lost') }}</option>
																	<option value="{{ trans('cat.missing_found') }}">{{ trans('cat.missing_found') }}</option>
																</select>
															</td>
															<td style="padding:10px;" width="25%" align="center">
																<label for="">{{ trans('cat.missing_item') }}</label>
																<input type="text" maxlength="20" placeholder="{{ trans('cat.missing_item_placeholder') }}" class="form-control common_change item_name">
															</td>
															<td style="padding:10px;" width="17%" align="center">
																<label for="">{{ trans('cat.missing_value') }}</label>
																<input type="text" maxlength="20" placeholder="{{ trans('cat.missing_value_placeholder') }}" class="form-control common_change item_value">
															</td>
															<td style="padding:10px;" width="20%" align="center">
																<label for="">{{ trans('cat.missing_date') }}</label>
																<input type="date" class="form-control item_date common_change restrict_date" placeholder="yyyy-mm-dd" max="">
															</td>
															<td style="padding:10px;" width="15%" align="center">
																<label for="">{{ trans('cat.missing_location') }}</label>
																<input type="text" maxlength="20" placeholder="{{ trans('cat.missing_location_placeholder') }}" class="form-control common_change item_location">
															</td>
															<td style="padding:10px;" width="5%">
																<button type="button" class="btn-item"><span><svg aria-hidden="true" style="height:25px;" focusable="false" data-prefix="far" data-icon="plus-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-plus-square fa-w-14 fa-2x"><path fill="currentColor" d="M352 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm96-160v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z" class=""></path></svg></span></button>
															</td>
														</tr>
													</tbody>
													<tbody class="added_item">

													</tbody>
												</table>
											</div>
											<div class="alert_missing">
												<p class="fs-12 alert-red">{{ trans('cat.missing_note') }}</p>
											</div>
										</div>
									</div>
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>
								</div>

								<div class="mainCategory mainCategoryFashion">									
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.fashion_title') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
										<input type="text" class="form-control" id="Fashion_provider_name" name="provider_name"  maxlength="40" placeholder="">
									</div> 
									
									<div class="form-group">
										<label for="title" class="text-color-blue"><b>{{ trans('cat.fashion_provide') }}</b> <span class="required alert-red">({{ trans('cat.dont_duplicate') }})</span></label>
										<div class="normal-border">
											<div>
												<input type="text" class="add_provider_Fashion add_provider1" placeholder="service name"  maxlength="40" style="padding-left:10px;">
												<button type="button" class="btn-custom btn-add-provider"><i class="fa fa-plus"></i> {{ trans('cat.job_add_more') }}</button>
												<span class="text-optional">({{ trans('message.cp_optional') }})</span>
											</div>
											<div class="row added_provider_Fashion m-t-20">
												
											</div>
										</div>
									</div>
									
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('cat.businesshours') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
												<textarea class="form-control" id="Fashion_estimated_rent" rows="2" name="estimated_rent" maxlength="100" placeholder="{{ trans('cat.fashion_hours_placeholder') }}"></textarea>
											</div>
										</div>                                        
									</div> 
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>
								</div>
								
								<div class="mainCategory mainCategoryAdaption">
									<div class="form-group">
                                        <label for="title" class="text-color-blue"><b>{{ trans('cat.adaption_contact') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                        <input type="text" class="form-control" id="Adaption_provider_name" name="provider_name"  maxlength="40" placeholder="">
                                    </div>   
                                    
                                    <div class="row form-group add-title" style="margin-bottom:8px;">
                                        <label class="col-sm-12 label-title text-color-blue"><b>{{ trans('cat.adaption_pet_info') }}</b><span class="text-optional">({{ trans('message.cp_optional') }})</span></label>
                                    </div>
                                    <div class="where_address">
                                        <div class="row" style="margin-bottom:8px;">
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.adaption_breed') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <input type="text" class="form-control Adaption" id='Adaption_breed_species' placeholder="{{ trans('cat.adaption_breed_placeholder') }}" maxlength="30" name="sale_make" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>      
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.pet_age') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <input type="text" class="form-control Adaption" id='Adaption_age' maxlength="15" placeholder="{{ trans('cat.pet_age_placeholder') }}" name="year" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>    
                                            
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.pet_color') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <input type="text" class="form-control Adaption" id='Adaption_color' placeholder="{{ trans('cat.pet_color_placeholder') }}" maxlength="20" name="color" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>   
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.pet_size') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <input type="text" class="form-control Adaption" id='Adaption_size' placeholder="{{ trans('cat.pet_size_placeholder') }}" maxlength="20" name="sale_model" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>            
                                            
                                            
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.pet_weight') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <input type="text" class="form-control Adaption" id='Adaption_weight' placeholder="{{ trans('cat.pet_weight_placeholder') }}" maxlength="20" name="sale_detail" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>   
                                            <div class="col-sm-4 m-t-15">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            <label class="label-title lh-32"><b>{{ trans('cat.pet_sex') }}</b></label>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <input type="text" class="form-control Adaption" id='Adaption_sex' placeholder="{{ trans('cat.pet_sex_placeholder') }}" maxlength="20" name="condition" autocomplete="off">
                                                        </div>                                                    
                                                    </div>
                                                </div>                                                
                                            </div>                                
                                        </div>                                        
                                    </div> 
									<div class="m-t-20">
										<button type="button" class="btn btn-green btn-md pull-right btn-post-submit btn_step_post_short_info">{{ trans('message.cp_next') }}</button>
									</div>
								</div>

							</div>							
						</fieldset>					
					</div>
				
					<div class="col-md-3">
						@include('layouts.posting_tips')
					</div>
				</div>			
			</div>	
		</div>
	</section>
	
	<section id="step_post_location" class="scroll_top_position setp_sub_page">
		<div class="container">
			<div class="adpost-details">
				<div class="row">	
					<div class="col-md-9">
						<fieldset>
							<div class="section postdetails" style="padding: 25px 25px 56px;">
								<div class="">
									<div class="row" style="margin-bottom:8px;">
										<div class="col-sm-12">
											<div class="form-group" style="margin-bottom:5px;">
												<label class="label-title text-color-blue"><b>{{ trans('cat.addressline') }}</b></label>
												<input type="text" class="form-control" id="service_address" placeholder="{{ trans('cat.addressline') }}({{ trans('message.cp_optional') }})" maxlength="100" name="service_address">
											</div> 
										</div>

										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('message.zip') }}</b><span class="required  alert-red">*</span></label>
												<input type="text" class="form-control zip_code address_required_field" id="service_zip" maxlength="5" placeholder="{{ trans('message.enterzip') }}" name="in_service_zip" required autocomplete="off">
												<button type="button" class="btn_no_border_style btn_show_userlocation">
														<svg aria-hidden="true" style="width:20px;height:20px;" focusable="false" data-prefix="fas" data-icon="crosshairs" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-crosshairs fa-w-16 fa-3x"><path fill="currentColor" d="M500 224h-30.364C455.724 130.325 381.675 56.276 288 42.364V12c0-6.627-5.373-12-12-12h-40c-6.627 0-12 5.373-12 12v30.364C130.325 56.276 56.276 130.325 42.364 224H12c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h30.364C56.276 381.675 130.325 455.724 224 469.636V500c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12v-30.364C381.675 455.724 455.724 381.675 469.636 288H500c6.627 0 12-5.373 12-12v-40c0-6.627-5.373-12-12-12zM288 404.634V364c0-6.627-5.373-12-12-12h-40c-6.627 0-12 5.373-12 12v40.634C165.826 392.232 119.783 346.243 107.366 288H148c6.627 0 12-5.373 12-12v-40c0-6.627-5.373-12-12-12h-40.634C119.768 165.826 165.757 119.783 224 107.366V148c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12v-40.634C346.174 119.768 392.217 165.757 404.634 224H364c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h40.634C392.232 346.174 346.243 392.217 288 404.634zM288 256c0 17.673-14.327 32-32 32s-32-14.327-32-32c0-17.673 14.327-32 32-32s32 14.327 32 32z" class=""></path></svg>
												</button>												
											</div>
										</div>

										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('message.city') }}</b><span class="required  alert-red">*</span></label>
												<input type="text" class="form-control address_required_field address_auto_in" id='tn_departure' placeholder="{{ trans('message.entercity') }}" name="in_service_city" autocomplete="off"  required>
												<input type="hidden" id="service_county" name="in_service_county">
											</div>
										</div>                                   
										
										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('message.state') }}</b><span class="required  alert-red">*</span></label>                                            
												<input type="text" class="form-control address_required_field address_auto_in" id="service_state" placeholder="{{ trans('message.enterstate') }}" name="in_service_state">
											</div>                                        
										</div>
										
										<div class="col-sm-3">
											<div class="form-group add-title">
												<label class="label-title text-color-blue"><b>{{ trans('message.country') }}</b><span class="required  alert-red">*</span></label>
												<input type="text" class="form-control address_required_field address_auto_in" id="service_country"  placeholder="{{ trans('message.country') }}" name="in_service_country">                                            
											</div>
										</div>										
									</div> 
								</div>
								<div class="row form-group item-description">
									<input type="hidden" name="latitude" class="latitude">
									<input type="hidden" name="longitude" class="longitude">
									
									<div class="col-sm-12">
										<div id="map" style="width:100%;height:250px;border:1px solid #c2c2c2;"></div>
									</div>
								</div>
								<div id="county_details">
									
								</div>				
								<div class="m-t-20">
									<button type="button" class="btn btn-green btn-md pull-right btn_step_post_location">{{ trans('message.cp_next') }}</button>
								</div>
							</div>
							
						</fieldset>					
					</div>
				
					<div class="col-md-3">
						@include('layouts.posting_tips')
					</div>
				</div>			
			</div>	
		</div>
	</section>
	<section id="step_post_preview" class="scroll_top_position setp_sub_page">
		<div class="container">
			<div class="row">			
				<div class="col-sm-12 text-center post_preview_label"> 
					<label for="" class="label-title fs-17">{{ trans('cat.post_preview') }}</label>
					<span id="post_edit" class="fs-16 text-color-blue"><b>({{ trans('cat.post_edit') }})</b></span>	
				</div>
			</div>
		</div>
	
		<div class="container"> 
			<div class="section slider-post_detail">	
							
				<div class="row">
					<!-- carousel -->
					<div class="col-md-8">
						<div class="slider_part min_h_370">
							<ul class="pgwSlider">
															
							</ul>
						</div>
						<div class="">
							<div id="description" class="description m-t-50 line-top">
											
							</div>
						</div>
					</div><!-- Controls -->	
	
					<!-- slider-text -->
					<div class="col-md-4">
						<div class="slider-text">
							
							<h3 class="title post_title"></h3>
							<p>
							<span class="text-color-blue">{{ trans('cat.post_id') }}:</span><span><a href="#" class="time"> *** </a></span> &nbsp;&nbsp; <span class="icon m-r-20"><i class="fa fa-clock-o m-r-5"></i><a href="#"> 1{{ trans('cat.post_min_ago') }} </a></span></p>
							                   
							<span class="icon" style="margin:0px;"><i class="fa fa-map-marker m-r-5"></i><a href="#" class="address"></a></span>
							
							<!-- short-info -->
							<div class="short-info border_top m-t-10"> 
								
							</div><!-- short-info -->
													
							<div class="contact-with border_top p-b-10 p-t-10" style="position:relative;">                                
								<h4 class="title">{{ trans('cat.post_reply') }}</h4>                                
								<div class="reply_detail">
	
								</div>                               
							</div>
									
						</div>
						
						<div class="short-info-location m-t-40">
							<div class="short-info-location">                        
								<div id="mapDetail" style="width:100%;height:360px;"></div>
							</div>
						</div>
					</div><!-- slider-text -->	
					
					<div class="col-md-12">
						<div class="category_additional_text">							
							<div id="additionaltext"></div>
						</div>
					</div>
				</div>				
			</div><!-- slider -->
			
			
			<div class="description-info m-t-30 post_detail m-b-15">
			
				<div class="row m-t-20 m-b-10">
					<div class="col-sm-12 text-center">
						<div class="checkbox" style="display:inline-block;">
							<label class="pull-left" for="signing"><input type="checkbox" name="signing" id="signing"> {{ trans('cat.post_submit_text1') }} <a href="{{ route('prohibited') }}" target="_blank"><span class="text-color-blue"><b>{{ trans('cat.post_submit_text2') }}</b></span></a>   {{ trans('cat.post_submit_text3') }} <a href="{{ route('terms_use') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">{{ trans('cat.post_submit_text4') }}</a>  {{ trans('cat.post_submit_text5') }} <a href="{{ route('privacy_policy') }}" target="_blank" style="color:rgb(32, 69, 231);font-weight:600;">{{ trans('cat.post_submit_text6') }}</a> {{ trans('cat.post_submit_text7') }}</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					
					<div class="col-md-12" style="text-align:center;">
						<button type="button" class="btn btn-green m-b-20 btn_unagree" disabled>{{ trans('message.submit') }}</button>
						<button type="button" class="btn btn-green m-b-20 btn_agree_post">{{ trans('message.submit') }}</button>
					</div>
										
				</div>
			</div>
			
		</div>
	</section>
</form>
<input type="hidden" class="current_page" value="createpost">

<div class="delay">
	<img src="{{ asset('assets/images/delay.gif') }}" alt="" srcset="">
</div>

<script>
	var autocomplete;
	var autocomplete1;
	var autocomplete_addr;
	var map = null;
	function showCities(county,state)
	{
		$.ajax({
			url: "/getcities",
			data: {county: county,state: state},
			dataType: "json",
			type: "get",
			success: function(data)
			{
				$("#county_details").html("");
				if(data.length > 1)
				{
					$("#county_details").append('<label class="label-title text-color-blue"><b>Your post appears in the following cities</b></label><p><span class="county_name"><b>'+ county +'</b></span>&nbsp;County&nbsp;,<b>'+ state +'</b>&nbsp;>&nbsp;<span>Cities</span></p><ul class="cities_warp"></ul>');
				}
				for (let index = 0; index < data.length; index++) {
					$(".cities_warp").append('<li><div class="cities_item"><span>'+ data[index].city +'<span></div></li>')
				}					
			}
		});		
	}
	function fillInAddress() 
	{ 		
		var temp = $("#tn_departure").val();        
		var location = temp.split(',');           
		if(location.length > 2)
		{            
			$("#tn_departure").val(location[0]);
			$("#service_state").val(location[1]);
			$("#service_country").val(location[2]);
			
			$("#service_address").val("");
			if($(".address_auto_in").hasClass("red_border"))
			{
				$(".address_auto_in").removeClass("red_border");
			}
		}
		else
		{            
			$("#service_state").val("");
			$("#service_country").val("");
			$("#tn_departure").addClass("red_border");
			$.alert({
				title: 'Woops!',
				content: "Please use the auto address input function. And confirm city name.",
			});   
			
			$("#tn_departure").val("");
		}
		
		var place = autocomplete.getPlace(); 

		for (let index = 0; index < place.address_components.length; index++) {	
			if((place.address_components[index].short_name).indexOf("County") > 0)	
			{			
				county = (place.address_components[index].short_name).replace(' County','');			
				$("#service_county").val((place.address_components[index].short_name).replace(' County',''));
				if(county != "")
				{
					showCities(county,location[1]);
				}
			}				
		}           

		var latitude = place.geometry.location.lat(); 
		var longitude = place.geometry.location.lng();
		$(".latitude").val(latitude);
		$(".longitude").val(longitude);
		var uluru = {lat: latitude, lng: longitude};        

		radius = new google.maps.Circle({zoom:15,map: map,
				radius: 200,
				center: uluru,
				fillColor: '#777',
				fillOpacity: 0.1,
				strokeColor: '#AA0000',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				draggable: true,    // Dragable
				editable: true      // Resizable
			});
			
		map.panTo(new google.maps.LatLng(latitude,longitude));        
	}			

	function fillInAddressAddr() { 
		var place = autocomplete_addr.getPlace(); 
		var temp = $("#service_address").val();        
		var location = temp.split(',');     
		var templength = location.length;
		var county = "";
		if(location.length > 2)
		{           
			
			$("#tn_departure").val(location[templength-3]);
			$("#service_state").val(location[templength-2]);
			$("#service_country").val(location[templength-1]);

			for (let index = 0; index < place.address_components.length; index++) {	
				if((place.address_components[index].short_name).indexOf("County") > 0)	
				{		
					county = (place.address_components[index].short_name).replace(' County','');
					$("#service_county").val((place.address_components[index].short_name).replace(' County',''));
					if(county != "")
					{
						showCities(county,location[templength-2]);
					}
				}
			} 

			if(location.length == 3)
			{   
				$("#service_address").val("");
			}
			if(location.length > 3)
			{
				var temp_location = "";
				for (let index = 0; index < (location.length-3); index++) {
					temp_location += location[index]; 
				}
				$("#service_address").val(temp_location);
				
				templength_p = place.address_components.length;
				var zip_code = "";
				var zip_code1 = place.address_components[templength_p-1].short_name;
				var zip_code2 = place.address_components[templength_p-2].short_name;
				zip_code1 = parseInt(zip_code1);
				zip_code2 = parseInt(zip_code2);
				if(zip_code2 > 0)
				{
					zip_code = zip_code2;
				}
				else
				{
					if(zip_code1 > 0)
					{
						zip_code = zip_code1;
					}
				}
				$("#service_zip").val(zip_code);

				
			}
			if($(".address_auto_in").hasClass("red_border"))
			{
				$(".address_auto_in").removeClass("red_border");
			}
		}
		else
		{   
			alert("You have to select atleast city, state, country and zip code !.");
			$("#service_state").val("");
			$("#service_country").val("");
			$("#tn_departure").val("");
			$("#service_address").focus();
		}
		
		
		var latitude = place.geometry.location.lat(); 
		var longitude = place.geometry.location.lng();
		$(".latitude").val(latitude);
		$(".longitude").val(longitude);			
		
		var uluru = {lat: latitude, lng: longitude};  
		
		var map = new google.maps.Map(
		document.getElementById('map'), {zoom: 15, center: uluru});
				
		var radius = new google.maps.Circle({zoom:15,map: map,
				radius: 200,
				center: uluru,
				fillColor: '#777',
				fillOpacity: 0.1,
				strokeColor: '#AA0000',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				draggable: true,    // Dragable
				editable: true      // Resizable
			});

			
		map.panTo(new google.maps.LatLng(latitude,longitude));        
		
	}

	function initMap() {
		var uluru = {lat: 32.715736, lng: -117.161087};
		map = new google.maps.Map(
		document.getElementById('map'), {zoom: 15, center: uluru});		
		
		autocomplete_addr = new google.maps.places.Autocomplete(document.getElementById('service_address'), {componentRestrictions: {country: "us"}}); 
		autocomplete_addr.addListener('place_changed', fillInAddressAddr);

		var radius = null;
		google.maps.event.addListener(map, "click", function (event) {

			if(radius){
				radius.setMap(null);
			}
			var latitude = event.latLng.lat();
			var longitude = event.latLng.lng();
			$(".latitude").val(latitude);
			$(".longitude").val(longitude);

			radius = new google.maps.Circle({map: map,
				radius: 200,
				center: event.latLng,
				fillColor: '#777',
				fillOpacity: 0.1,
				strokeColor: '#AA0000',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				draggable: true,    // Dragable
				editable: true      // Resizable
			});			
			map.panTo(new google.maps.LatLng(latitude,longitude));	
		}); 
	}
</script>
<script>
	function showCities(county,state)
	{
		$.ajax({
			url: "/getcities",
			data: {county: county,state: state},
			dataType: "json",
			type: "get",
			success: function(data)
			{
				$("#county_details").html("");
				if(data.length > 1)
				{
					$("#county_details").append('<label class="label-title text-color-blue"><b>Your post appears in the following cities</b></label><p><span class="county_name"><b>'+ county +'</b></span>&nbsp;County&nbsp;,<b>'+ state +'</b>&nbsp;>&nbsp;<span>Cities</span></p><ul class="cities_warp"></ul>');
				}
				for (let index = 0; index < data.length; index++) {
					$(".cities_warp").append('<li><div class="cities_item"><span>'+ data[index].city +'<span></div></li>')
				}					
			}
		});
		
	}

	$(document).ready(function() 
	{
		$.support.cors = true;
		$.ajaxSetup({ cache: false });
		var city = '';
		var hascity = 0;
		var hassub = 0;
		var state = '';
		var nbhd = '';
		var subloc = '';
				

		$('#service_zip').keyup(function() {
			$zval = $('#service_zip').val();
			
			if($zval.length == 5){
				
				$jCSval = getCityState($zval, true);
				$("#service_address").val("");
			}
		});
	  
		$(".btn_show_userlocation").click(function(){	
			$('#service_zip').val($(".default_zipcode").val());		
			$zval = $(".default_zipcode").val();
			
			if($zval.length == 5){
				
				$jCSval = getCityState($zval, true);
				$("#service_address").val("");
			}
		});

		function getCityState($zip, $blnUSA) 
		{
			var inputedCity = $("#tn_departure").val();
			inputedCity = inputedCity.trim();
			var date = new Date();
			$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + $zip + '&key={{ env('MAP_API_KEY') }}&type=json&_=' + date.getTime(), function(response){
				
				if(response.status == "OK")
				{
					console.log(response.status);
					var address_components = response.results[0].address_components;
					var location_components = response.results[0].geometry.location;
					var new_lat = location_components.lat;
					var new_lng = location_components.lng;
					
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
							if(type == 'country') {
							country = component.short_name;				  
							}
						});
					});
					
					$("#tn_departure").val(city);
					$("#service_state").val(state);
					$("#service_country").val(country);
					$("#service_county").val(county);
					showCities(county,state);
					$(".latitude").val(new_lat);
					$(".longitude").val(new_lng);
					var uluru = {lat: new_lat, lng: new_lng};        
				
					var map = new google.maps.Map(document.getElementById('map'), {
							center: uluru,
							zoom: 13,
							mapTypeId: 'roadmap'
						});

					var ctaLayer = new google.maps.KmlLayer({
						url: 'https://zipcode.adnlist.com/zip'+$zip+'.kml',
						map: map
					});				
					
				}
				else
				{			
					$(".latitude").val("");
					$(".longitude").val("");
					$("#service_zip").addClass("red_border");
					$("#tn_departure").val("");
					$("#service_state").val("");
					$("#service_country").val("");
					$("#service_county").val("");
					$.alert({
						title: 'Woops!',
						content: "Invalid zipcode.",
					});   
					$("#county_details").html(""); 
				}
				
			});
		}
	});
</script>
<script>
	$('select[multiple]').multiselect();
	$('.multiselect').multiselect({
		columns: 1,
		placeholder: 'Select Languages'
	});      
	
	$('.check_change_city').click(function(){
		$(".where_address").slideToggle();
	});
	autosize(document.getElementById("post_detail"));
</script>
@endsection
