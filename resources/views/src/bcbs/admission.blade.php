@extends('welcome')
@section('bcbs_title', trans('bcbs.admission'))
@section('bcbs_content')
<div class="row" id="about">
    <h2 class="center italic bold font">{{ trans('bcbs.admission') }}</h2>
    <div class="col s12 m10 offset-m1 w3-round-medium w3-light-gray">
        <h4 class="center">*** {{ trans('bcbs.special_notice') }} ***</h4>
        {{-- <p class="red-text">{{ trans('bcbs.admission_closed') }}</p> --}}
    </div>
    <div class="col s12 m10 offset-m1 w3-margin-top w3-round-large black-text w3-padding font " style=" text-align: justify; text-justify: inter-word; line-height: 1.7rem; box-shadow: 5px 10px 29px 0 rgba(68, 88, 144, 0.2)">
        <h4 class="center">{{ trans('bcbs.procedure') }}</h4>
        <p class="justify w3-padding">
            {{ trans('bcbs.admission_listed') }} <br>
            <ul>
                <b>1.</b> <li> {{ trans('bcbs.gce_ol') }}</li><br>
                <b>2.</b> <li> {{ trans('bcbs.one_requirement') }} <br>
                    <ul class="w3-margin-left">
                        a. <li class="w3-margin-left">{{ trans('bcbs.two_gce') }}</li><br>
                        b. <li class="w3-margin-left"> {{ trans('bcbs.bac_in_series') }}</li><br>
                        c. <li class="w3-margin-left"> {{ trans('bcbs.antidate_with_other_qualification') }}</li><br>
                    </ul>
                </li><br>
            <b>3.</b> <li> {{ trans('bcbs.department_specification') }}.</li><br>
            <b>4.</b> <li> {{ trans('bcbs.language_proficiency') }}</li><br>
            <b>5.</b> <li> {{ trans('bcbs.classical_program') }}</li><br>
            <b>6.</b> <li> {{ trans('bcbs.good_christian_xter') }}</li><br>
            <b>7.</b> <li> {{ trans('bcbs.recommendation') }}</li><br>
            <b>8.</b> <li> {{ trans('bcbs.agreement_regulation') }}</li><br>
            <b>9.</b> <li> {{ trans('bcbs.certificates') }}</li><br>
            <b>10.</b> <li> {{ trans('bcbs.letter_of_motivation') }}</li><br>
            <b>11.</b> <li> {{ trans('bcbs.id_card') }}</li><br>
            <b>12.</b> <li> {{ trans('bcbs.birth_certificate') }}</li><br>
            <b>13.</b> <li> {{ trans('bcbs.passport_photo') }}</li>
            </ul>
        </p>
    </div>
    <div class="row"></div>
    <div class="row">
        <div class="w3-padding w3-margin-top center">
            <a href="{{ route('bcbs.admission_signup') }}" class="blue-text w3-large double font">{{ trans('bcbs.proceed_to_form') }}</a>
        </div>
        <div class="col s12 m10 offset-m1 w3-padding w3-margin-top">
            <div class="col s12 m8 bold">{{ trans('bcbs.program_available') }}</div>
        </div>
        <div class="col s12 m10 offset-m1 w3-margin-top w3-round-medium w3-light-grey w3-padding cursor font">
           <h6 class="left">{{ trans('bcbs.bachelor_degree') }} (4 years)</h6>
        </div>
        <div class="col s12 m10 offset-m1 w3-margin-top w3-round-medium w3-light-grey w3-padding font" style="cursor: not-allowed; color: #ab9b9b !important;
        background-color: #f9f5f5 !important;">
           <h6 class="left">{{ trans('bcbs.master_degree') }} (2 years)</h6>
        </div>
        <div class="col s12 m10 offset-m1 w3-margin-top w3-round-medium w3-light-grey w3-padding font" style="cursor: not-allowed; color: #ab9b9b !important;
        background-color: #f9f5f5 !important;">
           <h6 class="left">{{ trans('bcbs.php_degree') }} (2 years)</h6>
        </div>
    </div>
</div>

<script>
// $("html, body").animate({ scrollTop: $("#about").offset().top }, 1500);
</script>
@endsection
