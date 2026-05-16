<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Userschoolfitness
 *
 * @mixin Builder
 */
class Userschoolfitness extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'userschoolfitnesses';

    protected $fillable = [
        'user_id',
        'congregation_recommendation',
        'recommender',
    ];
}
