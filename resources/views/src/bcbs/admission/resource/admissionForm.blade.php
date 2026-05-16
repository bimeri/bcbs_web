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
                            <button class="right w3-margin-top btn btn-small blue waves-light waves-effect" onclick="nextStep('#test2', '#basic', '{{$userinfo}}')">next <i class="fa fa-forward"></i> School Fitness</button>
                        </div>
                    </div>
                    <div id="test2" class="col s12">
                        <h3 class="center">School Fitness</h3>
                        <div class="row w3-padding w3-margin-right">
                            <button class="right w3-margin-top btn btn-small blue waves-light waves-effect" onclick="nextStep('#test3', '#fitness', '{{$fitness}}')">next <i class="fa fa-forward"></i> Document upload</button>
                        </div>
                    </div>
                    <div id="test3" class="col s12">
                        <h3 class="center">Document Upload</h3>
                        <div class="row w3-padding w3-margin-right">
                            <button class="right w3-margin-top btn btn-small blue waves-light waves-effect" onclick="nextStep('#test4', '#upload', '{{$userDocs}}')">next <i class="fa fa-forward"></i> review</button>
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
          // const doc = document.querySelector('#basic');
          // doc.classList.add('active');

            $(document).ready(function(){
                $('.tabs').tabs();
            });

            function hpc() {
                const req = new XMLHttpRequest();
                req.open('GET', 'http://localhost:4001/api/public/roles');
                req.onload = function() {
                    const data = JSON.parse(req.responseText);
                    console.log('our dta: ', data);
                    document.getElementById('gg').innerHTML = data[0].name;
                }
                req.send();
            }

            function nextStep(step, id, type) {
                console.log("type: ", type)
                if(type === 'disabled') {return;}
                switch (id) {
                    case '#basic':
                       const val = saveBasicInfo();
                       if (val === false) {
                           return;
                       }
                       break;
                    case '#fitness':
                        saveFitness();
                        break;
                    case '#upload':
                        saveUpload();
                        break;
                    case '#review':
                        finalSave();
                        break
                }
                const basic = document.querySelector(id);
                basic.classList.add('active');
                window.location.href = step;
                $('html, body').animate({ scrollTop: 0 });
                window.location.reload();
            }

            function saveBasicInfo() {
                console.log("savng basic")
                if(!$("#full_name")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.message')]) }}");
                    return false;
                }
                if(!$("#user_email")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.email')]) }}");
                    return false;
                }
                if(!$("#user_contact")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.contact')]) }}");
                    return false;
                }
                if(!$("#user_nationality")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.nationality')]) }}");
                    return false;
                }
                if(!$("#user_congregation")[0].value){
                    toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.congrigation')]) }}");
                    return false;
                }
                $('#bcbs_loader').show();
                $.ajax({
                    url : '{{ route("user.form.basic") }}',
                    type : "post",
                    data : { '_token': '{{ csrf_token() }}',
                        full_name : $("#full_name")[0].value,
                        user_email : $("#user_email")[0].value,
                        user_contact : $("#user_contact")[0].value,
                        user_nationality : $("#user_nationality")[0].value,
                        user_address1: $("#user_address1")[0].value,
                        user_address2: $("#user_address2")[0].value,
                        user_street: $("#user_street")[0].value,
                        user_congregation: $("#user_congregation")[0].value,
                        user_fathers: $("#user_fathers")[0].value,
                        user_mother: $("#user_mother")[0].value,
                        zip_code: $("#zip_code")[0].value,
                        user_date_of_birth: $("#user_date_of_birth")[0].value,
                        user_date_baptise: $("#user_date_baptise")[0].value,
                        user_description: $("#user_description")[0].value
                    },
                    success: function(res){
                        console.log("response: ", res)
                        if (res?.type === 'save') {
                            toastr.success(res?.message);
                        }
                         if (res?.type === 'update') {
                             toastr.info(res?.message);
                         }
                        $('#bcbs_loader').hide();
                        // $('#contact_form')[0].reset();
                        return true;
                    },
                    error: function(error){
                        $('#bcbs_loader').hide();
                        toastr.error(error);
                        return false;
                    },
                });
            }

            function saveFitness() {

            }
            function saveUpload() {

            }
            function finalSave() {

            }
        </script>
    @endIf
@endsection
