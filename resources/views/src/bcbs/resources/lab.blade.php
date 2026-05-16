@extends('welcome')
@section('bcbs_title', trans('bcbs.campus'))
<style></style>
@section('bcbs_content')
    <div class="row" id="campus">
        <h2 class="center italic font bold">{{ __("bcbs.library") }}</h2>
        <div class="row">
            <div class="col s12 m10 offset-m1 w3-round-medium font justify w3-padding">
                {{ trans('bcbs.lib_intro') }}
                <ul class="w3-padding-16">
                    <li class="w3-padding">1. {{ trans('bcbs.provides_material_in_support_of_the_learning') }}</li><br>
                    <li class="w3-padding">2. {{ trans('bcbs.provides_materials_to_meet_requirement') }}</li><br>
                    <li class="w3-padding">3. {{ trans('bcbs.provide_materials_to_assist_the_library_user_in') }}</li><br>
                    <li class="w3-padding">4. {{ trans('bcbs.meets_the_spiritual_needs_of_the_church_community') }}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m11 offset-m1 w3-round-medium justify w3-padding">
                <div class="col s12 m6">
                    <h3 class="bold font center">Eligebility for Using the Library</h3>
                   <b>i.</b> Students of the school. <br>
                    <b>ii.</b> Academic and non-academic staff of the school<br>
                    <b>iii.</b> External users as approved by the Dean. Anyone wishing to ue the library has to registr. Registration is free of charge. All registratered users will be issued borrowing ticket. These tickets are not transferable
                    <br><br>
                </div>
                <div class="col s12 m4 offset-m1">
                    <h3 class="font bold">Library Hours</h3>
                    <div class="row w3-light-gray w3-round-medium w3-padding">
                        The library's opening hours vary according to the following schedule; Monday to Saturday from 8:00 am tp 6:00pm and saturday from 1:00 pm to 6 pm. Library is open to students and staff on vaction periods.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // $("html, body").animate({ scrollTop: $("#campus").offset().top }, 1500);

    </script>
@endsection
