<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeAjaxController extends Controller
{
    public final function getDirectorsTable(): string{
        return Welcome::getelAdminTable();
    }

    public final function getDirectorsDetail(Request $req): string{
        return Welcome::loadBiography($req['id']);
    }
}
