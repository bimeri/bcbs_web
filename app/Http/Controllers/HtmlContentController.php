<?php

namespace App\Http\Controllers;

class HtmlContentController extends Controller
{
    public static function passwordResetMailText(string $name, string $url): string {

        return '
        <div style="padding: 10px; margin: 4px;">
            <p>'.trans('bcbs.hi').' <b style="text-transform: capitalize">'.$name.'</b> '.trans('bcbs.you_are_receiving_this_mail').'
                <a href="'.$url.'"><b>'.trans("bcbs.click_to_reset_password").'</b></a><br>
                <b>'.trans('bcbs.please_this_link_will_expire_in_30_minutes').'</b>
            </p>
            <p>'.trans('bcbs.any_worries_ignore_message').'</p>
        </div>
        ';
    }

    public static function userEmailChangeMailText(string $name, string $url): string {

        return '
        <div style="padding: 10px; margin: 4px;">
            <p>'.trans('bcbs.hi').' <b style="text-transform: capitalize">'.$name.'</b>, '.trans('bcbs.password_changed_successful').'
                <a href="'.$url.'"><b>'.trans('bcbs.click_to_signIn').'</b></a><br>
            <b>'.trans('bcbs.do_not_hesitate').'</b>
            </p>
        </div>
        ';
    }
}
