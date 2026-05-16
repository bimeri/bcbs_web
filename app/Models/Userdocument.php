<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Userdocument extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'userdocuments';

    protected $fillable = [
        'user_id',
        'doc_type',
        'doc_name',
        'doc_path'
    ];
}
