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
    
        if(!$("#f_name")[0].value) {
            toastr.warning("{{ __('validation.required', ['attribute' => trans('bcbs.name')]) }}");
            return false;
        }
        if(!$("#user_name")[0].value) {
            toastr.warning("{{ __('validation.required', ['attribute' => trans('bcbs.user_name')]) }}");
            return false;
        }
        if(!$("#tel")[0].value) {
            toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.contact')]) }}");
            return false;
        }
        if(!$("#bcbs_email")[0].value) {
            toastr.warning("{{ __('validation.required', ['attribute' => trans('messages.email')]) }}");
            return false;
        }

        if($("#pass1")[0].value !== $("#pass2")[0].value) {
            toastr.error("{{ __('validation.required', ['attribute' => trans('messages.passwordMissMatch')]) }}");
            return false;
        }
        
        $('#bcbs_loader').show();
        $.ajax({
            url : '{{ route("guest.registration") }}',
            type : "post",
            data : {'_token' : '{{ csrf_token() }}',
                    name : $("#f_name")[0].value,
                    user_name : $("#user_name")[0].value,
                    email : $("#bcbs_email")[0].value,
                    contact : $("#tel")[0].value,
                    message: $("#content")[0].value,
                    password : $("#pass1")[0].value,
                },
            success: function(res) {
                $('html, body').animate({scrollTop: 0}, 800);
                window.location = "{{route('bcbs.admission.signIn', ['val' => '"+res+"'])}}";
                $('#notify').append('<div class="col s10 m10 offset-m1 w3-round-medium green green-text lighten-5">'+res+'</div>');
            },
            error: function(error) {
                const errorMessage = JSON.parse(error.responseText);
                const mess = errorMessage?.message ? errorMessage?.message + "<br>" : "";
                const name = errorMessage.errors?.name ? errorMessage.errors?.name+ "<br>" : "";
                const uname = errorMessage.errors?.user_name ? errorMessage.errors?.user_name+ "<br>" : "";
                const email = errorMessage.errors?.email? errorMessage.errors?.email +"<br>" : "";
                const contact = errorMessage.errors?.contact? errorMessage.errors?.contact+"<br>" : "";
                const password = errorMessage.errors?.password? errorMessage.errors?.password + "<br>" : "";
                const message = mess + name + uname + email + contact + password;
            toastr.error(message);
                $('#bcbs_loader').hide();
            },
        });
    }
</script>
@endsection
