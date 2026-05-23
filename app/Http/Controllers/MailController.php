<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use PhpParser\Node\Expr\Cast\Object_;
use function PHPUnit\Framework\throwException;

class MailController extends Controller
{

   public final function showMail(): View{
      $data = ['name' => 'Bimeri Noel', 'code' => '12345'];
      return view('src.bcbs.mails.account') ->with($data);
   }

   public final function resetPass(): View{
       $id = self::encryptingData('$userId');
       $mail = self::encryptingData('$email');
       $url = URL::temporarySignedRoute('bcbs.resetPassword', now()->addMinutes(30), ['userId' => $id]);
       $data = array('userId' => $id, 'name' => 'bimeri noel', 'email' => $mail, 'url' => $url);

      return view('src.bcbs.mails.resetMail') ->with($data);
   }

   public final function basic_email() : void {
          $data = array('name'=>"Virat Gandhi");

          Mail::send(['text'=>'mail'], $data, function($message) {
             $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
             $message->from('xyz@gmail.com','Sample sent');
          });
       }

       public static function html_email(string $code, string $email, string $name): void {
          $data = array('name' => $name, 'code' => $code);
          Mail::send('src.bcbs.mails.account', $data, function($message) use ($email, $code, $name) {
             $message->to($email, $name)->subject('Account Activation');
             $message->from('bimerinoel@gmail.com','BCBS');
          });
       }

       public static function passwordRestMail(string $url, string $email, string $name): void {

       $data['data'] = HtmlContentController::passwordResetMailText($name, $url);
           Mail::send('src.bcbs.mails.resetMail', $data, function($message) use ($email, $name) {
             $message->to($email, $name)->subject('Reset Password');
             $message->from('account@bcbs.net.co','BCBS');
          });
       }

       public static function userEmailChanged($user): void {
       $url = route('bcbs.admission.signIn');
           $data['data'] = HtmlContentController::userEmailChangeMailText($user->name, $url);
           Mail::send('src.bcbs.mails.resetMail', $data, function($message) use ($user) {
             $message->to($user->email, $user->name)->subject('BCBS Password Changed');
             $message->from('account@bcbs.net.co','BCBS');
          });
       }

       public final function attachment_email(): void {
          $data = array('name'=>"Virat Gandhi");
          Mail::send('mail', $data, function($message) {
             $message->to('abc@gmail.com', 'Tutorials Point')->subject
                ('Laravel Testing Mail with Attachment');
             $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
             $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
             $message->from('xyz@gmail.com','Virat Gandhi');
          });
       }

       public static function encryptingData(string $data): string {
       $value = '';
           try {
               $value = Crypt::encrypt($data);
           } catch (\Exception $exception) {
               throwException($exception);
           }
           return $value;
       }
}
