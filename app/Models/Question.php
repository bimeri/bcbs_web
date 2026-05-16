<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Question
 *
 * @mixin Builder
 */
class Question extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['email', 'question', 'reply'];
}
