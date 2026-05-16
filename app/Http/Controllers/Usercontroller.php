<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    public function saveUserInfo(Request $req) {
        $user = Auth::user();
        $full_name = $req['full_name'];
        $user_email = $req['user_email'];
        $user_contact = $req['user_contact'];
        $user_nationality = $req['user_nationality'];
        $user_address1 = $req['user_address1'];
        $user_address2 = $req['user_address2'];
        $user_street = $req['user_street'];
        $user_congregation = $req['user_congregation'];
        $user_fathers = $req['user_fathers'];
        $user_mother = $req['user_mother'];
        $zip_code= $req['zip_code'];
        $user_date_of_birth = $req['user_date_of_birth'];
        $user_date_baptise = $req['user_date_baptise'];
        $user_description = $req['user_description'];

        $userInfo = Userinfo::where('user_id', $user->id)->first();
        User::where('id', $user->id)->update([
            'name' => $full_name,
            'contact' => $user_contact
        ]);
        if (!$userInfo) {
            $info = new Userinfo();
            $info->user_id = $user->id;
            $info->mother_name = $user_mother;
            $info->father_name = $user_fathers;
            $info->nationality = $user_nationality;
            $info->street = $user_street;
            $info->address1 = $user_address1;
            $info->address2 = $user_address2;
            $info->zip = $zip_code;
            $info->date_of_birth = $user_date_of_birth;
            $info->congregation = $user_congregation;
            $info->date_baptized = $user_date_baptise;
            $info->description = $user_description;
            $info->save();

            return response()->json(['message' => trans('messages.info_saved_successfully'), 'type' => 'save']);

        } else {
            $userInfo->update([
                'mother_name' => $user_mother,
                'father_name' => $user_fathers,
                'nationality' => $user_nationality,
                'street' => $user_street,
                'address1' => $user_address1,
                'address2' => $user_address2,
                'zip' => $zip_code,
                'date_of_birth' => $user_date_of_birth,
                'congregation' => $user_congregation,
                'date_baptized' => $user_date_baptise,
                'description' => $user_description
            ]);
            return response()->json(['message' => trans('messages.info_updated_successfully'), 'type' => 'update']);
        }
    }
}
