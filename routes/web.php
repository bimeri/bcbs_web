<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\WelcomeAjaxController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'homePage'])->name('landingPage');

Route::get('/login', [AuthController::class, 'welcomePage'])->name('login');
Route::post('/change_locale', [WelcomeController::class, 'setLocal'])->name('setLocale');

Route::get('admin_logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
Route::get('student_logout', [AuthController::class, 'studentLogout'])->name('student.logout');
Route::get('teacher_logout', [AuthController::class, 'teacherLogout'])->name('teacher.logout');
Route::get('user_logout', [AuthController::class, 'userLogout'])->name('user.logout');
Route::post('user_login', [AuthController::class, 'login'])->name('user.login');
Route::post('quest_login', [AuthController::class, 'userLogin'])->name('guest.login');

Route::group(['prifix' => 'guest', 'middleware' => ['web']], function() {
    route::get('graduation_2015', [WelcomeController::class, 'downloadGraduationBooklet2015'])->name('download.graduationbooklet');
    route::get('campus', [WelcomeController::class, 'campusPage'])->name('bcbs.campus');
    route::get('about', [WelcomeController::class, 'aboutPage'])->name('bcbs.about');
    route::get('director', [WelcomeController::class, 'directorPage'])->name('bcbs.director');
    route::get('courses', [WelcomeController::class, 'bcbsCourses'])->name('bcbs.courses');
    route::get('admission', [WelcomeController::class, 'bcbsAdmission'])->name('bcbs.admission');
    route::get('elearning', [WelcomeController::class, 'bcbsElearning'])->name('bcbs.elearning');
    route::get('staffs', [WelcomeController::class, 'bcbsStaffs'])->name('bcbs.staffs');
    route::get('satellite', [WelcomeController::class, 'bcbsSatellite'])->name('bcbs.satellite');

//    resources
    route::get('library/detail', [WelcomeController::class, 'bcbsLibraryDetail'])->name('campus.library.detail');

    // admission routes
    route::get('admission/signup', [WelcomeController::class, 'bcbsAdmissionSignUp'])->name('bcbs.admission_signup');
    route::get('admission/signIn', [WelcomeController::class, 'bcbsAdmissionSignIn'])->name('bcbs.admission.signIn');
    route::get('admission/home', [WelcomeController::class, 'bcbsAdmissionGuestHome'])->name('bcbs.admission.home');
    route::get('admission/apply', [WelcomeController::class, 'bcbsAdmissionFormPage'])->name('bcbs.admission.form');
    route::get('admission/password/forgot', [WelcomeController::class, 'forgotPassword'])->name('bcbs.admission.resetPassword');
    route::get('admission/password/reset', [WelcomeController::class, 'bcbsAdmissionResetPasswordPage'])->name('bcbs.resetPassword');
    route::get('admission/account/reactivate', [WelcomeController::class, 'bcbsAdmissionActivateResend'])->name('bcbs.reactivateCode');
    route::post('admission/account/activation', [WelcomeController::class, 'bcbsAdmissionActivateAccount'])->name('bcbs.activation.code');
    route::post('admission/account/reactivate', [WelcomeController::class, 'requestNewVerificationCode'])->name('bcbs.activation.code.resend');
    route::post('admission/password/reset', [WelcomeController::class, 'resetPassword'])->name('bcbs.password.reset');
    route::post('admission/password/reset/submit', [WelcomeController::class, 'submitPasswordResetForm'])->name('bcbs.resetPassword.submit');
    route::post('admission/user/basic', [Usercontroller::class, 'saveUserInfo'])->name('user.form.basic');

    route::get('admission/mail', [MailController::class, 'showMail'])->name('bcbs.mail.html');
    route::get('admission/reset', [MailController::class, 'resetPass'])->name('bcbs.mail.reset');

//    other internal pages
    Route::group(['prefix' => 'elearning'], function() {
        route::get('c-o-c', [WelcomeController::class, 'cocPage'])->name('elearning.coc');
        route::get('preach', [WelcomeController::class, 'preachPage'])->name('elearning.preach');
    });

    route::post('question', [WelcomeController::class, 'askQuestion'])->name('ask.question');
    route::post('contact', [WelcomeController::class, 'contactUs'])->name('guest.contact');

    route::post('director', [WelcomeAjaxController::class, 'getDirectorsTable'])->name('director.gettables');
    route::post('director/detail', [WelcomeAjaxController::class, 'getDirectorsDetail'])->name('director.getDetail');

    Route::group(['prefix' => 'users'], function() {
        route::post('register', [WelcomeController::class, 'userSignUp'])->name('guest.registration');
    });
});

