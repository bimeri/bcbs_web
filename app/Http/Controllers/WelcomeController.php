<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Contact;
use App\Models\Question;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Userdocument;
use App\Models\Userinfo;
use App\Models\Userschoolfitness;
use App\Models\WebsiteAbout;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use function PHPUnit\Framework\throwException;

class WelcomeController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct()
    {
        User::getLang();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function homePage(){
        User::getLang();
        $data['home'] = WebsiteAbout::getHomeDetail();
        $data['events'] = User::homeP();
        $data['director'] = User::getDirectorDetail();
        return view('src.bcbs.home')->with($data);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function campusPage(){
        User::getLang();
        return view('src.bcbs.campus');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function aboutPage(){
        User::getLang();
        $data['about'] = WebsiteAbout::getAboutDetail();
        $data['testimonials'] = Testimonial::allT();
        return view('src.bcbs.about')->with($data);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function directorPage(){
        User::getLang();
        $data['director'] = User::getDirectorDetail();
        return view('src.bcbs.resources.director')->with($data);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function bcbsCourses(){
        User::getLang();
        return view('src.bcbs.resources.course');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function bcbsLibraryDetail(){
        User::getLang();
        return view('src.bcbs.resources.lab');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function bcbsAdmission(){
        User::getLang();
        return view('src.bcbs.admission');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function bcbsStaffs(){
        User::getLang();
        $data['staffs'] = Staff::getAllStaff();
        return view('src.bcbs.staffs')->with($data);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function bcbsSatellite(){
        User::getLang();
        $data['staffs'] = Staff::getAllStaff();
        return view('src.bcbs.satellite')->with($data);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function cocPage(){
        User::getLang();
        return view('src.bcbs.elearning.coc');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function preachPage(){
        User::getLang();
        return view('src.bcbs.elearning.preach');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function bcbsElearning(){
        User::getLang();
        return view('src.bcbs.elearning');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function bcbsAdmissionSignUp(){
        User::getLang();
        return view('src.bcbs.admission.signUp');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function bcbsAdmissionSignIn(){
        User::getLang();
        return view('src.bcbs.admission.signIn');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function bcbsAdmissionGuestHome(){
        User::getLang();
        if (!Auth::check()) {
            return redirect()->route('bcbs.admission.signIn');
        }
        $users = auth()->user();
        $data['user'] = $users;
        $data['userinfo'] = Userinfo::where('user_id', $users->id)->first();
        $application = Application::where('user_id', auth()->user()->id)->first();

        $data['application'] = '';
        if (!$application) {
            $data['application'] .= '<div class="orange orange-text lighten-5 w3-padding font center">You have not yet submitted your application<br><a href="'.route("bcbs.admission.form").'" class="blue-text underline">Click to continue with your application</a></div><br>';
        } else {
            $data['application'] .= '<div class="green green-text lighten-5 w3-padding font center">You have successfully applied for a Bachelor degree program in BCBS<br><a href="#" class="bold underline">Check application status</a></div><br>';
        }
        return view('src.bcbs.admission.userHome')->with($data);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function bcbsAdmissionFormPage() {
        User::getLang();
        if (!Auth::check()) return redirect()->route('bcbs.admission.signIn');
        $user = Auth::user();
        $data['user'] = $user;
        $userInfo = Userinfo::query()->where('user_id', $user->id)->first();
        $userFitness = Userschoolfitness::query()->where('user_id', $user->id)->first();
        $userDocs = Userdocument::query()->where('user_id', $user->id)->first();
        $data['userinfo'] = $userInfo ?: 'disabled';
        $data['fitness'] = $userFitness ?: 'disabled';
        $data['userDocs'] = $userDocs ?: 'disabled';
        return view('src.bcbs.admission.resource.admissionForm')->with($data);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function bcbsAdmissionResetPasswordPage(Request $request){
        User::getLang();
        if (!$request->hasValidSignature()) {
            $notification = trans('bcbs.link_expired');
            session()->flash('error', $notification);
            return redirect()->route('bcbs.admission.resetPassword');
        }
        return view('src.bcbs.admission.passwordResetForm');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function forgotPassword(): View{
        User::getLang();
        return view('src.bcbs.admission.forgotPassword');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function getSetting(){
        return Setting::query()->first();
    }

    public static function bcbsAdmissionActivateResend(): View{
        User::getLang();
        return view('src.bcbs.admission.resendEmail');
    }

    public function downloadGraduationBooklet2015() {

        $file = public_path()."/image/resources/GRADUATION 2015.pdf";
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, 'GRADUATION 2015.pdf', $headers);
    }

    public function askQuestion(Request $req) {
        $question = new Question();
        $question->email = $req['email'];
        $question->question = $req['question'];
        $question->save();
        return response()->json(trans('bcbs.question_success'));
    }

    public function contactUs(Request $req){
        $contact = new Contact();
        $contact->name = $req['name'];
        $contact->email = $req['email'];
        $contact->contact = $req['contact'];
        $contact->message = $req['message'];
        $contact->save();
        return response()->json(trans('bcbs.thanks_for_contacting_us'));
    }

    public function setLocal(Request $locale){
        if (!in_array($locale['lang'], ['en', 'es', 'fr'])) {
            $notification = array('message' => trans('bcbs.fail_to_set_language'), 'alert-type' => 'info');
            return redirect()->back()->with($notification);
        }
        App::setLocale($locale['lang']);
        Cache::put('lang', $locale['lang'], 1440);  // 1 day
        session()->put('lang', Cache::get('lang'));

        $notification = array('message' => trans('auth.lang_change'), 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function bcbsAdmissionActivateAccount(Request $req) {
        $req->validate([
            'code' => 'required|min:6',
        ]);

        $user = User::query()->where('activation_code', $req['code'])->first();
        if (!$user) {
            $notification = array(
                'message' => trans('bcbs.wrong_activation_code'),
                'alert-type' => 'error',
                'code' => $req['code']
            );
            return response()->json(["message" => $notification], 406);
        }
        if ($user->expires < Carbon::now()) {
            $notification = array(
                'message' => trans('bcbs.code_expired', ['code' => $req['code']]),
                'alert-type' => 'error',
                'code' => ''
            );
            return response()->json(["message" => $notification], 406);
        }
        $user->email_verified_at = Carbon::now();
        $user->save();
        // send same code to email
        return response()->json(trans('bcbs.account_code_verified'));
    }

    public function userSignUp(Request $req) {
        $req->validate([
            'name' => 'required|min:4',
            'user_name' => 'required',
            'contact' => 'required|alpha_num',
            'password' => 'required|min:6',
            'email' => 'required|unique:users|email:rfc',
        ]);

        $user = new User();
        $code = $this->getCode();
        $user->name = $req['name'];
        $user->user_name = $req['user_name'];
        $user->email = $req['email'];
        $user->contact = $req['contact'];
        $user->reason = $req['message'];
        $user->activation_code = $code;
        $user->expires = Carbon::now()->addMinutes(30);
        $user->password = bcrypt($req['password']);
        $user->save();

        // send same code to email
        $this->sendEmail($code, $req['email'], $req['name']);

        return response()->json(trans('bcbs.registered_success'));
    }
    public function resetPassword(Request $req) {
        $email = $req['email'];
        $user = User::where('email', $email)->first();
        if(!$user) {
            $notification = array(
                'message' => trans('bcbs.invalid_email'),
                'alert-type' => 'error',
                'email' => $email
            );
            return response()->json(["message" => $notification], 406);
        }
        $url = URL::temporarySignedRoute('bcbs.resetPassword', now()->addMinutes(30), ['userId' => MailController::encryptingData($user->id), 'email' => $email]);

        try {
            $this->resetPasswordEmail($url, $email, $user->name);
        } catch (\Exception $ex) {
            return response()->json(['message', $ex->getMessage(),
                'alert-type' => 'error',
                'error' => 'exception'],
                406);
        }
        return response()->json(trans('bcbs.password_reset_link_send'));
    }

    public function submitPasswordResetForm(Request $req) {
        $password = $req['password'];
        $userId = self::decryptData($req['userId']);
        $user = User:: where('id', $userId)->first();
        if(!$user) {
            $notification = array('message' => trans('bcbs.invalid_user'), 'alert-type' => 'error');
            return response()->json(["message" => $notification], 406);
        }
        User::where('id', $userId)->update(['password' => bcrypt($password), 'updated_at' => Carbon::now()]);
        $this->emailChangedSuccess($user);  // send email for password changed
        return response()->json(trans('bcbs.password_changed_successfully'));
    }

    public function requestNewVerificationCode(Request $req) {
        $email = $req['email'];
        $user = User::where('email', $email)->first();
        //  return ['user' => $user, 'email' => $email];
        if(!$user) {
            $notification = array(
                'message' => trans('bcbs.invalid_email'),
                'alert-type' => 'error',
                'email' => $email
            );
            return response()->json(["message" => $notification], 406);
        }
        if($user->email_verified_at) {
            $notification = array(
                'message' => trans('bcbs.account_verified_already'),
                'alert_type' => 'info',
                'email' => $email
            );
            return response()->json(["message" => $notification], 406);
        }
        $code = $this->getCode();
        $user->update(['activation_code' => $code, 'expires' => Carbon::now()->addMinutes(30)]);
        $this->sendEmail($code, $email, $user->name);
        return response()->json(trans('bcbs.new_code_send'));
    }

    public static function getCode()
    {
        $strings = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $size = strlen($strings);
        $code = '';
        for ($i=0; $i < 6; $i++) {
            $code .= $strings[rand(0, $size-1)];
        }
        return $code;
    }

    public static function sendEmail($code, $email, $fullName){
        MailController::html_email($code, $email, $fullName);
    }

    public static function resetPasswordEmail($url, $email, $fullName)
    {
        MailController::passwordRestMail($url, $email, $fullName);
    }

    public static function emailChangedSuccess($user)
    {
        MailController::userEmailChanged($user);
    }

    public static function decryptData($data) {
        $value = '';
        try {
            $value = Crypt::decrypt($data);
        } catch (\Exception $exception) {
            throwException($exception);
        }
        return $value;
    }
}
