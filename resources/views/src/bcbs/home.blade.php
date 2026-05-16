@extends('welcome')
@section('bcbs_title', trans('bcbs.home'))
@section('bcbs_content')
@include('src.bcbs.includes.carousel')
<div class="">
    <div class="row w3-margin-top">

    {{-- right side --}}
        <div class="col s11 offset-s1 m5 margin-med-up">
            <hr class="hide-on-med-and-up">
            <div class="row">
                <h4>
                    {{ trans('bcbs.welcome_to_the') }} <label class="blue-text w3-large font">{{ $setting->school_name }}</label>
                </h4>
                <label class="w3-small justify">{{ $director->intro }}</label>
                <p class="justify w3-small">
                    {!! substr($director->speech, 200) !!}
                </p>
                <h3><a href="{{ route('bcbs.director') }}" class="col offset-m1 m10 s12 btn w3-light-gray waves-effect w3-round-medium black-text center">{{ trans('bcbs.a_word_from_the_director') }}</a></h3>
            </div><hr class="double" style="margin: 0 !important">
            <div class="row w3-margin-top">
                <h4 class="w3-large black-text font center w3-margin-top">{{ trans('bcbs.university_news') }}</h4>
                <div class="row w3-round-medium blue blue-text lighten-5 w3-padding">
                    {{ trans('bcbs.students_are_currently_on_evangelism_for_their_yea') }}
                </div><hr>
                <div class="row">
                    <img src="{{ URL::asset('image/resources/logo.png') }}" class="left circles" style="shape-outside: circle(50%); margin-right: 1.5rem;" alt="" width="80" />
                    <div class="w3-padding">
                        <label class="w3-medium">{{ trans('bcbs.notice_to_undergraduate_student') }}</label>
                        <p class="justify w3-margin-bottom">
                            {{ trans('bcbs.the_undergraduate_student_of') }}
                            {{ $setting->school_name }}, {{ trans('bcbs.for_the_academic_year_2019_are_here_by_call_up_to') }}
                        </p>
                        <label><a href="#modal11" class="modal-trigger right">{{ trans('bcbs.more') }}</a></label>
                    </div>
                </div>

                <div id="modal11" class="modal modal-fixed-footer">
                    <div class="modal-content ">
                    <img src="{{ URL::asset('image/resources/logo.png') }}" alt="" width="80" class="circle w3-margin-bottom" style="margin: auto; display: flex"/>
                      <h3 class="center bold double" style="font-family: 'Times New Roman', Times, serif">Notice to undergraduate Student</h3>
                        <p class="justify">The Undergraduate Student of {{  $setting->school_name  }}, for the academic year 2019 are here by call up to register for the driving school program currenctly goin on <br><br>
                            Student are to came along with the following items:
                            <ul class="w3-light-gray gray w3-round-medium w3-padding">
                                <li>1. National Identity card</li><br>
                                <li>2. School Identity Card</li><br>
                                <li>3. Birth certificate</li><br>
                                <li>3. Certified copy of National Identity Card</li><br>
                            </ul>
                            <b>Note:</b> <i>All these need to be submitted to the Driving School Institute at Clerk's Quatter Buea</i>
                            <small class="right bold">posted: <em>Monday 19 April 2021</em></small>
                        </p>
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-close red-text waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>

                <hr class="double" style="margin: 0 !important">
                <div class="row w3-round-medium w3-margin-top">
                    <h5 class="center">School Activities</h5>
                    <ul class="collapsible w3-border w3-round-medium" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header waves-effect"><i class="fa fa-list-alt teal-text w3-margin-right"></i> Programs</div>
                            <div class="collapsible-body teal teal-text font lighten-5">
                                <h6 class="w3-padding"><i class="fa fa-dot-circle w3-small teal-text"></i> Bachelor degree (4 years program) <a href="{{ route('bcbs.admission') }}" class="blue-text w3-small">click to enroll</a></h6>
                                <h6 class="w3-padding"><i class="fa fa-dot-circle w3-small teal-text"></i> Master program (2 years program) <label>not available for now</label></h6>
                                <h6 class="w3-padding"><i class="fa fa-dot-circle w3-small teal-text"></i> Doctor in philosophy (PHD) (2 years program) <label>not available for now</label></h6>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header waves-effect"><i class="fa fa-book blue-text w3-margin-right"></i> Courses</div>
                            <div class="collapsible-body blue blue-text font lighten-5">
                                <div class="row">
                                    <h5 class="center">Some basic Undergraduate Courses</h5>
                                    <div class="col s12 m6">
                                        <ul>
                                            1. <li>Life of Christ</li><br>
                                            2. <li>I and II Corinthians</li><br>
                                            3. <li>Sacrificial System</li><br>
                                            4. <li>Galatians</li><br>
                                            5. <li>Philippians</li><br><br>
                                            <a href="{{ route("bcbs.courses") }}"><label class="pointer w3-medium">view more ...</label></a>
                                        </ul>
                                    </div>
                                    <div class="col s12 m6 w3-margin-top">
                                        <i class="fa fa-book-open blue-text w3-jumbo"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header waves-effect"><i class="fa fa-graduation-cap green-text w3-margin-right"></i> Instructors</div>
                            <div class="collapsible-body green green-text font upper lighten-5">
                                <h4 class="center w3-xlarge green-text bold font">Full time</h4>
                                    <h6 class="w3-small">1.&nbsp;&nbsp;&nbsp; Oman Christopher Ndumbe</h6>
                                    <h6 class="w3-small">2.&nbsp;&nbsp;&nbsp; Esoh Otia Aaron (director)</h6>
                                    <h6 class="w3-small">3.&nbsp;&nbsp;&nbsp; Mkimbeng Desmnd</h6>
                                    <h6 class="w3-small">4.&nbsp;&nbsp;&nbsp; Ukah Otia David</h6>
                                    <h6 class="w3-small">5.&nbsp;&nbsp;&nbsp; William Ngah</h6>
                                    <h6 class="w3-small">5.&nbsp;&nbsp;&nbsp; Tanjeck Paul Nganneck</h6>

                                    <h4 class="center green-text bold w3-xlarge font">Part time</h4>
                                    <h6 class="w3-small">1.&nbsp;&nbsp;&nbsp; Dr. Rhys N. Thomas</h6>
                                    <h6 class="w3-small">2.&nbsp;&nbsp;&nbsp; Bisong Devine</h6>
                                    <h6 class="w3-small">3.&nbsp;&nbsp;&nbsp; Prof. Ngange Kingsley</h6>
                                    <h6 class="w3-small">4.&nbsp;&nbsp;&nbsp; Dan Goodyear</h6>
                                    <h6 class="w3-small">5.&nbsp;&nbsp;&nbsp; Mr. Mballe</h6>
                                    <h6 class="w3-small">7.&nbsp;&nbsp;&nbsp; Ngewung Fidelis</h6>
                                    <h6 class="w3-small">7.&nbsp;&nbsp;&nbsp; Louis Bassey</h6>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header waves-effect"><i class="fa fa-user cyan-text w3-margin-right"></i> The Dean</div>
                            <div class="collapsible-body cyan cyan-text lighten-5">
                                <div class="row">
                                    <div class="col s4 m3"><img src="{{ URL::asset('image/teacher/dean.jpg') }}" alt="" class="circles-m"></div>
                                    <div class="col s8 m8">
                                        <h4 class="center bold font">Ukah David</h4><hr>
                                        <p class="justify">The Current Dean of Buea College of Biblical Studies. Installed in 2019 till current.</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header waves-effect"><i class="fa fa-file-alt orange-text w3-margin-right"></i> Downloadable resources</div>
                            <div class="collapsible-body orange orange-text lighten-5 center">
                                {{-- {{ route('download.graduationbooklet') }} --}}
                                1. <a href="#">Download Graduation Booklet 2015 <i class="fa fa-file-pdf w3-small red-text"></i></a><br>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- end of right side --}}

        {{-- left side --}}
        <div class="col s12 m5 offset-m1" style=" border-left: 3px solid #e6e6e6 !important; border-radius: 20px; border-right: 3px solid #e6e6e6 !important; border-radius: 20px">
            <div class="scroll-container w3-round-medium w3-margin-top w3-light-gray w3-padding" style="position: relative">
                <ul class="w3-margin-top">
                    <div class="row" style="overflow-x: auto; position: relative;">
                        <div class="col s3 m3 w3-padding"><a href="{{ route('bcbs.courses') }}#registration"><li class="circle-path white pointer circle-small"><i class="fa fa-book-open teal-text"></i></li><br><br><label class="capitalize font-10">course registration</label></a></div>
                        <div class="col s3 m3 w3-padding"><a href="{{  route('bcbs.staffs') }}"><li class="circle-path white pointer circle-small"><i class="fa fa-graduation-cap blue-text"></i></li><br><br><label class="capitalize font-10">School instructors</label></a></div>
                        <div class="col s3 m3 w3-padding"><a href="{{ route('bcbs.campus') }}"><li class="circle-path white pointer circle-small"><i class="fa fa-church green-text"></i></li><br><br><label class="capitalize font-10">School structure</label></a></div>
                        <div class="col s3 m3 w3-padding"><a href="{{ route('bcbs.admission') }}"><li class="circle-path white pointer circle-small"><i class="fa fa-user-plus cyan-text"></i></li><br><br><label class="center capitalize font-10">Admission procedure</label></a></div>
                    </div>
                </ul>
            </div>
            <div class="col s12 m12">
                <h3 class="font center">Important Event</h3>
                {{-- start loop --}}
                @foreach($events as $key => $event)
                    @if (($key+1)%2 == 1 )
                    <div class="row">
                        <img src="{{ URL::asset($event->profile) }}" alt="" class="circles left" style="shape-outside: circle(50%); margin-right: 1.5rem;" />
                        <div class="w3-padding">
                            <label class="w3-medium">{{ $event->title }}</label>
                            <p class="justify">{!! strlen($event->message) > 100 ? substr($event->message, 0, 150) : $event->message  !!}<br> <label><a href="#modalls{{ $key+1 }}" class="modal-trigger">detail</a> ...</label></p>
                        </div>
                    </div><hr>
                @else
                    <div class="row">
                        <img src="{{ URL::asset($event->profile) }}" alt="" class="circles right" style="shape-outside: circle(50%); margin-left: 1.5rem;" />
                        <div class="w3-padding">
                            <label class="w3-medium">{{ $event->title }}</label>
                            <p class="justify">{!! strlen($event->message) > 100 ? substr($event->message, 0, 150) : $event->message !!} <br> <label><a href="#modalls{{ $key+1 }}" class="modal-trigger">detail</a> ...</label></p>
                        </div>
                    </div><hr>
            @endif

            <div id="modalls{{ $key+1 }}" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <center><img src="{{ URL::asset($event->profile) }}" class="circles"/></center>
                <h3 class="center bold double" style="font-family: 'Times New Roman', Times, serif">{{ $event->title }}</h3>
                    <div style="display: table; background: linear-gradient(rgba(224, 217, 217, 0.61), rgba(233, 220, 220, 0.808)), url({{$event->profile}}); background-repeat: no-repeat; height: 100%; background-position: center; background-size: cover;">
                        <p class="justify">{!! $event->message !!}<br><br>
                            <b>Creator:</b> <i>{{ $event->creator }}</i>
                            <small class="right bold">posted: <em>{{ $event->event_date }}</em></small>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close red-text waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>
            @endforeach
            @if(count($events) > 4)
                <div style="text-align: center;">
                    <a href="#" class="center w3-text-blue">Load More...</a>
                </div>
            @endif
                {{-- end loop --}}
            </div>
        </div>
    </div><hr>
    {{-- our partners --}}
    <div class="row">
        <h2 class="center font">Our partners</h2>
        <div class="col s12 m2 w3-padding w3-margin-top">
            <img src="{{ URL::asset('image/logo/sunset.png') }}" alt="" class="z-depth-3" height="140" width="210"/><br>
            <label class="left">Sunset International Bible Institute (SIBI)</label><br>
            <a href="https://sibi.cc" target="_blank" class="blue-text w3-small w3-margin-left">Click here to visit SIBI</a>
        </div>
        <div class="col s12 m9 offset-m1">
            <div class="row w3-padding w3-border w3-round-medium">
                <div class="col s12 m3 center">
                    <img src="{{ URL::asset('image/resources/executive.jpg') }}" alt="" class="circles"/>
                    <h6><label class="center">Chancelor of SIBI</label></h6>
                    <h6 class="w3-small">TRUIT ADAIR </h6>
                </div>
                <div class="col s12 m3 center">
                    <img src="{{ URL::asset('image/resources/internation_dean.jpg') }}" alt="" class="circles m-left"/>
                    <h6><label class="center">Executive president of SIBI</label></h6>
                    <h6 class="w3-small">TIM BUROW</h6>
                </div>
                <div class="col s12 m3 center">
                    <img src="{{ URL::asset('image/resources/dean.jpg') }}" alt="" class="circles"/>
                    <h6><label class="center">Dean of International Studies</label></h6>
                    <h6 class="w3-small">DOUG REEVES</h6>
                </div>
                <div class="col s12 m3 center">
                    <img src="{{ URL::asset('image/resources/dean_africa.jpg') }}" alt="" class="circles m-left"/>
                    <h6><label class="center">Deen of central and West Africa</label></h6>
                    <h6 class="w3-small">{{ strlen("DAN GOODYEAR") > 15 ? substr("DAN GOODYEAR", 0, 14): "DAN GOODYEAR" }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //  var instance = M.Modal.getInstance(elem);
    $(document).ready(function(){
    $('.modal').modal();
  });

</script>
@endsection
