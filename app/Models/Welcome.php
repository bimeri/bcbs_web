<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Welcome
 *
 * @mixin Builder
 */
class Welcome extends Model
{
    use HasFactory, Notifiable;

    // static methods
    public static function getelAdminTable(){
        $table = '<div class="col s12 m12 w3-padding" style="overflow-x:auto !important;" id="students">
            <table class="w3-table w3-striped w3-border-blue" style="font-size: 15px !important;">
                <tr class="blue lighten-5 blue-text center">
                    <td colspan="14" class="w3-small blue-text">
                        '.trans("bcbs.list_of_directors").'
                    </td>
                </tr>
                <tr class="w3-blue">
                    <th rowspan="2" class="w3-small">'.trans('messages.s_n').'</th>
                    <th rowspan="2" class="w3-small">'.trans("bcbs.name").'</th>
                    <th rowspan="2" class="w3-small">'.trans("bcbs.date").'</th>
                    <th rowspan="2" class="w3-small">'.trans("bcbs.profession").'</th>
                    <th rowspan="2" class="w3-small">'.trans("bcbs.action").'</th>
                </tr>
                <tbody>';
                foreach(Director::all() as $key => $director) {
                    $table .= '<tr>
                    <td class="w3-small">'.($key+1).'</td>
                    <td class="w3-small">'.$director->name.'</td>
                    <td class="w3-small">'.$director->duration.'</td>
                    <td class="w3-small">'.$director->occupation.'</td>
                    <td class="w3-small"><a onclick="showDirectorsDetail(\''.$director->id.'\')" href="#" class="blue-text">Biography</a></td>
                </tr>';
                }
                $table .= '</tbody>
            </table>
        </div>';

            return $table;

    }

    public static function loadBiography(string $id): string {
        $detail = Directordetail::where('id', $id)->first();
        $image = 'image/resources/'.$detail->profile;
        return '<div class="col s12 m10 offset-m1">
        <div class="w3-round-medium w3-light-gray w3-padding" id="table" style="display: table; width: 100%; background: linear-gradient(rgba(250, 246, 246, 0.61), rgba(238, 235, 235, 0.808)), url('.$image.'); position: center top; height: 350px;">
            <h4 class="center double">Biography</h4>
            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa grey-text fa-female w3-large"></i>
                        <b class="w3-medium w3-margin-left">Spouse</b><i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                         <em class="w3-margin-left">'.$detail->spouse.'</em>
                        </div>
                    </li>
                </div>
            </ul>

            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-users grey-text w3-large"></i>
                            <b class="w3-medium w3-margin-left">Number of children</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                            <em class="w3-margin-left">'.$detail->children.'</em>
                        </div>
                    </li>
                </div>
            </ul>
            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-user-md grey-text w3-large"></i>
                            <b class="w3-medium w3-margin-left">Job Title</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                            <em class="w3-margin-left">'.$detail->job_title.'</em>
                        </div>

                    </li>
                </div>
            </ul>
            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-user-md grey-text w3-large"></i>
                            <b class="w3-medium w3-margin-left">Sub Title</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                            <em class="w3-margin-left">'.$detail->Sub_title.'</em>
                        </div>
                    </li>
                </div>
            </ul>

            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-at grey-text w3-large"></i>
                        <b class="w3-medium w3-margin-left">Email</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                        <em class="w3-margin-left">'.$detail->email.'</em>
                        </div>
                    </li>
                </div>
            </ul>
            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-mail-bulk grey-text w3-large"></i>
                            <b class="w3-medium w3-margin-left">Alternative Email</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                            <em class="w3-margin-left">'.$detail->alt_email.'</em>
                         </div>
                    </li>
                </div>
            </ul>
            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-id-card grey-text w3-large"></i>
                             <b class="w3-medium w3-margin-left">Contact</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                             <em class="w3-margin-left">'.$detail->contact.'</em>
                         </div>
                    </li>
                </div>
            </ul>
            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-fax grey-text w3-large"></i>
                            <b class="w3-medium w3-margin-left">Fax</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                            <em class="w3-margin-left">'.$detail->fax.'</em>
                        </div>
                    </li>
                </div>
            </ul>
            <ul>
                <div class="row">
                    <li>
                        <div class="col offset-m1 s12 m12"><i class="fa fa-map-marker grey-text w3-large"></i>
                            <b class="w3-medium w3-margin-left">Address</b> <i class="fa fa-arrow-alt-circle-right blue-text w3-margin-left"></i>
                            <em class="w3-margin-left">'.$detail->address.'</em>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>';
    }
}
