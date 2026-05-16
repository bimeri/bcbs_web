<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Staff
 *
 * @mixin Builder
 */
class Staff extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
                            'id',
                            'name',
                            'description',
                            'dob',
                            'marital',
                            'gender',
                            'occupation',
                            'kids',
                            'wife',
                            'status',
                            'country',
                            'region',
                            'contact',
                            'profile',
                            'email',
                            'date_baptise'
                        ];

    public static function getAllStaffs(){
        Self::latest()->take(10)->get();
        return null;
    }

    public static function getAllStaff(){
       return Self::where('status' , true)->get();

    }
}
