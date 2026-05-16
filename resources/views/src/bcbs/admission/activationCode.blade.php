@extends('welcome')
@section('bcbs_title', trans('bcbs.admission'))
@section('bcbs_content')
<style>

input[type="text"] {
	width: 1.2em;
	line-height: 0;
    text-transform: uppercase;
	margin: .1em;
	padding: 0;
	font-size: 2.3em;
	text-align: center;
	appearance: textfield;
	-webkit-appearance: textfield;
	border: 2px solid #BBBBFF;
	color: purple;
	border-radius: 4px;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* 2 group of 3 items */
input[type="text"]:nth-child(n+4) {
	order: 2;
}

/* From: https://gist.github.com/ffoodd/000b59f431e3e64e4ce1a24d5bb36034 */
</style>
    <div class="row">
        <div class="col s12 m6 offset-m3 w3-margin-top w3-padding input-field w3-round-large w3-padding w3-light-gray" id="signUp" style=" box-shadow: inset 0px 0px 10px rgba(150, 143, 143, 0.8);">
            <div class="progress" id="code_loader" style="position: relative; z-index: 99999">
                <div class="indeterminate"></div>
            </div>
            <form id="your_form_id">
                <div class="row">
                    <h3 class="center blue-text italic flow-text font">{{ trans('bcbs.activationForm') }}</h3>
                    <div class="row">
                        <div id="hide_code" class="center col s10 m10 offset-s1 offset-m1 w3-padding green green-text lighten-5 w3-round font">
                            Your registration was successful. Enter the activation code send to your email
                        </div>
                        <div id="show_code" class="col s10 m10 offset-s1 offset-m1 w3-padding red red-text lighten-5 w3-round font">

                        </div>
                        <div class="col s12 m12">
                            <h4 for="enter_code" class="w3-padding center">{{ trans('bcbs.enter_code') }}</h4>
                            <div class="w3-padding center">
                                <input type="text" class="browser-default" pattern="[0-9]*" value="" inputtype="numeric" autocomplete="one-time-code" id="otc-1" required>
                                <input type="text" class="browser-default" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-2" required>
                                <input type="text" class="browser-default" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-3" required>
                                <input type="text" class="browser-default" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-4" required>
                                <input type="text" class="browser-default" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-5" required>
                                <input type="text" class="browser-default" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-6" required>
                            </div>
                            <div class="row center">
                                <button type="button" class="waves-effect w3-margin-top waves-light w3-blue flow-text w3-round-medium btn s12 m12"
                                        style="width: 30%;"
                                        onclick="getCode()">{{ trans('bcbs.verify') }}</button>
                            </div>
                            <div id="show_key" class="bold font double center w3-margin-top blue-text cursor">
                               <a href="{{route('bcbs.reactivateCode')}}">click here to request new Activation code <i class="fa fa-unlock grey-text w3-small"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#code_loader').hide();
        $('#show_code').hide();
        $('#show_key').hide();
        document.getElementById('otc-1').focus();

        function getCode() {
            const v1 = document.getElementById("otc-1");
            const v2 = document.getElementById("otc-2");
            const v3 = document.getElementById("otc-3");
            const v4 = document.getElementById("otc-4");
            const v5 = document.getElementById("otc-5");
            const v6 = document.getElementById("otc-6");
            code = v1.value + v2.value + v3.value + v4.value + v5.value + v6.value;
            if  (code.length === 6) {
                activateAccount(code);
                code = '';
            }
        }
        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        let value = params.val;
        if(value === 'reactivateSucess') {
            const item =localStorage.getItem('reactivateSucess');
            document.getElementById('hide_code').innerHTML = JSON.parse(item);
        }

        let code = '';
        let in1 = document.getElementById('otc-1'),
        ins = document.querySelectorAll('input[type="text"]'),
        splitNumber = function(e) {
            let data = e.data || e.target.value;
            if ( ! data ) return;
            if ( data.length === 1 ) return;

            popuNext(e.target, data);
        },
        popuNext = function(el, data) {
            el.value = data[0];
            data = data.substring(1);
            if ( el.nextElementSibling && data.length ) {
                popuNext(el.nextElementSibling, data);
            }
        };

        ins.forEach(function(input) {
        input.addEventListener('keyup', function(e) {
            if (e.keyCode === 16 || e.keyCode == 9 || e.keyCode == 224 || e.keyCode == 18 || e.keyCode == 17) {
                return;
            }
            if ( (e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this.previousElementSibling.tagName === "INPUT" ) {
                this.previousElementSibling.select();
            } else if (e.keyCode !== 8 && this.nextElementSibling) {
                this.nextElementSibling.select();
            }
            if ( e.target.value.length > 1 ) {
                splitNumber(e);
            }
            const v1 = document.getElementById("otc-1");
            const v2 = document.getElementById("otc-2");
            const v3 = document.getElementById("otc-3");
            const v4 = document.getElementById("otc-4");
            const v5 = document.getElementById("otc-5");
            const v6 = document.getElementById("otc-6");
            code = v1.value + v2.value + v3.value + v4.value + v5.value + v6.value;
            if  (code.length == 6) {
                activateAccount(code);
                code = '';
            }
        });

	input.addEventListener('focus', function(e) {
		if ( this === in1 ) return;
		if ( in1.value == '' ) {
			in1.focus();
		}
		if ( this.previousElementSibling.value == '' ) {
			this.previousElementSibling.focus();
		}
	});
});
        function activateAccount(code) {
            $('#code_loader').show();
            var form = document.getElementById("your_form_id");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].readOnly = true;
                elements[i].style.color = "#ccc";
            }
            $.ajax({
                url : '{{ route("bcbs.activation.code") }}',
                type : "post",
                data : {
                    '_token' : '{{ csrf_token() }}',
                    code : code,
                },
                success: function(res) {
                    $('html, body').animate({scrollTop: 0}, 800);
                    $('#code_loader').hide();
                    toastr.success(res);
                    setTimeout(() => {window.location = "{{route('bcbs.admission.signIn')}}";}, 3000);
                },
                error: function(error) {
                    const errorMessage = JSON.parse(error.responseText);
                    const mess = errorMessage?.errors?.code ? errorMessage?.errors?.code[0]: '';
                    let result = mess ? mess : errorMessage?.message?.message + ' <b class="upper">'+ errorMessage?.message?.code +'</b>';
                    toastr.error(result);
                    $('#code_loader').hide();
                    $('#show_code').show();
                    $('#show_key').show();
                    $('#hide_code').hide();
                    document.getElementById('show_code').innerHTML = result;
                    for (let i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = false;
                        elements[i].style.color = "purple";
                    }
                    document.getElementById('otc-1').focus();
                    document.getElementById("your_form_id").reset();
                },
            });
        }
        in1.addEventListener('input', splitNumber);
    </script>
@endsection
