@extends('welcome')
@section('bcbs_title', trans('bcbs.bcbs_forgot_password'))
@section('bcbs_content')
    <div class="row">
        <div class="col s12 m6 offset-m3 w3-margin-top w3-padding input-field w3-round-large w3-padding w3-light-gray" id="signUp" style=" box-shadow: inset 0px 0px 10px rgba(150, 143, 143, 0.8);">
            <div class="progress" id="activate_loaders" style="position: relative; z-index: 99999">
                <div class="indeterminate"></div>
            </div>

            <form id="reactivation">
                <div class="row">
                    <h3 class="center blue-text italic flow-text font">{{ trans('bcbs.reset_password') }}</h3>
                    @if(session()->has('error'))
                        <div class="row">
                            <div class="col s10 m10 w3-padding offset-s1 offset-m1 w3-margin-top red red-text lighten-5">{{session()->get('error')}}</div>
                        </div>
                    @else
                        <div class="row">
                            <div id="resent_hide">
                                <div class="center col w3-medium s10 m10 offset-s1 offset-m1 w3-padding font">
                                    Enter you email to reset you password
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <p class="center" style="margin-top: -20px"><i class="fa fa-lock w3-xlarge orange-text"></i></p>
                <div class="row w3-padding">
                    <div class="col s12 m10 offset-m1 input-field">
                        <label for="bcbs_email">{{ trans('messages.enter_email') }}</label>
                        <input class="validate" type="email" id="reset_email" required>
                        <span class="helper-text" data-error="invalid email" data-success=""></span>
                    </div>
                </div>
                <div class="row double">
                    <div id="show_key" class="col s4 m4 bold font center w3-margin-top blue-text cursor">
                        <a href="{{route('bcbs.admission.home')}}" class="w3-large">Home &nbsp;<i class="fa fa-home grey-text"></i></a>
                    </div>
                    <div class="col s6 m5 offset-m2 offset-s2 center">
                        <button type="button" class="btn blue w3-medium" onclick="activateAccountResend()">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#activate_loaders').hide();
        function activateAccountResend() {
            if(!$("#reset_email")[0].value) {
                toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.email')]) }}");
                return false;
            }
            $('#activate_loaders').show();
            $.ajax({
                url : '{{ route("bcbs.password.reset") }}',
                type : "post",
                data : {
                    '_token' : '{{ csrf_token() }}',
                    email : $("#reset_email")[0].value,
                },
                success: function(res) {
                    $('html, body').animate({scrollTop: 0}, 800);
                    $('#activate_loaders').hide();
                    toastr.success(res);
                    document.getElementById('reactivation').innerHTML = '';
                    document.getElementById('reactivation').innerHTML = '<div class="w3-padding green-text green lighten-5 center">'+res+'<br><a href="{{route("bcbs.admission.home")}}" class="bold underline">close this page</a></div>';
                    setTimeout(() => {
                        localStorage.setItem('reactivateSucess', JSON.stringify(res));
                      // window.location = "{{route('bcbs.admission.signIn', ['val' => 'reactivateSucess'])}}";
                    }, 1000);
                },
                error: function(error) {
                    const errorMessage = JSON.parse(error.responseText);
                    $('#activate_loaders').hide();
                    if(errorMessage?.error === 'exception') {
                        document.getElementById('resent_hide').innerHTML = "<div class='col s10 m10 offset-s1 offset-m1 w3-padding red red-text lighten-5 w3-round font'>"+ "{{trans('bcbs.offline')}}" + "</div>";
                        document.getElementById("reactivation").reset();
                        toastr.error(errorMessage[1]);
                        return;
                    }
                    toastr.error(errorMessage?.message?.message);
                    document.getElementById('resent_hide').innerHTML = "<div class='col s10 m10 offset-s1 offset-m1 w3-padding red red-text lighten-5 w3-round font'>"+ errorMessage.message.message + ": <b>"+errorMessage.message.email+"</b></div>";
                    document.getElementById("reactivation").reset();
                    {{--setTimeout(() => {window.location = "{{route('bcbs.admission.signIn', ['val' => 'activate'])}}";}, 5000);--}}

                },
            });
        }
    </script>
@endsection
