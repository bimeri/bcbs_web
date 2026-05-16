<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Testimonial
 *
 * @mixin Builder
 */
class Testimonial extends Model
{
    use HasFactory, Notifiable;
    protected $table = "testimonials";
    protected $fillable= ["name", "profile", "message", "conclusion", "likes", "dislike"];

    public static function allT(){
        return Self::orderBy('id', 'asc')->get();
    }

}
