@extends('welcome')
@section('bcbs_title', trans('bcbs.satalite_school'))
@section('bcbs_content')
<div class="row">
  <h2 class="font center bold italic">{{ trans('bcbs.satellite_school') }}</h2>
    <div class="row w3-margin-top w3-padding">
          <div class="col s12 m7">
              <div class="row w3-light-gray w3-round-medium w3-padding animate__animated animate__bounce">
                  <h3 class="font">
                      {{ trans('bcbs.welcome_to_our_satellite_school') }}
                      <i class="fa fa-sun orange-text right w3-xlarge w3-margin-left"></i>
                  </h3>
              </div>
              <div class="row w3-border w3-round-large w3-padding">
                  <p class="justify">
                      {{ trans('bcbs.there_are_three_fundamental_values_that_must_be_at') }}
                  </p>
              </div>

              <div class="w3-content w3-display-container">
                  <img class="mySlides" src="{{URL::asset('image/sat/sat0.jpg')}}" style="width:100%" alt="Img0" height="400px">
                  <img class="mySlides" src="{{URL::asset('image/sat/sat1.jpg')}}" style="width:100%" alt="Img1"  height="400px">
                  <img class="mySlides" src="{{URL::asset('image/sat/sat2.jpg')}}" style="width:100%" alt="Img2"  height="400px">
                  <img class="mySlides" src="{{URL::asset('image/sat/sat3.jpg')}}" style="width:100%" alt="Im3"  height="400px">

                  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
              </div>
          </div>


        <div class="col s12 m3 push-m1">
            <h3 class="font bold w3-margin-top">{{ trans('bcbs.objective') }}</h3>
            <div class="row w3-light-gray w3-round-medium w3-padding">
                <p class="justify">
                {{ trans('bcbs.satellite_objective') }}
                </p>
            </div>
            <h3 class="font bold w3-margin-top">{{ trans('bcbs.goal') }}</h3>
            <div class="row w3-light-gray w3-round-medium w3-padding">
                <p class="justify">
                    {{ trans('bcbs.satellite_goal') }}
                </p>
            </div>
            <h3 class="font bold w3-margin-top">{{ trans('bcbs.how_to_join') }}</h3>
            <div class="row w3-light-gray w3-round-medium w3-padding">
                <p class="justify">
                    {!!trans('bcbs.satellite_joining')!!}
                </p>
            </div>
        </div>

    </div>

</div>
<script>
    //  var instance = M.Modal.getInstance(elem);
    $(document).ready(function(){
        $('.modal').modal();
    });

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }

    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > x.length) {slideIndex = 1}
        x[slideIndex-1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
    }
</script>
@endsection
