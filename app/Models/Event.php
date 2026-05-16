<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;

/**
 * Event
 *
 * @mixin Builder
 */
class Event extends Model
{
    use HasFactory, Notifiable;
    protected $filable = ["title", "message", "profile", "event_date", "creator", "isExpired"];

    public static function getAll(){
        return Event::latest()->take(5)->orderBy('id', 'desc')->get();
    }

    public static function allEvent(){
        return Event::orderBy('id', 'asc')->get();
    }
}
