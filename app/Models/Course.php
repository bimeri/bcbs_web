<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

/**
 * Course
 *
 * @mixin Builder
 */
class Course extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'courses';
    protected $fillable = ['level_id', 'semester_id', 'name', 'code', 'credit', 'teacher_id'];

    public function studentcourses(){
        return $this->hasMany(Studentcourse::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function coursehistories(){
        return $this->belongsTo(Coursehistory::class);
    }

    public function studentmarks(){
        return $this->hasMany(Studentmark::class);
    }

    public function courseteachers(){
        return $this->hasMany(Courseteacher::class);
    }

    public function attendanceforms(){
        return $this->hasMany(Attendanceform::class);
    }
    // all static methods
    public static function getcourseDetail($courseId){
        return Course::where('id', $courseId)->first();
    }

    public static function getCourseName($courseId){
        $course = Self::getcourseDetail($courseId);
        return $course->name;
    }

    public static function getCourseCode($courseId){
        $course = Self::getcourseDetail($courseId);
        return $course->code;
    }

    public static function getAll(){
        return Course::orderBy('code','asc')->get();
    }

    public static function getLatest($number){
        return Course::latest()->take($number)->get();
    }

    public static function getCreditValue($course_id){
        $course = Course::where('id', $course_id)->first();
        return $course->credit;

    }

    public static function getCourseByLevelId($levelId){
        return Course::where('level_id', $levelId)->get();
    }

    public static function getActiveSemesterCourses($sem){
        return Course::where('semester_id', $sem)->get();
    }

    public static function getLevelCourse($level, $semester){
        $levelcourses = Self::getAll()->where('semester_id', $semester)->where('level_id', $level);
        $arr = ['<option value="">'.trans('messages.select_course').'</option>'];
        foreach ($levelcourses as $course) {
            $option = '<option value="'.$course->id.'">'.$course->name.' '.$course->code.'</option>';
            array_push($arr, $option);
        }
        return $arr;
    }

    public static function courseTable(){
        $courses = Self::getLatest(7);
        $setting = Setting::first();
        $year = Year::currentYear();
        $tables = '
            <div class="col s12 m10 offset-m1 w3-padding" style="overflow-x:auto !important;" id="courses" style="margin-top:-25px !important">
                <table class="w3-table w3-striped w3-border-blue" style="font-size: 15px !important;">
                    <tr class="teal lighten-4 teal-text center">
                        <td colspan="6" class="w3-small">
                            '.trans("messages.few_courses_for", ["school" => "<b>".$setting->school_name."</b>", "year" => "<b>".$year."</<b>"]).'
                        </td>
                    </tr>
                    <tr class="w3-teal lighten-1">
                        <th class="w3-small">S/N</th>
                        <th class="w3-small">'.trans("messages.level_name").'</th>
                        <th class="w3-small">'.trans("messages.semester_name").'</th>
                        <th class="w3-small">'.trans("messages.course_name").'</th>
                        <th class="w3-small">'.trans("messages.course_code").'</th>
                        <th class="w3-small">'.trans("messages.course_credit").'</th>
                    </tr>
                    <tbody>';
                if($courses->count() < 1) {
                    $tables .= '<tr class="orange lighten-5 orange-text center italic">
                                    <td colspan="6">'.trans('messages.no_course_found').'</td>
                                </tr>';
                }
                    foreach($courses as $key => $course){
                        $tables .= '
                        <tr>
                            <td class="w3-small">'.($key+1).'</td>
                            <td class="w3-small" >'.$course->level->name.'</td>
                            <td class="w3-small" >'.$course->semester->name.'</td>
                            <td class="w3-small" >'.$course->name.'</td>
                            <td class="w3-small" >'.$course->code.'</td>
                            <td class="w3-small" >'.$course->credit.'</td>
                        </tr>
                        ';
                    }
                    $tables .= '
                    <tbody>
                </table>
            </div>
        ';
    return $tables;
    }

    public static function getcourseByLevelSemester($levelId, $semesterId){
        return Course::where('level_id', $levelId)->where('semester_id', $semesterId)->get();
    }

    public static function getRegistringCourses($levelId, $semesterId, $yearId){
        Student::lang();
        if(Setting::where('course_registration', 0)->exists()){
            $val = Self::registrationEndedMessage($semesterId, $yearId);
            return [$val, 'ended'];
        }
        $allcourses = Self::getcourseByLevelSemester($levelId, $semesterId);
        $courses = [];

        foreach ($allcourses as $allcourse) {
            if(Studentcourse::where('student_id', auth()->user()->id)
                            ->where('course_id', $allcourse->id)
                            ->where('semester_id', Semester::getCurrentSemesterId())
                            ->where('year_id', $yearId)
                            ->exists()
                ){}
            else {
                array_push($courses, $allcourse);
            }
        }

        $tabs = '<div class="col s12 m12 w3-padding" style="overflow-x:auto !important;" style="margin-top:-25px !important">
                    <table class="w3-table w3-striped w3-border-blue" style="font-size: 15px !important;">
                    <tr><td colspan="5" class="teal teal-text lighten-5 center">
                        '.trans('messages.available_course', ['level' => Level::getLevelName($levelId),
                        'semester' => Semester::getSemesterName($semesterId), 'year' => Year::currentYear()]).'
                        </td>
                    </tr>
                        <tr class="teal lighten-4 teal-text center">
                            <th>'.trans('messages.s_n').'</th>
                            <th>'.trans('messages.course_name').'</th>
                            <th>'.trans('messages.course_code').'</th>
                            <th>'.trans('messages.course_credit').'</th>
                            <th>'.trans('messages.action').'</th>
                        </tr>
                            <tbody>';
                        if(count($courses) == 0){
                        $tabs .= '<tr>
                                    <td colspan="5" class="center red red-text lighten-4">'.trans('messages.no_free_course').'</td>
                                 </tr>
                            ';
                        }
            foreach ($courses as $key => $cours) {
                $tabs .= '<tr class="w3-padding w3-small" id="c_'.($key+1).'">
                            <td>'.($key+1).'</td>
                            <td>'.$cours->name.'</td>
                            <td>'.$cours->code.'</td>
                            <td>'.$cours->credit.'</td>
                            <td>
                                <label>
                                    <input type="checkbox" value="'.$cours->id.'" class="filled-in" onclick="submitForm(event)" id="ch_'.$cours->id.'" />
                                    <span>'.trans('messages.select').'</span>
                                </label>
                            </td>
                        </tr>';
                        }
                $tabs .= '
                </tbody>
            </table>';
            $tabs .='<hr style="border-top: 1px solid #009688">
        </div>';
        return $tabs;
    }

    public static function getCoursesTable($levelId, $semesterId){
        Student::lang();
        $levelName = Level::getLevelName($levelId);
        $semesterName = Semester::getSemesterName($semesterId);
        $courses = Self::getcourseByLevelSemester($levelId, $semesterId);
        $message = '';
        $table = '<div class="col s12 m12 w3-padding" style="overflow-x:auto !important;" id="courses" style="margin-top:-25px !important">
                <table class="w3-table w3-striped w3-border-blue" style="font-size: 15px !important;">
                    <tr class="teal lighten-4 teal-text center">
                        <td colspan="8" class="w3-small">
                            '.trans("messages.all_courses_for_semester", ["level" => "<b>".$levelName."</b>", "semester" => "<b>".$semesterName."</<b>"]).'
                        </td>
                    </tr>
                    <tr class="w3-teal lighten-1">
                        <th class="w3-small">'.trans('messages.s_n').'</th>
                        <th class="w3-small">'.trans("messages.course_name").'</th>
                        <th class="w3-small">'.trans("messages.course_code").'</th>
                        <th class="w3-small">'.trans("messages.course_credit").'</th>
                        <th colspan="2" class="w3-small">'.trans("messages.action").'</th>
                    </tr>
                    <tbody>';
                if(count($courses) < 1){
                    $message = array('message' => trans('messages.no_result'), 'type' => 'info');
                    $table .= '
                    <tr class="red lighten-4 red-text center">
                        <td colspan="8" class="w3-small">
                            '.trans("messages.no_course_for", ["level" => "<b>".$levelName."</b>", "semester" => "<b>".$semesterName."</b>"]).'
                            <a href="'.route('admin.course').'" onclick="load()" class="blue-text right w3-margin-right"> '.trans('messages.click_here').'</a>
                        </td>
                    </tr>';
                } else { foreach($courses as $key => $course) {
                    $message = array('message' => trans("messages.found_result"), 'type' => 'success');
                    $table .= '
                        <tr>
                            <td class="w3-small">'.($key+1).'</td>
                            <td class="w3-small" id="coursename'.$course->code.'">'.$course->name.'</td>
                            <td class="w3-small" id="coursecode'.$course->code.'">'.$course->code.'</td>
                            <td class="w3-small" id="coursecredit'.$course->code.'">'.$course->credit.'</td>
                            <td class="w3-small"><a style="cursor:pointer" onclick="'."getcourseInfo('$course->id', '$course->code', '$course->name', '$course->credit')".'" class="orange-text"><i class="fa fa-pen w3-small"></i><a></td>
                            <td class="w3-small"><a href="'.route('delete_course', ['courseId' => Crypt::encrypt($course->id), 'levelId' => Crypt::encrypt($levelId), 'semesterId' => Crypt::encrypt($semesterId)]).'" class="red-text" onclick="load()"><i class="fa fa-trash w3-small"></i><a></td>
                        </tr>';
                    }
                }
        $table .= '<tbody>
                </table>
            </div>
        ';

        return [$table, $message];
    }

    public static function editCourse($courseId, $courseCode, $courseName, $courseCredit){
        $table = '
        <h5 class="italic center">'.trans('messages.edit_course', ['course' => Course::getCourseName($courseId)]).'</h5><hr><hr>
        <a class="close right red-text w3-padding" style="cursor:pointer" onclick="closeForm()"><b class="w3-xlarge">X</b></a>
            <div class="col s10 m10 offset-s1 offset-m1 w3-margin-top w3-light-gray w3-padding">
                <form id="formId">
                '.csrf_field().'
                    <input type="hidden" value="'.$courseId.'" name="courseId">
                    <div class="row">
                        <div class="input-field col s12 m4">
                            <input type="text" class="validate" value="'.$courseName.'" name="courseName">
                        </div>
                        <div class="input-field col s12 m4">
                            <input type="text" class="validate" value="'.$courseCode.'" name="courseCode">
                        </div>
                        <div class="input-field col s12 m4">
                            <input type="number" class="validate" value="'.$courseCredit.'" name="courseCredit">
                        </div>
                    </div>
                    <div class="w3-center" style="margin-top: 4px !important">
                        <button type="button" onclick="editcourses()" class="btn teal waves-effect waves-light w3-small modal-close col s10 m6 offset-m3 offset-s1 w3-center">'.trans('messages.save').'</button>
                    </div>
                </form>
            </div>';
        return $table;
    }

    public static function getStudentRegisteredCourses($year, $sem){
        Student::lang();
        $studId = auth()->user()->id;
        $coursePivot = Studentcourse::where('student_id', $studId)
                                    ->where('year_id', $year)
                                    ->where('semester_id', $sem)->orderBy('course_id', 'desc')->get();
        $tabs = '<div class="col s12 m10 offset-m1 w3-padding" style="overflow-x:auto !important;" id="stud_couses" style="margin-top:-25px !important">
        <table class="w3-table w3-striped w3-border-blue" style="font-size: 15px !important;">
            <tr><td colspan="5" class="blue blue-text lighten-4 center">'.trans('messages.registered_courses', ['student' => auth()->user()->first_name.' '.auth()->user()->last_name, 'year' => Year::getYearNameById($year), 'semester' => Semester::getSemesterName($sem)]).'</td></tr>
            <tr class="blue white-text center">
            <th>'.trans('messages.s_n').'</th>
            <th>'.trans('messages.course_name').'</th>
            <th>'.trans('messages.course_code').'</th>
            <th>'.trans('messages.course_credit').'</th>
            <th>'.trans('messages.instructor').'</th>
            </tr>
                <tbody>';
            if(count($coursePivot) == 0){
        $tabs .= '<tr>
                    <td colspan="5" class="center red red-text lighten-4">'.trans('messages.did_not_register_courses').'</td>
                 </tr>
            ';
            }
            foreach ($coursePivot as $key => $course) {
        $tabs .= '<tr class="w3-padding w3-small" id="c_'.($key+1).'">
                    <td>'.($key+1).'</td>
                    <td>'.$course->course->name.'</td>
                    <td>'.$course->course->code.'</td>
                    <td>'.$course->course->credit.'</td>
                    <td>'.Courseteacher::getCourseInstructor($year, $course->course_id).'</td>
                </tr>';
                }
                $setting = Setting::first();
                if(count($coursePivot) > 0 and (Route::currentRouteName() == 'student.courses.all' or Route::currentRouteName() == 'course.formb' or $setting->course_registration == 0)){
                    $tabs .= '<tr id="hides">
                    <td colspan="5" class="blue-text center pointer blue lighten-4">
                        <a href="'.route('formb.download', ['student' => $studId, 'year' => $year, 'semester' => $sem]).'" class="w3-small col s12">'.trans('messages.click_to_download', ['name' => ''.trans('messages.form_b').'']).' <i class="fa fa-download w3-small blue-text"></i></a>
                    </td>
                </tr>';
                }
        $tabs .= '</tbody>
            </table>';
        $tabs .='
        </div>';
        return $tabs;
    }

    public static function getStudentCurrentRegisteredCourses($year, $sem){
        Student::lang();
        $studId = auth()->user()->id;
        $coursePivot = Studentcourse::where('student_id', $studId)
                                    ->where('year_id', $year)
                                    ->where('semester_id', $sem)->get();
        if(count($coursePivot) == 0) { return null;}
        $tabs = '<div class="col s12 m12 w3-padding" style="overflow-x:auto !important;" id="stud_current_couses" style="margin-top:-25px !important">
        <table class="w3-table w3-striped w3-border-blue" style="font-size: 15px !important;">
            <tr><td colspan="5" class="orange orange-text lighten-5 center">'.trans('messages.current_courses').'</td></tr>
            <tr class="orange lighten-4 orange-text center">
            <th>'.trans('messages.s_n').'</th>
            <th>'.trans('messages.course_name').'</th>
            <th>'.trans('messages.course_code').'</th>
            <th>'.trans('messages.course_credit').'</th>
            <th>'.trans('messages.action').'</th>
            </tr>
                <tbody>';
            if(count($coursePivot) == 0){
       $tabs .= '<tr>
                    <td colspan="5" class="center red red-text lighten-4">'.trans('messages.did_not_register_courses').'</td>
                </tr>
            ';
            }
            foreach ($coursePivot as $key => $course) {
        $tabs .= '<tr class="w3-padding w3-small sp" id="c_'.($key+1).'">
                    <td>'.($key+1).'</td>
                    <td>'.$course->course->name.'</td>
                    <td>'.$course->course->code.'</td>
                    <td>'.$course->course->credit.'</td>
                    <td>
                        <label>
                            <input type="checkbox" value="'.$course->course->id.'" class="filled-in" checked onclick="submitForm(event)" id="chv_'.$course->course->id.'" />
                            <span class="red-text">'.trans('messages.remove').'</span>
                        </label>
                    </td>
                </tr>';
                }
        $tabs .= '
                </tbody>
            </table>';
        $tabs .='
        </div>';
        return $tabs;
    }

    public static function getCourseRegister($semester, $course, $year){
        Student::lang();
        $studentcourse = Studentmark::getStudentsMarksPerSemesterAndYear($semester, $course, $year);

        $table = '<div class="col s12 m8 offset-m2 w3-padding" style="overflow-x:auto !important; margin-top:-25px !important" id="courses">
        <table class="w3-table w3-striped w3-border-blue" style="font-size: 15px !important;">
            <tr><td colspan="4" class="center teal lighten-5 teal-text">
                    '.trans('messages.course_info', ['course' => '<b>'.Self::getCourseName($course).'</b>', 'code' => '<b>'.Self::getCourseCode($course).'</b>', 'year' => '<b>'.Year::getYearNameById($year).'</b>', 'semester' => '<b>'.Semester::getSemesterName($semester).'</b>']).'
                </td>
            </tr>
            <tr class="teal lighten-4 teal-text center" id="table">
                <td colspan="4" class="w3-small">
                    <h3>'.Course::getCourseName($course).'</h3>
                </td>
            </tr>
            <tr class="w3-teal lighten-1">
            <th class="w3-small">'.trans('messages.s_n').'</th>
                <th class="w3-small">'.trans('messages.student_name').'</th>
                <th class="w3-small">'.trans('messages.midterm_mark').'</th>
                <th class="w3-small">'.trans('messages.final_mark').'</th>
            </tr>
        <tbody>';
        foreach($studentcourse as $key => $stcourse){
            $table .= '<tr>
            <td>'.($key + 1).'</td>
            <td><b class="left">'.$stcourse->student->first_name.' '.$stcourse->student->other_name.'</b> <i class="right">'.$stcourse->student->school_id.'</i></td>
            <td>
                <input type="number"
                value="'.$stcourse->midterm_mark.'"
                id="'.$stcourse->id.''.'mid'.''.$stcourse->student_id.'mid'.$stcourse->year_id.'"
                class="';if($stcourse->midterm_mark<70){ $table .= 'ss'; } else $table .= 'sp'; $table.='"
                onchange="ChangeMidtermMark(event, '.$stcourse->id.', '.$stcourse->course_id.', '.$stcourse->year_id.', '.$stcourse->semester_id.', '.$stcourse->student_id.', 1)">
            </td>
            <td>
            <input type="number" value="'.$stcourse->final_mark.'"
            id="'.$stcourse->id.''.'fin'.''.$stcourse->student_id.'fin'.$stcourse->year_id.'"
             class="';
            if($stcourse->final_mark<70){
                $table .= 'ss';
            } else $table .= 'sp';
            $table.='"
            onchange="ChangeMidtermMark(event, '.$stcourse->id.', '.$stcourse->course_id.', '.$stcourse->year_id.', '.$stcourse->semester_id.', '.$stcourse->student_id.', 2)">
            </td>
        </tr>
        ';
    }
    if(count($studentcourse) > 0){
        $table .= '<tr>
                    <td colspan="6" class="blue lighten-4 blue-text center"><i class="fa fa-download blue-text text-lighten-2"></i> <a href="'.route('download.register', ['course' => Crypt::encrypt($course), 'year' => Crypt::encrypt($year), 'semester' => Crypt::encrypt($semester)]).'">'.trans('messages.click_to_download', ['name' => Course::getCourseName($course)]).' '.trans('messages.register').'</button></td>
                    </tr>';
    }
        $table .='
        </tbody>
        </table>
    </div>
    ';
    return $table;
    }

    public static function registrationEndedMessage($sem, $year){
        $table = '<div class="col s10 offset-s1 m10 offset-m1 w3-margin-top center red red-text lighten-5 w3-round-medium w3-padding">'.trans('messages.course_reg_ended', ['semester' => Semester::getSemesterName($sem), 'year' => Year::getYearNameById($year)]).'</div>';
        return $table;
    }
}
