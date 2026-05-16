<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Director
 *
 * @mixin Builder
 */
class Director extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'duration', 'occupation', 'intro', 'speech'];

    public function directordetails(){
        return $this->hasMany(Directordetail::class);
    }

    public static function getDirectorSpeach(){
        return Self::first();
    }
}
