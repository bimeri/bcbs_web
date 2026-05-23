@extends('welcome')
@section('bcbs_title', trans('bcbs.admission_form'))
@section('bcbs_content')
    @if (!Auth::check())
        <script>
            window.location = "{{ route('bcbs.admission.signIn') }}";
        </script>
    @else
        <div class="row" id="about">
{{--            <h3 class="center italic font">{!! trans('bcbs.welcome_guest', ['name' => Auth::user()->name]) !!}</h3>--}}
            <div class="col s12 m10 offset-m1 w3-round-medium w3-light-gray w3-margin-bottom">
                <h4 class="">
                    <a href="{{route('bcbs.admission.home')}}"> <i class="fa fa-arrow-left black-text hover"></i></a>
                    <p class="center font"> <i class="red-text">***</i> {{ trans('bcbs.complete_form') }} <i class="red-text">***</i></p>
                </h4>

                <div class="row">
                    {{--            <div class="" id="gg"><pre></pre></div>--}}
                    <div class="col s12 w3-border " style="background-color: #d5d1d1 !important; padding: 0">
                        <ul class="tabs" style="background-color: transparent; overflow-x: scroll">
                            <li class="tab col s3"><a href="#test1" id="basic" onclick="nextStep('#test1', '#review', '{{$userinfo}}')">Basic Information</a></li>
                            <li class="tab col s3 {{$userinfo}}"><a href="#test2" id="fitness" onclick="nextStep('#test2', '#basic', '{{$userinfo}}')">School Fitness</a></li>
                            <li class="tab col s3 {{$fitness}}"><a href="#test3" id="upload" onclick="nextStep('#test3', '#fitness', '{{$fitness}}')">Document Upload</a></li>
                            <li class="tab col s3 {{$userDocs}}"><a href="#test4" id="review" onclick="nextStep('#test4', '#upload', '{{$userDocs}}')">Review</a></li>
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <h3 class="center">Basic Information</h3>
                        @include('src/bcbs/admission/resource/basicInformation')
                        <div class="row w3-padding w3-margin-right">
                            <button class="right w3-margin-top btn btn-small blue waves-light waves-effect" onclick="nextBasic()">next <i class="fa fa-forward"></i> School Fitness</button>
                        </div>
                    </div>
                    <div id="test2" class="col s12">
                        <h3 class="center">School Fitness</h3>
                        <div class="row w3-padding w3-margin-right">
                            <button class="right w3-margin-top btn btn-small blue waves-light waves-effect" onclick="nextFitness()">next <i class="fa fa-forward"></i> Document upload</button>
                        </div>
                    </div>
                    <div id="test3" class="col s12">
                        <h3 class="center">Document Upload</h3>
                        <div class="row w3-padding w3-margin-right">
                            <button class="right w3-margin-top btn btn-small blue waves-light waves-effect" onclick="nextUpload()">next <i class="fa fa-forward"></i> Review</button>
                        </div>
                    </div>
                    <div id="test4" class="col s12">
                        <h3 class="center">Review</h3>
                        <div class="row w3-padding w3-margin-right">
                            <button class="right w3-margin-top btn btn-small blue waves-light waves-effect">Submit</button>
                        </div>
                    </div>
                </div>
{{--                <button onClick="hpc()">click me</button>--}}
            </div>
        </div>

        <script>

            $(document).ready(function () {

                $('.tabs').tabs();

                // disable all except first
                disableTab('#fitness');
                disableTab('#upload');
                disableTab('#review');

            });

            function disableTab(id) {
                $(id).addClass('disabled-tab');
                $(id).css({
                    'pointer-events': 'none',
                    'opacity': '0.5'
                });
            }

            function enableTab(id) {
                $(id).removeClass('disabled-tab');
                $(id).css({
                    'pointer-events': 'auto',
                    'opacity': '1'
                });
            }

            function openTab(tabId) {

                const instance = M.Tabs.getInstance($('.tabs'));

                instance.select(tabId.replace('#', ''));

                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            }

            /*
            |--------------------------------------------------------------------------
            | BASIC INFO
            |--------------------------------------------------------------------------
            */

            async function nextBasic() {

                const saved = await saveBasicInfo();

                if(saved) {

                    enableTab('#fitness');

                    openTab('#test2');

                    toastr.success("Basic information completed");
                }
            }

            /*
            |--------------------------------------------------------------------------
            | FITNESS
            |--------------------------------------------------------------------------
            */

            async function nextFitness() {

                const saved = await saveFitness();

                if(saved) {

                    enableTab('#upload');

                    openTab('#test3');

                    toastr.success("Fitness section completed");
                }
            }

            /*
            |--------------------------------------------------------------------------
            | UPLOAD
            |--------------------------------------------------------------------------
            */

            async function nextUpload() {

                const saved = await saveUpload();

                if(saved) {

                    enableTab('#review');

                    openTab('#test4');

                    toastr.success("Documents uploaded");
                }
            }

            /*
            |--------------------------------------------------------------------------
            | SAVE BASIC INFO
            |--------------------------------------------------------------------------
            */

            function saveBasicInfo() {

                return new Promise((resolve, reject) => {

                    if(!$("#full_name").val()) {
                        toastr.warning("Full name required");
                        resolve(false);
                        return;
                    }

                    if(!$("#user_email").val()) {
                        toastr.warning("Email required");
                        resolve(false);
                        return;
                    }

                    if(!$("#user_contact").val()) {
                        toastr.warning("Contact required");
                        resolve(false);
                        return;
                    }

                    if(!$("#user_nationality").val()) {
                        toastr.warning("Nationality required");
                        resolve(false);
                        return;
                    }

                    if(!$("#user_congregation").val()) {
                        toastr.warning("Congregation required");
                        resolve(false);
                        return;
                    }
                    $('#bcbs_loader').show();
                    $.ajax({
                        headers: {
                            'Accept': 'application/json'
                        },
                        url : '{{ route("user.form.basic") }}',
                        type : "POST",
                        data : {
                            _token: '{{ csrf_token() }}',
                            full_name : $("#full_name").val(),
                            user_email : $("#user_email").val(),
                            user_contact : $("#user_contact").val(),
                            user_nationality : $("#user_nationality").val(),
                            user_address1: $("#user_address1").val(),
                            user_address2: $("#user_address2").val(),
                            user_street: $("#user_street").val(),
                            user_congregation: $("#user_congregation").val(),
                            user_fathers: $("#user_fathers").val(),
                            user_mother: $("#user_mother").val(),
                            zip_code: $("#zip_code").val(),
                            user_date_of_birth: $("#user_date_of_birth").val(),
                            user_date_baptise: $("#user_date_baptise").val(),
                            user_description: $("#user_description").val()
                        },

                        success: function(res) {
                            $('#bcbs_loader').hide();
                            console.log("response:", res);
                            if (!res.success) {
                                toastr.error(res.message || "Something went wrong");
                                return;
                            }
                            if (res.type === 'save') {
                                toastr.success(res.message);
                            } else {
                                toastr.info(res.message);
                            }
                            enableTab('#fitness'); // or next step logic
                            openTab('#test2'); // move to next tab
                        },

                        error: function(error){
                            $('#bcbs_loader').hide();
                            toastr.error("Failed to save basic information");
                            console.log(error);
                            resolve(false);
                        }
                    });
                });
            }

            /*
            |--------------------------------------------------------------------------
            | FITNESS
            |--------------------------------------------------------------------------
            */

            function saveFitness() {

                return new Promise((resolve) => {

                    // your validation here

                    resolve(true);
                });
            }

            /*
            |--------------------------------------------------------------------------
            | UPLOAD
            |--------------------------------------------------------------------------
            */

            function saveUpload() {

                return new Promise((resolve) => {

                    // upload logic

                    resolve(true);
                });
            }

            /*
            |--------------------------------------------------------------------------
            | FINAL SUBMIT
            |--------------------------------------------------------------------------
            */

            function finalSave() {

                toastr.success("Application submitted successfully");
            }

        </script>
    @endIf
@endsection
