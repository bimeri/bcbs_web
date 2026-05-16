@extends('welcome')
@section('bcbs_title', trans('messages.courses'))
<style>
    td, th, tr{
        border-collapse: collapse !important;
        border: 1px solid #1e1e25 !important;
        font-size: 14px !important;
        text-align: center !important;
    }
    .hover{
        cursor: pointer;
    }
    .element {
  animation: MoveUpDown 1s linear infinite;
  position: relative;

}
ul.tabs a{
    color: rgb(59, 54, 54) !important;
    border-right: 1px solid #969090 !important; border-radius: 5px;
    overflow-x: hidden !important;
}
ul.tabs{
    overflow-x: hidden !important;
}

@keyframes MoveUpDown {
  0%, 100% {
    bottom: 0;
  }
  50% {
    bottom: -10px;
  }
}

ul.tabs .tab a:focus.active {
  color: #5a73e6;
  background-color: #fff;
  /*Custom Background Color While Active*/
}

ul.tabs .indicator {
  background-color: transparent;
}
</style>
@section('bcbs_content')
<div class="row" id="bcbs_course">
    <h3 class="center double font">{{ trans('bcbs.sample_courses') }}</h3>
    <div class="row">
        <div class="w3-padding orange orange-text lighten-5 w3-round-large col s12 m10 offset-m1 w3-margin-bottom w3-margin-top">
            <span onclick="this.parentElement.style.display='none'" class="w3-close w3-large right w3-padding red-text hover w3-medium">x</span>
            <p class="justify font">We are pleased to let you know that Courses are not free, and are only issued if you are a student. Please <a href="https://student.bcbs.net.co" class="blue-text pointer">Click here</a> if you are a student to register your courses. <br>
                Else please, contact us with your email and telephone and we will be grateful to reply
            </p>
        </div>
    </div>
    <div class="w3-padding  ">
      <h5 class="bold center w3-margin-top">Courses affiliated to Sunset International Bible Institute LUBBOCK TEXAS USA</h5>
      <p class="ml-l"><strong class="font upper">Instructions</strong></p>
      <p class="justify w3-padding">Each lesson is based around the instruction on either the VHS tape, DVD, CD, or audio cassette tape.
          Listen to the lectures on the tape as you follow in the course Study Guide book.
      </p>
    </div>
</div>
 <div class="row">
    <div class="col s12 m10 offset-m1">
      <ul class="tabs transparent w3-light-gray w3-round-medium tabs-fixed-width tab-demo z-depth-1" id="tabs-swipe-demo'">
        <li class="tab col s3 m3"><a class="active" href="#test1"><i class="fa fa-folder orange-text"></i> Level one</a></li>
        <li class="tab col s3 m3"><a href="#test2"><i class="fa fa-folder orange-text"></i> Level two</a></a></li>
        <li class="tab col s3 m3"><a href="#test3"><i class="fa fa-folder orange-text"></i> Level Three</a></a></li>
        <li class="tab col s3 m3"><a href="#test4"><i class="fa fa-folder orange-text"></i> Level four</a></a></li>
        <div class="indicator teal" style="z-index:1"></div>
      </ul>
    </div>
    <div id="test1" class="col s12 w3-margin-top">@include('src.bcbs.includes.level_one')</div>
    <div id="test2" class="col s12 w3-margin-top">@include('src.bcbs.includes.level_two')</div>
    <div id="test3" class="col s12 w3-margin-top">Level 3 course</div>
    <div id="test4" class="col s12 w3-margin-top">Level 4 course</div>
  </div>

<script>
    $(document).ready(function(){
        $('.tabs').tabs();
    });
$( document ).ready(function() {
   $('.tabs').tabs({swipeable: false, responsiveThreshold : Infinity});
});
</script>
@endsection
