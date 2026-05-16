@extends('welcome')
@section('bcbs_title', trans('bcbs.about_title'))
<style>
    .justify{
    text-align: justify;
    text-justify: inter-word;
    line-height: 1.7rem;
}
.cursor{
    cursor: pointer;
}
</style>
@section('bcbs_content')
<div class="row" id="about">
    <h2 class="center italic font bold">{{ trans('bcbs.about') }}</h2>
    <div class="col s12 m12">
        <div class="row">
            <div class="col s11 m6 w3-margin">
                <div class="row w3-light-gray w3-round-medium w3-padding">
                    <h5 class="font"><b>{{ trans('bcbs.about') }}:</b> {{ trans('bcbs.school_name') }} (BCBS)</h5>
                </div>
                <div class="row w3-border w3-round-medium justify" style="padding: 5px">
                    <h5 class="text-uppercase">{{ trans('bcbs.welcome_to_the') }} {{ trans('bcbs.school_name') }}</h5>
                    {!! $about ? $about->welcome_text ? $about->welcome_text : "<h5 class='w3-padding font w3-margin center orange orange-text lighten-5'>No School Introduction set</h5>" : "<h5 class='w3-padding font w3-margin center orange orange-text lighten-5'>No School Introduction set</h5>" !!}
                </div>
                <div class="row">
                    <label>{{ trans('bcbs.intro_to') }}</label>
                    {{-- <video  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe> --}}
                        <video width="100%" height="420" src="{{ URL::asset('videos/intro.mp4') }}" title="YouTube video player" allowfullscreen nodownload controls></video>
                    {{-- <iframe width="100%" height="420" src="https://www.youtube.com/embed/jeDWOasrLEA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                </div>
                <div class="row">
                    <div class="w3-bar w3-light-gray" style="overflow-x: auto !important">
                        <button class="w3-bar-item w3-button tablink w3-grey" onclick="openCity(event,'London')">{{ trans('bcbs.goal') }} <i class="fa fa-medal orange-text w3-small w3-margin-left"></i></button>
                        <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">{{ trans('bcbs.mission') }} <i class="fa fa-ice-cream pink-text w3-small w3-margin-left"></i></button>
                        <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Aim')">{{ trans('bcbs.objectives') }} <i class="fa fa-flag green-text w3-small w3-margin-left"></i></button>
                        <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Tokyo')">{{ trans('bcbs.curriculum') }} <i class="fa fa-lightbulb yellow-text w3-small w3-margin-left"></i></button>
                    </div>

                    <div id="London" class="w3-container w3-border city orange lighten-5">
                        {{-- <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">X</span> --}}
                        <h2>{{ trans('bcbs.our_goal') }}</h2>
                        <p class="justify w3-margin-bottom">
                            {!! $about ? $about->goal? $about->goal: "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Goal has been set for now</h5>" : "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Goal has been set for now</h5>" !!}
                        </p>
                    </div>

                    <div id="Paris" class="w3-container w3-border city pink lighten-5" style="display:none">
                        <h2>{{ trans('bcbs.our_mission') }}</h2>
                        <p class="justify w3-margin-bottom">
                            {!! $about ? $about->mission? $about->mission: "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Mission has been set for now</h5>" : "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Mission has been set for now</h5>" !!}
                        </p>
                    </div>

                    <div id="Aim" class="w3-container w3-border city green lighten-5" style="display:none">
                        <h2>{{ trans('bcbs.main_mission') }}</h2>
                        <p class="justify w3-margin-bottom">
                            {!! $about ? $about->objective?$about->objective: "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Objectives has been set for now</h5>" : "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Objectives has been set for now</h5>" !!}
                        </p>
                    </div>

                    <div id="Tokyo" class="w3-container w3-border city yellow lighten-5" style="display:none">
                        <h2>{{ trans('bcbs.curriculum') }}</h2>
                        <p class="justify w3-margin-bottom">
                            {!! $about ? $about->curriculum? $about->curriculum: "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Curriculum has been set for now</h5>" : "<h5 class='w3-padding font w3-margin center red red-text lighten-5'>No School Curriculum has been set for now</h5>" !!}
                        </p>
                    </div>
                </div>
            </div>

            {{-- left side --}}
            <div class="col s12 m4 offset-m1 w3-padding">
                <label for="">{{ trans('bcbs.our_top_partners') }} (Sunset International)</label>
                <div class="row">
                    <div class="w3-light-grey">
                        <iframe width="100%" height="270" src="https://www.youtube.com/embed/3Xjq6-qX-a0" title="Sunset Team" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row"> <hr class="double"></div>
                <div class="row w3-light-gray w3-round-medium">
                    <legend class="w3-padding">
                        <h6 class="center w3-medium bold font">{{ trans('bcbs.contact_admin') }}</h6>
                        <p class="w3-small justify">{{ trans('bcbs.contact_admin_for_any_inquiries') }}</p>
                        <small>{{ trans('bcbs.full_identity') }}</small>
                        <h3 class="right bold w3-medium">{{ trans('bcbs.call') }}: <a href="tel:+237678678947"><i class="fa fa-phone green-text w3-small fa-rotate-270"></i> +237678678947</a></h3>
                    </legend>
                </div><hr>
                <h3 class="font bold w3-center">{{ trans('bcbs.testimonials') }}</h3><br>
                <div class="row w3-light-gray w3-round-medium w3-padding">
                    @foreach($testimonials as $key => $testimonial)
                        <div class="row">
                        <div class="s4 m5">
                            <img src="{{ $testimonial->profile }}" alt="" class="circles-s left" width="80">
                            <h5 class="center font pull-m1 pull-s1">{{$testimonial->name}}</h5><hr>
                        </div>
                        <div class="s6 m6 right w3-padding" style="text-align: justify; text-justify: inter-word;line-height: 1.4rem;">
                            <p class="grey-text text-darken-2">{!! $testimonial->message !!}</p>
                            <p class="w3-small w3-margin-top">{!! $testimonial->conclusion !!}</p>
                            <h5 class="w3-small center grey-text text-darken-1 hoverable">like <i class="fa fa-thumbs-up w3-small cursor"></i> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; comment <i class="fa fa-comment w3-small cursor"></i> </h5>
                        </div>
                    </div><hr class="double">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// $("html, body").animate({ scrollTop: $("#about").offset().top }, 1500);
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-grey";
}
</script>
@endsection
