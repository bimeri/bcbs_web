<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('bcbs_title')</title>
        <script src="{{ URL::asset('jquery.min.js') }}"></script>
        <link rel="icon" href="{{URL::asset($setting->logo)}}" type="image/x-icon">
        {{-- <link href="{{ URL::asset('fonts.css') }}" rel="stylesheet"> --}}
        {{-- <script src="{{ URL::asset('googleApiJquery.min.js') }}"></script> --}}
        <link rel="stylesheet" href="{{ URL::asset('materialize/css/materialize.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('welcome.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('w3.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('toaster.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('animate.css') }}" />
        @yield("Style")
    </head>
    <body>
        <div class="progress" id="bcbs_loader" style="top: 0; margin-top: 0px !important; position: fixed; z-index: 99999">
            <div class="indeterminate"></div>
        </div>
        <header class="top-header">
            <h4 class="hide-on-med-and-up printers center w3-padding" style="font-size: 23px !important;">{{ trans('bcbs.school_name') }}</h4>
            <h5 class="hide-on-med-and-up center" style="text-align: center !important; font-size: 0.9rem; color: #9e9e9e; margin-top: -10px">{{ substr(trans('bcbs.school_motto'), 0, 45) ." ... | 2Tim2:2"}}</h5>
            <div class="row">
                <div class="col s6 m7 offset-m1">
                    <img src="{{ URL::asset('image/logo/logo.png') }}" alt="BCBS_logo" class="responsive-img circles hide-on-med-and-down" width="90" style="border: none; background: transparent">
                    <img src="{{ URL::asset('image/logo/logo.png') }}" alt="BCBS_logo" class="circles-m hide-on-med-and-up" style="border: none; background: transparent; margin-top: -5px">
                    <label class="double w3-xxlarge title hide-on-med-and-down">{{ trans('bcbs.school_name') }}</label> <label class="w3-tiny hide-on-med-and-down"> | BCBS</label><br>
                    <label class="black-text w3-medium hide-on-med-and-down" style="margin-left: 16%; position: relative; top: -35px !important">{{ trans('bcbs.school_motto') }} <b>2Tim 2:2</b></label>
                </div>

                {{-- show on small screen --}}
                <div class="row white w3-round-medium small-menu w3-padding hide-on-med-and-up" style="display: none !important; position:fixed; margin-top: -30px;">
                    <div class="input">
                        <form action="">
                            <div class="row">
                                <div class="col s11 m11">
                                    <div class="input-field w3-margin-right">
                                        <input type="search" placeholder="{{ trans('bcbs.search_here') }}" class="input search-small" required>
                                    </div>
                                </div>
                                <div class="col s1 m1" style="position: absolute; right: 15px;">
                                    <button type="submit" class="input-field waves-effect waves-light btn-floating right modal-trigger" style="background: #9e9e9e"><i class="fa fa-search w3-small"></i></button>
                                </div>
                            </div>
                        </form>
                    </div><hr>
                    <ul class="row input nav-content">
                        <div class="row w3-margin-bottom" style="margin-top: -18px !important">
                            <h5 class="center font bold double animate__animated animate__bounce animate__delay-2s"><a href="https://student.bcbs.net.co" class="top blue-text"><i class="fa fa-walking w3-medium grey-text"></i> Go to School &nbsp;<i class="fa fa-school w3-medium grey-text"></i></a></h5>
                            <div class="col s6" style="border-right: 1px solid #ccc">
                                <h6 class="center italic underline">{{ trans('bcbs.menu') }}</h6>
                                <li @if(Request::is('/')) class="blue-text" @endif><a href="{{ route('landingPage') }}" onclick="load()"> {{trans('bcbs.home')}} <label><i class="right spin fa fa-home @if(Request::is('/')) blue-text @endif"></i></label></a></li><hr>
                                <li><a href="#" onclick="contact()">Contact <label><i class="right spin fa-rotate-90 fa fa-phone"></i></label></a></li><hr>
                                <li @if(Request::is('about')) class="blue-text" @endif><a href="{{ route('bcbs.about') }}" onclick="load()">{{ trans('bcbs.about') }} <label><i class="right spin fa fa-address-card  @if(Request::is('about')) blue-text @endif"></i></label></a></li><hr>
                                <li @if(Request::is('campus', 'library/detail')) class="blue-text" @endif><a href="{{ route('bcbs.campus') }}" onclick="load()">{{ trans('bcbs.campus') }} <label><i class="right spin fa fa-university  @if(Request::is('campus', 'library/detail')) blue-text @endif"></i></label></a></li><hr>
                                <li @if(Request::is('elearning')) class="blue-text" @endif><a href="{{ route('bcbs.elearning') }}" onclick="load()">{{ trans('bcbs.e_learning') }} <label><i class="right spin fa fa-book-open @if(Request::is('elearning')) blue-text @endif"></i></label></a></li><hr>
                                <li @if(Request::is('staffs', 'director')) class="blue-text" @endif><a href="{{  route('bcbs.staffs') }}" onclick="load()">{{ trans('bcbs.staff') }} <label><i class="right spin fa fa-graduation-cap @if(Request::is('staffs', 'director')) blue-text @endif"></i></label></a></li><hr>
                                <li @if(Request::is('satellite')) class="blue-text" @endif><a href="{{ route('bcbs.satellite') }}" onclick="load()">{{ trans('bcbs.satellite') }} <label><i class="right spin fa fa-sun @if(Request::is('satellite')) blue-text @endif"></i></label></a></li>
                            </div>
                            <div class="col s6">
                                <h6 class="center italic underline">{{ trans('bcbs.social_media') }}</h6>
                                <li><a href="https://web.facebook.com/Buea-College-Of-Biblical-Studies-100352249130195" target="_blank">Facebook <img class="right" src="{{ URL::asset('image/resources/facebook.png') }}" alt="FB" height="20" width="20"/></a></li><hr>
                                <li><a target="_blank" href="https://api.whatsapp.com/send?phone=237677218585&text={{ __("bcbs.text") }}">WhatsApp <img class="right" src="{{ URL::asset('image/resources/whatsapp.png') }}" alt="WAP" height="20" width="20"/></a></li><hr>
                                <li><a href="#">Instagram <img class="right" src="{{ URL::asset('image/resources/instagram.png') }}" alt="WAP" height="20" width="20"></a></li>
                                <div class="row w3-margin-top"><hr class="double"></div>
                                <div class="col s12 m12" style="margin-top: -20% !important">
                                    <img src="{{ URL::asset('image/school/bible.png') }}" alt="" width="100%" height="130" class="">
                                </div>
                            </div>
                        </div>
                        <hr class="double">
                        <li style="display: flex; justify-content: center; margin-top: -10px;">
                            <a class="w3-padding w3-border" href="{{ route('bcbs.admission') }}" style="font-size: 17px !important; color: #25257e; box-shadow: 0 1px 1px #25242480; border-radius: 5px;">
                                <b class="blink">{{ trans('bcbs.admission') }}</b>
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- <div class=" w3-padding"> --}}
                    <a href="#" class="right w3-padding d-down w3-xlarge w3-margin-right hide-on-med-and-up"
                       style="width:80px; height: 60px; margin-top: 5px; position: relative; z-index:10;"
                       onclick="showMenu()">
                        <i class="fa fa-bars d-d w3-margin-left"></i>
                    </a>
                {{-- </div> --}}

                {{-- end small screen display --}}
                <div class="col s6 m3">
                    <div class="row hide-on-med-and-down">
                        <ul class="white w3-padding w3-round-large">
                            <li><a target="_blank" href="https://api.whatsapp.com/send?phone=237677218585&text={{ __("bcbs.text") }}" class="top">WhatsApp</a></li>
                            <li><a href="https://web.facebook.com/Buea-College-Of-Biblical-Studies-100352249130195" target="_blank" class="top">Facebook</a></li>
                            <li><a href="mailto:bimerinoel@gmail.com" class="top">E-Mail</a></li>
                            <li class="w3-margin-left"><a href="https://student.bcbs.net.co" class="top">{{ trans('bcbs.school') }}</a></li>
                        </ul>
                    </div>
                    {{-- 'admission/password/forgot'--}}
                    @if(Request::is('admission/home', 'admission/apply'))
                    <div class="center" style="margin-left: 90% !important;">
                        <img src="{{URL::asset('image/profiles/2.png')}}" width="45" height="45" class="circle w3-border pointer dropdown-trigger" data-target="dp1"><br>
                        <small class=""> {{Auth::check() ? Auth::user()->user_name : ""}}</small>
                    </div>
                    <ul id="dp1" class="dropdown-content left" style="position: absolute !important; z-index: 9999;">
                        <a href="#" class="font black-text w3-padding w3-medium"><i class="fa fa-user-circle w3-small"></i>&nbsp;&nbsp;&nbsp; Account</a><hr style="margin-top:10px !important">
                        <a href="#" class="font black-text w3-padding w3-medium"><i class="fa fa-bars w3-small"></i> &nbsp;&nbsp;&nbsp; Transaction</a><hr style="margin-top:10px !important">
                        <a href="#" class="font black-text w3-padding w3-medium"><i class="fa fa-barcode w3-small"></i>&nbsp;&nbsp;&nbsp; Receipt</a><hr style="margin-top:10px !important">
                        <li><a href="{{route('user.logout')}}" class="red-text w3-padding w3-center">logout</a></li>
                    </ul>
                    @else
                        <div class="col m9 push-m2 offset-m1 input-field hide-on-med-and-down">
                            <input type="search" placeholder="{{ trans('bcbs.search_here') }}..." class="search" id="search" style="font-family:FontAwesome !important">
                            <button class="" style="background: transparent !important; color: gray; border-left: 0.5px solid #beb4b4 !important; border:none; position: absolute; right: 5px; top: -31px; height: 25px">
                                <i class="fa fa-search w3-small spin"></i>
                            </button>
                        </div>
                    @endIf
                </div>
            </div>
            <div class="row" style="margin-top:-70px">
                @if(!Request::is('admission/home', 'admission/apply'))
                    <div class="col s12 m9 offset-m2 flow nav-wrapper transparent">
                    <ul id="nav-mobile" class="hide-on-med-and-down">
                        <li @if(Request::is('/')) class="blue-text" @endif><a class="a" href="{{ route('landingPage') }}" onclick="load()">{{ trans('bcbs.home') }} <label><i class="spin fa fa-home w3-small @if(Request::is('/')) blue-text @endif "></i></label></a></li>
                        <li><a class="a" href="#" onclick="contact()">contact <label><i class="spin fa fa-rotate-90 fa-phone w3-small"></i></label></a></li>
                        <li @if(Request::is('about')) class="blue-text" @endif><a class="a" href="{{ route('bcbs.about') }}" onclick="load()">{{ trans('bcbs.about') }} <label><i class="spin fa fa-address-card w3-small @if(Request::is('about')) blue-text @endif"></i></label></a></li>
                        <li @if(Request::is('campus', 'library/detail')) class="blue-text" @endif><a class="a" href="{{ route('bcbs.campus') }}" onclick="load()">{{ trans('bcbs.campus') }} <label><i class="spin fa fa-university w3-small @if(Request::is('campus', 'library/detail')) blue-text @endif"></i></label></a></li>
                        <li @if(Request::is('elearning')) class="blue-text" @endif><a class="a" href="{{ route('bcbs.elearning') }}" onclick="load()"> {{ trans('bcbs.elerning')  }} <label><i class="spin fa fa-book-open w3-small @if(Request::is('elearning')) blue-text @endif"></i></label></a></li>
                        <li @if(Request::is('staffs', 'director')) class="blue-text" @endif><a class="a" href="{{ route('bcbs.staffs') }}" onclick="load()">{{ trans('bcbs.staff') }} <label><i class="spin fa fa-graduation-cap w3-small @if(Request::is('staffs', 'director')) blue-text @endif"></i></label></a></li>
                        <li @if(Request::is('satellite')) class="blue-text" @endif><a class="a" href="{{ route('bcbs.satellite') }}" onclick="load()">{{ trans('bcbs.satellite_school') }} <label><i class="spin fa fa-sun w3-small @if(Request::is('satellite')) blue-text @endif"></i></label></a></li>
                        <li><a class="a right w3-padding w3-margin-bottom" href="{{ route('bcbs.admission') }}" style="font-size: 17px !important; margin-top: -10px !important; color: #25257e; box-shadow: 0 1px 1px rgba(37, 36, 36, 0.5); border-radius: 5px;"><b class="blink">{{ trans('bcbs.admission') }}</b></a></li>
                    </ul>
                </div>
                @endif

            </div>
        </header>

        {{-- body --}}
        <div class="row cal w3-margin-top body">
            @include('config.error')
            <div class="col s12 m10 white offset-m1 w3-round-large main w3-padding" style="box-shadow: 0 19px 82px rgba(0, 0, 0, 0.1);">
                <div class="w3-padding w3-round-medium w3-margin-bottom" style="background-color: #e8ecec">
                    <marquee behavior="scroll" direction="left" scrollamount="7">
                        <p style="color:#5252e7; font-size:17px" class="w3-medium">{{trans('bcbs.welcome')}}, {!! trans('bcbs.citation') !!}</p>
                    </marquee>
                </div>
                <div>
                    @yield('bcbs_content')
                </div>
            </div>
        </div>

        <button onclick="topFunction()" class="scrollToTop btn-floating btn-medium waves-effect waves-light grey">
            <i class="fa fa-arrow-up w3-large"></i>
        </button>

        {{-- footer --}}
        <div class="row w3-margin-top footer">
            <div class="top-footer">
                <div class="row">
                    @include('src.shared.recentBlog')
                    {{-- right side contact us --}}
                    @include('src.shared.contactForm')
                </div>
            </div>
            <div class="">
                <div class="container-row">
                    <div class="copyright row">
                        <div class="col s12 m6">
                            <p class="left">Copyright ©{{ now()->year }}
                                <a href="https://sbnnetwork.net/bcbs">{{ $setting->school_name }}</a> All rights reserved.
                                <label class="white-text">&copy;Powered by
                                    <a target="_blank" href ="#" style="color:#00ffd5"> Bimeri. Ltd</a>
                                </label>
                            </p>
                        </div>
                        <div class="col s12 m5 push-m1">
                            <ul class="list">
                                <li><a class="twitter" href="#"><img class="red-text" src="{{ URL::asset('image/resources/tw.png') }}" alt="TW" height="16" width="16"/> twitter</a></li>
                                <li><a class="facebook" href="https://web.facebook.com/Buea-College-Of-Biblical-Studies-100352249130195"><img class="" src="{{ URL::asset('image/resources/facebook.png') }}" alt="FB" height="16" width="16"/> facebook</a></li>
                                <li><a class="flickr" href="#"><img class="red-text" src="{{ URL::asset('image/resources/fl.png') }}" alt="FLK" height="20" width="24"/> flickr</a></li>
                                <li><a class="rssfeed" href="#"> <img class="red-text" src="{{ URL::asset('image/resources/fd.jpg') }}" alt="FD" height="15" width="15"/> feed</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu"></div>
        <div id="blah"></div>
        <script src="{{ URL::asset('toaster.js') }}"></script>
        <script src="{{ URL::asset('materialize/js/materialize.min.js') }}"></script>
        <script src="{{ URL::asset('myjs.js') }}"></script>
        <script src="{{ URL::asset('sweat_alert.js') }}"></script>
        <script defer src="{{ URL::asset('fontawesome/js/all.js') }}"></script>
        <script>
            $('#bcbs_loader').hide();
            $('.small-menu').hide();
            $('.dropdown-trigger').dropdown();

            function load() {
                $('#bcbs_loader').show();
            }
            function contact() {
                $("html, body").animate({ scrollTop: $("#contact").offset().top }, 2000);
                setTimeout(function(){
                document.getElementById('contact').setAttribute('class', 'col s12 m5 l4 w3-padding input-field w3-round-large w3-padding w3-lime');
                setTimeout(function() { document.getElementById('contact').setAttribute('class', 'col s12 m5 l4 w3-padding input-field w3-round-large w3-padding');},400);
                },2100);
            }
            $(document).ready(function() {
                $('textarea#content, textarea#contentquestion').characterCounter();
                $('.collapsible').collapsible({ accordion: false });
            });
            window.onclick=function(e){
                if (!e.target.matches('.d-down')) {
                    if (!e.target.matches('.input')){
                        if(!e.target.matches('.small-menu')) {
                            if (!e.target.matches('.d-d')) {
                                $(".small-menu").fadeOut();
                            }
                        }
                    }
                }
            }
            function submitQuestion(){
                if(!$("#question_email")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.email')]) }}");
                    return false;
                }
                if(!$("#contentquestion")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('bcbs.question')]) }}");
                    return false;
                }
                $('#bcbs_loader').show();
                $.ajax({
                    url : '{{ route("ask.question") }}',
                    type : "post",
                    data : { '_token': '{{ csrf_token() }}',
                            email : $("#question_email")[0].value,
                            question: $("#contentquestion")[0].value
                            },
                    success: function(res){
                        toastr.success(res);
                        $('#bcbs_loader').hide();
                        $('#questionForm')[0].reset();
                    },
                    error: function(error){
                        $('#bcbs_loader').hide();
                    },
                });
            }

            function contactUs() {
                if(!$("#contact_name")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('bcbs.name')]) }}");
                    return false;
                }
                if(!$("#contact_number")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.contact')]) }}");
                    return false;
                }
                if(!$("#contact_email")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.email')]) }}");
                    return false;
                }
                if(!$("#contentContact")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.message')]) }}");
                    return false;
                }
                $('#bcbs_loader').show();
                $.ajax({
                    url : '{{ route("guest.contact") }}',
                    type : "post",
                    data : { '_token': '{{ csrf_token() }}',
                            name : $("#contact_name")[0].value,
                            email : $("#contact_email")[0].value,
                            contact : $("#contact_number")[0].value,
                            message: $("#contentContact")[0].value
                            },
                    success: function(res){
                        toastr.success(res);
                        $('#bcbs_loader').hide();
                        $('#contact_form')[0].reset();
                    },
                    error: function(error){
                        $('#bcbs_loader').hide();
                    },
                });
            }

            function showMenu(){
                setTimeout(() => {$('.small-menu').fadeIn(100);}, 100);
            }

            $('.dropdown-trigger').dropdown();
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.carousel');
                var instances = M.Carousel.init(elems, 5000);
            });
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true
            });
            setInterval(() => {
                $('.carousel.carousel-slider').carousel('next');
            }, 5000);

            function searched(){
                this.toaster;
                var searchField = document.getElementById('search').value;
                toastr.success("success message");
                console.log('the search value', searchField);
            }
        </script>
        @include('src.shared.toaster_script')
    </body>
</html>
