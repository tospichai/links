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

   public function loginAuth(Request $request)
   {
      $this->validate($request, [
         'email'    => 'required',
         'password' => 'required',
      ]);

      $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
         ? 'email'
         : 'username';

      $request->merge([
         $login_type => $request->input('email')
      ]);

      if (Auth::attempt($request->only($login_type, 'password'))) {
         return redirect()->route('manage.index');
      }

      return redirect()->back()
         ->withInput()
         ->withErrors([
            'email' => 'Invalid email or password please try again',
         ]);
   }

   public function checkusername(Request $request)
   {
      $username = $request->query('username');
      if ($username) {
         $user = user::where('username', $username)->first();
         if ($user) {
            return response()->json([
               'isAvailable' => false,
               'message' => 'This username is already taken.',
            ]);
         } else {
            return response()->json([
               'isAvailable' => true,
               'message' => 'You can use this username.',
            ]);
         }
      }
      $email = $request->query('email');
      if ($email) {
         $user = user::where('email', $email)->first();
         if ($user) {
            return response()->json([
               'isAvailable' => false,
               'message' => 'This email is already taken.',
            ]);
         } else {
            return response()->json([
               'isAvailable' => true,
               'message' => 'You can use this email.',
            ]);
         }
      }
   }

   public function register()
   {
      if (Auth::check()) {
         return redirect()->route('manage.profile');
      }

      return View('auth.register');
   }

   public function registerAuth(Request $request)
   {
      $user = User::where('username', $request->username)->orWhere('email', $request->email)->first();
      if (!$user) {
         $user = new User;
         $path = 'https://eu.ui-avatars.com/api/?size=500&name=' . preg_replace('/\s+/', '+', $request->username) . '&background=CCCCCC';
         $filename = 'images/profile/' . 'logo_profile_' . hexdec(uniqid()) . '.webp';
         Image::make($path)->encode('webp', 90)->save($filename);
         $user->image = $filename;
         $user->username = $request->username;
         $user->email = $request->email;
         $user->mobile = $request->mobile;
         $user->border_c_1 = '#000000';
         $user->border_c_2 = '#000000';
         $user->border_c_3 = '#000000';
         $user->page_name = 'Page name';
         $user->bio = 'short bio';
         $user->image_cover = 'images/banner/default.webp';
         $user->password = Hash::make($request->password);
         $user->save();
         Auth::loginUsingId($user->id);

         return redirect()->route('manage.index');
      }
   }

   public function loginUsingFacebook()
   {
      return Socialite::driver('facebook')->redirect();
   }

   public function callbackFromFacebook()
   {
      try {
         $facebook = Socialite::driver('facebook')->user();
         $user = User::where('facebook_id', $facebook->getId())->orWhere('email', $facebook->getEmail())->first();

         if ($user) {
            $user->facebook_id = $facebook->getId();
            $user->email = $facebook->getEmail();
            $user->save();
         } else {
            $user = new User;
            $path = 'https://eu.ui-avatars.com/api/?size=500&name=' . preg_replace('/\s+/', '+', $facebook->getName()) . '&background=CCCCCC';
            $filename = 'images/profile/' . 'logo_profile_' . hexdec(uniqid()) . '.webp';
            Image::make($path)->encode('webp', 90)->save($filename);
            $user->image = $filename;
            $user->border_c_1 = '#000000';
            $user->border_c_2 = '#000000';
            $user->border_c_3 = '#000000';
            $user->page_name = 'Page name';
            $user->bio = 'short bio';
            $user->image_cover = 'images/banner/default.webp';
            $user->password = Hash::make($facebook->getName() . '@' . $facebook->getId());
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
