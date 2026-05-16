
<div class="col s12 m12 l5 offset-l1 w3-padding input-field">
    <h3 class="center italic flow-text font">{{ trans('bcbs.recent_blog') }}</h3>
    <div class="row font">
        <img src="{{ URL::asset('image/logo/logo.png') }}" class="circles-m left" alt="Logo" style="shape-outside: circle(50%); margin-right: 1.5rem;"/>
        <div class="w3-padding">
            <a href="#" class="blue-text">{!! trans('bcbs.course_registration_closed_for_first_semester_2021') !!}</a><br>
            <p class="justify">{{ trans('auth.students_who_did_not_completed_registration_are_he') }}</p>
        </div>
    </div><hr style="border-top: 1px solid #fff; width: 65%; margin-left:10%">
    <div class="row font">
        <img src="{{ URL::asset('image/logo/logo.png') }}" class="circles-m left" alt="Logo" style="shape-outside: circle(50%); margin-right: 1.5rem;"/>
        <div class="w3-padding">
            <a href="#" class="blue-text">{!! trans('bcbs.school_is_pleased_with_current_batch_student_2021') !!}</a><br>
            <p class="justify">{{ trans('bcbs.students_have_been_encouraged_for_the_studies_and') }}</p>
             <label><i class="fa fa-thumbs-up w3-margin-left right"></i></label>
        </div>
    </div><hr style="border-top: 1px solid #fff; width: 65%; margin-left:10%">

    {{-- small contact form --}}

    <h4 class="center italic font">{{ trans('bcbs.please_ask_us_your_question_and_we_will_be_pleased') }}</h4>
    <form action="" id="questionForm">
        <div class="row">
            <div class="col s10 offset-s1 m6 offset-m3 input-field">
                <input type="email" class="validate" id="question_email" placeholder="{{ trans('bcbs.attach_your_email') }}">
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
            <div class="col s10 offset-s1 m6 offset-m3">
                <textarea name="content" id="contentquestion" maxlength="100" data-length="100" placeholder="{{ trans('bcbs.enter_text_here_not_more_than_100_character') }}" class="materialize-textarea question"></textarea>
            </div>
            <div class="col s10 offset-s1 m6 offset-m3 w3-margin-top">
                <button type="button" onclick="submitQuestion()" class="submit waves-effect waves-light flow-text w3-gray w3-round-medium btn s12 m12" style="width: 100%;">{{ trans('bcbs.submit') }}</button>
            </div>
        </div>
    </form>
</div>