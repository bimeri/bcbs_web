<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

/**
 * Directordetail
 *
 * @mixin Builder
 */
class Directordetail extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'directordetails';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'director_id',
        'spouse',
        'children',
        'job_title',
        'sub_title',
        'description',
        'email',
        'contact',
        'fax',
        'profile',
        'alt_email',
        'address'
    ];


    public final function director(): BelongsTo{
        return $this->belongsTo(Director::class);
    }
}
