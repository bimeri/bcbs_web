<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PDF;

class AdminDownloadController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }


    private function decryptData($data){
        $value = $data;
        try {
            return Crypt::decrypt($value);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return $data;
        }
    }
}
