<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BCBS</title>
        <!-- Fonts -->
        <link rel="icon" href="{{URL::asset('logo/logo.png')}}" type="image/x-icon">
        <link href="{{ URL::asset('fonts.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('googleApiJquery.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('materialize/css/materialize.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('mycss.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('w3.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('toaster.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('toastr.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('animate.css') }}" />
    <style>
        input.validate{
            color: #2196F3;
            padding-left: 6px !important;
        }
        ::-webkit-input-placeholder {
            /* Edge */
            color: #2196F3;
            padding-left: 6px !important;
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #2196F3;
            padding-left: 6px !important;
        }

        span.w3-medium:hover{
            border-bottom: 1px solid #c98bc9;
        }
    </style>
    </head>
    <body>
        <div class="row w3-margin-top cal" style="margin-bottom: 10% !important;">
            <div class="col w3-padding w3-margin-bottom s12 m8 offset-m2 l5 offset-l3" id="hello">
                <div class="moda">
                    <form method="post" action="{{ route('user.login') }}">
                        {{ csrf_field() }}
                        <div class="blue header lighten-1 white-text" style="height: 150px;">
                            <center>
                                <img src="{{ URL::asset($setting->logo) }}" class="w3-margin-top circles hide-on-med-and-down" alt="logo">
                                <img src="{{ URL::asset($setting->logo) }}" class="w3-margin-top circles-m hide-on-med-and-up" alt="logo">
                            </center>
                            <h5 class="center">{{ __("messages.sign_in_to_bcbs") }}</h5>
                        </div>
                        @include('config.error')

                        <div class="w3-margin purple purple-text lighten-4 w3-margin center w3-medium w3-padding">Enter your school ID number and password</div>

                        <div class="card-content w3-padding">
                            <div class="form-field input-field">
                                <i class="fa fa-graduation-cap prefix w3-large purple-text"></i>
                                <input type="text" name="user_name" class="validate" id="username">
                                <label for="username">User Name</label>
                            </div>
                            <div class="form-field input-field">
                                <i class="fa fa-unlock-alt prefix w3-large purple-text"></i>
                                <input type="password" name="password" class="validate" id="password" value="">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-field">
                                <hr style="border-bottom: 0.5px #a31ba3">
                                <div class="row">
                                    <div class="col s4 m3">
                                        <label>
                                        <a href="https://bcbs.net.co" class="w3-circle w3-padding w3-light-gray w3-border">
                                            <i class="fa fa-home w3-large w3-large pointer"></i>
                                        </a>
                                        </label>
                                    </div>
                                    <div class="col s4 m4">
                                        <label class="cursor">
                                            <input type="checkbox" name="remember" id="remember" value="{{ old('rememberMe') }}"/>
                                            <span class="w3-small">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="col s4 m4">
                                        <label class="cursor"><i class="fa fa-lock w3-margin-right"></i>
                                            <span class="w3-small">Forgot password</span>
                                        </label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-field">
                            <button class="btn blue waves-effect waves-blues" onclick="load()" style="width: 100%; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div id="menu" class="blue" style="height: 100% !important; width: 100% !important; position: fixed !important; top:0px; bottom: 0px; left: 0px; right: 0px; z-index: 1000; opacity:.5 !important"><br><br>
            <div class="w3-margin-top" style="display: flex; justify-content: center; align-items: center;">
                <div class="preloader-wrapper big active spinner-white" style="margin-top: 220px !important;">
                    <div class="spinner-layer spinner-white-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="footer_one center">
                    <h6 class="w3-small w3-padding" style="text-align: center; color: #fff">&copy;Powered by
                        <a  target="_blank" href ="#" style="color:#92b3bb"> Bimeri. Ltd</a>
                    </h6>
            </div>
        </div>
        <?php if(Session::has("error")){echo "<script>document.getElementById('hello').classNane = 'col w3-padding w3-margin-bottom s12 m8 offset-m2 l5 offset-l3 animate__animated animate__shakeX';</script>";} ?>
        <script src="{{ URL::asset('toaster.js') }}"></script>
        <script src="{{ URL::asset('materialize/js/materialize.min.js') }}"></script>
        <script src="{{ URL::asset('myjs.js') }}"></script>
        <script src="{{ URL::asset('sweat_alert.js') }}"></script>
        @include('src.shared.toaster_script')
    </body>
</html>
