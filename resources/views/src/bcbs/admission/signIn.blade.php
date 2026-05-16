@extends('welcome')
@section('bcbs_title', trans('bcbs.admission'))
@section('Style')
   <style>
       #forgot-password:hover{
           border-bottom: double 2px #8b97a7 !important;
           cursor: pointer;
           color: #00b0ff !important;
       }
   </style>
@endsection
@section('bcbs_content')
@if (Auth::check())
    <script>
        window.location = "{{ route('bcbs.admission.home') }}";
    </script>
 @endIf
    <div class="row" id="about">
        <h2 class="center italic bold font">{{ trans('bcbs.signIn_form') }}</h2>
        <div class="col s12 m10 offset-m1 w3-round-medium w3-light-gray w3-margin-bottom">
            <h4 class="center">*** {{ trans('bcbs.fill_form') }} ***</h4>
            <a href="{{route('bcbs.admission_signup')}}" class="orange-text bold w3-padding underline">
                {{ trans('bcbs.signUp_no_account') }}
            </a>
        </div>

        <div class="col s12 m6 offset-m3 w3-margin-top w3-padding input-field w3-round-large w3-padding w3-light-gray" id="signUp" style=" box-shadow: inset 0px 0px 10px rgba(150, 143, 143, 0.8);">
            <form id="">
                <div class="row">
                    <h3 class="center blue-text italic flow-text font">{{ trans('bcbs.sigInForm') }}</h3>
                    @if(Request::has('val'))
                    <div class="row" id="hide">
                        <div class="col s10 m10 offset-s1 offset-m1 w3-padding green w3-round font white-text">
                            @include('src.bcbs.admission.activationCode')
                        </div>
                    </div>
                    @else
                        <div class="col s12 m12 input-field">
                            <label for="user_name_or_phone">{{ trans('bcbs.user_name_or_phone') }}</label>
                            <input type="text" id="user_name_or_phone">
                        </div>
                        <div class="col s12 m12 input-field">
                            <label for="signIn_password">{{ trans('bcbs.password') }}</label>
                            <input type="password" min="6" id="signIn_password">
                        </div>
                    <div class="row">
                        <div class="col s6 m4 offset-m1 w3-padding font w3-text-gray"
                             onclick="forgotPassword()"
                             id="forgot-password">
                            Forgot Password <i class="fa fa-lock w3-medium orange-text w3-margin-left"></i>
                        </div>
                        <div class="col s6 m6">
                            <button type="button" class="waves-effect waves-light w3-blue flow-text w3-round-medium btn s12 m12" style="width: 70%; margin-left: 15%" onclick="signInForm()">{{ trans('bcbs.signIn') }}</button>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script>
        // $("#hide").hide();
        // $("html, body").animate({ scrollTop: $("#about").offset().top }, 1500);
        function forgotPassword(){
            window.location = "{{route('bcbs.admission.resetPassword')}}";
        }

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        let value = params.val;
        setTimeout(() => {console.log("params: ", value);}, 1000);
        if(value == 'activate') {
            $("#hide").innerHTML = "Enter the activation code send to your email";
        }
        $('html, body').animate({scrollTop: 0}, 800);

        function signInForm() {
            if(!$("#user_name_or_phone")[0].value) {
                toastr.warning("{{ __('validation.required', ['attribute' => trans('bcbs.user_name_or_phone')]) }}");
                return false;
            }

            if(!$("#signIn_password")[0].value) {
                toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.password_required')]) }}");
                return false;
            }

            $('#bcbs_loader').show();
            $.ajax({
                url : '{{ route("guest.login") }}',
                type : "post",
                data : {'_token' : '{{ csrf_token() }}',
                        user_name_or_phone : $("#user_name_or_phone")[0].value,
                        password : $("#signIn_password")[0].value,
                    },
                success: function(res) {
                    $('html, body').animate({scrollTop: 0}, 800);
                    $('#bcbs_loader').hide();
                    toastr.success(res.response.message);
                    window.location = "{{route('bcbs.admission.home')}}";
                },
                error: function(error) {
                    const errorMessage = JSON.parse(error.responseText);
                    if(errorMessage.message?.message == 'Your email has not been verified, please verify your email and try again') {
                        setTimeout(() => {
                            window.location = "{{route('bcbs.admission.signIn', ['val' => ''])}}";
                        }, 2000);
                    }
                    const uname = errorMessage.message?.message ? errorMessage.message?.message+ "<br>" : "";
                    const user_name_or_phone = errorMessage.errors?.user_name_or_phone? errorMessage.errors?.user_name_or_phone + "<br>" : "";
                    const password = errorMessage.errors?.password? errorMessage.errors?.password + "<br>" : "";
                    const message = uname + user_name_or_phone + password;
                    toastr.error(message);
                    $('#bcbs_loader').hide();
                },
            });
        }
    </script>
@endsection
