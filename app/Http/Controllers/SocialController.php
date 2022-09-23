<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;
use Image;

class SocialController extends Controller
{

   public function login()
   {
      if (Auth::check()) {
         return redirect()->route('manage.profile');
      }

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
         ], [
            'email' => $user->getEmail(),
            'border_c_1' => '#000000',
            'border_c_2' => '#000000',
            'border_c_3' => '#000000',
            'image_cover' => 'images/banner/default.webp',
            'password' => Hash::make($user->getName() . '@' . $user->getId())
         ]);

         if ($saveUser->wasRecentlyCreated) {
            $path = 'https://eu.ui-avatars.com/api/?size=500&name=' . preg_replace('/\s+/', '+', $user->getName()) . '&background=CCCCCC';
            $filename = 'images/profile/' . 'logo_profile_' . hexdec(uniqid()) . '.webp';
            Image::make($path)->encode('webp', 90)->save($filename);
            $saveUser->image = $filename;
            $saveUser->save();
         }

         Auth::loginUsingId($saveUser->id);

         return redirect()->route('manage.profile');
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   public function logout()
   {
      Auth::logout();

      return redirect()->route('home');
   }
}
