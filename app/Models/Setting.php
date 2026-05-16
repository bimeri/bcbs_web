<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Setting
 *
 * @mixin Builder
 */
class Setting extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'school_name',
        'school_code',
        'motto',
        'logo',
        'test_session',
        'exam_session',
        'lecture_hour',
        'course_registration',
        'course_registration_deadline',
        'dean',
    ];

    // static methods
    public static function schoolCode(){
        $setting = Setting::first();
        return $setting->school_code;
    }

    public static function getSchoolName(){
        $setting = Setting::first();
        return $setting->school_name;
    }
    public static function getCurrentDeanId(){
        $setting = Setting::first();
        return $setting->dean;
    }
}
