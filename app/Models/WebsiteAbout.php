<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * WebsiteAbout
 *
 * @mixin Builder
 */
class WebsiteAbout extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['welcome_text', 'introduction_video', 'goal', 'curriculum', 'objective', 'mission'];

    public static function getHomeDetail(){
        return Self::first();
    }

    public static function getAboutDetail(){
        return Self::first();
    }
}
