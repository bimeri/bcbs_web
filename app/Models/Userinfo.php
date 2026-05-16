<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Userinfo
 *
 * @mixin Builder
 */
class Userinfo extends Model
{
    use HasFactory, Notifiable;

    protected $table = "userinfos";
    protected $fillable = [
        'user_id',
        'mother_name',
        'father_name',
        'nationality',
        'street',
        'address1',
        'address2',
        'zip',
        'date_of_birth',
        'congregation',
        'date_baptized',
        'description'
    ];

    public final function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
