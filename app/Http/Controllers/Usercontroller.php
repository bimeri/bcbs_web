<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    /**
     * @throws \Throwable
     */
    public function saveUserInfo(Request $req)
    {
        $req->validate([
            'full_name' => 'required|min:3',
            'user_email' => 'required|email',
            'user_contact' => 'required',
            'user_nationality' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $user = Auth::user();
            $user->update([
                'name' => $req->full_name,
                'email' => $req->user_email,
                'contact' => $req->user_contact,
            ]);
            $userInfo = Userinfo::firstOrNew([
                'user_id' => $user->id
            ]);

            $userInfo->fill([
                'mother_name'      => $req->user_mother,
                'father_name'      => $req->user_fathers,
                'nationality'      => $req->user_nationality,
                'street'           => $req->user_street,
                'address1'         => $req->user_address1,
                'address2'         => $req->user_address2,
                'zip'              => $req->zip_code,
                'date_of_birth'    => $req->user_date_of_birth,
                'congregation'     => $req->user_congregation,
                'date_baptized'    => $req->user_date_baptise,
                'description'      => $req->user_description,
            ]);

            $userInfo->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'type'    => $userInfo->wasRecentlyCreated ? 'save' : 'update',
                'message' => $userInfo->wasRecentlyCreated
                    ? trans('messages.info_saved_successfully')
                    : trans('messages.info_updated_successfully')
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Server error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
