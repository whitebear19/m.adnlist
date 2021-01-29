

@section('style')
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
@endsection
@section('script')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
<div class="ad-profile section">	
    <div class="user-profile">
       
        <div class="user">
            <h2 class="m-t-10"><span class="fs-18">{{ trans('message.userprofile_welcome') }}</span> <span class="text-color-blue fs-20"> @if(!empty(Auth::user()->name)){{ Auth::user()->name }} @else @if(!empty(Auth::user()->fname)){{ Auth::user()->fname }} @endif @if(!empty(Auth::user()->lname)){{ Auth::user()->lname }} @endif  @endif</span></h2>            
        </div>
        <div style="float:right;" class="m-t-5">
            <form action="{{ route('update_user_status') }}" id="deactivate_form" class="update_user_status_form">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="user_status" value="2">
                <input type="hidden" name="user_side" value="true">
                <button type="button" class="btn btn-cancel delete_button_user">{{ trans('message.userprofile_deactivate') }}</button>                        
            </form>     
        </div>
    </div>
            
    <ul class="user-menu">
        <li class="@if($page_name == 'profile') active @endif"><a href="{{ route('user_profile') }}">{{ trans('message.userprofile_profile') }}</a></li>
        <li class="@if($page_name == 'pwd') active @endif"><a href="{{ route('user_change_password') }}">{{ trans('message.userprofile_changepwd') }}</a></li>
        @if(Auth::user()->role == "0")
            <li class="@if($page_name == 'notification') active @endif"><a href="{{ route('user_messages','read') }}">{{ trans('message.userprofile_notification') }}<span>(@if(!empty($userDetail['user_num_unread'])){{ $userDetail['user_num_unread'] }}@else 0 @endif)</span></a></li>
            <li class="@if($page_name == 'ads') active @endif"><a href="{{ route('user_advertisement') }}">{{ trans('message.userprofile_activeposts') }}<span>(@if(!empty($userDetail['user_ads_num'])){{ $userDetail['user_ads_num'] }} @else 0 @endif)</span></a></li>
            <li class="@if($page_name == 'pen') active @endif"><a href="{{ route('user_pending_approval_ads') }}">{{ trans('message.userprofile_pending') }}<span>(@if(!empty($userDetail['user_pending_num'])){{ $userDetail['user_pending_num'] }}@else 0 @endif)</span></a></li>
            <li class="@if($page_name == 'draft') active @endif"><a href="{{ route('user_draft_ads') }}">{{ trans('message.userprofile_draft') }}<span>(@if(!empty($userDetail['user_draft_num'])){{ $userDetail['user_draft_num'] }} @else 0 @endif)</span></a></li>
            <li class="@if($page_name == 'expired') active @endif"><a href="{{ route('user_expired_ads') }}">{{ trans('message.userprofile_expired') }}<span>(@if(!empty($userDetail['user_expired_num'])){{ $userDetail['user_expired_num'] }} @else 0 @endif)</span></a></li>
        @elseif(Auth::user()->role == "1")
            <li class="@if($page_name == '') active @endif"><a href="{{ route('user_messages','read') }}">{{ trans('message.userprofile_messages') }}</a></li>
            <li class="@if($page_name == '') active @endif"><a href="{{ route('user_advertisement') }}">{{ trans('message.userprofile_mylisting') }}<span>(@if(!empty($user_ads_num)){{ $user_ads_num }} @else 0 @endif)</span></a></li>
            <li class="@if($page_name == '') active @endif"><a href="{{ route('user_pending_approval_ads') }}">{{ trans('message.userprofile_sold') }}<span>(@if(!empty($user_pendding_num)){{ $user_pendding_num }} @else 0 @endif)</span></a></li>
            <li class="@if($page_name == '') active @endif"><a href="{{ route('user_draft_ads') }}">{{ trans('message.userprofile_selling') }}<span>(@if(!empty($user_draft_num)){{ $user_draft_num }} @else 0 @endif)</span></a></li>
            <li class="@if($page_name == '') active @endif"><a href="{{ route('user_draft_ads') }}">{{ trans('message.userprofile_waiting') }}<span>(@if(!empty($user_draft_num)){{ $user_draft_num }} @else 0 @endif)</span></a></li>
        @endif
    </ul>
</div>
<script>
    $(function() {
        $(".delete_button_user").click(function(){
            if (confirm("Conformation! Do you really want to deactivate this account?"))
            {
                $('form#deactivate_form').submit();
            }
        });
    });
</script>