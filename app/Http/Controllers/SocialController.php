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
         $facebook = Socialite::driver('facebook')->user();
         $user = User::updateOrCreate([
            'facebook_id' => $facebook->getId(),
         ], [
            'email' => $facebook->getEmail(),
            'password' => Hash::make($facebook->getName() . '@' . $facebook->getId())
         ]);

         if ($user->wasRecentlyCreated) {
            $path = 'https://eu.ui-avatars.com/api/?size=500&name=' . preg_replace('/\s+/', '+', $facebook->getName()) . '&background=CCCCCC';
            $filename = 'images/profile/' . 'logo_profile_' . hexdec(uniqid()) . '.webp';
            Image::make($path)->encode('webp', 90)->save($filename);
            $user->image = $filename;
            $user->border_c_1 = '#000000';
            $user->border_c_2 = '#000000';
            $user->border_c_3 = '#000000';
            $user->image_cover = 'images/banner/default.webp';
            $user->save();
         }

         Auth::loginUsingId($user->id);

         return redirect()->route('manage.index');
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
