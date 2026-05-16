<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Certification
 *
 * @mixin Builder
 */
class Certification extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'certifications';

    protected $fillable = [
        'name',
        'fail_grade_or_mark',
        'passed_grade_or_mark',
        'max_subject',
        'min_subject'
    ];
}
