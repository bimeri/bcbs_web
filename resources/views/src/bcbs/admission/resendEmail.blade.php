@extends('welcome')
@section('bcbs_title', trans('bcbs.bcbs_reset_password'))
@section('bcbs_content')
    <div class="row">
        <div class="col s12 m6 offset-m3 w3-margin-top w3-padding input-field w3-round-large w3-padding w3-light-gray" id="signUp" style=" box-shadow: inset 0px 0px 10px rgba(150, 143, 143, 0.8);">
            <div class="progress" id="activate_loader" style="position: relative; z-index: 99999">
                <div class="indeterminate"></div>
            </div>
            <form id="reactivation">
                <div class="row">
                    <h3 class="center blue-text italic flow-text font">{{ trans('bcbs.activationForm') }}</h3>
                    <div class="row">
                        <div id="resent_hide">
                                <div class="center col s10 m10 offset-s1 offset-m1 w3-padding font">
                                Enter you email to get a new activation code
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: -30px">
                    <div class="col s12 m12 input-field">
                        <label for="bcbs_email">{{ trans('messages.email') }}</label>
                        <input class="validate" type="email" id="reset_email" required>
                        <span class="helper-text" data-error="invalid email" data-success=""></span>
                    </div>
                </div>
               <div class="row double" style="margin-top: -10px">
                   <div id="show_key" class="col s5 m4 bold font w3-medium center blue-text cursor">
                       <a href="{{route('landingPage')}}">Home &nbsp;<i class="fa fa-home grey-text"></i></a>
                   </div>
                   <div class="col s6 m4 offset-m2 center w3-margin-bottom">
                       <button type="button" class="btn blue w3-medium" onclick="activateAccountResend()">submit</button>
                   </div>
               </div>
            </form>
        </div>
    </div>

    <script>
        $('#activate_loader').hide();
        function activateAccountResend(code) {
            if(!$("#reset_email")[0].value) {
            toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.email')]) }}");
            return false;
        }
        $('#activate_loader').show();
        $.ajax({
            url : '{{ route("bcbs.activation.code.resend") }}',
            type : "post",
            data : {
                '_token' : '{{ csrf_token() }}',
                email : $("#reset_email")[0].value,
                },
            success: function(res) {
                $('html, body').animate({scrollTop: 0}, 800);
                $('#activate_loader').hide();
                console.log("rep: ", res);
                toastr.success(res);
                setTimeout(() => {
                    localStorage.setItem('reactivateSucess', JSON.stringify(res));
                    window.location = "{{route('bcbs.admission.signIn', ['val' => 'reactivateSucess'])}}";
                }, 1000);
            },
            error: function(error) {
                const errorMessage = JSON.parse(error.responseText);
                $('#activate_loader').hide();
                if (errorMessage?.message?.alert_type === 'info') {
                    toastr.info(errorMessage.message.message);
                    document.getElementById('resent_hide').innerHTML = "<div class='col s10 m10 offset-s1 offset-m1 w3-padding center green-text green lighten-5 w3-round font'>"+ errorMessage.message.message + "<br> <b>"+errorMessage.message.email+"</b></div>";
                    return;
                }
                toastr.error(errorMessage.message.message);
                document.getElementById('resent_hide').innerHTML = "<div class='col s10 m10 offset-s1 offset-m1 w3-padding red red-text lighten-5 w3-round font'>"+ errorMessage.message.message + ": <b>"+errorMessage.message.email+"</b></div>";
                document.getElementById("reactivation").reset();
                // setTimeout(() => {window.location = "{{route('bcbs.admission.signIn', ['val' => 'activate'])}}";}, 5000);

            },
        });
    }
    </script>
@endsection
