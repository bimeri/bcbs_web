<div class="col s12 m12 w3-padding white w3-round-medium" style="height: auto;">
    <div class="row w3-padding w3-margin-top">
        <div class="col s6 m3 input-field">
            <label for="full_name"><i class="fa fa-user-circle w3-medium blue-text"></i> Full Name</label>
            <input type="text" id="full_name" value="{{$userinfo ? $user->name : ''}}" placeholder="Full Name" class="validate">
        </div>
        <div class="col s6 m3 input-field">
            <label for="user_email"><i class="fa fa-envelope w3-medium blue-text"></i> Email</label>
            <input type="email" id="user_email" value="{{$userinfo ? $user->email : ''}}" placeholder="Email" class="validate">
        </div>
        <div class="col s6 m3 input-field">
            <label for="user_contact"><i class="fa fa-phone-alt w3-medium blue-text"></i> Contact</label>
            <input type="number" id="user_contact" value="{{$userinfo ? $user->contact: ''}}" placeholder="Contact" class="validate">
        </div>
        <div class="col s6 m3 input-field">
            <label for="user_nationality"><i class="fa fa-id-card w3-medium blue-text"></i> Nationality</label>
            <input type="text" id="user_nationality" value="{{ isset($userinfo) && is_object($userinfo) ? $userinfo->nationality : '' }}" placeholder="Nationality" class="validate">
        </div>
    </div>
    <div class="row">
        <div class="col s6 m3 input-field">
            <label for="user_address1">
                <i class="fa fa-address-card w3-medium blue-text"></i> Address 1
            </label>
            <input type="text" id="user_address1" value="{{ optional($userinfo)->address1 }}" placeholder="Address 1" class="validate">
        </div>

        <div class="col s6 m3 input-field">
            <label for="user_address2">
                <i class="fa fa-address-card w3-medium blue-text"></i> Address 2
            </label>
            <input type="text" id="user_address2" value="{{ optional($userinfo)->address2 }}" placeholder="Address 2" class="validate">
        </div>

        <div class="col s6 m3 input-field">
            <label for="user_street"><i class="fa fa-flag w3-medium blue-text"></i> Street</label>
            <input type="text" id="user_street" value="{{ optional($userinfo)->street }}" placeholder="Street" class="validate">
        </div>

        <div class="col s6 m3 input-field">
            <label for="user_congregation">
                <i class="fa fa-place-of-worship w3-medium blue-text"></i> Congregation
            </label>
            <input type="text" id="user_congregation" value="{{ optional($userinfo)->congregation }}" placeholder="Congregation" class="validate">
        </div>
    </div>

    <div class="row">
        <div class="col s6 m3 input-field">
            <label for="user_fathers">
                <i class="fa fa-user w3-medium blue-text"></i> Father's name
            </label>
            <input type="text" id="user_fathers" value="{{ optional($userinfo)->father_name }}" placeholder="Father's name" class="validate">
        </div>

        <div class="col s6 m3 input-field">
            <label for="user_mother">
                <i class="fa fa-user w3-medium blue-text"></i> Mother's name
            </label>
            <input type="text" id="user_mother" value="{{ optional($userinfo)->mother_name }}" placeholder="Mother's name" class="validate">
        </div>

        <div class="col s6 m3 input-field">
            <label for="zip_code">
                <i class="fa fa-barcode w3-medium blue-text"></i> Zip code
            </label>
            <input type="text" id="zip_code" value="{{ optional($userinfo)->zip }}" placeholder="zip code" class="validate">
        </div>

        <div class="col s6 m3 input-field">
            <label for="user_date_of_birth">
                <i class="fa fa-calendar w3-medium blue-text"></i> Date of birth
            </label>
            <input type="date" id="user_date_of_birth" value="{{ optional($userinfo)->date_of_birth }}" class="validate">
        </div>

        <div class="col s6 m3 input-field">
            <label for="user_date_baptise">
                <i class="fa fa-calendar w3-medium blue-text"></i> Date baptise
            </label>
            <input type="date" id="user_date_baptise" value="{{ optional($userinfo)->date_baptized }}" class="validate">
        </div>

        <div class="col s12 m6 input-field">
            <label for="user_description">
                <i class="fa fa-pen blue-text"></i> Brief description about yourself
            </label>

            <textarea id="user_description" placeholder="Brief description" class="validate" style="margin-top: 10px;">
                {{ optional($userinfo)->description }}
            </textarea>
        </div>
    </div>
</div>
