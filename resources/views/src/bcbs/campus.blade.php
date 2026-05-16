@extends('welcome')
@section('bcbs_title', trans('bcbs.campus_title'))
<style>
    .mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
@section('bcbs_content')
<div class="row" id="campus">
    <h2 class="center italic font bold">{{ __("bcbs.campus") }}</h2>
    <div class="row">
        <div class="col s12 m10 offset-m1 w3-round-medium font justify w3-padding">
            {{ trans('bcbs.our_university_located_in_the_historic_town_of_buea') }}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1 w3-round-medium w3-light-grey">
            <div class="col s2 m2 w3-padding">
                <img src="{{ URL::asset('image/logo/logo.png') }}" alt="" class="circles-s">
            </div>
            <div class="col s8 m8 center">
                <i class="fa fa-flag w3-large blue-text"></i>
                    Buea College of Biblical Studies
                <i class="fa fa-flag w3-large blue-text "></i>
            </div>
            <div class="col s2 m2 w3-padding pull-s1 push-m1">
                <img src="{{ URL::asset('image/logo/logo.png') }}" alt="" class="circles-s">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1 w3-round-medium">
            <div class="col s12 m6">
                <img src="{{ URL::asset('image/school/bible.png') }}" alt="" width="100%" height="340" class="">
            </div>
            <div class="col s12 m5 push-m1">
                <div class="row w3-round-medium w3-light-grey justify w3-padding light-black">Condusive environment for student, researchers, scholars, archealogist. School is composed of a Library, computer laboratory, two big clean classrooms</div>
                <div class="row w3-round-medium w3-light-grey">
                    <div class="w3-content w3-display-container" style="max-width:800px">
                        <img class="mySlides" src="{{ URL::asset('image/school/15.jpg') }}" style="width:100%; height:20rem; background-repeat: no-repeat; background-position: center; background-size: cover;">
                        <img class="mySlides" src="{{ URL::asset('image/school/3.jpg') }}" style="width:100%; height:20rem; background-repeat: no-repeat; background-position: center; background-size: cover;">
                        <img class="mySlides" src="{{ URL::asset('image/school/20.jpg') }}" style="width:100%; height:20rem; background-repeat: no-repeat; background-position: center; background-size: cover;">
                        <img class="mySlides" src="{{ URL::asset('image/school/22.jpg') }}" style="width:100%; height:20rem; background-repeat: no-repeat; background-position: center; background-size: cover;">
                        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                          <div class="w3-left w3-hover-text-khaki cursor" onclick="plusDivs(-1)">&#10094;</div>
                          <div class="w3-right w3-hover-text-khaki cursor" onclick="plusDivs(1)">&#10095;</div>
                          <span class="w3-badge demo w3-border w3-transparent w3-hover-white cursor" onclick="currentDiv(1)"></span>
                          <span class="w3-badge demo w3-border w3-transparent w3-hover-white cursor" onclick="currentDiv(2)"></span>
                          <span class="w3-badge demo w3-border w3-transparent w3-hover-white cursor" onclick="currentDiv(3)"></span>
                          <span class="w3-badge demo w3-border w3-transparent w3-hover-white cursor" onclick="currentDiv(4)"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <h4 class="center font bold double">Our Campus</h4>
            <video width="100%" height="420" src="{{URL::asset('image/school/campus.mp4')}}" title="BCBS school campus" frameborder="0" allowfullscreen controls></video>
            {{--            <iframe width="100%" height="420" src="https://www.youtube.com/embed/sVPYIRF9RCQ" title="YouTube video player" frameborder="0" allowfullscreen></iframe>--}}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1"><hr></div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <h4 class="font center bold double">Our Library</h4>
            <div class="row">
                <div class="col s12 m5 w3-round-medium w3-light-gray w3-padding justify" style="display: table; background: linear-gradient(rgba(224, 217, 217, 0.61), rgba(233, 220, 220, 0.808)), url('image/school/library.png'); background-repeat: no-repeat; height: 100%; background-position: center; background-size: cover;">
                    <p class="font">Our library books are available for all student. and the library Hours includes:</p>
                    <strong>Saturday: 12pm - 2pm</strong><br>
                    <strong>Sunday: 1pm - 2pm</strong><br>
                    <strong>All School hour: from 8am till 5pm</strong><br>
                    <p class="font w3-margin-top">
                        Student are all encourage to make use of the library hall. Books to be borrowed will need tgo be registered by the deen of studies, and consequences will be on the student who will fail to return the book at the set time with no valid reason.
                    </p>
                    <h4 class="font bold center">Books Classification</h4><hr>
                    <ul class="font">
                        <li>1.&nbsp;&nbsp;&nbsp;&nbsp; Bibles History</li><br><br>
                        <li>2.&nbsp;&nbsp;&nbsp;&nbsp; Bibles Commentaries</li><br><br>
                        <li>3.&nbsp;&nbsp;&nbsp;&nbsp; Bibles Novels</li><br><br>
                        <li>4.&nbsp;&nbsp;&nbsp;&nbsp; Bibles Hyms</li><br><br>
                        <li>5.&nbsp;&nbsp;&nbsp;&nbsp; Bibles Dictionary</li><br><br>
                        <li>6.&nbsp;&nbsp;&nbsp;&nbsp; Reseach Handbook</li><br><br>
                        <li>7.&nbsp;&nbsp;&nbsp;&nbsp; Theology of Mission</li><br><br>
                        <li>8.&nbsp;&nbsp;&nbsp;&nbsp; Reseach Materials</li><br><br>
                        <li>9.&nbsp;&nbsp;&nbsp;&nbsp; Data Analysis</li><br>
                    </ul><br>
                    <h4 class="center font bold italic blue-text cursor"><a href="{{route('campus.library.detail')}}" class="waves-effect waves-light;" style="text-decoration: underline">Click here for more enquiries of our Library</a></h4>
                </div>
                <div class="col s12 m6 w3-round-medium push-m1">
                    <div class="w3-content" style="max-width:1200px">
                        <img class="mySlidess" src="{{ URL::asset('image/school/book1.jpg') }}" style="width:100%; height: 23rem; display:none;">
                        <img class="mySlidess" src="{{ URL::asset('image/school/book2.jpg') }}" style="width:100%; height: 23rem">
                        <img class="mySlidess" src="{{ URL::asset('image/school/book3.jpg') }}" style="width:100%;display:none; height: 23rem">
                        <img class="mySlidess" src="{{ URL::asset('image/school/book4.jpg') }}" style="width:100%;display:none; height: 23rem">
                        <img class="mySlidess" src="{{ URL::asset('image/school/book5.jpg') }}" style="width:100%;display:none; height: 23rem">
                        <img class="mySlidess" src="{{ URL::asset('image/school/book6.jpg') }}" style="width:100%;display:none; height: 23rem">

                        <div class="w3-row-padding w3-section">
                          <div class="w3-col s2">
                            <img class="demos w3-opacity w3-hover-opacity-off" src="{{ URL::asset('image/school/book1.jpg') }}" style="width:100%;cursor:pointer; height: 5rem" onclick="currentDivv(1)">
                          </div>
                          <div class="w3-col s2">
                            <img class="demos w3-opacity w3-hover-opacity-off" src="{{ URL::asset('image/school/book2.jpg') }}" style="width:100%;cursor:pointer; height: 5rem" onclick="currentDivv(2)">
                          </div>
                          <div class="w3-col s2">
                            <img class="demos w3-opacity w3-hover-opacity-off" src="{{ URL::asset('image/school/book3.jpg') }}" style="width:100%;cursor:pointer; height: 5rem" onclick="currentDivv(3)">
                          </div>
                          <div class="w3-col s2">
                            <img class="demos w3-opacity w3-hover-opacity-off" src="{{ URL::asset('image/school/book4.jpg') }}" style="width:100%;cursor:pointer; height: 5rem" onclick="currentDivv(4)">
                          </div>
                          <div class="w3-col s2">
                            <img class="demos w3-opacity w3-hover-opacity-off" src="{{ URL::asset('image/school/book5.jpg') }}" style="width:100%;cursor:pointer; height: 5rem" onclick="currentDivv(5)">
                          </div>
                          <div class="w3-col s2">
                            <img class="demos w3-opacity w3-hover-opacity-off" src="{{ URL::asset('image/school/book6.jpg') }}" style="width:100%;cursor:pointer; height: 5rem" onclick="currentDivv(6)">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <h4 class="center font double">Our Computer laboratory</h4>
        </div>
        <div class="col m10 offset-m1 w3-display-container">
            <img class="mySlide" src="{{URL::asset('image/school/cp1.jpg')}}" style="width:100%" alt="Img0" height="500px">
            <img class="mySlide" src="{{URL::asset('image/school/cp2.jpg')}}" style="width:100%" alt="Img1" height="500px">
            <img class="mySlide" src="{{URL::asset('image/school/cp3.jpg')}}" style="width:100%" alt="Img2" height="500px">
            <img class="mySlide" src="{{URL::asset('image/school/cp4.jpg')}}" style="width:100%" alt="Im3" height="500px">

            <button class="w3-button w3-black w3-display-left" onclick="plusDiv(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDiv(1)">&#10095;</button>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <h4 class="center font double">Geographical Location</h4>
            <div id="mapDiv"></div>
            <iframe style="width:100%; height:350px" src="http://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Newbury+Street,+Boston,+MA,+United+States&amp;aq=1&amp;oq=NewBoston,+MA,+United+States&amp;sll=4.159102550158146, 9.265522139811802&amp;sspn=0.014099,0.033023&amp;ie=UTF8&amp;hq=Newbury+Street,+Boston,+MA,+United+States&amp;t=m&amp;ll=42.348994,-71.088248&amp;spn=0.001388,0.006276&amp;z=18&amp;iwloc=A&amp;output=embed"></iframe>
        </div>
    </div>
</div>

<script>
// $("html, body").animate({ scrollTop: $("#campus").offset().top }, 1500);
// const places = new google.maps.Map
'use strict';

let slideIn = 1;
showDiv(slideIn);

function plusDiv(n) {
    showDiv(slideIn += n);
}

function showDiv(n) {
    let i;
    const x = document.getElementsByClassName("mySlide");
    if (n > x.length) {slideIn = 1}
    if (n < 1) {slideIn = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIn-1].style.display = "block";
}

const src = 'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC0YDG3sDu58lOVPlnSWBis_mT7Xp6rgi8&libraries=geometry';

// $(document).ready(() => {
//     let recaptchaScript = document.createElement('script');
//     recaptchaScript.setAttribute('src', src);
//     document.head.appendChild(recaptchaScript);
//
//     console.log("document body  : ", document.getElementById('mapDiv'));
//     setTimeout(() => {
//         const myLatLng = {lat: 4.1706574, lng: 9.2789874};
//         const map = new google.maps.Map(document.getElementById('mapDiv'), {center: myLatLng, zoom: 14});
//         new google.maps.Marker({position: myLatLng, map, title: 'Buea college of Biblical studies'});
//         console.log("map loaded alreadt");
//     }, 1000);
// });


let slideIndex = 1;
showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " w3-white";
    }


function currentDivv(n) {
  showDivsa(slideIndex = n);
}

function showDivsa(n) {
  var i;
  var x = document.getElementsByClassName("mySlidess");
  var dots = document.getElementsByClassName("demos");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>
@endsection
