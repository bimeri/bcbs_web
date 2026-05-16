@extends('welcome')
@section('bcbs_title', trans('bcbs.elearning'))
<style>
    @media only screen and (min-width: 601px) {
    .row .col.m3 {
    width: 24% !important;
    margin-left: auto !important;
    left: auto !important;
    right: auto !important;
    margin:4px;
  }
}
@media only screen and (min-width: 993px) {
    .row .col.m3 {
    width: 24% !important;
    margin-left: auto !important;
    left: auto !important;
    right: auto !important;
    margin:4px;
  }
}
.centers{
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}
.hover:hover{
    box-shadow: 4px 8px 8px rgba(79, 84, 88, 0.5);
    cursor: pointer;
}
</style>
@section('bcbs_content')
<div class="row">
    <h2 class="font center bold italic">{{ trans('bcbs.e_learning') }}</h2>
</div>
<div class="row">
    <div class="col s12 m10 offset-m1 l10 offset-l1 w3-padding w3-round-medium orange orange-text lighten-5 card">
        <p class="justify font">
            {{ trans('bcbs.we_are_sorry_to_say_that_our_learning_platform_is') }}
        </p>
    </div>
</div>
<div class="row">
    <div class="col s12 m10 offset-m1 l10 offset-l1">
        <div class="row">
            <a>
                <div class="col s6 m3 w3-margin-top l3 w3-round-large pink pink-text lighten-5 w3-padding hover @if(Request::is('elearning/distance')) w3-border w3-shadow @endif" style="height: 180px">
                    <i class="centers w3-jumbo fa fa-graduation-cap w3-animate-opacity"></i><br><hr  style="border-top: 2px solid #fff">
                    <h4 class="center font">{{ trans('bcbs.distant_learning') }}</h4>
                </div>
            </a>
            <a href="{{ route('elearning.preach') }}">
                <div class="col s6 m3 w3-margin-top l3 w3-round-large blue blue-text lighten-5 w3-padding hover @if(Request::is('elearning/preach')) w3-border w3-shadow @endif" style="height: 180px">
                    <i class="centers w3-jumbo fa fa-microphone w3-animate-opacity"></i><br><hr style="border-top: 2px solid #fff">
                    <h4 class="center font">{{ trans('bcbs.preach_the_word') }}</h4>
                </div>
            </a>

            <a href="{{ route('elearning.coc') }}">
                <div class="col s6 m3 w3-margin-top l3 w3-round-large green green-text lighten-5 w3-padding hover @if(Request::is('elearning/c-o-c')) w3-border w3-shadow @endif" style="height: 180px">
                    <i class="centers w3-jumbo fa fa-church w3-animate-opacity"></i><br><hr style="border-top: 2px solid #fff">
                    <h4 class="center font">{{ trans('bcbs.church_of_christ') }}</h4>
                </div>
            </a>
            <a>
                <div class="col s6 m3 w3-margin-top l3 w3-round-large purple purple-text lighten-5 w3-padding hover  @if(Request::is('elearning/evangelism')) w3-border w3-shadow @endif" style="height: 180px">
                    <i class="centers w3-jumbo fa fa-hand-holding w3-animate-opacity"></i><br><hr style="border-top: 2px solid #fff">
                    <h3 class="center font">{{ trans('bcbs.evangelism') }}</h3>
                </div>
            </a>
        </div>
        @yield('learning')
    </div>
</div>
<script>
    $("document").ready(function(){
        $('#bcbs_loader').hide();
    });
</script>
@endsection
