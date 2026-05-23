@extends('welcome')
@section('bcbs_title', trans('bcbs.guest_home'))
@section('bcbs_content')
    @if (!Auth::check())
        <script>
            window.location = "{{ route('bcbs.admission.signIn') }}";
        </script>
    @else
        <div class="row" id="about">
            <h5 class="center italic font">{!! trans('bcbs.welcome_guest', ['name' => Auth::user()->name]) !!}</h5>
            <div class="col s12 m10 offset-m1 w3-round-medium w3-light-gray w3-margin-bottom">
                <h4 class="center font bold">Account</h4>
                <div class="row w3-round-medium w3-light-gray w3-margin-top">
                    <div class="col s12 m4">
                        <div class="w3-card-4 w3-padding">
                            <img src="{{URL::asset($user->profile ?  : 'image/profiles/2.png')}}" class="w3-border"
                                 height="250" width="250"
                                 alt="Alps">
                            <p class="font bold w3-padding center">{{$user->name}}</p>
                        </div>
                    </div>
                    <div class="col s12 m7">
                        {!! $application !!}
                        <div class="col s12 m12 w3-padding white" style="height: auto; overflow-y: auto">
                            <h4 class="w3-padding center double">User's information</h4>
                            <p class="grey-text w3-padding"><i class="fa fa-user-circle w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Full name:&nbsp;
                                <b class="font black-text">{{$user->name}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-envelope w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Email:&nbsp;&nbsp;&nbsp;&nbsp;
                                <b class="font black-text">{{$user->email}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-phone-alt w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Contact:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b class="font black-text">{{$user->contact}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-id-card w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Nationality:&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->nationality : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-address-card w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Address 1:&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->address1 : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-address-card w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Address 2:&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->address2 : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-flag w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->street : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-place-of-worship w3-medium grey-custom"></i>&nbsp;
                                Congregation:&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->congregation : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-user w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Father's name:&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->father_name : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-user w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Mother's name:&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->mother_name : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-barcode w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Zip code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b class="font black-text">{{$userinfo ? $userinfo->zip : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-calendar w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Date of birth:&nbsp;
                                <b class="font black-text">{{$userinfo ? date('d-M-Y', strtotime($userinfo->date_of_birth)) : '#####'}}</b>
                            </p>
                            <p class="grey-text w3-padding"><i class="fa fa-calendar-check w3-medium grey-custom"></i>&nbsp;&nbsp;
                                Date baptise:&nbsp;
                                <b class="font black-text">{{$userinfo ? date('d-M-Y', strtotime($userinfo->date_baptized)) : '#####'}}</b>
                            </p>
                            <div class="grey lighten-4 grey-text w3-padding">
                                <b class="font">{{$userinfo ? $userinfo->description : '###################################'}}</b>
                            </div>
                            <div class="w3-padding w3-margin-top center double">
                                <a class="w3-padding blue-text hover" id="hover">account verification <i
                                        class="fa fa-question-circle"></i></a>
                                <div class="row"></div>
                                <hr>
                                <a class="w3-padding orange-text hover">Edit information <i
                                        class="fa fa-pen-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>

            // (function ($) {
            //
            //     jQuery.fn.extend({
            //         slimScroll: function (o) {
            //
            //             var ops = o;
            //             //do it for every element that matches selector
            //             this.each(function () {
            //
            //                 const scrollContent = function (x, y, isWheel) {
            //                     var delta = y;
            //
            //                     if (isWheel) {
            //                         //move bar with mouse wheel
            //                         delta = bar.position().top + y * wheelStep;
            //
            //                         //move bar, make sure it doesn't go out
            //                         delta = Math.max(delta, 0);
            //                         var maxTop = me.outerHeight() - bar.outerHeight();
            //                         delta = Math.min(delta, maxTop);
            //
            //                         //scroll the scrollbar
            //                         bar.css({top: delta + 'px'});
            //                     }
            //
            //                     //calculate actual scroll amount
            //                     percentScroll = parseInt(bar.position().top) / (me.outerHeight() - bar.outerHeight());
            //                     delta = percentScroll * (me[0].scrollHeight - me.outerHeight());
            //
            //                     //scroll content
            //                     me.scrollTop(delta);
            //
            //                     //ensure bar is visible
            //                     showBar();
            //                 };
            //                 let isOverPanel, isOverBar, isDragg, queueHide, barHeight,
            //                     divS = '<div></div>',
            //                     minBarHeight = 30,
            //                     wheelStep = 30,
            //                     o = ops || {},
            //                     cwidth = o.width || 'auto',
            //                     cheight = o.height || '250px',
            //                     size = o.size || '7px',
            //                     color = o.color || '#000',
            //                     position = o.position || 'right',
            //                     opacity = o.opacity || .4,
            //                     alwaysVisible = o.alwaysVisible === true;
            //
            //                 //used in event handlers and for better minification
            //                 const me = $(this);
            //
            //                 //wrap content
            //                 const wrapper = $(divS).css({
            //                     position: 'relative',
            //                     overflow: 'hidden',
            //                     width: cwidth,
            //                     height: cheight
            //                 }).attr({'class': 'slimScrollDiv'});
            //
            //                 //update style for the div
            //                 me.css({
            //                     overflow: 'hidden',
            //                     width: cwidth,
            //                     height: cheight
            //                 });
            //
            //                 //create scrollbar rail
            //                 const rail = $(divS).css({
            //                     width: '15px',
            //                     height: '100%',
            //                     position: 'absolute',
            //                     top: 0
            //                 });
            //
            //                 //create scrollbar
            //                 const bar = $(divS).attr({
            //                     'class': 'slimScrollBar ',
            //                     style: 'border-radius: ' + size
            //                 }).css({
            //                     background: color,
            //                     width: size,
            //                     position: 'absolute',
            //                     top: 0,
            //                     opacity: opacity,
            //                     display: alwaysVisible ? 'block' : 'none',
            //                     BorderRadius: size,
            //                     MozBorderRadius: size,
            //                     WebkitBorderRadius: size,
            //                     zIndex: 99
            //                 });
            //
            //                 //set position
            //                 const posCss = (position === 'right') ? {right: '1px'} : {left: '1px'};
            //                 rail.css(posCss);
            //                 bar.css(posCss);
            //
            //                 //wrap it
            //                 me.wrap(wrapper);
            //
            //                 //append to parent div
            //                 me.parent().append(bar);
            //                 me.parent().append(rail);
            //
            //                 //make it draggable
            //                 bar.draggable({
            //                     axis: 'y',
            //                     containment: 'parent',
            //                     start: function () {
            //                         isDragg = true;
            //                     },
            //                     stop: function () {
            //                         isDragg = false;
            //                         hideBar();
            //                     },
            //                     drag: function (e) {
            //                         //scroll content
            //                         scrollContent(0, $(this).position().top, false);
            //                     }
            //                 });
            //
            //                 //on rail over
            //                 rail.hover(function () {
            //                     showBar();
            //                 }, function () {
            //                     hideBar();
            //                 });
            //
            //                 //on bar over
            //                 bar.hover(function () {
            //                     isOverBar = true;
            //                 }, function () {
            //                     isOverBar = false;
            //                 });
            //
            //                 //show on parent mouseover
            //                 me.hover(function () {
            //                     isOverPanel = true;
            //                     showBar();
            //                     hideBar();
            //                 }, function () {
            //                     isOverPanel = false;
            //                     hideBar();
            //                 });
            //
            //                 const _onWheel = function (e) {
            //                     //use mouse wheel only when mouse is over
            //                     if (!isOverPanel) {
            //                         return;
            //                     }
            //
            //                     var e = e || window.event;
            //
            //                     var delta = 0;
            //                     if (e.wheelDelta) {
            //                         delta = -e.wheelDelta / 120;
            //                     }
            //                     if (e.detail) {
            //                         delta = e.detail / 3;
            //                     }
            //
            //                     //scroll content
            //                     scrollContent(0, delta, true);
            //
            //                     //stop window scroll
            //                     if (e.preventDefault) {
            //                         e.preventDefault();
            //                     }
            //                     e.returnValue = false;
            //                 };
            //
            //
            //                 const attachWheel = function () {
            //                     if (window.addEventListener) {
            //                         this.addEventListener('DOMMouseScroll', _onWheel, false);
            //                         this.addEventListener('mousewheel', _onWheel, false);
            //                     } else {
            //                         document.attachEvent("onmousewheel", _onWheel)
            //                     }
            //                 };
            //
            //                 //attach scroll events
            //                 attachWheel();
            //
            //                 var getBarHeight = function () {
            //                     //calculate scrollbar height and make sure it is not too small
            //                     barHeight = Math.max((me.outerHeight() / me[0].scrollHeight) * me.outerHeight(), minBarHeight);
            //                     bar.css({height: barHeight + 'px'});
            //                 }
            //
            //                 //set up initial height
            //                 getBarHeight();
            //
            //                 var showBar = function () {
            //                     //recalculate bar height
            //                     getBarHeight();
            //                     clearTimeout(queueHide);
            //
            //                     //show only when required
            //                     if (barHeight >= me.outerHeight()) {
            //                         return;
            //                     }
            //                     bar.fadeIn('fast');
            //                 }
            //
            //                 var hideBar = function () {
            //                     //only hide when options allow it
            //                     if (!alwaysVisible) {
            //                         queueHide = setTimeout(function () {
            //                             if (!isOverBar && !isDragg) {
            //                                 bar.fadeOut('slow');
            //                             }
            //                         }, 1000);
            //                     }
            //                 }
            //
            //             });
            //
            //             //maintain chainability
            //             return this;
            //         }
            //     });
            //
            //     jQuery.fn.extend({
            //         slimscroll: jQuery.fn.slimScroll
            //     });
            //
            // })(jQuery);


            //invalid name call
            $('#chatlist').slimscroll({
                color: '#9e9edc',
                // size: '10px',
                // width: '50px',
                // height: '150px'
            });


            function hpc() {
                var req = new XMLHttpRequest();
                req.open('GET', 'http://localhost:4001/api/public/roles');
                req.onload = function () {
                    var data = JSON.parse(req.responseText);
                    console.log('our dta: ', data);
                    document.getElementById('gg').innerHTML = data[0].name;
                }
                req.send();
            }

        </script>
    @endIf
@endsection
