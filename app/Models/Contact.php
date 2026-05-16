<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Contact
 *
 * @mixin Builder
 */
class Contact extends Model
{
    use HasFactory, Notifiable;
    protected $fillable =['nane', 'email', 'contact', 'message'];
}
