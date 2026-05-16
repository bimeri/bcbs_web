<?php

namespace App\Models;
use App\Models\Studentinfo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Year
 *
 * @mixin Builder
 */
class Year extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'active'];

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function coursehistories(){
        return $this->hasMany(Coursehistory::class);
    }

    public function studentmarks(){
        return $this->hasMany(Studentmark::class);
    }

    public function studentdisciplines(){
        return $this->hasMany(Studentdiscipline::class);
    }

    public function courseteachers(){
        return $this->hasMany(Courseteacher::class);
    }

    public function results(){
        return $this->hasMany(Result::class);
    }

    public function attendanceforms(){
        return $this->hasMany(Attendanceform::class);
    }

    // static methods
    public static function currentYear(){
        $year = Year::where('active', 1)->first();
        return $year->name;
    }
    public static function currentYearInfo(){
        return Year::where('active', 1)->first();
    }

    public static function getYearNameById($id){
        $year = Year::where('id', $id)->first();
        try {
            return $year->name;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public static function getYearInfoById($id){
        return Year::where('id', $id)->first();
    }

    public static function getCurrentYearId(){
        $ye = Year::where('active', 1)->first();
        return $ye->id;
    }
}
