<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
/**
 * Login Using Facebook
 */
 public function login()
 {
    return View('auth.login');
 }

 public function loginUsingFacebook()
 {
    return Socialite::driver('facebook')->redirect();
 }

 public function callbackFromFacebook()
 {
  try {
       $user = Socialite::driver('facebook')->user();

       $saveUser = User::updateOrCreate([
           'facebook_id' => $user->getId(),
       ],[
           'email' => $user->getEmail(),
           'border_c_1' => '#000000',
           'border_c_2' => '#000000',
           'border_c_3' => '#000000',
           'password' => Hash::make($user->getName().'@'.$user->getId())
            ]);

       Auth::loginUsingId($saveUser->id);

       return redirect()->route('manage.index');
       } catch (\Throwable $th) {
          throw $th;
       }
   }
}