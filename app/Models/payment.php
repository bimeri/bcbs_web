<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * payment
 *
 * @mixin Builder
 */
class payment extends Model
{
    use HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = [
        'user_id',
        'payment_date',
        'amount',
        'payment_item',
        'motives',
        'payment_channel',
        'payment_status',
        'payment_id',
        'payment_ref'
    ];

    public final function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
