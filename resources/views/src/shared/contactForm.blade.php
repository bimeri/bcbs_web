<div class="col s12 m12 l4 w3-padding input-field w3-round-large w3-padding" id="contact" style=" box-shadow: inset 0px 0px 10px rgba(150, 143, 143, 0.5);">
    <form id="contact_form">
        <div class="row">
            <h3 class="center italic flow-text font">{{ trans('bcbs.contact_us') }}</h3>
            <div class="col s12 m12 input-field browser-default">
                <input type="text" placeholder="{{ trans('bcbs.enter_your_name_here') }}" id="contact_name">
            </div>
            <div class="col s12 m12 input-field browser-default">
                <input type="number" placeholder="{{ trans('bcbs.enter_your_contact') }}" id="contact_number">
            </div>
            <div class="col s12 m12 input-field">
                <input type="email" class="validate" placeholder="{{ trans('bcbs.enter_yor_email_here') }}" id="contact_email">
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
            <div class="col s12 m12 input-field browser-default">
                <textarea name="content" id="contentContact" maxlength="120" data-length="120" placeholder="{{ trans('bcbs.enter_text_here_not_more_than_120_character') }}" class="materialize-textarea"></textarea>
            </div>
            <div class="col s12 m12">
                <button type="button" class="submit waves-effect waves-light w3-gray flow-text w3-round-medium btn s12 m12" style="width: 100%;" onclick="contactUs()">{{ trans('bcbs.submit') }}</button>
            </div>
        </div>
    </form>
</div>
