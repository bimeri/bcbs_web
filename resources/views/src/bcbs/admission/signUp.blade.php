@extends('welcome')
@section('bcbs_title', trans('bcbs.admission'))
@section('bcbs_content')
<div class="row" id="about">
    <h2 class="center italic bold font">{{ trans('bcbs.registration_form') }}</h2>
    <div class="col s12 m10 offset-m1 w3-round-medium w3-light-gray w3-margin-bottom">
        <h4 class="center">*** {{ trans('bcbs.fill_form') }} ***</h4>
        <p class="orange-text w3-padding">
           {!! trans('bcbs.signIn_if_filledForm') !!}
        </p>
    </div>

    <div class="col s10 offset-s1 m6 offset-m3 w3-margin-top w3-padding input-field w3-round-large w3-padding w3-light-gray" id="singIn" style=" box-shadow: inset 0px 0px 10px rgba(150, 143, 143, 0.8);">
      <form id="signUpForm">
          <div class="row">
              <h3 class="center blue-text italic flow-text font">{{ trans('bcbs.sigUpForm') }}</h3>
              <div class="col s12 m12 input-field">
                  <label for="f_name">{{ trans('messages.full_name') }}</label>
                  <input class="validate" required type="text" id="f_name">
              </div>
              <div class="col s12 m12 input-field">
                  <label for="user_name">{{ trans('bcbs.user_name') }}</label>
                  <input type="text" id="user_name" class="validate" required>
              </div>
              <div class="col s12 m12 input-field">
                  <label for="tel">{{ trans('bcbs.contact') }}</label>
                  <input type="number" id="tel" class="validate" required>
              </div>
              <div class="col s12 m12 input-field">
                  <label for="bcbs_email">{{ trans('messages.email') }}</label>
                  <input type="email" class="validate" id="bcbs_email" required>
                  <span class="helper-text" data-error="invalid email" data-success=""></span>
              </div>
              <div class="row">
                <div class="col s12 m6">
                    <div class="col s12 m12 input-field">
                        <label for="pass1">{{ trans('messages.password') }}</label>
                        <input type="password" class="validate" id="pass1">
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="col s12 m12 input-field">
                        <label for="pass2">{{ trans('messages.passwordConfirm') }}</label>
                        <input type="password" class="validate" id="pass2">
                    </div>
                </div>
              </div>
              <div class="col s12 m12 input-field browser-default">
                <label for="content">Reason for joining BCBS (Optional)</label>
                  <textarea name="content" id="content" maxlength="120" data-length="120" placeholder="{{ trans('bcbs.enter_text_here_not_more_than_120_character') }}" class="materialize-textarea"></textarea>
              </div>
              <div class="col s12 m12">
                  <button type="button" class="waves-effect waves-light w3-blue flow-text w3-round-medium btn s12 m12" style="width: 60%; margin-left: 20%;" onclick="signUpForm()">{{ trans('bcbs.submit') }}</button>
              </div>
          </div>
      </form>
  </div>
</div>

<script>
// $("html, body").animate({ scrollTop: $("#about").offset().top }, 1500);
function signUpForm() {

    if(!$("#f_name").val()) {
        toastr.warning("{{ __('validation.required', ['attribute' => trans('bcbs.name')]) }}");
        return false;
    }

    if(!$("#user_name").val()) {
        toastr.warning("{{ __('validation.required', ['attribute' => trans('bcbs.user_name')]) }}");
        return false;
    }

    if(!$("#tel").val()) {
        toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.contact')]) }}");
        return false;
    }

    if(!$("#bcbs_email").val()) {
        toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.email')]) }}");
        return false;
    }

    if($("#pass1").val() !== $("#pass2").val()) {
        toastr.error("{{ trans('messages.passwordMissMatch') }}");
        return false;
    }

    $('#bcbs_loader').show();

    $.ajax({
        url : '{{ route("guest.registration") }}',
        type : "POST",

        data : {
            _token : '{{ csrf_token() }}',
            name : $("#f_name").val(),
            user_name : $("#user_name").val(),
            email : $("#bcbs_email").val(),
            contact : $("#tel").val(),
            message : $("#content").val(),
            password : $("#pass1").val(),
        },

        success: function(res) {

            console.log("SUCCESS:", res);

            $('#bcbs_loader').hide();

            toastr.success(res.message);

            $('html, body').animate({
                scrollTop: 0
            }, 800);

            setTimeout(function () {
                window.location.href = "{{ route('bcbs.admission.signIn') }}";
            }, 1500);
        },

        error: function(error) {

            console.log("ERROR:", error);

            $('#bcbs_loader').hide();

            let message = "Something went wrong";

            if(error.responseJSON) {

                const errors = error.responseJSON.errors;

                message = '';

                if(errors?.name)
                    message += errors.name[0] + "<br>";

                if(errors?.user_name)
                    message += errors.user_name[0] + "<br>";

                if(errors?.email)
                    message += errors.email[0] + "<br>";

                if(errors?.contact)
                    message += errors.contact[0] + "<br>";

                if(errors?.password)
                    message += errors.password[0] + "<br>";
            }

            toastr.error(message);
        }
    });
}
</script>
@endsection
