<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Application
 *
 * @mixin Builder
 */
class Application extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'applications';
    protected $fillable = [
        'user_id',
        'application_status', // 0 for pending, 1 for acceptance, 2 for rejection
        'application_date',
        'amount_paid'
    ];

    public final function user(){
        return $this->belongsTo(User::class);
    }
}
