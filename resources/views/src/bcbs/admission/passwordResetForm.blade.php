
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>Reset password</title>
    <script src="{{ URL::asset('jquery.min.js') }}"></script>
    <link rel="icon" href="{{URL::asset($setting->logo)}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('materialize/css/materialize.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('welcome.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('w3.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('toaster.css') }}" />
    @yield("Style")
</head>
<body>
<header class="top-header">

</header>

{{-- body --}}
<div class="row cal w3-margin-top body">
    <div class="col s12 m10 white offset-m1 w3-round-large main w3-padding" style="box-shadow: 0 19px 82px rgba(0, 0, 0, 0.1);">
        <div class="w3-padding w3-round-medium w3-margin-bottom" style="background-color: #e8ecec">
            <marquee behavior="scroll" direction="left" scrollamount="7">
                <p style="color:#5252e7; font-size:17px" class="w3-medium">{{trans('bcbs.welcome')}}, {!! trans('bcbs.citation') !!}</p>
            </marquee>
        </div>
        <div>
            <div class="row">
                <div class="col s12 m6 offset-m3 w3-margin-top w3-padding input-field w3-round-large w3-padding w3-light-gray" style="box-shadow: inset 0px 0px 10px rgba(150, 143, 143, 0.8);">
                    <div class="progress" id="activate_loaders" style="position: relative; z-index: 99999">
                        <div class="indeterminate"></div>
                    </div>

                    <form id="resetPasswordForm">
                        <div class="row">
                            <h3 class="center blue-text italic flow-text font">{{ trans('bcbs.reset_password') }}</h3>
                            <div class="row">
                                <div id="resent_hide">
                                    <div class="center col w3-medium s10 m10 offset-s1 offset-m1 w3-padding font">
                                        Fill the form bellow to reset you password
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="center" style="margin-top: -30px"><i class="fa fa-unlock w3-xlarge orange-text"></i></p>
                        <div class="row w3-padding w3-margin-top">
                            <div class="col s4 m3">
                                <b class="font" style="font-size: 17px !important;">New password: </b>
                            </div>
                            <div class="col s8 m8">
                                <input class="validate" type="password" placeholder="new password" id="n_p" required>
                            </div>
                        </div>
                        <div class="row w3-padding double">
                            <div class="col s4 m3">
                                <b class="font" style="font-size: 17px !important;">Confirm password: </b>
                            </div>
                            <div class="col s8 m8">
                                <input class="validate" type="password" placeholder="Confirm password" id="r_p" required>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 0;">
                            <div id="show_key" class="col s4 m4 bold font center blue-text cursor">
                                <a href="{{route('landingPage')}}" class="w3-large grey-text">Home &nbsp;<i class="fa fa-home blue-text"></i></a>
                            </div>
                            <div class="col s6 m5 offset-m2 offset-s2 center">
                                <button type="button" class="btn blue w3-medium" onclick="resetPassword()">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<button onclick="topFunction()" class="scrollToTop btn-floating btn-medium waves-effect waves-light grey">
    <i class="fa fa-arrow-up w3-large"></i>
</button>

<script src="{{ URL::asset('toaster.js') }}"></script>
<script src="{{ URL::asset('myjs.js') }}"></script>
<script src="{{ URL::asset('sweat_alert.js') }}"></script>
<script defer src="{{ URL::asset('fontawesome/js/all.js') }}"></script>
<script>
    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });
    // Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
    let value = params.userId;
    console.log("user id: ", value)

    $('#activate_loaders').hide();
    function resetPassword() {
        const np = $("#n_p")[0].value;
        const rp = $("#r_p")[0].value;
        if(!np || np.length < 6) {
            toastr.warning("{{ trans('bcbs.password_required_min_length', ['length' => 6])}}");
            return false;
        }
        if(!rp || rp.length < 6) {
            toastr.warning("{{ trans('bcbs.confirm_password_required_min_length', ['length' => 6]) }}");
            return false;
        }
        if(np !== rp) {
            toastr.error("{{ trans('messages.passwordMissMatch') }}");
            return false;
        }

        $('#activate_loaders').show();
        $.ajax({
            url : '{{ route("bcbs.resetPassword.submit") }}',
            type : "post",
            data : {'_token' : '{{ csrf_token() }}',
                'password' : np,
                'userId' : value,
            },
            success: function(res) {
                console.log("response: ", res);
                $('html, body').animate({scrollTop: 0}, 800);
                {{--window.location = "{{route('bcbs.admission.signIn', ['val' => '"+res+"'])}}";--}}
                document.getElementById('resetPasswordForm').innerHTML = '<div></div>';
                document.getElementById('resetPasswordForm').innerHTML = '<div class="col s10 w3-margin-top w3-margin-bottom center w3-padding offset-s1 offset-m1 m10 offset-m1 w3-round-medium green green-text lighten-5">'+res+'. <p class="bold">Please close this page</p></div>';
                $('#activate_loaders').hide();
            },
            error: function(error) {
                const errorMessage = JSON.parse(error.responseText);
                console.log("response te: ", errorMessage);
                const mess = errorMessage?.message ? errorMessage?.message?.message + "<br>" : "";
                toastr.error(mess);
                $('#activate_loaders').hide();
            },
        });
    }
</script>
</body>
</html>
